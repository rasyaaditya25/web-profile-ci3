-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2025 pada 03.26
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_profile`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(5, 'Rasya Aditya', 'rasyaaditya2506@gmail.com', '$2y$10$KpmM8pnv9km3rlCOOVe2eeQdP5hIundPIrwUP3C9tl4U1urnONJ8m');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Menu'),
(3, 'Portfolio');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_sub_menu`
--

CREATE TABLE `admin_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin_sub_menu`
--

INSERT INTO `admin_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fa-solid fa-gauge', 1),
(2, 2, 'Menu Management', '	menu', 'fa-solid fa-bars', 1),
(3, 2, 'SubMenu Management', 'menu/submenu', 'fa-solid fa-angles-right', 1),
(5, 3, 'Project ', 'portfolio', 'fa-solid fa-folder', 1),
(7, 3, 'Games Project', 'portfolio/games', 'fa-solid fa-gamepad', 1),
(10, 3, 'Web Project', 'portfolio/web', 'fa-solid fa-computer', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `portfolio`
--

CREATE TABLE `portfolio` (
  `id_portfolio` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `tentang` varchar(255) NOT NULL,
  `judul_portfolio` varchar(255) NOT NULL,
  `deskripsi_portfolio` text NOT NULL,
  `portfolio_foto` varchar(255) NOT NULL,
  `linking` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `portfolio`
--

INSERT INTO `portfolio` (`id_portfolio`, `category`, `tentang`, `judul_portfolio`, `deskripsi_portfolio`, `portfolio_foto`, `linking`) VALUES
(2, 'Website', 'E-Commerce', 'Trainit Toko', 'Berikut adalah deskripsi yang bisa Anda gunakan untuk menjelaskan web TrainIt Toko di portofolio Anda:\r\n\r\nTrainIt Toko adalah sebuah platform e-commerce yang dirancang khusus untuk menjual berbagai produk pelatihan dan sumber daya terkait dunia pendidikan serta pengembangan diri. Website ini memiliki antarmuka pengguna yang bersih dan intuitif, memudahkan pengunjung untuk menemukan kursus, buku, serta alat bantu pembelajaran yang dibutuhkan.\r\n\r\nFitur utama yang ada dalam TrainIt Toko meliputi sistem katalog produk yang dapat disaring berdasarkan kategori, sistem pembayaran yang aman dan mudah digunakan, serta fitur pencarian yang efisien. Pengguna juga dapat melihat detail produk, termasuk informasi tentang instruktur, deskripsi kursus, dan testimonial pengguna sebelumnya. Dengan fokus pada pengalaman pengguna yang maksimal, TrainIt Toko juga dilengkapi dengan integrasi akun pengguna untuk melacak pembelian dan kemajuan pelatihan.\r\n\r\nSebagai pengembang, saya berperan dalam mendesain dan mengembangkan berbagai fitur interaktif dan fungsionalitas backend yang menjamin kelancaran proses transaksi dan pengelolaan produk. Platform ini tidak hanya memberikan kemudahan bagi pelanggan, tetapi juga memberikan kemudahan bagi admin untuk mengelola konten secara efisien.', 'trainittoko.png', 'Project/trainittoko/index.php'),
(3, 'Games', '2D Games', 'Pembasmi Hantu', '\r\nBerikut adalah deskripsi yang dapat Anda gunakan untuk game Pembasmi Hantu di portofolio Anda:\r\n\r\nPembasmi Hantu - Game 2D Aksi dan Petualangan\r\n\r\nPembasmi Hantu adalah game 2D aksi yang mengajak pemain untuk menjadi seorang pembasmi hantu yang terampil. Dalam permainan ini, pemain harus mengalahkan hantu-hantu yang muncul secara acak di berbagai tempat seram untuk mendapatkan skor sebanyak-banyaknya sebelum waktu habis. Setiap level permainan menawarkan tantangan yang berbeda, dengan tingkat kesulitan yang dapat dipilih, yaitu Easy, Medium, dan Hard.\r\n\r\nPemain harus mengklik hantu yang muncul di layar untuk membasminya, dan setiap hantu yang berhasil dibasmi akan memberikan skor. Namun, pemain harus berhati-hati karena waktu yang terbatas membuat permainan semakin menantang. Setelah permainan berakhir, pemain dapat melihat skor mereka dan menyimpannya di leaderboard untuk membandingkan pencapaian mereka dengan pemain lainnya.', 'pembasmi_hantu.png', 'Project/Hantu/index.html'),
(4, 'Website', 'Menyimpan Jenis Buku dan Film', 'Pustakaku', 'PustakaKU adalah platform digital yang menyediakan informasi lengkap tentang berbagai buku dan film dari berbagai genre dan kategori. Website ini bertujuan untuk memudahkan pengunjung dalam menemukan referensi terbaru dan terbaik tentang buku serta film yang dapat memperkaya pengetahuan dan hiburan.\r\n\r\nWebsite ini juga mendukung interaksi antar pengguna, dengan fitur seperti memberikan rating dan menulis review untuk setiap buku atau film yang telah dibaca atau ditonton, sehingga dapat berbagi pengalaman dengan sesama pecinta buku dan film.\r\n\r\nPustakaKU adalah tempat yang sempurna bagi para pecinta literasi dan film yang ingin memperluas wawasan mereka dan menemukan karya-karya terbaik dari dunia sastra dan perfilman.\r\n\r\n', 'pustakaku.png', 'Project/Datatables/index.php'),
(16, 'Website', 'Web Profile', 'Web Rasya', 'Web berisi data diri dan project yang sudah dibuat', 'web_Profile.png', 'Project/Web_Profile/index.php');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin_sub_menu`
--
ALTER TABLE `admin_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id_portfolio`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `admin_sub_menu`
--
ALTER TABLE `admin_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id_portfolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
