<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


// Redirect the root URL to the posts index page
Route::redirect('/', 'posts')->name('home');

// Group routes that require authentication
Route::middleware('auth')->group(function () {
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('verified')->name('dashboard');
    
    // Logout route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Email Verification Route
    Route::get('/email/verify', [AuthController::class, 'sendEmailNotice'])->name('verification.notice');

    // Email Verification Handler
    Route::get('/email/verify/{id}/{hash}',[AuthController::class,'verifyEmail'])->middleware( 'signed')->name('verification.verify');

    //Resend Verification Email
     Route::post('/email/verification-notification',[Authcontroller::class, 'verifyHandler'] )->middleware('throttle:6,1')->name('verification.send');
});

// Setup resourceful routes for PostController
Route::resource('posts', PostController::class);

// Route to display posts by a specific user
Route::get('/{user}/posts', [DashboardController::class, 'userPosts'])->name('posts.user');

// Group routes that require the guest middleware
Route::middleware('guest')->group(function () {
    // Registration routes
    Route::view('/register', 'auth.register')->name('register'); // Registration form view
    Route::post('/register', [AuthController::class, 'register']); // Handle registration form submission

    // Login routes
    Route::view('/login', 'auth.login')->name('login'); // Login form view
    Route::post('/login', [AuthController::class, 'login']); // Handle login form submission
});

