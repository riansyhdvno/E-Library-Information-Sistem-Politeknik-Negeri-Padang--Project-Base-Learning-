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
        $sql = "DELETE FROM members WHERE nim = $nim";

        if ($db->query($sql) == TRUE) {
            header("Location: data_anggota.php");
        } else {
            echo " Data gagal dihapus. " . $db->error;
        }
    } else {
        echo "ID Tidak Ditemukan";
    }


    ?>