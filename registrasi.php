
<?php 
require_once "admin/database.php";

$success = false;
$error_message = '';

if (isset($_POST['kirim'])) {
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $eskul = $_POST['eskul'];

    // First validation: Check if the user is already registered for this extracurricular
    $sql = "SELECT * FROM pendaftaran WHERE nama_siswa='$nama' AND id_eskul='$eskul'";
    $validasi = $db->query($sql);

    if ($validasi->num_rows > 0) {
        $error_message = "Anda sudah mendaftar eskul ini";
    } else {
        // Second validation: Check for conflicting day and time
        $sql_eskul = "SELECT hari, jam FROM eskul WHERE id_eskul='$eskul'";
        $eskul_result = $db->query($sql_eskul);
        $eskul_data = $eskul_result->fetch_assoc();
        $selected_hari = $eskul_data['hari'];
        $selected_jam = $eskul_data['jam'];

        $sql_conflict = "SELECT p.* 
                         FROM pendaftaran p 
                         JOIN eskul e ON p.id_eskul = e.id_eskul 
                         WHERE p.nama_siswa='$nama' 
                         AND e.hari='$selected_hari' 
                         AND e.jam='$selected_jam'";
        $conflict_result = $db->query($sql_conflict);

        if ($conflict_result->num_rows > 0) {
            $error_message = "Anda sudah terdaftar di eskul lain pada hari dan jam yang sama";
        } else {
            // If no conflicts, proceed with the registration
            $sql = "INSERT INTO pendaftaran(nisn, nama_siswa, kelas, id_eskul) 
                    VALUES ('$nisn', '$nama', '$kelas', '$eskul')";

            if ($db->query($sql)) {
                $success = true;
            } else {
                $error_message = "Gagal menyimpan data: " . $db->error;
            }
        }
    }
}

// Fetch extracurricular options for the dropdown
$sql = "SELECT * FROM eskul";
$tampil = $db->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pendaftaran Ekstrakurikuler</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    .form-siswa {
      background: #fffdf9;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      max-width: 700px;
      margin: 2rem auto 3rem auto;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .form-siswa:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }
    .form-label {
      color: #1A237E;
      font-weight: 500;
      margin-bottom: 0.5rem;
    }
    .form-control, .form-select {
      border-radius: 8px;
      border: 1px solid #1A237E;
      padding: 10px;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    .form-control:focus, .form-select:focus {
      border-color: #64b5f6;
      box-shadow: 0 0 8px rgba(100, 181, 246, 0.5);
      outline: none;
    }
    .form-control::placeholder {
      color: #999;
    }
    .btn-primary {
      background-color: #1A237E;
      border-color: #1A237E;
      padding: 12px 30px;
      font-weight: 500;
      border-radius: 25px;
      transition: all 0.3s ease;
    }
    .btn-primary:hover {
      background-color: #12175c;
      border-color: #12175c;
      transform: scale(1.05);
    }
    .input-group-text {
      background-color: #1A237E;
      color: #fff;
      border: none;
      border-radius: 8px 0 0 8px;
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    @media (max-width: 768px) {
      .header-title {
        font-size: 1.8rem;
      }
      .form-siswa {
        padding: 1.5rem;
      }
      .btn-primary {
        padding: 10px 20px;
      }
    }
    @media (max-width: 576px) {
      .form-siswa {
        margin: 1.5rem;
        padding: 1rem;
      }
      .header-title {
        margin: 1.5rem 0;
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

<!-- Form Section -->
<section class="form-section">
  <div class="container">
    <h2 class="header-title">Pendaftaran Ekstrakurikuler</h2>

    <form action="" method="post" class="row g-3 form-siswa">
      <div class="col-md-6">
        <label for="nisn" class="form-label"><i class="fas fa-id-card me-2"></i>NISN</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-id-card"></i></span>
          <input type="number" id="nisn" name="nisn" class="form-control" placeholder="Masukkan NISN" required maxlength="16">
        </div>
      </div>

      <div class="col-md-6">
        <label for="nama" class="form-label"><i class="fas fa-user me-2"></i>Nama</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-user"></i></span>
          <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
        </div>
      </div>

      <div class="col-md-6">
        <label for="kelas" class="form-label"><i class="fas fa-school me-2"></i>Kelas</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-school"></i></span>
          <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Masukkan kelas" required>
        </div>
      </div>

      <div class="col-md-6">
        <label for="eskul" class="form-label"><i class="fas fa-star me-2"></i>Ekstrakurikuler</label>
        <div class="input-group">
          <span class="input-group-text"><i class="fas fa-star"></i></span>
          <select id="eskul" name="eskul" class="form-select" required>
            <option value="" disabled selected>Pilih Ekstrakurikuler</option>
            <?php while($row = $tampil->fetch_assoc()): ?>
              <option value="<?= $row['id_eskul'] ?>"><?= $row['nama_eskul'] ?> (Hari: <?= $row['hari'] ?>, Jam: <?= $row['jam'] ?>)</option>
            <?php endwhile; ?>
          </select>
        </div>
      </div>

      <div class="col-12 text-center mt-4">
        <button name="kirim" class="btn btn-primary"><i class="fas fa-save me-2"></i>Simpan</button>
      </div>
    </form>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php if ($success): ?>
<script>
  Swal.fire({
    icon: 'success',
    title: 'Berhasil!',
    text: 'Pendaftaran berhasil disimpan.',
    confirmButtonColor: '#1A237E',
    background: '#fffdf9',
    iconColor: '#1A237E',
    timer: 3000,
    timerProgressBar: true
  })
</script>
<?php elseif ($error_message): ?>
<script>
  Swal.fire({
    icon: 'error',
    title: 'Gagal!',
    text: '<?= $error_message ?>',
    confirmButtonColor: '#1A237E',
    background: '#fffdf9',
    iconColor: '#1A237E',
    timer: 3000,
    timerProgressBar: true
  })
</script>
<?php endif; ?>

</body>
</html>