<!-- resources/views/donatur/create.blade.php -->
@extends('layouts.base_admin.base_dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Add New Mitra</h1>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('mitra.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_mitra">Nama Mitra:</label>
                        <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No. Telp:</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
