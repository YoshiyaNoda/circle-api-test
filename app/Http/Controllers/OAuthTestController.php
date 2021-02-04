<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class OAuthTestController extends Controller
{
    public function test() {
        return Socialite::driver('google')->redirect()->getTargetUrl();
    }
}
