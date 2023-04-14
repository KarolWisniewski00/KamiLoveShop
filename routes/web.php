<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ContactController;
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
Route::middleware(['AlreadyLoggedIn'])->group(function () {
    Route::get('/login', [AuthController::class, 'login_page']);
    Route::get('/register', [AuthController::class, 'register_page']);
    Route::post('/login', [AuthController::class, 'login_form'])->name('login_form');
    Route::post('/register', [AuthController::class, 'register_form'])->name('register_form');
});

Route::middleware(['isLoggedIn'])->group(function () {
    Route::get('/account', [AccountController::class, 'account']);
    Route::get('/edit', [AccountController::class, 'edit']);
    Route::post('/edit', [AccountController::class, 'edit_form'])->name('edit_form');
    Route::get('/busket', [BusketController::class, 'busket']);
    Route::get('/history', [AccountController::class, 'history']);
});

Route::middleware(['AdminCheck'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/', [StartAdminController::class, 'admin'])->name('admin');

        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoriesAdminController::class, 'categories'])->name('categories');
            Route::get('/new', [CategoriesAdminController::class, 'categories_new'])->name('categories_new');
            Route::post('/new', [CategoriesAdminController::class, 'categories_new_form'])->name('categories_new_form');
            Route::get('/delete/{id}', [CategoriesAdminController::class, 'categories_delete']);
            Route::get('/edit/{id}', [CategoriesAdminController::class, 'categories_edit']);
            Route::post('/edit/{id}', [CategoriesAdminController::class, 'categories_edit_form']);
        });
        Route::prefix('subcategories')->group(function () {
            Route::get('/new', [CategoriesAdminController::class, 'subcategories_new'])->name('subcategories_new');
            Route::post('/new', [CategoriesAdminController::class, 'subcategories_new_form'])->name('subcategories_new_form');
            Route::get('/delete/{id}', [CategoriesAdminController::class, 'subcategories_delete']);
            Route::get('/edit/{id}', [CategoriesAdminController::class, 'subcategories_edit']);
            Route::post('/edit/{id}', [CategoriesAdminController::class, 'subcategories_edit_form']);
        });

        Route::prefix('products')->group(function () {
            Route::get('/', [ProductsAdminController::class, 'products'])->name('products');
        });
        
        Route::prefix('hero')->group(function () {
            Route::get('/', [HeroAdminController::class, 'hero'])->name('hero');
            Route::get('/new', [HeroAdminController::class, 'hero_new'])->name('hero_new');
            Route::post('/new', [HeroAdminController::class, 'hero_new_form'])->name('hero_new_form');
            Route::get('/delete/{id}', [HeroAdminController::class, 'hero_delete']);
            Route::get('/edit/{id}', [HeroAdminController::class, 'hero_edit']);
            Route::post('/edit/{id}', [HeroAdminController::class, 'hero_edit_form']);
        });
    });
});

//PAGES DYNAMIC
Route::get('/category/{url}', [PagesController::class, 'pages']);
Route::get('/product/{id}', [ProductController::class, 'product']);

//PAGES STATIC
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/return', [ReturnController::class, 'return'])->name('return');
Route::get('/rules', [RulesController::class, 'rules'])->name('rules');
Route::get('/policy', [PolicyController::class, 'policy'])->name('policy');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
