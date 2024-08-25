<?php
include 'db/koneksi.php';
include 'cekLogin.php';
include 'layout/header.php';
?>

<div class="container mt-2">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Phone</th>
                <th scope="col">Tanggal Pesan</th>
                <th scope="col">Jumlah Peserta</th>
                <th scope="col">Jumlah Hari</th>
                <th scope="col">Akomodasi</th>
                <th scope="col">Transportasi</th>
                <th scope="col">Service/Makanan</th>
                <th scope="col">Harga Paket</th>
                <th scope="col">Total Tagihan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * from pesanan";
            $result = mysqli_query($conn, $query);
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo htmlspecialchars($row['nama_pemesan']); ?></td>
                    <td><?php echo htmlspecialchars($row['no_hp']); ?></td>
                    <td><?php echo htmlspecialchars($row['tanggal_pesanan']); ?></td>
                    <td><?php echo htmlspecialchars($row['jumlah_peserta']); ?></td>
                    <td><?php echo htmlspecialchars($row['jumlah_hari']); ?></td>
                    <td><?php echo htmlspecialchars($row['penginapan']); ?></td>
                    <td><?php echo htmlspecialchars($row['transportasi']); ?></td>
                    <td><?php echo htmlspecialchars($row['service']); ?></td>
                    <td><?php echo 'Rp. ' . number_format($row['harga_paket'], 2, ',', '.'); ?></td>
                    <td><?php echo 'Rp. ' . number_format($row['jumlah_tagihan'], 2, ',', '.'); ?></td>
                    <td>
                        <a href="editPesanan.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="./script/hapusPesanan.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php $no++;
            endwhile; ?>
        </tbody>
    </table>
</div>

<?php
include 'layout/footer.php';
?>