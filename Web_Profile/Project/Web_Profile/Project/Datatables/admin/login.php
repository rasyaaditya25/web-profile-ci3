<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login PustakaKU</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        /* Custom styling */
        body {
            background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
            height: 100vh;
        }

        .login-card {
            margin-top: 150px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 40px;
        }

        .form-control {
            border-radius: 30px;
            margin-bottom: 20px;
        }

        .btn-user {
            background-color: #4e73df;
            color: white;
            border-radius: 30px;
        }

        .btn-user:hover {
            background-color: #2e59d9;
        }

        .text-gray-900 {
            color: #4e73df;
        }

        .h4 {
            font-weight: bold;
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="card login-card o-hidden border-0 shadow-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center mb-4">
                                    <h1 class="h4 text-gray-900">Login Admin Pustaka<sup>KU</sup></h1>
                                </div>
                                <form method="post" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username"
                                            placeholder="Masukan Username..." required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            placeholder="Masukkan Password..." required>
                                    </div>
                                    <button class="btn btn-user btn-block" type="submit" name="login" value="login">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Check if the login button is pressed
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Check user credentials in the database
        $cek = $koneksi->query("SELECT * FROM user WHERE username='$username' AND password='$password'");

        // Check if the user is found
        if ($cek->num_rows == 1) {
            $user = $cek->fetch_assoc();

            // Check if the user is an admin
            if ($user['level'] == 'Admin') {
                // Save user data in session
                $_SESSION["user"] = $user;
                echo "<script>alert('Anda sukses login sebagai Admin');</script>";
                echo "<script>location='index.php';</script>";
            } else {
                echo "<script>alert('Anda bukan Admin');</script>";
                echo "<script>location='login.php';</script>";
            }
        } else {
            // If account is not found
            echo "<script>alert('Username atau password salah');</script>";
            echo "<script>location='login.php';</script>";
        }
    }
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>