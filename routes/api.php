<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\api\UsersController;
use App\Http\Controllers\SessionsController as SessionsController;
use App\Http\Controllers\api\sessionsController as apiSessionsController;

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

Route::post('/register', [UsersController::class, 'store']);
Route::post('/login', [UsersController::class, 'login']);

Route::post('/scan', [apiSessionsController::class, 'scan']);
// route group for authenticated users
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/reset', [UsersController::class, 'reset']);
    // Route::get('/totalmoneym', [SessionsController::class, 'totalMoneyAll']);
    // Route::get('/totalmoneya', [SessionsController::class, 'totalMoneyMonth']);


});
Route::post('qr', [QrCodeController::class, 'index'])->name('qr');
Route::get('/totalmoney', [SessionsController::class, 'totalMoney']);
