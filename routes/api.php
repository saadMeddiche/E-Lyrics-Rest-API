<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

/*================================Paroles================================*/
/* Show All Paroles */

Route::get('Paroles', [ParoleController::class, 'index']);

/* Add A Parole */
Route::post('Parole/add', [ParoleController::class, 'store']);

/* Update A Parole */
Route::put('Parole/{id}', [ParoleController::class, 'update']);

/* Delete A Parole */
Route::delete('Parole/{id}', [ParoleController::class, 'destroy']);
/*================================End Paroles================================*/
