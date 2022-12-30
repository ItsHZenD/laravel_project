<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function callback()
    {
        $user = Socialite::driver($provider)->user();

        $user = User::firstOrCreate([
            'email' => $user->getEmail()
        ], [
                'name' => $user->getName(),
                'avatar' => $user->getAvatar(),
            ])->first();

        Auth::login($user);
        return redirect()->route('register');
    }
}
