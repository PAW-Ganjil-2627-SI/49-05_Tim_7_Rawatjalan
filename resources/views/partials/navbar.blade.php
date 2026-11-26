<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #2f4f4f;">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">Sistem Informasi Klinik Rawat Jalan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active fw-semibold text-warning' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('pasien.*') ? 'active fw-semibold text-warning' : '' }}" href="{{ route('pasien.index') }}">Daftar Pasien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dokter.*') ? 'active fw-semibold text-warning' : '' }}" href="{{ route('dokter.index') }}">Data Dokter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('ruang-poli.*') ? 'active fw-semibold text-warning' : '' }}" href="{{ route('ruang-poli.index') }}">Ruang Poli</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('obat.*') ? 'active fw-semibold text-warning' : '' }}" href="{{ route('obat.index') }}">Katalog Obat</a>
                </li>

                @guest
                    <li class="nav-item ms-lg-2">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item ms-lg-2">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-light">
                                Logout ({{ Auth::user()->username ?? Auth::user()->name }})
                            </button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>