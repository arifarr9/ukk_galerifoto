<?php 
session_start();
require_once ('../config/koneksi.php');
$userid = $_SESSION['userid'];
// Cek apakah user sudah login
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda Belum Login');
    location.href='../index.php';
    </script>";
    exit();
}

// Cek apakah user memiliki peran admin
$role = $_SESSION['role'];
if ($role != 'admin') {
    echo "<script>
    alert('Anda tidak memiliki izin untuk mengakses halaman ini.');
    location.href='../index.php';
    </script>";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <style>
        body {
            background-color: #fff3e0;
        }
        .navbar, .card-header, .modal-header, footer {
            background-color: #ff5722; 
            color: white;
        }
        .navbar .navbar-brand, footer p, .nav-link {
            color: white;
        }
        .btn-outline-light {
            color: #ff5722; 
            border-color: #ff5722;
        }
        .btn-outline-light:hover {
            background-color: #ff5722;
            color: white;
        }
        .btn-primary, .btn-outline-primary {
            background-color: #ff5722; 
            border-color: #ff5722;
            color: white;
        }
        .btn-danger {
            background-color: #d32f2f; 
            border-color: #d32f2f;
        }
        .card-footer a {
            color: #ff5722;
        }
        .card-footer a:hover {
            color: #e64a19; 
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
      <div class="navbar-nav me-auto">
        <a href="home.php" class="nav-link">Home</a>
        <a href="album.php" class="nav-link">Album</a>
        <a href="foto.php" class="nav-link">Foto</a>
      </div>
      <a href="../config/aksi_logout.php" class="btn btn-outline-dark m-1">LOGOUT</a>
    </div>
  </div>
</nav>

<div class="container mt-2">
  <div class="row">
    <?php 
    $query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.userid=user.userid INNER JOIN album ON foto.albumid=album.albumid");
    while ($data = mysqli_fetch_array($query)) {
    ?>
    <div class="col-md-3 mt-2">
        <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>">
          <div class="card mb-2 bg-dark text-light">
          <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>" style="height: 12rem; object-fit: cover;">
            <div class="card-footer text-center">
                <?php 
                $fotoid = $data['fotoid'];
                $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                if (mysqli_num_rows($ceksuka) == 1) { ?>
                  <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="batalsuka"><i class="fa fa-heart m-1"></i></a>
                <?php } else { ?>
                  <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid'] ?>" type="submit" name="suka"><i class="fa-regular fa-heart m-1"></i></a>
                <?php }
                $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                echo mysqli_num_rows($like) . ' Suka';
                ?>
                <a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid'] ?>"><i class="fa-regular fa-comment"></i></a>
                <?php
                $jmlkomen = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE fotoid='$fotoid'");
                echo mysqli_num_rows($jmlkomen) . ' Komentar';
                ?>
            </div>
          </div>
        </a>

        <div class="modal fade" id="komentar<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-8">
                    <img src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
                  </div>
                  <div class="col-md-4">
                    <div class="m-2">
                      <div class="overflow-auto">
                        <div class="sticky-top">
                          <strong><?php echo $data['judulfoto'] ?></strong><br>
                          <span class="badge bg-secondary"><?php echo $data['namalengkap'] ?></span>
                          <span class="badge bg-secondary"><?php echo $data['tanggalunggah'] ?></span>
                          <span class="badge bg-primary"><?php echo $data['namaalbum'] ?></span>
                        </div>
                        <hr>
                        <p align="left">
                          <?php echo $data['deskripsifoto'] ?>
                        </p>
                        <hr>
                        <?php
                        $komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid=user.userid WHERE komentarfoto.fotoid='$fotoid'");
                        while($row = mysqli_fetch_array($komentar)) {
                        ?>
                          <p align="left">
                            <strong><?php echo $row['namalengkap'] ?></strong>
                            <?php echo $row['isikomentar'] ?>

                            <?php if ($role == 'admin' || $row['userid'] == $userid ) { ?>
                          <a href="../config/hapus_komentar.php?komentarid=<?php echo $row['komentarid'] ?>" style="float: right; color: red; text-decoration: none;">
                            <i class="fa fa-trash"></i>
                           </a>
                          <?php } ?>

                          </p>
                        <?php } ?>
                        <hr>
                        <div class="sticky-bottom">
                          <form action="../config/proses_komentar.php" method="POST">
                            <div class="input-group">
                              <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                              <input type="text" name="isikomentar" class="form-control bg-dark text-light" placeholder="Tambah Komentar">
                              <div class="input-group-prepend">
                                <button type="submit" name="kirimkomentar" class="btn btn-outline-primary">KIRIM</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
    <?php } ?>
  </div>
</div>

<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
