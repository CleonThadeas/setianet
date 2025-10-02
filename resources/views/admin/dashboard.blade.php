@extends('layouts.dashboard')

@section('content')
<h1 class="text-3xl font-bold mb-8">Dashboard Admin</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Total Users -->
    <div class="bg-gradient-to-br from-blue-600 to-blue-800 p-6 rounded-2xl shadow-lg text-white hover:scale-105 transition">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-lg">Total Users</h2>
                <p class="text-4xl font-bold">120</p>
            </div>
            <i class="fas fa-users text-4xl opacity-70"></i>
        </div>
        <a href="{{ route('admin.users') }}" class="mt-4 inline-block px-4 py-2 bg-white/20 rounded-lg hover:bg-white/30 transition">Detail →</a>
    </div>

    <!-- Total Paket -->
    <div class="bg-gradient-to-br from-purple-600 to-purple-800 p-6 rounded-2xl shadow-lg text-white hover:scale-105 transition">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-lg">Total Paket</h2>
                <p class="text-4xl font-bold">5</p>
            </div>
            <i class="fas fa-box text-4xl opacity-70"></i>
        </div>
        <a href="{{ route('admin.reports') }}" class="mt-4 inline-block px-4 py-2 bg-white/20 rounded-lg hover:bg-white/30 transition">Detail →</a>
    </div>

    <!-- Bestseller -->
    <div class="bg-gradient-to-br from-green-600 to-green-800 p-6 rounded-2xl shadow-lg text-white hover:scale-105 transition">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-lg">Bestseller</h2>
                <p class="text-xl font-bold">Paket 50 Mbps</p>
            </div>
            <i class="fas fa-star text-4xl opacity-70"></i>
        </div>
        <a href="{{ route('admin.reports') }}" class="mt-4 inline-block px-4 py-2 bg-white/20 rounded-lg hover:bg-white/30 transition">Detail →</a>
    </div>
</div>
@endsection
