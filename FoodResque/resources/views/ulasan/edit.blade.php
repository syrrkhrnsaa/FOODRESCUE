<!-- resources/views/ulasan/edit.blade.php -->

@extends('layouts.app') <!-- Jika menggunakan layout -->

@section('content')
    <div class="container">
        <h1>Edit Ulasan</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ulasan.update', $ulasan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $ulasan->judul }}">
            </div>

            <div class="form-group">
                <label for="isi">Isi Ulasan:</label>
                <textarea class="form-control" id="isi" name="isi" rows="5">{{ $ulasan->isi }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
