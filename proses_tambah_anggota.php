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
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $status = $_POST['status'];
    $gender = $_POST['gender'];
    $no_tlpn = $_POST['no_tlpn'];
    $alamat = $_POST['alamat'];

    // menyimpan query insert ke table tamu
    $query = "INSERT INTO members(nim, nama, jurusan, status, gender, no_tlpn, alamat) VALUES ('$nim','$nama','$jurusan','$status', '$gender', '$no_tlpn', '$alamat')";

    // cek apakah query sukses atau gagal
    if ($db->query($query) == TRUE) {
        // echo "Data Berhasil disimpan.";
        header("Location: data_anggota.php");
    } else {
        echo "Data gagal disimpan. " . $db->error;
    };
}
