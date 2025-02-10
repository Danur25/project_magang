<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Susut PLN</title>
</head>
<body>

    <h1>Edit Data Susut PLN</h1>

    @extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Edit Data Susut PLN</h1>

    <div class="card mt-4">
        <div class="card-body">
            <form action="{{ route('susut.update', $susut->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ old('tanggal', $susut->tanggal) }}" required>
                </div>

                <div class="mb-3">
                    <label for="jumlah_susut" class="form-label">Jumlah Susut (MW)</label>
                    <input type="number" id="jumlah_susut" name="jumlah_susut" class="form-control" step="0.1" min="0" value="{{ old('jumlah_susut', $susut->jumlah_susut) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('susut.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection

</body>
</html>
