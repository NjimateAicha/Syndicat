<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendrieController extends Controller
{
    public function index()
    {
        return view('calendrie.index'); // Assurez-vous que le chemin de la vue est correct
    }
}
