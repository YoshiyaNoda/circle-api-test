<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class OAuthTestController extends Controller
{
    public function test() {
        // return Socialite::driver('google')->redirect();
        return Socialite::driver('google')->redirect()->getTargetUrl();
    }
    public function handleProviderCallback($provider) {
        // $providerUser = Socialite::with($provider)->user();
        $providerUser = Socialite::with($provider)->stateless()->user(); // Laravel\Socialite\Two\InvalidStateException のエラーを解決するためにはこうしないといけないらしい

        try {
            $email = $providerUser->getEmail() ?? null;
            $providerId = $providerUser->getId();

            return redirect("http://localhost:8080/#".$providerUser->token);
        } catch(\Exception $e) {
            $msg = "認証に失敗しました。\n元のページに戻ってください。";
            return view('debug', compact('msg'));
        }
    }
}
