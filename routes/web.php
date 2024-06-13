<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('posts.index');
// })->name('home');
// Route::view('/', 'posts.index')->name('home');

Route::redirect('/', 'posts')->name('home');

Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

//Setup Our Routes For POST Controller
Route::resource('posts', PostController::class);

Route::get('/{user}/posts', [DashboardController::class, 'userPosts'])->name('posts.user');

//Middleware to group routes for one  or more middleware
Route::middleware('guest')->group(function () {

  //Registeration
  Route::view('/register', 'auth.register')->middleware('guest')->name('register');
  Route::post('/register', [AuthController::class, 'register']);

  //Login
  Route::view('/login', 'auth.login')->middleware('guest')->name('login');
  Route::post('/login', [AuthController::class, 'login']);
});

//Logout 