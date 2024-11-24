<?php

namespace App\Http\Controllers;

use App\Models\Residence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ResidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $residences = Residence::all();
        return view('Regelement.index', compact('residences'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'nomResidence' => 'required|string|max:255',
        ]);

        // Create a new Residence
        $residence = new Residence();
        $residence->nomResidence = $validatedData['nomResidence'];
        $residence->save();
        // dd($residence);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Residence added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Residence $residence)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        // dd($residence);
        // Check if the user has 'superAdmin' or 'Admin' role
        if (Auth::user()->hasAnyRole(['superAdmin', 'Admin'])) {
            // $residence_ = Residence::findOrFail($residence->id);
            return view('Regelement.index', compact('residence'));
        } else {
            $residence_id = Auth::user()->residence_id;
            // Ensure the passed ID matches the user's residence ID
            if ($residence->id != $residence_id) {
                abort(403, 'Unauthorized access to this residence.');
            }
            $residence = Residence::findOrFail($residence_id);
        }

        return view('Regelement.index', compact('residence'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Residence $residence)
    {
        //
        // dd($residence);
        return view('Regelement.edit', compact('residence'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            // 'titre_regelement' => 'required|string|max:255',
            'editor_content' => 'nullable|string', // No max length for large text
        ]);

        $residence = Residence::findOrFail($id);
        // dd($residence);
        $residence->update([
            // 'titre_regelement' => $validatedData['titre_regelement'],
            'description' => $validatedData['editor_content'], // Save content from Quill editor
        ]);

        return redirect()->route('regelement.show',$residence)->with('success', 'Residence updated successfully!');
    }








    public function updateStatus(Request $request, $id)
    {
        $residence = Residence::findOrFail($id);
        $residence->active = $request->input('active');
        $residence->save();

        return redirect()->back()->with('status', 'Residence status updated successfully.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // In your ResidenceController.php
    public function fetchResidence($id)
    {
        $residence = Residence::findOrFail($id);
        return response()->json($residence);
    }
    //     public function fetchResidence($id)
    // {
    //     $residence = Residence::findOrFail($id);
    //     return response()->json([
    //         'titre_regelement' => $residence->titre_regelement,
    //         'description' => $residence->description,
    //     ]);
    // }
    public function selectResidence(Request $request)
    {
        // Store the selected residence ID in the session
        Session::put('selected_residence_id', $request->input('residence_id'));

        // Redirect back to the previous page
        return redirect()->back();
    }
}
