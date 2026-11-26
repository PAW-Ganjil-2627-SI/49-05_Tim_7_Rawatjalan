<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('lihat-laporan', fn (User $user) => $user->hasRole('admin'));

        Gate::define('kelola-pasien', fn (User $user) => $user->hasRole('admin') || $user->hasRole('pasien') || $user->username === 'pasien');
        Gate::define('kelola-dokter', fn (User $user) => $user->hasRole('admin') || $user->hasRole('dokter') || $user->username === 'dokter');
        Gate::define('kelola-ruangan', fn (User $user) => $user->hasRole('admin') || $user->hasRole('ruangan') || $user->username === 'ruangan');
        Gate::define('kelola-obat', fn (User $user) => $user->hasRole('admin') || $user->hasRole('apoteker') || $user->username === 'apoteker');
        Gate::define('lihat-kontak-dokter', fn (User $user) => $user->hasRole('admin') || $user->hasRole('dokter') || $user->username === 'dokter');
    }
}