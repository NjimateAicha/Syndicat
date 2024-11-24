<?php

namespace App\Http\Controllers;

use App\Models\InfoCom;
use App\Models\Residence;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InfocomController extends Controller
{

    public function index()
    {
        $users = User::where('residence_id', Auth::user()->residence_id)->get(); 
        $residence = Residence::findOrFail(Auth::user()->residence_id);

        $infoComs = InfoCom::where('user_id', Auth::user()->id)->get();

        return view('infocom.index', compact('users', 'infoComs', 'residence'));
    }   
    

    public function getInfocom(Residence $residence)
    {
        $users = User::where('residence_id', $residence->id)->get();
        $infoComs = InfoCom::where('user_id', Auth::user()->id)->get();
        return view("infocom.index")->with(["residence"=>$residence, "users"=>$users, "infoComs"=>$infoComs]);
    }
    

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'user_id' => 'required|string', // Accept 'all' or user ID as string
            'residence_id' => 'required|exists:residences,id',
        ]);
    
        // Check if 'Send to All Users' option was selected
        if ($validatedData['user_id'] === 'all') {
            // Fetch all users linked to the selected residence
            $users = User::where('residence_id', $validatedData['residence_id'])->get();
    
            // Create an InfoCom for each user in the residence
            foreach ($users as $user) {
                InfoCom::create([
                    'titre' => $validatedData['titre'],
                    'description' => $validatedData['description'],
                    'user_id' => $user->id, // Assign the current user in the loop
                    'residence_id' => $validatedData['residence_id'],
                    'date_info' => today(), // Use Laravel helper for current date/time
                ]);
            }
    
            // Redirect back with a success message
            return redirect()->route('infocom.index')->with('success', 'InfoCom added for all users successfully');
        } else {
            // Create a single InfoCom for the selected user
            InfoCom::create([
                'titre' => $validatedData['titre'],
                'description' => $validatedData['description'],
                'user_id' => $validatedData['user_id'], // Only the selected user
                'residence_id' => $validatedData['residence_id'],
                'date_info' => now(), // Use Laravel helper for current date/time
            ]);
    
            // Redirect back with a success message
            return redirect()->route('infocom.index')->with('success', 'InfoCom added successfully');
        }
    }
    
    

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('infocom.index');
    }


    
}
