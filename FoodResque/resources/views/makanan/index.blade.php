@extends('layouts.base_admin.base_dashboard')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <h2>Data Makanan</h2>
            <a href="{{ route('makanan.create') }}" class="btn btn-primary mb-3">Tambah Makanan</a>
            <a href="{{ route('makanan.exportPdf') }}" class="btn btn-warning mb-3">Export to PDF</a>
            <table class="table" id="makanan-table">
                <thead>
                    <tr>
                        <th>No</th>
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
    </div>

    @push('scripts')
        <script>
            $(function() {
                $('#makanan-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('makanan.data') !!}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'nama_menu', name: 'nama_menu' },
                        { data: 'jumlah_makanan', name: 'jumlah_makanan' },
                        { data: 'tanggal_expired', name: 'tanggal_expired' },
                        { data: 'waktu', name: 'waktu' },
                        { data: 'status', name: 'status' },
                        { data: 'donatur.nama_donatur', name: 'donatur.nama_donatur' },
                        { data: 'mitra.nama_mitra', name: 'mitra.nama_mitra' },
                        { data: 'action', name: 'action', orderable: false, searchable: false },
                    ],
                });
            });
        </script>
    @endpush
@endsection