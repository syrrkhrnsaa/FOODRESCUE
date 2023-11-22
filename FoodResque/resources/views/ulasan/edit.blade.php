<!-- resources/views/ulasan/edit.blade.php -->
@extends('layouts.base_admin.base_dashboard')
<title>@yield('judul') Edit Ulasan</title>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Ulasan</h1>
                <form action="{{ route('ulasan.update', $ulasan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="mitra_id">Mitra:</label>
                        <select class="form-control" id="mitra_id" name="mitra_id" required>
                            {{-- Populate options based on your Mitra data --}}
                            @foreach($mitras as $mitra)
                                <option value="{{ $mitra->id }}" {{ $ulasan->mitra_id == $mitra->id ? 'selected' : '' }}>{{ $mitra->nama_mitra }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="makanan_id">Makanan:</label>
                        <select class="form-control" id="makanan_id" name="makanan_id" required>
                            {{-- Populate options based on your Makanan data --}}
                            @foreach($makanans as $makanan)
                                <option value="{{ $makanan->id }}" {{ $ulasan->makanan_id == $makanan->id ? 'selected' : '' }}>{{ $makanan->nama_makanan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="isi_ulasan">Isi Ulasan:</label>
                        <textarea class="form-control" id="isi_ulasan" name="isi_ulasan" required>{{ $ulasan->isi_ulasan }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
