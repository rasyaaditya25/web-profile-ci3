<?php
$id_foto = isset($_GET["idfoto"]) ? $_GET["idfoto"] : null;
$id_produk = isset($_GET["idproduk"]) ? $_GET["idproduk"] : null;

    //ambil dulu datanya
    $ambilfoto = $koneksi->query("SELECT * FROM produk_foto WHERE id_produkfoto='$id_foto'");
        $detailfoto = $ambilfoto->fetch_assoc();
        $namafilefoto = $detailfoto["nama_produk_foto"];

        //hapus file foto dari folder
        unlink("../foto_produk/".$namafilefoto);

        //menghapus data di mysql
        $koneksi->query("DELETE FROM produk_foto WHERE id_produkfoto='$id_foto'");


        echo "<script>alert('Foto Produk berhasil dihapus');</script>";
        echo "<script>location='index.php?halaman=detailproduk&id=$id_produk';</script>" 
    
?>