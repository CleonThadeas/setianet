@extends('layouts.dashboard')

@section('content')
<h1 class="text-3xl font-bold mb-6">Kelola Pengguna</h1>

<div class="overflow-x-auto bg-[#2B2B2B] rounded-2xl shadow-lg">
    <table class="w-full text-left">
        <thead class="bg-[#423F3E] text-gray-200 uppercase text-sm">
            <tr>
                <th class="p-4">Nama</th>
                <th class="p-4">Email</th>
                <th class="p-4">Paket</th>
                <th class="p-4">Status</th>
                <th class="p-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-gray-700 hover:bg-[#3A3A3A] transition">
                <td class="p-4">Andri</td>
                <td class="p-4">andri@mail.com</td>
                <td class="p-4">20 Mbps</td>
                <td class="p-4">
                    <span class="px-3 py-1 text-xs font-bold rounded-full bg-green-500 text-white">Aktif</span>
                </td>
                <td class="p-4 flex space-x-2">
                    <button class="bg-blue-500 px-4 py-2 rounded-lg text-white hover:bg-blue-700">Detail</button>
                    <button class="bg-red-500 px-4 py-2 rounded-lg text-white hover:bg-red-700">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
