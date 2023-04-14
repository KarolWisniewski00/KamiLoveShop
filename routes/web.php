<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\StartAdminController;
use App\Http\Controllers\CategoriesAdminController;
use App\Http\Controllers\ProductsAdminController;
use App\Http\Controllers\HeroAdminController;
use App\Http\Controllers\BusketController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;

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
Route::get('/admin',[StartAdminController::class, 'admin'])->name('admin')->middleware('AdminCheck');

Route::get('/admin/categories',[CategoriesAdminController::class, 'categories'])->name('categories')->middleware('AdminCheck');
Route::get('/admin/categories/new',[CategoriesAdminController::class, 'categories_new'])->name('categories_new')->middleware('AdminCheck');
Route::post('/admin/categories/new',[CategoriesAdminController::class, 'categories_new_form'])->name('categories_new_form');
Route::get('/admin/categories/delete/{id}',[CategoriesAdminController::class, 'categories_delete']);
Route::get('/admin/categories/edit/{id}',[CategoriesAdminController::class, 'categories_edit'])->middleware('AdminCheck');
Route::post('/admin/categories/edit/{id}',[CategoriesAdminController::class, 'categories_edit_form'])->middleware('AdminCheck');

Route::get('/admin/subcategories/new',[CategoriesAdminController::class, 'subcategories_new'])->name('subcategories_new')->middleware('AdminCheck');
Route::post('/admin/subcategories/new',[CategoriesAdminController::class, 'subcategories_new_form'])->name('subcategories_new_form');
Route::get('/admin/subcategories/delete/{id}',[CategoriesAdminController::class, 'subcategories_delete']);
Route::get('/admin/subcategories/edit/{id}',[CategoriesAdminController::class, 'subcategories_edit'])->middleware('AdminCheck');
Route::post('/admin/subcategories/edit/{id}',[CategoriesAdminController::class, 'subcategories_edit_form'])->middleware('AdminCheck');

Route::get('/admin/products',[ProductsAdminController::class, 'products'])->name('products')->middleware('AdminCheck');

Route::get('/admin/hero',[HeroAdminController::class, 'hero'])->name('hero')->middleware('AdminCheck');
Route::get('/admin/hero/new',[HeroAdminController::class, 'hero_new'])->name('hero_new')->middleware('AdminCheck');
Route::post('/admin/hero/new',[HeroAdminController::class, 'hero_new_form'])->name('hero_new_form');
Route::get('/admin/hero/delete/{id}',[HeroAdminController::class, 'hero_delete']);
Route::get('/admin/hero/edit/{id}',[HeroAdminController::class, 'hero_edit'])->middleware('AdminCheck');
Route::post('/admin/hero/edit/{id}',[HeroAdminController::class, 'hero_edit_form'])->middleware('AdminCheck');

//PAGES DYNAMIC
Route::get('/category/{url}',[PagesController::class, 'pages']);
Route::get('/product/{id}',[ProductController::class, 'product']);

//PAGES STATIC
Route::get('/about',[AboutController::class, 'about'])->name('about');
Route::get('/return',[ReturnController::class, 'return'])->name('return');
Route::get('/rules',[RulesController::class, 'rules'])->name('rules');
Route::get('/policy',[PolicyController::class, 'policy'])->name('policy');
Route::get('/contact',[ContactController::class, 'contact'])->name('contact');