<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $jammulai = $_POST['jammulai'];
    $jamselesai = $_POST['jamselesai'];

    $result = mysqli_query($con, "UPDATE booking SET tanggal='$tanggal',jam_mulai='$jammulai','jam_selesai='$jamselesai' where id='$id'");
}
header("Location: booking.php");
?>