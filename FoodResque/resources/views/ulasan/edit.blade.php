@extends('layouts.base_admin.base_dashboard')
<title>@yield('judul') Edit Ulasan</title>

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
                <label for="mitra_id">Mitra:</label>
                <select class="form-control" id="mitra_id" name="mitra_id">
                    <!-- Populate this dropdown with Mitra options -->
                    @foreach ($mitras as $mitra)
                        <option value="{{ $mitra->nama_mitra }}" @if ($ulasan->mitra->nama_mitra == $mitra->nama_mitra) selected @endif>{{ $mitra->nama_mitra }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="makanan_id">Makanan:</label>
                <select class="form-control" id="makanan_id" name="makanan_id">
                    <!-- Populate this dropdown with Makanan options -->
                    @foreach ($makanans as $makanan)
                        <option value="{{ $makanan->nama_makanan }}" @if ($ulasan->makanan->nama_makanan == $makanan->nama_makanan) selected @endif>{{ $makanan->nama_makanan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="isi_ulasan">Isi Ulasan:</label>
                <textarea class="form-control" id="isi_ulasan" name="isi_ulasan" rows="5">{{ $ulasan->isi_ulasan }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
