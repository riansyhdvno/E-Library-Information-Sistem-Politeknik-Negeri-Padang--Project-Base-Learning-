    <?php
    require 'koneksicom.php';
    $query = "SELECT * FROM members";
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
                        <h1 style="margin-top:50px">Data Anggota</h1>
                        <table class="table table-bordered mt-3">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>No</th>
                                    <th>NIP/NIM</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>Status</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Telepon</th>
                                    <th>Alamat</th>

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
                                foreach ($result as $row) : ?>
                                    <tr>
                                        <td><?= $nomor++ ?></td>
                                        <td><?= $row['nim'] ?></td>
                                        <td><?= $row['nama'] ?></td>
                                        <td><?= $row['jurusan'] ?></td>
                                        <td><?= $row['status'] ?></td>
                                        <td><?= $row['gender'] ?></td>
                                        <td><?= $row['no_tlpn'] ?></td>
                                        <td><?= $row['alamat'] ?></td>

                                        <?php



                                        if ($_SESSION['level'] == 'pustakawan') {
                                        ?>
                                            <td>
                                                <a onclick="confirm(Apakah kamu yakin ?)" href="edit_anggota.php?nim=<?= $row['nim'] ?>" class="btn text-white" style="background-color:#FF8F01"><i class="fa fa-pencil-alt"></i></a>
                    </div>
                </div>

                <a onclick="return confirm ('Apakah anda yakin menghapusnya?')" href="delete_anggota.php?nim=<?= $row['nim'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            <?php
                                        }
            ?>

            </tr>
        <?php endforeach ?>
        </tbody>
        </table>
        <div class="row">
            <div class="col text-center">
                <?php
                $total_members_query = "SELECT COUNT(*) as total_members FROM members";
                $total_members_result = $db->query($total_members_query);
                $total_members = $total_members_result->fetch_assoc()['total_members'];
                ?>
                <p>Total Anggota: <?= $total_members ?> Orang</p>
            </div>
        </div>
        <br>

        <?php
        if ($_SESSION['level'] == 'pustakawan') {
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
                            <form action="proses_tambah_anggota.php" method="post">
                                <div class="mb-3">
                                    <label for="nim" class="form-label">NIM</label>
                                    <input type="text" class="form-control" id="nim" name="nim" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>


                                <div class="mb-3 " ;>
                                    <label for=" jurusan" class="form-label">Jurusan</label>
                                    <select class="form-select" aria-label="Large select example" name="jurusan">
                                        <option selected>Pilih Jurusan</option>
                                        <option value="1">Teknik Mesin</option>
                                        <option value="2">Teknik Sipil</option>
                                        <option value="3">Teknik Elektro</option>
                                        <option value="4">Teknologi Informasi</option>
                                        <option value="5">Bahasa Inggris</option>
                                        <option value="6">Administrasi Niaga</option>
                                        <option value="7">Akuntansi</option>
                                    </select>
                                </div>



                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <div>
                                        <select class="form-select" name="status" id="status">
                                            <option value="Dosen">Dosen</option>
                                            <option value="Mahasiswa" selected>Mahasiswa</option>
                                        </select>
                                    </div>

                                </div>


                                <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="L" value="L" checked>
                                        <label class="form-check-label" for="L">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="P" value="P">
                                        <label class="form-check-label" for="P">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="no_tlpn" class="form-label">No Telepon</label>
                                    <input type="text" class="form-control" id="no_tlpn" name="no_tlpn" required>
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="submit" value=submit>Submit</button>
                                </div>

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