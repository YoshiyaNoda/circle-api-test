<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class OAuthTestController extends Controller
{
    public function test() {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback($provider = 'google') {
        try {
            $providerUser = Socialite::with('provider')->user();
            $email = $providerUser->getEmail() ?? null;
            $providerId = $providerUser->getId();
            // if($email) {

            // }

            return redirect("http://localhost:8080");
        } catch(\Exception $e) {
            $message = "authentication failed !!";
            return redirect("http://localhost:8000");
        }
    }
}
