<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/user')->group(function (){
    Route::post('/login','LoginController@login');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::POST('/register','LoginController@register');

        Route::GET('/','UserController@all');
        Route::GET('/{user_id}','UserController@getUser');
    });
});
