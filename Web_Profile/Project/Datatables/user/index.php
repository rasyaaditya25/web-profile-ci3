<?php
// koneksi ke database
include '../admin/koneksi.php';

if (!isset($_SESSION['user'])) {
    header('location:../index.php');

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library PustakaKU</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <style>
        .thumbnail {
            height: 500px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .thumbnail img {
            max-height: 300px;
            object-fit: cover;
            width: 100%;
        }

        .caption {
            flex-grow: 1;
            text-align: center;
        }

        .caption h3 {
            font-size: 16px;
            min-height: 40px;
        }

        .caption h5 {
            margin-bottom: 15px;
        }

        .thumbnail .btn {
            margin-bottom: 10px;
        }

        .thumbnail .caption .btn {
            width: 100%;
        }
    </style>


</head>

<body>

    <nav class="navbar navbar-default">
        <div class="container">
            <ul class="nav navbar-nav">
                <li><a href="index.php"><b>Home</b></a></li>
                <li><a href="buku.php"><b>Buku</b></a></li> 
                <li><a href="film.php"><b>Film</b></a></li>
                <li><a href="logout.php"><b>Logout</b></a></li>
            </ul>
        </div>
    </nav>

    <!--Content-->
    <section class="konten">
        <div class="container">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet ea odio accusamus repellendus blanditiis?
                Omnis quod debitis eaque, temporibus aut necessitatibus sit ut, nemo cumque repudiandae ab magnam
                expedita delectus laboriosam suscipit assumenda nobis nisi esse in voluptas numquam accusantium corporis
                vitae mollitia. Tempora explicabo dolorem nulla facilis ratione voluptas delectus ab, amet fuga sapiente
                dicta vitae illum debitis necessitatibus, magni libero iure asperiores incidunt, itaque minima
                exercitationem harum? Culpa nisi iste, ullam pariatur obcaecati quisquam fugiat minus mollitia magni
                ipsum ratione! Sequi quo esse accusantium facere a obcaecati aut ea nisi fuga voluptate! Exercitationem
                recusandae quisquam temporibus ipsa quo earum architecto numquam impedit cumque cum est sint a,
                explicabo accusantium error libero ab minus id vero, iste animi totam sequi! Magnam consectetur dolores
                rerum voluptatum a facere laborum sapiente vel facilis! Aliquid sunt iusto nisi possimus nulla! Id, qui!
                Veniam suscipit impedit, sapiente, eius ipsam ipsum ad, cupiditate similique sequi aspernatur nemo? Ea,
                eum eligendi! Eos, inventore dignissimos. Asperiores eum officiis sed sunt molestias harum cum
                dignissimos, at minima iure, incidunt, eveniet nemo. Odit vel repudiandae velit provident quae
                laboriosam ducimus maiores necessitatibus eius tempore pariatur, ipsa accusantium incidunt expedita enim
                cumque unde ab natus, aperiam esse dolores nam!</p>
        </div>
    </section>

</body>

</html>