<!-- resources/views/makanan/create.blade.php -->

@extends('layouts.base_admin.base_dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Tambah Makanan Baru
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

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
                                <label for="tanggal_expired">Tanggal Kadaluarsa:</label>
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
                            <div class="form-group">
                                <label for="donatur_id">Donatur:</label>
                                <select class="form-control" id="donatur_id" name="donatur_id">
                                    <!-- Populate this dropdown with Mitra options -->
                                    @foreach ($donatur as $donaturs)
                                        <option value="{{ $donaturs->id }}" {{ old('nama_donatur') == $donaturs->nama_donatur ? 'selected' : '' }}>
                                            {{ $donaturs->nama_donatur }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mitra_id">Mitra:</label>
                                <select class="form-control" id="mitra_id" name="mitra_id">
                                    <!-- Populate this dropdown with Mitra options -->
                                    @foreach ($mitras as $mitra)
                                        <option value="{{ $mitra->id }}" {{ old('nama_mitra') == $mitra->nama_mitra ? 'selected' : '' }}>
                                            {{ $mitra->nama_mitra }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="foto">Foto:</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Makanan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

