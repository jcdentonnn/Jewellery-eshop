<?php
namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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

    /***
     * Funkcia pre zobrazenie zoznamu vsetkych produktov pre Administratora
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function prod_list(Request $request)
    {
        $products = $this->filterProducts($request)
            ->paginate(20)
            ->withQueryString();
        return view('prod-list', compact('products'));
    }


    /**
     * Vyhladavanie produktu podla request-u z inputu do formy v header.blade.php
     * > pouzite indexovanie (english)
     * > zabezpeceny match so slovami, ktore sa zacinaju na vyhladane slovo (:*))
     * > zabezpecene spojenie slov (&)
     *
     * src: https://laravel.com/docs/12.x/scout
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function search(Request $request){

        $q = trim($request->input('q', '')); //vstupna hodnota z request-u

        if(!$q) {
            return redirect()->back()->withInput()
                ->with('error', 'Please enter a search term.');
        }

        //tokenizacia request-u $q, zachytenie podobnych (korenovo) slov a ch spojenie
        $query = collect(explode(' ', $q))
            ->map(fn($term) => $term . ':*')
            ->implode(' & ');

        //porovnanie vektora lexem s query, strankovanie
        $products = Product::whereRaw("to_tsvector('english', coalesce(productname,'')||'
         '||coalesce(productdesc,'')) @@ to_tsquery('english', ?)", [$query])
            ->paginate(12)
            ->withQueryString();

        return view('search-res', compact('products','q'));
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
            ->leftJoin('categories', 'products.id', '=', 'categories.productid')
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
            $q->whereIn('categories.category', $categories);
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


    /***
     * Funkcia na pridanie produktu do DB zo stranky /a_addproduct
     * Pristup ma len admin
     *
     * @return redirect
     */
    public function a_addProduct(Request $request): RedirectResponse {
        //dd('route a_addProduct - ok', $request->all());

        //data su validovane
        $valid_data = $request->validate([
            'prod-name' => 'required|string|max:50',
            'prod-desc' => 'required|string|max:250',
            'prod-price' => 'required|numeric|min:0',

            'prod-image' => 'required|array|size:4',
            'prod-image.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048',

            'category' => 'required|array|min:1',
            'category.*' => 'in:engagement,diamonds,precious_stone,watches,accessories,art_of_gift',

            'type' => 'required|in:ring,earrings,necklace,gift,accessory',
            'material' => 'required|in:Yellow Gold,White Gold,Rose Gold,Silver,Platinum,Stainless steel,Other',
            'paving' => 'required|in:true,false'
        ]);
        //dd('validation - ok', $valid_data);

        //spracovanie obrazkov - vytvorenie unikatneho mena pre kazdy
        $f_names= [];

        foreach ($request->file('prod-image') as $file){
            $f_name = Str::slug($valid_data['prod-name']) . '_' . Str::random(5)
                . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $f_name);
            $f_names[] = $f_name;
        }

        //nova instancia produktu
        $prod = Product::create([
            'productname' => $valid_data['prod-name'],
            'productdesc' => $valid_data['prod-desc'],
            'price' => $valid_data['prod-price'],
            'type' => $valid_data['material'],
            'paving' => $valid_data['paving'],
            'imagename' => $f_names[0],
            'imagename2' => $f_names[1],
            'imagename3' => $f_names[2],
            'imagename4' => $f_names[3],
        ]);

        //array pre category, kedze ich moze byt viacero + append type,
        // kedze sa ukladaju do jedneho stlpca 'category' tabulky 'category'
        $cat_arr = $valid_data['category'];
        $cat_arr[] = $valid_data['type'];

        $insert_rows = array_map(fn($cat) => ['productid'=>$prod->id, 'category'=>$cat,], $cat_arr);
