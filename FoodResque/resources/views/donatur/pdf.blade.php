<!-- resources/views/donatur/pdf.blade.php -->

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<table>
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
        @foreach ($donaturData as $donatur)
            <tr>
                <td>{{ $donatur->id }}</td>
                <td>{{ $donatur->username }}</td>
                <td>{{ $donatur->nama_donatur }}</td>
                <td>{{ $donatur->alamat }}</td>
                <td>{{ $donatur->no_telp }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
