@extends('layouts.base_admin.base_dashboard')

@section('content')
    <h1>Tambah Donatur</h1>

    <form action="{{ route('donatur.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="nama_donatur">Nama Donatur</label>
            <input type="text" class="form-control" id="nama_donatur" name="nama_donatur" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required></textarea>
        </div>
        <div class="form-group">
            <label for="no_telp">No. Telp</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
