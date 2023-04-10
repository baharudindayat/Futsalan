<?php
include "koneksi.php";

$id = $_GET['id'];
$result = mysqli_query($con,"DELETE FROM booking where id='$id'");

header('Location: booking.php');

?>