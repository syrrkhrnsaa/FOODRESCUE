@extends('layouts.base_admin.base_dashboard')

@section('content')
    <h1>Daftar Donatur</h1>
    <a href="{{ route('donatur.create') }}" class="btn btn-success">Tambah Donatur</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama Donatur</th>
                <th>Alamat</th>
                <th>No. Telp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donatur as $donatur)
                <tr>
                    <td>{{ $donatur->donatur_id }}</td>
                    <td>{{ $donatur->username }}</td>
                    <td>{{ $donatur->nama_donatur }}</td>
                    <td>{{ $donatur->alamat }}</td>
                    <td>{{ $donatur->no_telp }}</td>
                    <td>
                        <a href="{{ route('donatur.show', $donatur->id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('donatur.edit', $donatur->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('donatur.destroy', $donatur->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
