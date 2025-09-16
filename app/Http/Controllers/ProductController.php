<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Ambil semua produk
        $products = Product::all();

        // Kirim ke view landing
        return view('landing', compact('products'));
    }
}
