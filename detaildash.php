<?php
session_start();
$isLoggedIn = isset($_SESSION['login']);
require 'koneksicom.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT books.*, categories.nama_kategori FROM books JOIN categories ON books.category_id = categories.id_kategori WHERE books.id = $id";
    $result = $db->query($query);

    if ($result) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $gambar_path = $row['gambar'];
            $kode_buku = $row['kode_buku'];
            $judul = $row['judul'];
            $category_id = $row['category_id'];
            $pengarang = $row['pengarang'];
            $jumlah_halaman = $row['jumlah_halaman'];
            $available_books = $row['available_books'];
            $tottal_books = $row['tottal_books'];
        } else {
            echo "Data id " . $id . " tidak ditemukan";
            exit;
        }
    } else {
        die("Query error: " . $db->error);
    }
} else {
    echo "Parameter tidak valid";
    exit;
}

$tahun_terbit = isset($row['tahun_terbit']) ? $row['tahun_terbit'] : '';
$lokasi = isset($row['lokasi']) ? $row['lokasi'] : '';
$detail = isset($row['detail']) ? $row['detail'] : '';
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
        <button onclick="goBack()" class="btn btn-sm" style="margin-top:30px;margin-left:50px;background-color: #FF8F01; color: white;">
            <i class="fa fa-arrow-left"></i> Kembali
        </button>


        <div id="content" class="p-4 p-md-5 pt-5">
            <?php foreach ($result as $row) : ?>
                <!-- Kartu Pertama dengan Gambar -->
                <div class="card border-secondary" style="background-color:transparent; width: 20rem; height: 23rem; float: left; margin-left: 10%; margin-bottom: 20px; text-align: left;">
                    <img src="<?= $row['gambar'] ?>" class="card-img-top mx-auto" alt="Buku Image" style="width: 180px; height: 310px; margin-top: 20px;">
                </div>

                <!-- Kartu Kedua dengan Rincian Buku -->
                <div class="card border-secondary" style="width: 50rem; height: auto;text-align: left; color: white; background-color: transparent;">
                    <div class="card-body">
                        <p class="card-text" style="margin-left: 20px">
                        <h1><?= $row['judul'] ?></h1><br>
                        <strong>ISBN:<br></strong> <?= $row['kode_buku'] ?><br>
                        <strong>Kategori:<br></strong> <?= $row['nama_kategori'] ?><br>
                        <strong>Pengarang:<br></strong> <?= $row['pengarang'] ?><br>
                        <strong>Penerbit:<br></strong> <?= $row['penerbit'] ?><br>
                        <strong>Tahun Penerbit:<br></strong> <?= $row['tahun_terbit'] ?><br>
                        <strong>Jumlah Halaman:<br></strong> <?= $row['jumlah_halaman'] ?><br>
                        <strong>Lokasi:<br></strong> <?= $row['lokasi'] ?><br>
                        <strong>Tersedia:<br></strong> <?= $row['available_books'] ?><br>
                        <strong>Total:<br></strong> <?= $row['tottal_books'] ?><br>
                        <strong>Sinopsis:<br></strong> <?= $row['detail'] ?><br>
                        </p>

                        <?php if ($isLoggedIn && isset($_SESSION['level']) && $_SESSION['level'] == 'admin') : ?>
                            <!-- Tombol Edit dan Delete hanya ditampilkan jika pengguna adalah admin -->
                            <!-- Button trigger modal -->
                            <button type="button" style="background-color: #FF8F01;" class="btn text-white" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Edit
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="proses_edit.php" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="kode_buku" class="form-label">Kode Buku</label>
                                                                <input type="text" class="form-control" name="kode_buku" value="<?= $kode_buku ?>" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="judul" class="form-label">Judul</label>
                                                                <input type="text" class="form-control" name="judul" value="<?= $judul ?>" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="gambar" class="form-label">Gambar</label>
                                                                <div style="position: relative;">
                                                                    <input type="file" name="gambar" accept="image/*" class="form-control-file">
                                                                    <?php if (!empty($row['gambar'])) : ?>
                                                                        <!-- Tambahkan attribut width dan tingginya otomatis agar gambar proporsional -->
                                                                        <img src="<?php echo $row['gambar']; ?>" alt="Gambar Buku" style="width: 100%; height: auto; position: absolute; top: 5px; left: 10px;">
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="category_id" class="form-label">Nama Kategori</label>
                                                                <select class="form-select" name="category_id">
                                                                    <option value="">--Pilih Kategori--</option>
                                                                    <?php
                                                                    $result = mysqli_query($db, "SELECT * FROM categories");
                                                                    while ($category = mysqli_fetch_array($result)) {
                                                                        $selected = ($category['id_kategori'] == $row['category_id']) ? 'selected' : '';
                                                                        echo "<option value=" . $category['id_kategori'] . " $selected>" . $category['nama_kategori'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="pengarang" class="form-label">Nama Pengarang</label>
                                                                <select class="form-select" name="pengarang">
                                                                    <option value="">--Pilih Pengarang--</option>
                                                                    <?php
                                                                    $resultPengarang = mysqli_query($db, "SELECT * FROM pengarang");
                                                                    while ($pengarang = mysqli_fetch_array($resultPengarang)) {
                                                                        $selectedPengarang = ($pengarang['nama_pengarang'] == $row['pengarang']) ? 'selected' : '';
                                                                        echo "<option value='" . $pengarang['nama_pengarang'] . "' $selectedPengarang>" . $pengarang['nama_pengarang'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="penerbit" class="form-label">Nama Penerbit</label>
                                                                <select class="form-select" name="penerbit">
                                                                    <option value="">--Pilih Penerbit--</option>
                                                                    <?php
                                                                    $resultPenerbit = mysqli_query($db, "SELECT * FROM penerbit");
                                                                    while ($penerbit = mysqli_fetch_array($resultPenerbit)) {
                                                                        $selectedPenerbit = ($penerbit['nama_penerbit'] == $row['penerbit']) ? 'selected' : '';
                                                                        echo "<option value='" . $penerbit['nama_penerbit'] . "' $selectedPenerbit>" . $penerbit['nama_penerbit'] . "</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                                                                <input type="text" class="form-control" name="tahun_terbit" value="<?= $tahun_terbit ?>" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="jumlah_halaman" class="form-label">Jumlah Halaman</label>
                                                                <input type="text" class="form-control" name="jumlah_halaman" value="<?= $jumlah_halaman ?>" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="lokasi" class="form-label">Lokasi</label>
                                                                <input type="text" class="form-control" name="lokasi" value="<?= $lokasi ?>" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="available_books" class="form-label">Buku Yang Tersedia</label>
                                                                <input type="text" class="form-control" name="available_books" value="<?= $available_books ?>" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="tottal_books" class="form-label">Jumlah Buku</label>
                                                                <input type="text" class="form-control" name="tottal_books" value="<?= $tottal_books ?>" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="detail" class="form-label">Sinopsis</label>
                                                                <textarea class="form-control" name="detail" rows="5"><?= $detail ?></textarea>
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
                            <div class="btn-group" style="margin-left: 5px">
                                <a onclick="confirm('Apakah kamu yakin?')" href="delete_buku.php?id=<?= $row['id'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endforeach ?>
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
        function goBack() {
            window.history.back();
        }
    </script>

    <button onclick="goBack()" class="btn btn-sm" style="margin-top:100px;margin-left:50px;background-color: #FF8F01; color: white;">
        <i class="fa fa-arrow-left"></i> Kembali
    </button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>