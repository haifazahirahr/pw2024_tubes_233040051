<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';

$id = $_GET["id"];
$sklh = query("SELECT * FROM sma WHERE id = $id")[0];

if (isset($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diedit!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal diedit!');
            document.location.href = 'index.php';
        </script>
        ";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container col-8">
        <h1>Edit Data!</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $sklh["id"]; ?>">
            <input type="hidden" name="gambarLama" value="<?= $sklh["gambar"]; ?>">

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <img src="img/<?= $sklh['gambar'];  ?>" width="40px" height="40px">
                <input type="file" class="form-control" id="gambar" name="gambar">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required value="<?= $sklh["nama"]; ?>">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required value="<?= $sklh["alamat"]; ?>">
            </div>
            <div class="mb-3">
                <label for="akreditasi" class="form-label">Akreditasi</label>
                <input type="text" class="form-control" id="akreditasi" name="akreditasi" required value="<?= $sklh["akreditasi"]; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Edit</button>
        </form>


    </div>

</body>

</html>