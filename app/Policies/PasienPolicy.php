<?php

namespace App\Policies;

use App\Models\Pasien;
use App\Models\User;

class PasienPolicy
{
    // Boleh mengubah data INI?
    public function update(User $user, Pasien $pasien): bool
    {
        return $user->hasRole('admin', 'petugas');
    }

    // Boleh menghapus data INI?
    public function delete(User $user, Pasien $pasien): bool
    {
        return $user->hasRole('admin');
    }
}