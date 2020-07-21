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
// Route::post('/register', function (Request $request) {
//    return response()->json($request->all());
// });

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'AuthController@login');

Route::middleware(['auth:api', 'role'])->group(function() {
    Route::middleware(['scope:root, supervisor, administrator, doctor, medical_representative'])
        ->get('logout', 'AuthController@logout');

    Route::middleware(['scope:root'])
        ->post('create-director', 'API\UserController@createDirector');
    Route::middleware(['scope:root'])
        ->get('index', 'API\UserController@index');
    Route::middleware(['scope:root'])->get('get-user/{userId}', 'API\UserController@getUser');
    Route::middleware(['scope:root'])
        ->put('update-director/{id}', 'API\UserController@updateDirector');
});
