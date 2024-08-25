<?php
include 'db/koneksi.php';
$id = $_GET['id'];
$query = "SELECT * FROM pesanan WHERE id=$id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <style>
        .bg-custom {
            background-color: #9ec0ed;
        }
    </style>
    <title>Wisata Barabai</title>
    <script src="script/daftarPaket.js"></script>
</head>

<body>
    <?php include 'layout/header.php'; ?>
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h3>Edit Pesanan</h3>
            </div>
            <div class="card-body">
                <form id="pesananForm" action="script/edit.php" method="post">
                    <div class="mb-3">
                        <label for="namaPesanan" class="form-label">Nama Pemesan:</label>
                        <input type="text" name="namaPemesan" class="form-control" id="namaPesanan" value="<?php echo htmlspecialchars($data['nama_pemesan']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="noHp" class="form-label">Nomor HP/Telepon:</label>
                        <input type="number" name="noHp" class="form-control" id="noHp" value="<?php echo htmlspecialchars($data['no_hp']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalPesanan" class="form-label">Tanggal Pesanan:</label>
                        <input type="date" name="tanggalPesanan" class="form-control" id="tanggalPesanan" value="<?php echo htmlspecialchars($data['tanggal_pesanan']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="waktuPesanan" class="form-label">Waktu Pelaksaan Perjalanan:</label>
                        <input type="number" name="waktuPesanan" class="form-control" id="waktuPesanan" value="<?php echo htmlspecialchars($data['jumlah_hari']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <p>Pelayanan Paket Perjalanan:</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check mb-5">
                                    <label class="form-check-label" for="penginapan">Penginapan (Rp 1.000.000)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input class="form-check-input ml-3" type="checkbox" value="1000000" id="penginapan" name="hargaPenginapan" <?php echo $data['penginapan'] === 'Y' ? 'checked' : ''; ?>>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check mb-5">
                                    <label class="form-check-label" for="transportasi">Transportasi (Rp 1.200.000)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input class="form-check-input ml-3" type="checkbox" value="1200000" id="transportasi" name="hargaTransportasi" <?php echo $data['transportasi'] === 'Y' ? 'checked' : ''; ?>>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check mb-5">
                                    <label class="form-check-label" for="service">Service/Makanan (Rp 500.000)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input class="form-check-input ml-3" type="checkbox" value="500000" id="service" name="hargaService" <?php echo $data['service'] === 'Y' ? 'checked' : ''; ?>>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="jumlahPeserta" class="form-label">Jumlah Peserta:</label>
                        <input type="text" name="jumlahPeserta" class="form-control" id="jumlahPeserta" value="<?php echo htmlspecialchars($data['jumlah_peserta']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="hPaket" class="form-label">Harga Paket Perjalanan:</label>
                        <input type="text" name="hPaket" class="form-control" id="hPaket" value="<?php echo 'Rp. ' . number_format($data['harga_paket'], 2, ',', '.'); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="jTagihan" class="form-label">Jumlah Tagihan:</label>
                        <input type="text" name="jTagihan" class="form-control" id="jTagihan" value="<?php echo 'Rp. ' . number_format($data['jumlah_tagihan'], 2, ',', '.'); ?>" readonly>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-primary" onclick="hitungTotal()">Hitung</button>
                    <button type="button" class="btn btn-danger" onclick="resetForm()">Reset</button>
                </form>
            </div>
        </div>
    </div>
    <?php include 'layout/footer.php'; ?>
    <script src="bootstrap/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>