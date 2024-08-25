<?php
include '../db/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $namaPemesan = $_POST['namaPemesan'];
    $noHp = $_POST['noHp'];
    $tanggalPesanan = $_POST['tanggalPesanan'];
    $jumlahPeserta = $_POST['jumlahPeserta'];
    $waktuPesanan = $_POST['waktuPesanan'];

    // Mengatur nilai default untuk checkbox
    $penginapan = isset($_POST['hargaPenginapan']) ? 'Y' : 'N';
    $transportasi = isset($_POST['hargaTransportasi']) ? 'Y' : 'N';
    $service = isset($_POST['hargaService']) ? 'Y' : 'N';

    $hargaPenginapan = ($penginapan == 'Y') ? 1000000 : 0;
    $hargaTransportasi = ($transportasi == 'Y') ? 1200000 : 0;
    $hargaService = ($service == 'Y') ? 500000 : 0;

    // Total Harga Paket
    $hargaPaket = $hargaPenginapan + $hargaTransportasi + $hargaService;
    $jumlahTagihan = $hargaPaket * $waktuPesanan * $jumlahPeserta;



    // Menyiapkan query SQL untuk menyimpan data ke database menggunakan prepared statements
    $query = "UPDATE pesanan 
            SET nama_pemesan = ?, no_hp = ?, tanggal_pesanan = ?, jumlah_hari = ?, penginapan = ?, transportasi = ?, service = ?, jumlah_peserta = ?, harga_paket = ?, jumlah_tagihan = ? 
            WHERE id = ?";
    $stmt = $conn->prepare($query);

    // Bind parameters
    $stmt->bind_param("sssssssiiii", $namaPemesan, $noHp, $tanggalPesanan, $waktuPesanan, $penginapan, $transportasi, $service, $jumlahPeserta, $hargaPaket, $jumlahTagihan, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil diperbarui'); window.location.href = '../daftarPesanan.php';</script>";
    } else {
        error_log("Error: " . $stmt->error);
        echo "<script>alert('Gagal memperbarui data'); window.location.href = 'edit.php?id=$id';</script>";
    }
    $stmt->close();
}
