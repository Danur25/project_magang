<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Susut PLN</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
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
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('susut.index') }}">GRAFIK & TABEL</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="text-center text-primary">Tambah Data Susut PLN</h1>

        <div class="form-container bg-white p-4 rounded shadow-sm">
            <!-- resources/views/susut/create.blade.php -->
<form action="{{ route('susut.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="ulp" class="form-label">Pilih Unit Layanan (ULP)</label>
        <select name="ulp" id="ulp" class="form-select" required>
            <option value="" selected disabled>-- Pilih ULP --</option>
            <option value="ULP Tanjung Morawa">ULP Tanjung Morawa</option>
            <option value="ULP Galang">ULP Galang</option>
            <option value="ULP Dolok Masihul">ULP Dolok Masihul</option>
            <option value="ULP Pakam Kota">ULP Pakam Kota</option>
            <option value="ULP Sei Rampah">ULP Sei Rampah</option>
            <option value="ULP Perbaungan">ULP Perbaungan</option>
            <option value="UP3 Pakam">UP3 Lubuk Pakam</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="jumlah_susut" class="form-label">Jumlah Susut (MW)</label>
        <input type="number" step="0.01" name="jumlah_susut" id="jumlah_susut" class="form-control" required>
    </div>

    <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary">Simpan Data</button>
        <a href="{{ route('susut.index') }}" class="btn btn-secondary">Batal</a>
    </div>
</form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>