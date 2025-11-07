<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $product['name'] }} | Detail Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="/">UTSTRYING</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="/upload">Upload</a></li>
          <li class="nav-item"><a class="nav-link" href="/products">Produk</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Detail Produk -->
  <div class="container my-5">
    <div class="row">
      <div class="col-md-6">
        <img src="{{ $product['image'] }}" class="img-fluid rounded shadow-sm" alt="{{ $product['name'] }}">
      </div>
      <div class="col-md-6">
        <h2 class="fw-bold">{{ $product['name'] }}</h2>
        <p class="text-muted">{{ $product['description'] }}</p>
        <h4 class="text-primary mb-4">{{ $product['price'] }}</h4>
        <button class="btn btn-success btn-lg">Beli Sekarang</button>
        <a href="/products" class="btn btn-outline-secondary btn-lg ms-2">Kembali</a>
      </div>
    </div>
  </div>

  <footer class="bg-dark text-white text-center py-3 mt-5">
    <p class="mb-0">© {{ date('Y') }} UTSTRYING. All rights reserved.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
