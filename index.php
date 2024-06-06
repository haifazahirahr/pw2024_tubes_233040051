<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$sma = query("SELECT a.*, b.nama AS nama_kategori FROM sma a JOIN kategori b ON a.kategori_id=b.id");
$kategori = query("SELECT * FROM kategori");
if (isset($_POST["cari"])) {
    $sma = cari($_POST["keyword"]);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMA Di Purwakarta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <style>
        @media print {

            .logout,
            .navbar,
            .aksi {
                display: none;
            }
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Daftar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="tambah.php" class="btn btn-primary">Tambah data SMA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cetak.php" target="_blank">Cetak</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Lainnya
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                    </li>
                    <li><a class="dropdown-item" href="index2.php" target="_blank">Halaman user</a>
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
    <div class="container">

        <h1>SMA Purwakarta</h1>


        <a href="logout.php" class="logout btn btn-danger">Logout</a>
        <br><br>
        <div id="container">

            <table border="1" cellpadding="10" cellspacing="0" class="table table-bordered border-dark">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Akreditasi</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Instagram</th>
                    <th scope="col">Aksi</th>
                </tr>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($sma as $row) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td>
                                <img src="img/<?= $row['gambar']; ?>" width="100px" height="100px">
                            </td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['alamat']; ?></td>
                            <td><?= $row['akreditasi']; ?></td>
                            <td><?= $row['nama_kategori']; ?></td>
                            <td><?= $row['instagram']; ?></td>
                            <td class="aksi">

                                <a href="ubah.php?id=<?= $row["id"]; ?>" class="badge text-bg-warning text-decoration-none">ubah</a> <a href="hapus.php?id=<?= $row["id"]; ?>" class="badge text-bg-danger text-decoration-none" onclick="return confirm('yakin ingin menghapus data?')">hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="js/script.js"></script>
</body>

</html>