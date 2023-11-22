<!-- resources/views/mitra/index.blade.php -->
@extends('layouts.base_admin.base_dashboard')
<title>@yield('judul') Daftar Mitra</title>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Daftar Mitra</h1>
                <a href="{{ route('mitra.create') }}" class="btn btn-primary mb-3">Add New Mitra</a>

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

    <!-- Include jQuery and DataTables scripts -->
    <script src="https://code.jquery.com/jquery-3.6.5.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>

    @push('scripts')
        <script>
            $(function() {
                $('#mitra-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! url('mitra') !!}',
                    columns: [
                        { data: 'mitra_id', name: 'mitra_id' },
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

@push('scripts')
<script>
    $(document).ready(function() {
        $('#mitra-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('mitra.data') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'username', name: 'username' },
                { data: 'nama_mitra', name: 'nama_mitra' },
                { data: 'alamat', name: 'alamat' },
                { data: 'no_telp', name: 'no_telp' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>
@endpush