<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function engagement()
    {
        $products = Product::where('category', 'engagement')->get();
        return view('engagement', compact('products'));
    }

    public function diamonds()
    {
        $products = Product::where('category', 'diamonds')->get();
        return view('diamonds', compact('products'));
    }

    public function precious_stone()
    {
        $products = Product::where('category', 'precious_stone')->get();
        return view('precious_stone', compact('products'));
    }

    public function watches()
    {
        $products = Product::where('category', 'watches')->get();
        return view('watches', compact('products'));
    }

    public function accessories()
    {
        $products = Product::where('category', 'accessories')->get();
        return view('accessories', compact('products'));
    }

    public function art_of_gift()
    {
        $products = Product::where('category', 'art_of_gift')->get();
        return view('art_of_gift', compact('products'));
    }
}


