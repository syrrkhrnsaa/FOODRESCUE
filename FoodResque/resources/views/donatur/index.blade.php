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

<<<<<<< HEAD
<div class="container mx-3 my-4">
    <h1>Daftar Donatur</h1>
    <a href="{{ route('donatur.create') }}" class="btn btn-success">Tambah Donatur</a>
    <a href="{{ route('donatur.exportPdf') }}" class="btn btn-primary" target="_blank">Export to PDF</a>
</div>


<table class="table" id="donatur-table">
    <thead>
        <tr>
            <th class="px-9">ID</th>
            <th class="px-9">Username</th>
            <th class="px-9">Nama Donatur</th>
            <th class="px-9">Alamat</th>
            <th class="px-9">No. Telepon</th>
            <th class="px-9">Action</th>
        </tr>
    </thead>
    <!-- Your table body goes here -->
</table>

</div>
=======
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
>>>>>>> main

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
