<?php
require 'functions.php';
$sma = query("SELECT * FROM sma WHERE kategori_id = 1");

if (isset($_POST["cari"])) {
    $sma = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <title>SMA Purwakarta dengan Akreditasi A</title>
</head>

<body id="Home">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Rekomendasi SMA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index2.php#Kategori">Kategori</a>
                    </li>
                    <form action="" method="post" class="d-flex" role="search">
                        <input type="text" name="keyword" autofocus class="form-control me-2" placeholder="Search..." autocomplete="off" aria-label="Search" id="keyword">
                        <button class="btn btn-outline-success" type="submit" name="cari" id="tombol-cari">Search</button>
                    </form>
            </div>
        </div>
    </nav>
    </nav>
    <!-- Akhir Navbar -->
    <!-- SMA -->
    <section id="SMA">
        <div class="container" id="container">
            <div class="row fs-5 SMA">
                <div class="col text-center">
                    <h2 class="SMA">Sekolah Menengah Atas Negeri</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php foreach ($sma as $s) : ?>
                <div class="card mb-3" style="max-width: 1000px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="img/<?= $s['gambar']; ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $s['nama']; ?></h5>
                                <p class="card-text"><?= $s['alamat']; ?></p>
                                <p class="card-text">akreditasi: <?= $s['akreditasi']; ?></p>
                                <p class="card-text"><a href="<?= $s['instagram']; ?>" class="card-link">instagram</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- Akhir SMA -->
    <script src="js/script3.js"></script>
</body>