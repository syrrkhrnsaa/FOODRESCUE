<!-- resources/views/mitra/index.blade.php -->
@extends('layouts.base_admin.base_dashboard')
<!-- <title>@yield('judul') Daftar Mitra</title> -->

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Daftar Mitra</h1>
                @if(session('success'))
                    <div class="alert alert-success" id="successMessage">
                        {{ session('success') }}
                    </div>
                    <script>
                        setTimeout(function() {
                            document.getElementById('successMessage').style.display = 'none';
                        }, 1900);
                    </script>
                @endif
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

            $('#mitra-table').on('click', '.hapusData', function () {
                var id = $(this).data("id");
                var url = $(this).data("url");
                Swal.fire({
                    title: 'Apa kamu yakin?',
                    text: "Kamu tidak akan dapat mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                "id": id,
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function (response) {
                                Swal.fire('Terhapus!', response.msg, 'success');
                                $('#mitra-table').DataTable().ajax.reload();
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
@endsection