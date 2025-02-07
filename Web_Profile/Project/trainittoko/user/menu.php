<style>
    a {
        font-size: 15px;
    }
</style>

<nav class="navbar navbar-default">
    <div class="container">
        <ul class="nav navbar-nav">
            <li><a href="index.php"><b>Home</b></a></li>
            <li><a href="keranjang.php"><b>Keranjang</b></a></li>
            <!--jika sudah login(ada session pelanggan)-->
            <?php if (isset($_SESSION["pelanggan"])): ?>
                <li><a href="riwayat.php"><b>Riwayat Belanja</b></a></li>
                <li><a href="logout.php"><b>Logout</b></a></li>
                <!--selain itu belum login, belum ada session pelanggan-->
            <?php else: ?>
                <li><a href="login.php"><b>Login</b></a></li>
                <li><a href="daftar.php"><b>Daftar</b></a></li>
            <?php endif ?>



            <li><a href="checkout.php"><b>Checkout</b></a></li>
            </ul>

            <form action="pencarian.php" method="GET" class="navbar-form navbar-right">
                <input type="text" name="keyword" class="form-control" placeholder="Cari...">
                <button type="cari" class="btn btn-primary"><b>Cari</b></button>
            </form>

            </div>
</nav>