<?php

$ambil = $koneksi->query("SELECT * FROM buku WHERE id_buku='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$foto_buku = $pecah['foto_buku'];
if (file_exists('foto_buku/$foto_buku')) {
    unlink('foto_buku/$foto_buku');

}

$koneksi->query("DELETE FROM buku WHERE id_buku='$_GET[id]'");

echo "<script>alert('Buku Terhapus')</script>";
echo "<script>location='index.php?halaman=buku'</script>";
?>