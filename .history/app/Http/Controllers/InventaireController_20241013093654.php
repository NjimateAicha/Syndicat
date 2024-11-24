<?php

namespace App\Http\Controllers;

use App\Models\Residence;
use Illuminate\View\View;
use App\Models\Inventaire;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class InventaireController extends Controller
{
    public int $pageNumber=3;

    private function filter(Request $request, $query, $titleField = 'name', $dateField = 'created_at') {
        if ($request->has("name")) {
            $title = $request->input('name');
            $query = $query->where($titleField, 'LIKE', "%" . $title . "%");
        }

        if ($request->has("order")) {
            $order = $request->input("order");

            switch ($order) {
                case 'alphabetical_asc':
                    $query = $query->orderBy($titleField);
                    break;

                case 'alphabetical_desc':
                    $query = $query->orderByDesc($titleField);
                    break;

                case 'numeric_asc':
                    $query = $query->orderBy($dateField);
                    break;

                case 'numeric_desc':
                    $query = $query->orderByDesc($dateField);
                    break;

                default:
                    break;
            }
        } else {
            $query = $query->orderByDesc($dateField);
        }

        return $query;
    }


    public function index(): View
    {
        $user = Auth::user();

        if ($user->hasRole('Admin|Super Admin')) {
            $residence = Residence::first();
            $inventaires = $residence->inventaires()->orderByDesc('created_at')->paginate($this->pageNumber);;
        }else {
            $residence = $user->residence;
            $inventaires = $user->residence->inventaires()->orderByDesc('created_at')->paginate($this->pageNumber);;
        }

        return view('inventaire.index',compact('inventaires','residence'));
    }

    // public function getInventaire(Residence $residence)  {
    //     $inventaires = $residence->inventaires()->paginate($this->pageNumber);

    //     return view('inventaire.index',compact('inventaires','residence'));

    // }

    public function getInventaire(Request $request, Residence $residence)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (!Auth::user()->hasAnyRole(['Super Admin', 'Admin'])) {
    
            // Regular users can only view events for their own residence
            $residence_id = Auth::user()->residence_id;

            // If a residence is passed, make sure it matches the user's residence
            if ($residence && $residence->id != $residence_id) {
                abort(403, 'Unauthorized access to this residence.');
        }}


        $query = $residence->inventaires()->orderByDesc('created_at');

        // Apply filters
        $query = $this->filter($request, $query, 'nom', 'created_at');

        // Paginate and append filters
        $inventaires = $query->paginate($this->pageNumber)->appends($request->all());

        return view('inventaire.index', compact('inventaires', 'residence'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:100',
            'details' => 'required|string|max:500',
            'date' => 'required|string|max:100',
            "residence_id" => "required|exists:residences,id"
        ]);
        try {

            Inventaire::create($validatedData);
            return redirect()->back()->with('success', 'Inventaire ajouté avec succès.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de l\'ajout de l\'inventaire.');
        }
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'details' => 'required|string|max:500',
        ]);

        $inventaire = Inventaire::findOrFail($id);
        $inventaire->details = $validatedData['details'];
        $inventaire->save();

        return redirect()->back()->with('success', 'Details updated successfully');
    }


}
