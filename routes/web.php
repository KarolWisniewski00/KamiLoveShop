<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StartAdminController;
use App\Http\Controllers\CategoriesAdminController;
use App\Http\Controllers\ProductsAdminController;
use App\Http\Controllers\HeroAdminController;
use App\Http\Controllers\BusketController;
use App\Http\Controllers\BusketController2;
use App\Http\Controllers\CategoryAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RulesAdminController;
use App\Http\Controllers\PolicyAdminController;
use App\Http\Controllers\ReturnAdminController;
use App\Http\Controllers\SizesAdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderController2;
use App\Http\Controllers\PageHeroAdminController;
use App\Http\Controllers\PagePolicyAdminController;
use App\Http\Controllers\PageReturnAdminController;
use App\Http\Controllers\PageRuleAdminController;
use App\Http\Controllers\PhotoAdminController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\ProductController2;
use App\Http\Controllers\SizeAdminController;
use App\Http\Controllers\SubcategoryAdminController;
use App\Http\Controllers\UserAdminController;
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

//ALL
Route::prefix('/')->group(function () {
    Route::get('', [IndexController::class, 'index'])->name('index');
    Route::prefix('category')->group(function () {
        Route::get('{slug}', [CategoryController::class, 'show'])->name('category.show');
    });
    Route::prefix('product')->group(function () {
        Route::get('{slug}', [ProductController2::class, 'show'])->name('product.show');
    });
    Route::prefix('return')->group(function () {
        Route::get('/', [IndexController::class, 'index'])->name('return');
    });
    Route::prefix('rule')->group(function () {
        Route::get('/', [IndexController::class, 'index'])->name('rule');
    });
    Route::prefix('policy')->group(function () {
        Route::get('/', [IndexController::class, 'index'])->name('policy');
    });
    Route::prefix('contact')->group(function () {
        Route::get('/', [IndexController::class, 'index'])->name('contact');
    });
});

//AUTH
Route::middleware(['AlreadyLoggedIn'])->group(function () {
    Route::prefix('auth')->group(function () {
    });
});

//LOGGED IN
Route::middleware(['isLoggedIn'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::get('/edit/{slug}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update/{slug}', [UserController::class, 'update'])->name('user.update');
        Route::put('/delete', [UserController::class, 'delete'])->name('user.delete');

        Route::prefix('busket')->group(function () {
            Route::get('/', [BusketController2::class, 'index'])->name('user.busket');
        });
        Route::prefix('order')->group(function () {
            Route::get('/', [OrderController2::class, 'index'])->name('user.order');
            Route::get('{slug}', [OrderController2::class, 'show'])->name('user.order.show');
        });
    });
});

