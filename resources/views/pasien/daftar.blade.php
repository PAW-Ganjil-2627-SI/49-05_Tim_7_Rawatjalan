@extends('layouts.app')

@section('title', 'Daftar Pasien')

@section('content')
    <main class="container py-5">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-4">
            <div>
                <h1 class="h3 fw-bold mb-1">Daftar Pasien</h1>
                <p class="text-muted mb-0">Rekapitulasi data pasien yang tersimpan di sistem.</p>
            </div>
            
            @can('kelola-pasien')
                <a href="{{ route('pasien.form') }}" class="btn btn-primary-custom">+ Tambah Pasien</a>
            @endcan
        </div>

        <div class="table-responsive bg-white p-3 border rounded-1">
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead style="background-color: #2f4f4f; color: white;">
                    <tr>
                        <th scope="col" class="text-center" style="width: 5%;">No</th>
                        <th scope="col" style="width: 18%;">No. Rekam Medis</th>
                        <th scope="col" style="width: 25%;">Nama Pasien</th>
                        <th scope="col" style="width: 22%;">Domisili</th>
                        <th scope="col" style="width: 15%;">Kontak Darurat</th>
                        @can('kelola-pasien')
                            <th scope="col" class="text-center" style="width: 15%;">Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasien as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->Nomor_Rekam_Medis }}</td>
                            <td>{{ $item->Profil_Pasien }}</td>
                            <td>{{ $item->Domisili_Pasien }}</td>
                            <td>{{ $item->Kontak_Darurat_Pasien }}</td>
                            @can('kelola-pasien')
                                <td class="text-center">
                                    <a href="{{ route('pasien.edit', $item) }}" class="btn btn-sm btn-warning me-1">Edit</a>

                                    <form action="{{ route('pasien.destroy', $item) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pasien ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach

                    @if ($pasien->isEmpty())
                        <tr>
                            <td colspan="{{ Gate::allows('kelola-pasien') ? 6 : 5 }}" class="text-center text-muted py-4">Belum ada data pasien.</td>
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