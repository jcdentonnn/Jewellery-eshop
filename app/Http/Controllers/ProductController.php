<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function show($id)
    {
        $product = DB::table('products')->find($id);

        return view('productinfo', compact('product'));
    }

    public function engagement()
    {
        $products = Product::whereIn('id', function($query) {
            $query->select('productid')
                ->from('categories')
                ->where('category', 'engagement');
        })->get();
        return view('engagement', compact('products'));
    }

    public function diamonds()
    {
        $products = Product::whereIn('id', function($query) {
            $query->select('productid')
                ->from('categories')
                ->where('category', 'diamonds');
        })->get();
        return view('diamonds', compact('products'));
    }

    public function precious_stone()
    {
        $products = Product::whereIn('id', function($query) {
            $query->select('productid')
                ->from('categories')
                ->where('category', 'precious_stone');
        })->get();
        return view('precious_stone', compact('products'));
    }

    public function watches()
    {
        $products = Product::whereIn('id', function($query) {
            $query->select('productid')
                ->from('categories')
                ->where('category', 'watches');
        })->get();
        return view('watches', compact('products'));
    }

    public function accessories()
    {
        $products = Product::whereIn('id', function($query) {
            $query->select('productid')
                ->from('categories')
                ->where('category', 'accessories');
        })->get();
        return view('accessories', compact('products'));
    }

    public function art_of_gift()
    {
        $products = Product::whereIn('id', function($query) {
            $query->select('productid')
                ->from('categories')
                ->where('category', 'art_of_gift');
        })->get();
        return view('art_of_gift', compact('products'));
    }


    /**
     * Vyhladavanie produktu podla stringu z inputu do formy v header.blade.php
     * pouzite ILIKE - insensitive LIKE search v nazvoch a popisoch
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function search(Request $request){

        $q= $request->input('q', '');

        //todo otestovat prazdny search a rozhodnut spravanie pri danom uc

        $products= Product::where('productname', 'ILIKE', "%{$q}%")
            ->orWhere('productdesc', 'ILIKE', "%{$q}%")
            ->paginate(10); //10ks pre stranku

        return view('search_res', compact('products', 'q'));
    }
}


