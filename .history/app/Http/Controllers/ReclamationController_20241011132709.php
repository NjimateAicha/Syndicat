<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Residence;
use Illuminate\View\View;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReclamationController extends Controller
{
    public int $pageNumber=3;
    private function filter(Request $request ,  $query){

        if($request->has("name")){
            $title = $request->input('name');
            $query = $query->where('titre', 'LIKE',"%".$title."%");
        }

        if($request->has("order")) {
            $order = $request->input("order");

            switch ($order) {
                case 'alphabetical_asc':
                    $query=$query->orderBy("titre");
                    break;

                case 'alphabetical_desc':
                    $query=$query->orderByDesc("titre");
                    break;

                case 'numeric_asc':
                    $query=$query->orderBy("created_at");
                    break;

                case 'numeric_desc':
                    $query=$query->orderByDesc("created_at");
                    break;

                default:
                    break;
            }

        }else{
            $query=$query->orderByDesc("created_at");
        }

        return $query;
    }

    public function index(Request $request):View{

        $user = Auth::user();
        if(!$user){
            return view("login");
        }

        if($user->residence){

            $residenceId = $user->residence->id;


        }else if($user->hasRole('Admin|Super Admin')){
            $residenceId = Residence::first()->id;


        }else{
            return view("reclamation.reclamation");
        }


        $query = Reclamation::with(['commentaires.user', 'user'])->where('residence_id', $residenceId);
        $query = $this->filter($request , $query);

        $reclamations = $query->paginate($this->pageNumber); // Adjust the number to your preference
        return view("reclamation.reclamation")->with( ["reclamations"=>$reclamations ,"user"=>$user , "residence_id"=>$residenceId]);
    }



    public function getReclamations(Request $request, Residence $residence) {
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

        
        $user = Auth::user();

        if(!$user) {
            return view("login");
        }

        $query = $residence->reclamations()->with('commentaires.reclamation.residence', 'residence');

        // Apply filters
        $query = $this->filter($request, $query);

        $reclamations = $query->paginate($this->pageNumber)->appends($request->all());
        
        return view("reclamation.reclamation")->with([
            "reclamations" => $reclamations,
            "user" => $user,
            "residence_id" => $residence->id
        ]);
    }



    public function store(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            "titre" => "required|string|max:255",
            "description" => "string",
            "type" => "required|in:nuisance,sinistre",
            "lieu" => "required|string|max:255",
            "image" => "nullable|file|mimes:png,jpg,jpeg|max:2048",
            "residence_id" => "required|exists:residences,id"
        ]);

        // Handle file upload if there is an image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('reclamations', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Attach the authenticated user's ID to the validated data
        $validatedData['user_id'] = Auth::id();

        // Create the reclamation record
        Reclamation::create($validatedData);

        // Redirect back to the reclamations index page with a success message
        return redirect()->back()->with('success', 'Déclaration ajouté avec succès.');
    }


}
