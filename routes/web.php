<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FilePathController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
