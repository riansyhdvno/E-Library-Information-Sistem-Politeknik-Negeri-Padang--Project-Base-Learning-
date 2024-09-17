<?php
session_start();

// Cek apakah user sudah login atau belum
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'koneksicom.php';

// Ambil kode buku yang akan dikembalikan dari parameter URL
if (isset($_GET['kode_buku'])) {
    $kode_buku = $_GET['kode_buku'];

    // Perbarui status peminjaman buku menjadi 'Kembali'
    $query = "UPDATE peminjaman SET status = 'Kembali' WHERE kode_buku = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $kode_buku);
    $stmt->execute();

    // Jika perubahan berhasil
    if ($stmt->affected_rows > 0) {
        // Perbarui jumlah buku yang tersedia
        $update_available_books_query = $db->prepare("UPDATE books SET available_books = available_books + 1 WHERE kode_buku = ?");
        $update_available_books_query->bind_param("s", $kode_buku);
        $update_available_books_query->execute();
        $update_available_books_query->close();

        // Redirect ke halaman list_peminjaman.php setelah proses pengembalian berhasil
        header("Location: data_peminjaman.php");
        exit;
    } else {
        echo "Gagal melakukan pengembalian buku.";
    }
}
