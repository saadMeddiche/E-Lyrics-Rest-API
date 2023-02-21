<?php

use App\Http\Controllers\MusicController;

use App\Http\Controllers\AlbumController;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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


});

Route::apiResource('/album', AlbumController::class)->middleware(['checkAdminManager']);

    Route::post('profile', 'profile');
    Route::patch('editProfile', 'editProfile');
});



