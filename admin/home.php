<?php 
session_start();
require_once ('../config/koneksi.php');
$userid = $_SESSION['userid'];
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda Belum Login');
    location.href='../index.php';
    </script>";
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
        /* Orange Theme */
        body {
            background-color: #fff3e0; /* Light orange background */
        }
        .navbar, .card-header, .modal-header, footer {
            background-color: #ff5722; /* Primary Orange */
            color: white;
        }
        .navbar .navbar-brand, footer p, .nav-link {
            color: white;
        }
        .btn-outline-light {
            color: #ff5722; /* Primary Orange */
            border-color: #ff5722;
        }
        .btn-outline-light:hover {
            background-color: #ff5722;
            color: white;
        }
        .btn-primary, .btn-outline-primary {
            background-color: #ff5722; /* Primary Orange */
            border-color: #ff5722;
            color: white;
        }
        .btn-danger {
            background-color: #d32f2f; /* Red for delete button */
            border-color: #d32f2f;
        }
        .card-footer a {
            color: #ff5722;
        }
        .card-footer a:hover {
            color: #e64a19; /* Darker Orange */
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
      <!-- <a href="../config/aksi_logout.php" class="btn btn-outline-light m-1">LOGOUT</a> -->
    </div>
  </div>
</nav>

<div class="container mt-3">
    <p>Album :</p>
    <?php
    $album = mysqli_query($koneksi, "SELECT * FROM album WHERE userid='$userid'");
    while($row = mysqli_fetch_array($album)){ ?>
    <a href="home.php?albumid=<?php echo $row['albumid'] ?>" class="btn btn-outline-primary m-1"><?php echo $row['namaalbum'] ?></a>
    <?php } ?>
   
    <div class="row">
    <?php 
    if(isset($_GET['albumid'])) {
        $albumid = $_GET['albumid'];
        $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid' AND albumid='$albumid'");
        while ($data = mysqli_fetch_array($query)) { ?>
        <div class="col-md-3 mt-2">
            <div class="card">
                <img style="height: 12rem;" src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
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
                    echo mysqli_num_rows($like). ' Suka';
                    ?>
                    <a href=""><i class="fa-regular fa-comment"></i></a>
                </div>
            </div>
        </div>

    <?php } } else { 
        $query = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
        while ($data = mysqli_fetch_array($query)) {
    ?>
        <div class="col-md-3 mt-2">
            <div class="card">
                <img style="height: 12rem;" src="../assets/img/<?php echo $data['lokasifile'] ?>" class="card-img-top" title="<?php echo $data['judulfoto'] ?>">
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
                    echo mysqli_num_rows($like). ' Suka';
                    ?>
                    <a href=""><i class="fa-regular fa-comment"></i></a>
                </div>
            </div>
        </div>
    <?php } } ?>
    </div>
</div>

<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
