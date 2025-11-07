<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel Upload Gambar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

  <!-- 🔹 Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">UTSTRYING</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="/upload">Upload</a></li>
          <li class="nav-item"><a class="nav-link" href="/products">Produk</a></li>
          
          <li class="nav-item"><a class="nav-link" href="/products">Produk 2</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- 🔹 Konten Utama -->
  <div class="container mt-4 mb-5">
    {{-- <h1 class="text-center mb-4">Upload & Tampilkan Gambar</h1> --}}

    @if(session('success'))
      <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if(isset($images) && count($images) > 0)
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <!-- 🔹 Indicator dots -->
  <div class="carousel-indicators">
    @foreach($images as $index => $image)
      <button type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="{{ $index }}"
              class="{{ $index === 0 ? 'active' : '' }}"
              aria-current="{{ $index === 0 ? 'true' : 'false' }}"
              aria-label="Slide {{ $index + 1 }}"></button>
    @endforeach
  </div>

  <!-- 🔹 Carousel images -->
  <div class="carousel-inner">
    @foreach($images as $index => $image)
      <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
        <img src="{{ asset($image) }}" class="d-block w-100 rounded" alt="Slide {{ $index + 1 }}">
      </div>
    @endforeach
  </div>

  <!-- 🔹 Prev/Next buttons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    @else
      <p class="text-center text-muted mt-5">Belum ada gambar diupload.</p>
    @endif
  </div>

  <!-- 🔹 Footer -->
  <footer class="mt-auto bg-dark text-white py-3">
    <div class="container text-center">
      <p class="mb-1">© {{ date('Y') }} <strong>UTSTRYING</strong>. All Rights Reserved.</p>
      <small class="text-secondary">
        Dibuat dengan ❤️ menggunakan Laravel & Bootstrap.
      </small>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
