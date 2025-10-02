<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class UserController extends Controller
{
    // Menampilkan semua paket yang tersedia
    public function packages()
    {
        $products = Product::orderBy('speed')->get();
        return view('user.packages', compact('products'));
    }

    // Menampilkan paket yang dimiliki user
    public function myPackage()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
    
        $subscriptions = $user->subscriptions()->get();
    
        return view('user.mypackage', compact('subscriptions'));
    }
    
}
