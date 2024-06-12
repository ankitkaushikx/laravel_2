<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
   public function register(Request $request){
      //Register User

      //Validate
      $request->validate([
         'username' => ['required', 'max:255'],
         'email' => ['required', 'max:255', 'email'],
         'password' => ['required', 'min:3', 'confirmed']
      ]);

      // Error

      //Register

      //Login


      //Redirect
   }
}
