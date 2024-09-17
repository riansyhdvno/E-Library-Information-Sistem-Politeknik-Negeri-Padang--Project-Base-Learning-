<?php
$id_transaksi   = isset($_GET['id']) ? $_GET['id'] : "";
$tgl_pengembalian    = isset($_GET['kembali']) ? $_GET['kembali'] : "";
$lambat         = isset($_GET['lambat']) ? (int)$_GET['lambat'] : 0; // Ubah menjadi integer

if ($lambat > 7) {
    echo "<script>alert('Anda Sudah lewat dari maksimal batas pengembalian, silahkan kembalikan buku kemudian pinjam kembali!'); window.location = 'peminjaman.php'</script>";
} else {
    include "koneksicom.php";

    $pecah          = explode("-", $tgl_pengembalian);

    // Periksa apakah format tanggal sesuai
    if (count($pecah) >= 3) {
        $next_7_hari    = mktime(0, 0, 0, $pecah[1], (int)$pecah[0] + 7, $pecah[2]);
        $hari_next      = date("Y-m-d", $next_7_hari);

        $update_tgl_pengembalian = $db->query("UPDATE peminjaman SET tgl_pengembalian='$hari_next' WHERE id='$id_transaksi'");

        if ($update_tgl_pengembalian) {
            echo "<script>alert('Peminjaman buku berhasil diperpanjang!'); window.location = 'peminjaman.php'</script>";
        } else {
            echo "<script>alert('Peminjaman buku gagal diperpanjang!'); window.location = 'peminjaman.php'</script>";
        }
    } else {
        echo "<script>alert('Format tanggal tidak sesuai!'); window.location = 'peminjaman.php'</script>";
    }
}
?>

<?php
require 'koneksicom.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo "ID: $id";

    $sql = "UPDATE peminjaman SET tgl_pengembalian = DATE_ADD(tgl_pengembalian, INTERVAL 7 DAY) WHERE id = '$id'";
    echo "Query: $sql";

    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully.";
        header("Location: data_peminjaman.php");
        exit(); // Pastikan tidak ada output setelah header dijalankan
    } else {
        echo "Error updating record: " . $db->error;
    }
} else {
    echo "ID not provided.";
}
?>
