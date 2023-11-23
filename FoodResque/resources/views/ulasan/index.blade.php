<!-- resources/views/ulasan/index.blade.php -->

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

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Isi Ulasan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ulasan as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->judul }}</td>
                        <td>{{ $u->isi }}</td>
                        <td>
                            <a href="{{ route('ulasan.show', $u->id) }}" class="btn btn-info">Tampilkan</a>
                            <a href="{{ route('ulasan.edit', $u->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('ulasan.destroy', $u->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
