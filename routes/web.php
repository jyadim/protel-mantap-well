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
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\AdminAboutController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminDetailProductController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminReferencesController;



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
    Route::get('product/pdf-download/{slug}', [DetailProductController::class, 'pdfdownload'])->name('pdf.download');
    Route::get('about/pdf-download/{id}', [AboutController::class, 'pdfdownload'])->name('about.pdf.download');
    Route::get('ref/pdf-download/{id}', [ReferenceController::class, 'pdfdownload'])->name('ref.pdf.download');
});

// Group routes under the 'admin' prefix

Route::prefix('/admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    Route::get('login', [LoginController::class, 'index'])->name('admin.login');
    Route::post('authenticate', [LoginController::class, 'authenticate'])->name('admin.authenticate');
    Route::get('forgot-password', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [PasswordResetController::class, 'reset'])->name('password.update');

    Route::group(['middleware' => 'auth'], function () {
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');
        Route::match(['GET', 'PUT'], 'dashboard', [AdminHomeController::class, 'index'])->name('admin.dashboard');
        Route::match(['GET', 'PUT'], 'about', [AdminAboutController::class, 'index'])->name('about.index');
        Route::match(['GET', 'PUT'], 'services', [AdminServiceController::class, 'index'])->name('service.index');
        Route::match(['GET', 'PUT'], 'contactus', [AdminContactController::class, 'index'])->name('contact.index');
        Route::match(['GET', 'PUT'], 'product', [AdminProductController::class, 'index'])->name('product.index');
        Route::match(['GET', 'PUT'], 'references', [AdminReferencesController::class, 'index'])->name('references.index');

        Route::post('producthome/create', [AdminHomeController::class, 'prdcreate'])->name('homeproduct.create');
        Route::get('producthome/{slug}', [AdminHomeController::class, 'show'])->name('homeproduct.show');
        Route::put('producthome/{slug}', [AdminHomeController::class, 'prdupdate'])->name('homeproduct.update');
        Route::delete('producthome/{slug}', [AdminHomeController::class, 'prddestroy'])->name('homeproduct.destroy');
        Route::put('banner/update/{id}', [AdminHomeController::class, 'bnnrupdate'])->name('banner.update');
        Route::put('quickaccess/{id}', [AdminHomecontroller::class, 'qaupdate'])->name('quickaccess.update');
        Route::post('news', [AdminHomecontroller::class, 'newsstore'])->name('news.store');
        Route::put('news/{slug}', [AdminHomecontroller::class, 'newsupdate'])->name('news.update');
        Route::delete('news/{slug}', [AdminHomecontroller::class, 'newsdestroy'])->name('news.destroy');
        Route::put('/about/edit/{id}', [AdminAboutController::class, 'edit'])->name('about.edit');
        Route::post('/ref/{id}/pdf', [AdminReferencesController::class, 'storePDF'])->name('ref.pdf.store');
        Route::delete('/ref/{id}/pdf', [AdminReferencesController::class, 'destroyPDF'])->name('ref.pdf.delete');
        Route::post('/about/{id}/pdf', [AdminAboutController::class, 'storePDF'])->name('about.pdf.store');
        Route::put('/about/{id}/pdf', [AdminAboutController::class, 'updatePDF'])->name('about.pdf.update');
        Route::delete('/about/{id}/pdf', [AdminAboutController::class, 'destroyPDF'])->name('about.pdf.delete');

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
        Route::get('/detailproduct/edit/{slug}', [AdminDetailProductController::class, 'edit'])->name('detailproduct.edit');
        Route::get('/detailproduct/create/{slug}', [AdminDetailProductController::class, 'createindex'])->name('detailproduct.createindex');
        Route::put('/detailproduct/update/{slug}', [AdminDetailProductController::class, 'detailupdate'])->name('detailproduct.update');
        Route::post('/detailproduct/create/{slug}', [AdminDetailProductController::class, 'create'])->name('detailproduct.store');
        Route::post('products/{slug}/pdf', [AdminDetailProductController::class, 'storePDF'])->name('pdf.store');
        Route::get('products/{slug}/pdf/{id}/edit', [AdminDetailProductController::class, 'editPDF'])->name('pdf.edit');
        Route::put('products/{slug}/pdf/{id}', [AdminDetailProductController::class, 'updatePDF'])->name('pdf.update');
        Route::delete('products/{slug}/pdf/{id}', [AdminDetailProductController::class, 'destroyPDF'])->name('pdf.destroy');
        Route::delete('/detailproduct/destroy/{slug}', [AdminDetailProductController::class, 'detaildestroy'])->name('detailproduct.destroy');
        Route::post('/productgallery/store/{products_id}', [AdminDetailProductController::class, 'store'])->name('productgallery.store');
        Route::put('/productgallery/update/{id}', [AdminDetailProductController::class, 'update'])->name('productgallery.update');
        Route::delete('/productgallery/destroy/{id}', [AdminDetailProductController::class, 'destroy'])->name('productgallery.destroy');
        Route::put('/reference/{id}', [AdminReferencesController::class, 'update'])->name('reference.update');
        Route::put('/reference/{id}/partners', [AdminReferencesController::class, 'updatePartners'])->name('reference.partners.update');
        Route::put('/reference/{id}/partners/image', [AdminReferencesController::class, 'updateImagePartners'])->name('reference.partners.image.update');
        Route::post('/partners/store/{referenceId}', [AdminReferencesController::class, 'store'])->name('partners.store');
        Route::delete('/partners/delete/{id}', [AdminReferencesController::class, 'destroy'])->name('partners.delete');
        Route::post('/product', [AdminProductController::class, 'productstore'])->name('prod.store');

        Route::delete('/product/destroy/{slug}', [AdminProductController::class, 'prddestroy'])->name('product.destroy');
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
