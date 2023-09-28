<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth_Controller;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome')->name('home');
});

// Route::get('login',[Auth_Controller::class,'index'])->name('login');
// Route::get('register',[Auth_Controller::class,'register_view'])->name('register');

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'loginPost'])->name('login.post');

Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register',[UserController::class,'registerPost'])->name('register.post');

Route::get('/logout',[UserController::class,'logout'])->name('logout');


