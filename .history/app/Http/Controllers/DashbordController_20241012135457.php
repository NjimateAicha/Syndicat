<?php

namespace App\Http\Controllers;

use App\Models\InfoCom;
use App\Models\Residence;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashbordController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login'); 
        }

        $user = Auth::user();
        // Récupérer la résidence de l'utilisateur
        $residence = Residence::findOrFail($user->residence_id);

        $roleCounts = User::with('roles')
            ->where('residence_id', $residence->id)
            ->get()
            ->groupBy(function ($user) {
                return $user->roles->pluck('name')->first(); // Récupérer le premier nom de rôle
            })
            ->map(function ($users, $roleName) {
                return $users->count(); // Compter le nombre d'utilisateurs par rôle
            });
        dd($rol)

        $residences = Residence::count();

        $users = User::where('residence_id', $residence->id)->get();

        $infoComs = InfoCom::where('residence_id', $residence->id)
        ->orderby('created_at', 'desc')
        ->get();

        // Passer les comptes par rôle à la vue
        return view('dashboard.index', compact('infoComs', 'roleCounts', 'users', 'residences'));
    }

    public function getDashbord(Residence $residence)
    {
        $roleCounts = User::with('roles')
            ->where('residence_id', $residence->id)
            ->get()
            ->groupBy(function ($user) {
                return $user->roles->pluck('name')->first(); // Récupérer le premier nom de rôle
            })
            ->map(function ($users, $roleName) {
                return $users->count(); // Compter le nombre d'utilisateurs par rôle
            });

        $users = User::where('residence_id', $residence->id)->get();
        $residences = Residence::count();

        $infoComs = InfoCom::where('residence_id', $residence->id)->get();

        return view("dashboard.index")->with([
            "infoComs" => $infoComs,
            "residences" => $residences,
            "users" => $users,
            "roleCounts" => $roleCounts
        ]);
    }
}
