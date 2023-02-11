<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UsersController;

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

Route::get('/users', [UsersController::class, 'index'])->middleware("auth:sanctum");
Route::get('/users/{id}', [UsersController::class, 'show']);
Route::post('/time', [UsersController::class, 'getDifference']);

Route::post('/users', [UsersController::class, 'store']);
Route::post('/login', [UsersController::class, 'login']);



