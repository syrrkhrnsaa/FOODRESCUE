@extends('layouts.base_admin.base_dashboard')

@section('content')

<div class="container">
    <h1>Daftar Donatur</h1>
    <a href="{{ route('donatur.create') }}" class="btn btn-success">Tambah Donatur</a>

    <div class="mb-3">
    <a href="{{ route('donatur.exportPdf') }}" class="btn btn-primary" target="_blank">Export to PDF</a>
</div>


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

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        var table = $('#donatur-table').DataTable({
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
            ],
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf',
            ]
        });

        // Add event listener for the export PDF button
        $('#export-pdf').on('click', function () {
            table.button('.buttons-pdf').trigger();
        });
    });
</script>
@endpush
