<?php
require 'koneksicom.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Ambil data dari formulir
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $kode_buku = isset($_POST['kode_buku']) ? $_POST['kode_buku'] : '';
    $judul = isset($_POST['judul']) ? $_POST['judul'] : '';
    $category_id = isset($_POST['category_id']) ? $_POST['category_id'] : '';
    $pengarang = isset($_POST['pengarang']) ? $_POST['pengarang'] : '';
    $penerbit = isset($_POST['penerbit']) ? $_POST['penerbit'] : '';
    $lokasi = isset($_POST['lokasi']) ? $_POST['lokasi'] : '';
    $tahun_terbit = isset($_POST['tahun_terbit']) ? $_POST['tahun_terbit'] : '';
    $jumlah_halaman = isset($_POST['jumlah_halaman']) ? $_POST['jumlah_halaman'] : '';
    $available_books = isset($_POST['available_books']) ? $_POST['available_books'] : '';
    $tottal_books = isset($_POST['tottal_books']) ? $_POST['tottal_books'] : '';
    $detail = isset($_POST['detail']) ? $_POST['detail'] : '';

    // Cek apakah form disubmit dengan benar
    if (empty($id)) {
        echo "Parameter tidak valid. ID: Tidak Ada";
        exit;
    }

    // Cek apakah id yang diterima adalah angka
    if (!is_numeric($id)) {
        echo "Parameter tidak valid. ID bukan angka";
        exit;
    }

    // Periksa apakah id yang diterima ada dalam database
    $checkIdQuery = "SELECT id FROM books WHERE id = ?";
    $checkIdStmt = $db->prepare($checkIdQuery);
    $checkIdStmt->bind_param("i", $id);
    $checkIdStmt->execute();
    $checkIdStmt->store_result();

    if ($checkIdStmt->num_rows <= 0) {
        echo "Parameter tidak valid. ID tidak ada.";
        exit;
    }

    // Periksa apakah ada gambar yang diunggah
    if (!empty($_FILES['gambar']['tmp_name'])) {
        $gambar_name = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $folder_path = "images/";

        $gambar_path = $folder_path . $gambar_name;

        // Pindahkan gambar ke folder yang ditentukan
        move_uploaded_file($gambar_tmp, $gambar_path);
    } else {
        // Jika gambar tidak diunggah, gunakan gambar lama dari database
        $getOldImageQuery = "SELECT gambar FROM books WHERE id=?";
        $stmtGetOldImage = $db->prepare($getOldImageQuery);
        $stmtGetOldImage->bind_param("i", $id);
        $stmtGetOldImage->execute();
        $stmtGetOldImage->store_result();

        if ($stmtGetOldImage->num_rows > 0) {
            $stmtGetOldImage->bind_result($gambarLama);
            $stmtGetOldImage->fetch();

            // Set nilai gambar_path dengan gambar lama jika tidak ada gambar baru yang diunggah
            $gambar_path = $gambarLama;
        } else {
            echo "Gagal mendapatkan gambar lama dari database.";
            exit;
        }
    }

    // Update data ke database
    $updateQuery = "UPDATE books SET kode_buku=?, judul=?, category_id=?, pengarang=?, penerbit=?, lokasi=?, tahun_terbit=?, jumlah_halaman=?, available_books=?, tottal_books=?, gambar=?, detail=? WHERE id=?";
    $stmt = $db->prepare($updateQuery);
    $stmt->bind_param("ssissssssisss", $kode_buku, $judul, $category_id, $pengarang, $penerbit, $lokasi, $tahun_terbit, $jumlah_halaman, $available_books, $tottal_books, $gambar_path, $detail, $id);

    if ($stmt->execute()) {
        header("Location: detail.php?id={$id}");
    } else {
        echo "Data gagal diupdate. Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Metode pengiriman data tidak valid atau form tidak disubmit dengan benar.";
}
