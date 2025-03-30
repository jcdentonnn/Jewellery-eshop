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
})->name('contactpage');

Route::get('/shoppingcart', function () {
    return view('shoppingcart');
});

Route::get('/purchasedetails', function () {
    return view('purchasedetails');
});


Route::get('/shippingmethod', function () {
    return view('shippingmethod');
});

Route::get('/inputaddress', function () {
    return view('inputaddress');
});

Route::get('/adminpage', function () {
    return view('adminpage');
});

Route::get('/a_addproduct', function () {
    return view('a_addproduct');
});

Route::get('/a_editproduct', function () {
    return view('a_editproduct');
});

Route::get('/a_removeproduct', function () {
    return view('a_removeproduct');
});

Route::get('/productinfo', function () {
    return view('productinfo');
})->name('productinfo');

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

Route::get('/more-purchase-info', function () {
    return view('more-purchase-info');
})->name('more-purchase-info');

Route::get('/shoppingcart', function () {
    return view('shoppingcart');
})->name('shoppingcart');

Route::get('/wishlist', function () {
    return view('wishlist');
})->name('wishlist');

Route::get('/return-confirmation', function () {
    return view('return-confirmation');
})->name('return-confirmation');
