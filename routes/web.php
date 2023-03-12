<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDataController;

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

Route::get('index', [UserDataController::class, 'index']);

Route::get('registration', [UserDataController::class, 'registerPage']);

Route::get('dashboard', [UserDataController::class, 'dashboard']);

Route::get('users',[UserDataController::class, 'userPage']);

Route::post('registered', [UserDataController::class, 'createUser']);

Route::get('edit', [UserDataController::class, 'updatePage']); 

Route::get('edit-user{id}', [UserDataController::class, 'getUserId']);

Route::post('update{id}', [UserDataController::class, 'updateUser']);

Route::get('delete-user{id}', [UserDataController::class, 'deleteUser']);

Route::post('login',[UserDataController::class, 'loginUser']);

Route::get('logout',[UserDataController::class, 'logoutUser']);