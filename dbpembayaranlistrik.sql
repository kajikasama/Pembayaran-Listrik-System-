-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 08:29 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpembayaranlistrik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblogin`
--

CREATE TABLE `tblogin` (
  `KodeLogin` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `NamaLengkap` varchar(100) NOT NULL,
  `Level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblogin`
--

INSERT INTO `tblogin` (`KodeLogin`, `Username`, `Password`, `NamaLengkap`, `Level`) VALUES
(19, 'admin', 'admin', 'admin akar kuadrat', 'Admin'),
(27, 'asddsss', 'asd', 'asd', 'Admin'),
(28, 'iopiop', 'iopiop', 'iopiop', 'Petugas'),
(33, 'sentolops', 'sentolops', 'I Made Kepler', 'Admin'),
(45, '10387', '10387', 'Agus Chandra', 'Pelanggan'),
(46, '10798', '10798', 'Joon Yorigami', 'Pelanggan'),
(47, 'flandre', 'flandre', 'Flandre Scarlet', 'Petugas'),
(48, '10211', '10211', 'Yukari Yakumo', 'Pelanggan'),
(49, '10679', '10679', 'Sheet', 'Pelanggan'),
(51, 'asd', 'asd', 'asd', 'Petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tbpelanggan`
--

CREATE TABLE `tbpelanggan` (
  `KodePelanggan` int(11) NOT NULL,
  `NoPelanggan` varchar(10) NOT NULL,
  `NoMeter` varchar(10) NOT NULL,
  `KodeTarif` int(11) NOT NULL,
  `NamaLengkap` varchar(80) NOT NULL,
  `Telp` varchar(20) NOT NULL,
  `Alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpelanggan`
--

INSERT INTO `tbpelanggan` (`KodePelanggan`, `NoPelanggan`, `NoMeter`, `KodeTarif`, `NamaLengkap`, `Telp`, `Alamat`) VALUES
(55, '10387', '23449', 2, 'Agus Chandra', '081238246028', '103 tukad batanghari street, soka street'),
(56, '10798', '3459354', 7, 'Joon Yorigami', '043593459', 'Mouren Shrine'),
(57, '10211', '3845392', 6, 'Yukari Yakumo', '089345833', 'Hakurei Shrine'),
(58, '10679', '345344', 7, 'Sheet', '0892345923', 'Tabanan');

-- --------------------------------------------------------

--
-- Table structure for table `tbpembayaran`
--

CREATE TABLE `tbpembayaran` (
  `KodePembayaran` int(11) NOT NULL,
  `KodeTagihan` int(11) NOT NULL,
  `TglBayar` date NOT NULL,
  `JumlahTagihan` int(11) NOT NULL,
  `BuktiPembayaran` varchar(100) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpembayaran`
--

INSERT INTO `tbpembayaran` (`KodePembayaran`, `KodeTagihan`, `TglBayar`, `JumlahTagihan`, `BuktiPembayaran`, `Status`) VALUES
(1, 35, '2019-02-08', 120, 'bukti.jpg', 'Sudah'),
(2, 34, '2019-02-08', 100, 'bukti.jpg', 'Sudah'),
(3, 36, '2019-02-08', 1000000, 'bukti.jpg', 'Sudah'),
(4, 37, '2019-02-09', 354, 'bukti.jpg', 'Sudah');

-- --------------------------------------------------------

--
-- Table structure for table `tbtagihan`
--

CREATE TABLE `tbtagihan` (
  `KodeTagihan` int(11) NOT NULL,
  `NoTagihan` varchar(10) NOT NULL,
  `NoPelanggan` varchar(10) NOT NULL,
  `TahunTagih` int(11) NOT NULL,
  `BulanTagih` varchar(20) NOT NULL,
  `JumlahPemakaian` int(11) NOT NULL,
  `TotalBayar` double(10,0) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtagihan`
--

INSERT INTO `tbtagihan` (`KodeTagihan`, `NoTagihan`, `NoPelanggan`, `TahunTagih`, `BulanTagih`, `JumlahPemakaian`, `TotalBayar`, `Status`) VALUES
(34, 'RILTUVWO4', '10798', 2019, 'Januari', 100, 354300, 'Sudah'),
(35, 'AKUT04DRF', '10387', 2019, 'Januari', 120, 182000, 'Sudah'),
(36, '1MEDGL7KO', '10211', 2019, 'Januari', 100, 253200, 'Sudah'),
(37, '9QOJ7HDMG', '10679', 2019, 'Januari', 100, 354300, 'Sudah'),
(38, '6M1TFHQIX', '10679', 2019, 'Februari', 200, 704300, 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `tbtarif`
--

CREATE TABLE `tbtarif` (
  `KodeTarif` int(11) NOT NULL,
  `Daya` int(11) NOT NULL,
  `TarifPerKwh` int(11) NOT NULL,
  `Beban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbtarif`
--

INSERT INTO `tbtarif` (`KodeTarif`, `Daya`, `TarifPerKwh`, `Beban`) VALUES
(2, 250, 1500, 2000),
(6, 350, 2500, 3200),
(7, 550, 3500, 4300),
(8, 650, 5000, 6900);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`KodeLogin`);

--
-- Indexes for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  ADD PRIMARY KEY (`KodePelanggan`),
  ADD UNIQUE KEY `NoPelanggan` (`NoPelanggan`),
  ADD UNIQUE KEY `NoPelanggan_2` (`NoPelanggan`),
  ADD UNIQUE KEY `NoPelanggan_3` (`NoPelanggan`),
  ADD KEY `fk_tbtarif` (`KodeTarif`);

--
-- Indexes for table `tbpembayaran`
--
ALTER TABLE `tbpembayaran`
  ADD PRIMARY KEY (`KodePembayaran`),
  ADD KEY `fk_tbtagihan` (`KodeTagihan`);

--
-- Indexes for table `tbtagihan`
--
ALTER TABLE `tbtagihan`
  ADD PRIMARY KEY (`KodeTagihan`),
  ADD UNIQUE KEY `NoTagihan` (`NoTagihan`),
  ADD KEY `NoPelanggan` (`NoPelanggan`);

--
-- Indexes for table `tbtarif`
--
ALTER TABLE `tbtarif`
  ADD PRIMARY KEY (`KodeTarif`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblogin`
--
ALTER TABLE `tblogin`
  MODIFY `KodeLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  MODIFY `KodePelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbpembayaran`
--
ALTER TABLE `tbpembayaran`
  MODIFY `KodePembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbtagihan`
--
ALTER TABLE `tbtagihan`
  MODIFY `KodeTagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbtarif`
--
ALTER TABLE `tbtarif`
  MODIFY `KodeTarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  ADD CONSTRAINT `fk_tbtarif` FOREIGN KEY (`KodeTarif`) REFERENCES `tbtarif` (`KodeTarif`);

--
-- Constraints for table `tbpembayaran`
--
ALTER TABLE `tbpembayaran`
  ADD CONSTRAINT `fk_tbtagihan` FOREIGN KEY (`KodeTagihan`) REFERENCES `tbtagihan` (`KodeTagihan`);

--
-- Constraints for table `tbtagihan`
--
ALTER TABLE `tbtagihan`
  ADD CONSTRAINT `tbtagihan_ibfk_1` FOREIGN KEY (`NoPelanggan`) REFERENCES `tbpelanggan` (`NoPelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
