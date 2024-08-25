<?php
include '../db/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM pesanan WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href = '../daftarPesanan.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data'); window.location.href = '../daftarPesanan.php';</script>";
    }
    $stmt->close();
} else {
    header('Location: daftarPesanan.php');
    exit();
}

$conn->close();
?>
