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

<table border="1" cellpadding="10" cellspacing="0" class="table table-bordered border-dark">
    <tr>
        <th scope="col">No.</th>
        <th scope="col">Gambar</th>
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
        <th scope="col">Akreditasi</th>
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
                <td>

                    <a href="ubah.php?id=<?= $row["id"]; ?>" class="badge text-bg-warning text-decoration-none">ubah</a> <a href="hapus.php?id=<?= $row["id"]; ?>" class="badge text-bg-danger text-decoration-none" onclick="return confirm('yakin ingin menghapus data?')">hapus</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>