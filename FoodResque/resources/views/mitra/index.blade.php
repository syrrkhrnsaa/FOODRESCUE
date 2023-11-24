<!-- resources/views/mitra/index.blade.php -->
@extends('layouts.base_admin.base_dashboard')
<title>@yield('judul') Daftar Mitra</title>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Daftar Mitra</h1>
                <a href="{{ route('mitra.create') }}" class="btn btn-primary mb-3">Add New Mitra</a>
                <a href="{{ route('mitra.exportPdf') }}" class="btn btn-warning mb-3">Export to PDF</a>
                <table class="table" id="mitra-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Nama Mitra</th>
                            <th>Alamat</th>
                            <th>No. Telp</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function() {
                $('#mitra-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('mitra.data') !!}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'username', name: 'username' },
                        { data: 'nama_mitra', name: 'nama_mitra' },
                        { data: 'alamat', name: 'alamat' },
                        { data: 'no_telp', name: 'no_telp' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ],
                });
            });
        </script>
    @endpush
@endsection