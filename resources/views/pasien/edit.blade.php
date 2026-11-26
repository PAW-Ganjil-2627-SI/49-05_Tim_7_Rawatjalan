@extends('layouts.app')

@section('title', 'Edit Pasien')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm p-4">
                    <h3 class="fw-bold mb-3 border-bottom pb-2">Edit Data Pasien</h3>

                    @if ($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif

                    <form action="{{ route('pasien.update', $pasien) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nomor Rekam Medis</label>
                            <input type="text" class="form-control" value="{{ $pasien->Nomor_Rekam_Medis }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="Profil_Pasien" class="form-label">Nama Pasien</label>
                            <input type="text" class="form-control" id="Profil_Pasien" name="Profil_Pasien"
                                value="{{ old('Profil_Pasien', $pasien->Profil_Pasien) }}" maxlength="40" required>
                        </div>

                        <div class="mb-3">
                            <label for="Kontak_Darurat_Pasien" class="form-label">Kontak Darurat</label>
                            <input type="text" class="form-control" id="Kontak_Darurat_Pasien" name="Kontak_Darurat_Pasien"
                                value="{{ old('Kontak_Darurat_Pasien', $pasien->Kontak_Darurat_Pasien) }}" maxlength="12" required>
                        </div>

                        <div class="mb-3">
                            <label for="Domisili_Pasien" class="form-label">Domisili Pasien</label>
                            <input type="text" class="form-control" id="Domisili_Pasien" name="Domisili_Pasien"
                                value="{{ old('Domisili_Pasien', $pasien->Domisili_Pasien) }}" maxlength="100" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pasien.daftar') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary-custom">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
