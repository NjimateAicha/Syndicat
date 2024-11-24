<?php

namespace App\Http\Controllers;

use App\Mail\FormSubmissionMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormRegisterController extends Controller
{
    public function index()
    {
        return view('auth.formRegister.formRegister');
    }
    public function submit(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'building_number' => 'nullable|string|max:50',
            'apartment_number' => 'nullable|string|max:50',
            'terms' => 'required|accepted',
        ]);

        // // Retrieve the email address of the first Super Admin
        // $Super AdminEmail = User::role('Super Admin')->pluck('email')->first();

        // // Retrieve the email addresses of all Admins
        // $AdminEmails = User::role('Admin')->pluck('email')->toArray();

        // // Combine the Super Admin email with the Admin emails
        // $recipients = array_merge([$Super AdminEmail], $AdminEmails);
        // // dd($recipients);

        // // Send the email to multiple recipients
        // Mail::to($recipients)->send(new FormSubmissionMail($data));

        // Send the email
        Mail::to('izamine2000@gmail.com')->send(new FormSubmissionMail($data));

        // Redirect or return response
        return back()->with('success', 'Form submitted successfully!');
    }
}
