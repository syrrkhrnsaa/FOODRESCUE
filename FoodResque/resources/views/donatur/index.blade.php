@extends('layouts.base_admin.base_dashboard')

@section('content')

<div class="container">
    <h1>Daftar Donatur</h1>
    <a href="{{ route('donatur.create') }}" class="btn btn-success">Tambah Donatur</a>

    <table class="table" id="donatur-table">
        <thead>
            <tr>
                <th>Username</th>
                <th>Nama Donatur</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#donatur-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('donatur.data') }}',
            columns: [
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
