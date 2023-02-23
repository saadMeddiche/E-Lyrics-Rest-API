<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
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

/* Show One Parole */
Route::get('Paroles/{id}', [ParoleController::class, 'show']);

/* Add A Parole */
Route::post('Parole/add', [ParoleController::class, 'store']);

/* Update A Parole */
Route::put('Parole/{id}', [ParoleController::class, 'update']);

/* Delete A Parole */
Route::delete('Parole/{id}', [ParoleController::class, 'destroy']);
/*================================End Paroles================================*/

/*================================Roles================================*/
/* Show All Role */
Route::get('Roles', [RoleController::class, 'index']);

/* Show One Role */
Route::get('Roles/{id}', [RoleController::class, 'show']);

/* Add A Role*/
Route::post('Role/add', [RoleController::class, 'store']);

/* Update A Role */
Route::put('Role/{role_id}', [RoleController::class, 'update']);

/* Show permissions of a  Role */
Route::get('Roles/permissions/{role_id}', [RoleController::class, 'ShowPermissionsOfaRole']);

/* Show roles of a User */
Route::get('User/roles/{user_id}', [RoleController::class, 'ShowRolesOfaPermissions']);

/* Delete A Role */
Route::delete('Role/{role_id}', [RoleController::class, 'destroy']);

/* Assign Permissions to Role */
Route::post('Role/assignPermissions', [RoleController::class, 'assignPermissions']);

/* Assign Role to User */
Route::post('Role/assignRole', [RoleController::class, 'assignRole']);

/* Remove Permissions from a Role */
Route::post('Role/RemovePermissions', [RoleController::class, 'RemovePermissions']);

/* Remove Role from a user */
Route::post('Role/RemoveRole', [RoleController::class, 'RemoveRole']);

/*================================End Roles================================*/
