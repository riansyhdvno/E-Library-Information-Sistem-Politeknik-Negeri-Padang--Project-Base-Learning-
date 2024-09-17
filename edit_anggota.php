<?php
session_start();
// cek user tlh login apa blom
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'koneksicom.php';

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    $query = "SELECT * FROM members WHERE nim = $nim";
    $result = $db->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nim = $row['nim'];
        $nama = $row['nama'];
        $jurusan = $row['jurusan'];
        $status = $row['status'];
        $gender = $row['gender'];
        $no_tlpn = $row['no_tlpn'];
        $alamat = $row['alamat'];
    } else {
        echo "Data nim " . $nim . "Tidak Ditemukan";
    }
} else {
    echo "Parameter Tidak Ditemukan";
    exit;
}

if (isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $status = $_POST['status'];
    $gender = $_POST['gender'];
    $no_tlpn = $_POST['no_tlpn'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE members SET nama='$nama', jurusan = '$jurusan', status = '$status', gender = '$gender', no_tlpn = '$no_tlpn', alamat = '$alamat'  WHERE nim = '$nim'";

    // cek apakah update sukses atau gagal
    if ($db->query($query) === TRUE) {
        header("Location: data_anggota.php");
    } else {
        echo "Data gagal diupdate. " . $db->error;
    }
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
</head>

<body>

    <?php include 'navdash.php'; ?>
    <a href="data_anggota.php" class="btn text-white" style="margin-top:50px;margin-left:100px;margin-bottom:-100px;background-color:#FF8F01;" ;>List Anggota</a>

    <section>
        <div class="container">
            <div class="row py-5">
                <h1 class="text-center mb-4" style="margin-top: 70px;">Edit User</h1>
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="nim" name="nim" value="<?= $nim ?>" readonly required>
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>" required>
                            </div>

                            <div class="mb-3" method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                                <label for="jurusan" class="form-label">Jurusan</label><br>
                                <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="jurusan">
                                    <option value="" selected>Pilih Jurusan</option>
                                    <option value="1" <?php if ($jurusan == '1') echo 'selected'; ?>>Teknik Mesin</option>
                                    <option value="2" <?php if ($jurusan == '2') echo 'selected'; ?>>Teknik Sipil</option>
                                    <option value="3" <?php if ($jurusan == '3') echo 'selected'; ?>>Teknik Elektro</option>
                                    <option value="4" <?php if ($jurusan == '4') echo 'selected'; ?>>Teknologi Informasi</option>
                                    <option value="5" <?php if ($jurusan == '5') echo 'selected'; ?>>Bahasa Inggris</option>
                                    <option value="6" <?php if ($jurusan == '6') echo 'selected'; ?>>Administrasi Niaga</option>
                                    <option value="7" <?php if ($jurusan == '7') echo 'selected'; ?>>Akuntansi</option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <div>
                                    <select class="form-select" name="status" id="status">
                                        <option value="Dosen" <?php if ($row['status'] === 'Dosen') echo 'selected'; ?>>Dosen</option>
                                        <option value="Mahasiswa" <?php if ($row['status'] === 'Mahasiswa') echo 'selected'; ?>>Mahasiswa</option>
                                    </select>
                                </div>
                            </div>



                            <div class="mb-3">
                                <label for="gender" class="form-label">Jenis Kelamin</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="laki-laki" value="L" <?php if ($row['gender'] == 'L') echo ' checked'; ?>>
                                    <label class="form-check-label">
                                        Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" id="perempuan" value="P" <?php if ($row['gender'] == 'P') echo ' checked'; ?>>
                                    <label class="form-check-label">
                                        Perempuan
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="no_tlpn" class="form-label">No Telepon</label>
                                <input type="text" class="form-control" id="no_tlpn" name="no_tlpn" value="<?= $no_tlpn ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat ?>" required>
                            </div>

                            <button type="update" class="btn text-white" style="background-color:#FF8F01;" name="update" value=update>Update</button>
                        </form>
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