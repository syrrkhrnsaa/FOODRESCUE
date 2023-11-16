@extends('layouts.base_admin.base_dashboard')

@section('content')
    <h1>Detail Donatur</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <td>{{ $donatur->donatur_id }}</td>
        </tr>
        <tr>
            <th>Username</th>
            <td>{{ $donatur->username }}</td>
        </tr>
        <tr>
            <th>Nama Donatur</th>
            <td>{{ $donatur->nama_donatur }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $donatur->alamat }}</td>
        </tr>
        <tr>
            <th>No. Telp</th>
            <td>{{ $donatur->no_telp }}</td>
        </tr>
    </table>
    <a href="{{ route('donatur.index') }}" class="btn btn-primary">Kembali</a>
@endsection
