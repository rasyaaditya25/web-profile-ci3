<?php

$ambil = $koneksi->query("SELECT * FROM film WHERE id_film='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$foto_film = $pecah['foto_film'];
if (file_exists('foto_film/$foto_film')) {
    unlink('foto_film/$foto_film');

}

$koneksi->query("DELETE FROM film WHERE id_film='$_GET[id]'");

echo "<script>alert('film Terhapus')</script>";
echo "<script>location='index.php?halaman=buku'</script>";
?>