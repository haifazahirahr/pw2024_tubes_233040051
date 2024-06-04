<?php
session_start();
require 'functions.php';

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

// Cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            //set session
            $_SESSION["login"] = true;

            //cek remember me
            if (isset($_POST['remember'])) {
                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }
            header(("Location: index.php"));
            exit;
        }
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            text-align: center;
            background-color: lightslategray;
        }

        h1,
        .input {
            font-family: 'Times New Roman', Times, serif;
            color: black;
        }

        img {
            width: 700px;
        }

        .input input {
            margin: 4px;
            padding: 5px;
            font-size: small;
        }

        .input button {
            margin-top: 5px;
            padding: 5px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 40vh;
        }
    </style>
</head>

<body>
    <h1>Login Admin</h1>
    <img src="img/login.png">


    <div class="container">
        <div class="card text-center mb-3" style="width: 20rem; height: 17rem;">
            <form action="" method="post">
                <div class="card">
                    <h5 class="card-title">Login Admin</h5>
                </div>
                <?php if (isset($error)) : ?>
                    <h4 style="color:red; font-style:italic; font-size:small">username/password salah!</h4>
                <?php endif; ?>
                <p class="card-text">Silahkan Login terlebih dahulu!</p>
                <div class="input">
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="input">
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="input">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember Me</label>
                </div>
                <div class="input">
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
    <p>Don't have an account? <a href="registrasi.php">Sign up</a></p>

</body>

</html>