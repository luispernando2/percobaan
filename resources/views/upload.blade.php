<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Gambar | UTSTRYING</title>
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
          <li class="nav-item"><a class="nav-link active" href="/upload">Upload</a></li>
           <li class="nav-item"><a class="nav-link" href="/products">Produk</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Container -->
  <div class="container mt-5">
    <div class="card mx-auto shadow" style="max-width: 500px;">
      <div class="card-header bg-primary text-white text-center">
        <h5 class="mb-0">Upload Gambar Baru</h5>
      </div>
      <div class="card-body">
        
        <!-- Pesan error -->
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- Form upload -->
        <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="image" class="form-label">Pilih Gambar</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*" required onchange="previewImage(event)">
          </div>

          <!-- Preview Gambar -->
          <div class="text-center mb-3">
            <img id="preview" src="#" alt="Preview Gambar" class="img-fluid rounded d-none border" style="max-height: 250px;">
          </div>

          <button type="submit" class="btn btn-success w-100">Upload Sekarang</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-dark text-white text-center py-3 mt-5">
    <p class="mb-0">© {{ date('Y') }} UTSTRYING. All rights reserved.</p>
  </footer>

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function previewImage(event) {
      const preview = document.getElementById('preview');
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = e => {
          preview.src = e.target.result;
          preview.classList.remove('d-none');
        };
        reader.readAsDataURL(file);
      }
    }
  </script>

</body>
</html>
