<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Data Ekstrakurikuler</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f3ede5;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .navbar {
      background-color: #1A237E;
      transition: all 0.3s ease;
    }
    .navbar .navbar-brand,
    .navbar .nav-link {
      color: #fff !important;
      font-weight: 500;
    }
    .navbar .nav-link:hover {
      color: #64b5f6 !important;
      transform: translateY(-2px);
    }
    .navbar-toggler {
      border: none;
      transition: transform 0.3s ease;
    }
    .navbar-toggler:hover {
      transform: rotate(90deg);
    }
    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 1)' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }
    .hero-section {
      background: linear-gradient(rgba(26, 35, 126, 0.7), rgba(26, 35, 126, 0.7)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
      background-size: cover;
      background-position: center;
      color: #fff;
      padding: 100px 0;
      text-align: center;
      animation: fadeIn 2s ease-in-out;
    }
    .hero-section h1 {
      font-size: 3rem;
      font-weight: bold;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }
    .hero-section p {
      font-size: 1.2rem;
      max-width: 600px;
      margin: 0 auto;
    }
    .guide-section {
      padding: 3rem 0;
    }
    .guide-card {
      background-color: #fffdf9;
      border-radius: 10px;
      padding: 2rem;
      margin-bottom: 1.5rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .guide-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }
    .guide-card h3 {
      color: #1A237E;
      font-weight: 600;
      margin-bottom: 1rem;
    }
    .guide-card ul {
      padding-left: 20px;
      list-style-type: none;
    }
    .guide-card ul li {
      margin-bottom: 0.5rem;
      position: relative;
      padding-left: 30px;
    }
    .guide-card ul li::before {
      content: '\f058';
      font-family: 'Font Awesome 6 Free';
      font-weight: 900;
      color: #1A237E;
      position: absolute;
      left: 0;
      top: 2px;
    }
    .btn-primary {
      background-color: #1A237E;
      border-color: #1A237E;
      padding: 10px 20px;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    .btn-primary:hover {
      background-color: #12175c;
      border-color: #12175c;
      transform: scale(1.05);
    }
    .search-form {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 10px;
      margin: 2rem auto;
      max-width: 600px;
    }
    .search-form input[type="text"] {
      min-width: 250px;
      max-width: 400px;
      flex-grow: 1;
      border-radius: 25px;
      padding: 10px 20px;
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    @media (max-width: 768px) {
      .hero-section h1 {
        font-size: 2rem;
      }
      .hero-section p {
        font-size: 1rem;
      }
      .navbar-brand {
        font-size: 1.2rem;
      }
      .search-form input[type="text"] {
        min-width: 200px;
      }
      .guide-card {
        padding: 1.5rem;
      }
    }
    @media (max-width: 576px) {
      .hero-section {
        padding: 60px 0;
      }
      .guide-section {
        padding: 1.5rem 0;
      }
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#"><i class="fas fa-book-open me-2"></i> Ekstrakurikuler SMK</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="eskul.php">Ekstrakurikuler</a></li>
        <li class="nav-item"><a class="nav-link" href="registrasi.php">Daftar Sekarang</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <h1>Selamat Datang di Ekstrakurikuler SMK</h1>
    <p> Temukan dan bergabung dengan berbagai kegiatan ekstrakurikuler untuk mengembangkan bakat dan minatmu! </p>
    <a href="registrasi.php" class="btn btn-primary mt-3">Daftar Sekarang</a>
  </div>
</section>

<!-- Guide Section -->
<section class="guide-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="guide-card">
          <h3>Cara Menggunakan Website</h3>
          <ul>
            <li>Beranda: Informasi umum tentang ekstrakurikuler SMK.</li>
            <li>Ekstrakurikuler: Jelajahi daftar lengkap kegiatan yang tersedia.</li>
            <li>Daftar Sekarang: Isi formulir untuk bergabung dengan ekstrakurikuler pilihan.</li>
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <div class="guide-card">
          <h3>Peraturan Pendaftaran</h3>
          <ul>
            <li>Siswa tidak dapat mendaftar ekstrakurikuler yang sama</li>
            <li>Siswa tidak dapat mendaftar ekstrakurikuler yang memiliki waktu pembelajaran yang bersamaan.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>