<?php

namespace App\Policies;

use App\Models\Obat;
use App\Models\User;

class ObatPolicy
{
    public function create(User $user): bool
    {
        return in_array($user->role, ['admin', 'petugas']);
    }
    public function update(User $user, Obat $obat): bool
    {
        return in_array($user->role, ['admin', 'petugas']);
    }

    public function delete(User $user, Obat $obat): bool
    {
        return $user->role === 'admin';
    }
}