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

        $sessionId = session()->getId();
        //skontroluje, či user mal pocas registracie nejake veci v košiku
        $sessionCart = DB::table('shoppingcarts')->where('sessionid', $sessionId)->first();

        if ($sessionCart == true) {
            DB::table('shoppingcarts')->where('id', $sessionCart->id)->update([
                'userid' => $userId,
                'sessionid' => null
            ]);
            $cartId = $sessionCart->id;
        }
        else {
            $cartId = DB::table('shoppingcarts')->insertGetId(['userid' => $userId]);
        }

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

        $userdata = DB::table('users')
            ->where('email', $username)
            ->first();

        if ($record == true) {
            session(['user_id' => $record->userid]);
            $this->mergeSessionCartWithUser($record->userid);

            if ($userdata->isadmin) {
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

    /**
     * Funkcia pre zobrazenie podrobností predošlých objednávok
     *
     * @param int $orderid
     * @return \Illuminate\View\View
     */
    public function showOrderDetails($orderid)
    {
        $order = DB::table('orders')->where('id', $orderid)->first();

        //načíta všetky položky v orderitems podľa id daného orderu, z tabuľky products získa info o produktoch
        $orderItems = DB::table('orderitems')
            ->where('orderid', $orderid)
            ->join('products', 'orderitems.productid', '=', 'products.id')
            ->select('orderitems.amount', 'products.productname', 'products.imagename')
            ->get();

        return view('more-purchase-info', compact('order', 'orderItems'));
    }

    /**
     * neprihlaseny použivateľ ma itemy v košíku - prihlasuje sa do učtu,
     * ktorý má veci v košíku, tieto itemy sa sčítajú
     */
    private function mergeSessionCartWithUser($userId)
    {
        $sessionId = session()->getId();

        $sessionCart = DB::table('shoppingcarts')->where('sessionid', $sessionId)->first();
        $userCart = DB::table('shoppingcarts')->where('userid', $userId)->first();

        if ($sessionCart && $userCart)
        {
            $sessionItems = DB::table('cartitems')->where('cartid', $sessionCart->id)->get();

            foreach ($sessionItems as $item) {
                $existing = DB::table('cartitems')
                    ->where('cartid', $userCart->id)
                    ->where('productid', $item->productid)
                    ->where('type', $item->type)
                    ->first();

                if ($existing) {
                    DB::table('cartitems')
                        ->where('id', $existing->id)
                        ->increment('amount', $item->amount);
                } else {
                    DB::table('cartitems')->insert([
                        'cartid' => $userCart->id,
                        'productid' => $item->productid,
                        'type' => $item->type,
                        'amount' => $item->amount
                    ]);
                }
            }

            DB::table('cartitems')->where('cartid', $sessionCart->id)->delete();
            DB::table('shoppingcarts')->where('id', $sessionCart->id)->delete();
        }
    }


    /** Funkcia na najdenie objednavok registrovaneho pouzivatela
     *  pouzite na stranke user.blade.php
     * @return \Illuminate\Http\RedirectResponse
     */
    public function findPurchases() {
        $userid = session('user_id');

        $completedPurchases = DB::table('orders')
            ->where('userid', $userid)
            ->orderBy('timestamp', 'desc')
            ->get();

        if ($completedPurchases->isEmpty()) {
            return redirect('/user')->with('message', 'No purchases were made.');
        }

        return view('user', compact('completedPurchases'));
    }
}
