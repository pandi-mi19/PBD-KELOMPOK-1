-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Apr 2021 pada 13.50
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_prodi`
--

CREATE TABLE `dt_prodi` (
  `idprodi` int(11) NOT NULL,
  `kdprodi` varchar(6) NOT NULL,
  `nmprodi` varchar(70) NOT NULL,
  `akreditasi` enum('A','B','C','-') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dt_prodi`
--

INSERT INTO `dt_prodi` (`idprodi`, `kdprodi`, `nmprodi`, `akreditasi`) VALUES
(13, 'KP0001', 'Manajemen Informatika', 'A'),
(15, 'KP0002', 'Agribisnis Pangan', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_user`
--

CREATE TABLE `dt_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` enum('admin','mahasiswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dt_user`
--

INSERT INTO `dt_user` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
(4, 'pandi', '21232f297a57a5a743894a0e4a801fc3', 'Pandi Kurniawan', 'admin'),
(5, 'ikhsan', 'ee11cbb19052e40b07aac0ca060c23ee', 'Nur Ikhsan Fajri', 'mahasiswa'),
(6, 'pingko', 'ee11cbb19052e40b07aac0ca060c23ee', 'Pingko Sony Pratama', 'mahasiswa'),
(7, 'muslim', 'ee11cbb19052e40b07aac0ca060c23ee', 'Muslim Ma\'arif', 'mahasiswa'),
(8, 'riski', 'ee11cbb19052e40b07aac0ca060c23ee', 'Riski Safitri H.', 'mahasiswa'),
(9, 'nurul', 'ee11cbb19052e40b07aac0ca060c23ee', 'Nurul Khusnia', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dt_prodi`
--
ALTER TABLE `dt_prodi`
  ADD PRIMARY KEY (`idprodi`);

--
-- Indeks untuk tabel `dt_user`
--
ALTER TABLE `dt_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dt_prodi`
--
ALTER TABLE `dt_prodi`
  MODIFY `idprodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `dt_user`
--
ALTER TABLE `dt_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
