<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\ {
    AreaController,
    CityController,
    RegionController,
    UserController,
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

Route::fallback(function () {
    return response()->json(['message' => __('Service Unavailable')], 404);
});

Route::post('login', [AuthController::class, 'login']);

Route::middleware(['auth:api', 'role'])->group(function() {

    // Address
    Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
    Route::get('/areas/{id}', [AreaController::class, 'show'])->name('area.show');
    Route::get('/regions', [RegionController::class, 'index'])->name('regions.index');
    Route::get('/regions/{id}', [RegionController::class, 'show'])->name('regions.show');
    Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
    // end address

    Route::get('user', [UserController::class, 'getUser']); // !scope
    Route::get('logout', [AuthController::class, 'logout']); // !scope
    // Director
    Route::group(['middleware' => ['scope:director']], function() {
        Route::post('/areas', [AreaController::class, 'store'])->name('areas.store');
        Route::put('/areas/{id}', [AreaController::class, 'update'])->name('areas.update');
        Route::post('/regions', [RegionController::class, 'store'])->name('regions.store');
        Route::put('/regions/{id}', [RegionController::class, 'update'])->name('regions.update');
        Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
        Route::put('/cities/{city}', [CityController::class, 'update'])->name('cities.update');
    });
    // end Director

    Route::patch('change-password', [UserController::class, 'changePassword'])
        ->name('password.change')
        ->middleware('scope:change-password');

    // Root
    Route::group(['prefix' => 'director', 'middleware' => ['scope:root']],
        function() {
            Route::get('/', [UserController::class, 'indexDirector']);
            Route::post('create', [UserController::class, 'createDirector']);
            Route::get('/{id}', [UserController::class, 'getDirector']);
            Route::put('/{id}', [UserController::class, 'updateDirector']);
            Route::patch('active/{id}', [UserController::class, 'active']);
    });
    // end Root

    Route::group(['middleware' => ['scope:root,director,supervisor,administrator']], function() {
        Route::patch('send-email/{id}', [UserController::class, 'sendEmail'])
            ->name('send.email');
    });

});
