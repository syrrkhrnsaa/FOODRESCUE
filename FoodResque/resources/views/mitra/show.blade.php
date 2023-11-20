<!-- resources/views/mitra/show.blade.php -->
@extends('layouts.base_admin.base_dashboard')
<title>@yield('judul') View Mitra</title>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Mitra Details</h1>
                <div class="card">
                    <div class="card-body">
                        <p class="card-text"><strong>Mitra ID:</strong> {{ $mitra->id }}</p>
                        <p class="card-text"><strong>Username:</strong> {{ $mitra->username }}</p>
                        <p class="card-text"><strong>Nama Mitra:</strong> {{ $mitra->nama_mitra }}</p>
                        <p class="card-text"><strong>Alamat:</strong> {{ $mitra->alamat }}</p>
                        <p class="card-text"><strong>No. Telp:</strong> {{ $mitra->no_telp }}</p>
                        <a href="{{ route('mitra.edit', $mitra->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('mitra.destroy', $mitra->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
