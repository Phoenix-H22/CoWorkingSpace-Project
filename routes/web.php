<?php

use App\Http\Controllers\FilePathController;
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
    return view('dashboard.admin.sessions.index');
});

Route::get('/upload-file', [FilePathController::class, 'createForm']);
Route::post('/upload-file', [FilePathController::class, 'fileUpload'])->name('fileUpload');