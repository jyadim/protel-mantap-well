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
use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminDetailProductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminReferencesController;
use App\Models\HomeProduct;


Route::prefix('/')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('about', [AboutController::class, 'index']);
    Route::get('product', [ProductController::class, 'index']);
    Route::get('services', [ServicesController::class, 'index']);
    Route::get('gallery', [ReferenceController::class, 'index']);
    Route::get('contact', [ContactController::class, 'index']);
    Route::post('contact/send', [ContactController::class, 'sendContactForm'])->name('contact.send');
    Route::get('product/{slug}', [DetailProductController::class, 'index']);
    Route::get('gallery/{slug}', [DetailGalleryController::class, 'index']);
});

// Group routes under the 'admin' prefix

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [LoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('admin.authenticate');
        Route::get('register', [LoginController::class, 'register'])->name('admin.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('admin.processRegister');
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        Route::match(['GET', 'PUT'], 'dashboard', [AdminHomeController::class, 'index'])->name('admin.dashboard');
        Route::match(['GET', 'PUT'], 'about', [AdminAboutController::class, 'index'])->name('about.index');
        Route::match(['GET', 'PUT'], 'services', [AdminServiceController::class, 'index'])->name('service.index');
        Route::match(['GET', 'PUT'], 'contactus', [AdminContactController::class, 'index'])->name('contact.index');
        Route::match(['GET', 'PUT'], 'product', [AdminProductController::class, 'index'])->name('product.index');
        Route::match(['GET', 'PUT'], 'references', [AdminReferencesController::class, 'index'])->name('references.index');

        Route::get('producthome/create', [AdminHomeController::class, 'prdcreate'])->name('homeproduct.create');
        Route::post('producthome', [AdminHomeController::class, 'prdstore'])->name('homeproduct.store');
        Route::get('producthome/{slug}', [AdminHomeController::class, 'show'])->name('homeproduct.show');
        Route::put('producthome/{slug}', [AdminHomeController::class, 'prdupdate'])->name('homeproduct.update');
        Route::delete('producthome/{slug}', [AdminHomeController::class, 'prddestroy'])->name('homeproduct.destroy');
        Route::put('banner/update/{id}', [AdminHomeController::class, 'bnnrupdate'])->name('banner.update');
        Route::put('quickaccess/{id}', [AdminHomecontroller::class, 'qaupdate'])->name('quickaccess.update');
        Route::post('news', [AdminHomecontroller::class, 'newsstore'])->name('news.store');
        Route::put('news/{slug}', [AdminHomecontroller::class, 'newsupdate'])->name('news.update');
        Route::delete('news/{slug}', [AdminHomecontroller::class, 'newsdestroy'])->name('news.destroy');
        Route::put('/about/edit/{id}', [AdminAboutController::class, 'edit'])->name('about.edit');
        Route::delete('/team/destroy{id}', [AdminAboutController::class, 'teamdestroy'])->name('team.destroy');
        Route::post('/team/store', [AdminAboutController::class, 'teamstore'])->name('team.store');
        Route::put('/team/update/{id}', [AdminAboutController::class, 'teamupdate'])->name('team.update');
        // web.php
        Route::get('/services', [AdminServiceController::class, 'index'])->name('service.index');
        Route::post('/services', [AdminServiceController::class, 'serviceStore'])->name('services.store');
        Route::put('/services/{id}', [AdminServiceController::class, 'serviceupdate'])->name('services.update');
        Route::delete('/services/{id}', [AdminServiceController::class, 'servicedestroy'])->name('services.destroy');
        Route::post('/services/{id}/pictures', [AdminServiceController::class, 'picturestore'])->name('picture.store');
        Route::put('/pictures/update/{id}', [AdminServiceController::class, 'pictureupdate'])->name('picture.update');
        Route::delete('/pictures/destroy/{id}', [AdminServiceController::class, 'picturedestroy'])->name('picture.destroy');
        Route::put('/contact/update/{id}', [AdminContactController::class, 'contactupdate'])->name('contact.update');
        Route::put('/product/update/{slug}', [AdminProductController::class, 'productupdate'])->name('product.update');
        Route::delete('/product/destroy/{slug}', [AdminProductController::class, 'productdestroy'])->name('product.destroy');
        Route::get('/detailproduct/{slug}', [AdminDetailProductController::class, 'edit'])->name('detailproduct.edit');
        Route::put('/detailproduct/update/{slug}', [AdminDetailProductController::class, 'detailupdate'])->name('detailproduct.update');
        Route::delete('/detailproduct/destroy/{slug}', [AdminDetailProductController::class, 'detaildestroy'])->name('detailproduct.destroy');
        Route::post('/productgallery/store/{products_id}', [AdminDetailProductController::class, 'store'])->name('productgallery.store');
        Route::put('/productgallery/update/{id}', [AdminDetailProductController::class, 'update'])->name('productgallery.update');
        Route::delete('/productgallery/destroy/{id}', [AdminDetailProductController::class, 'destroy'])->name('productgallery.destroy');
        Route::put('/reference/{id}', [AdminReferencesController::class, 'update'])->name('reference.update');
        Route::put('/reference/{id}/partners', [AdminReferencesController::class, 'updatePartners'])->name('reference.partners.update');
        Route::delete('/product/destroy/{slug}', [AdminProductController::class, 'productdestroy'])->name('product.destroy');
        // Route to display the edit form for a specific gallery item
        Route::get('/detailgallery/{slug}', [AdminReferencesController::class, 'edit'])->name('gallery.edit');

        // Route to store a new gallery item (No slug or id needed)
        Route::post('/detailgallery/store', [AdminReferencesController::class, 'detailstore'])->name('gallery.store');

        // Route to update an existing gallery item
        Route::put('/detailgallery/update/{id}', [AdminReferencesController::class, 'detailupdate'])->name('gallery.update');

        // Route to delete an existing gallery item
        Route::delete('/detailgallery/destroy/{id}', [AdminReferencesController::class, 'detaildestroy'])->name('gallery.destroy');



        // To show the update form

    });
});
