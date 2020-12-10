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

Route::middleware(['auth:api', 'role'])->group(function() {

    // Address
    Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
    Route::get('/regions', [RegionController::class, 'index'])->name('regions.index');
    Route::get('/regions/{id}', [RegionController::class, 'show'])->name('regions.show');
    Route::resource('cities', API\CityController::class)->except([
        'store', 'create', 'destroy']);
    Route::resource('streets', API\StreetController::class);
    // end address

    Route::get('user', [UserController::class, 'getUser']); // !scope
    Route::get('logout', [AuthController::class, 'logout']); // !scope
    // Director
    Route::group(['middleware' => ['scope:director']], function() {
        Route::post('/areas', [AreaController::class, 'store'])->name('areas.store');
        Route::post('/regions', [RegionController::class, 'store'])->name('regions.store');
        Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
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
            Route::patch('active/{id}', [UserController::class, 'active'])
                ->where('id','[0-9]+');
    });
    // end Root

    Route::group(['middleware' => ['scope:root,director,supervisor,administrator']], function() {
        Route::patch('send-email/{id}', [UserController::class, 'sendEmail'])
            ->name('send.email');
    });

});
