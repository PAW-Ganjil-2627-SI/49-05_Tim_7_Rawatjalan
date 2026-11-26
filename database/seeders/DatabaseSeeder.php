<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\RuangPoli;
use App\Models\obat;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ==========================================
        // 1. DATA AKUN PETUGAS (SEMUA ROLE / FITUR)
        // ==========================================
        $akunList = [
            ['username' => 'admin',    'name' => 'Admin Klinik',     'email' => 'admin@klinik.com',    'role' => 'admin'],
            ['username' => 'pasien',   'name' => 'Petugas Pasien',   'email' => 'pasien@klinik.com',   'role' => 'pasien'],
            ['username' => 'dokter',   'name' => 'Staff Dokter',     'email' => 'dokter@klinik.com',   'role' => 'dokter'],
            ['username' => 'ruangan',  'name' => 'Petugas Ruangan',  'email' => 'ruangan@klinik.com',  'role' => 'ruangan'],
            ['username' => 'apoteker', 'name' => 'Petugas Apoteker', 'email' => 'apoteker@klinik.com', 'role' => 'apoteker'],
        ];

        $hasUsername = Schema::hasColumn('users', 'username');
        $hasName     = Schema::hasColumn('users', 'name');
        $hasEmail    = Schema::hasColumn('users', 'email');
        $hasRole     = Schema::hasColumn('users', 'role');

        foreach ($akunList as $akun) {
            $dataUser = [
                'password' => Hash::make('password'),
            ];

            if ($hasUsername) $dataUser['username'] = $akun['username'];
            if ($hasName)     $dataUser['name']     = $akun['name'];
            if ($hasEmail)    $dataUser['email']    = $akun['email'];
            if ($hasRole)     $dataUser['role']     = $akun['role'];

            $uniqueKey = $hasUsername
                ? ['username' => $akun['username']]
                : ['email' => $akun['email']];

            User::updateOrCreate($uniqueKey, $dataUser);
        }

        // ==========================================
        // 2. DATA DUMMY FITUR PASIEN
        // ==========================================
        if (Schema::hasTable('pasien')) {
            Pasien::updateOrCreate(
                ['Nomor_Rekam_Medis' => 100001],
                [
                    'Profil_Pasien'         => 'Budi Santoso',
                    'Kontak_Darurat_Pasien' => '081234567890',
                    'Domisili_Pasien'       => 'Jl. Telekomunikasi No. 1, Bandung',
                ]
            );
            Pasien::updateOrCreate(
                ['Nomor_Rekam_Medis' => 100002],
                [
                    'Profil_Pasien'         => 'Siti Aminah',
                    'Kontak_Darurat_Pasien' => '082198765432',
                    'Domisili_Pasien'       => 'Jl. Buah Batu No. 45, Bandung',
                ]
            );
        }

        // ==========================================
        // 3. DATA DUMMY FITUR DOKTER
        // ==========================================
        if (Schema::hasTable('data_dokter')) {
            $dokterTable = DB::table('data_dokter');
            if ($dokterTable->count() === 0) {
                $dataDokter = [
                    [
                        'nama'      => 'dr. Andi Wijaya, Sp.PD',
                        'sip'       => 'SIP-001/2026',
                        'spesialis' => 'Penyakit Dalam',
                    ],
                    [
                        'nama'      => 'dr. Maya Putri, Sp.A',
                        'sip'       => 'SIP-002/2026',
                        'spesialis' => 'Kesehatan Anak',
                    ],
                ];

                if (Schema::hasColumn('data_dokter', 'kontak')) {
                    $dataDokter[0]['kontak'] = '081311112222';
                    $dataDokter[1]['kontak'] = '081333334444';
                }

                $dokterTable->insert($dataDokter);
            }
        }

        // ==========================================
        // 4. DATA DUMMY FITUR RUANG POLI
        // ==========================================
        if (Schema::hasTable('ruang_polis')) {
            if (RuangPoli::count() === 0) {
                RuangPoli::create([
                    'nama_poli'     => 'Poli Umum 1',
                    'lokasi_gedung' => 'Gedung A - Lantai 1',
                    'alat_medis'    => 'Stetoskop, Tensimeter Digital, Termometer',
                ]);
                RuangPoli::create([
                    'nama_poli'     => 'Poli Gigi & Mulut',
                    'lokasi_gedung' => 'Gedung B - Lantai 2',
                    'alat_medis'    => 'Dental Unit, Sterilisator, Lampu Periksa',
                ]);
            }
        }

        // ==========================================
        // 5. DATA DUMMY FITUR OBAT
        // ==========================================
        if (Schema::hasTable('obat')) {
            if (obat::count() === 0) {
                obat::create([
                    'id_obat'        => 'OBT-001',
                    'nama_obat'      => 'Paracetamol 500mg',
                    'kategori_obat'  => 'Analgesik & Antipiretik',
                    'stok_obat'      => 150,
                    'pabrik_pembuat' => 'PT Kimia Farma',
                ]);
                obat::create([
                    'id_obat'        => 'OBT-002',
                    'nama_obat'      => 'Amoxicillin 500mg',
                    'kategori_obat'  => 'Antibiotik',
                    'stok_obat'      => 80,
                    'pabrik_pembuat' => 'PT Kalbe Farma',
                ]);
            }
        }
    }
}