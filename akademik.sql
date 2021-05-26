-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2021 pada 04.31
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
(13, 'KP0001', 'Manajemen Informatika', 'B'),
(15, 'KP0002', 'Agribisnis Pangan', 'A'),
(16, 'KP0003', 'Akuntansi', 'B'),
(17, 'KP0004', 'Akuntansi Pajak', 'A'),
(18, 'KP0005', 'Agribisnis', 'B'),
(19, 'KP0006', 'Perjalanan Wisata', '-');

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `idmhs` int(11) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `idprodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`idmhs`, `npm`, `nama`, `idprodi`) VALUES
(1, '19753051', 'Pandi Kurniawan', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenisuser` enum('0','1') NOT NULL,
  `level` enum('00','10','11') NOT NULL,
  `status` enum('F','T') NOT NULL,
  `idprodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `jenisuser`, `level`, `status`, `idprodi`) VALUES
(1, 'Super Admin', 'rahasia', '1', '10', 'F', 13),
(2, 'admin1', 'rahasia', '1', '11', 'F', 13),
(3, 'pandi', 'admin', '1', '10', 'T', 13),
(4, 'ikhsan', 'admin', '1', '10', 'T', 13);

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
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`idmhs`),
  ADD KEY `idprodi` (`idprodi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dt_prodi`
--
ALTER TABLE `dt_prodi`
  MODIFY `idprodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `dt_user`
--
ALTER TABLE `dt_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `idmhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
