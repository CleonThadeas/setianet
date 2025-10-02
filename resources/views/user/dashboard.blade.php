@extends('layouts.dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-6">User Dashboard</h1>
<div class="bg-[#362222] p-6 rounded-lg text-center">
    <h2 class="text-xl font-bold">Halo, {{ Auth::user()->name }} 👋</h2>
    <p class="mt-2">Selamat datang di SetiaNet. Cek paket pilihanmu atau lihat paket aktifmu.</p>
</div>
@endsection
