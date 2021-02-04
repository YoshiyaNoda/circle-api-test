<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['api', 'session'])->group(function() {
    Route::get('/testmsg', function() {
        return 'This is Laravel';
    });
    Route::get('oauth-test', 'OAuthTestController@test');
    Route::get('auth/{provider}/callback', 'OAuthTestController@handleProviderCallback');
});
