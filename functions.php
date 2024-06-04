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

    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $akreditasi = htmlspecialchars($data["akreditasi"]);
    $instagram = htmlspecialchars($data["instagram"]);
    $kategori_id = htmlspecialchars($data["kategori_id"]);


    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO sma (id, gambar, nama, alamat, akreditasi, instagram, kategori_id) VALUES
    (NULL, '$gambar', '$nama', '$alamat', '$akreditasi', '$instagram', '$kategori_id')
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('apa yang kamu upload bukan gambar!');
        </script>";
        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar!');
        </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
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
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $akreditasi = htmlspecialchars($data["akreditasi"]);
    $instagram = htmlspecialchars($data["instagram"]);
    $kategori_id = htmlspecialchars($data["kategori_id"]);

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


    $query = "UPDATE sma SET
    gambar = '$gambar',
    nama = '$nama',
    alamat = '$alamat',
    akreditasi = '$akreditasi',
    instagram = '$instagram',
    kategori_id = '$kategori_id'
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
    akreditasi LIKE '%$keyword%'OR
    instagram LIKE '%$keyword%'
    ";

    return query($query);
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "
        <script>
            alert('username sudah terdaftar!');
        </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "
        <script>
            alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES(NULL, '$username', '$password')");

    return mysqli_affected_rows($conn);
}