//        \Log::debug('product id = '.$prod->id);
//        \Log::debug('cats & types: '.print_r($insert_rows, true));
//        dd($prod->id, $insert_rows);

        DB::table('categories')->insert($insert_rows); //vlozenie do 'categories'



        return redirect()
            ->route('adminpage')
            ->with('success', 'The product with ID '.$prod->id .' was successfully added');
    }


    /**
     * Odstránenie produktu z databázy
     *
     * Vymaže: záznamy v tabuľkách categories,products, cartitems
     * @param int $id - ID produktu
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete_product($id)
    {

        DB::table('categories')
            ->where('productid', $id)
            ->delete();

        DB::table('products')
            ->where('id', $id)
            ->delete();

        //ak by mal nejaký zákazník daný produkt v košíku
        DB::table('cartitems')
            ->where('productid', $id)
            ->delete();

        return back()->with('success', 'Product deleted successfully');
    }


    public function edit_product(Request $request, $id)
    {
        $product = Product::find($id);

        if ($product)
        {
            // Zistí sa aktuálny typ produktu z množiny (rings,earrings,necklace,gift,accessory)
            $productType = DB::table('categories')
                ->where('productid', $product->id)
                ->whereIn('category', ['ring', 'earrings', 'necklace', 'gift', 'accessory']) //je potrebné to rozlíšiť lebo sú pomiešané s kategóriami
                ->pluck('category')
                ->first();

            //existujúci list kategórií
            $existingCategories = DB::table('categories')
                ->where('productid', $product->id)
                ->pluck('category')
                ->toArray();

            if ($request->isMethod('put'))
            {
                $valid_data = $request->validate([
                    'prod-name' => 'required|string|max:50',
                    'prod-desc' => 'required|string|max:250',
                    'prod-price' => 'required|numeric|min:0',
                    'category' => 'required|array|min:1',
                    'category.*' => 'in:engagement,diamonds,precious_stone,watches,accessories,art_of_gift',
                    'material' => 'required|in:Yellow Gold,White Gold,Rose Gold,Silver,Platinum,Stainless steel,Other',
                    'type' => 'required|in:ring,earrings,necklace,gift,accessory',
                    'paving' => 'required|in:true,false',
                    'prod-image' => 'nullable|array|size:4',
                    'prod-image.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
                ]);

                //fotky
                $f_names = [];
                if ($request->hasFile('prod-image')) {
                    foreach ($request->file('prod-image') as $file) {
                        $f_name = Str::slug($valid_data['prod-name']) . '_' . Str::random(5)
                            . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('images'), $f_name);
                        $f_names[] = $f_name;
                    }
                }

                // Aktualizujú sa informácie o produkte
                $product->productname = $valid_data['prod-name'];
                $product->productdesc = $valid_data['prod-desc'];
                $product->price = $valid_data['prod-price'];
                $product->type = $valid_data['material']; //materiál
                $product->paving = $valid_data['paving'];

                if ($f_names) {
                    $product->imagename = $f_names[0];
                    $product->imagename2 = $f_names[1] ?? null;
                    $product->imagename3 = $f_names[2] ?? null;
                    $product->imagename4 = $f_names[3] ?? null;
                }

                $product->save();



                //odstránia sa akékoľvek predošlé záznamy z množiny (rings,earrings,necklace,gift,accessory)
                DB::table('categories')
                    ->where('productid', $product->id)
                    ->whereIn('category', ['ring', 'earrings', 'necklace', 'gift', 'accessory'])
                    ->whereNotIn('category', [$valid_data['type']])
                    ->delete();

                //pridá sa nový záznam (daný typ z rings,earrings,necklace,gift,accessory)
                DB::table('categories')->insert([
                    'productid' => $product->id,
                    'category' => $valid_data['type'],
                ]);



                //nový list kategórií (ktoré admin vyklikal, že sú platné)
                $newCategories = $valid_data['category'];

                //porovná sa zmena checklistu, zistí sa, ktoré k. sa majú pridať a ktoré odobrať
                $categoriesToAdd = array_diff($newCategories, $existingCategories);
                $categoriesToRemove = array_diff($existingCategories, $newCategories);

                //odoberú sa už neplatné kategórie
                DB::table('categories')
                    ->where('productid', $product->id)
                    ->whereIn('category', $categoriesToRemove)
                    ->delete();

                //pridajú sa nové platné kategórie
                foreach ($categoriesToAdd as $category) {
                    DB::table('categories')->insert([
                        'productid' => $product->id,
                        'category' => $category,
                    ]);
                }

                return redirect()
                    ->route('adminpage')
                    ->with('success', 'Product updated successfully');
            }

            return view('a_editproduct', compact('product', 'existingCategories', 'productType'));
        }

        return back()->with('error', 'Product not found');
    }
}


