<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Susut PLN</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .table-container {
            margin: 20px auto;
            max-width: 90%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background: #007bff;
            color: white;
        }
        .highlight-green { background: #28a745; color: white; }
        .highlight-yellow { background: #ffc107; }
        .highlight-red { background: #dc3545; color: white; }

        /* Preloader */
        #preloader {
            position: fixed;
            width: 100%;
            height: 100%;
            background: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            z-index: 9999;
            transition: opacity 0.5s ease-out, visibility 0.5s ease-out;
        }
        #preloader.fade-out {
            opacity: 0;
            visibility: hidden;
        }
        .chart-container {
            width: 100%;
            max-width: 1000px;
            height: 500px;
            margin: auto;
            position: relative;
        }
        .electric-icon {
            position: absolute;
            font-size: 24px;
            color: #ffcc00;
            transform: translate(-50%, -50%);
            transition: transform 0.3s ease-in-out;
        }
        .hidden-content {
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        <style>
        .form-container {
            max-width: 800px;
            margin: auto;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">PLN</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('susut.index') }}">Home"</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('susut.create') }}">Tambah Data</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('susut.login') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="preloader">
        <p class="mt-3 fw-bold">Memuat halaman...</p>
    </div>

    <div class="container mt-4 hidden-content">
        <h2 class="text-center">📊 Bendera Susut UP3 Lubuk Pakam</h2>
        <div class="chart-container position-relative">
            <canvas id="susutChart"></canvas>
            <div id="electric-icon" class="electric-icon">⚡</div>
        </div>
        <div class="table-container mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Unit Layanan</th>
                        <th>AGT</th>
                        <th>SEP</th>
                        <th>OKT</th>
                        <th>NOV</th>
                        <th>DES</th>
                        <th>Target Bulan DES</th>
                        <th>Target Kumulatif</th>
                        <th>Capaian Bulan DES</th>
                        <th>Capaian Kumulatif</th>
                        <th>Peringkat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>ULP Lubuk Pakam</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>ULP Tanjung Morawa</td>                       
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>ULP Perbaungan</td>
                        
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>ULP Sei Rampah</td>
                        
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>ULP Galang</td>
                        
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>ULP Dolok Masihul</td>
                        
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                document.getElementById('preloader').classList.add('fade-out');
                document.querySelectorAll('.hidden-content').forEach(el => {
                    el.style.opacity = 1;
                    el.style.transform = 'translateY(0)';
                });
            }, 2000);
        });

        var ctx = document.getElementById('susutChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['AGT', 'SEP', 'OKT', 'NOV', 'DES'],
                datasets: [{
                    label: 'Jumlah Susut (MW)',
                    data: [6.17, 7.06, 7.48, 7.21, 5.62],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 3,
                    pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                    pointRadius: 8,
                    pointHoverRadius: 10,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: { title: { display: true, text: 'Bulan' }},
                    y: { beginAtZero: true, min: 0, stepSize: 2 }
                }
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
