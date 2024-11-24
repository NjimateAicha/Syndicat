<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Parameter;
use App\Models\Residence;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public int $pageNumber=3;

    private function filter(Request $request, $query, $titleField = 'titre', $dateField = 'created_at') {
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

    public function show_type(string $type, Residence $residence)
    {
        $selctiontype = $type;
        $types = ["Compte rendu", "Facture et devis", "Autres"];

        // Fetch documents based on the type filter
        $documentsQuery = Document::where('residence_id', $residence->id);

        // If 'tous' is selected, we don't need to add any filters.
        if ($type !== "tous") {
            $documentsQuery->where('type', $type);
        }

        $documents = $documentsQuery->paginate($this->pageNumber);

        return view('document.document', [
            'residence' => $residence,
            'types' => $types,
            'documents' => $documents,
            "activeType" => $selctiontype
        ]);
    }




    public function index(Request $request):View{
        $user = Auth::user();
        $types = ["Compte rendu","Facture et devis","Autres" ];
        if ($user->residence) {
            $residence = $user->residence;

            return view("document.document")->with(["residence"=>$residence , "types"=>$types , "documents"=>$residence->documents()->paginate($this->pageNumber)]);
        }else if($user->hasRole('Admin|Super Admin')){
            $residence = Residence::first();
            return view("document.document")->with(["residence"=>$residence, "types"=>$types, "documents"=>$residence->documents()->paginate($this->pageNumber)]);
        }
        return  view("document.document");

    }

    // public function getDocument(Residence $residence):View{
    //     $types = ["Compte rendu","Facture et devis","Autres" ];

    //     return view("document.document")->with(["residence"=>$residence, "types"=>$types, "documents"=>$residence->documents()->paginate($this->pageNumber)]);

    // }

    public function getDocument(Request $request, Residence $residence) {

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

        $types = ["Compte rendu", "Facture et devis", "Autres"];

        $documentsQuery = $residence->documents();

        // Apply the filters for documents
        $documentsQuery = $this->filter($request, $documentsQuery, 'titre', 'created_at');

        $documents = $documentsQuery->paginate($this->pageNumber)->appends($request->all());

        return view("document.document")->with([
            "residence" => $residence,
            "types" => $types,
            "documents" => $documents
        ]);
    }


    public function store(Request $request){

        $validateData = $request->validate([
            "type"=> "required",
            "titre"=> "required|string",
            "fichier"=>"required|file|max:2048", // Max file size is 2MB
            "commentaire"=>"nullable|string",
            "residence_id" => "required|exists:residences,id"
        ]);

        if($request->hasFile("fichier")){
            $file = $request->file("fichier");
            $validateData['fichier'] = $file->store("documents","public");

        }

        Document::create($validateData);
        return redirect()->back();


    }








}
