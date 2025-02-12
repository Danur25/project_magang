<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Susut PLN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background: #f8f9fa;
        }
        .chart-container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Grafik Susut PLN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('susut.index') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('susut.create') }}">Tambah Data</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('susut.grafik') }}">Grafik</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-4">
        <h2 class="text-center text-primary">📊 Grafik Susut UP3 Lubuk Pakam</h2>
        <div class="chart-container">
            <canvas id="susutChart"></canvas>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('susutChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($data->pluck('tanggal')),
                datasets: [{
                    label: 'Jumlah Susut (MW)',
                    data: @json($data->pluck('jumlah_susut')),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: { title: { display: true, text: 'Tanggal' } },
                    y: { beginAtZero: true, min: 0 }
                }
            }
        });
    </script>
</body>
</html>
