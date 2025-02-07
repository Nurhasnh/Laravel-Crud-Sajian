@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Resep</h1>
    <form action="{{ route('resep.update', $resep->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $resep->judul }}" required>
        </div>
        <div class="mb-3">
            <label>Bahan</label>
            <textarea name="bahan" class="form-control" required>{{ $resep->bahan }}</textarea>
        </div>
        <div class="mb-3">
            <label>Cara Membuat</label>
            <textarea name="cara_membuat" class="form-control" required>{{ $resep->cara_membuat }}</textarea>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection
