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
    // Route::middleware(['scope:root, supervisor, administrator, doctor, medical_representative'])
    //     ->get('logout', 'AuthController@logout');
    Route::get('user', 'API\UserController@getUser'); // !scope
    Route::get('logout', 'AuthController@logout'); // !scope
    Route::group(['middleware' => ['scope:root, director, supervisor, administrator, doctor, medical_representative']], function() {


    });

    Route::group(['prefix' => 'director', 'middleware' => ['scope:root']], function() {
        Route::get('/', 'API\UserController@indexDirector');
        Route::post('create', 'API\UserController@createDirector');
        Route::get('/{id}', 'API\UserController@getDirector');
        Route::put('/{id}', 'API\UserController@updateDirector');
    });

});
