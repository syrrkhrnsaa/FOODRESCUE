@extends('layouts.base_admin.base_dashboard')

@section('content')
    <div class="container">
        <h2>Data Makanan</h2>
        <a href="{{ route('makanan.create') }}" class="btn btn-success mb-2">Tambah Makanan</a>
        <table class="table" id="makanan-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Menu</th>
                    <th>Jumlah Makanan</th>
                    <th>Tanggal Expired</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Donatur</th>
                    <th>Mitra</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#makanan-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('makanan.getData') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'nama_Menu', name: 'nama_Menu' },
                    { data: 'jumlah_Makanan', name: 'jumlah_Makanan' },
                    { data: 'tanggal_Expired', name: 'tanggal_Expired' },
                    { data: 'waktu', name: 'waktu' },
                    { data: 'status', name: 'status' },
                    { data: 'donatur.username', name: 'donatur.username' },
                    { data: 'mitra.nama_mitra', name: 'mitra.nama_mitra' },
                    { data: 'action', name: 'action' },
                ]
            });
        });
    </script>
@endsection
