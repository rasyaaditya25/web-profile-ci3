<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Web Profile</title>
    <link href="assets/img/logo.png" rel="icon">

    <!-- Link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1f6feb 0%, #0d1117 100%);
            font-family: 'Nunito', sans-serif;
            color: #ffffff;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background 0.5s ease;
        }

        .container {
            max-width: 500px;
            margin-top: 5%;
            animation: fadeIn 1s ease-in-out;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.85);
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card-body {
            padding: 35px;
        }

        .text-center h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #1f6feb;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #b3b3b3;
        }

        .form-control {
            border-radius: 10px;
            padding: 14px;
            border: 1px solid #444;
            background-color: #ffffff;
            color: #000000;
            margin-bottom: 15px;
            box-sizing: border-box;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            border-color: #1f6feb;
            box-shadow: 0 0 8px rgba(31, 111, 235, 0.5);
            background-color: #f1f1f1;
        }

        .form-control::placeholder {
            color: #888;
            transition: opacity 0.3s ease;
        }

        .form-control:focus::placeholder {
            opacity: 0;
        }

        .btn-primary {
            background-color: #1f6feb;
            border-radius: 10px;
            border: none;
            padding: 14px 20px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #164da9;
            box-shadow: 0 5px 15px rgba(31, 111, 235, 0.3);
            transform: scale(1.05);
        }

        .btn-secondary {
            background-color: #6c757d;
            border-radius: 10px;
            padding: 12px 20px;
            width: 100%;
            text-align: center;
            margin-top: 20px;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            transform: scale(1.05);
        }

        .alert {
            margin-top: 20px;
            font-size: 16px;
            text-align: center;
        }

        .alert .btn-close {
            background-color: transparent;
            border: none;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #777;
        }

        .footer a {
            color: #1f6feb;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Keyframe for fade-in effect */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card o-hidden shadow-lg my-5">
            <div class="card-body">
                <div class="text-center">
                    <h1 class="h4 mb-4">Register Web<sup>Profile</sup></h1>
                </div>
                <form method="post" class="user">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukan Username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukan Password"
                            required>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit" name="register" value="register">
                        Register
                    </button>

                    <?php
                    if (isset($_POST['register'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        $insert = $koneksi->query("INSERT INTO admin (username, password) 
                        VALUES('$username', '$password')");

                        if ($insert) {
                            echo "
                            <div class='alert alert-success alert-dismissible fade show mt-3' role='alert'>
                                <strong>Success!</strong> Anda Berhasil Register.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            <script>setTimeout(function() { window.location = 'index.php'; }, 2000);</script>";
                        } else {
                            echo "
                            <div class='alert alert-danger alert-dismissible fade show mt-3' role='alert'>
                                <strong>Error!</strong> Anda Gagal Register.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            <script>setTimeout(function() { window.location = 'Register.php'; }, 2000);</script>";
                        }
                    }
                    ?>

                    <a href="index.php" class="btn btn-secondary mt-3">Back</a>
                </form>
                <hr>
            </div>
        </div>
    </div>

    <!-- Link JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>