<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // Read: halaman daftar pasien
    public function daftar()
    {
        $pasien = Pasien::orderBy('Nomor_Rekam_Medis')->get();

        return view('pasien.daftar', compact('pasien'));
    }

    // Halaman beranda + form tambah
// Halaman daftar pasien
    public function index()
    {
        return $this->daftar();
    }

    // Create: simpan pasien baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'Nomor_Rekam_Medis'     => ['required', 'integer', 'min:1', 'max:2147483647', 'unique:pasien,Nomor_Rekam_Medis'],
            'Profil_Pasien'         => ['required', 'string', 'max:40'],
            'Kontak_Darurat_Pasien' => ['required', 'string', 'max:12'],
            'Domisili_Pasien'       => ['required', 'string', 'max:100'],
        ]);

        Pasien::create($data);

        return redirect()->route('pasien.daftar')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    // Update: tampilkan form edit
    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    // Update: simpan perubahan (Nomor Rekam Medis tidak diubah karena jadi kunci data)
    public function update(Request $request, Pasien $pasien)
    {
        $data = $request->validate([
            'Profil_Pasien'         => ['required', 'string', 'max:40'],
            'Kontak_Darurat_Pasien' => ['required', 'string', 'max:12'],
            'Domisili_Pasien'       => ['required', 'string', 'max:100'],
        ]);

        $pasien->update($data);

        return redirect()->route('pasien.daftar')->with('success', 'Data pasien berhasil diperbarui.');
    }

    // Delete: hapus pasien
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasien.daftar')->with('success', 'Data pasien berhasil dihapus.');
    }
}
