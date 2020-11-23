<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\ {
    UserController,
    AreaController,
    RegionController,
};

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
Route::fallback(function () {
    return response()->json(['message' => __('Service Unavailable')], 404);
});

Route::post('login', [AuthController::class, 'login']);

Route::get('/areas', [AreaController::class, 'index']);

Route::get('/regions', [RegionController::class, 'index']);
Route::get('/regions/{id}', [RegionController::class, 'show']);
Route::resource('cities', API\CityController::class);
Route::resource('streets', API\StreetController::class);

Route::middleware(['auth:api', 'role'])->group(function() {
    Route::get('user', [UserController::class, 'getUser']); // !scope
    Route::get('logout', [AuthController::class, 'logout']); // !scope

    Route::group(['middleware' => ['scope:root']], function() {
        Route::post('/areas/store', [AreaController::class, 'store']);
        Route::post('/regions/store', [RegionController::class, 'store']);
    });
    Route::patch('change-password', [UserController::class, 'changePassword'])
        ->name('change.password')
        ->middleware('scope:change-password');

    Route::group(['prefix' => 'director', 'middleware' => ['scope:root']],
        function() {
            Route::get('/', [UserController::class, 'indexDirector']);
            Route::post('create', [UserController::class, 'createDirector']);
            Route::get('/{id}', [UserController::class, 'getDirector']);
            Route::put('/{id}', [UserController::class, 'updateDirector']);
            Route::patch('active/{id}', [UserController::class, 'active'])
                ->where('id','[0-9]+');
    });

    Route::group(['middleware' => ['scope:root,director,supervisor,administrator']], function() {
        Route::patch('send-email/{id}', [UserController::class, 'sendEmail'])
            ->name('send.email');
    });

});
