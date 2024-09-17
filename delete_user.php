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
    $sql = "DELETE FROM user WHERE id_user = $id_user";

    if ($db->query($sql) == TRUE) {
        header("Location: data_user.php");
    } else {
        echo " Data gagal dihapus. " . $db->error;
    }
} else {
    echo "ID Tidak Ditemukan";
}
