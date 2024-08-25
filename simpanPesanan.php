<?php
include 'db/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namaPemesan = $_POST['namaPemesan'];
    $noHp = $_POST['noHp'];
    $tanggalPesanan = $_POST['tanggalPesanan'];
    $jumlahPeserta = $_POST['jumlahPeserta'];
    $waktuPesanan = $_POST['waktuPesanan'];
    
    // Penginapan, Transportasi, dan Service
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
    $stmt = $conn->prepare("INSERT INTO pesanan (nama_pemesan, no_hp, tanggal_pesanan, jumlah_hari, penginapan, transportasi, service, jumlah_peserta, harga_paket, jumlah_tagihan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssiii", $namaPemesan, $noHp, $tanggalPesanan, $waktuPesanan, $penginapan, $transportasi, $service, $jumlahPeserta, $hargaPaket, $jumlahTagihan);

    // Menjalankan query dan memeriksa hasilnya
    if ($stmt->execute()) {
        // Menampilkan notifikasi sukses menggunakan SweetAlert
        echo "<script>alert('Data berhasil disimpan'); window.location.href = 'index.php';</script>";
    } else {
        // Menampilkan notifikasi gagal menggunakan SweetAlert
        echo "<script>alert('Data gagal disimpan'); window.location.href = 'formDaftar.php';</script>";
    }

    // Menutup prepared statement
    $stmt->close();
}

// Menutup koneksi database
$conn->close();
?>
