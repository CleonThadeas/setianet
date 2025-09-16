<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('logo/logonet.png') }}" alt="Logo" style="height: 60px; width:auto;" class="me-2">
            {{-- bisa tambahkan teks brand di samping logo jika ingin --}}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-light fw-semibold" href="#produk">Produk</a></li>
                <li class="nav-item"><a class="nav-link text-light fw-semibold" href="#promo">Promo</a></li>
                <li class="nav-item"><a class="nav-link text-light fw-semibold" href="#kontak">Kontak</a></li>
                <li class="nav-item">
                    @auth
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-light ms-3">Logout</button>
                        </form>
                    @else
                    <li class="nav-item"><a class="nav-link text-light fw-semibold" href="{{ route('login') }}">Setia Member</a></li>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>
