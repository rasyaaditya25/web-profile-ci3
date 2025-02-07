<?php
include 'admin/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register PustakaKU</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600;700&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(90deg, #6a11cb 0%, #2575fc 100%);
            font-family: 'Nunito', sans-serif;
            color: #333;
        }

        .container {
            max-width: 500px;
            margin-top: 5%;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 35px;
        }

        .text-center h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #007bff;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn-primary {
            background-color: #007bff;
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
            background-color: #0056b3;
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #777;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .card-body {
            background-color: #ffffff;
            border-radius: 20px;
        }

        /* Style untuk dropdown (privilage/level) */
        select.form-control {
            height: 50px;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-size: 16px;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="card o-hidden shadow-lg my-5">
            <div class="card-body">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register Akun Pustaka<sup>KU</sup></h1>
                </div>
                <form method="post" class="user">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Masukan Nama lengkap" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Masukan Email" required>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="number" class="form-control" name="telepon" placeholder="Masukan No.telepon"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" placeholder="Masukan alamat" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukan Username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukan Password"
                            required>
                    </div>
                    <div class="form-group">
                        <label>Privilage/Level</label>
                        <select name="level" class="form-control" required>
                            <option value="Admin">Admin</option>
                            <option value="User">User</option>
                        </select>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit" name="register" value="register">
                        Register Account
                    </button>
                </form>
                <hr>
            </div>
        </div>

    </div>

    <?php
    if (isset($_POST['register'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];
        $alamat = $_POST['alamat'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        $insert = $koneksi->query("INSERT INTO user (nama_lengkap,email_user,no_telepon,alamat,username,password,level) 
        VALUES('$nama','$email','$telepon','$alamat','$username','$password','$level')");

        if ($insert) {
            echo "<script>alert('Anda Berhasil Register');</script>";
            echo "<script>location='index.php';</script>";
        } else {
            echo "<script>alert('Anda Gagal Register');</script>";
            echo "<script>location='Register.php';</script>";
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