<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Futsalan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/apple-icon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- -->
</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">baharudin2000018263@webmail.uad.ac.id</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">2000018263</a>
                </div>
                <div>
                    <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.php">
                Futsalan
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="booking.php">Booking</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                        <a href="logout.php" class="nav-link text-light"> Log Out </a>
                    </a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Banner Hero -->
    <div class="container mt-4">
        <h1 class="navbar-brand text-success logo h1 align-self-center">Jadwal Hari ini</h1>
        <form action="" method="get">
            <input type="text"  class="form-control" id="search" name="cari" placeholder="Search tanggal (yyyy-mm-dd)">
        </form>
        <?php 
            if(isset($_GET['cari'])) {
                $cari = $_GET['cari'];      
            
                $result = mysqli_query($con, "SELECT * FROM booking where tanggal = '$cari' ORDER BY TIME(jam_selesai), jam_selesai");
                } else {
                $result = mysqli_query($con, "SELECT * FROM booking where tanggal >= CURRENT_DATE() ORDER BY TIME(jam_selesai), jam_selesai");
               }?>
        <table class="table table-borderless table-responsive card-1 p-4">
            <thead>
                <tr class="border-bottom">
                    <th>
                        <span class="ml-2">Tanggal</span>
                    </th>
                    <th>
                        <span class="ml-2">Nama</span>
                    </th>
                    <th>
                        <span class="ml-2">Jam Mulai</span>
                    </th>
                    <th>
                        <span class="ml-2">Jam Selesai</span>
                    </th>
                </tr>
            </thead>
            <?php

            
            while ($r = mysqli_fetch_array($result)) {
                $tanggal = $r['tanggal'];
                $nama = $r['nama'];
                $jammulai = $r['jam_mulai'];
                $jamselesai = $r['jam_selesai'];
            ?>

                <tbody>
                    <tr class="border-bottom">
                        <td><?php echo $tanggal; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $jammulai; ?></td>
                        <td><?php echo $jamselesai; ?></td>
                    </tr>

                </tbody>
            <?php }
            ?>

        </table>
    </div>






    <!-- End Banner Hero -->
    <div class="container mt-4">
        <h1 class="navbar-brand text-success logo h1 align-self-center">Jadwal Saya</h1>
        
        <table class="table table-borderless table-responsive card-1 p-4">
            <thead>
                <tr class="border-bottom">
                    <th>
                        <span class="ml-2">Tanggal</span>
                    </th>
                    <th>
                        <span class="ml-2">Nama</span>
                    </th>
                    <th>
                        <span class="ml-2">Jam Mulai</span>
                    </th>
                    <th>
                        <span class="ml-2">Jam Selesai</span>
                    </th>
                    <th>
                        <span class="ml-2">Action</span>
                    </th>
                </tr>
            </thead>
            <?php
            $jadwalkita = $_SESSION['username'];
            $result = mysqli_query($con, "SELECT * FROM booking where nama = '$jadwalkita'");
            while ($r = mysqli_fetch_array($result)) {
                $tanggal = $r['tanggal'];
                $nama = $r['nama'];
                $jammulai = $r['jam_mulai'];
                $jamselesai = $r['jam_selesai'];
            ?>

                <tbody>
                    <tr class="border-bottom">
                        <td><?php echo $tanggal; ?></td>
                        <td><?php echo $nama; ?></td>
                        <td><?php echo $jammulai; ?></td>
                        <td><?php echo $jamselesai; ?></td>
                        <?php echo"<td><a href='cetakjadwal.php?id=$r[id]'> Cetak</a> | <a href='editbooking.php?id=$r[id]'>Edit</a> | <a href='authdeletebooking.php?id=$r[id]'>Delete</a></td>"?>
                        
                    </tr>

                </tbody>
            <?php }
            ?>

        </table>


    </div>
    
    <div class="container mt-4">
        <h1 class="navbar-brand text-success logo h1 align-self-center">Form Booking</h1>
        <form action="authbooking.php" method="POST">
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggall" id="tanggal">
            </div>
            <div class="mb-3">
                <label for="jammulai" class="form-label">Jam Mulai</label>
                <input type="time" class="form-control" step='3600' name="jammulaii" id="jammulai">
            </div>
            <div class="mb-3">
                <label for="jamselesai" class="form-label">Jam Selesai</label>
                <input type="time" class="form-control" step='3600' name="jamselesaii" id="jamselesai">
            </div>
            <button type="submit" name="submit" class="btn btn btn-success btn-block">Submit</button>
        </form>
    </div>

    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">Futsalan</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Universitas Ahmad Dahlan
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">2000018263</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">baharudin2000018263@webmail.uad.ac.id</a>
                        </li>
                    </ul>
                </div>



                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Home</a></li>
                        <li><a class="text-decoration-none" href="#">About Us</a></li>
                        <li><a class="text-decoration-none" href="#">Locations</a></li>
                        <li><a class="text-decoration-none" href="#">FAQs</a></li>
                        <li><a class="text-decoration-none" href="#">Contact</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2021 Baharudin Nur Hidayat
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>