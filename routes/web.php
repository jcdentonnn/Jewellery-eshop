<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/registerpage', function () {
    return view('registerpage');
});

Route::get('/loginpage', function () {
    return view('loginpage');
});

Route::get('/contactpage', function () {
    return view('contactpage');
});

Route::get('/shoppingcart', function () {
    return view('shoppingcart');
});

Route::get('/shippingmethod', function () {
    return view('shippingmethod');
});

Route::get('/inputaddress', function () {
    return view('inputaddress');
});

Route::get('/accountpage', function () {
    return view('accountpage');
});

Route::get('/purchasedetails', function () {
    return view('purchasedetails');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/engagement', function () {
    return view('engagement');
})->name('engagement');

Route::get('/watches', function () {
    return view('watches');
})->name('watches');

Route::get('/diamonds', function () {
    return view('diamonds');
})->name('diamonds');

Route::get('/precious_stone', function () {
    return view('precious_stone');
})->name('precious_stone');

Route::get('/accessories', function () {
    return view('accessories');
})->name('accessories');

Route::get('/art_of_gift', function () {
    return view('art_of_gift');
})->name('art_of_gift');

Route::get('/user', function () {
    return view('user');
})->name('user');

