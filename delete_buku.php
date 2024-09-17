<?php
require 'koneksicom.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM books WHERE id = $id";

    if ($db->query($sql) === TRUE) {
        // Redirect kembali ke halaman sebelumnya
        echo '<script>
                alert("Data berhasil dihapus");
                window.location.href = document.referrer;
              </script>';
        exit;
    } else {
        echo "Data gagal dihapus: " . $db->error;
    }
} else {
    echo "ID tidak ditemukan";
}
