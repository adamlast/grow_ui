<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Core\ConfigGenerator;

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

Route::get('/v1/request-qr-url/key/{device_id}',
    function ($device_id) {
        $key_manager = new \App\Core\KeyManager();
        $url = $key_manager->getURL($device_id);
        return $url;
    });

