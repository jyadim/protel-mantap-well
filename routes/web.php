<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/p', function () {
    return view('contactus');
});
Route::get('/serv', function () {
    return view('services');
});