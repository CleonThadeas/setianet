@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4 fw-bold">Paket Internet Tersedia</h2>

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                        <p class="card-text flex-grow-1">{{ $product->description }}</p>

                        <div class="mt-3">
                            <p class="mb-1"><strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong></p>
                            <p class="text-muted">Speed: {{ $product->speed }} Mbps</p>
                        </div>

                        <a href="{{ route('subscribe', $product->id) }}" class="btn btn-primary">
                            Berlangganan
                        </a>                        
                    </div>
                </div>
            </div>
        @endforeach

        @if($products->isEmpty())
            <div class="col-12">
                <div class="alert alert-warning text-center">
                    Belum ada paket internet yang tersedia saat ini.
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        background-color: #2B2B2B;
        color: #f8f9fa;
        border-radius: 12px;
        transition: 0.3s;
        border: none;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 6px 18px rgba(0,0,0,0.5);
    }
    .btn-custom {
        background-color: #423F3E;
        color: #f8f9fa;
        border-radius: 8px;
        transition: 0.3s;
    }
    .btn-custom:hover {
        background-color: #2B2B2B;
        color: #ffffff;
    }
</style>
@endpush
