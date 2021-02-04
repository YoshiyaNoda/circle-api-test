<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class OAuthTestController extends Controller
{
    public function test() {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback($provider) {

        try {
            $providerUser = Socialite::with($provider)->user();
            $email = $providerUser->getEmail() ?? null;
            $providerId = $providerUser->getId();

            // return redirect("http://localhost:8080/#".$providerUser->token);
            $msg = $providerUser->token;
            return view('debug', compact('msg'));
        } catch(\Exception $e) {
            $msg = "authentication failed !!";
            return view('debug', compact('msg'));
        }
    }
}
