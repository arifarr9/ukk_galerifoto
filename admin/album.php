<?php  
// Memulai sesi pengguna
session_start();
require_once ('../config/koneksi.php');

// Cek apakah pengguna sudah login
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda Belum Login');
    location.href='../index.php';
    </script>";
    exit(); // Hentikan eksekusi jika pengguna belum login
}

// Cek apakah pengguna memiliki peran admin
$role = $_SESSION['role'];
if ($role != 'admin') {
    echo "<script>
    alert('Anda tidak memiliki izin untuk mengakses halaman ini.');
    location.href='../index.php';
    </script>";
    exit(); // Hentikan eksekusi jika pengguna tidak memiliki peran admin
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <!-- Memuat file CSS untuk bootstrap -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <style>
        /* Styling untuk navbar, tombol, dan elemen lainnya */
        .navbar, .card-header, .modal-header, footer {
            background-color: #ff5722; 
            color: white;
        }
        .navbar .navbar-brand, footer p, .nav-link {
            color: white;
        }
        .btn-outline-danger {
            border-color: #ff5722; 
            color: #ff5722; 
        }
        .btn-outline-danger:hover {
            background-color: #e64a19; 
            color: white;
        }
        .btn-primary {
            background-color: #ff5722; 
            border-color: #ff5722; 
        }
        .btn-danger {
            background-color: #d32f2f; 
            border-color: #d32f2f; 
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
        <!-- Link navigasi ke halaman utama, album, dan foto -->
        <a href="home.php" class="nav-link">Home</a>
        <a href="album.php" class="nav-link">Album</a>
        <a href="foto.php" class="nav-link">Foto</a>
      </div>
      <!-- Tombol logout -->
      <a href="../config/aksi_logout.php" class="btn btn-outline-dark m-1">LOGOUT</a>
    </div>
  </div>
</nav>

<div class="container mt-3">
    <div class="row">
        <!-- Form tambah album -->
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

        <!-- Tabel data album -->
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
                            <th>Akun</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        $userid = $_SESSION['userid'];
                        // Mengambil data album beserta informasi pengguna dari database
                        $sql = mysqli_query($koneksi,"SELECT * FROM album INNER JOIN user ON album.userid=user.userid");
                        while($data = mysqli_fetch_array($sql)) {
                        ?>
                        <tr>
                            <td> <?php echo $no++ ?></td>
                            <td> <?php echo $data['namaalbum'] ?></td>
                            <td> <?php echo $data['deskripsi'] ?></td>
                            <td> <?php echo $data['tanggalbuat'] ?></td>
                            <td> <?php echo $data['namalengkap'] ?></td>
                            <td>
                                <!-- Tombol edit untuk album -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo$data['albumid'] ?>">
                                    Edit
                                </button>

                                <!-- Modal form edit data album -->
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

                                <!-- Tombol hapus untuk album -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo$data['albumid'] ?>">
                                    Hapus
                                </button>

                                <!-- Modal konfirmasi hapus data album -->
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

<!-- Footer dengan informasi hak cipta -->
<footer class="d-flex justify-content-center border-top mt-3">
    <p>&copy; UKK RPL 2024 | arief</p>
</footer>

<!-- Memuat file JavaScript untuk bootstrap -->
<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
