<?php

use App\Enum\UserRoleEnum;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    // $user = DB::table('users')->insert([
    //     'name' => 'rachid daoudi',
    //     'email' => 'manager@gmail.com',
    //     'role' => UserRoleEnum::User,
    //     'password' => 'manager',
    // ]);
    // dd($user);
});
