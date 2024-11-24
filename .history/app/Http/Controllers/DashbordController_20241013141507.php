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

        // Définir l'ordre personnalisé des rôles
        $roleOrder = ['Manager principal', 'Manager', 'Proprétaire', 'Résident', 'Admin', 'Super Admin'];

        // Initialiser un tableau avec chaque rôle ayant une valeur de 0 par défaut
        $roleCounts = collect(array_fill_keys($roleOrder, 0));

        // Récupérer les utilisateurs et les regrouper par rôle
        $actualRoleCounts = User::with('roles')
            ->where('residence_id', $residence->id)
            ->get()
            ->groupBy(function ($user) {
                return $user->roles->pluck('name')->first(); // Récupérer le premier nom de rôle
            })
            ->map(function ($users, $roleName) {
                return $users->count(); // Compter le nombre d'utilisateurs par rôle
            });

        // Fusionner les rôles existants avec ceux qui n'ont pas d'utilisateurs (restant à 0)
        $roleCounts = $roleCounts->merge($actualRoleCounts);

        // Appliquer le tri par ordre personnalisé (déjà respecté grâce à array_fill_keys)
        $roleCounts = $roleCounts->sortBy(function ($count, $roleName) use ($roleOrder) {
            // Utiliser array_search pour obtenir l'indice du rôle dans l'ordre personnalisé
            return array_search($roleName, $roleOrder);
        });

        $residences = Residence::count();
        $users = User::where('residence_id', $residence->id)->get();

        $infoComs = InfoCom::where('residence_id', $residence->id)
            ->orderby('created_at', 'desc')
            ->distinct()
            ->get(['titre', 'description', 'date_info']);

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

        // $infoComs = InfoCom::where('residence_id', $residence->id)->get();
        $infoComs = InfoCom::where('residence_id', $residence->id)
        ->distinct()
        ->get(['titre', 'description', 'created_at']);

        return view("dashboard.index")->with([
            "infoComs" => $infoComs,
            "residences" => $residences,
            "users" => $users,
            "roleCounts" => $roleCounts
        ]);
    }
}
