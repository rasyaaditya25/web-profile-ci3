<?php
session_start();
//mendapatkan id_produk dari url
$id_produk = $_GET['id'];



//jk sudah ada produk itu dikeranjang, maka produk itu jumblahnya di +1
if(isset($_SESSION['keranjang'] [$id_produk]))
{
    $_SESSION['keranjang'] [$id_produk]+=1;
}
//selain itu (belum ada di keranjang), maka produk itu dianggap dibeli 1
else
{
    $_SESSION['keranjang'][$id_produk]= 1;
}


// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";


//larikan ke halaman belanja
    echo "<script>alert('Produk telah masuk ke Keranjang Belanja');</script>";
    echo "<script>location='keranjang.php';</script>";
?>