<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>403 - Akses Ditolak</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #eef2f3; color: #2c3e50;
               display: flex; align-items: center; justify-content: center; min-height: 100vh; }
        .box { background: #fff; padding: 48px 56px; border-radius: 12px; text-align: center;
               box-shadow: 0 2px 12px rgba(0,0,0,.08); max-width: 440px; }
        h1 { font-size: 72px; margin: 0; color: #2f4f4f; }
        p { margin: 12px 0 28px; }
        a { display: inline-block; padding: 10px 24px; background: #2f4f4f; color: #fff;
            text-decoration: none; border-radius: 8px; }
    </style>
</head>
<body>
    <div class="box">
        <h1>403</h1>
        <p>{{ $exception->getMessage() ?: 'Anda tidak memiliki hak akses.' }}</p>
        <a href="{{ url()->previous() }}">Kembali</a>
    </div>
</body>
</html>