<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Residence;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.connect');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();


        if (!Auth::user()->hasAnyRole(['superAdmin', 'Admin'])) {
            // After authentication, check if the user's residence is active
            $user = Auth::user(); // Get the authenticated user
            $residence = Residence::find($user->residence_id); // Assuming residence_id exists in users table
            
            // Check if the residence is inactive
            if ($residence && $residence->active == 1) {
                // Log out the user immediately
                Auth::logout();

                // Throw a validation exception with a custom message
                throw ValidationException::withMessages([
                    'residenceInactive' => ['Your residence is inactive. You cannot log in.'],
                ]);
            }
        }


        $request->session()->regenerate();
        // Store login time in session
        $request->session()->put('login_time', now());

        return redirect()->intended(route('index', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
