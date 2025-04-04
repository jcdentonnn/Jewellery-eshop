<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
})->name('a_addproduct');

Route::get('/a_editproduct', function () {
    return view('a_editproduct');
})->name('a_editproduct');

Route::get('/a_removeproduct', function () {
    return view('a_removeproduct');
})->name('a_removeproduct');


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
    if (session('user_id')) {
        $user = DB::table('users')->find(session('user_id'));
        return view('user', ['user' => $user]);
    } else {
        return redirect('/loginpage');
    }
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



/*---------------------------------------------------------*/

/*tato cast spravi ze ked da uzivatel register,
(skontroluje či nie je  duplicitny email),
prida riadok do users, logindata, shoppingcarts (vytvori prenho kosik)*/

Route::post('/register', function (Request $request) {
    $first_name = $request->input('first_name');
    $last_name = $request->input('last_name');
    $email = $request->input('email');
    $password = $request->input('password');

    $exists = DB::table('users')->where('email', $email)->exists();
    if ($exists) {
        return back()->withErrors(['email' => 'Tento email sa už používa!']);
    }

    $userId = DB::table('users')->insertGetId([
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'shoppingcartid' => null,
        'isadmin' => false
    ]);

    $cartId = DB::table('shoppingcarts')->insertGetId([
        'userid' => $userId
    ]);

    DB::table('users')->where('id', $userId)->update([
        'shoppingcartid' => $cartId
    ]);

    DB::table('logindata')->insert([
        'userid' => $userId,
        'username' => $email,
        'password' => $password
    ]);

    session(['user_id' => $userId]);
    return redirect('/user');
});

Route::post('/login', function (Request $request) {
    $username = $request->input('email');
    $password = $request->input('password');

    $record = DB::table('logindata')
        ->where('username', $username)
        ->where('password', $password)
        ->first();

    if ($record) {
        session(['user_id' => $record->userid]);
        return redirect('/user');
    }

    return redirect('/loginpage');
});


Route::get('/logout', function () {
    session()->forget('user_id');
    return redirect('/loginpage');
})->name('logout');