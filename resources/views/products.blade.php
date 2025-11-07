<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk Kami | UTSTRYING</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="/">UTSTRYING</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="/upload">Upload</a></li>
           <li class="nav-item"><a class="nav-link" href="/products">Produk</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Produk Section -->
  <div class="container my-5">
    <h2 class="text-center mb-4 fw-bold">Daftar Produk Tersedia</h2>
    <div class="row g-4">
      @foreach ($products as $product)
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
            <div class="card-body">
              <h5 class="card-title">{{ $product['name'] }}</h5>
              <p class="card-text text-muted small">{{ $product['description'] }}</p>
              <div class="d-flex justify-content-between align-items-center">
                <span class="fw-bold text-primary">{{ $product['price'] }}</span>
                <a href="{{ route('products.show', $product['id']) }}" class="btn btn-sm btn-outline-success">Lihat Detail</a>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-5">
    <p class="mb-0">© {{ date('Y') }} UTSTRYING. All rights reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
