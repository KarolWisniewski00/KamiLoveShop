<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusketController;
use App\Http\Controllers\PagesController;

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
Route::get('/admin',[AdminController::class, 'admin'])->name('admin')->middleware('AdminCheck');

Route::get('/admin/categories',[AdminController::class, 'categories'])->name('categories')->middleware('AdminCheck');
Route::get('/admin/categories/new',[AdminController::class, 'categories_new'])->name('categories_new')->middleware('AdminCheck');
Route::post('/admin/categories/new',[AdminController::class, 'categories_new_form'])->name('categories_new_form');
Route::get('/admin/categories/delete/{id}',[AdminController::class, 'categories_delete']);
Route::get('/admin/categories/edit/{id}',[AdminController::class, 'categories_edit'])->middleware('AdminCheck');
Route::post('/admin/categories/edit/{id}',[AdminController::class, 'categories_edit_form'])->middleware('AdminCheck');

Route::get('/admin/products',[AdminController::class, 'products'])->name('products')->middleware('AdminCheck');

//PAGES DYNAMIC
Route::get('/category/{url}',[PagesController::class, 'pages']);
Route::get('/product/{id}',[ProductController::class, 'product']);