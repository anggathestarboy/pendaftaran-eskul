<?php
require_once "database.php";
session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
    }

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
  <title>Data Ekstrakulikuler</title>
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
  <h2>Data Ekstrakurikuler</h2>

  <a href="tambah.php" class="btn btn-primary btn-add">+ Tambah Ekstrakurikuler</a>


  <form action="" method="get" class="row g-2 mb-4">
    <div class="col-md-4">
      <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan nama, hari, atau jam" value="<?= htmlspecialchars($keyword) ?>">
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary btn-add">🔍 Cari</button>
    </div>
  </form>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>ID Ekstrakurikuler</th>
        <th>Nama Ekstrakurikuler</th>
        <th>Hari</th>
        <th>Jam</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>

    <?php $no = 1; while($row = $tampil->fetch_assoc()): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['id_eskul'] ?></td>
        <td><?= $row['nama_eskul'] ?></td>
        <td><?= $row['hari'] ?></td>
        <td><?= $row['jam'] ?></td>
        <td>
          <a href="edit.php?id_eskul=<?= $row['id_eskul'] ?>" class="btn btn-warning btn-sm">Edit</a>
          <a href="delete.php?id_eskul=<?= $row['id_eskul'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
        </td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
</div>

</body>
</html>
