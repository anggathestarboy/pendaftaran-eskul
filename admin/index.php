<?php
require_once "database.php";
session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
    }


$nama = $_SESSION['login'];
?>  

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard Ekstrakurikuler</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    :root {
      --main-color: #1A237E;
    }
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
    }
    .sidebar {
      position: fixed;
      width: 240px;
      height: 100vh;
      background-color: var(--main-color);
      color: white;
      padding-top: 30px;
    }
    .sidebar h3 {
      text-align: center;
      margin-bottom: 40px;
      font-weight: bold;
      font-size: 22px;
      letter-spacing: 1px;
    }
    .sidebar a {
      display: block;
      padding: 14px 24px;
      color: white;
      text-decoration: none;
      font-size: 16px;
    }
    .sidebar a:hover {
      background-color: #0f155e;
    }
    .main-content {
      margin-left: 240px;
      padding: 40px;
    }
    h2 {
      color: var(--main-color);
      font-weight: bold;
      margin-bottom: 30px;
    }
    .btn-add {
      background-color: var(--main-color);
      border: none;
      margin-bottom: 20px;
    }
    .btn-add:hover {
      background-color: #0f155e;
    }
    table {
      width: 100%;
    }
    thead {
      background-color: var(--main-color);
      color: white;
    }
    tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    tbody tr:hover {
      background-color: #d1d9ff;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <h3>Ekstrakurikuler</h3>
  <a href="index.php">🏠 Dashboard</a>
  <a href="pendaftaran.php">📄 Pendaftaran</a>
  <a href="eskul.php">🔖 Ekstrakurikuler</a>
  <a href="logout.php">🚪 Logout</a>
  
</div>

<div class="main-content">
  <h2>Halo, <?= htmlspecialchars($nama) ?> 👋</h2>

  <div class="alert alert-info" role="alert">
    Selamat datang di <strong>Website Admin Ekstrakurikuler!</strong> Berikut ini adalah panduan untuk memulai:
  </div>

  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
      <div class="card h-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">📄 Pendaftaran</h5>
          <p class="card-text">Disini anda dapat melihat data pendaftaran ekstrakulikuler yang diinputkan oleh para siswa, terdapat fitur search untuk mempermudah pekerjaan</p>
          <a href="pendaftaran.php" class="btn btn-outline-primary btn-sm">Lihat Pendaftaran</a>
        </div>
      </div>
    </div>

    <div class="col">
      <div class="card h-100 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">🔖 Data Ekstrakurikuler</h5>
          <p class="card-text">Memuat seluruh data ekstrakulikuler. anda dapat melihat, melakukan pencarian, menambahkan ,mengedit ,menghapus data Ekstrakulikuler</p>
          <a href="eskul.php" class="btn btn-outline-primary btn-sm">Kelola Ekstrakurikuler</a>
        </div>
      </div>
    </div>
  </div>

  <div class="mt-5">
    <div class="alert alert-success" role="alert">
      Tips: Gunakan menu di sebelah kiri untuk berpindah tampilan dengan mudah. Semangat bekerja! 💪
    </div>
  </div>
</div>

</body>
</html>
