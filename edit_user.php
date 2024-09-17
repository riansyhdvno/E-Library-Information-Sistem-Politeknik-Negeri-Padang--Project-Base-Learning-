<?php
session_start();
// cek user tlh login apa blom
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'koneksicom.php';

if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];
    $query = "SELECT * FROM user WHERE id_user = $id_user";
    $result = $db->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $nama = $row['nama'];
        $password = $row['password'];
        $level = $row['level'];
    } else {
        echo "Data id " . $id_user . "Tidak Ditemukan";
    }
} else {
    echo "Parameter Tidak Ditemukan";
    exit;
}

if (isset($_POST['update'])) {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    $query = "UPDATE user SET email='$email', nama='$nama', password = '$password', level = '$level' WHERE id_user = '$id_user'";

    // cek apakah update sukses atau gagal
    if ($db->query($query) === TRUE) {
        header("Location: data_user.php");
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
    <a href="data_user.php" class="btn text-white" style="margin-top:50px;margin-left:100px;margin-bottom:-100px;background-color:#FF8F01;" ;>List User</a>
    <section>
        <div class="container">
            <div class="row py-5">
                <h1 class="text-center mb-4" style="margin-top: 70px;">Edit User</h1>
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= $email ?>" readonly required>
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" name="password" value="<?= $password ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="level" class="form-label">Level</label>
                                <input type="text" class="form-control" id="level" name="level" value="<?= $level ?>" required>
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