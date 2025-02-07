@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header text-center bg-primary text-white">
            <h2 class="mb-0">{{ $artikel->judul }}</h2>
        </div>
        <div class="card-body">
            <!-- Gambar Artikel -->
            <div class="text-center mb-4">
                @if ($artikel->gambar)
                    <img src="{{ asset('storage/' . $artikel->gambar) }}" class="img-fluid rounded" style="max-height: 400px;" alt="{{ $artikel->judul }}">
                @else
                    <img src="{{ asset('images/no-image.png') }}" class="img-fluid rounded" style="max-height: 400px;" alt="No Image">
                @endif
            </div>

            <!-- Deskripsi Artikel -->
            <div class="mb-4">
                <h4 class="text-dark"><strong>Deskripsi:</strong></h4>
                <p class="fs-5">{{ $artikel->deskripsi }}</p>
            </div>

            <!-- Tombol Kembali ke Dashboard -->
            <div class="text-center">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan Font Awesome untuk ikon -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

@endsection
