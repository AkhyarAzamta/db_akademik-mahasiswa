-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2023 at 04:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `AmbilMatakuliah`
--

CREATE TABLE `AmbilMatakuliah` (
  `IDAmbilMatakuliah` int(11) NOT NULL,
  `NIM` varchar(30) NOT NULL,
  `IDMatakuliah` int(11) NOT NULL,
  `Nilai` int(11) NOT NULL,
  `Semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Dosen`
--

CREATE TABLE `Dosen` (
  `NIP` varchar(20) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `JenisKelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Dosen`
--

INSERT INTO `Dosen` (`NIP`, `Nama`, `JenisKelamin`) VALUES
('1', 'Rafika Ratik Srimurni, S.TP., M.Si.', 'Perempuan'),
('2', 'Gitarja Sandi, M.T.', 'Laki-Laki'),
('3', 'Nur Hijjah Arigawati, S.Si., M.Pd.', 'Perempuan'),
('4', 'Dr. Tedjo Darmanto , MT.', 'Laki-Laki'),
('5', 'Isbandi, ST., MT.', 'Laki-Laki'),
('6', 'Soecipto, ST., MH. ', 'Laki-Laki'),
('7', 'Hendar Ibnu Hajar, Lc., M.Ag.', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Table structure for table `Jadwal`
--

CREATE TABLE `Jadwal` (
  `IDJadwal` int(11) NOT NULL,
  `IDKelas` int(11) NOT NULL,
  `IDMatakuliah` int(11) NOT NULL,
  `Hari` varchar(10) NOT NULL,
  `Waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Jadwal`
--

INSERT INTO `Jadwal` (`IDJadwal`, `IDKelas`, `IDMatakuliah`, `Hari`, `Waktu`) VALUES
(1, 4, 312, 'Senin', '17:00:00'),
(2, 4, 323, 'Senin', '19:00:00'),
(3, 4, 322, 'Selasa', '17:00:00'),
(4, 4, 313, 'Rabu', '17:00:00'),
(5, 4, 332, 'Rabu', '19:00:00'),
(6, 4, 324, 'Kamis', '17:00:00'),
(7, 4, 343, 'Kamis', '19:00:00'),
(8, 4, 314, 'Jum\'at', '17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Kelas`
--

CREATE TABLE `Kelas` (
  `IDKelas` int(11) NOT NULL,
  `NamaKelas` varchar(50) NOT NULL,
  `IDProdi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Kelas`
--

INSERT INTO `Kelas` (`IDKelas`, `NamaKelas`, `IDProdi`) VALUES
(1, 'A1', 1),
(2, 'A2', 1),
(3, 'A3', 1),
(4, 'B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Mahasiswa`
--

CREATE TABLE `Mahasiswa` (
  `NIM` varchar(30) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `NIK` bigint(30) NOT NULL,
  `JenisKelamin` varchar(10) NOT NULL,
  `TempatLahir` varchar(50) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `Alamat` text NOT NULL,
  `NoTelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Mahasiswa`
--

INSERT INTO `Mahasiswa` (`NIM`, `Nama`, `NIK`, `JenisKelamin`, `TempatLahir`, `TanggalLahir`, `Alamat`, `NoTelp`) VALUES
('41037006211030', 'Muhammad Yahya F.R', 3207260603020001, 'Laki-Laki', 'Banyuwangi', '2002-03-06', 'Jl.Pacuan Kuda\r\nDesa : Legokjawa\r\nKecamatan : Cimerak\r\nKabupaten : Pangandaran\r\nProvinsi : Jawa Barat', '085866179632'),
('41037006211099', 'Ervan Akhyar Azamta', 3204291402010006, 'Laki-Laki', 'Bandung', '2001-02-14', 'kp. Cipongporang\r\nDesa : Serang Mekar\r\nKecamatan : Ciparay \r\nKabupaten : Bandung\r\nProvinsi : Jawa Barat', '083829379514'),
('41037006211103', 'Ghefira Rizky Aulia', 3204376601030002, 'Perempuan', 'Bandung', '2003-01-27', 'Jln Ciloa \r\nDesa : Pamekaran\r\nKecamatan : Soreang\r\nKabupaten : Bandung\r\nProvinsi : Jawa Barat ', '085733939786'),
('41037006211105', 'M Ilham Gumilang', 3204372404030010, 'Laki-Laki', 'Bandung', '2003-04-24', 'Kp Soreang Kolot\r\nDesa : Soreang\r\nKecamatan : Soreang \r\nKabupaten : Bandung\r\nProvinsi : Jawa Barat ', '085659711237'),
('41037006211142', 'Andi Jaelani', 3204272603010004, 'Laki-Laki', 'Bandung', '2001-03-26', 'Jalan : jl. Ciawi tali ciluluk \r\nKampung : kp. Cibiuk \r\nDesa : Cikancung \r\nKecamatan : Cikancung \r\nKabupaten : Bandung \r\nProvinsi : Jawa Barat ', '0882000352281'),
('41037006211145', 'Anggie Abdurohman', 3204352309010004, 'Laki-Laki', 'Bandung', '2001-09-23', 'Jl Majalaya-Cicalengka, No 10, Kp Tangsi 2, Rt/Rw 03/13,\r\nDesa : Tangsi Mekar\r\nKecamatan : Bayongbong \r\nKabupaten : Garut \r\nProvinsi : Jawa Barat', '081322529539'),
('41037006211156', 'Iis Wasiatul Fitria', 3204056112010010, 'Perempuan', 'Bandung', '2001-12-21', 'Jalan : jl. Raya cileunyi wetan \r\nKampung : kp. Sindang sari\r\nDesa : cileunyi wetan \r\nKecamatan : cileunyi \r\nKabupaten : Bandung \r\nProvinsi : Jawa Barat ', '089517397781'),
('41037006211160', 'Muhammad Mufid Muhaedi', 3204331501020002, 'Laki-Laki', 'Bandung', '2003-01-15', 'Kp. Biru RT 04/04\r\nDesa : Biru\r\nKecamatan : Majalaya \r\nKabupaten : Bandung \r\nProvinsi : Jawa Barat ', '085624888058'),
('41037006211169', 'M Fikri Syarifulloh', 3204325807010001, 'Laki-Laki', 'Garut', '2001-03-09', 'Kp cinisti \r\nDesa : Cinisti \r\nKecamatan : Bayongbong \r\nKabupaten : Garut \r\nProvinsi : Jawa Barat ', '085793125771'),
('41037006211173', 'Daffa Muhammad Khaidar', 3204321704030007, 'Laki-Laki', 'Bandung', '2002-04-17', 'Pondok Giri Harja Endah \r\nDesa : Jelekong \r\nKecamatan : Baleendah \r\nKabupaten : Bandung \r\nProvinsi : Jawa Barat ', '083822578983'),
('41037006211182', 'Neng Sri Zulfany', 3204276205020001, 'Perempuan', 'Bandung', '2002-05-22', 'Kp. Seke RT/RW 02/08\r\nDesa : Cikasungka \r\nKecamatan : Cikancung \r\nKabupaten : Bandung \r\nProvinsi : Jawa Barat ', '082120155688');

-- --------------------------------------------------------

--
-- Table structure for table `Matakuliah`
--

CREATE TABLE `Matakuliah` (
  `IDMatakuliah` int(11) NOT NULL,
  `NamaMatakuliah` varchar(50) NOT NULL,
  `SKS` int(11) NOT NULL,
  `IDProdi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Matakuliah`
--

INSERT INTO `Matakuliah` (`IDMatakuliah`, `NamaMatakuliah`, `SKS`, `IDProdi`) VALUES
(312, 'PROBABILITAS STATISTIK', 2, 1),
(313, 'Struktur Data', 3, 1),
(314, 'Akhlaq An Nahdliyah', 2, 1),
(322, 'Matrik dan Ruang Vektor', 2, 1),
(323, 'Teori Bahasa Dan Otomata', 3, 1),
(324, 'Pemodelan Basis Data', 3, 1),
(332, 'Pemrograman Orientasi Objek *', 3, 1),
(343, 'Introduction Web Programming*', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Mengajar`
--

CREATE TABLE `Mengajar` (
  `IDMengajar` int(11) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `IDMatakuliah` int(11) NOT NULL,
  `IDKelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Mengajar`
--

INSERT INTO `Mengajar` (`IDMengajar`, `NIP`, `IDMatakuliah`, `IDKelas`) VALUES
(1, '1', 312, 4),
(2, '2', 323, 4),
(3, '3', 322, 4),
(4, '4', 313, 4),
(5, '5', 332, 4),
(6, '6', 324, 4),
(7, '6', 343, 4),
(8, '7', 314, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Prodi`
--

CREATE TABLE `Prodi` (
  `IDProdi` int(11) NOT NULL,
  `NamaProdi` varchar(50) NOT NULL,
  `Jenjang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Prodi`
--

INSERT INTO `Prodi` (`IDProdi`, `NamaProdi`, `Jenjang`) VALUES
(1, 'Teknik Informatika', 'S1'),
(2, 'Teknik Elektro', 'S1'),
(3, 'Teknik Industri', 'S1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AmbilMatakuliah`
--
ALTER TABLE `AmbilMatakuliah`
  ADD PRIMARY KEY (`IDAmbilMatakuliah`),
  ADD KEY `NIM` (`NIM`),
  ADD KEY `IDMatakuliah` (`IDMatakuliah`);

--
-- Indexes for table `Dosen`
--
ALTER TABLE `Dosen`
  ADD PRIMARY KEY (`NIP`);

--
-- Indexes for table `Jadwal`
--
ALTER TABLE `Jadwal`
  ADD PRIMARY KEY (`IDJadwal`),
  ADD KEY `IDKelas` (`IDKelas`),
  ADD KEY `IDMatakuliah` (`IDMatakuliah`);

--
-- Indexes for table `Kelas`
--
ALTER TABLE `Kelas`
  ADD PRIMARY KEY (`IDKelas`),
  ADD KEY `IDProdi` (`IDProdi`);

--
-- Indexes for table `Mahasiswa`
--
ALTER TABLE `Mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `Matakuliah`
--
ALTER TABLE `Matakuliah`
  ADD PRIMARY KEY (`IDMatakuliah`),
  ADD KEY `IDProdi` (`IDProdi`);

--
-- Indexes for table `Mengajar`
--
ALTER TABLE `Mengajar`
  ADD PRIMARY KEY (`IDMengajar`),
  ADD KEY `NIP` (`NIP`),
  ADD KEY `IDMatakuliah` (`IDMatakuliah`),
  ADD KEY `IDKelas` (`IDKelas`);

--
-- Indexes for table `Prodi`
--
ALTER TABLE `Prodi`
  ADD PRIMARY KEY (`IDProdi`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AmbilMatakuliah`
--
ALTER TABLE `AmbilMatakuliah`
  ADD CONSTRAINT `AmbilMatakuliah_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `Mahasiswa` (`NIM`),
  ADD CONSTRAINT `AmbilMatakuliah_ibfk_2` FOREIGN KEY (`IDMatakuliah`) REFERENCES `Matakuliah` (`IDMatakuliah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Jadwal`
--
ALTER TABLE `Jadwal`
  ADD CONSTRAINT `Jadwal_ibfk_1` FOREIGN KEY (`IDKelas`) REFERENCES `Kelas` (`IDKelas`),
  ADD CONSTRAINT `Jadwal_ibfk_2` FOREIGN KEY (`IDMatakuliah`) REFERENCES `Matakuliah` (`IDMatakuliah`);

--
-- Constraints for table `Kelas`
--
ALTER TABLE `Kelas`
  ADD CONSTRAINT `Kelas_ibfk_1` FOREIGN KEY (`IDProdi`) REFERENCES `Prodi` (`IDProdi`);

--
-- Constraints for table `Matakuliah`
--
ALTER TABLE `Matakuliah`
  ADD CONSTRAINT `Matakuliah_ibfk_1` FOREIGN KEY (`IDProdi`) REFERENCES `Prodi` (`IDProdi`);

--
-- Constraints for table `Mengajar`
--
ALTER TABLE `Mengajar`
  ADD CONSTRAINT `Mengajar_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `Dosen` (`NIP`),
  ADD CONSTRAINT `Mengajar_ibfk_2` FOREIGN KEY (`IDMatakuliah`) REFERENCES `Matakuliah` (`IDMatakuliah`),
  ADD CONSTRAINT `Mengajar_ibfk_3` FOREIGN KEY (`IDKelas`) REFERENCES `Kelas` (`IDKelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
