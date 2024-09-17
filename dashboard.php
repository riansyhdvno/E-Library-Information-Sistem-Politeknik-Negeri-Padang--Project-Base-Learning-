<?php
session_start();
require 'koneksicom.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Library PNP</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>

</head>

<body>

    <?php include 'navdash.php'; ?>

    <div style="margin-left:50px;">
        <h3 class="mt-5 mb-4">Welcome Home</h3>
    </div>
    <section style='margin-bottom:250px;'>
        <div id="content" class="p-4 p-md-6 pt-0">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <a href="data_anggota.php" class="text-decoration-none text-dark">
                        <div class="card info-card customers-card shadow rounded-3 border-secondary">
                            <div class="card-body">
                                <h5 class="card-title">Member</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle bg-primary text-white">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            <?php
                                            include 'koneksicom.php';

                                            // Query to fetch the total number of members
                                            $query = "SELECT COUNT(*) AS total_member FROM members";
                                            $stmtSelect = $db->prepare($query);

                                            // Check query execution
                                            if ($stmtSelect->execute()) {
                                                $result = $stmtSelect->get_result();
                                                $row = $result->fetch_assoc();

                                                // Display the total number of members
                                                $total_member = $row['total_member'];
                                                echo $total_member;
                                            } else {
                                                echo 'Error: ' . $stmtSelect->error;
                                            }
                                            ?>
                                        </h6>
                                        <span class="text-success small pt-1 fw-bold">
                                            <?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $today = date('l, j M Y');
                                            echo $today;
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Repeat the above structure for the other cards (Peminjaman and User) -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <a href="data_peminjaman.php" class="text-decoration-none text-dark">
                        <div class="card info-card customers-card shadow rounded-3 border-secondary">
                            <div class="card-body">
                                <h5 class="card-title">Peminjaman</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle bg-primary text-white">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            <?php
                                            include 'koneksicom.php';

                                            // Query to fetch the total number of peminjaman with status 'pinjam'
                                            $query = "SELECT COUNT(*) AS total_peminjaman FROM peminjaman WHERE status = 'pinjam'";
                                            $stmtSelect = $db->prepare($query);

                                            // Check query execution
                                            if ($stmtSelect->execute()) {
                                                $result = $stmtSelect->get_result();
                                                $row = $result->fetch_assoc();

                                                // Display the total number of peminjaman with status 'pinjam'
                                                $total_peminjaman = $row['total_peminjaman'];
                                                echo $total_peminjaman;
                                            } else {
                                                echo 'Error: ' . $stmtSelect->error;
                                            }
                                            ?>
                                        </h6>
                                        <span class="text-success small pt-1 fw-bold">
                                            <?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $today = date('l, j M Y');
                                            echo $today;
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 mb-4">
                    <a href="data_bukutamu.php" class="text-decoration-none text-dark">
                        <div class="card info-card customers-card shadow rounded-3 border-secondary">
                            <div class="card-body">
                                <h5 class="card-title">Pengunjung</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle bg-primary text-white">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            <?php
                                            include 'koneksicom.php';

                                            // Query to fetch the total number of peminjaman with status 'pinjam'
                                            $query = "SELECT COUNT(*) AS total_pengunjung FROM kunjungan";
                                            $stmtSelect = $db->prepare($query);

                                            // Check query execution
                                            if ($stmtSelect->execute()) {
                                                $result = $stmtSelect->get_result();
                                                $row = $result->fetch_assoc();

                                                // Display the total number of peminjaman with status 'pinjam'
                                                $total_pengunjung = $row['total_pengunjung'];
                                                echo $total_pengunjung;
                                            } else {
                                                echo 'Error: ' . $stmtSelect->error;
                                            }
                                            ?>
                                        </h6>
                                        <span class="text-success small pt-1 fw-bold">
                                            <?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $today = date('l, j M Y');
                                            echo $today;
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


                <!-- Card for User -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <a href="data_user.php" class="text-decoration-none text-dark">
                        <div class="card info-card customers-card shadow rounded-3 border-secondary">
                            <div class="card-body">
                                <h5 class="card-title">User</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle bg-primary text-white">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            <?php
                                            include 'koneksicom.php';

                                            // Query to fetch the total number of users
                                            $query = "SELECT COUNT(*) AS total_user FROM user";
                                            $stmtSelect = $db->prepare($query);

                                            // Check query execution
                                            if ($stmtSelect->execute()) {
                                                $result = $stmtSelect->get_result();
                                                $row = $result->fetch_assoc();

                                                // Display the total number of users
                                                $total_user = $row['total_user'];
                                                echo $total_user;
                                            } else {
                                                echo 'Error: ' . $stmtSelect->error;
                                            }
                                            ?>
                                        </h6>
                                        <span class="text-success small pt-1 fw-bold">
                                            <?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $today = date('l, j M Y');
                                            echo $today;
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


    </section>

    <section class="main">
        <div class="container">
            <div class="row py-5">
                <div class="col-lg-8 pt-5" style="margin-top: 160px;">
                    <h1 class="pt-4">Perpustakaan <br>Politeknik Negeri Padang</h1>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <?php include 'footerusers.php'; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="bootstrap/bootstrap.bundle.min..js"></script>
    <script src="bootstrap/jquery-3.6.4.min.js"></script>
    <script src="home.js"></script>
    <script>
        function scrollToSection(sectionId) {
            const section = document.querySelector(sectionId);
            if (section) {
                section.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    </script>

</body>

</html>