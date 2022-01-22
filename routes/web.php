<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

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

Route::get('invoice/export/', [PostController::class, 'export'])->name('invoice_export');

Route::get('review/export/', [ReviewController::class, 'export'])->name('review_export');

Route::get('/filtras', [PostController::class, 'filtravimas'])->
middleware(['auth'])->name('filtras');

Route::get('get/{file_name}', [FileController::class, 'downloadFile']);

// Route::get('/post', function () {
//     return view('post');
// })->middleware(['auth'])->name('post');



require __DIR__.'/auth.php';

Route::resource('post', PostController::class);
Route::resource('review', ReviewController::class);
