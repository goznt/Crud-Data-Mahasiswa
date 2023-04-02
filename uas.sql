-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2022 at 10:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jenis_kelamin` bit(1) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `jenis_kelamin`, `foto`) VALUES
('210030001', 'putu sedana', 'denpasar', b'1', 'foto.png'),
('210030002', 'made wibawa', 'gianyar', b'1', 'foto.png'),
('210030003', 'ratna ningsih', 'negara', b'0', 'foto.png'),
('210030004', 'kusuma dewi', 'denpasar', b'0', 'foto.png'),
('210030005', 'mirah agustini', 'denpasar', b'0', 'foto.png'),
('210030006', 'ketut ariyasa', 'denpasar', b'1', 'foto.png'),
('210030007', 'agus hariyadi', 'denpasar', b'1', 'foto.png'),
('210030008', 'sekarini rahayu', 'denpasar', b'0', 'foto.png'),
('210030009', 'agustinus lando', 'flores', b'1', 'foto.png'),
('210030010', 'michelle sofia', 'jakarta', b'0', 'foto.png'),
('210030011', 'galih rupawan', 'jakarta', b'1', 'foto.png'),
('210030012', 'ratna silvia dewi', 'denpasar', b'0', 'foto.png'),
('210030013', 'putu santika artha', 'denpasar', b'1', 'foto.png'),
('210030014', 'ketut atmaja', 'tabanan', b'1', 'foto.png'),
('210030015', 'reno tjahjadi', 'jakarta', b'1', 'foto.png'),
('210030016', 'bunga anggreni', 'bandung', b'0', 'foto.png'),
('210030017', 'dewi madri', 'badung', b'0', 'foto.png'),
('210030018', 'sekar aryaningtyas', 'denpasar', b'0', 'foto.png'),
('210030019', 'wahyu biantara', 'denpasar', b'1', 'foto.png'),
('210030020', 'gede adi bismantara', 'karangasem', b'1', 'foto.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
