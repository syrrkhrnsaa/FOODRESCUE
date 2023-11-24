
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
    <h2>Data Ulasan</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Mitra</th>
                <th>Makanan</th>
                <th>Isi Ulasan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ulasanData as $ulasan)
                <tr>
                    <td>{{ $ulasan->id }}</td>
                    <td>{{ $ulasan->mitra->username }}</td>
                    <td>{{ $ulasan->makanan->nama_menu }}</td>
                    <td>{{ $ulasan->isi_ulasan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
