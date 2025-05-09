<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;


//---------------------------------------------------------

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

/*
Route::get('/shoppingcart', function () {
    return view('shoppingcart');
});*/

Route::get('/purchasedetails', function () {
    return view('purchasedetails');
});


Route::get('/shippingmethod', function () {
    return view('shippingmethod');
});

/*Zobrazí výslednú cenu (vrátane dopravy, platby) na stránke /inputaddress*/
Route::get('/inputaddress', [CartController::class, 'showTotalPrice'])->name('inputaddress');

Route::get('/adminpage', function () {
    return view('adminpage');
})->name('adminpage');

Route::get('/a_addproduct', function () {
    return view('a_addproduct');
})->name('a_addproduct');

Route::get('/a_editproduct', function () {
    return view('a_editproduct');
})->name('a_editproduct');

Route::get('/a_removeproduct', function () {
    return view('a_removeproduct');
})->name('a_removeproduct');



Route::get('/home', function () {
    return view('home');
})->name('home');




//---------------------------------------------------------
// PRODUCTS
Route::get('/engagement', function () {
    return view('engagement');
})->name('engagement');
Route::get('/engagement', [ProductController::class, 'engagement'])->name('engagement');

Route::get('/watches', function () {
    return view('watches');
})->name('watches');
Route::get('/watches', [ProductController::class, 'watches'])->name('watches');

Route::get('/diamonds', function () {
    return view('diamonds');
})->name('diamonds');
Route::get('/diamonds', [ProductController::class, 'diamonds'])->name('diamonds');

Route::get('/precious_stone', function () {
    return view('precious_stone');
})->name('precious_stone');
Route::get('/precious_stone', [ProductController::class, 'precious_stone'])->name('precious_stone');

Route::get('/accessories', function () {
    return view('accessories');
})->name('accessories');
Route::get('/accessories', [ProductController::class, 'accessories'])->name('accessories');

Route::get('/art_of_gift', function () {
    return view('art_of_gift');
})->name('art_of_gift');
Route::get('/art_of_gift', [ProductController::class, 'art_of_gift'])->name('art_of_gift');


Route::get('/productinfo/{id}', [ProductController::class, 'show'])->name('productinfo');



//---------------------------------------------------------
// USER
Route::get('/user', function () {
    if (session('user_id')) {
        $user = DB::table('users')->find(session('user_id'));

        if ($user && $user->isadmin) {
            return redirect('/adminpage');
        }

        $orders = DB::table('orders')
            ->where('userid', session('user_id'))
            ->get();
        return view('user', ['user' => $user, 'orders' => $orders]);
    } else {
        return redirect('/loginpage');
    }
})->name('user');

/*
Route::get('/more-purchase-info', function () {
    return view('more-purchase-info');
})->name('more-purchase-info');*/
Route::get('/more-purchase-info/{id}', [UserController::class, 'showOrderDetails'])->name('more-purchase-info');

Route::get('/shoppingcart', function () {
    return view('shoppingcart');
})->name('shoppingcart');

Route::get('/prod_list', [ProductController::class, 'prod_list'])
    ->name('prod.list');

Route::get('/return-confirmation', function () {
    return view('return-confirmation');
})->name('return-confirmation');



//---------------------------------------------------------
//** REGISTER, LOGIN, LOGOUT **
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/logout', [UserController::class, 'logout'])->name('logout');


//---------------------------------------------------------
// ** SEARCH **
Route::get('/search', [ProductController::class, 'search'])->name('search');


//---------------------------------------------------------
//** KOSIK **
Route::get('/shoppingcart', [CartController::class, 'showCart'])->name('shoppingcart');

//košik:pridanie produktu do kosika
Route::post('/productinfo/add', [CartController::class, 'addProdToCart'])
    ->name('cart.add');

Route::post('/cart/add', [CartController::class,'addProdToCart'])
    ->name('cart.add');

Route::post('/shoppingcart/increase', [CartController::class, 'increment_product_amount']);

Route::post('/shoppingcart/decrease', [CartController::class, 'decrement_product_amount']);

Route::post('/shoppingcart/update', [CartController::class, 'update_amount']);


//košik:ulozenie info o objednavke (platba, adresa, dorucenie)
Route::post('/save-address', [CartController::class, 'saveAddress']);


Route::post('/save-shipping-payment', [CartController::class, 'saveMethod']);

Route::get('/purchasecompleted', function () {
    return view('/purchasecompleted');
})->name('/purchasecompleted');


//---------------------------------------------------------
//ADMIN FUNKCIONALITA
Route::delete('/delete-product/{id}', [ProductController::class, 'delete_product'])->name('delete_product');

//** PRIDANIE PRODUKTU - ADMIN **
Route::post('/a_addproduct', [ProductController::class, 'a_addProduct'])->name('prod.add');

//** EDIT PRODUKTU - ADMIN */ - test zatial

Route::get('/edit-product/{id}', [ProductController::class, 'edit_product'])->name('edit_product');
Route::put('/edit-product/{id}', [ProductController::class, 'edit_product']);