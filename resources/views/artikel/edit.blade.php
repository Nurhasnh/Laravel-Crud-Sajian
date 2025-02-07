@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Artikel</h1>
    <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $artikel->judul }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required>{{ $artikel->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
            @if ($artikel->gambar)
                <img src="{{ asset('storage/' . $artikel->gambar) }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection
