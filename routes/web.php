<?php

use App\Http\Controllers\ImageController;
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


Auth::routes();

Route::get('/', function () {
    return redirect(route('home'));
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');


// Navbar
Route::get('/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])
    ->name('editProfile')
    ->middleware('auth');

Route::post('/update', [\App\Http\Controllers\ProfileController::class, 'updatePicture'])
    ->name('updatePicture')
    ->middleware('auth');

Route::post('/update/name', [\App\Http\Controllers\ProfileController::class, 'updateProfile'])
    ->name('updateProfile')
    ->middleware('auth');

Route::get('/gallery', [\App\Http\Controllers\ProfileController::class, 'gallery'])
    ->name('gallery')
    ->middleware('auth');
// ------

// Gallery
Route::post('/upload', [\App\Http\Controllers\ProfileController::class, 'addToGallery'])
    ->name('addToGallery')
    ->middleware('auth');

Route::get('/gallery/delete/{id}', function ($id) {
    DB::table('user_gallery')->delete($id);
    return redirect('gallery');
})->name('deleteFromGallery');
