<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
   public function register(Request $request){
      //Register User

      //Validate
    $fields =   $request->validate([
         'username' => ['required', 'max:255', 'min:4'],
         'email' => ['required', 'max:255', 'email', 'unique:users'],
         'password' => ['required', 'min:3', 'confirmed']
      ]);

 

      //Register
       $user = User::create($fields);

      //Login
      Auth::login($user);

      //Redirect
      return redirect()->route('home');
   }
// login user
   public  function login(Request $request){
      $fields = $request->validate([
         'email' => ['required', 'max:255', 'email'],
         'password' => ['required']
      ]);

      //login the user
      if(Auth::attempt($fields, $request->remember)){
         return redirect()->intended('/dashboard');
      } else {
         return back()->withErrors([
            'failed' => "The Provided Email and Password do not match our credentails"
         ]);
      }

   }

//Logout 
   public function logout(Request $request){
      Auth::logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();

      return redirect('/');
   }
}
