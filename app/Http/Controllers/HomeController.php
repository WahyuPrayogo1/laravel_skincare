<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $latestProducts = Product::where('status', 'new')->latest()->take(10)->get();

        $bestSellers = Product::where('status', 'best_seller')->take(10)->get();

        $category = Category::all();

        return view('frontend.beranda', compact('bestSellers', 'latestProducts', 'category'));
    }

    public function produk()
    {
        $latestProducts = Product::where('status', 'new')->latest()->take(10)->get();

        $bestSellers = Product::where('status', 'best_seller')->take(10)->get();

        $category = Category::all();

        return view('frontend.produk', compact('bestSellers', 'latestProducts', 'category'));
    }

    public function TentangKami()
    {
        return view('frontend.tentang-kami');
    }
        public function KontakKami()
    {
        return view('frontend.kontak');
    }
        public function Galeri()
    {
        return view('frontend.galeri');
    }
}
