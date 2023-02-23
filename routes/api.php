<?php

use App\Http\Controllers\MusicController;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ParoleController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/music', [MusicController::class, 'index']);
Route::get('/music/{music}', [MusicController::class, 'show']);
Route::middleware(['auth','checkAdmin'])->group(function () {
    Route::post('/music', [MusicController::class, 'store']);
    Route::put('/music/{music}', [MusicController::class, 'update']);
    Route::delete('/music/{music}', [MusicController::class, 'destroy']);
});


// Route::post('/test',function(){
//     return 15;
// })->middleware('checkManager');
Route::post('/test',function(){
    return 45;
})->middleware(['checkAdminManager','auth']);
Route::post('/test', function () {
    return 15;
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('profile', 'profile');
    Route::put('editProfile', 'editProfile');
});


Route::apiResource('/album', AlbumController::class)->middleware(['checkAdminManager']);
Route::apiResource('/artist', ArtistController::class)->middleware(['checkAdminManager']);

/*================================Paroles================================*/
/* Show All Paroles */
Route::get('Paroles', [ParoleController::class, 'index']);

/* Show One Parole */
Route::get('Paroles/{id}', [ParoleController::class, 'show']);


/* Add A Parole */
Route::post('Parole/add', [ParoleController::class, 'store']);

/* Update A Parole */
Route::put('Parole/{id}', [ParoleController::class, 'update']);

/* Delete A Parole */
Route::delete('Parole/{id}', [ParoleController::class, 'destroy']);
/*================================End Paroles================================*/

