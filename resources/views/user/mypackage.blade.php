@extends('layouts.dashboard') {{-- atau layouts.app sesuai layout kamu --}}

@section('content')
    <h1 class="text-2xl mb-4">Paket Saya</h1>

    @if($subscriptions->isEmpty())
        <div class="p-4 bg-yellow-50 text-yellow-900 rounded">Kamu belum berlangganan paket apapun.</div>
    @else
        <div class="grid md:grid-cols-2 gap-4">
            @foreach($subscriptions as $sub)
                {{-- jika subscription adalah pivot Product model atau Subscription model --}}
                @php
                    $product = $sub instanceof \App\Models\Product ? $sub : ($sub->product ?? null);
                @endphp

                <div class="p-4 bg-white text-black rounded shadow">
                    <h3 class="font-bold">{{ $product->name ?? 'Unknown' }}</h3>
                    <p>{{ $product->description ?? '' }}</p>
                    <p class="font-semibold">Rp {{ number_format($product->price ?? 0,0,',','.') }}</p>
                </div>
            @endforeach
        </div>
    @endif
@endsection
