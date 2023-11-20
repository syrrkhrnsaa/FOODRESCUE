<!-- resources/views/mitra/edit.blade.php -->
@extends('layouts.base_admin.base_dashboard')
<title>@yield('judul') Edit Mitra</title>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Mitra</h1>
                <form action="{{ route('mitra.update', $mitra->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ $mitra->username }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_mitra">Nama Mitra:</label>
                        <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" value="{{ $mitra->nama_mitra }}" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $mitra->alamat }}" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No. Telp:</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $mitra->no_telp }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
