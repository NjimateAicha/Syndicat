<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function index()
    {
        return view('dashboard.index'); // Assurez-vous que le chemin de la vue est correct
    }
}