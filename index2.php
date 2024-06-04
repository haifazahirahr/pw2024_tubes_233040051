<?php
require 'functions.php';
$sma = query("SELECT * FROM sma");

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
                        <a class="nav-link active" aria-current="page" href="#Home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#About">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Kategori">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#SMA">Sekolah</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="login.php">login</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <form action="" method="post" class="d-flex" role="search">
                    <input type="text" name="keyword" autofocus class="form-control me-2" placeholder="Search..." autocomplete="off" aria-label="Search" id="keyword">
                    <button class="btn btn-outline-success" type="submit" name="cari" id="tombol-cari">Search</button>
                </form>
            </div>
        </div>
    </nav>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Jumbotron -->
    <section class="jumbotron text-center">
        <img src="img/logo2.png" class="card-img-top" alt="...">
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="rgb(74, 98, 122)" fill-opacity="1" d="M0,32L48,64C96,96,192,160,288,186.7C384,213,480,203,576,170.7C672,139,768,85,864,85.3C960,85,1056,139,1152,149.3C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </section>
    <!-- Akhir Jumbotron -->

    <!-- About -->
    <section id="About">
        <div class="container">
            <div class="row fs-5 SMA">
                <div class="col text-center">
                    <h2 class="SMA">About SMA Purwakarta</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card mb-3" style="max-width: 1000px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="img/SMA.png" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-center">SMA Rekomendasi di Purwakarta</h5>
                            <p class="card-text">Berikut daftar lengkap Sekolah Menengah Pertama (SMA) untuk pelajar yang ada di Kab. Purwakarta. Dalam daftar berikut terdapat alamat, serta akreditasi terkait SMA yang sedang kamu cari di daerah Kab. Purwakarta.</p>
                            <p class="card-text">Purwakarta mempunyai banyak SMAN yang berakreditasi A, Berikut berdasarkan urutan SMA Favorite di Kab. Purwakarta.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#bdd5e2" fill-opacity="1" d="M0,32L40,58.7C80,85,160,139,240,138.7C320,139,400,85,480,90.7C560,96,640,160,720,170.7C800,181,880,139,960,112C1040,85,1120,75,1200,58.7C1280,43,1360,21,1400,10.7L1440,0L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
        </svg>
    </section>
    <!-- Akhir About -->

    <!-- Kategori -->
    <section id="Kategori">
        <div class="container">
            <div class="row fs-5 SMA">
                <div class="col text-center">
                    <h2 class="SMA">Kategori</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="card" style="width: 18rem;">
                <img src="img/SMAN.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Kategori</h5>
                    <p class="card-text">Sekolah Menengah Atas Negeri.</p>
                    <a href="sman.php" class="btn btn-primary">SMAN</a>
                </div>
            </div>
            <div class="card ms-2" style="width: 18rem;">
                <img src="img/SMAS.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Kategori</h5>
                    <p class="card-text">Sekolah Menengah Atas Swasta.</p>
                    <a href="smas.php" class="btn btn-primary">SMAS</a>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="rgb(74, 98, 122)" fill-opacity="1" d="M0,32L48,64C96,96,192,160,288,186.7C384,213,480,203,576,170.7C672,139,768,85,864,85.3C960,85,1056,139,1152,149.3C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
        <!-- Akhir Kategori -->

        <!-- SMA -->
        <section id="SMA">
            <div class="container" id="container">
                <div class="row fs-5 SMA">
                    <div class="col text-center">
                        <h2 class="SMA">Sekolah Menengah Atas</h2>
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
                                        <p class="card-text"><a href="<?= $s['instagram']; ?>" class="card-link" target="_blank">instagram</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="rgb(74, 98, 122)" fill-opacity="1" d="M0,32L48,64C96,96,192,160,288,186.7C384,213,480,203,576,170.7C672,139,768,85,864,85.3C960,85,1056,139,1152,149.3C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </section>
        <!-- Akhir SMA -->




        <!-- Footer -->
        <footer class="text-white text-center pb-5">
            <p>
                Created with <i class="bi bi-heart-fill"></i> by
                <a href="https://www.instagram.com/haifazahirah_/" class="text-white fw-bold">Haifa Zahirah Ramdhan</a>
            </p>
        </footer>
        <!-- Akhir Footer -->
        <script src="js/script2.js"></script>
</body>

</html>