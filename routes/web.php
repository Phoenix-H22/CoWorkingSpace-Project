<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\FilePathController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\GeneratedController;
use App\Http\Controllers\Auth\LogoutController;


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


Auth::routes();

Route::get('/upload-file', [FilePathController::class, 'createForm']);
Route::post('/upload-file', [FilePathController::class, 'fileUpload'])->name('fileUpload');
Route::get('/admin',[AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/logout', [LogoutController::class, 'perform'])->name('logout');
Route::get('/qr', [GeneratedController::class, 'qr'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/user', [UsersController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/user/create', [UsersController::class, 'create'])->name('admin.user.create');
    Route::get('/admin/user/edit/{id}', [UsersController::class, 'edit'])->name('admin.user.edit');
    Route::post('/admin/user/update/{id}', [UsersController::class, 'update'])->name('admin.user.update');
    Route::get('/admin/user/delete/{id}', [UsersController::class, 'delete'])->name('admin.user.delete');
    Route::post('/admin/user/store', [UsersController::class, 'store'])->name('admin.user.store');

})->name('admin.users');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/sessions', [SessionsController::class, 'index'])->name('admin.sessions.index');
    Route::get('/admin/sessions/create', [SessionsController::class, 'create'])->name('admin.sessions.create');
    Route::get('/admin/sessions/scan/{id}', [SessionsController::class, 'edit'])->name('admin.sessions.scan');
    Route::post('/admin/sessions/update/{id}', [SessionsController::class, 'update'])->name('admin.sessions.update');
    Route::post('/admin/sessions/store', [SessionsController::class, 'store'])->name('admin.sessions.store');

})->name('admin.sessions');
// Route::get('/scan', [SessionsController::class, 'scan'])->name('admin.sessions.scan');

Route::get('qr', [QrCodeController::class, 'index']);
Route::get('cam', [QrCodeController::class, 'cam']);


