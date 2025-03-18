<?php

use Illuminate\Support\Facades\Route;

Route::get('/registerpage', function () {
    return view('registerpage');
});

Route::get('/loginpage', function () {
    return view('loginpage');
});

Route::get('/home', function () {
    return view('home');
});

