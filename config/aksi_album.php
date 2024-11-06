<?php 
session_start();
include 'koneksi.php';
$role= $_SESSION['role'];


if (isset($_POST['tambah'])) {
$namaalbum = $_POST['namaalbum'];
$deskripsi = $_POST['deskripsi'];
$tanggal = date('Y-m-d');
$userid = $_SESSION['userid'];

$sql = mysqli_query($koneksi, "INSERT INTO album VALUES('','$namaalbum','$deskripsi','$tanggal','$userid')");
if ($role == 'admin') {
    echo "<script>
    alert('Data Berhasil Disimpan!');
    location.href='../admin/album.php';
    </script>";

}else {
    echo "<script>
    alert('Data Berhasil Disimpan!');
    location.href='../user/album.php';
    </script>";
}
}

if (isset($_POST['edit'])) {
    $albumid = $_POST['albumid'];
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = date('Y-m-d');
    $userid = $_SESSION['userid'];
    
    $sql = mysqli_query($koneksi, "UPDATE album SET namaalbum='$namaalbum', deskripsi='$deskripsi', tanggalbuat='$tanggal' WHERE  albumid='$albumid'");
    if ($role == 'admin') {
        echo "<script>
        alert('Data Berhasil Disimpan!');
        location.href='../admin/album.php';
        </script>";
    
    }else {
        echo "<script>
        alert('Data Berhasil Disimpan!');
        location.href='../user/album.php';
        </script>";
    }
    }

    if (isset($_POST['hapus'])) {
     $albumid = $_POST['albumid'];

     $sql = mysqli_query($koneksi, "DELETE FROM album WHERE albumid='$albumid'");
     if ($role == 'admin') {
        echo "<script>
        alert('Data Berhasil Disimpan!');
        location.href='../admin/album.php';
        </script>";
    
    }else {
        echo "<script>
        alert('Data Berhasil Disimpan!');
        location.href='../user/album.php';
        </script>";
    }
    }

?>