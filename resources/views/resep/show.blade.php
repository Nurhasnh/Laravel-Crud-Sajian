@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-header text-center bg-success text-white">
            <h2 class="mb-0">{{ $resep->judul }}</h2>
        </div>
        <div class="card-body">
            <!-- Gambar Resep -->
            <div class="text-center mb-4">
                @if ($resep->gambar)
                    <img src="{{ asset('storage/' . $resep->gambar) }}" class="img-fluid rounded" style="max-height: 400px;" alt="{{ $resep->judul }}">
                @else
                    <img src="{{ asset('images/no-image.png') }}" class="img-fluid rounded" style="max-height: 400px;" alt="No Image">
                @endif
            </div>

            <!-- Bahan Resep -->
            <div class="mb-4">
                <h4 class="text-dark"><strong>Bahan:</strong></h4>
                <p class="fs-5">{{ $resep->bahan }}</p>
            </div>

            <!-- Cara Membuat Resep -->
            <div class="mb-4">
                <h4 class="text-dark"><strong>Cara Membuat:</strong></h4>
                <p class="fs-5">{{ $resep->cara_membuat }}</p>
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
