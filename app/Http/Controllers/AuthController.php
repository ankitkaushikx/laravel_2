<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Register a new user
    public function register(Request $request)
    {
        // Validate input fields
        $fields = $request->validate([
            'username' => ['required', 'max:255', 'min:4'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed']
        ]);

        // Register the user
        $user = User::create($fields);

        // Log in the user
        Auth::login($user);

        //Email Verification Stuff
        event(new Registered($user));

        //check and send newsletter subscribe email
        if($request->subscribe){
            //call our event
            event(new UserSubscribed($user));
        }

        // Redirect
        return redirect()->route('dashboard');
    }

     //Verification Email Sender
     public function sendEmailNotice () {
     return view('auth.verify-email');
    }


    // Verify Email Handler
    public  function verifyEmail(EmailVerificationRequest $request) {
    $request->fulfill();
        return redirect()->route('dashboard');
    }


    /// Resend Verification Email
    public function verifyHandler (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
    }


    // Log in an existing user
    public function login(Request $request)
    {
        // Validate input fields
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);

        // Attempt to log in the user
        if (Auth::attempt($fields, $request->remember)) {
            // Redirect to the intended page (default is /dashboard)
            return redirect()->intended('/dashboard');
        } else {
            // Return back with error if login fails
            return back()->withErrors([
                'failed' => "The provided email and password do not match our credentials"
            ]);
        }
    }

    // Log out the user
    public function logout(Request $request)
    {
        // Log out the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token
        $request->session()->regenerateToken();

        // Redirect to the home page
        return redirect('/');
    }
}
