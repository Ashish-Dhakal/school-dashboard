<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PostTypeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // route for the gallery
    Route::prefix('/gallery')->name('gallery.')->group(function () {
        Route::get('/', [GalleryController::class, 'index'])->name('index');
        Route::post('/store', [GalleryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [GalleryController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [GalleryController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [GalleryController::class, 'destroy'])->name('destroy');
    });


    // route for the content
    Route::prefix('/content')->name('content.')->group(function () {
        Route::get('/', [ContentController::class, 'index'])->name('index');
        Route::get('/create', [ContentController::class, 'create'])->name('create');
        Route::post('/store', [ContentController::class, 'store'])->name('store');
    });

    // route for the postType
    Route::prefix('/post-type')->name('postType.')->group(function () {
        Route::get('/', [PostTypeController::class, 'index'])->name('index');
        Route::get('/create', [PostTypeController::class, 'create'])->name('create');
        Route::get('/edit/{slug}', [PostTypeController::class, 'edit'])->name('edit');
        Route::post('/update/{slug}', [PostTypeController::class, 'update'])->name('update');
        Route::post('/store', [PostTypeController::class, 'store'])->name('store');
        Route::delete('/destroy/{slug}', [PostTypeController::class, 'destroy'])->name('destroy');
        route::post('/updatePinStatus', [PostTypeController::class, 'updatePinStatus'])->name('updatePinStatus');
    });

       // route for the program
       Route::prefix('/program')->name('program.')->group(function () {
        Route::get('/', [ProgramController::class, 'index'])->name('index');
        Route::get('/create', [ProgramController::class, 'create'])->name('create');
        Route::post('/store', [ProgramController::class, 'store'])->name('store');
        Route::get('/edit/{slug}', [ProgramController::class, 'edit'])->name('edit');
        Route::post('/update/{slug}', [ProgramController::class, 'update'])->name('update');
        Route::delete('/destroy/{slug}', [ProgramController::class, 'destroy'])->name('destroy');
    });

       // route for the about
       Route::prefix('/about')->name('about.')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->name('index');
        Route::get('/create', [AboutController::class, 'create'])->name('create');
        Route::post('/store', [AboutController::class, 'store'])->name('store');
        Route::get('/edit/{slug}', [AboutController::class, 'edit'])->name('edit');
        Route::post('/update/{slug}', [AboutController::class, 'update'])->name('update');
        Route::delete('/destroy/{slug}', [AboutController::class, 'destroy'])->name('destroy');
    });

       // route for the Notice
       Route::prefix('/notice')->name('notice.')->group(function () {
        Route::get('/', [NoticeController::class, 'index'])->name('index');
        Route::get('/create', [NoticeController::class, 'create'])->name('create');
        Route::post('/store', [NoticeController::class, 'store'])->name('store');
        Route::get('/edit/{slug}', [NoticeController::class, 'edit'])->name('edit');
        Route::post('/update/{slug}', [NoticeController::class, 'update'])->name('update');
        Route::delete('/destroy/{slug}', [NoticeController::class, 'destroy'])->name('destroy');
    });
});
