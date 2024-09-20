<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');
Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');

// Route::get('/gallery',::class, 'index')->name('gallery.index');
