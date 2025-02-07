<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Styles -->
    <style>
        body { font-family: 'Arial', sans-serif; }
        .navbar-brand img { height: 50px; }
        .hero-section {
            background: url("{{ asset('images/hero-bg.jpg') }}") center/cover no-repeat;
            color: white;
            text-align: center;
            padding: 80px 20px;
        }
        .hero-section h1 { font-size: 3rem; font-weight: bold; }
        .hero-section p { font-size: 1.2rem; }
        .card img { transition: transform 0.3s ease; height: 200px; object-fit: cover; }
        .card:hover img { transform: scale(1.05); }
        .footer { background: #222; color: white; text-align: center; padding: 10px; margin-top: 20px; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Sajian Logo"> 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        &copy; {{ date('Y') }} Sajian - Temukan Inspirasi Masakan Anda!
    </footer>

</body>
</html>
