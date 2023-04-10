<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
}
?>
<?php
// memanggil library FPDF
require('fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string
$pdf->Cell(190, 7, 'FUTSALAN', 0, 1, 'C');
$pdf->Cell(190, 7, 'TEMPAT PENYEWAAN FUTSAL YOGYAKARTA', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(50, 6, 'Nama', 1, 0);
$pdf->Cell(30, 6, 'Tanggal', 1, 0);
$pdf->Cell(30, 6, 'Jam Mulai', 1, 0);
$pdf->Cell(30, 6, 'Jam Selesai', 1, 1);
$pdf->SetFont('Arial', '', 10);

include 'koneksi.php';
$id = $_GET['id'];
$mahasiswa = mysqli_query($con, "select * from booking where id= '$id'");
while ($row = mysqli_fetch_array($mahasiswa)) {
    $pdf->Cell(50, 6, $row['nama'], 1, 0);
    $pdf->Cell(30, 6, $row['tanggal'], 1, 0);
    $pdf->Cell(30, 6, $row['jam_mulai'], 1, 0);
    $pdf->Cell(30, 6, $row['jam_selesai'], 1, 1);
    
}
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(190, 5, 'Cetak untuk memberikan bukti sebagai penyewa', 0, 1, 'C');

$pdf->Output();
