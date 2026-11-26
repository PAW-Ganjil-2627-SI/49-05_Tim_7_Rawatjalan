@extends('layouts.app')

@section('title', 'Katalog Obat')

@section('content')
    <main class="container py-5">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
            <div>
                <h1 class="h3 fw-bold mb-1">Daftar Obat</h1>
                <p class="text-muted mb-0">Rekapitulasi data persediaan obat yang tersimpan di sistem.</p>
            </div>
            @can('kelola-obat')
                <a href="{{ route('obat.create') }}" class="btn btn-primary-custom">+ Tambah Obat</a>
            @endcan
        </div>

        <div class="table-responsive bg-white p-3 border rounded-1">
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead style="background-color: #2f4f4f; color: white;">
                    <tr>
                        <th scope="col" class="text-center" style="width: 5%;">No</th>
                        <th scope="col">ID / Kode Obat</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Kategori Obat</th>
                        <th scope="col">Stok Obat</th>
                        <th scope="col">Pabrik Pembuat</th>
                        @can('kelola-obat')
                            <th scope="col" class="text-center" style="width: 15%;">Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($obat as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->id_obat }}</td>
                            <td>{{ $item->nama_obat }}</td>
                            <td>{{ $item->kategori_obat }}</td>
                            <td>{{ $item->stok_obat }}</td>
                            <td>{{ $item->pabrik_pembuat }}</td>
                            @can('kelola-obat')
                                <td class="text-center">
                                    <a href="{{ route('obat.edit', $item) }}" class="btn btn-warning btn-sm me-1">Edit</a>

                                    <form action="{{ route('obat.destroy', $item) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach

                    @if ($obat->isEmpty())
                        <tr>
                            <td colspan="{{ Gate::allows('kelola-obat') ? 7 : 6 }}" class="text-center text-muted py-4">Belum ada data obat.</td>
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