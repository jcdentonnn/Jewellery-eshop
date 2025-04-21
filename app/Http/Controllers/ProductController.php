<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class ProductController extends Controller
{

    public function show($id)
    {
        $product = DB::table('products')->find($id);

        return view('productinfo', compact('product'));
    }

    public function engagement(Request $request)
    {
        $products = $this->filterProducts($request)
            ->whereIn('products.id', function($query) {
                $query->select('productid')
                    ->from('categories')
                    ->where('category','engagement');
            })
            ->paginate(9)
            ->withQueryString();

        return view('engagement', compact('products'));
    }

    public function diamonds(Request $request)
    {
        $products = $this->filterProducts($request)
            ->whereIn('products.id', function($query) {
                $query->select('productid')
                    ->from('categories')
                    ->where('category','diamonds');
            })
            ->paginate(9)
            ->withQueryString();
        return view('diamonds', compact('products'));
    }

    public function precious_stone(Request $request)
    {
        $products = $this->filterProducts($request)
            ->whereIn('products.id', function($query) {
            $query->select('productid')
                ->from('categories')
                ->where('category', 'precious_stone');
        })
            ->paginate(9)
            ->withQueryString();
        return view('precious_stone', compact('products'));
    }

    public function watches(Request $request)
    {
        $products = $this->filterProducts($request)
            ->whereIn('products.id', function($query) {
            $query->select('productid')
                ->from('categories')
                ->where('category', 'watches');
        })
            ->paginate(9)
            ->withQueryString();
        return view('watches', compact('products'));
    }

    public function accessories(Request $request)
    {
        $products = $this->filterProducts($request)
            ->whereIn('products.id', function($query) {
            $query->select('productid')
                ->from('categories')
                ->where('category', 'accessories');
        })
            ->paginate(9)
            ->withQueryString();
        return view('accessories', compact('products'));
    }

    public function art_of_gift(Request $request)
    {
        $products = $this->filterProducts($request)
            ->whereIn('products.id', function($query) {
            $query->select('productid')
                ->from('categories')
                ->where('category', 'art_of_gift');
        })
            ->paginate(9)
            ->withQueryString();
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

        $products= Product::where('productname', 'ILIKE', "%{$q}%")
            ->orWhere('productdesc', 'ILIKE', "%{$q}%")
            ->paginate(12); //12ks pre stranku

        if(!$q){
            $q='Empty search';
        }

        return view('search-res', compact('products', 'q'));
    }

    /**
     * Filtrovanie produktov podla parametrov vo filtri
     * @param Request $request
     * @return $q - vysledky query
     */
    protected function filterProducts(Request $request) {

        //popularita na zaklade objednavok z tabulky 'orderitems'
        $q = Product::query()
            ->leftJoin('orderitems', 'products.id', '=', 'orderitems.productid')
            ->select([
                'products.*',
                DB::raw('COALESCE(SUM(orderitems.amount), 0) as pop')
            ])
            ->groupBy('products.id');

        //sortovanie ceny a popularity ('pop')
        switch($request->input('sort')){
            case 'pricedesc':
                $q->orderBy('price', 'DESC');
                break;
            case 'priceasc':
                $q->orderBy('price', 'ASC');
                break;
            default:
                $q->orderByDesc('pop');
        }

        // filtrovanie na zaklade kategorie vyrobku (ring, earring, ...)
        if($categories = $request->input('category')){
            $q->whereIn('products.category', $categories);
        }

        //filtrovanie na zaklade metalu (yellow / role / white gold, ...)
        if($metals = $request->input('metal')){
            $q->whereIn('products.type', $metals);
        }

        // filtrovanie na zaklade pave - true/false
        if($paving = $request->input('paving')){
            $q->whereIn('products.paving', $paving);
        }

        return $q;
    }
}


