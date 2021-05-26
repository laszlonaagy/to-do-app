<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PriorityController;


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

// Endpoint for handle ToDos
Route::group(['middleware' => 'api'], function() {
    Route::get('todos', [ToDoController::class, 'index']);
    Route::get('todos/{todo}', [ToDoController::class, 'show']);
    Route::post('todos', [ToDoController::class, 'store']);
    Route::put('todos/{todo}', [ToDoController::class, 'update']);
    Route::delete('todos/{todo}', [ToDoController::class, 'delete']);
    Route::get('userTodos/{user_id}', [ToDoController::class, 'userTodos']);
    Route::get('priorities', [PriorityController::class, 'index']);
});

// Endpoint for handle Users
Route::group(['middleware' => 'api'], function() {
    Route::get('users',  [UserController::class, 'index']);
    Route::get('users/{user}',  [UserController::class, 'show']);
    Route::post('users',  [UserController::class, 'store']);
    Route::put('users/{user}',  [UserController::class, 'update']);
    Route::delete('users/{user}',  [UserController::class, 'delete']);
    Route::post('user-image-upload', [FileUploadController::class, 'imageUpload']);
    Route::get('user-image-download/{file_name}', [FileUploadController::class, 'getImage']);
});

// Authentication
Route::middleware(['api'])->group(function () {
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout',  [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);
});

Route::middleware(['cors'])->group(function () {
    Route::post('register', [RegisterController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout',  [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);

    Route::get('users',  [UserController::class, 'index']);
    Route::get('users/{user}',  [UserController::class, 'show']);
    Route::post('users',  [UserController::class, 'store']);
    Route::put('users/{user}',  [UserController::class, 'update']);
    Route::delete('users/{user}',  [UserController::class, 'delete']);

    Route::get('todos', [ToDoController::class, 'index']);
    Route::get('todos/{todo}', [ToDoController::class, 'show']);
    Route::post('todos', [ToDoController::class, 'store']);
    Route::put('todos/{todo}', [ToDoController::class, 'update']);
    Route::delete('todos/{todo}', [ToDoController::class, 'delete']);

    Route::get('priorities', [PriorityController::class, 'index']);
});