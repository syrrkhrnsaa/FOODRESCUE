<!-- resources/views/makanan/create.blade.php -->

@extends('layouts.base_admin.base_dashboard')

@section('content')
    <div class="container">
        <h2>Tambah Makanan</h2>
        <form action="{{ route('makanan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_menu">Nama Menu:</label>
                <input type="text" class="form-control" id="nama_menu" name="nama_menu" required>
            </div>
            <div class="form-group">
                <label for="jumlah_makanan">Jumlah Makanan:</label>
                <input type="number" class="form-control" id="jumlah_makanan" name="jumlah_makanan" required>
            </div>
            <div class="form-group">
                <label for="tanggal_expired">Tanggal Expired:</label>
                <input type="date" class="form-control" id="tanggal_expired" name="tanggal_expired" required>
            </div>
            <div class="form-group">
                <label for="waktu">Waktu:</label>
                <input type="time" class="form-control" id="waktu" name="waktu" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div>
            {{-- <div class="form-group">
                <label for="donatur_id">Donatur ID:</label>
                <input type="number" class="form-control" id="donatur_id" name="donatur_id" required>
            </div>
            <div class="form-group">
                <label for="mitra_id">Mitra ID:</label>
                <input type="number" class="form-control" id="mitra_id" name="mitra_id" required>
            </div> --}}
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
