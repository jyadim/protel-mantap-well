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
Route::get('/crossflow', function () {
    return view('crossflow');
});
Route::get('/international-project', function () {
    return view('international');
});
Route::get('/indonesia-project', function () {
    return view('indonesia');
});
Route::get('/partners', function () {
    return view('partner');
});
Route::get('/p', function () {
    return view('welcome');
});
