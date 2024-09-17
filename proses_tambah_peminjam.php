<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'koneksicom.php';

if (isset($_POST['submit'])) {
    // Memeriksa jumlah peminjaman saat ini untuk NIM tertentu
    $nim = $_POST['nim'];
    $check_query = "SELECT COUNT(*) as total_peminjaman FROM peminjaman WHERE nim = ? AND status = 'pinjam'";

    // Menggunakan prepared statement
    $check_stmt = $db->prepare($check_query);
    $check_stmt->bind_param("s", $nim);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        $peminjaman_data = $check_result->fetch_assoc();
        $total_peminjaman = (int)$peminjaman_data['total_peminjaman'];

        // Memeriksa apakah jumlah peminjaman sudah mencapai batas maksimal
        if ($total_peminjaman >= 3) {
            echo "Maaf, NIM ini sudah mencapai batas maksimal peminjaman buku.";
            exit; // Menghentikan proses jika sudah mencapai batas
        } else {
            // Lakukan proses peminjaman jika belum mencapai batas
            $nama = $_POST['nama'];
            $kode_buku = $_POST['kode_buku'];
            $judul_buku = $_POST['judul_buku'];
            $tgl_pinjam = $_POST['tgl_pinjam'];
            $tgl_pengembalian = $_POST['tgl_pengembalian'];
            $status = $_POST['status'];

            // Check availability of the book
            $availability_query = "SELECT available_books FROM books WHERE kode_buku = ?";
            $availability_stmt = $db->prepare($availability_query);
            $availability_stmt->bind_param("s", $kode_buku);
            $availability_stmt->execute();
            $availability_result = $availability_stmt->get_result();

            if ($availability_result->num_rows > 0) {
                $book_data = $availability_result->fetch_assoc();
                $tersedia = $book_data['available_books'];

                // Check if the book is available
                if ($tersedia > 0) {
                    // Proceed with the transaction
                    $insertquery = "INSERT INTO peminjaman (nim, nama, kode_buku, judul_buku, tgl_pinjam, tgl_pengembalian, status) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?)";

                    // Menggunakan prepared statement
                    $insert_stmt = $db->prepare($insertquery);
                    $insert_stmt->bind_param("sssssss", $nim, $nama, $kode_buku, $judul_buku, $tgl_pinjam, $tgl_pengembalian, $status);

                    // Cek apakah query sukses atau gagal
                    if ($insert_stmt->execute()) {
                        // Update the book availability
                        $updatequery = "UPDATE books SET available_books = available_books - 1 WHERE kode_buku = ?";
                        $update_stmt = $db->prepare($updatequery);
                        $update_stmt->bind_param("s", $kode_buku);

                        if ($update_stmt->execute()) {
                            // Redirect after a successful transaction
                            header("Location: data_peminjaman.php");
                            exit;
                        } else {
                            echo "Error updating book availability: " . $db->error;
                        }
                    } else {
                        echo "Data gagal disimpan " . $db->error;
                    }
                } else {
                    // Book is not available
                    echo "Maaf, buku dengan ISSN '$kode_buku' tidak tersedia.";
                }
            } else {
                // Error fetching book availability
                echo "Error fetching book availability: " . $db->error;
            }
        }
    } else {
        echo "Error dalam memeriksa jumlah peminjaman.";
        exit; // Menghentikan proses jika terjadi kesalahan
    }
}
