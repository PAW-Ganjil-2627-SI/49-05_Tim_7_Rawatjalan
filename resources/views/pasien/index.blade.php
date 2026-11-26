@extends('layouts.app')

@section('title', 'Daftar Pasien')

@section('content')
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-md-7 text-start">
                    <h1 class="h2 fw-bold mb-1">Sistem Manajemen Pasien</h1>
                    <p class="text-muted mb-3">Pencatatan data rekam medis dan kontak darurat pasien</p>
                    <p class="mb-4">
                        Aplikasi ini digunakan untuk menyimpan dan mengelola data pasien, mulai dari nomor rekam
                        medis, nama, domisili, hingga kontak darurat. Data dapat ditambah, dilihat, diubah, dan
                        dihapus oleh petugas yang sudah login.
                    </p>

                    @auth
                        <a href="#form-pasien" class="btn btn-primary-custom px-4 py-2">Tambah Data Pasien</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-secondary px-4 py-2">Login untuk Kelola Data</a>
                    @endauth
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

    {{-- Formulir Tambah/Edit hanya muncul setelah login --}}
    @auth
        @include('pasien.form')
    @endauth

    {{-- Jika tabel daftar pasien ada di file terpisah (misal pasien.table), panggil di sini di luar @auth --}}
    {{-- @include('pasien.table') --}}
@endsection