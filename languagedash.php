<?php
session_start();
$isLoggedIn = isset($_SESSION['login']);
require 'koneksicom.php';
$query = "SELECT books.*, categories.nama_kategori FROM books LEFT JOIN categories ON books.category_id = categories.id_kategori WHERE category_id IN (11) ORDER BY id DESC;";
$result = $db->query($query);

if (!$result) {
    die("Query error: " . $db->error);
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
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="row justify-content-end mb-4">
                <div class="col-auto">
                    <!-- Button trigger modal -->
                    <?php if ($isLoggedIn && isset($_SESSION['level']) && $_SESSION['level'] == 'admin') : ?>
                        <button type="button" class="btn btn-sm add-new text-white" style="margin-top:50px; background-color:#FF8F01;" data-bs-toggle="modal" data-bs-target="#modalTambah">
                            <i class="fa fa-plus"></i> Tambah Buku
                        </button>
                    <?php endif; ?>
                    <!-- Modal -->
                    <div class="modal fade modal-lg" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambahkan Buku</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="proses_computer.php" method="post" enctype="multipart/form-data">
                                        <!-- Formulir Anda -->

                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="kode_buku" class="form-label">ISBN</label>
                                                        <input type="text" class="form-control" name="kode_buku" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="judul" class="form-label">Judul</label>
                                                        <input type="text" class="form-control" name="judul" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="gambar" class="form-label">Gambar</label>
                                                        <input type="file" name="gambar" accept="image/*" required>

                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="category_id" class="form-label">Kategori</label>
                                                        <select class="form-select" name="category_id" required>
                                                            <option value="">-- Pilih Kategori --</option>
                                                            <?php
                                                            $result = mysqli_query($db, "SELECT * FROM categories");
                                                            while ($category = mysqli_fetch_array($result)) {
                                                                echo "<option value=" . $category['id_kategori'] . ">" . $category['nama_kategori'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="pengarang" class="form-label">Pengarang</label>
                                                        <select class="form-select" name="pengarang" required>
                                                            <option value="">-- Pilih Pengarang --</option>
                                                            <?php
                                                            $result = mysqli_query($db, "SELECT * FROM pengarang");
                                                            while ($category = mysqli_fetch_array($result)) {
                                                                echo "<option value='" . $category['nama_pengarang'] . "'>" . $category['nama_pengarang'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="penerbit" class="form-label">Penerbit</label>
                                                        <select class="form-select" name="penerbit" required>
                                                            <option value="">-- Pilih Penerbit --</option>
                                                            <?php
                                                            $result = mysqli_query($db, "SELECT * FROM penerbit");
                                                            while ($category = mysqli_fetch_array($result)) {
                                                                echo "<option value='" . $category['nama_penerbit'] . "'>" . $category['nama_penerbit'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                                        <input type="text" class="form-control" name="tahun_terbit" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="jumlah_halaman" class="form-label">Jumlah Halaman</label>
                                                        <input type="text" class="form-control" name="jumlah_halaman" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="lokasi" class="form-label">Lokasi</label>
                                                        <input type="text" class="form-control" name="lokasi" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="available_books" class="form-label">Buku Yang Tersedia</label>
                                                        <input type="text" class="form-control" name="available_books" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="tottal_books" class="form-label">Jumlah Buku</label>
                                                        <input type="text" class="form-control" name="tottal_books" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="detail" class="form-label">Detail</label>
                                                        <textarea class="form-control" name="detail" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn text-white" style="background-color: #FF8F01;" name="submit">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="table-responsive">
                        <form action="komputerhome.php" method="POST">
                            <div class="input-group">
                                <input style="margin-bottom:30px;" type="text" class="form-control" name='cari' placeholder="Search now" aria-label="search" aria-describedby="search" value="<?= isset($_POST['cari']) ? $_POST['cari'] : '' ?>">
                                <div class="input-group-append">
                                    <button class="btn text-white" id="search-button" style=" background-color: #FF8F01; margin-left:5px;">Search</button>
                                </div>
                            </div>
                    </div>
                </div>
                <br>
                </form>
                <?php
                // Menggunakan satu query untuk menangani pencarian dan tampilan data
                $query = "SELECT books.*, categories.nama_kategori FROM books LEFT JOIN categories ON books.category_id = categories.id_kategori WHERE category_id IN (11)";
                if (isset($_POST['cari'])) {
                    $cari = $_POST['cari'];

                    if (!empty($cari)) {
                        $query .= " AND (kode_buku LIKE '%$cari%' OR judul LIKE '%$cari%' OR pengarang LIKE '%$cari%')";
                    }
                }

                $query .= " ORDER BY id DESC";  // Moved the ORDER BY clause here

                $result = $db->query($query);

                if (!$result) {
                    die("Query error: " . $db->error);
                }
                ?>
                <div class="panel-body table-responsive">
                    <table class="table">
                        <div class="card-container">
                            <?php
                            $nomor = 1;
                            foreach ($result as $row) :
                            ?>
                                <div class="card text-white border-secondary" style="background-color:transparent;width: 16rem; height: 28rem; float: left; margin-right: 20px; margin-bottom: 20px; text-align: left; white-space: nowrap; overflow: hidden;">
                                    <div class="text-center" style="margin-top: 10px;">
                                        <img src="<?= $row['gambar'] ?>" class="card-img-top mx-auto" alt="Buku Image" style="width: 100px; height: 150px;">
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        $judul = $row['judul'];
                                        $max_length = 18;
                                        $display_judul = strlen($judul) > $max_length ? '<strong>' . substr($judul, 0, $max_length) . "...</strong>" : '<strong>' . $judul . '</strong>';
                                        ?>
                                        <h5 class="card-title"><?= $display_judul ?></h5>
                                        <p class="card-text">
                                            <strong>ISBN:</strong> <?= $row['kode_buku'] ?><br>
                                            <strong>Kategori:</strong> <?= $row['nama_kategori'] ?><br>
                                            <strong>Pengarang:</strong>
                                            <?php
                                            $pengarang = $row['pengarang'];
                                            $max_length_pengarang = 18;
                                            $display_pengarang = strlen($pengarang) > $max_length_pengarang ? substr($pengarang, 0, $max_length_pengarang) . "..." : $pengarang;
                                            ?>
                                            <?= $display_pengarang ?><br>
                                            <strong>Jumlah Halaman:</strong> <?= $row['jumlah_halaman'] ?><br>
                                            <strong>Tersedia:</strong> <?= $row['available_books'] ?><br>
                                            <strong>Total:</strong> <?= $row['tottal_books'] ?><br>
                                        </p>
                                        <a href="detaildash.php?id=<?= $row['id'] ?>" class="btn btn-sm text-white" style="font-size: 18px;background-color: #FF8F01"><i class="fa fa-search"></i>Detail</a>
                                        </tr>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </table>

                    <div class="container mt-5">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
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

</body>

</html>