<?php

session_start();
// cek user tlh login apa blom
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'koneksicom.php';
function terlambat($tgl_dateline, $tgl_pengembalian)
{
    $tgl_dateline = strtotime($tgl_dateline);
    $tgl_pengembalian = strtotime($tgl_pengembalian);

    $selisih = $tgl_pengembalian - $tgl_dateline;

    $hari_terlambat = floor($selisih / (60 * 60 * 24));

    return $hari_terlambat;
}
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
                    <h1 style="margin-top:50px">Data Peminjam</h1>
                    <?php
                    // Menggunakan satu query untuk menangani pencarian dan tampilan data
                    $query = "SELECT * FROM peminjaman WHERE status = 'pinjam' ";
                    if (isset($_POST['cari'])) {
                        $cari = $_POST['cari'];
                        if (!empty($cari)) {
                            $query = "SELECT * FROM peminjaman 
                WHERE kode_buku LIKE '%$cari%' OR 
                nim LIKE '%$cari%' ";
                        }
                    }
                    $result = $db->query($query) or die($db->error);
                    if ($result->num_rows > 0) {
                    ?>
                        <table class="table table-bordered mt-3">
                            <thead class="table-header">
                                <tr>
                                    <th>No</th>
                                    <th>NIP/NIM</th>
                                    <th>Peminjam</th>
                                    <th>ISBN</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Status</th>
                                    <th>Terlambat</th>
                                    <?php
                                    if ($_SESSION['level'] == 'pustakawan') {
                                    ?>
                                        <th>Aksi</th>
                                    <?php
                                    }
                                    ?>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $nomor = 1;
                                foreach ($result as $row) :
                                    // $tgl_pengembalian = new DateTime($row['tgl_pengembalian']);
                                    // $tgl_sekarang = new DateTime();
                                    // $terlambat = $tgl_pengembalian->diff($tgl_sekarang)->format("%r%a");
                                ?>
                                    <tr>
                                        <td><?= $nomor++ ?></td>
                                        <td><?= $row['nim'] ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['kode_buku'] ?></td>
                                        <td><?= $row['judul_buku'] ?></td>
                                        <td><?= $row['tgl_pinjam'] ?></td>
                                        <td><?= $row['tgl_pengembalian'] ?></td>
                                        <td><?= $row['status'] ?></td>
                                        <td><?php
                                            $tgl_dateline = $row['tgl_pengembalian'];
                                            $tgl_pengembalian = date('Y-m-d');
                                            $lambat = terlambat($tgl_dateline, $tgl_pengembalian);
                                            $denda1 = 200;
                                            $denda = $lambat * $denda1;
                                            if ($lambat > 0) {
                                                echo "<center><b><font color='red'>$lambat hari &nbsp | &nbsp(Rp. $denda1,- x $lambat) = Rp. $denda,-</font></b></center>";
                                            } else {
                                                echo "<center><b><font color='blue'> $lambat hari &nbsp | &nbsp Baru Meminjam</font></b></center>";
                                            }
                                            ?></td>
                                        <?php
                                        if ($_SESSION['level'] == 'pustakawan') {
                                        ?>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a onclick="return confirm('Apakah Anda ingin memperpanjang masa peminjaman?')" href="perpanjang.php?id=<?= $row['id'] ?>" class="btn btn-warning">
                                                        <i class="fa fa-clock"></i>
                                                    </a>

                                                    <a class="btn btn-success" onclick="return confirm('Apakah Anda ingin mengembalikan buku')" title="Kembali" href="kembali.php?hal=edit&nim=<?= $row['id'] ?>&kode_buku=<?= $row['kode_buku'] ?>">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                </div>
                                            </td <?php
                                                }
                                                    ?>>
                                        <?php endforeach ?>
                            </tbody>

                        </table>
                        <?php $tampil = $db->query("SELECT * FROM peminjaman WHERE status = 'pinjam' ORDER BY id ");
                        $pinjam = $tampil->num_rows;
                        ?>
                        <center>Total Peminjaman: <?php echo "$pinjam"; ?> Orang </center>
                    <?php
                    } else {
                        echo "Data tidak ditemukan.";
                    }
                    ?>

                    <br>

                    <?php
                    if ($_SESSION['level'] == 'pustakawan') {
                    ?>
                        <p class="text-center mt-4">Untuk input data silahkan
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Disini
                            </button>
                            <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Masukkan Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="proses_tambah_peminjam.php" method="POST">
                                            <div class="form-group">
                                                <label class="control-label">NIM</label>
                                                <div class="col-sm-14">
                                                    <select class="form-control mb-3" name="nim" id="nim">
                                                        <option value=""> -- Pilih Salah Satu --</option>
                                                        <?php
                                                        $sql = $db->query("SELECT * FROM members ORDER BY nim ASC");
                                                        if ($sql->num_rows != 0) {
                                                            while ($data = $sql->fetch_assoc()) {
                                                                echo '<option value=' . $data['nim'] . '>' . $data['nim'] . '</option>';
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php }
                                        ?>

                                        <div class="form-group">
                                            <label class="control-label">Nama</label>
                                            <div class="col-sm-14">
                                                <input class="form-control mb-3" type="text" name="nama" id="nama" readonly>
                                            </div>
                                        </div>

                                        <script>
                                            // Data NIM and Nama
                                            var dataNIMNama = {
                                                <?php
                                                $sql = $db->query("SELECT * FROM members ORDER BY nim ASC");
                                                if ($sql->num_rows != 0) {
                                                    while ($data = $sql->fetch_assoc()) {
                                                        echo "'" . $data['nim'] . "': '" . $data['nama'] . "', ";
                                                    }
                                                }
                                                ?>
                                            };

                                            // Event listener for changes in NIM
                                            document.getElementById('nim').addEventListener('change', function() {
                                                var selectedNIM = this.value;
                                                var namaInput = document.getElementById('nama');

                                                if (selectedNIM !== '') {
                                                    var selectedNama = dataNIMNama[selectedNIM];
                                                    if (selectedNama) {
                                                        namaInput.value = selectedNama;
                                                    } else {
                                                        namaInput.value = 'Nama tidak ditemukan';
                                                    }
                                                } else {
                                                    namaInput.value = '';
                                                }
                                            });
                                        </script>


                                        <div class="form-group">
                                            <label class="control-label">ISBN</label>
                                            <div class="col-sm-14">
                                                <select class="form-control mb-3" name="kode_buku" id="kode_buku">
                                                    <option value=""> -- Pilih Salah Satu --</option>
                                                    <?php
                                                    $sql = $db->query("SELECT * FROM books ORDER BY id ASC");
                                                    if ($sql->num_rows != 0) {
                                                        while ($data = $sql->fetch_assoc()) {
                                                            echo '<option value="' . $data['kode_buku'] . '">' . $data['kode_buku'] . '</option>';
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Judul Buku</label>
                                            <div class="col-sm-14">
                                                <input class="form-control" type="text" name="judul_buku" id="judul_buku" readonly>
                                            </div>
                                        </div>

                                        <script>
                                            // Ambil elemen dropdown ISBN
                                            var isbnDropdown = document.getElementById('kode_buku');
                                            // Ambil elemen input Judul
                                            var judulInput = document.getElementById('judul_buku');

                                            // Event listener untuk perubahan pada dropdown ISBN
                                            isbnDropdown.addEventListener('change', function() {
                                                // Jika ISBN dipilih
                                                if (isbnDropdown.value !== '') {
                                                    // Ambil judul buku sesuai dengan ISBN yang dipilih
                                                    var selectedJudul = '';
                                                    <?php
                                                    $sql = $db->query("SELECT kode_buku, judul FROM books");
                                                    if ($sql->num_rows != 0) {
                                                        while ($data = $sql->fetch_assoc()) {
                                                            echo "if (isbnDropdown.value === '" . $data['kode_buku'] . "') { selectedJudul = '" . $data['judul'] . "'; }";
                                                        }
                                                    }
                                                    ?>
                                                    // Tampilkan judul buku yang sesuai
                                                    judulInput.value = selectedJudul !== '' ? selectedJudul : 'Judul tidak ditemukan';
                                                } else {
                                                    // Jika tidak ada ISBN yang dipilih
                                                    judulInput.value = '';
                                                }
                                            });
                                        </script>

                                        <div class="mb-3">
                                            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                                            <input type="date" class="form-control" name="tgl_pinjam">
                                        </div>
                                        <?php
                                        // Menghitung tanggal kembali 7 hari dari tanggal pinjam
                                        $tgl_pinjam = date("Y-m-d");
                                        $tgl_pengembalian = date("Y-m-d", strtotime($tgl_pinjam . " +1 days"));
                                        ?>

                                        <div class="mb-3">
                                            <label for="tgl_pengembalian" class="form-label">Tanggal Pengembalian</label>
                                            <input type="date" class="form-control" name="tgl_pengembalian">
                                        </div>

                                        <input type="hidden" name="status" value="pinjam">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </p>
                        <?php
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