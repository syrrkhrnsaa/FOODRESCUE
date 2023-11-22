<!-- resources/views/ulasan/create.blade.php -->
@extends('layouts.base_admin.base_dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Add New Feedback</h1>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <form action="{{ route('ulasan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="mitra_id">Mitra:</label>
                        <select class="form-control" id="mitra_id" name="mitra_id" required>
                            {{-- Populate options based on your Mitra data --}}
                            @foreach($mitras as $mitra)
                                <option value="{{ $mitra->id }}">{{ $mitra->nama_mitra }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="makanan_id">Makanan:</label>
                        <select class="form-control" id="makanan_id" name="makanan_id" required>
                            {{-- Populate options based on your Makanan data --}}
                            @foreach($makanans as $makanan)
                                <option value="{{ $makanan->id }}">{{ $makanan->nama_makanan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="isi_ulasan">Isi Ulasan:</label>
                        <textarea class="form-control" id="isi_ulasan" name="isi_ulasan" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
