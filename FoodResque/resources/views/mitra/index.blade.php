<!-- resources/views/mitra/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>List of Mitra</h1>
                <a href="{{ route('mitra.create') }}" class="btn btn-primary mb-3">Add New Mitra</a>
                <table class="table">
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
                        @foreach($mitra as $mitraItem)
                            <tr>
                                <td>{{ $mitraItem->mitra_id }}</td>
                                <td>{{ $mitraItem->username }}</td>
                                <td>{{ $mitraItem->nama_mitra }}</td>
                                <td>{{ $mitraItem->alamat }}</td>
                                <td>{{ $mitraItem->no_telp }}</td>
                                <td>
                                    <a href="{{ route('mitra.show', $mitraItem->mitra_id) }}" class="btn btn-info">View</a>
                                    <a href="{{ route('mitra.edit', $mitraItem->mitra_id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('mitra.destroy', $mitraItem->mitra_id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
