<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('posts.index');
// })->name('home');
Route::view('/', 'posts.index')->name('home');

Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware('guest')->group(function () {

  //Registeration
  Route::view('/register', 'auth.register')->middleware('guest')->name('register');
  Route::post('/register', [AuthController::class, 'register']);

  //Login
  Route::view('/login', 'auth.login')->middleware('guest')->name('login');
  Route::post('/login', [AuthController::class, 'login']);
});


//Logout 