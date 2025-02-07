<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Web Profile</title>
    <link href="assets/img/logo.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1f6feb 0%, #0d1117 100%);
            font-family: 'Nunito', sans-serif;
            color: #ffffff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            transition: background 0.5s ease;
        }

        .login-container {
            background-color: rgba(0, 0, 0, 0.85);
            border-radius: 20px;
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.4);
            padding: 40px;
            max-width: 420px;
            width: 100%;
            transition: transform 0.3s ease;
        }

        .login-container:hover {
            transform: scale(1.02);
        }

        h1 {
            font-size: 36px;
            font-weight: 700;
            color: #1f6feb;
            margin-bottom: 30px;
            text-align: center;
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
    </style>
</head>

<body>
    <div class="login-container">
        <h1><b>Login Admin</b></h1>
        <form method="POST">
            <div class="form-group">
                <label>Nama Pengguna</label>
                <input type="text" name="username" class="form-control" placeholder="Masukan Username" required>
            </div>
            <div class="form-group">
                <label>Kata Sandi</label>
                <input type="password" name="password" class="form-control" placeholder="Masukan Password" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>

        <!-- Alert Section -->
        <?php
        if (isset($_POST["login"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Query to check user credentials in the database
            $cek = $koneksi->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");

            // Check if the user exists
            if ($cek->num_rows == 1) {
                $admin = $cek->fetch_assoc();

                // Save user data in session
                $_SESSION["admin"] = $admin;

                // Display success alert
                echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Login berhasil!</strong> Anda akan diarahkan ke halaman admin.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                echo "<script>setTimeout(function(){ location='admin/index.php'; }, 3000);</script>";
            } else {
                // If account is not found
                echo "
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Login gagal!</strong> Username atau password salah.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            }
        }
        ?>
        <!-- End of Alert Section -->
    </div>

    <!-- Link JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>