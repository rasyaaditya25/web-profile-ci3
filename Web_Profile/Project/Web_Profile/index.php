<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login - Web Profile</title>
    <link href="assets/img/logo.png" rel="icon">
    <!-- Link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1f6feb 0%, #0d1117 100%);
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 40px rgba(0, 0, 0, 0.5);
            text-align: center;
            width: 100%;
            max-width: 500px;
            transform: translateY(-10%);
            transition: transform 0.5s ease-out;
        }

        .container:hover {
            transform: translateY(0);
        }

        .logo-text {
            font-size: 70px;
            font-weight: 700;
            color: #1f6feb;
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in;
        }

        .logo-text sup {
            font-size: 0.5em;
            vertical-align: super;
        }

        p {
            color: #ddd;
            font-size: 18px;
            margin-bottom: 30px;
            line-height: 1.5;
            opacity: 0;
            animation: fadeIn 1.5s ease-in forwards;
            animation-delay: 0.5s;
        }

        .btn-custom {
            width: 100%;
            padding: 14px;
            margin: 12px 0;
            border-radius: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #ffffff;
            transition: all 0.3s ease-in-out;
            text-decoration: none;
        }

        .btn-primary {
            background-color: #1f6feb;
            border: none;
            position: relative;
            transition: background-color 0.4s, transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
            position: relative;
            transition: background-color 0.4s, transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        /* Efek Hover untuk tombol Login Admin */
        .btn-primary:hover {
            background-color: #1f6feb;
            /* Tetap warna biru saat hover */
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(31, 111, 235, 0.3);
        }

        /* Efek Hover untuk tombol Login User */
        .btn-info:hover {
            background-color: #138496;
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(23, 162, 184, 0.3);
        }

        /* Transisi saat tombol Login Admin dan Login User ditekan */
        .btn-primary:active {
            transform: scale(1);
            background-color: #1f6feb;
            /* Tetap warna biru saat tombol ditekan */
            box-shadow: 0 4px 12px rgba(31, 111, 235, 0.5);
        }

        .btn-info:active {
            transform: scale(1);
            background-color: #117a8b;
            box-shadow: 0 4px 12px rgba(23, 162, 184, 0.5);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Logo Perpustakaan -->
        <div class="logo-text">Web<sup>Profile</sup></div>
        <p>Selamat datang di halaman login. Pilih akses sesuai dengan kebutuhan Anda.</p>

        <!-- Tombol Login Admin dengan transisi -->
        <a href="login.php" class="btn btn-primary btn-custom card-hover">Login Admin</a>

        <!-- Tombol Login User dengan transisi -->
        <a href="user/index.php" class="btn btn-info btn-custom card-hover">Login User</a>

        <!-- Tombol Register -->
        <!-- <a href="register.php" class="btn btn-secondary btn-custom card-hover">Register</a> -->
    </div>

    <!-- Link JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>