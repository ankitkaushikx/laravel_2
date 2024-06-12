<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('posts.index');
// })->name('home');
Route::view('/', 'posts.index')->name('home');

//Registeration
Route::view('/register', 'auth.register')->name('register');
Route::post('/register', [AuthController::class, 'register']);

//Login
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login']);