//ADMIN
Route::middleware(['AdminCheck'])->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/', [AdminController::class, 'index'])->name('admin');
        Route::get('/old', [StartAdminController::class, 'admin'])->name('admin.old');

        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryAdminController::class, 'index'])->name('admin.category');
            Route::get('/create', [CategoryAdminController::class, 'create'])->name('admin.category.create');
            Route::post('/store', [CategoryAdminController::class, 'store'])->name('admin.category.store');
            Route::get('/edit/{id}', [CategoryAdminController::class, 'edit'])->name('admin.category.edit');
            Route::put('/update/{id}', [CategoryAdminController::class, 'update'])->name('admin.category.update');
            Route::get('/delete/{id}', [CategoryAdminController::class, 'delete'])->name('admin.category.delete');
        });
        Route::prefix('subcategory')->group(function () {
            Route::get('/create', [SubcategoryAdminController::class, 'create'])->name('admin.subcategory.create');
            Route::post('/store', [SubcategoryAdminController::class, 'store'])->name('admin.subcategory.store');
            Route::get('/edit/{id}', [SubcategoryAdminController::class, 'edit'])->name('admin.subcategory.edit');
            Route::put('/update/{id}', [SubcategoryAdminController::class, 'update'])->name('admin.subcategory.update');
            Route::get('/delete/{id}', [SubcategoryAdminController::class, 'delete'])->name('admin.subcategory.delete');
        });
        Route::prefix('photo')->group(function () {
            Route::get('/', [PhotoAdminController::class, 'index'])->name('admin.photo');
            Route::get('/create', [PhotoAdminController::class, 'create'])->name('admin.photo.create');
            Route::post('/store', [PhotoAdminController::class, 'store'])->name('admin.photo.store');
            Route::get('/edit/{filename}', [PhotoAdminController::class, 'edit'])->name('admin.photo.edit');
            Route::put('/update/{filename}', [PhotoAdminController::class, 'update'])->name('admin.photo.update');
            Route::get('/delete/{filename}', [PhotoAdminController::class, 'delete'])->name('admin.photo.delete');
        });
        Route::prefix('size')->group(function () {
            Route::get('/', [SizeAdminController::class, 'index'])->name('admin.size');
            Route::get('/create', [SizeAdminController::class, 'create'])->name('admin.size.create');
            Route::post('/store', [SizeAdminController::class, 'store'])->name('admin.size.store');
            Route::get('/edit/{id}', [SizeAdminController::class, 'edit'])->name('admin.size.edit');
            Route::put('/update/{id}', [SizeAdminController::class, 'update'])->name('admin.size.update');
            Route::get('/delete/{id}', [SizeAdminController::class, 'delete'])->name('admin.size.delete');
        });
        Route::prefix('product')->group(function () {
            Route::get('/', [ProductAdminController::class, 'index'])->name('admin.product');
            Route::get('/create', [ProductAdminController::class, 'create'])->name('admin.product.create');
            Route::post('/store', [ProductAdminController::class, 'store'])->name('admin.product.store');
            Route::get('/edit/{id}', [ProductAdminController::class, 'edit'])->name('admin.product.edit');
            Route::put('/update/{id}', [ProductAdminController::class, 'update'])->name('admin.product.update');
            Route::get('/delete/{id}', [ProductAdminController::class, 'delete'])->name('admin.product.delete');
        });
        Route::prefix('page-hero')->group(function () {
            Route::get('/', [PageHeroAdminController::class, 'index'])->name('admin.page-hero');
            Route::get('/create', [PageHeroAdminController::class, 'create'])->name('admin.page-hero.create');
            Route::post('/store', [PageHeroAdminController::class, 'store'])->name('admin.page-hero.store');
            Route::get('/edit/{id}', [PageHeroAdminController::class, 'edit'])->name('admin.page-hero.edit');
            Route::put('/update/{id}', [PageHeroAdminController::class, 'update'])->name('admin.page-hero.update');
            Route::get('/delete/{id}', [PageHeroAdminController::class, 'delete'])->name('admin.page-hero.delete');
        });
        Route::prefix('page-rule')->group(function () {
            Route::get('/', [PageRuleAdminController::class, 'index'])->name('admin.page-rule');
            Route::get('/create', [PageRuleAdminController::class, 'create'])->name('admin.page-rule.create');
            Route::post('/store', [PageRuleAdminController::class, 'store'])->name('admin.page-rule.store');
            Route::get('/edit/{id}', [PageRuleAdminController::class, 'edit'])->name('admin.page-rule.edit');
            Route::put('/update/{id}', [PageRuleAdminController::class, 'update'])->name('admin.page-rule.update');
            Route::get('/delete/{id}', [PageRuleAdminController::class, 'delete'])->name('admin.page-rule.delete');
        });
        Route::prefix('page-policy')->group(function () {
            Route::get('/', [PagePolicyAdminController::class, 'index'])->name('admin.page-policy');
            Route::get('/create', [PagePolicyAdminController::class, 'create'])->name('admin.page-policy.create');
            Route::post('/store', [PagePolicyAdminController::class, 'store'])->name('admin.page-policy.store');
            Route::get('/edit/{id}', [PagePolicyAdminController::class, 'edit'])->name('admin.page-policy.edit');
            Route::put('/update/{id}', [PagePolicyAdminController::class, 'update'])->name('admin.page-policy.update');
            Route::get('/delete/{id}', [PagePolicyAdminController::class, 'delete'])->name('admin.page-policy.delete');
        });
        Route::prefix('page-return')->group(function () {
            Route::get('/', [PageReturnAdminController::class, 'index'])->name('admin.page-return');
            Route::get('/create', [PageReturnAdminController::class, 'create'])->name('admin.page-return.create');
            Route::post('/store', [PageReturnAdminController::class, 'store'])->name('admin.page-return.store');
            Route::get('/edit/{id}', [PageReturnAdminController::class, 'edit'])->name('admin.page-return.edit');
            Route::put('/update/{id}', [PageReturnAdminController::class, 'update'])->name('admin.page-return.update');
            Route::get('/delete/{id}', [PageReturnAdminController::class, 'delete'])->name('admin.page-return.delete');
        });
        Route::prefix('user')->group(function () {
            Route::get('/', [UserAdminController::class, 'index'])->name('admin.user');
        });
    });
});

//ALL OLD
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/category/{url}', [PagesController::class, 'pages']);
Route::get('/product/{id}', [ProductController::class, 'product']);
Route::get('/return', [ReturnController::class, 'return'])->name('return');
Route::get('/rules', [RulesController::class, 'rules'])->name('rules');
Route::get('/policy', [PolicyController::class, 'policy'])->name('policy');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');

//AUTH OLD
Route::middleware(['AlreadyLoggedIn'])->group(function () {
    Route::get('/login', [AuthController::class, 'login_page']);
    Route::get('/register', [AuthController::class, 'register_page']);
    Route::post('/login', [AuthController::class, 'login_form'])->name('login_form');
    Route::post('/register', [AuthController::class, 'register_form'])->name('register_form');
});

