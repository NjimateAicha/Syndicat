<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Residence;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class ReglageController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('reglages.index')->with(["roles" => $roles]); // Assurez-vous que le chemin de la vue est correct
    }

    // public function show(Residence $residence)
    // {
    //     if (!Auth::check()) {
    //         return redirect()->route('login');
    //     }
    //     if (!Auth::user()->hasAnyRole(['Super Admin', 'Admin'])) {
    
    //         // Regular users can only view events for their own residence
    //         $residence_id = Auth::user()->residence_id;

    //         // If a residence is passed, make sure it matches the user's residence
    //         if ($residence && $residence->id != $residence_id) {
    //             abort(403, 'Unauthorized access to this residence.');
    //     }}

    //     // Get the current user's role
    //     $currentUserRole = Auth::user()->getRoleNames()->first();

    //     // Define the role hierarchy in order of authority
    //     $roleHierarchy = [
    //         'Résident' => 1,
    //         'Propriétaire' => 2,
    //         'Manager' => 3,
    //         'Manager principal' => 4,
    //         'Admin' => 5,
    //         'Super Admin' => 6
    //     ];

    //     // Get the current user's role level
    //     $currentUserRoleLevel = $roleHierarchy[$currentUserRole] ?? 0;

    //     if ($currentUserRoleLevel >= 5) {
    //         $rolesBelowCurrentUserNames = ['Résident', 'Propriétaire', 'Manager', 'Manager principal'];
    //     } else {
    //         // Create a list containing only the roles below the current user's role level
    //         $rolesBelowCurrentUser = array_filter($roleHierarchy, function ($level) use ($currentUserRoleLevel) {
    //             return $level < $currentUserRoleLevel;
    //         });

    //         // Optional: Get the role names only
    //         $rolesBelowCurrentUserNames = array_keys($rolesBelowCurrentUser);
    //     }

    //     // print_r($rolesBelowCurrentUser);

    //     // Fetch users within the given residence who have a role with less than or equal authority
    //     $users = User::where('residence_id', $residence->id)
    //         ->whereHas('roles', function ($query) use ($roleHierarchy, $currentUserRoleLevel) {
    //             $query->whereIn('name', array_keys(array_filter($roleHierarchy, function ($level) use ($currentUserRoleLevel) {
    //                 return $level <= $currentUserRoleLevel;
    //             })));
    //         })
    //         ->get();

    //     // Pass the residence, users, and roles to the view
    //     return view('reglages.index', compact('residence', 'users'))->with([
    //         'roles' => $rolesBelowCurrentUserNames // Pass the array directly
    //     ]);
    // }
    public function show(Residence $residence)
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
            }
        }

        // Get the current user's role
        $currentUserRole = Auth::user()->getRoleNames()->first();

        // Define the role hierarchy in order of authority
        $roleHierarchy = [
            'Résident' => 1,
            'Propriétaire' => 2,
            'Manager' => 3,
            'Manager Principal' => 4,
            'Admin' => 5,
            'Super Admin' => 6
          
        ];

        // Get the current user's role level
        $currentUserRoleLevel = $roleHierarchy[$currentUserRole] ?? 0;

        if ($currentUserRoleLevel >= 5) {
            $rolesBelowCurrentUserNames = ['Résident', 'Propriétaire', 'Manager', 'Manager Principal'];
        } else {
            // Create a list containing only the roles below the current user's role level
            $rolesBelowCurrentUser = array_filter($roleHierarchy, function ($level) use ($currentUserRoleLevel) {
                return $level < $currentUserRoleLevel;
            });

            // Optional: Get the role names only
            $rolesBelowCurrentUserNames = array_keys($rolesBelowCurrentUser);
        }

        // print_r($rolesBelowCurrentUser);

        // Fetch users within the given residence who have a role with less than or equal authority
        $users = User::where('residence_id', $residence->id)
            ->whereHas('roles', function ($query) use ($roleHierarchy, $currentUserRoleLevel) {
                $query->whereIn('name', array_keys(array_filter($roleHierarchy, function ($level) use ($currentUserRoleLevel) {
                    return $level <= $currentUserRoleLevel;
                })));
            })
            ->get();

        // Sort the users by their role hierarchy
        $sortedUsers = $users->sort(function ($userA, $userB) use ($roleHierarchy) {
            // Get the highest role level for user A
            $userARoleLevels = $userA->roles->map(function ($role) use ($roleHierarchy) {
                return $roleHierarchy[$role->name] ?? 0; // Handle unknown roles with a default low level
            });

            // Get the highest role level for user B
            $userBRoleLevels = $userB->roles->map(function ($role) use ($roleHierarchy) {
                return $roleHierarchy[$role->name] ?? 0; // Handle unknown roles with a default low level
            });

            // Sort by the highest role (largest number means higher authority)
            return max($userBRoleLevels->toArray()) <=> max($userARoleLevels->toArray());
        });

        // Now $sortedUsers contains users sorted from highest to lowest role authority

        $roleHierarchyColors = [
            'Résident' => '#9EAFCE',
            'Propriétaire' => '#697C9B',
            'Manager' => '#3A416F',
            'Manager Principal' => '#80C637',
            'Admin' => '#80C637',
            'Super Admin' => '#80C637'
        ];

        // Pass the residence, users, and roles to the view
        return view('reglages.index', compact('residence'))->with([
            'roles' => $rolesBelowCurrentUserNames, // Pass the array directly
            'roleHierarchyColors' => $roleHierarchyColors,
            'users' => $sortedUsers
        ]);
    }
}
