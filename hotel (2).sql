-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 07:26 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` varchar(20) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_pengguna` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `email`, `id_pengguna`) VALUES
('A-001', 'azis12346789', '202cb962ac59075b964b07152d234b70', 'azisaan552@gmail.com', 'U-001'),
('A-002', 'azizlpt', '202cb962ac59075b964b07152d234b70', 'smk_lirboyo@yahoo.co.id', 'U-002'),
('A-003', 'bagas', '202cb962ac59075b964b07152d234b70', 'pankmo@ymail.com', 'U-002'),
('A-004', 'daffaFS', '202cb962ac59075b964b07152d234b70', 'sattaraziz984@gmail.com', 'U-003'),
('O-001', 'dafa', '202cb962ac59075b964b07152d234b70', 'example@gmail.com', 'O-001');

-- --------------------------------------------------------

--
-- Table structure for table `data_diri`
--

CREATE TABLE `data_diri` (
  `nik` varchar(20) NOT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  `alamat_domisili` varchar(200) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_pemesanan`
-- (See below for the actual view)
--
CREATE TABLE `data_pemesanan` (
`id_pemesanan` int(20)
,`status` int(4)
,`id_kamar` varchar(20)
,`nama` varchar(100)
,`no_kamar` varchar(20)
,`tgl_pemesanan` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` varchar(20) NOT NULL,
  `no_kamar` varchar(20) DEFAULT NULL,
  `jenis_kamar` varchar(20) DEFAULT NULL,
  `lantai` varchar(5) DEFAULT NULL,
  `kapasitas` varchar(5) DEFAULT NULL,
  `harga` int(30) DEFAULT NULL,
  `id_operator` varchar(20) DEFAULT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `no_kamar`, `jenis_kamar`, `lantai`, `kapasitas`, `harga`, `id_operator`, `status`) VALUES
('K-001', 'A002', 'single', '1', '1', 100000, 'O-001', 3),
('K-002', 'A001', 'single', '1', '1', 500000, 'O-001', 3),
('K-003', 'A003', 'single', '2', '1', 500000, 'O-001', 3),
('K-004', 'A-004', 'Double', '2', '2', 100000, 'O-001', 1);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_operator` varchar(20) NOT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id_operator`, `Nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`) VALUES
('O-001', 'Andrians', 'semen', 'kediri', '1998/04/15');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(20) NOT NULL,
  `id_user` varchar(20) DEFAULT NULL,
  `tgl_pemesanan` varchar(20) DEFAULT NULL,
  `status` int(4) DEFAULT NULL,
  `id_kamar` varchar(20) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_user`, `tgl_pemesanan`, `status`, `id_kamar`, `tgl_mulai`, `tgl_selesai`) VALUES
(8, 'U-001', '2022-02-23', 1, 'K-001', '2022-02-23', '2022-03-11'),
(9, 'U-001', '2022-02-23', 1, 'K-001', '2022-02-18', '2022-02-15'),
(10, 'U-001', '2022-02-24', 1, 'K-001', '2022-02-24', '2022-02-24'),
(11, 'U-001', '2022-02-25', 1, 'K-001', '2022-02-02', '2022-02-25'),
(12, 'U-001', '2022-02-25', 1, 'K-001', '2022-02-24', '2022-03-05'),
(13, 'U-001', '2022-02-25', 1, 'K-001', '2022-02-25', '2022-03-09'),
(14, 'U-001', '2022-02-25', 3, 'K-001', '2022-02-15', '2022-02-26'),
(15, 'U-001', '2022-02-25', 3, 'K-002', '2022-02-23', '2022-02-14'),
(16, 'U-001', '2022-02-25', 3, 'K-003', '2022-02-23', '2022-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`) VALUES
('U-001', 'Abdul Azis A', 'Kediri', '1998-02-17', 'Kediri'),
('U-002', 'Bagas', 'JOMBANG', '2022-03-02', 'Jl. Singajaya 33'),
('U-003', 'firu', 'malang', '2022-03-02', 'bandung');

-- --------------------------------------------------------

--
-- Structure for view `data_pemesanan`
--
DROP TABLE IF EXISTS `data_pemesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_pemesanan`  AS   (select `pemesanan`.`id_pemesanan` AS `id_pemesanan`,`pemesanan`.`status` AS `status`,`kamar`.`id_kamar` AS `id_kamar`,`user`.`nama` AS `nama`,`kamar`.`no_kamar` AS `no_kamar`,`pemesanan`.`tgl_pemesanan` AS `tgl_pemesanan` from ((`user` join `pemesanan`) join `kamar`) where `user`.`id_user` = `pemesanan`.`id_user` and `kamar`.`id_kamar` = `pemesanan`.`id_kamar`)  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `data_diri`
--
ALTER TABLE `data_diri`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_operator` (`id_operator`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_diri`
--
ALTER TABLE `data_diri`
  ADD CONSTRAINT `data_diri_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_operator`) REFERENCES `operator` (`id_operator`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
