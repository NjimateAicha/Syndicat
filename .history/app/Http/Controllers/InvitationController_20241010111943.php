<?php

namespace App\Http\Controllers;

use App\Mail\InvitationMail;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'role' => 'required|string|exists:roles,name',
            'residenceId' => 'nullable|exists:residences,id',
        ]);

        $email = $request->input('email');
        $role = $request->input('role');
        $residence_id = $request->input('residenceId');

        do {
            $token = Str::random(32);
        } while (Invitation::where('token', $token)->exists());

        // Save the invitation data
        Invitation::create([
            'email' => $email,
            'role' => $role,
            'token' => $token,
            'residence_id' => $residence_id, // Save the residence ID
            'expires_at' => now()->addHours(24),
        ]);

        // Include residenceId in the link
        // if($role == "admin"){
        //     $link = route('register.user') . '?token=' . $token ;
        // }else{
            $link = route('register.user') . '?token=' . $token . '&residenceId=' . $residence_id;
        // }

        try {
            Mail::to($email)->send(new InvitationMail($link));
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Failed to send invitation email.']);
        }

        return back()->with('status', 'Invitation sent!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
