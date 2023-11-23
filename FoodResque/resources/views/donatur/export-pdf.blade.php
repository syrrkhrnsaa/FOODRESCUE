<!-- resources/views/donatur/export-pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Donatur Data</title>
</head>
<body>
    <h1>Donatur Data</h1>
    <table border="1" style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama Donatur</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donatur as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->username }}</td>
                    <td>{{ $data->nama_donatur }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->no_telp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
