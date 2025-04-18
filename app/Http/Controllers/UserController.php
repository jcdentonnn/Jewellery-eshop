<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    /**
     * Register funkcia pre registrovanie pouzivetelov
     *
     * @return \Illuminate\View\View
     */
    public function register(Request $request)
    {
        /*tato cast spravi ze ked da uzivatel register,
        (skontroluje či nie je  duplicitny email),
        prida riadok do users, logindata, shoppingcarts (vytvori prenho kosik)*/

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $password = $request->input('password');

        $exists = DB::table('users')->where('email', $email)->exists();
        if ($exists) {
            return back()->withErrors(['email' => 'This email is already in use!']);
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
    }

    /**
     * Login funkcia pre login pouzivetelov
     *
     * @return \Illuminate\View\View
     */
    public function login(Request $request)
    {
        $username = $request->input('email');
        $password = $request->input('password');

        $record = DB::table('logindata')
            ->where('username', $username)
            ->where('password', $password)
            ->first();

        if ($record) {
            session(['user_id' => $record->userid]);
            if ($username === 'admin@jstore.com') {
                return redirect('/adminpage');
            }
            return redirect('/user');
        }

        return redirect('/loginpage')->withErrors(['login' => 'Invalid username or password.']);
    }

    /**
     * Funkcia pre zobrazenie prihlasovacieho formulara
     *
     * @return \Illuminate\View\View
     */
    public function logout()
    {
        session()->forget('user_id');
        return redirect('/loginpage');
    }

    /**
     * Funkcia pre zobrazenie prihlasovacieho formulara
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm(){
        return view('loginpage');
    }
}
