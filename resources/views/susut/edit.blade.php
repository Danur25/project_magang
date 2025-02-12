<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Susut</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h1 class="text-center text-primary">Edit Data Susut</h1>
        <div class="form-container bg-white p-4 rounded shadow-sm">
            <form action="{{ route('susut.update', $susut->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Pilihan ULP -->
                <div class="mb-3">
                    <label for="ulp" class="form-label">Pilih Unit Layanan (ULP)</label>
                    <select name="ulp" id="ulp" class="form-select" required>
                        <option value="ULP Tanjung Morawa" {{ $susut->ulp == 'ULP Tanjung Morawa' ? 'selected' : '' }}>ULP Tanjung Morawa</option>
                        <option value="ULP Galang" {{ $susut->ulp == 'ULP Galang' ? 'selected' : '' }}>ULP Galang</option>
                        <option value="ULP Dolok Masihul" {{ $susut->ulp == 'ULP Dolok Masihul' ? 'selected' : '' }}>ULP Dolok Masihul</option>
                        <option value="ULP Pakam Kota" {{ $susut->ulp == 'ULP Pakam Kota' ? 'selected' : '' }}>ULP Pakam Kota</option>
                        <option value="ULP Sei Rampah" {{ $susut->ulp == 'ULP Sei Rampah' ? 'selected' : '' }}>ULP Sei Rampah</option>
                        <option value="ULP Perbaungan" {{ $susut->ulp == 'ULP Perbaungan' ? 'selected' : '' }}>ULP Perbaungan</option>
                        <option value="UP3 Pakam" {{ $susut->ulp == 'UP3 Pakam' ? 'selected' : '' }}>UP3 Lubuk Pakam</option>
                    </select>
                </div>

                <!-- Input Tanggal -->
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $susut->tanggal }}" required>
                </div>

                <!-- Input Jumlah Susut -->
                <div class="mb-3">
                    <label for="jumlah_susut" class="form-label">Jumlah Susut (MW)</label>
                    <input type="number" step="0.01" name="jumlah_susut" id="jumlah_susut" class="form-control" value="{{ $susut->jumlah_susut }}" required>
                </div>

                <!-- Tombol Simpan dan Batal -->
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('susut.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>