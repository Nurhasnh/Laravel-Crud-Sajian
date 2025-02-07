@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Resep</h1>
    <a href="{{ route('resep.create') }}" class="btn btn-primary mb-3">Tambah Resep</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Bahan</th>
                <th>Cara Membuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reseps as $resep)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if($resep->gambar)
                        <img src="{{ asset('storage/' . $resep->gambar) }}" alt="Gambar {{ $resep->judul }}" class="img-thumbnail" width="80">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" alt="No Image" class="img-thumbnail" width="80">
                    @endif
                </td>
                <td>{{ $resep->judul }}</td>
                <td>{{ Str::limit($resep->bahan, 50) }}</td>
                <td>{{ Str::limit($resep->cara_membuat, 50) }}</td>
                <td>
                    <a href="{{ route('resep.edit', $resep->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('resep.destroy', $resep->id) }}" method="POST" style="display:inline;">
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
