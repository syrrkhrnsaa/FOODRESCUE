@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Daftar Mitra')

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
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Pastikan Anda telah memuat jQuery dan DataTables sebelum script berikut -->
    <script>
        console.log("URL Mitra Index:", "{{ route('mitra.index') }}");
        $(document).ready(function() {
            $('#mitra-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('mitra.index') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'username', name: 'username' },
                    { data: 'nama_mitra', name: 'nama_mitra' },
                    { data: 'alamat', name: 'alamat' },
                    { data: 'no_telp', name: 'no_telp' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                    $('td:eq(0)', nRow).html('<a href="' + aData.id + '"> ' + aData.id + '</a>');
                }
            });
        });
    </script>
@endpush
