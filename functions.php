<?php
// koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040051');
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data)
{
    global $conn;
    $gambar = htmlspecialchars($data["gambar"]);
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $akreditasi = htmlspecialchars($data["akreditasi"]);

    $query = "INSERT INTO sma
    VALUES
    (NULL, ' $gambar', '$nama', '$alamat', '$akreditasi')
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM sma WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $gambar = htmlspecialchars($data["gambar"]);
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $akreditasi = htmlspecialchars($data["akreditasi"]);

    $query = "UPDATE sma SET
    gambar = '$gambar',
    nama = '$nama',
    alamat = '$alamat',
    akreditasi = '$akreditasi'
    WHERE id = $id
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM sma
    WHERE
    nama LIKE '%$keyword%'OR
    alamat LIKE '%$keyword%'OR
    akreditasi LIKE '%$keyword%'
    ";

    return query($query);
}
