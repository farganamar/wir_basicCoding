<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;

class AuthSocial extends Controller
{
    //
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {


            $googleUser = Socialite::driver($provider)->stateless()->user();
            $existUser = User::where('email', $googleUser->email)->first();


            if ($existUser) {

                Auth::loginUsingId($existUser->id);
            } else {
                $user = new User;
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                $user->provider = $provider;
                $user->provider_id = $googleUser->id;
                $user->jabatan = 'author';
                $user->password = Hash::make('user123456');
                $user->save();
                Auth::loginUsingId($user->id);
            }
            return redirect()->to('/dashboard');
        } catch (Exception $e) {
            return $e;
        }
    }

}
