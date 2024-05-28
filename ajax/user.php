<?php
require '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM sma
WHERE
nama LIKE '%$keyword%'OR
alamat LIKE '%$keyword%'OR
akreditasi LIKE '%$keyword%'
";
$sma = query($query);
?>

<section id="SMA">
    <div class="container">
        <div class="row fs-5 SMA">
            <div class="col text-center">
                <h2 class="SMA">Sekolah Menengah Atas</h2>
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
                            <p class="card-text"><?= $s['alamat']; ?></p>
                            <p class="card-text"><?= $s['akreditasi']; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>