<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 
Route::get('/client',[AuthController::class,'getClient'])->name('client.index');

Route::get('/login',[AuthController::class,'getLogin'])->name('login');
Route::post('/login',[AuthController::class,'postLogin'])->name('postLogin');

Route::get('/register',[AuthController::class,'getRegister'])->name('register');
Route::post('/register',[AuthController::class,'postRegister'])->name('postRegister');

Route::get('/updateUser/{user}/edit',[AuthController::class,'editUser'])->name('editUser');
Route::put('/updateUser/{user}/edit',[AuthController::class,'updateUser'])->name('updateUser');

Route::get('/updatePassword/edit',[AuthController::class,'editPassword'])->name('editPassword');
Route::post('/updatePassword/edit',[AuthController::class,'updatePassword'])->name('updatePassword');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::middleware(['auth','admin'])->group(function(){
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('users/{id}/activate',[UserController::class,'activate'])->name(('users.activate'));
    Route::post('users/{id}/deactivate',[UserController::class,'deactivate'])->name(('users.deactivate'));
});