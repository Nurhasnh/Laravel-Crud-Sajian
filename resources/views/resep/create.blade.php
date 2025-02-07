@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Resep</h1>
    <form action="{{ route('resep.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Bahan</label>
            <textarea name="bahan" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Cara Membuat</label>
            <textarea name="cara_membuat" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
            @error('gambar')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
