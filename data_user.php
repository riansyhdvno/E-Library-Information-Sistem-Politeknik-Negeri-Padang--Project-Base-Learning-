<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: home.php");
    exit;
}

require 'koneksicom.php';
$query = "SELECT * FROM user";
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
        <div class="container mt-5  ">
            <h1>Data User</h1>
            <table class="table table-bordered mt-3">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Level</th>
                        <?php
                        if ($_SESSION['level'] == 'admin') {
                        ?>
                            <th>Aksi</th>
                        <?php
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1;
                    foreach ($result as $row) : ?>
                        <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['password'] ?></td>
                            <td><?= $row['level'] ?></td>
                            <?php
                            if ($_SESSION['level'] == 'admin') {
                            ?>
                                <td>
                                    <a onclick="confirm(Apakah kamu yakin ?)" href="edit_user.php?id_user=<?= $row['id_user'] ?>" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a>
                                    <a onclick="return confirm ('Apakah anda yakin menghapusnya?')" href="delete_user.php?id_user=<?= $row['id_user'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="text-center"> <!-- Menambahkan class text-center untuk mengatur posisi ke tengah -->
                <?php
                $queryCount = "SELECT COUNT(*) as total FROM user";
                $resultCount = $db->query($queryCount);

                if ($resultCount && $resultCount->num_rows > 0) {
                    $rowCount = $resultCount->fetch_assoc();
                    $totalUsers = $rowCount['total'];
                    echo "<p class='mb-0'>Total User: $totalUsers Orang</p>";
                } else {
                    echo "<p class='mb-0'>Data pengembalian tidak ditemukan.</p>";
                }
                ?>
            </div>
            <br>

            <?php
            if ($_SESSION['level'] == 'admin') {
            ?>
                <p class="text-center mt-4">Untuk input data silahkan
                    <!-- Button trigger modal -->
                    <button type="button" class="btn text-white" style="background-color: #FF8F01;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Disini
                    </button>

                    <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Anggota</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="proses_tambah_user.php" method="post">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" class="form-control" id="password" name="password" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="level" class="form-label">Level</label>
                                        <input type="text" class="form-control" id="level" name="level" required>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="submit" value=submit>Submit</button>
                                    </div>
                                </form>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </p>
            <?php
            } ?>
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