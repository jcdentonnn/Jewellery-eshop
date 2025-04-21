<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    /**
     * Ukazanie kosika (ulozene produkty) na zaklade user_id.
     *
     * @return \Illuminate\View\View
     */
    public function showCart()
    {
        $user_id = session('user_id');

        if (!$user_id) {
            return redirect('/loginpage');
        }

        $cartId = DB::table('shoppingcarts')->where('userid', $user_id)->value('id');

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


    /**
     * Pridanie produktu do kosika
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addProdToCart(Request $request){

        //validacia request-u
        $prodData = $request->validate([
            'productid'=>'required|exists:products,id',
            'type'=>'required|string',
            'amount'=>'required|integer|min:1'
        ]);

        //zistenie id usera a na zaklade neho najst shopping cart. Ak neexist - pridat novy riadok
        $userid = session('user_id');
        if (!$userid) {
            return redirect('/loginpage');
        }

        $cartid= DB::table('shoppingcarts')->where('userid', $userid)->value('id');
        //ak user nema shopping cart (napr. vymazava sa po zadani orderu), tak sa vytvori nova
        if (! $cartid) {
            $cartid = DB::table('shoppingcarts')
                ->insertGetId([
                    'userid'    => $userid,
                    'payment'    => '',
                    'delivery'   => '',
                    'emailadress'=> '',
                    'firstname'  => '',
                    'lastname'   => '',
                    'address1'   => '',
                    'address2'   => '',
                    'city'       => '',
                    'zipcode'    => '',
                    'state'      => '',
                    'phonenumber'=> '',
                ]);
        }

        //aktualizacia produktov v tabulke 'shopping cart' (zvysenie alebo insertovanie)
        $isCart =DB::table('cartitems')
            ->where('cartid', $cartid)
            ->where('productid', $prodData['productid'])
            ->where('type', $prodData['type'])
            ->increment('amount', $prodData['amount']);

        if ($isCart){
            DB::table('cartitems')
                ->where('cartid', $cartid)
                ->where('productid', $prodData['productid'])
                ->where('type', $prodData['type'])
                ->increment('amount', $prodData['amount']);
        } else {
            DB::table('cartitems')->insert([
                'cartid' => $cartid,
                'productid' => $prodData['productid'],
                'type' => $prodData['type'],
                'amount' => $prodData['amount']
            ]);
        }

        return redirect('/shoppingcart')->with('success', 'Produkt bol pridany do kosika!');
    }


    /**
     * Zvysenie poctu daneho produktu v kosiku
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function increment_product_amount(Request $request)
    {
        $cartid = DB::table('shoppingcarts')->where('userid', $request->userid)->value('id');

        DB::table('cartitems')
            ->where('cartid', $cartid)
            ->where('productid', $request->productid)
            ->increment('amount');

        return redirect('/shoppingcart');
    }


    /**
     * Znizenie poctu daneho produktu v kosiku
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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


    /**
     * Aktualizacia hodnoty daneho produktu v kosiku
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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


    /**
     * Ulozenie informacii o kosiku a prechod na stranku so zadanim adresy
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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


    /**
     * Ulozenie informacii o adrese, sposobe dorucenia a vytvorenie objednavky.
     * Prechod na stranku s potvrdenim objednavky.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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
