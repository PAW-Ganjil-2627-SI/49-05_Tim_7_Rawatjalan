<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ruang Poliklinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary shadow-sm mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Klinik Rawat Jalan - Poliklinik</span>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h4 class="mb-0 text-primary">Form Edit Ruang Poliklinik</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('ruang-poli.update', $ruangPoli->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_poli" class="form-label">Nama Ruangan Poli</label>
                                <input type="text" class="form-control" id="nama_poli" name="nama_poli" value="{{ $ruangPoli->nama_poli }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="lokasi_gedung" class="form-label">Lokasi Gedung & Lantai</label>
                                <input type="text" class="form-control" id="lokasi_gedung" name="lokasi_gedung" value="{{ $ruangPoli->lokasi_gedung }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="alat_medis" class="form-label">Inventaris Alat Medis Utama</label>
                                <textarea class="form-control" id="alat_medis" name="alat_medis" rows="4" required>{{ $ruangPoli->alat_medis }}</textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('ruang-poli.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Update Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>