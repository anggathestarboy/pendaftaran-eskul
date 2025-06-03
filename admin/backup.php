<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tambah Peminjaman</title>
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
  <h3>Ekstrakulikuler</h3>
  <a href="index.php">🏠 Dashboard</a>
  <a href="pendaftaran.php">📄 Pendaftaran</a>
  <a href="eskul.php">🔖 Ekstrakulikuler</a>
</div>

<div class="main-content">
  <h2>add object</h2>
  <form action="#" method="post" style="max-width: 500px;">
    <div class="mb-3">
      <label for="kode_p" class="form-label">NISN</label>
      <input type="text" id="kode_p" name="kode_p" class="form-control" required />
    </div>
    <div class="mb-3">
      <label for="ttd_petugas" class="form-label">Nama</label>
      <input type="text" id="ttd_petugas" name="ttd_petugas" class="form-control" required />
    </div>
    <div class="mb-3">
      <label for="ttd_petugas" class="form-label">Kelas</label>
      <input type="text" id="ttd_petugas" name="ttd_petugas" class="form-control" required />
    </div>
 

       <div class="mb-3">
      <label for="no_anggota" class="form-label">Ekstrakulikuler</label>
      <select name="no_anggota" id="no_anggota" class="form-select" required>
        <option value="A001">Andi</option>
        <option value="A002">Budi</option>
        <option value="A003">Citra</option>
      </select>
    </div>

    <button type="submit" class="btn-submit">Pinjam</button>
  </form>
</div>

</body>
</html>
          