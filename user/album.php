<?php 
session_start();
include '../config/koneksi.php';
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
    <style>
    /* White Theme Colors */
    .navbar, .card-header, .modal-header, footer {
        background-color: #ffffff; /* Putih */
        color: #000000; /* Hitam */
    }
    .navbar .navbar-brand, footer p, .nav-link {
        color: #000000; /* Hitam untuk semua link navigasi */
    }
    .btn-outline-danger {
        border-color: #000000; /* Outline tombol hitam */
        color: #000000; /* Teks tombol hitam */
    }
    .btn-outline-danger:hover {
        background-color: #f0f0f0; /* Abu-abu muda saat hover */
        color: #000000; /* Teks tetap hitam */
    }
    .btn-primary {
        background-color: #ffffff; /* Putih */
        color: #000000; /* Teks hitam */
        border-color: #000000; /* Outline tombol hitam */
    }
    .btn-primary:hover {
        background-color: #e0e0e0; /* Abu-abu muda saat hover */
        color: #000000;
    }
    .btn-danger {
        background-color: #ff4444; /* Merah terang untuk tombol hapus */
        border-color: #ff4444; /* Border merah */
        color: #ffffff; /* Teks putih untuk kontras */
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
      <a href="../config/aksi_logout.php" class="btn btn-outline-light m-1">LOGOUT</a>
    </div>
  </div>
</nav>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-4">
        <div class="card">
            <div class="card-header">Tambah Album</div>
            <div class="card-body">
                <form action="../config/aksi_album.php" method="POST">
                    <label class="form-label">Nama Album</label>
                    <input type="text" name="namaalbum" class="form-control" required>
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" required></textarea>
                    <button type="submit" class="btn btn-primary mt-2" name="tambah">Tambah Data</button>
                </form>
            </div>
        </div>
        </div>

        <div class="col-md-8">
        <div class="card">
            <div class="card-header">Data Album</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Album</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        $userid = $_SESSION['userid'];
                        $sql = mysqli_query($koneksi,"SELECT * FROM album WHERE userid=$userid");
                        while($data = mysqli_fetch_array($sql)) {
                        ?>
                        <tr>
                            <td> <?php echo $no++ ?></td>
                            <td> <?php echo $data['namaalbum'] ?></td>
                            <td> <?php echo $data['deskripsi'] ?></td>
                            <td> <?php echo $data['tanggalbuat'] ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo$data['albumid'] ?>">
                                    Edit
                                </button>

                                <div class="modal fade" id="edit<?php echo$data['albumid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="../config/aksi_album.php" method="POST">
                                          <input type="hidden" name="albumid" value="<?php echo $data['albumid'] ?>">
                                          <label class="form-label">Nama Album</label>
                                          <input type="text" name="namaalbum" value="<?php echo $data['namaalbum'] ?>" class="form-control" required>
                                          <label class="form-label">Deskripsi</label>
                                          <textarea class="form-control" name="deskripsi" required><?php echo $data['deskripsi'] ?></textarea>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>       

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo$data['albumid'] ?>">
                                    Hapus
                                </button>

                                <div class="modal fade" id="hapus<?php echo$data['albumid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="../config/aksi_album.php" method="POST">
                                          <input type="hidden" name="albumid" value="<?php echo $data['albumid'] ?>">
                                          Apakah anda yakin akan menghapus data <strong><?php echo $data['namaalbum']?></strong>?
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>       
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- <footer class="d-flex justify-content-center border-top mt-3">
    <p>&copy; UKK RPL 2024 | arief</p>
</footer> -->

    
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
