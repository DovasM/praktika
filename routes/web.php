<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PostController::class, 'index'])->
middleware(['auth'])->name('dashboard');

Route::get('/contacts', function () {
    return view('contacts');
})->middleware(['auth'])->name('contacts');

Route::get('/about', function () {
    return view('about');
})->middleware(['auth'])->name('about');

Route::get('/reviews', function () {
    return view('review');
})->middleware(['auth'])->name('reviews');

Route::post('review_submit', [PostController::class, 'review_submit'])->name('review_submit');

// XLS import
Route::get('invoice/export/', [PostController::class, 'export'])->name('invoice_export');

// XLS export
Route::get('review/export/', [ReviewController::class, 'export'])->name('review_export');

// Filtering
Route::get('/filtras', [PostController::class, 'filtravimas'])->
middleware(['auth'])->name('filtras');

// File download
Route::get('dwl-file/{file_name}', [FileController::class, 'downloadFile']);

// File upload
Route::get('upl-file', [FileController::class, 'createForm']);
Route::post('upl-file', [FileController::class, 'fileUpload'])->name('fileUpload');





require __DIR__.'/auth.php';

Route::resource('post', PostController::class);
Route::resource('review', ReviewController::class);
