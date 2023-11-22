<!-- resources/views/makanan/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detail Makanan</h2>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $makanan->id }}</td>
                </tr>
                <tr>
                    <th>Nama Menu</th>
                    <td>{{ $makanan->nama_Menu }}</td>
                </tr>
                <tr>
                    <th>Jumlah Makanan</th>
                    <td>{{ $makanan->jumlah_Makanan }}</td>
                </tr>
                <tr>
                    <th>Tanggal Expired</th>
                    <td>{{ $makanan->tanggal_Expired }}</td>
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
                    <td>{{ $makanan->donatur->username }}</td>
                </tr>
                <tr>
                    <th>Mitra</th>
                    <td>{{ $makanan->mitra->nama_mitra }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('makanan.index') }}" class="btn btn-primary">Kembali</a>
    </div>
@endsection
