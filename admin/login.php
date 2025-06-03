<?php
    require_once "database.php";
    session_start();



    if (isset($_SESSION['login'])) {
        header("Location: index.php");
    }

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admins where username='$username' and password='$password'";
        $validasi = $db->query($sql);
        if ($validasi -> num_rows > 0) {
            $data = $validasi->fetch_assoc();
            $_SESSION['login'] = $data['nama'];
            header("Location: index.php");
        }
        else {
           echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: 'Username atau password salah!',
            confirmButtonColor: '#1A237E'
        });
    });
</script>";
        }
    }


?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Admin</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet" />

  <style>
    body {
      color: #000;
      overflow-x: hidden;
      height: 100%;
      background-color: #B0BEC5;
      background-repeat: no-repeat;
    }
    .card0 {
      box-shadow: 0px 4px 8px 0px #757575;
      border-radius: 0px;
    }
    .card2 {
      margin: 0px 40px;
    }
    .image {
      width: 360px;
      height: 280px;
    }
    .border-line {
      border-right: 1px solid #EEEEEE;
    }
    .line {
      height: 1px;
      width: 45%;
      background-color: #E0E0E0;
      margin-top: 10px;
    }
    .text-sm {
      font-size: 14px !important;
    }
    ::placeholder {
      color: #BDBDBD;
      opacity: 1;
      font-weight: 300;
    }
    input, textarea {
      padding: 10px 12px 10px 12px;
      border: 1px solid lightgrey;
      border-radius: 2px;
      margin-bottom: 5px;
      margin-top: 2px;
      width: 100%;
      box-sizing: border-box;
      color: #2C3E50;
      font-size: 14px;
      letter-spacing: 1px;
    }
    input:focus, textarea:focus {
      box-shadow: none !important;
      border: 1px solid #304FFE;
      outline-width: 0;
    }
    button:focus {
      box-shadow: none !important;
      outline-width: 0;
    }
    a {
      color: inherit;
      cursor: pointer;
    }
    .btn-blue {
      background-color: #1A237E;
      width: 150px;
      color: #fff;
      border-radius: 2px;
    }
    .btn-blue:hover {
      background-color: #000;
      cursor: pointer;
    }
    .bg-blue {
      color: #fff;
      background-color: #1A237E;
    }
    @media screen and (max-width: 991px) {
      .image {
        width: 300px;
        height: 220px;
      }
      .border-line {
        border-right: none;
      }
      .card2 {
        border-top: 1px solid #EEEEEE !important;
        margin: 0px 15px;
      }
    }
  </style>
</head>
<body>
  <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
      <div class="row d-flex">
        <div class="col-lg-6">
          <div class="card1 pb-5">
            <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
              <img src="background.png" class="image" alt="Library Image" />
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card2 card border-0 px-4 py-5">
            <div class="row mb-4 px-3">
              <h3 class="mb-0 mr-4 mt-2 font-weight-bold">Login Admin</h3>
            </div>
            <div class="row px-3 mb-4">
              <div class="line"></div>
              <div class="line"></div>
            </div>
            <form action="" method="POST">
              <div class="row px-3">
                <label class="mb-1"><h6 class="mb-0 text-sm">Username</h6></label>
                <input class="mb-4" type="text" id="username" name="username" placeholder="Enter username" required />
              </div>
              <div class="row px-3">
                <label class="mb-1"><h6 class="mb-0 text-sm">Password</h6></label>
                <input type="password" id="password" name="password" placeholder="Enter password" required />
              </div><br>
              <div class="row mb-3 px-3">
                <button name='login' class="btn btn-blue text-center">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="bg-blue py-4">
        <div class="row px-3">
          <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; Pendaftaran Ekstrakulikuler 2025. All rights reserved.</small>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
