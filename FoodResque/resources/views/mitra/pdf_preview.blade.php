<!-- resources/views/mitra/pdf_preview.blade.php -->
@extends('layouts.base_admin.base_dashboard')

@section('content')
            <div class="col-md-12">
                <h1>Pratinjau Daftar Mitra</h1>
                <h2>Data Mitra</h2>
                <table border="1" style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Nama Mitra</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <!-- Tambahkan kolom-kolom lain jika diperlukan -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mitraData as $mitra)
                            <tr>
                                <td>{{ $mitra->id }}</td>
                                <td>{{ $mitra->username }}</td>
                                <td>{{ $mitra->nama_mitra }}</td>
                                <td>{{ $mitra->alamat }}</td>
                                <td>{{ $mitra->no_telp }}</td>
                                <!-- Tambahkan kolom-kolom lain jika diperlukan -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-3">
                    <a href="{{ route('mitra.exportPdf') }}" class="btn btn-warning">Unduh PDF</a>
                </div>
            </div>
@endsection
