@extends('layouts.dashboard')

@section('content')
<h1 class="text-2xl font-bold mb-6">📊 Laporan Pengguna</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- User Growth -->
    <div class="bg-[#362222] p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold mb-3">Pertumbuhan User</h2>
        <canvas id="userChart"></canvas>
    </div>

    <!-- Package Popularity -->
    <div class="bg-[#362222] p-6 rounded-lg shadow">
        <h2 class="text-lg font-semibold mb-3">Paket Terpopuler</h2>
        <canvas id="packageChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data User (per bulan)
    const userLabels = @json(array_keys($userStats->toArray()));
    const userData = @json(array_values($userStats->toArray()));

    new Chart(document.getElementById('userChart'), {
        type: 'bar',
        data: {
            labels: userLabels.map(m => "Bulan " + m),
            datasets: [{
                label: 'Jumlah User',
                data: userData,
                backgroundColor: '#f59e0b'
            }]
        }
    });

    // Data Paket (terlaris)
    const packageLabels = @json($packageStats->pluck('name'));
    const packageData = @json($packageStats->pluck('subscriptions_count'));

    new Chart(document.getElementById('packageChart'), {
        type: 'pie',
        data: {
            labels: packageLabels,
            datasets: [{
                data: packageData,
                backgroundColor: ['#ef4444','#3b82f6','#10b981','#f59e0b','#8b5cf6']
            }]
        }
    });
</script>
@endsection
