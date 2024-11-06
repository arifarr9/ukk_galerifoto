<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <style>
        .card-img-top {
            height: 20rem; 
            object-fit: cover; 
        }

        /* Background biru langit */
        body {
            background: linear-gradient(120deg, #87CEEB, #00BFFF);
            background-attachment: fixed;
            background-size: cover;
            color: #333333; /* Warna teks lebih gelap agar kontras dengan latar belakang */
        }

        .navbar, .card-header, .modal-header, footer {
            background-color: #007ACC; /* Warna navbar lebih gelap untuk kontras */
            color: white;
        }

        .navbar .navbar-brand, footer p, .nav-link {
            color: white;
        }

        .btn-outline-light {
            color: #007ACC; 
            border-color: #007ACC;
        }

        .btn-outline-light:hover {
            background-color: #007ACC;
            color: white;
        }

        .btn-primary, .btn-outline-primary {
            background-color: #007ACC; 
            border-color: #007ACC;
            color: white;
        }

        .btn-danger {
            background-color: #d32f2f; 
            border-color: #d32f2f;
        }

        .card-footer a {
            color: #007ACC;
        }

        .card-footer a:hover {
            color: #005B99; 
        }

        .col-md-3 {
            margin-bottom: 20px; 
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="index.php">Website Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto"></div>
      <a href="register.php" class="btn btn-light m-1">DAFTAR</a>
      <a href="login.php" class="btn btn-light m-1">MASUK</a>
    </div>
  </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
       <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <h5 class="mb-4">Login Aplikasi</h5>
                    <img src="assets/img/selamat datang.png" alt="Logo" class="mb-3" style="width: 200px;"> 
                </div>
                <form action="config/aksi_login.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="d-grid mt-2">
                        <button class="btn btn-primary" type="submit" name="kirim">Masuk</button>
                    </div>
                </form>
                <hr>
                <p>Belum Punya Akun? <a href="register.php">Daftar Disini!</a></p>
            </div>
        </div>
       </div>
    </div>
</div>

<!-- <footer class="footer d-flex justify-content-center border-top mt-3 p-3">
    <p>&copy; UKK RPL 2024 | arief</p>
</footer> -->

<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>
