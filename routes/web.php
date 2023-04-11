<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BusketController;

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

Route::get('/', [IndexController::class, 'index'])->name('index');

//AUTH
Route::get('/login',[AuthController::class,'login_page'])->middleware('AlreadyLoggedIn');
Route::get('/register',[AuthController::class,'register_page'])->middleware('AlreadyLoggedIn');
Route::post('/login',[AuthController::class,'login_form'])->name('login_form');
Route::post('/register',[AuthController::class,'register_form'])->name('register_form');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('isLoggedIn');

//PAGES ACCOUNT
Route::get('/account',[AccountController::class, 'account'])->middleware('isLoggedIn');
Route::get('/edit',[AccountController::class, 'edit'])->middleware('isLoggedIn');
Route::post('/edit',[AccountController::class, 'edit_form'])->name('edit_form');
Route::get('/busket',[BusketController::class, 'busket'])->middleware('isLoggedIn');
Route::get('/history',[AccountController::class, 'history'])->middleware('isLoggedIn');