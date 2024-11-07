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
            background: linear-gradient(120deg, lightblue, lightblue);
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

<div class="container mt-3">
    <div class="row justify-content-start">
        <div class="col-md-12">
            <center><p class="fs-1 text-black">WELCOME TO MY GALERI FOTO</p></center>
            <center><p class="fs-5 text-black">Temukan Keindahan Alam Dalam Kesederhanaan Melalui Koleksi Foto Yang Saya Hadirkan. Dengan berbagai tema, pemandangan dan perspektif, semoga Anda bisa menemukan sudut pandang baru dan menikmati keindahan alam yang terpancar dari setiap foto.</p></center>
        </div>
    </div>
</div>

<div class="row justify-content-start mt-3">
    <div class="col-md-3">
        <div class="card">
        <img src="assets/img/1361544539.papandayan.jpg" class="card-img-top w-100" style="height: 10rem;">
            <div class="card-footer text-center">
                <a href="#" style="color: black;"><i class="fa-regular fa-heart m-1"></i>G.PAPANDAYAN</a>
                <a href="#"><i class="fa-regular fa-comment"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img src="assets/img/1250882891.merapi.jpg" class="card-img-top w-100" style="height: 10rem;">
            <div class="card-footer text-center">
                <a href="#" style="color: black;"><i class="fa-regular fa-heart m-1"></i>G.MERAPI</a>
                <a href="#"><i class="fa-regular fa-comment"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img src="assets/img/1276355567.sindoro.jpg" class="card-img-top w-100" style="height: 10rem;">
            <div class="card-footer text-center">
                <a href="#" style="color: black;"><i class="fa-regular fa-heart m-1"></i>G.SINDORO</a>
                <a href="#"><i class="fa-regular fa-comment"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img src="assets/img/494936806.bromo.jpg" class="card-img-top w-100" style="height: 10rem;">
            <div class="card-footer text-center">
                <a href="#" style="color: black;"><i class="fa-regular fa-heart m-1"></i>G.BROMO</a>
                <a href="#"><i class="fa-regular fa-comment"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img src="assets/img/rinjani.jpg" class="card-img-top w-100" style="height: 10rem;">
            <div class="card-footer text-center">
                <a href="#" style="color: black;"><i class="fa-regular fa-heart m-1"></i>G.RINJANI</a>
                <a href="#"><i class="fa-regular fa-comment"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img src="assets/img/merbabu.jpg" class="card-img-top w-100" style="height: 10rem;">
            <div class="card-footer text-center">
                <a href="#" style="color: black;"><i class="fa-regular fa-heart m-1"></i>G.MERBABU</a>
                <a href="#"><i class="fa-regular fa-comment"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img src="assets/img/salak.jpg" class="card-img-top w-100" style="height: 10rem;">
            <div class="card-footer text-center">
                <a href="#" style="color: black;"><i class="fa-regular fa-heart m-1"></i>G.SALAK</a>
                <a href="#"><i class="fa-regular fa-comment"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <img src="assets/img/prau.jpg" class="card-img-top w-100" style="height: 10rem;">
            <div class="card-footer text-center">
                <a href="#" style="color: black;"><i class="fa-regular fa-heart m-1"></i>G.PRAU</a>
                <a href="#"><i class="fa-regular fa-comment"></i></a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>
