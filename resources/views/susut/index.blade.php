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
        .chart-container {
            width: 100%;
            max-width: 1000px;
            height: 400px;
            margin: 20px auto;
            position: relative;
        }
        .hidden-content {
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">PLN</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('susut.index') }}">GRAFIK & TABEL"</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('susut.create') }}">INPUT </a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('susut.login') }}">LOGIN
                        
                    </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="preloader">
        <p class="mt-3 fw-bold"></p>
    </div>

    <div class="container mt-4 hidden-content">
        <h2 class="text-center">📊 Grafik Susut UP3 Lubuk Pakam</h2>
        
        <!-- Filter ULP/UP -->
        <div class="mb-3">
            <label for="ulpFilter" class="form-label">Pilih ULP/UP:</label>
            <select class="form-select" id="ulpFilter">
                <option value="all">Semua</option>
                <option value="ulp1">ULP Lubuk Pakam</option>
                <option value="ulp2">ULP Tanjung Morawa</option>
                <option value="ulp3">ULP Perbaungan</option>
                <option value="ulp4">ULP Sei Rampah</option>
                <option value="ulp5">ULP Galang</option>
                <option value="ulp6">ULP Dolok Masihul</option>
                <option value="up3">UP3 Lubuk Pakam</option>
            </select>
        </div>

        <!-- Grafik -->
        <div class="chart-container">
            <canvas id="susutChart"></canvas>
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

        // Data untuk setiap ULP/UP
        const data = {
            ulp1: { label: 'ULP Lubuk Pakam', data: [6.17, 7.06, 7.48, 7.21, 5.62], borderColor: 'rgba(54, 162, 235, 1)' },
            ulp2: { label: 'ULP Tanjung Morawa', data: [4.14, 4.48, 3.57, 4.92, 3.06], borderColor: 'rgba(255, 99, 132, 1)' },
            ulp3: { label: 'ULP Perbaungan', data: [8.08, 8.03, 7.67, 7.48, 6.40], borderColor: 'rgba(75, 192, 192, 1)' },
            ulp4: { label: 'ULP Sei Rampah', data: [8.08, 8.03, 7.67, 7.48, 6.40], borderColor: 'rgba(153, 102, 255, 1)' },
            ulp5: { label: 'ULP Galang', data: [8.08, 8.03, 7.67, 7.48, 6.40], borderColor: 'rgba(255, 159, 64, 1)' },
            ulp6: { label: 'ULP Dolok Masihul', data: [8.08, 8.03, 7.67, 7.48, 6.40], borderColor: 'rgba(255, 205, 86, 1)' },
            up3: { label: 'UP3 Lubuk Pakam', data: [8.08, 8.03, 7.67, 7.48, 6.40], borderColor: 'rgba(201, 203, 207, 1)' }
        };

        const ctx = document.getElementById('susutChart').getContext('2d');
        let chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['JAN','FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL','AGT', 'SEP', 'OKT', 'NOV', 'DES'],
                datasets: []
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

        // Fungsi untuk memperbarui grafik berdasarkan filter
        function updateChart(selectedValue) {
            if (selectedValue === 'all') {
                chart.data.datasets = Object.values(data).map(d => ({
                    label: d.label,
                    data: d.data,
                    backgroundColor: 'rgba(0, 0, 0, 0.1)',
                    borderColor: d.borderColor,
                    borderWidth: 3,
                    pointBackgroundColor: d.borderColor,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    tension: 0.3
                }));
            } else {
                const selectedData = data[selectedValue];
                chart.data.datasets = [{
                    label: selectedData.label,
                    data: selectedData.data,
                    backgroundColor: 'rgba(0, 0, 0, 0.1)',
                    borderColor: selectedData.borderColor,
                    borderWidth: 3,
                    pointBackgroundColor: selectedData.borderColor,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    tension: 0.3
                }];
            }
            chart.update();
        }

        // Event listener untuk filter
        document.getElementById('ulpFilter').addEventListener('change', function() {
            updateChart(this.value);
        });

        // Inisialisasi grafik dengan semua data
        updateChart('all');
    </script>
    <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Unit Layanan Pelanggan</th>
                        <th>JAN</th>
                        <th>FEB</th>
                        <th>MAR</th>
                        <th>APR</th>
                        <th>MEI</th>
                        <th>JUN</th>
                        <th>JUL/th>
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
                        <td class="highlight-yellow">6.17</td>
                        <td>7.06</td>
                        <td>7.48</td>
                        <td>7.21</td>
                        <td class="highlight-green">5.62</td>
                        <td>6.43</td>
                        <td>7.50</td>
                        <td class="highlight-red">86.6%</td>
                        <td class="highlight-blue">100.0%</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>ULP Tanjung Morawa</td>
                        <td>4.14</td>
                        <td>4.48</td>
                        <td>3.57</td>
                        <td>4.92</td>
                        <td>3.06</td>
                        <td>4.53</td>
                        <td>4.85</td>
                        <td class="highlight-green">100.1%</td>
                        <td class="highlight-blue">108.7%</td>
                        <td>2</td>
                    </tr>
                    <>
                        <td>3</td>
                        <td>ULP Perbaungan</td>
                        <td class="highlight-green">8.08</td>
                        <td>8.03</td>
                        <td>7.67</td>
                        <td>7.48</td>
                        <td>6.40</td>
                        <td>8.34</td>
                        <td>8.65</td>
                        <td class="highlight-green">112.1%</td>
                        <td class="highlight-blue">108.0%</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>ULP Sei Rampah</td>
                        <td class="highlight-green">8.08</td>
                        <td>8.03</td>
                        <td>7.67</td>
                        <td>7.48</td>
                        <td>6.40</td>
                        <td>8.34</td>
                        <td>8.65</td>
                        <td class="highlight-green">112.1%</td>
                        <td class="highlight-blue">108.0%</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>ULP Galang</td>
                        <td class="highlight-green">8.08</td>
                        <td>8.03</td>
                        <td>7.67</td>
                        <td>7.48</td>
                        <td>6.40</td>
                        <td>8.34</td>
                        <td>8.65</td>
                        <td class="highlight-green">112.1%</td>
                        <td class="highlight-blue">108.0%</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>ULP Dolok Masihul</td>
                        <td class="highlight-green">8.08</td>
                        <td>8.03</td>
                        <td>7.67</td>
                        <td>7.48</td>
                        <td>6.40</td>
                        <td>8.34</td>
                        <td>8.65</td>
                        <td class="highlight-green">112.1%</td>
                        <td class="highlight-blue">108.0%</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>UP3 Lubuk Pakam</td>
                        <td class="highlight-green">8.08</td>
                        <td>8.03</td>
                        <td>7.67</td>
                        <td>7.48</td>
                        <td>6.40</td>
                        <td>8.34</td>
                        <td>8.65</td>
                        <td class="highlight-green">112.1%</td>
                        <td class="highlight-blue">108.0%</td>
                        <td>4</td>
                    </tr>
                </tbody>
            </table>  
</body>
</html>