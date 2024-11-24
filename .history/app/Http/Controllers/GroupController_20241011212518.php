<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\GroupMessage;
use Illuminate\Http\JsonResponse;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;




use App\Models\User;
use App\Models\ChMessage as Message;
use App\Models\ChFavorite as Favorite;
use Chatify\Facades\ChatifyMessenger as Chatify;


class GroupController extends Controller
{
    protected $perPage = 10;

    public function createGroup(Request $request)
    {
        // Validation
        $request->validate([
            'group_name' => 'required|string|max:255',
            'contacts' => 'required|array', // Assurez-vous que les contacts sont un tableau
            'contacts.*' => 'exists:users,id', // Vérifiez que chaque contact existe dans la table users
        ]);

        // Créer le groupe
        $group = Group::create([
            'name' => $request->input('group_name'),
            'created_by' => auth()->id(),
        ]);

        // Ajouter les utilisateurs au groupe
        foreach ($request->input('contacts') as $contactId) {
            GroupUser::create([
                'group_id' => $group->id,
                'user_id' => $contactId,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Groupe créé avec succès!']);
    }

    public function sendGroupMessage(Request $request)
    {
        // Validation
        $request->validate([
            'message' => 'required|string',
            'group_id' => 'required|exists:groups,id',
        ]);

        // Send the message
        GroupMessage::create([
            'message' => $request->input('message'),
            'group_id' => $request->input('group_id'),
            'sender_id' => auth()->id(),
        ]);

        return response()->json(['success' => true]);
    }

    /////////////////////////////////////////
    // public function getGroups()
    // {
    //     // Get all user groups associated with the authenticated user
    //     $userGroups = Group::join('group_users', 'groups.id', '=', 'group_users.group_id')
    //         ->where('group_users.user_id', auth()->id()) // Correct the syntax here
    //         ->select('groups.*')
    //         ->get();
    
    //     // Check if groups exist
    //     if ($userGroups->isEmpty()) {
    //         return response()->json([
    //             'html' => '<div class="text-center text-gray-500">Aucun groupe disponible</div>' // Return a message if no groups exist
    //         ], 200);
    //     }
    
    //     // Render the groups view
    //     $groupsList = view('Chatify::layouts.group', [
    //         'groups' => $userGroups, // Pass groups to the view
    //     ])->render(); // Use render() to get the HTML string
    
    //     // Send the response with the rendered HTML
    //     // return response()->json([
    //     //     'html' => $groupsList // Return the rendered HTML
    //     // ], 200);
    //      return view('Chatify::pages.app', ['groups'=>$userGroups]);
        
    // }
    public function getGroups(Request $request)
    {
        // Obtenez tous les groupes associés à l'utilisateur authentifié
        $groups = Group::join('group_users', 'groups.id', '=', 'group_users.group_id')
            ->where('group_users.user_id', auth()->id()) // Obtenez les groupes de l'utilisateur authentifié
            ->select('groups.*')
            ->paginate($request->get('per_page', 10)); // Par défaut 10 par page
    
        // Liste des groupes récupérés
        $groupsList = $groups->items();
    
        // Vérifiez si des groupes existent
        if (count($groupsList) > 0) {
            $groupItems = '';
            foreach ($groupsList as $group) {
                // Génération manuelle de l'HTML pour chaque groupe
                $groupItems .= '<div class="group-item">';
                $groupItems .= '<h4>' . $group->name . '</h4>'; // Affiche le nom du groupe
                $groupItems .= '<p>' . $group->description . '</p>'; // Affiche la description du groupe
                $groupItems .= '</div>';
            }
        } else {
            // Si aucun groupe n'est trouvé, affiche un message
            $groupItems = '<p class="message-hint center-el"><span>Aucun groupe disponible</span></p>';
        }
    
        // Retourner à la même page (vue) avec les groupes
        return view('Chatify::pages.app', [
            'groups' => $groupsList, // Passe les groupes à la vue
            'groupItems' => $groupItems, // Passe les groupes sous forme HTML
            'id' => auth()->id(), // Passe l'ID de l'utilisateur authentifié
            'message' => count($groupsList) > 0 ? null : 'Aucun groupe disponible', // Message s'il n'y a pas de groupes
        ]);
    }
    

    
    ////////////////////////////////////////
}
