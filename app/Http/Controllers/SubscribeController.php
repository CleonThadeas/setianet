<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use App\Models\Product;
use Carbon\Carbon;

class SubscribeController extends Controller
{
    public function subscribe($id)
    {
        $user = Auth::user();

        // Cek apakah produk ada
        $product = Product::findOrFail($id);

        // Cek apakah user sudah punya subscription aktif
        $existing = Subscription::where('user_id', $user->id)
            ->where('status', 'active')
            ->where('expired_at', '>', Carbon::now())
            ->first();

        if ($existing) {
            return redirect()->route('dashboard')->with('error', 'Kamu sudah punya paket aktif.');
        }

        // Buat subscription baru
        Subscription::create([
            'user_id'    => $user->id,
            'product_id' => $product->id,
            'status'     => 'active',
            'started_at' => Carbon::now(),
            'expired_at' => Carbon::now()->addMonth(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Berhasil berlangganan paket ' . $product->name);
    }
}
