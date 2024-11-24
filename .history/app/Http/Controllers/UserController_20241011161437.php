<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Residence;
use App\Models\Invitation;
use Illuminate\Support\Str;
use App\Mail\InvitationMail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Models\ChMessage as Message;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->query('token');

        // Redirect if token is missing or invalid
        if (!$token) {
            return redirect()->route('formRegister')->withErrors('Invalid or missing token.');
        }

        $invitation = Invitation::where('token', $token)->first();

        if (!$invitation) {
            return redirect()->route('formRegister')->withErrors('Invalid or expired token.');
        }

        if ($invitation->expires_at && $invitation->expires_at->isPast()) {
            return redirect()->route('formRegister')->withErrors('This invitation has expired.');
        }

        // Check if the role is either 'Super Admin' or 'Admin'
        if (in_array($invitation->role, ['Super Admin'])) {
            return view('emails.register.register', [
                'token' => $token,
                'email' => $invitation->email,
                'role' => $invitation->role
            ]);
        }
        $residence = Residence::findOrFail($invitation->residence_id);
        // dd($residence);

        return view('emails.register.register', [
            'token' => $token,
            'email' => $invitation->email,
            'role' => $invitation->role,
            'residence' => $residence
        ]);
    }

    public function create(Request $request)
    {
        $token = $request->query('token');

        if (!$token || !$invitation = Invitation::where('token', $token)->first()) {
            return redirect()->route('home')->withErrors('Invalid or missing token.');
        }

        return view('auth.register', [
            'token' => $token,
            'email' => $invitation->email,
            'role' => $invitation->role,
            'residence_id' => $invitation->residence_id,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'immeuble' => 'required|string|max:255',
            'appartement' => 'required|string|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'email' => 'required|email|exists:invitations,email',
            'role' => 'required|string|exists:roles,name',
            'residence_id' => 'nullable|exists:residences,id',
            'token' => 'required|string|exists:invitations,token',
        ]);

        $user = User::create([
            'prenom' => $request->prenom,
            'name' => $request->nom,
            'phone' => $request->telephone,
            'Num_Immenble' => $request->immeuble,
            'Num_Appartement' => $request->appartement,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'residence_id' => $request->residence_id, // Store the residence ID
        ]);

        $user->assignRole($request->role);

        event(new Registered($user));

        // Delete the invitation after user registration
        Invitation::where('token', $request->token)->delete();

        Auth::login($user);

        return redirect(route('dashboard.index'))->with('status', 'Registration successful!');
    }



    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function searchContacts(Request $request)
    {
        // Get the search input, or default to an empty string
        $search = $request->search ?? '';
        // Query for users involved in conversations
        $users = Message::join('users', function ($join) {
                $join->on('ch_messages.from_id', '=', 'users.id')
                     ->orOn('ch_messages.to_id', '=', 'users.id');
            })
            ->leftjoin('residences', 'users.residence_id', '=', 'residences.id')
            ->where('users.residence_id', Auth::user()->residence_id) 
            // ->where(function ($query) {
            //     $query->where('ch_messages.from_id', Auth::id())
            //           ->orWhere('ch_messages.to_id', Auth::id());
            // })
            ->where('users.name', 'like', '%' . $search . '%') // Search by user name
            ->where('users.id', '!=', Auth::id()) // Exclude the current user
            ->distinct('users.id') // Ensure unique users
            ->select('users.*') // Select user details
            ->paginate(10); // Optionally paginate results
    
        // Return the view with users
        return view('tchat.show', compact('users'));
    }
/*     public function getGroup(Request $request)
    {
        // Get the search input, or default to an empty string
        $search = $request->search ?? '';
        // Query for users involved in conversations
        $users = Message::join('users', function ($join) {
                $join->on('ch_messages.from_id', '=', 'users.id')
                     ->orOn('ch_messages.to_id', '=', 'users.id');
            })
            ->leftjoin('residences', 'users.residence_id', '=', 'residences.id')
            ->where('users.residence_id', Auth::user()->residence_id) 
            // ->where(function ($query) {
            //     $query->where('ch_messages.from_id', Auth::id())
            //           ->orWhere('ch_messages.to_id', Auth::id());
            // })
            ->where('users.name', 'like', '%' . $search . '%') // Search by user name
            ->where('users.id', '!=', Auth::id()) // Exclude the current user
            ->distinct('users.id') // Ensure unique users
            ->select('users.*') // Select user details
            ->paginate(10); // Optionally paginate results
    
        // Return the view with users
        return view('tchat.show_group', compact('users'));
    }



    
 */

 public function getGroup(Request $request)
{
    // Get the search input, or default to an empty string

    function getCurrentUrl() {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'];
        $requestUri = $_SERVER['REQUEST_URI'];
        
        return $protocol . $host . $requestUri;
    }

    $url = getCurrentUrl();



    $search = $request->search ?? '';

    // Get the residence ID from the URL if it exists
    $residenceId = null;
    
    // Check if there is a query string and if it starts with a number
    if ($request->query() && preg_match('/^\d+$/', $request->getQueryString())) {
        
        $residenceId = intval($request->getQueryString()); // Convert to integer
        
    } else {
        $residenceId = Auth::user()->residence_id; // Fallback to the authenticated user's residence ID
    }

    

    // Query for users who belong to the specified residence
    $users = User::leftJoin('residences', 'users.residence_id', '=', 'residences.id')
            ->where('users.residence_id', $residenceId) // Use the residence ID from the URL or authenticated user
            ->where('users.name', 'like', '%' . $search . '%') // Search by user name
            ->where('users.id', '!=', Auth::id()) // Exclude the current user
            ->distinct('users.id') // Ensure unique users
            ->select('users.*') // Select user details
            ->paginate(10); // Optionally paginate results

    // Return the view with users
    return view('tchat.show_group', compact('users'));
}

    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        // dd($request->all());

        $residence = Residence::findOrFail($id);

        // Validate the form data
        $request->validate([
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust the max size as needed
            'phone' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $user->image = $imagePath;
            // dd($imagePath);
        }
        // if ($request->hasFile('profile_image')) {
        //     $file = $request->file('profile_image');
        //     dd($file->getClientOriginalName(), $file->getSize(), $file->getMimeType());
        // }

        if ($request->filled('phone')) {
            $user->phone = $request->phone;
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('reglages.show', $residence)->with('status', 'Profile updated successfully!');
    }


    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $residence = Residence::findOrFail($user->residence_id);
        $user->roles()->detach();
        $user->delete();

        // Optionally, you can also delete associated invitations or other related records
        Invitation::where('email', $user->email)->delete();

        // Redirect back with a success message
        return redirect()->route('reglages.show', $residence)->with('status', 'User deleted successfully!');
    }


    
}
