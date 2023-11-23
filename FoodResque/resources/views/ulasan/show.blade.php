@extends('layouts.base_admin.base_dashboard')

@section('content')
    <div class="container">
        <h1>Detail Ulasan</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Mitra: {{ $ulasan->mitra_id }}</h5>
                <h5 class="card-title">Makanan: {{ $ulasan->makanan_id }}</h5>
                <p class="card-text">Isi Ulasan: {{ $ulasan->isi_ulasan }}</p>
                <p class="card-text">Dibuat pada: {{ $ulasan->created_at }}</p>
                <p class="card-text">Diperbarui pada: {{ $ulasan->updated_at }}</p>

                <a href="{{ route('ulasan.edit', $ulasan->id) }}" class="btn btn-primary">Edit</a>

                <form action="{{ route('ulasan.destroy', $ulasan->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus ulasan ini?')">Hapus</button>
                </form>

                <a href="{{ route('ulasan.index') }}" class="btn btn-secondary">Kembali ke Daftar Ulasan</a>
            </div>
        </div>
    </div>
@endsection
