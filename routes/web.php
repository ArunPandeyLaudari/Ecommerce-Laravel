<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Pagecontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Pagecontroller::class, 'home'])->name('homepage');

Route::get('/viewproduct/{id}', [Pagecontroller::class, 'viewproduct'])->name('viewproductpage');

Route::get('/categoryproduct/{id}', [Pagecontroller::class, 'categoryproduct'])->name('categoryproduct');



Route::middleware(['auth'])->group(function () {
    Route::post('cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::get('mycart', [CartController::class, 'mycart'])->name('mycart');
    Route::get('cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');

    Route::get('checkout/{cartid}', [Pagecontroller::class, 'checkout'])->name('checkout');
    Route::get('order/{cartid}/store', [OrderController::class, 'store'])->name('order.store');
});




Route::middleware(['auth', 'admin'])->group(function () {




    Route::get('/catagory', [CatagoryController::class, 'index'])->name('catagory.index');

    // create or add catagory

    Route::get('/catagory/create', [CatagoryController::class, 'create'])->name('catagory.create');

    // store catagory

    Route::post('/catagory/store', [CatagoryController::class, 'store'])->name('catagory.store');

    // edit ma parameter ni patha xa
    Route::get('/catagory/{id}/edit', [CatagoryController::class, 'edit'])->name('catagory.edit');


    // update grrarw dekhauni
    Route::post('/catagory/{id}/update', [CatagoryController::class, 'update'])->name('catagory.update');

    Route::delete('/catagory/delete', [CatagoryController::class, 'delete'])->name('catagory.delete');


    // product route


    Route::get('/product', [ProductController::class, 'index'])->name('product.index');

    // create or add product

    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

    // store product

    Route::post('/product/create', [ProductController::class, 'store'])->name('product.store');

    // edit ma parameter ni patha xa
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');


    // update grrarw dekhauni
    Route::post('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');

    Route::get('/product/{id}/delete', [ProductController::class, 'delete'])->name('product.delete');


    // orders
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');



    // orders end

    // banner route


    Route::get('/banner', [BannerController::class, 'index'])->name('banner.index');

    // create or add banner

    Route::get('/banner/create', [BannerController::class, 'create'])->name('banner.create');

    // store banner

    Route::post('/banner/create', [BannerController::class, 'store'])->name('banner.store');

    // edit ma parameter ni patha xa
    Route::get('/banner/{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');


    // update grrarw dekhauni
    Route::post('/banner/{id}/update', [BannerController::class, 'update'])->name('banner.update');

    Route::get('/banner/{id}/delete', [BannerController::class, 'delete'])->name('banner.delete');


    // order route


});



Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'admin'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
