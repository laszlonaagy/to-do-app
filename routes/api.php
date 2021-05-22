<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Endpoint for handle ToDos
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('todos', [ToDoController::class, 'index']);
    Route::get('todos/{todo}', [ToDoController::class, 'show']);
    Route::post('todos', [ToDoController::class, 'store']);
    Route::put('todos/{todo}', [ToDoController::class, 'update']);
    Route::delete('todos/{todo}', [ToDoController::class, 'delete']);
});

// Endpoint for handle Users
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('users',  [UserController::class, 'index']);
    Route::get('users/{user}',  [UserController::class, 'show']);
    Route::post('users',  [UserController::class, 'store']);
    Route::put('users/{user}',  [UserController::class, 'update']);
    Route::delete('users/{user}',  [UserController::class, 'delete']);
});

// Register user
Route::post('register', [RegisterController::class, 'register']);

// Login user
Route::post('login', [LoginController::class, 'login']);

// Logut user
Route::post('logout', [LoginController::class, 'logout']);