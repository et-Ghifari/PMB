-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2022 at 10:43 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

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
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `formId` int(11) NOT NULL,
  `formNo` varchar(20) NOT NULL,
  `formJalur` varchar(20) NOT NULL,
  `formBeasiswa` varchar(128) DEFAULT NULL,
  `formProdi` varchar(128) NOT NULL,
  `formKelas` varchar(20) NOT NULL,
  `formNisn` varchar(20) NOT NULL,
  `formNik` varchar(20) NOT NULL,
  `formNama` varchar(128) NOT NULL,
  `formTptLahir` varchar(128) NOT NULL,
  `formTglLahir` int(8) NOT NULL,
  `formBlnLahir` varchar(20) NOT NULL,
  `formThnLahir` int(8) NOT NULL,
  `formJk` varchar(20) NOT NULL,
  `formHobi` varchar(128) DEFAULT NULL,
  `formCita` varchar(20) DEFAULT NULL,
  `formAnakke` int(3) DEFAULT NULL,
  `formSaudara` int(3) DEFAULT NULL,
  `formBerat` int(5) DEFAULT NULL,
  `formTinggi` int(5) DEFAULT NULL,
  `formJalan` varchar(128) NOT NULL,
  `formRt` int(5) NOT NULL,
  `formRw` int(5) NOT NULL,
  `formDesa` varchar(128) NOT NULL,
  `formKec` varchar(128) NOT NULL,
  `formKab` varchar(128) NOT NULL,
  `formProv` varchar(128) NOT NULL,
  `formKodepos` int(8) NOT NULL,
  `formHp` varchar(20) NOT NULL,
  `formEmail` varchar(128) NOT NULL,
  `formAsalSekolah` varchar(128) NOT NULL,
  `formSkhun` varchar(50) DEFAULT NULL,
  `formTahunLulus` int(8) NOT NULL,
  `formKkAyah` varchar(20) NOT NULL,
  `formNikAyah` varchar(20) NOT NULL,
  `formNamaAyah` varchar(128) NOT NULL,
  `formPekerjaanA` varchar(128) NOT NULL,
  `formPendidikanA` varchar(128) NOT NULL,
  `formNikIbu` varchar(20) NOT NULL,
  `formNamaIbu` varchar(128) NOT NULL,
  `formPekerjaanI` varchar(128) NOT NULL,
  `formPendidikanI` varchar(128) NOT NULL,
  `formPenghasilan` varchar(128) NOT NULL,
  `formLomba` varchar(128) DEFAULT NULL,
  `formTingkat` varchar(128) DEFAULT NULL,
  `formPeringkat` varchar(128) DEFAULT NULL,
  `formTahun` varchar(8) DEFAULT NULL,
  `formOrganisasi` varchar(128) NOT NULL,
  `formKeadaan` varchar(20) NOT NULL,
  `formKtp` varchar(128) DEFAULT NULL,
  `formAkta` varchar(128) DEFAULT NULL,
  `formKk` varchar(128) DEFAULT NULL,
  `formIjazah` varchar(128) DEFAULT NULL,
  `formFoto` varchar(128) DEFAULT NULL,
  `formKip` varchar(128) DEFAULT NULL,
  `formPkh` varchar(128) DEFAULT NULL,
  `formKks` varchar(128) DEFAULT NULL,
  `formBukti` varchar(128) DEFAULT NULL,
  `formStatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`formId`, `formNo`, `formJalur`, `formBeasiswa`, `formProdi`, `formKelas`, `formNisn`, `formNik`, `formNama`, `formTptLahir`, `formTglLahir`, `formBlnLahir`, `formThnLahir`, `formJk`, `formHobi`, `formCita`, `formAnakke`, `formSaudara`, `formBerat`, `formTinggi`, `formJalan`, `formRt`, `formRw`, `formDesa`, `formKec`, `formKab`, `formProv`, `formKodepos`, `formHp`, `formEmail`, `formAsalSekolah`, `formSkhun`, `formTahunLulus`, `formKkAyah`, `formNikAyah`, `formNamaAyah`, `formPekerjaanA`, `formPendidikanA`, `formNikIbu`, `formNamaIbu`, `formPekerjaanI`, `formPendidikanI`, `formPenghasilan`, `formLomba`, `formTingkat`, `formPeringkat`, `formTahun`, `formOrganisasi`, `formKeadaan`, `formKtp`, `formAkta`, `formKk`, `formIjazah`, `formFoto`, `formKip`, `formPkh`, `formKks`, `formBukti`, `formStatus`) VALUES
(21, 'PMB202200001', 'Mandiri', NULL, 'RPL', 'Reguler', '', '', 'Bambang', '', 0, '', 0, '', '', '', 0, 0, 0, 0, '', 0, 0, '', '', '', '', 0, '', 'bambang@gmail.com', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bambang.jpg', 'Bambang.jpg', 'Bambang.jpg', 'Bambang.jpg', 'Bambang.jpg', 'Bambang.jpg', 'Bambang.jpg', 'Bambang.jpg', 'Bambang.jpg', 'SELESAI');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menusId` int(11) NOT NULL,
  `menusOrder` int(3) NOT NULL DEFAULT 0,
  `menusName` varchar(50) NOT NULL,
  `menusUrl` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menusId`, `menusOrder`, `menusName`, `menusUrl`) VALUES
(1, 1, 'visi misi', 'visi_misi'),
(2, 3, 'beasiswa', 'beasiswa'),
(3, 2, 'panduan', 'panduan'),
(4, 4, 'prodi', 'prodi'),
(6, 6, 'fasilitas', 'fasilitas'),
(8, 5, 'biaya', 'biaya'),
(12, 7, 'kontak', 'kontak');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL,
  `usersLevel` varchar(11) DEFAULT NULL,
  `usersImage` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`, `usersLevel`, `usersImage`) VALUES
(38, 'Admin Ganteng', 'admin@gmail.com', 'Admin', '$2y$10$oZdp5Bbj2v6y3cLP6JOsNO.hG9.eRVbPk5xzk4tZWGUG3OEcdxF4W', 'admin', 'c61fcde318a71c.jpg'),
(56, 'Bambang', 'bambang@gmail.com', 'bambang', '$2y$10$K0euoN.ZMt2PxU/C6CcNW.VuNUjP.Y05Ea4g5Z2cokXNNIUkaFdQW', NULL, 'c61fccca2d498c.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`formId`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menusId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `formId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
