<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function showCart()
    {
        $userId = session('user_id');

        if (!$userId) {
            return redirect('/loginpage');
        }

        $cartId = DB::table('shoppingcarts')->where('userid', $userId)->value('id');

        $items = DB::table('cartitems')
            ->where('cartid', $cartId)
            ->join('products', 'cartitems.productid', '=', 'products.id')
            ->select(
                'products.productname',
                'products.imagename',
                'products.price',
                'cartitems.amount',
                'cartitems.productid'
            )
            ->get();

        return view('shoppingcart', compact('items'));
    }

    public function increment_product_amount(Request $request)
    {
        $cartid = DB::table('shoppingcarts')->where('userid', $request->userid)->value('id');

        DB::table('cartitems')
            ->where('cartid', $cartid)
            ->where('productid', $request->productid)
            ->increment('amount');

        return redirect('/shoppingcart');
    }

    public function decrement_product_amount(Request $request)
    {
        $cartid = DB::table('shoppingcarts')->where('userid', $request->userid)->value('id');

        $currentAmount = DB::table('cartitems')
            ->where('cartid', $cartid)
            ->where('productid', $request->productid)
            ->value('amount');

        if ($currentAmount > 1)
        {
            DB::table('cartitems')
                ->where('cartid', $cartid)
                ->where('productid', $request->productid)
                ->where('amount', '>', 1)
                ->decrement('amount');
        }
        else
        {
            DB::table('cartitems')
                ->where('cartid', $cartid)
                ->where('productid', $request->productid)
                ->delete();
        }

        return redirect('/shoppingcart');
    }

    public function update_amount(Request $request)
    {
        $cartid = DB::table('shoppingcarts')->where('userid', $request->userid)->value('id');

        if ($request->amount <= 0)
        {
            DB::table('cartitems')
                ->where('cartid', $cartid)
                ->where('productid', $request->productid)
                ->delete();
        }
        else
        {
            DB::table('cartitems')
                ->where('cartid', $cartid)
                ->where('productid', $request->productid)
                ->update(['amount' => $request->amount]);
        }
        return redirect('/shoppingcart');
    }

    public function saveMethod(Request $request)
    {
        $userId = session('user_id');

        $cartId = DB::table('shoppingcarts')->where('userid', $userId)->value('id');

        DB::table('shoppingcarts')
            ->where('id', $cartId)
            ->update([
                'delivery' => $request->input('delivery'),
                'payment' => $request->input('payment')
            ]);

        return redirect('/inputaddress');
    }

    public function saveAddress(Request $request)
    {
        $userId = session('user_id');

        $cartId = DB::table('shoppingcarts')->where('userid', $userId)->value('id');

        DB::table('shoppingcarts')->where('id', $cartId)->update([
            'emailadress'  => $request->emailadress,
            'firstname'    => $request->firstname,
            'lastname'     => $request->lastname,
            'address1'     => $request->address1,
            'address2'     => $request->address2,
            'city'         => $request->city,
            'zipcode'      => $request->zipcode,
            'state'        => $request->state,
            'phonenumber'  => $request->phonenumber,
        ]);

        $cart = DB::table('shoppingcarts')->where('id', $cartId)->first();

        $orderId = DB::table('orders')->insertGetId([
            'userid'       => $cart->userid,
            'payment'      => $cart->payment,
            'delivery'     => $cart->delivery,
            'emailadress'  => $request->emailadress,
            'firstname'    => $request->firstname,
            'lastname'     => $request->lastname,
            'address1'     => $request->address1,
            'address2'     => $request->address2,
            'city'         => $request->city,
            'zipcode'      => $request->zipcode,
            'state'        => $request->state,
            'phonenumber'  => $request->phonenumber,
        ]);

        $cartItems = DB::table('cartitems')->where('cartid', $cartId)->get();

        foreach ($cartItems as $item) {
            DB::table('orderitems')->insert([
                'orderid'  => $orderId,
                'productid'=> $item->productid,
                'amount'   => $item->amount,
                'type'     => $item->type
            ]);
        }
        
        //vyresetovanie kosika (zaznam je teraz v orders) uzivatel je pripraveny na novy nakup
        DB::table('cartitems')->where('cartid', $cartId)->delete();

        DB::table('shoppingcarts')->where('id', $cartId)->update([
            'payment'      => null,
            'delivery'     => null,
            'emailadress'  => null,
            'firstname'    => null,
            'lastname'     => null,
            'address1'     => null,
            'address2'     => null,
            'city'         => null,
            'zipcode'      => null,
            'state'        => null,
            'phonenumber'  => null,
        ]);

        return redirect('/purchasecompleted');
    }
}
