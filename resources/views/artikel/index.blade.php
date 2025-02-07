@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Artikel</h1>
    <a href="{{ route('artikel.create') }}" class="btn btn-primary">Tambah Artikel</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artikels as $artikel)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ asset('storage/' . $artikel->gambar) }}" width="50"></td>
                <td>{{ $artikel->judul }}</td>
                <td>{{ Str::limit($artikel->deskripsi, 50) }}</td>
                <td>
                    <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
