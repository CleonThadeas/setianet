<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SetiaNet Dashboard</title>

    <!-- Tailwind CDN (kalau belum compile via Vite) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FontAwesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Kalau pakai Laravel Vite juga boleh -->
    {{-- @vite('resources/css/app.css') --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SetiaNet Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background-color: #171010; color: #f8f9fa; }
        .sidebar { background-color: #362222; min-height: 100vh; }
        .sidebar a, .sidebar button {
            display: flex; align-items: center; gap: 10px;
            padding: 12px 15px; border-radius: 8px;
            color: #f8f9fa; text-decoration: none;
            transition: background 0.3s;
        }
        .sidebar a:hover, .sidebar button:hover { background-color: #423F3E; }
        .sidebar .active { background-color: #423F3E; font-weight: bold; }
        .topbar { background-color: #2B2B2B; padding: 12px 20px; border-bottom: 1px solid #423F3E; }
        .card { background-color: #2B2B2B; color: #f8f9fa; border-radius: 12px; transition: 0.3s; }
        .card:hover { transform: translateY(-5px); box-shadow: 0px 4px 15px rgba(0,0,0,0.3); }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 4px 15px rgba(0,0,0,0.4);
    }
    .btn-custom {
        background-color: #423F3E;
        color: #f8f9fa;
    }
    .btn-custom:hover {
        background-color: #2B2B2B;
    }
    </style>
</head>
<body>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        title: 'Gagal!',
        text: "{{ session('error') }}",
        icon: 'error',
        confirmButtonText: 'OK'
    });
</script>
@endif

<div class="d-flex">
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar p-3 d-none d-md-block">
        <div class="d-flex align-items-center mb-4">
            <img src="{{ asset('logo/logonet.png') }}" class="me-2" width="40" height="40" alt="logo">
            <span class="fw-bold fs-5">SetiaNet</span>
        </div>

        <nav class="nav flex-column gap-1">
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
                <a href="{{ route('admin.users') }}" class="nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}"><i class="bi bi-people"></i> Kelola Pengguna</a>
                <a href="{{ route('admin.reports') }}" class="nav-link {{ request()->routeIs('admin.reports') ? 'active' : '' }}"><i class="bi bi-bar-chart"></i> Laporan Pengguna</a>
                <a href="{{ route('admin.addpackage') }}" class="nav-link {{ request()->routeIs('admin.addpackage') ? 'active' : '' }}"><i class="bi bi-box-seam"></i> Tambah Paket</a>
            @else
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
                <a href="{{ route('user.packages') }}" class="nav-link {{ request()->routeIs('user.packages') ? 'active' : '' }}"><i class="bi bi-bag-check"></i> Paket Pilihan</a>
                <a href="{{ route('user.mypackage') }}" class="nav-link {{ request()->routeIs('user.mypackage') ? 'active' : '' }}"><i class="bi bi-basket"></i> Paket Saya</a>
            @endif

            <form method="POST" action="{{ route('logout') }}" class="mt-3">
                @csrf
                <button type="submit" class="btn w-100 text-start"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 d-flex flex-column">
        <!-- Topbar -->
        <div class="topbar d-flex justify-content-between align-items-center">
            <button onclick="toggleSidebar()" class="btn btn-sm btn-dark d-md-none"><i class="bi bi-list"></i></button>
            <div class="d-flex align-items-center gap-2">
                <span class="fw-semibold">{{ Auth::user()->name }}</span>
                <span class="badge bg-secondary">{{ ucfirst(Auth::user()->role) }}</span>
            </div>
        </div>

        <!-- Page Content -->
        <main class="p-4">
            @yield('content')
        </main>
    </div>
</div>

<script>
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('d-none');
    }
</script>

</body>
</html>
