<!-- resources/views/makanan/show.blade.php -->

@extends('layouts.base_admin.base_dashboard')

@section('content')
    <div class="container">
        <h2>Detail Makanan</h2>
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Nama Menu</th>
                            <td>{{ $makanan->nama_menu }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Makanan</th>
                            <td>{{ $makanan->jumlah_makanan }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Expired</th>
                            <td>{{ $makanan->tanggal_expired }}</td>
                        </tr>
                        <tr>
                            <th>Waktu</th>
                            <td>{{ $makanan->waktu }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $makanan->status }}</td>
                        </tr>
                        <tr>
                            <th>Donatur</th>
                            <td>{{ $makanan->donatur->nama_donatur }}</td>
                        </tr>
                        <tr>
                            <th>Mitra</th>
                            <td>{{ $makanan->mitra ? $makanan->mitra->nama_mitra : 'Belum diambil oleh Mitra' }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('makanan.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection