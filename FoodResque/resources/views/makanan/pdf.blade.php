
    <style>
        /* Tambahkan gaya CSS di sini jika diperlukan */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Makanan</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Menu</th>
                <th>Jumlah Makanan</th>
                <th>Tanggal Expired</th>
                <th>Waktu</th>
                <th>Status</th>
                <th>Donatur</th>
                <th>Mitra</th>
            </tr>
        </thead>
        <tbody>
            @foreach($makananData as $makanan)
            <tr>
                <td>{{ $makanan->id }}</td>
                <td>{{ $makanan->nama_menu }}</td>
                <td>{{ $makanan->jumlah_makanan }}</td>
                <td>{{ $makanan->tanggal_expired }}</td>
                <td>{{ $makanan->waktu }}</td>
                <td>{{ $makanan->status }}</td>
                <td>{{ $makanan->donatur->nama_donatur }}</td>
                <td>{{ $makanan->mitra->nama_mitra }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
