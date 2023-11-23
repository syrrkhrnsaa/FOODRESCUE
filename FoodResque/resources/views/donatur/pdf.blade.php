<!DOCTYPE html>
<html>
<head>
    <title>Data Donatur PDF</title>
</head>
<body>
    <h2>Data Donatur</h2>
    <p><strong>Username:</strong> {{ $donatur->username }}</p>
    <p><strong>Nama Donatur:</strong> {{ $donatur->nama_donatur }}</p>
    <p><strong>Alamat:</strong> {{ $donatur->alamat }}</p>
    <p><strong>No. Telepon:</strong> {{ $donatur->no_telp }}</p>

    <h3>Makanan yang Dimiliki</h3>
    <ul>
        @foreach ($donatur->Have as $makanan)
            <li>{{ $makanan->nama_makanan }}</li>
        @endforeach
    </ul>
</body>
</html>
