<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\StationaryController;
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
Route::get('/logout', [LogoutController::class, 'perform'])->name('logout');
Route::group([],function(){

Route::get('/upload-file', [FilePathController::class, 'createForm']);
Route::post('/upload-file', [FilePathController::class, 'fileUpload'])->name('fileUpload');
Route::get('/admin/dashboard',[AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/qr', [GeneratedController::class, 'qr'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

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
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/kitchen', [KitchenController::class, 'index'])->name('admin.kitchen.index');
    Route::get('/admin/kitchen/create', [KitchenController::class, 'create'])->name('admin.kitchen.create');
    Route::post('/admin/kitchen/update/{id}', [KitchenController::class, 'update'])->name('admin.kitchen.update');
    Route::post('/admin/kitchen/store', [KitchenController::class, 'store'])->name('admin.kitchen.store');
    Route::get('/admin/kitchen/delete/{id}', [KitchenController::class, 'delete'])->name('admin.kitchen.delete');
    Route::get('/admin/kitchen/edit/{id}', [KitchenController::class, 'edit'])->name('admin.kitchen.edit');

})->name('admin.kitchen');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('admin.gallery.index');
    Route::get('/admin/gallery/create', [GalleryController::class, 'create'])->name('admin.gallery.create');
    Route::post('/admin/gallery/update/{id}', [GalleryController::class, 'update'])->name('admin.gallery.update');
    Route::post('/admin/gallery/store', [GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('/admin/gallery/delete/{id}', [GalleryController::class, 'delete'])->name('admin.gallery.delete');
    Route::get('/admin/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('admin.gallery.edit');

})->name('admin.gallery');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/stationary', [StationaryController::class, 'index'])->name('admin.stationary.index');
    Route::get('/admin/stationary/create', [StationaryController::class, 'create'])->name('admin.stationary.create');
    Route::post('/admin/stationary/update/{id}', [StationaryController::class, 'update'])->name('admin.stationary.update');
    Route::post('/admin/stationary/store', [StationaryController::class, 'store'])->name('admin.stationary.store');
    Route::get('/admin/stationary/delete/{id}', [StationaryController::class, 'delete'])->name('admin.stationary.delete');
    Route::get('/admin/stationary/edit/{id}', [StationaryController::class, 'edit'])->name('admin.stationary.edit');

})->name('admin.stationary');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/settings', [SettingsController::class, 'index'])->name('admin.settings.index');
    Route::post('/admin/settings/store', [SettingsController::class, 'store'])->name('admin.settings.store');
})->name('admin.settings');
});
// Route::get('/scan', [SessionsController::class, 'scan'])->name('admin.sessions.scan');


Route::get('scan', [QrCodeController::class, 'scan'])->name('checkout.scan');
Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('home', function(){
    return view('home');
});


