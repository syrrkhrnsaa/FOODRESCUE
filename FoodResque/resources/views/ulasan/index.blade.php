@extends('layouts.base_admin.base_dashboard')

@section('content')
    <div class="container">
        <h1>Daftar Ulasan</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('ulasan.create') }}" class="btn btn-primary mb-3">Tambah Ulasan</a>
        <a href="{{ route('ulasan.exportPdf') }}" class="btn btn-warning mb-3">Export to PDF</a>
        <table class="table" id="ulasan-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mitra</th>
                    <th>Makanan</th>
                    <th>Isi Ulasan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>

    @push('scripts')
    <script>
    $(function() {
        $('#ulasan-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('ulasan.data') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'mitra_id', name: 'mitra_id' },
                { data: 'makanan_id', name: 'makanan_id' },
                { data: 'isi_ulasan', name: 'isi_ulasan' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
    });
</script>
    @endpush
@endsection
