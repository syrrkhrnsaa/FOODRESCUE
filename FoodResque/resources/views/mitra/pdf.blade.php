
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
                <th>Username</th>
                <th>Nama Mitra</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <!-- Tambahkan kolom-kolom lain jika diperlukan -->
            </tr>
        </thead>
        <tbody>
            @foreach($mitraData as $mitra)
            <tr>
                <td>{{ $mitra->id }}</td>
                <td>{{ $mitra->username }}</td>
                <td>{{ $mitra->nama_mitra }}</td>
                <td>{{ $mitra->alamat }}</td>
                <td>{{ $mitra->no_telp }}</td>
                <!-- Tambahkan kolom-kolom lain jika diperlukan -->
            </tr>
            @endforeach
        </tbody>
    </table>