<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentaireController extends Controller
{
    public function index(){

    }

    public function store(Request $request){
        $validatedData = $request->validate([
            "text" => "required|string",
            "reclamation_id" => 'required|exists:reclamations,id',
        ]);
        $validatedData['user_id']=Auth::id();

        Commentaire::create($validatedData);


        return redirect()->back();
    }
}
