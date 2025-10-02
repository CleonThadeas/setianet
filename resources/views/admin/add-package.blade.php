@extends('layouts.dashboard')

@section('content')
<h1 class="text-3xl font-bold mb-6">Tambah Paket Internet</h1>

<form class="bg-[#362222] p-6 rounded-xl space-y-4 shadow-lg" method="POST" action="{{ route('admin.storepackage') }}">
    @csrf

    <div>
        <label class="block mb-1 font-semibold">Nama Paket</label>
        <input type="text" name="name" class="w-full p-3 rounded text-black focus:ring-2 focus:ring-blue-400" placeholder="Masukkan nama paket" required>
    </div>

    <div>
        <label class="block mb-1 font-semibold">Deskripsi</label>
        <textarea name="description" class="w-full p-3 rounded text-black focus:ring-2 focus:ring-blue-400" placeholder="Masukkan deskripsi paket" required></textarea>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block mb-1 font-semibold">Harga</label>
            <input type="number" name="price" class="w-full p-3 rounded text-black focus:ring-2 focus:ring-blue-400" placeholder="Harga paket" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Kecepatan (Mbps)</label>
            <input type="number" name="speed" class="w-full p-3 rounded text-black focus:ring-2 focus:ring-blue-400" placeholder="Contoh: 20" required>
        </div>
    </div>

    <button type="submit" class="w-full bg-blue-600 px-4 py-3 rounded text-white font-semibold hover:bg-blue-800 transition">
        Simpan Paket
    </button>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session("success") }}',
        confirmButtonColor: '#3085d6'
    })
</script>
@endif
@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{ session("error") }}',
        confirmButtonColor: '#d33'
    })
</script>
@endif
@endsection
