<!-- resources/views/ulasan/show.blade.php -->
@extends('layouts.base_admin.base_dashboard')
<title>@yield('judul') Lihat Ulasan</title>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Detail Ulasan</h1>
                <div class="card">
                    <div class="card-body">
                        <p class="card-text"><strong>Ulasan ID:</strong> {{ $ulasan->id }}</p>
                        <p class="card-text"><strong>Mitra:</strong> {{ $ulasan->mitra->nama_mitra }}</p>
                        <p class="card-text"><strong>Makanan:</strong> {{ $ulasan->makanan->nama_makanan }}</p>
                        <p class="card-text"><strong>Isi Ulasan:</strong> {{ $ulasan->isi_ulasan }}</p>
                        <a href="{{ route('ulasan.edit', $ulasan->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('ulasan.destroy', $ulasan->id) }}" method="POST" style="display: inline-block;">
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
