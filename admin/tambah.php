<?php
    require_once "database.php";
    session_start();

    if (!isset($_SESSION['login'])) {
        header("Location: login.php");
    }

    if (isset($_POST['tambah'])) {
        $id = $_POST['id'];
        $eskul = $_POST['eskul'];
        $hari = $_POST['hari'];
        $jam = $_POST['jam'];

        $sql = "INSERT INTO eskul VALUES ('$id', '$eskul', '$hari', '$jam')";
        if ($db->query($sql)) {
            header("Location: eskul.php");
            exit;
        }
    }
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tambah Ekstrakulikuler</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    :root {
      --main-color: #1A237E;
    }
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .sidebar {
      position: fixed;
      width: 220px;
      height: 100vh;
      background-color: var(--main-color);
      color: white;
      padding-top: 30px;
    }
    .sidebar h3 {
      text-align: center;
      margin-bottom: 40px;
      font-weight: bold;
      font-size: 20px;
    }
    .sidebar a {
      display: block;
      padding: 12px 20px;
      color: white;
      text-decoration: none;
    }
    .sidebar a:hover {
      background-color: #0f155e;
    }
    .main-content {
      margin-left: 220px;
      padding: 40px;
    }
    h2 {
      color: var(--main-color);
      font-weight: bold;
      text-transform: uppercase;
      margin-bottom: 30px;
    }
    .btn-submit {
      background-color: var(--main-color);
      border: none;
      color: white;
      padding: 10px 20px;
      font-weight: bold;
      border-radius: 4px;
    }
    .btn-submit:hover {
      background-color: #0f155e;
      color: white;
    }
    label {
      font-weight: 600;
      color: var(--main-color);
    }
    .form-control,
    select {
      max-width: 400px;
      margin-bottom: 20px;
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
  <h2>Tambah Ekstrakulikuler</h2>
  <form action="" method="post" style="max-width: 500px;">
    <div class="mb-3">
      <label for="kode_p" class="form-label">ID Ekstrakulikuler</label>
      <input type="text" id="id" name="id" class="form-control" required />
    </div>
    <div class="mb-3">
      <label for="ttd_petugas" class="form-label">Nama Ekstrakulikuler</label>
      <input type="text" id="eskul" name="eskul" class="form-control" required />
    </div>
    <div class="mb-3">
      <label for="ttd_peminjam" class="form-label">Hari</label>
      <input type="text" id="hari" name="hari" class="form-control" required />
    </div>
    <div class="mb-3">
      <label for="tgl_peminjaman" class="form-label">Jam</label>
      <input type="time" id="jam" name="jam" class="form-control" required />
    <button name="tambah" class="btn-submit">Tambah</button>
  </form>
</div>

</body>
</html>
          