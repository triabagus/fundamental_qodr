-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2018 pada 08.14
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tqodr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `grups_pengguna_jabatan`
--

CREATE TABLE `grups_pengguna_jabatan` (
  `id_grup` int(100) NOT NULL,
  `id_jabatan` int(100) NOT NULL,
  `id_pengguna` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `grups_pengguna_jabatan`
--

INSERT INTO `grups_pengguna_jabatan` (`id_grup`, `id_jabatan`, `id_pengguna`) VALUES
(1, 1, 1),
(6, 7, 3),
(7, 8, 4),
(8, 7, 5),
(9, 7, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(100) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Admin'),
(7, 'User'),
(8, 'Manager');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kirim_email_pengguna`
--

CREATE TABLE `kirim_email_pengguna` (
  `id_email` int(100) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `cc` varchar(50) NOT NULL,
  `bcc` varchar(50) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kirim_email_pengguna`
--

INSERT INTO `kirim_email_pengguna` (`id_email`, `penerima`, `cc`, `bcc`, `pengirim`, `judul`, `pesan`) VALUES
(3, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'aku@gmail.com', 'aku', 'dadah'),
(5, 'ismed@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'tratop@gmail.com', 'Baru', 'yes'),
(6, 'triatop9@gmail.com', 'triatop9@gmail.com', 'ismed@gmail.com', 'ismed@gmail.com', 'baru', 'baru'),
(9, 'triatop9@gmail.com', 'triatop9@gmail.com', 'guest@gmail.com', 'sasa@gmail.com', 'Judul', 'isi content'),
(10, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'guest@gmail.com', 'baru', 'baru'),
(11, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'guest@gmail.com', 'baru', 'baru'),
(12, 'triatop9@gmail.com', 'triatop9@gmail.com', 'ismed@gmail.com', 'ismed@gmail.com', 'Baru', 'sa'),
(13, 'triatop9@gmail.com', 'triatop9@gmail.com', 'ismed@gmail.com', 'ismed@gmail.com', 'aku', 'as'),
(14, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'aku@gmail.com', 'BaruS', 'sa'),
(15, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'aku@gmail.com', 'BaruS', 's'),
(16, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'aku@gmail.com', 'sas', 'a'),
(17, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'aku@gmail.com', 'as', 'as'),
(18, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'aku@gmail.com', 'as', 'as'),
(19, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'aku@gmail.com', 'as', 'as'),
(20, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'aku@gmail.com', 'as', 'as'),
(21, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'aku@gmail.com', 'aku', 'asa'),
(22, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'aku@gmail.com', 's', 'as'),
(23, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'aku@gmail.com', 'aku', 'sa'),
(24, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'aku@gmail.com', 'baru', 'asa'),
(25, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'ismed@gmail.com', 'BaruS', 'sd'),
(26, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'aku@gmail.com', 'ds', 'ds'),
(27, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'aku@gmail.com', 'asa', 'as'),
(28, 'triatop9@gmail.com', 'triatop9@gmail.com', 'ismed@gmail.com', 'aku@gmail.com', 'sas', 'sad'),
(29, 'triatop9@gmail.com', 'tria', 'tria', 'ismed@gmail.com', 'TEXT BARU', 'HELLO WORLD'),
(30, 'ismed@gmail.com', 'ismed', 'tria', 'triatop9@gmail.com', 'BARU', 'HELLO WORLD'),
(31, 'ismed@gmail.com', 'tria', 'tria', 'triatop9@gmail.com', 'Baru', 'HELLOW WODRL'),
(32, 'ismed@gmail.com', 'tria', 'tria', 'triatop9@gmail.com', 'Baru', 'HELLO'),
(33, 'triatop9@gmail.com', 'triatop9@gmail.com', 'triatop9@gmail.com', 'aku@gmail.com', 'ASA', 'HELLO WORDL'),
(34, 'triatop9@gmail.com', 'tria', 'TRIA', 'ismed@gmail.com', 'JUDUL BARU', 'HELLO WODRL BLA BALA EXMP'),
(35, 'triatop9@gmail.com', 'tria', 'tria', 'triatop9@gmail.com', 'Baru', 'HALLO'),
(37, 'triatop9@gmail.com', 'ismed', 'tria', 'ismed@gmail.com', 'aku', 'AS'),
(38, 'triatop9@gmail.com', 'triatop9@gmail.com', 'tria', 'ismed@gmail.com', 'Baru', 'SA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_bar`
--

CREATE TABLE `menu_bar` (
  `id_menu` int(100) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `fileurl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_bar`
--

INSERT INTO `menu_bar` (`id_menu`, `nama_menu`, `url`, `fileurl`) VALUES
(1, 'Bilangan Genap', 'genap', 'bilangan-genap.php'),
(2, 'Bilangan Ganjil', 'ganjil', 'bilangan-ganjil.php'),
(3, 'Bilangan Prima', 'prima', 'bilangan-prima.php'),
(4, 'Bilangan Deret', 'deret', 'bilangan-deret.php'),
(5, 'Segitiga Angka 1', 'angka1', 'perulangan-segitiga-angka1.php'),
(6, 'Segitiga Sama Angka', 'angkasama', 'perulangan-segitiga-angka-yg-sama.php'),
(7, 'Segitiga Angka Urut', 'angkaurut', 'perulangan-segitiga-angka-yg-berurutan.php'),
(8, 'Segitiga Pascal', 'pascal', 'pascal.php'),
(9, 'Conversi Desimal Biner', 'decbin', 'bilangan-biner-desimal.php'),
(10, 'Penjumlahan Matrik', 'matrik', 'matrik.php'),
(11, 'Perkalian Matrik', 'pmatrik', 'pmatrik.php'),
(12, 'Belajar OOP', 'oop', 'oop.php'),
(13, 'Bilangan Fibonanci', 'fibonanci', 'bilangan-fibonacci.php');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(100) NOT NULL,
  `no_ktp` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `no_ktp`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `email`, `status`, `username`, `password`, `foto`) VALUES
(1, '3555466676230003', 'Tria Bagus Nur Taufik', 'l', 'Batu', '1998-12-12', 'batu', '081334769154', 'tria@gmail.com', 'lajang', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'imgadmin/qodr.jpg'),
(3, '3547776288630004', 'User name', 'p', 'Batu', '2000-12-11', 'BATU', '081664528876', 'user@user.com', 'tunangan', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'imgadmin/no_image.png'),
(4, '35477682760003', 'Manager Name', 'l', 'Surabaya', '1999-02-12', 'surabaya', '0815536442211', 'manager@manager.com', 'hts', 'manager', '1d0258c2440a8d19e716292b231e3190', 'imgadmin/no_image.png'),
(5, '3456354345633666001', 'Bendahar user', 'l', 'BATU', '1990-11-12', 'BATU', '0812261534441313', 'bendahara@bendahara.com', 'lajang', 'bendahara', 'c9ccd7f3c1145515a9d3f7415d5bcbea', 'imgadmin/segitiga.jpg'),
(6, '3462555580005', 'tria', 'l', 'BATU', '1998-05-22', 'BATU', '0816374535635', 'tria@gmail.com', 'lajang', 'tria', 'f31ed336984a2a6abec47e78e2ec811d', 'imgadmin/IMG_1102.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles_jabatan_menu`
--

CREATE TABLE `roles_jabatan_menu` (
  `id_roles` int(100) NOT NULL,
  `id_menu` int(100) NOT NULL,
  `id_jabatan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `roles_jabatan_menu`
--

INSERT INTO `roles_jabatan_menu` (`id_roles`, `id_menu`, `id_jabatan`) VALUES
(31, 1, 7),
(32, 2, 7),
(33, 3, 7),
(34, 4, 7),
(35, 5, 7),
(39, 4, 8),
(40, 5, 8),
(67, 1, 1),
(68, 2, 1),
(69, 3, 1),
(70, 4, 1),
(71, 5, 1),
(72, 6, 1),
(73, 7, 1),
(74, 8, 1),
(75, 9, 1),
(76, 10, 1),
(77, 11, 1),
(78, 12, 1),
(79, 13, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `grups_pengguna_jabatan`
--
ALTER TABLE `grups_pengguna_jabatan`
  ADD PRIMARY KEY (`id_grup`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `kirim_email_pengguna`
--
ALTER TABLE `kirim_email_pengguna`
  ADD PRIMARY KEY (`id_email`);

--
-- Indeks untuk tabel `menu_bar`
--
ALTER TABLE `menu_bar`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `roles_jabatan_menu`
--
ALTER TABLE `roles_jabatan_menu`
  ADD PRIMARY KEY (`id_roles`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `grups_pengguna_jabatan`
--
ALTER TABLE `grups_pengguna_jabatan`
  MODIFY `id_grup` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kirim_email_pengguna`
--
ALTER TABLE `kirim_email_pengguna`
  MODIFY `id_email` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `menu_bar`
--
ALTER TABLE `menu_bar`
  MODIFY `id_menu` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `roles_jabatan_menu`
--
ALTER TABLE `roles_jabatan_menu`
  MODIFY `id_roles` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
