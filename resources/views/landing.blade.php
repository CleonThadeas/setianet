@extends('layouts.app')

@section('content')

    <!-- Hero Carousel -->
    <section class="container py-5">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active text-center">
                    <img src="{{ asset('carousel/dummy.png') }}" class="d-block w-100 rounded" alt="Banner 1">
                </div>
                <div class="carousel-item text-center">
                    <img src="{{ asset('carousel/dummy.png') }}" class="d-block w-100 rounded" alt="Banner 2">
                </div>
                <div class="carousel-item text-center">
                    <img src="{{ asset('carousel/dummy.png') }}" class="d-block w-100 rounded" alt="Banner 3">
                </div>
            </div>
        </div>
    </section>

    <!-- Produk Section -->
    <section id="produk" class="container py-5">
        <h2 class="text-center mb-4">Paket Produk</h2>
        <div class="row g-4">
            @foreach($products as $product)
            <div class="col-md-4">
                <div class="card p-4 h-100">
                    <h4 class="card-title fw-bold">{{ $product->name }}</h4>
                    <p class="card-text">{{ $product->description }}</p>
                    <ul class="list-unstyled">
                        <li>Kecepatan: <b>{{ $product->speed }} Mbps</b></li>
                        <li>Kuota: Unlimited</li>
                        <li>Customer Service 24/7</li>
                    </ul>
                    <p class="text-success fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}/bulan</p>
                    <a href="#" class="btn btn-custom w-100">Pilih Paket</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Promo Section -->
    <section id="promo" class="container py-5">
        <h2 class="text-center mb-4">Promo Spesial</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card text-center p-4">
                    <h5>Diskon 20%</h5>
                    <p>Pelanggan baru dapatkan diskon hingga 20% untuk semua paket internet!</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center p-4">
                    <h5>💻 Gratis Pemasangan</h5>
                    <p>Gratis biaya instalasi untuk paket 50 Mbps ke atas.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
