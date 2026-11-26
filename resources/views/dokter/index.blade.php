@extends('layouts.app')

@section('title', 'Data Dokter Medis')

@section('content')
    <main class="container py-5">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
            <div>
                <h1 class="h3 fw-bold mb-1">Data Dokter Medis</h1>
                <p class="text-muted mb-0">Rekapitulasi data dokter medis dan spesialisasi di klinik.</p>
            </div>
            @can('kelola-dokter')
                <a href="{{ route('dokter.tambah') }}" class="btn btn-primary-custom">+ Tambah Data</a>
            @endcan
        </div>

        <div class="table-responsive bg-white p-3 border rounded-1">
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead style="background-color: #2f4f4f; color: white;">
                    <tr>
                        <th class="text-center" style="width: 5%;">No</th>
                        <th>Nama Dokter</th>
                        <th>SIP</th>
                        <th>Spesialisasi</th>
                        @can('lihat-kontak-dokter')
                            <th>Kontak</th>
                        @endcan
                        @can('kelola-dokter')
                            <th class="text-center" style="width: 15%;">Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dokter as $row)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->sip }}</td>
                            <td>{{ $row->spesialis }}</td>
                            @can('lihat-kontak-dokter')
                                <td>{{ $row->kontak }}</td>
                            @endcan
                            @can('kelola-dokter')
                                <td class="text-center">
                                    <a href="{{ route('dokter.edit', $row->sip) }}" class="btn btn-warning btn-sm me-1">Edit</a>

                                    <form action="{{ route('dokter.destroy', $row->sip) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach

                    @if ($dokter->isEmpty())
                        <tr>
                            <td colspan="{{ Gate::allows('kelola-dokter') ? 6 : 4 }}" class="text-center text-muted py-4">Belum ada data dokter.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        @guest
            <p class="text-muted small mt-3 mb-0">
                Ingin menambah, mengubah, atau menghapus data? <a href="{{ route('login') }}">Login</a> terlebih dahulu.
            </p>
        @endguest
    </main>
@endsection