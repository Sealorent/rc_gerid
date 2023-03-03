<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended(RouteServiceProvider::HOME);
            } else {

                $newUser = new User;
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                $newUser->google_id = $user->id;
                $newUser->avatar = $user->avatar;
                $newUser->role = 'pengguna';
                $newUser->password = Hash::make(Str::random(8));
                $newUser->save();

                Auth::login($newUser);

                return redirect()->intended(RouteServiceProvider::HOME);
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