//LOGGED IN OLD
Route::middleware(['isLoggedIn'])->group(function () {
    Route::get('/account', [AccountController::class, 'account']);
    Route::get('/edit', [AccountController::class, 'edit']);
    Route::post('/edit', [AccountController::class, 'edit_form'])->name('edit_form');
    Route::get('/history', [OrderController::class, 'history']);
    Route::get('/order', [OrderController::class, 'order'])->name('order');
    Route::get('/order/{id}', [OrderController::class, 'order_id']);
    Route::post('/order', [OrderController::class, 'order_new_form'])->name('order_new_form');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/delete', [AccountController::class, 'delete'])->name('delete');
    Route::prefix('busket')->group(function () {
        Route::get('/', [BusketController::class, 'busket'])->name('busket');
        Route::post('/new', [BusketController::class, 'busket_new_form'])->name('busket_new_form');
        Route::post('/minus', [BusketController::class, 'busket_minus_form'])->name('busket_minus_form');
        Route::get('/delete/{id}', [BusketController::class, 'busket_delete']);
    });
});

//ADMIN OLD
Route::middleware(['AdminCheck'])->group(function () {
    Route::get('/status/{id}/{status}', [OrderController::class, 'status']);
    Route::prefix('admin')->group(function () {
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
            Route::get('/new', [ProductsAdminController::class, 'products_new'])->name('products_new');
            Route::post('/new', [ProductsAdminController::class, 'products_new_form'])->name('products_new_form');
            Route::get('/delete/{id}', [ProductsAdminController::class, 'products_delete']);
            Route::get('/edit/{id}', [ProductsAdminController::class, 'products_edit']);
            Route::post('/edit/{id}', [ProductsAdminController::class, 'products_edit_form']);
        });

        Route::prefix('hero')->group(function () {
            Route::get('/', [HeroAdminController::class, 'hero'])->name('hero');
            Route::get('/new', [HeroAdminController::class, 'hero_new'])->name('hero_new');
            Route::post('/new', [HeroAdminController::class, 'hero_new_form'])->name('hero_new_form');
            Route::get('/delete/{id}', [HeroAdminController::class, 'hero_delete']);
            Route::get('/edit/{id}', [HeroAdminController::class, 'hero_edit']);
            Route::post('/edit/{id}', [HeroAdminController::class, 'hero_edit_form']);
        });
        Route::prefix('rules')->group(function () {
            Route::get('/', [RulesAdminController::class, 'rules'])->name('rules_admin');
            Route::get('/new', [RulesAdminController::class, 'rules_new'])->name('rules_admin_new');
            Route::post('/new', [RulesAdminController::class, 'rules_new_form'])->name('rules_admin_new_form');
            Route::get('/delete/{id}', [RulesAdminController::class, 'rules_delete']);
            Route::get('/edit/{id}', [RulesAdminController::class, 'rules_edit']);
            Route::post('/edit/{id}', [RulesAdminController::class, 'rules_edit_form']);
        });
        Route::prefix('policy')->group(function () {
            Route::get('/', [PolicyAdminController::class, 'policy'])->name('policy_admin');
            Route::get('/new', [PolicyAdminController::class, 'policy_new'])->name('policy_admin_new');
            Route::post('/new', [PolicyAdminController::class, 'policy_new_form'])->name('policy_admin_new_form');
            Route::get('/delete/{id}', [PolicyAdminController::class, 'policy_delete']);
            Route::get('/edit/{id}', [PolicyAdminController::class, 'policy_edit']);
            Route::post('/edit/{id}', [PolicyAdminController::class, 'policy_edit_form']);
        });
        Route::prefix('return')->group(function () {
            Route::get('/', [ReturnAdminController::class, 'return'])->name('return_admin');
            Route::get('/new', [ReturnAdminController::class, 'return_new'])->name('return_admin_new');
            Route::post('/new', [ReturnAdminController::class, 'return_new_form'])->name('return_admin_new_form');
            Route::get('/delete/{id}', [ReturnAdminController::class, 'return_delete']);
            Route::get('/edit/{id}', [ReturnAdminController::class, 'return_edit']);
            Route::post('/edit/{id}', [ReturnAdminController::class, 'return_edit_form']);
        });
        Route::prefix('sizes')->group(function () {
            Route::get('/', [SizesAdminController::class, 'sizes'])->name('sizes');
            Route::get('/new', [SizesAdminController::class, 'sizes_new'])->name('sizes_new');
            Route::post('/new', [SizesAdminController::class, 'sizes_new_form'])->name('sizes_new_form');
            Route::get('/delete/{id}', [SizesAdminController::class, 'sizes_delete']);
            Route::get('/edit/{id}', [SizesAdminController::class, 'sizes_edit']);
            Route::post('/edit/{id}', [SizesAdminController::class, 'sizes_edit_form']);
        });
    });
});
