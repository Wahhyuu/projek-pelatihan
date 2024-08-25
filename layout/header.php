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

        .active {
            font-weight: bold;
            color: #fff;
            /* Sesuaikan warna sesuai tema */
        }
    </style>
    <title>Wisata Barabai</title>
</head>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Tentukan halaman aktif berdasarkan skrip saat ini
$current_page = basename($_SERVER['PHP_SELF']);
$pages = [
    'index.php' => 'Beranda',
    'formDaftar.php' => 'Daftar Paket Wisata',
    'daftarPesanan.php' => 'Modifikasi Pesanan',
];
?>

<body>
    <!-- Header -->
    <div class="container">
        <header class=" bg-custom text-center">
            <h1 class="h1">Selamat Datang di Desa Wisata Ilung</h1>
            <img src="image/Nateh.jpeg" width="100%" height="300" class="header-image" alt="Wisata Nateh">
            <nav class="navbar navbar-expand-lg bg-custom">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <?php foreach ($pages as $file => $title) : ?>
                                <?php if ($file === 'daftarPesanan.php' && (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)) continue; ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo ($current_page === $file) ? 'active' : ''; ?>" href="<?php echo $file; ?>"><?php echo $title; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) : ?>
                                <li class="nav-item ms-auto">
                                    <a href="logout.php" class="nav-link <?php echo ($current_page === 'logout.php') ? 'active' : ''; ?>">Logout</a>
                                </li>
                            <?php else : ?>
                                <li class="nav-item ms-auto">
                                    <a href="loginAdmin.php" class="nav-link <?php echo ($current_page === 'loginAdmin.php') ? 'active' : ''; ?>">Login</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </div>