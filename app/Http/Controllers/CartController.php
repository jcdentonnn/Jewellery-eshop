<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /* Tato funkcia zobrazi všetky položky, ktoré má používateľ v tom momente v košíku */
    public function showCart()
    {
        $userId = session('user_id');

        /*ak user neni prihlaseny, vyzve ho na prihlasenie, TOTO PREROBIM ESTE)*/
        if (!$userId) {
            return redirect('/loginpage');
        }

        $cartId = DB::table('shoppingcarts')->where('userid', $userId)->value('id');

        //joinem všetky cartItems, ktoré majú rovnaké id ako id košíka
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


    /*ak uživateľ klikne na "+" v košiku, inkrementujem produkt (reloadnem stranku nech sa to načíta)*/
    public function increment_product_amount(Request $request)
    {
        $cartid = DB::table('shoppingcarts')->where('userid', $request->userid)->value('id');

        DB::table('cartitems')
            ->where('cartid', $cartid)
            ->where('productid', $request->productid)
            ->increment('amount');

        return redirect('/shoppingcart');
    }


    /*ak uživateľ klikne na "-" v košiku, dekrementujem produkt (reloadnem stranku nech sa to načíta)*/
    public function decrement_product_amount(Request $request)
    {
        $cartid = DB::table('shoppingcarts')->where('userid', $request->userid)->value('id');

        $currentAmount = DB::table('cartitems')
            ->where('cartid', $cartid)
            ->where('productid', $request->productid)
            ->value('amount');

        /*ak je množstvo produktu 0, odstrani sa cely zaznam, inak len dekrementuje*/
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


    /* uživateľ vie aj prepísať hodnotu množstva produktu ručne (nemusí stále klikať +/-)
     * skontrolujem či hodnota nie je záporná/0, ak áno, odstránim celý záznam
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
        else //ak to nie je záporná hodnota/0, updatnem
        {
            DB::table('cartitems')
                ->where('cartid', $cartid)
                ->where('productid', $request->productid)
                ->update(['amount' => $request->amount]);
        }
        return redirect('/shoppingcart');
    }


    /* Tato funkcia sa vykonava na stranke shippingmethod, uloži typ dopravy, platby a cenu
     * za produkty do databazy
     */
    public function saveMethod(Request $request)
    {
        $userId = session('user_id');

        $cartId = DB::table('shoppingcarts')->where('userid', $userId)->value('id');

        DB::table('shoppingcarts')
            ->where('id', $cartId)
            ->update([
                'delivery' => $request->input('delivery'),
                'payment' => $request->input('payment'),
                'itemsprice' => $request->input('itemsprice')
            ]);

        return redirect('/inputaddress');
    }



    /*
     * Tato funkcia rieši ukladanie adresy a ceny do databazy, nasledne prekopirovanie
     * objednavky do orders (orders je zaznam vsetkych objednavok, kosik je len temporary čo
     * ma uživateľ nahodene v danej chvili)
     * Nasledne kosik zresetuje (pripravý ho na novú objednávku) a presmeruje ho na "order completed"
    */
    public function saveAddress(Request $request)
    {
        $userId = session('user_id');
        $cartId = DB::table('shoppingcarts')->where('userid', $userId)->value('id');

        //ulozi adresove udaje do shoppingcarts tabuľky
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
            'totalprice'   => $request->totalprice,
        ]);


        $cart = DB::table('shoppingcarts')->where('id', $cartId)->first();

        //po dokonceni objednavky:
        //urobim zaznam objednavky do orders (pretože kosik sa bude resetovat)
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
            'itemsprice'  => $cart->itemsprice,
            'totalprice'  => $request->totalprice,
        ]);


        //vezmeme všetky položky tabuľky cartItems a prekopírujeme ich do orderItems
        $cartItems = DB::table('cartitems')->where('cartid', $cartId)->get();

        foreach ($cartItems as $item) {
            DB::table('orderitems')->insert([
                'orderid'  => $orderId,
                'productid'=> $item->productid,
                'amount'   => $item->amount,
                'type'     => $item->type
            ]);
        }
        
        //vyresetovanie kosika (zaznam je už v orders) uzivatel je potom pripraveny na nový nakup
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

        //presmerovanie na purchase completed stranku
        return redirect('/purchasecompleted');
    }
}
