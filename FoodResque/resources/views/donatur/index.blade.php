<!-- resources/views/donatur/index.blade.php -->
@extends('layouts.base_admin.base_dashboard')

@section('content')
    <div class="container">
        <h1>Daftar Donatur</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('donatur.create') }}" class="btn btn-primary mb-3">Tambah Donatur</a>
        <a href="{{ url('donatur/export-pdf') }}" class="btn btn-warning mb-3">Export to PDF</a>
        <table class="table" id="donatur-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Nama Donatur</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>

    @push('scripts')
    <script>
        $(function() {
            $('#donatur-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('donatur.data') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'username', name: 'username' },
                    { data: 'nama_donatur', name: 'nama_donatur' },
                    { data: 'alamat', name: 'alamat' },
                    { data: 'no_telp', name: 'no_telp' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>
    @endpush
@endsection
