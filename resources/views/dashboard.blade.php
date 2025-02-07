@extends('layouts.app')

@section('content')

<!-- Hero Section dengan Background Slideshow -->
<div id="hero-section" class="hero-section d-flex align-items-center justify-content-center text-white text-center py-5" 
    style="height: 400px; background-size: cover; background-position: center;">
    <div>
        <h1 class="fw-bold display-4">Selamat Datang di Sajian</h1>
        <p class="fs-5">Temukan berbagai resep dan artikel kuliner terbaik untuk inspirasi masakan Anda!</p>
    </div>
</div>

<!-- Main Content -->
<div class="container mt-5">
    <!-- Tentang Sajian -->
    <div class="row align-items-center mb-4">
        <div class="col-md-6">
            <h2 class="fw-bold text-primary">Apa Itu Sajian?</h2>
            <p class="fs-5 text-muted">
                Sajian adalah platform kuliner yang menyediakan berbagai resep lezat, artikel inspiratif, 
                dan tips memasak dari para ahli. Kami berkomitmen untuk menghadirkan konten berkualitas tinggi 
                agar pengalaman memasak Anda semakin mudah dan menyenangkan.
            </p>
        </div>
        <div class="col-md-6 text-center">
            <img src="{{ asset('images/kitchen-chef.jpg') }}" class="img-fluid rounded shadow-lg" alt="Tentang Sajian">
        </div>
    </div>

    <!-- Artikel Terbaru dengan Carousel -->
    <h2 class="fw-bold text-primary">Artikel Terbaru</h2>
    <div id="carouselArtikel" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($artikels->chunk(3) as $key => $chunk)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <div class="d-flex justify-content-center">
                    @foreach($chunk as $artikel)
                    <div class="card shadow-sm border-0 mx-2" style="width: 18rem; height: 18rem;">
                        <img src="{{ asset('storage/' . $artikel->gambar) }}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="{{ $artikel->judul }}">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $artikel->judul }}</h5>
                            <a href="{{ route('artikel.show', $artikel->id) }}" class="btn btn-primary w-100">Baca Selengkapnya</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselArtikel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselArtikel" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>
        </button>
    </div>

    <!-- Resep Terbaru dengan Carousel -->
    <h2 class="fw-bold text-success">Resep Terbaru</h2>
    <div id="carouselResep" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($reseps->chunk(3) as $key => $chunk)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <div class="d-flex justify-content-center">
                    @foreach($chunk as $resep)
                    <div class="card shadow-sm border-0 mx-2" style="width: 18rem; height: 18rem;">
                        <img src="{{ asset('storage/' . $resep->gambar) }}" class="card-img-top" style="height: 150px; object-fit: cover;" alt="{{ $resep->judul }}">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $resep->judul }}</h5>
                            <a href="{{ route('resep.show', $resep->id) }}" class="btn btn-success w-100">Lihat Resep</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselResep" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-dark rounded-circle p-3"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselResep" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-dark rounded-circle p-3"></span>
        </button>
    </div>
</div>

<!-- JavaScript untuk Slideshow Hero Section -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let images = [
            "{{ asset('images/hero1.jpg') }}",
            "{{ asset('images/hero2.jpg') }}",
            "{{ asset('images/hero3.jpg') }}",
            "{{ asset('images/hero4.jpg') }}"
        ];
        
        let index = 0;
        let heroSection = document.getElementById("hero-section");

        function changeBackground() {
            heroSection.style.backgroundImage = `url(${images[index]})`;
            index = (index + 1) % images.length;
        }

        // Set background pertama
        changeBackground();

        // Ganti gambar setiap 5 detik
        setInterval(changeBackground, 5000);
    });
</script>

@endsection
