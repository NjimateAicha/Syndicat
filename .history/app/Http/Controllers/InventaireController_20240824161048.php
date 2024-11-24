<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventaireController extends Controller
{
    public function index()
    {
        return view('inventaire.index'); // Assurez-vous que le chemin de la vue est correct
    }

}
