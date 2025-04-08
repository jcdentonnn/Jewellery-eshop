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

        DB::table('cartitems')
            ->where('cartid', $cartid)
            ->where('productid', $request->productid)
            ->where('amount', '>', 1)
            ->decrement('amount');

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
}
