<!-- resources/views/ulasan/index.blade.php -->
@extends('layouts.base_admin.base_dashboard')
<title>@yield('judul') Daftar Ulasan</title>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Daftar Ulasan</h1>
                <a href="{{ route('ulasan.create') }}" class="btn btn-primary mb-3">Tambah Ulasan Baru</a>

                <table class="table" id="ulasan-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Nama Menu</th>
                            <th>Isi Ulasan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Include jQuery and DataTables scripts -->
    <script src="https://code.jquery.com/jquery-3.6.5.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>

    @push('scripts')
        <script>
            $(function() {
                $('#ulasan-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('ulasan.data') !!}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'mitra.nama_mitra', name: 'mitra.nama_mitra' },
                        { data: 'makanan.nama_makanan', name: 'makanan.nama_makanan' },
                        { data: 'isi_ulasan', name: 'isi_ulasan' },
                        { data: 'action', name: 'action', orderable: false, searchable: false }
                    ],
                });
            });
        </script>
    @endpush
@endsection
