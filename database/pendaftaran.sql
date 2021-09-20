-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Sep 2021 pada 09.49
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`) VALUES
(1, 'Wawan', 'wawan@gmail.com', '$2y$10$2GFc0uOkA6WinNNLCJ7yCuIZUfH2Q9/tt/MPckSb0YNii7tJrNjMa'),
(2, 'Admin', 'admin@gmail.com', '$2y$10$bUaXV2CZfd2a2MARFcMOVuNrgH9fq3r//BXEepgJVsx/RUf2XI95m'),
(4, 'Udin', 'udin@gmail.com', '$2y$10$GnogxhIJ2I1t.GHUgfEKie8wCD0f2VW5ePAx0Sz8Hg.VsADoznnaO'),
(14, 'Bambang', 'bambang@gmail.com', '$2y$10$BLqsNkzQYo99RXdbZ6.2juOGYVQxQ4EXmeh4K1XYXaPqxNfYAibuC'),
(18, 'Coba', 'coba@gmail.com', '$2y$10$1yJ1kRLal6KQKf6T/gDSI.QKavjrp9gDaJcHbsPkJGdp2pi45Q08G');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
