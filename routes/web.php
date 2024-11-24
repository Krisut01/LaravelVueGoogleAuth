<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;

// Welcome Page Route
Route::get('/', function () {
    return view('welcome');
});

// Google Authentication Routes
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// Dashboard Route (requires authentication)
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth');

Route::get('/dashboard', function () {
    $user = Auth::user(); // Retrieve the logged-in user
    return view('dashboard', ['user' => $user]);
})->middleware('auth');


// Login Page Route
Route::get('/login', function () {
    return view('login');
});
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');
