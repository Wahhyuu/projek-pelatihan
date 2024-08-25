<?php
include 'layout/header.php';
include 'db/koneksi.php';

// Query untuk mengambil data dari tabel paket
$queryPaket = "SELECT * FROM paket";
$resultPaket = $conn->query($queryPaket);
$packages = $resultPaket->fetch_all(MYSQLI_ASSOC);

// Query untuk mengambil data dari tabel video
$queryVideo = "SELECT * FROM videos";
$resultVideo = $conn->query($queryVideo);
$videos = $resultVideo->fetch_all(MYSQLI_ASSOC);
?>

<!-- Content -->
<div class="container mt-2">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <?php foreach ($packages as $package) : ?>
                    <div class="col-md-6 mb-3">
                        <div class="card" style="width: 22rem;">
                            <img class="card-img-top" src="image/<?= $package['image']; ?>" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?= $package['title']; ?></h5>
                                <p class="card-text"><?= $package['deskripsi']; ?></p>
                                <a href="formDaftar.php" class="btn btn-primary">Daftar Paket</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-4 d-flex flex-column">
            <?php foreach ($videos as $video) : ?>
                <div class="card mb-3 ms-auto" style="width: 25rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $video['title']; ?></h5>
                        <div class="embed-responsive">
                            <iframe width="100%" height="auto" src="<?= $video['video']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
include 'layout/footer.php';
?>