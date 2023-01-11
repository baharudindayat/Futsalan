<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    
}
if (isset($_POST['submit'])) {
    $nama = $_SESSION['username'];
    $tanggall = $_POST['tanggall'];
    $jammulaii = $_POST['jammulaii'];
    $jamselesaii = $_POST['jamselesaii'];

    $result2 = mysqli_query($con, "INSERT INTO booking (nama,tanggal,jam_mulai,jam_selesai) VALUES ('$nama','$tanggall','$jammulaii','$jamselesaii') ");
}
header('Location: booking.php');

?>