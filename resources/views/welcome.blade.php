@extends('layouts.app')

@section('title', 'Beranda - Sistem Informasi Klinik Rawat Jalan')

@section('content')
    <section class="hero-section py-5 bg-white border-bottom">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-7 text-start">
                    <h1 class="h2 fw-bold mb-1">Sistem Informasi Klinik Rawat Jalan</h1>
                    <p class="text-muted mb-3">Portal terpadu pengelolaan operasional dan pelayanan klinik rawat jalan</p>
                    <p class="mb-4">
                        Sistem ini menyediakan akses informasi rekam medis pasien, jadwal &amp; data dokter medis,
                        ketersediaan ruangan klinik, serta katalog obat. Pengunjung dapat melihat seluruh data secara
                        langsung, sementara penambahan, perubahan, dan penghapusan data hanya dapat dilakukan oleh
                        petugas sesuai hak akses masing-masing.
                    </p>

                    @guest
                        <a href="{{ route('login') }}" class="btn btn-primary-custom px-4 py-2">
                            Login Petugas untuk Kelola Data
                        </a>
                    @else
                        <span class="badge bg-success px-3 py-2 fs-6">
                            Login sebagai: {{ Auth::user()->username ?? Auth::user()->name }}
                        </span>
                    @endguest
                </div>

                <div class="col-md-5 text-center">
                    <svg viewBox="0 0 120 120" width="180" height="180" role="img" aria-label="Ikon medis">
                        <rect x="10" y="10" width="100" height="100" rx="22" fill="#2f4f4f"/>
                        <rect x="50" y="26" width="20" height="68" rx="5" fill="#ffffff"/>
                        <rect x="26" y="50" width="68" height="20" rx="5" fill="#ffffff"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <h2 class="h4 fw-bold mb-4">Pilih Layanan &amp; Data Klinik</h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title fw-bold" style="color: #2f4f4f;">Manajemen Pasien</h5>
                                <p class="card-text text-muted small">
                                    Pencatatan nomor rekam medis, identitas, domisili, dan kontak darurat pasien.
                                </p>
                            </div>
                            <a href="{{ route('pasien.index') }}" class="btn btn-primary-custom w-100 mt-3">
                                {{ Gate::allows('kelola-pasien') ? 'Kelola Data Pasien' : 'Lihat Data Pasien' }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title fw-bold" style="color: #2f4f4f;">Data Dokter Medis</h5>
                                <p class="card-text text-muted small">
                                    Informasi daftar dokter umum, spesialis, nomor SIP, dan jadwal praktik klinik.
                                </p>
                            </div>
                            <a href="{{ route('dokter.index') }}" class="btn btn-primary-custom w-100 mt-3">
                                {{ Gate::allows('kelola-dokter') ? 'Kelola Data Dokter' : 'Lihat Data Dokter' }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title fw-bold" style="color: #2f4f4f;">Data Ruangan</h5>
                                <p class="card-text text-muted small">
                                    Pemantauan kode ruangan poli, ruang pemeriksaan, kapasitas, dan status penggunaan.
                                </p>
                            </div>
                            <a href="{{ route('ruang-poli.index') }}" class="btn btn-primary-custom w-100 mt-3">
                                {{ Gate::allows('kelola-ruangan') ? 'Kelola Data Ruangan' : 'Lihat Data Ruangan' }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="card-title fw-bold" style="color: #2f4f4f;">Katalog Obat</h5>
                                <p class="card-text text-muted small">
                                    Daftar persediaan obat farmasi klinik, jenis satuan, stok tersedia, dan harga.
                                </p>
                            </div>
                            <a href="{{ route('obat.index') }}" class="btn btn-primary-custom w-100 mt-3">
                                {{ Gate::allows('kelola-obat') ? 'Kelola Katalog Obat' : 'Lihat Katalog Obat' }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection