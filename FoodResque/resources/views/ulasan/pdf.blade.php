
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
    <h2>Data Mitra</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Mitra</th>
                <th>Makanan</th>
                <th>Isi Ulasan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ulasanData as $ulasan)
                <tr>
                    <td>{{ $ulasan->id }}</td>
                    <td>{{ $ulasan->mitra->username }}</td>
                    <td>{{ $ulasan->makanan->nama_makanan }}</td>
                    <td>{{ $ulasan->isi_ulasan }}</td>
                    <!-- Tambahkan kolom-kolom lain jika diperlukan -->
                    <td><!-- Tambahkan aksi jika diperlukan --></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
