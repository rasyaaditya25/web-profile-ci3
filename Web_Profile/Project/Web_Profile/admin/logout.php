<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - Web Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(90deg, #0d1117 0%, #1f6feb 100%);
            font-family: 'Nunito', sans-serif;
            color: #ffffff;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .alert-container {
            text-align: center;
            max-width: 400px;
            background-color: #212529;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .alert-container h1 {
            font-size: 24px;
            font-weight: 700;
            color: #1f6feb;
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #1f6feb;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 600;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #164da9;
        }
    </style>
</head>

<body>
    <div class="alert-container">
        <h1>Logout Berhasil</h1>
        <p>Anda telah berhasil logout dari sistem.</p>
        <a href="../index.php" class="btn btn-primary">Kembali ke Halaman Utama</a>
    </div>

    <script>
        // Menampilkan animasi atau tindakan tambahan jika diperlukan
        setTimeout(() => {
            window.location.href = '../index.php';
        }, 5000); // Redirect otomatis setelah 5 detik
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>