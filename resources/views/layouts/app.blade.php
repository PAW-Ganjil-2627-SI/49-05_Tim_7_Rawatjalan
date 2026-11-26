<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Rawat Jalan - Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar Utama -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('ruang-poli.index') }}">Klinik Rawat Jalan</a>
            <div class="d-flex align-items-center">
                <a href="{{ route('ruang-poli.index') }}" class="btn btn-light btn-sm me-3">Data Ruang Poli</a>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Content Utama -->
    <main class="container">
        @if (isset($header))
            <div class="mb-4">
                <h2 class="h4 text-secondary font-weight-bold">{{ $header }}</h2>
            </div>
        @endif

        {{ $slot }}
    </main>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>