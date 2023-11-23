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
                <label for="mitra_id">Mitra:</label>
                <select class="form-control" id="mitra_id" name="mitra_id">
                    <!-- Populate this dropdown with Mitra options -->
                    @foreach ($mitras as $mitra)
                        <option value="{{ $mitra->id }}" {{ old('mitra_id') == $mitra->id ? 'selected' : '' }}>
                            {{ $mitra->id }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="makanan_id">Makanan:</label>
                <select class="form-control" id="makanan_id" name="makanan_id">
                    <!-- Populate this dropdown with Makanan options -->
                    @foreach ($makanans as $makanan)
                        <option value="{{ $makanan->id }}" {{ old('makanan_id') == $makanan->id ? 'selected' : '' }}>
                            {{ $makanan->id }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="isi_ulasan">Isi Ulasan:</label>
                <textarea class="form-control" id="isi_ulasan" name="isi_ulasan" rows="5">{{ old('isi_ulasan') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Tambah Ulasan</button>
        </form>
    </div>
@endsection
