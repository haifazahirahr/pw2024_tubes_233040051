<?php
require 'functions.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "
        <script>
            alert('user baru berhasil ditambahkan!');
        </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        label {
            display: block;
        }

        body {
            text-align: center;
            background-color: grey;
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

        .card {
            align-items: center;
        }
    </style>
</head>

<body>
    <h1 class="text-center">Halaman Registrasi</h1>
    <div class="container">
        <div class="card text-center mb-3" style="width: 30rem; height: 18rem;">
            <form action="" method="post">
                <div class="card">
                    <h5 class="card-title">Registrasi</h5>
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
                    <label for="password2">konfirmasi password :</label>
                    <input type="password" name="password2" id="password">
                </div>
                <div class="input">
                    <button type="submit" name="register" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
    <!-- <div class="container">
        <form action="" method="post">
            <ul>
                <li>
                    <label for="username">username :</label>
                    <input type="text" name="username" id="username">
                </li>
                <li>
                    <label for="password">password :</label>
                    <input type="password" name="password" id="password">
                </li>
                <li>
                    <label for="password2">konfirmasi password :</label>
                    <input type="password" name="password2" id="password">
                </li>
                <button type="submit" name="register">Register!</button>
            </ul>
        </form> -->
</body>

</html>