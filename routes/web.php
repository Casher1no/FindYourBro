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

Route::get('/',function (){
    return view('/home');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/edit',[\App\Http\Controllers\ProfileController::class,'edit'])
    ->name('editProfile')
    ->middleware('auth');

Route::post('/update',[\App\Http\Controllers\ProfileController::class,'update'])
    ->name('updateProfile')
    ->middleware('auth');

Route::post('/update/name',[\App\Http\Controllers\ProfileController::class,'updateName'])
    ->name('updateName');
