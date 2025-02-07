<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login TrainIt Toko</title>
    <!-- Link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #ff0000;
            background-size: cover;
            background-position: center;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 450px;
            backdrop-filter: blur(10px);
        }

        .logo-text {
            font-size: 70px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 30px;
            border: 3px solid #ffffff;
            padding: 10px;
            border-radius: 10px;
            display: inline-block;
        }

        .logo-text sup {
            font-size: 0.5em;
            vertical-align: super;
        }

        p {
            color: #333;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .btn-custom {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(255, 0, 0, 0.3);
        }

        .btn-danger {
            background-color: #ff0000;
            border: none;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Logo Toko -->
        <div class="logo-text">TrainIt<sup>Toko</sup></div>
        <p>Silakan login sebagai admin, user, atau daftar sebagai anggota baru.</p>

        <!-- Tombol Login Admin -->
        <a href="admin/login.php" class="btn btn-danger btn-custom">Login Admin</a>

        <!-- Tombol Login User -->
        <a href="user/login.php" class="btn btn-danger btn-custom">Login User</a>

        <!-- Tombol Register -->
        <a href="user/daftar.php" class="btn btn-danger btn-custom">Register</a>
    </div>

    <!-- Link JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>