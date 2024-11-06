<?php 
session_start();
require_once("koneksi.php");

// Cek status login
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda harus login terlebih dahulu.');
    location.href='../index.php';
    </script>";
    exit();
}

$role = $_SESSION['role'];
$userid = $_SESSION['userid']; // Ambil ID pengguna dari sesi
$komentarid = $_GET['komentarid'];

// Pastikan komentar ada dan ambil data pemilik komentar
$query = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE komentarid='$komentarid'");
$data = mysqli_fetch_assoc($query);

// Cek apakah komentar ditemukan dan apakah pengguna memiliki hak untuk menghapusnya
if ($data && ($role == 'admin' || $data['userid'] == $userid)) {
    $deleteQuery = "DELETE FROM komentarfoto WHERE komentarid='$komentarid'";
    $deleteResult = mysqli_query($koneksi, $deleteQuery);

    if ($deleteResult) {
        echo "<script>
        alert('Komentar berhasil dihapus.');";
        
        // Redirect berdasarkan peran
        if ($role == 'admin') {
            echo "window.location.href='../admin/index.php';";
        } else {
            echo "window.location.href='../user/index.php';";
        }
        
        echo "</script>";
    } else {
        echo "<script>
        alert('Gagal menghapus komentar.');
        window.location.href='../user/index.php';
        </script>";
    }
} else {
    echo "<script>
    alert('Anda tidak memiliki izin untuk menghapus komentar ini.');
    window.location.href='../user/index.php';
    </script>";
}
?>
