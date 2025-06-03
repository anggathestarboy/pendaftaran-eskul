<?php
require_once "admin/database.php";

$keyword = isset($_GET['keyword']) ? $db->real_escape_string($_GET['keyword']) : "";

if (!empty($keyword)) {
    $sql = "SELECT * FROM eskul WHERE nama_eskul LIKE '%$keyword%' OR hari LIKE '%$keyword%' OR jam LIKE '%$keyword%'";
} else {
    $sql = "SELECT * FROM eskul";
}

$tampil = $db->query($sql);
?>
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
    .header-title {
      margin: 2rem 0;
      text-align: center;
      font-weight: bold;
      color: #1A237E;
      font-size: 2rem;
      animation: fadeIn 1s ease-in-out;
    }
    .search-form {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 10px;
      margin: 2rem auto;
      max-width: 600px;
      background-color: #fffdf9;
      padding: 15px;
      border-radius: 25px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    .search-form input[type="text"] {
      min-width: 250px;
      max-width: 400px;
      flex-grow: 1;
      border-radius: 25px;
      padding: 10px 20px;
      border: 1px solid #1A237E;
    }
    .search-form .btn-primary {
      border-radius: 25px;
      padding: 10px 20px;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    .search-form .btn-primary:hover {
      transform: scale(1.05);
    }
    .table-section {
      padding: 2rem 0;
    }
    .table {
      background-color: #fffdf9;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }
    .table thead {
      background-color: #1A237E;
      color: #fff;
    }
    .table th, .table td {
      padding: 15px;
      vertical-align: middle;
      text-align: center;
      border: none;
    }
    .table tbody tr {
      transition: background-color 0.3s ease;
    }
    .table tbody tr:hover {
      background-color: #e3f2fd;
    }
    .table .btn-primary {
      padding: 8px 16px;
      font-size: 0.9rem;
      transition: all 0.3s ease;
    }
    .table .btn-primary:hover {
      transform: scale(1.05);
    }
    .btn-primary {
      background-color: #1A237E;
      border-color: #1A237E;
      font-weight: 500;
    }
    .btn-primary:hover {
      background-color: #12175c;
      border-color: #12175c;
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    @media (max-width: 768px) {
      .header-title {
        font-size: 1.8rem;
      }
      .search-form input[type="text"] {
        min-width: 200px;
      }
      .table th, .table td {
        padding: 10px;
        font-size: 0.9rem;
      }
    }
    @media (max-width: 576px) {
      .table-section {
        padding: 1.5rem 0;
      }
      .search-form {
        padding: 10px;
      }
      .table th, .table td {
        padding: 8px;
        font-size: 0.85rem;
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

<!-- Table Section -->
<section class="table-section">
  <div class="container">
    <h2 class="header-title">Ekstrakurikuler</h2>

    <!-- Form Pencarian -->
    <form action="" method="get" class="search-form">
      <input type="text" name="keyword" class="form-control" placeholder="Cari nama, hari, atau jam" value="<?= htmlspecialchars($keyword) ?>">
      <button type="submit" class="btn btn-primary"><i class="fas fa-search me-2"></i>Cari</button>
    </form>

    <!-- Tabel Data -->
    <div class="table-responsive">
      <table class="table table-bordered align-middle text-center">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Ekstrakurikuler</th>
            <th>Hari</th>
            <th>Jam</th>
           
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; while($row = $tampil->fetch_assoc()): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><i class="fas fa-star me-2"></i><?= $row['nama_eskul'] ?></td>
            <td><i class="fas fa-calendar-day me-2"></i><?= $row['hari'] ?></td>
            <td><i class="fas fa-clock me-2"></i><?= $row['jam'] ?></td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>