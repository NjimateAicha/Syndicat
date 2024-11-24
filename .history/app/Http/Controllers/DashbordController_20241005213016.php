<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\InfoCom;
use App\Models\Residence;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class DashbordController extends Controller
{
    public function index()
    {
        return view('dashboard.index'); // Assurez-vous que le chemin de la vue est correct
    }
    public function dashboard()
{
    $user = Auth::user();
    
    // Récupérer la résidence de l'utilisateur
    $residenceId = $user->residence_id;

    // Récupérer les statistiques par rôle dans cette résidence
    $superManagerCount = User::where('role', 'Super Manager')->where('residence_id', $residenceId)->count();
    $ManagerCount = User::where('role', 'Manager')->where('residence_id', $residenceId)->count();
    $PropriétaireCount = User::where('role', 'Propriétaire')->where('residence_id', $residenceId)->count();
    $RésidentCount = User::where('role', 'Résident')->where('residence_id', $residenceId)->count();
    $AdminCount = User::where('role', 'Admin')->where('residence_id', $residenceId)->count();
    $residenceCount = Residence::where('id', $residenceId)->count();

    return view('dashboard.index', compact('superManagerCount', 'ManagerCount', 'PropriétaireCount', 'RésidentCount', 'AdminCount', 'residenceCount'));
}

}