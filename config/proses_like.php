<?php
session_start();
include 'koneksi.php';
$role= $_SESSION['role'];
$fotoid = $_GET['fotoid'];
$userid = $_SESSION['userid'];


$ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");

if (mysqli_num_rows($ceksuka) == 1) {
    while($row = mysqli_fetch_array($ceksuka)){
        $likeid = $row['likeid'];
        $query = mysqli_query($koneksi, "DELETE FROM likefoto WHERE likeid='$likeid'");
        if ($role == 'admin') {
            echo "<script>
            alert('Data Berhasil Disimpan!');
            location.href='../admin/index.php';
            </script>";
        
        }else {
            echo "<script>
            alert('Data Berhasil Disimpan!');
            location.href='../user/index.php';
            </script>";
        }
    }
}else{
    $tanggallike = date('Y-m-d');
$query = mysqli_query($koneksi, "INSERT INTO likefoto VALUES('','$fotoid','$userid','$tanggallike')");
if ($role == 'admin') {
    echo "<script>
    alert('Data Berhasil Disimpan!');
    location.href='../admin/index.php';
    </script>";

}else {
    echo "<script>
    alert('Data Berhasil Disimpan!');
    location.href='../user/index.php';
    </script>";
}
}
?>