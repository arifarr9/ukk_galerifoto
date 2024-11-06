<?php 
session_start();
include 'koneksi.php';
$role= $_SESSION['role'];

$fotoid = $_POST['fotoid'];
$userid = $_SESSION['userid'];
$isikomentar = $_POST['isikomentar'];
$tanggalkomentar = date('Y-m-d');

$query = mysqli_query($koneksi, "INSERT INTO komentarfoto VALUES('','$fotoid','$userid','$isikomentar','$tanggalkomentar')");
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

?>