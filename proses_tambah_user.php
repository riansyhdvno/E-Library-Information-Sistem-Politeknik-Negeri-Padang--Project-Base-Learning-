<?php
session_start();
// cek user tlh login apa blom
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// memanggil file koneksi 
require 'koneksicom.php';

if (isset($_POST['submit'])) {
    // mengambil nilai yang dikirimkan dari inputan form
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $level = $_POST['level'];


    // menyimpan query insert ke table tamu
    $query = "INSERT INTO user(email, nama, password, level) VALUES ('$email', '$nama', '$password', '$level')";

    // cek apakah query sukses atau gagal
    if ($db->query($query) == TRUE) {
        // echo "Data Berhasil disimpan.";
        header("Location: data_user.php");
    } else {
        echo "Data gagal disimpan. " . $db->error;
    };
}
