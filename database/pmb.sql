-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2021 pada 06.48
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
-- Database: `pmb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `menusId` int(11) NOT NULL,
  `menusOrder` int(3) NOT NULL,
  `menusName` varchar(50) NOT NULL,
  `menusUrl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`menusId`, `menusOrder`, `menusName`, `menusUrl`) VALUES
(1, 1, 'visi misi', '#visi_misi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `usersID` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`usersID`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES
(7, 'Wawan', 'wawan@gmail.com', 'Wawan', '$2y$10$BJ2R/QO/bOGXN86J9NuLO.HaPhaYNIBZoR/jrlJH8bHTQfOm3ig7W'),
(8, 'Bambang', 'bambang@gmail.com', 'Bambang', '$2y$10$TZ5eqC6UvUvh4NhzNUWu8OadoU65f7DGR727p5mH54dSWpQ2lxT9G'),
(17, 'Udin', 'udin@gmail.com', 'Udin', '$2y$10$FKpJclPHMFSEEwYM5Hrsi.o2Tg3MNH.xVqV1rQRQ5ohdL4m1WJQ36'),
(38, 'Admin', 'admin@gmail.com', 'Admin', '$2y$10$AAgUiRERvXG1/9hi7muzmeLfWGnI8Osre5xqXWqQaN1TrQCBirjh.'),
(39, 'Paijo', 'keren@gmail.com', 'Cool', '$2y$10$uluWOuCJj9FgEJn438DR1OQ/TIcShV12Xwu9/xdef8uYUBHFNLdkG'),
(40, 'Paimen', 'lapo@gmail.com', 'Iyo', '$2y$10$2yyLB3NYdkJGM4VEPDdK1eUZkpmvYoNg5vjFwNKI8dKnTIiSwsVV.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menusId`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `menusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `usersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
