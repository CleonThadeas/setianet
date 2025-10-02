<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Subscription;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Admin lihat semua produk & transaksi
            $products = Product::all();
            $subscriptions = Subscription::with('user','product')->get();
            return view('admin.dashboard', compact('products','subscriptions'));
        }

        // User biasa
        $subscription = $user->subscription;
        if ($subscription) {
            return view('user.dashboard', [
                'subscription' => $subscription
            ]);
        } else {
            $products = Product::all();
            return view('user.dashboard', compact('products'));
        }
    }
}
