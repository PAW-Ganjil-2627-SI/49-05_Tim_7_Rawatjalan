@extends('layouts.app')

@section('title', 'Daftar Ruang Poliklinik')

@section('content')
    <main class="container py-5">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
            <div>
                <h1 class="h3 fw-bold mb-1">Daftar Ruang Poliklinik &amp; Inventaris</h1>
                <p class="text-muted mb-0">Rekapitulasi data ruang poliklinik dan inventaris alat medis.</p>
            </div>
            @can('kelola-ruangan')
                <a href="{{ route('ruang-poli.create') }}" class="btn btn-primary-custom">+ Tambah Ruangan</a>
            @endcan
        </div>

        <div class="table-responsive bg-white p-3 border rounded-1">
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead style="background-color: #2f4f4f; color: white;">
                    <tr>
                        <th class="text-center" style="width: 5%;">No</th>
                        <th>Nama Ruangan Poli</th>
                        <th>Lokasi Gedung</th>
                        <th>Inventaris Alat Medis</th>
                        @can('kelola-ruangan')
                            <th class="text-center" style="width: 15%;">Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse($ruangPolis as $index => $poli)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $poli->nama_poli }}</td>
                            <td>{{ $poli->lokasi_gedung }}</td>
                            <td>{{ $poli->alat_medis }}</td>
                            @can('kelola-ruangan')
                                <td class="text-center">
                                    <a href="{{ route('ruang-poli.edit', $poli->id) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                    <form action="{{ route('ruang-poli.destroy', $poli->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ Gate::allows('kelola-ruangan') ? 5 : 4 }}" class="text-center text-muted py-4">Belum ada data ruangan poli.</td>
                        </tr>
                    @endforelse
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