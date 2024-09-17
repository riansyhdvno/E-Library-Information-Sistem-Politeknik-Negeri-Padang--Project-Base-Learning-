<?php

session_start();
// cek user tlh login apa blom
if (!isset($_SESSION['login'])) {
    header("Location: home.php");
    exit;
}

require 'koneksicom.php';

?>
<?php


require 'koneksicom.php';
$query = "SELECT * FROM kunjungan";
$result = $db->query($query);


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
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- <link rel="stylesheet" href="css/bootstrap/style.css">  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <link rel="stylesheet" href="assets1/css/style.css">

</head>

<body>

    <?php include 'navdash.php'; ?>

    <section>
        <div class="container">
            <div class="row py-5">
                <div class="container mt-5" style="background-color: transparent;">
                    <h1 style="margin-top:50px">Buku Tamu</h1>
                    <table class="table table-bordered mt-3">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Keperluan</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1;
                            foreach ($result as $row) : ?>
                                <tr>
                                    <td><?= $nomor++ ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['keperluan'] ?></td>
                                    <td><?= $row['tanggal'] ?></td>
                                    <td><?= $row['waktu'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col text-center">
                            <?php
                            $total_kunjungan_query = "SELECT COUNT(*) as total_kunjungan FROM kunjungan";
                            $total_kunjungan_result = $db->query($total_kunjungan_query); // Perbaikan di sini
                            $total_kunjungan = $total_kunjungan_result->fetch_assoc()['total_kunjungan'];
                            ?>
                            <p>Total Anggota: <?= $total_kunjungan ?> Orang</p>
                        </div>
                    </div>
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
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable(); // Inisialisasi DataTable pada elemen tabel dengan class 'table'
        });
    </script>

</body>

</html>