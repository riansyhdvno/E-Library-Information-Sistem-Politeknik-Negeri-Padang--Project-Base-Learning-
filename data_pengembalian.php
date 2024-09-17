<?php

session_start();
// cek user tlh login apa blom
if (!isset($_SESSION['login'])) {
    header("Location: home.php");
    exit;
}

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
                    <h1 style="margin-top:50px">Data Pengembalian</h1>
                    <?php
                    $query = "SELECT * FROM peminjaman WHERE status = 'kembali' ORDER BY id";
                    $result = $db->query($query) or die($db->error); // Eksekusi query

                    if ($result->num_rows > 0) {
                    ?>

                        <table class="table table-bordered mt-3">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>No</th>
                                    <th>NIP/NIM</th>
                                    <th>Peminjam</th>
                                    <th>ISBN</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                foreach ($result as $row) :
                                    $query = $query = "SELECT * FROM peminjaman WHERE status='kembali' ORDER BY id";;
                                    $result = $db->query($query);

                                ?>
                                    <tr>
                                        <td><?= $nomor++ ?></td>
                                        <td><?= $row['nim'] ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['kode_buku'] ?></td>
                                        <td><?= $row['judul_buku'] ?></td>
                                        <td><?= $row['tgl_pinjam'] ?></td>
                                        <td><?= $row['tgl_pengembalian'] ?></td>
                                        <td>
                                            <font color="blue"><?= $row['status'] ?>
                                        </td>

                                    </tr>
                                <?php endforeach ?>
                            </tbody>

                        </table>
                    <?php
                        // Menghitung jumlah pengembalian
                        $pinjam = $result->num_rows;
                        echo "<br><center>Total Pengembalian : $pinjam Orang</center>";
                    } else {
                        echo "Data pengembalian tidak ditemukan.";
                    }
                    ?>
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