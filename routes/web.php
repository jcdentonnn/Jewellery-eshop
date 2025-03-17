<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('registerpage');
});

Route::get('/home', function () {
    return view('home');
});

