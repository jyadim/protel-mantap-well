<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminHomecontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailGalleryController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\LoginController;
use App\Models\HomeProduct;



// Group routes under the 'admin' prefix
Route::prefix('admin')->group(function () {
    Route::match(['GET', 'PUT'], '/dashboard', [AdminHomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/product/create', [AdminHomeController::class, 'prdcreate'])->name('product.create');
    Route::post('/product', [AdminHomeController::class, 'prdstore'])->name('product.store');
    Route::get('/product/{slug}', [AdminHomeController::class, 'show'])->name('product.show');
    Route::put('/product/{slug}', [AdminHomeController::class, 'prdupdate'])->name('product.update');
    Route::delete('/product/{slug}', [AdminHomeController::class, 'prddestroy'])->name('product.destroy');
    Route::put('/banner/update', [AdminHomeController::class, 'bnnrupdate'])->name('banner.update');
    Route::delete('/banner/delete', [AdminHomeController::class, 'bnnrdestroy'])->name('banner.destroy');
});




Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'index']);

Route::get('/product', [ProductController::class, 'index']);

Route::get('/services', [ServicesController::class, 'index']);

Route::get('/gallery', [ReferenceController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/product/{slug}', [DetailProductController::class, 'index']);

Route::get('/gallery/{slug}', [DetailGalleryController::class, 'index']);

Route::get('/z', function () {
    return view('admin');
});
Route::prefix('account')->group(function () {

Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('admin.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'register']) -> name('admin.register');
Route::post('/process-register', [LoginController::class, 'processRegister']) -> name('admin.processRegister');
});
Route::get('/b', function () {
    return view('admindetailproduct');
});
Route::get('/c', function () {
    return view('adminaboutus');
});
Route::get('/d', function () {
    return view('admincontactus');
});
Route::get('/e', function () {
    return view('adminservices');
});
Route::get('/f', function () {
    return view('adminreferences');
});
Route::get('/g', function () {
    return view('adminindoproject');
});
