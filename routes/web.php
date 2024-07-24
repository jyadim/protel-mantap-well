<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contactus');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/gallery', function () {
    return view('gallery');
});
Route::get('/product', function () {
    return view('product');
});
Route::get('/detailproduct', function () {
    return view('detailproduct');
});
