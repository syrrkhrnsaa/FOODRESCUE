
    <style>
        /* Gaya tambahan untuk tabel */
        body {
            font-family: Arial, sans-serif;
            background-color: #fff; /* Warna latar belakang */
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center; /* Pusatkan judul */
            margin-top: 20px; /* Ruang atas */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff; /* Warna latar belakang tabel */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Bayangan */
            margin: 20px auto; /* Jarak dari tepi */
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 12px;
            text-align: left;
        }

        table th {
            border: 1px solid #fff;
            background-color: #000;
            font-weight: bold;
            color: #fff
        }

        table tbody tr:hover {
            background-color: #f9f9f9; /* Warna saat dihover */
        }

        /* Gaya tambahan untuk judul */
        h1 {
            color: #000; /* Warna teks */
        }
    </style>

</head>
<body>
    <h1>Data Mitra</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama Mitra</th>
                <th>Alamat</th>
                <th>No. Telp</th>
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