<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Find or create the user and store avatar URL
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt('password'), // Add a default password
                'avatar' => $googleUser->getAvatar(), // Store the avatar URL
            ]
        );

        // If the user already exists, update the avatar
        if ($user->avatar !== $googleUser->getAvatar()) {
            $user->avatar = $googleUser->getAvatar();
            $user->save();
        }

        Auth::login($user);

        return redirect('/dashboard');
    }
}
