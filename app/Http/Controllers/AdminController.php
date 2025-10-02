<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Subscription;

class AdminController extends Controller
{
    public function users()
    {
        // ambil users beserta subscription (jika ada)
        $users = User::with('subscriptions')->get();

        return view('admin.users', compact('users'));
    }

    public function reports()
    {
        // Jumlah user tiap bulan
        $userStats = User::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->pluck('total','month');

        // Data paket terlaris (jumlah subscription per paket)
        $packageStats = Product::withCount(['subscriptions'])
            ->orderByDesc('subscriptions_count')
            ->get();

        return view('admin.report', [
            'userStats' => $userStats,
            'packageStats' => $packageStats
        ]);
    }

    public function addPackage()
    {
        return view('admin.add-package');
    }

    public function storePackage(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'speed' => 'required|integer',
        ]);

        Product::create($data);

        return redirect()->route('admin.addpackage')->with('success','Paket tersimpan.');
    }
}
