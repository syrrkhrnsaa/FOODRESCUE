@extends('layouts.base_admin.base_dashboard')

@section('content')
    <h1>Edit Donatur</h1>

    <form action="{{ route('donatur.update', $donatur->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Use the PUT method for updates --}}
        
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $donatur->username }}" required>
        </div>
        <div class="form-group">
            <label for="nama_donatur">Nama Donatur</label>
            <input type="text" class="form-control" id="nama_donatur" name="nama_donatur" value="{{ $donatur->nama_donatur }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" required>{{ $donatur->alamat }}</textarea>
        </div>
        <div class="form-group">
            <label for="no_telp">No. Telp</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $donatur->no_telp }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
