<!-- resources/views/ulasan/create.blade.php -->

@extends('layouts.base_admin.base_dashboard')

@section('content')
    <div class="container">
        <h1>Tambah Ulasan Baru</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('ulasan.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}">
            </div>

            <div class="form-group">
                <label for="isi">Isi Ulasan:</label>
                <textarea class="form-control" id="isi" name="isi" rows="5">{{ old('isi') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Ulasan</button>
        </form>
    </div>
@endsection
