-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 02:13 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sewabaju`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `Image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `UserName`, `Password`, `updationDate`, `Image`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2019-04-19 06:35:12', '29032019003635r.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `baju`
--

CREATE TABLE `baju` (
  `id_baju` int(8) NOT NULL,
  `nama_baju` varchar(100) NOT NULL,
  `id_jenis` int(5) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(8) NOT NULL,
  `s` varchar(25) NOT NULL,
  `m` varchar(25) NOT NULL,
  `l` varchar(25) NOT NULL,
  `xl` varchar(25) NOT NULL,
  `gambar1` text NOT NULL,
  `gambar2` text NOT NULL,
  `gambar3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baju`
--

INSERT INTO `baju` (`id_baju`, `nama_baju`, `id_jenis`, `kategori`, `deskripsi`, `harga`, `s`, `m`, `l`, `xl`, `gambar1`, `gambar2`, `gambar3`) VALUES
(6, 'Dekorasi Jawa', 1, 'Dekorasi', 'Dekorasi Khas Jawa', 500000, '2', '', '3', '3', '18112021172110t.jpg', '18112021172121t.jpg', '18112021172131t.jpg'),
(7, 'Pakaian Eropa', 3, 'Pakaian', 'Pakaian Pernikahan Eropa', 600000, '3', '', '3', '3', '18112021172008a.jpg', '18112021172008a.jpg', '18112021172008a.jpg'),
(8, 'Pakaian Adat Jawa', 1, 'Pakaian', 'Pakaian Adat Khas Jawa', 500000, '3', '', '3', '', '18112021172351a.JPG', '18112021172351a.JPG', '18112021172351a.JPG'),
(9, 'Dekorasi Modern Putih', 3, 'Dekorasi', 'Dekorasi Mewah Elegan', 500000, '7', '', '7', '', '19112021041505n.jpg', '19112021041505n.jpg', '19112021041505n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `kode_booking` varchar(8) NOT NULL,
  `id_baju` int(11) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `durasi` int(11) NOT NULL,
  `denda` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pickup` varchar(30) NOT NULL,
  `tgl_booking` date NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`kode_booking`, `id_baju`, `ukuran`, `tgl_mulai`, `tgl_selesai`, `durasi`, `denda`, `status`, `email`, `pickup`, `tgl_booking`, `bukti_bayar`, `createdAt`) VALUES
('TRX7A57D', 6, 's', '2021-11-20', '2021-11-21', 2, 2500000, 'Hilang/Rusak', 'coba@gmail.com', '', '2021-11-18', '141220211132077Y163XVa_400x400.png', '2021-11-18 16:35:57'),
('TRXGAVK3', 7, 'l', '2021-12-19', '2021-12-22', 4, 1200000, 'Selesai', 'coba@gmail.com', '', '2021-12-18', '181220210900037Y163XVa_400x400.png', '2021-12-18 01:50:21'),
('TRXKVQRR', 6, 's', '2021-11-27', '2021-12-03', 7, 2750000, 'Selesai', 'coba@gmail.com', '', '2021-11-18', '141220211132187Y163XVa_400x400.png', '2021-11-18 16:36:14'),
('TRXY77TZ', 9, 's', '2021-12-14', '2021-12-17', 4, 1000000, 'Selesai', 'denis@gmail.com', '', '2021-12-13', '131220211956578df38d51caa69e10dde5850ddd1a8e38.jpg', '2021-12-13 12:54:12'),
('TRXZ3JEV', 6, 's', '2021-11-19', '2021-11-20', 2, 6000000, 'Selesai', 'coba@gmail.com', '', '2021-11-18', '141220211132317Y163XVa_400x400.png', '2021-11-18 16:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `cek_booking`
--

CREATE TABLE `cek_booking` (
  `id_cek` int(11) NOT NULL,
  `kode_booking` varchar(8) NOT NULL,
  `id_baju` int(11) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `tgl_booking` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cek_booking`
--

INSERT INTO `cek_booking` (`id_cek`, `kode_booking`, `id_baju`, `ukuran`, `tgl_booking`, `status`, `createdAt`) VALUES
(76, 'TRXZ3JEV', 6, 's', '2021-11-19', 'Selesai', '2021-11-18 16:31:45'),
(77, 'TRXZ3JEV', 6, 's', '2021-11-20', 'Selesai', '2021-11-18 16:31:45'),
(78, 'TRX7A57D', 6, 's', '2021-11-20', 'Hilang/Rusak', '2021-11-18 16:35:57'),
(79, 'TRX7A57D', 6, 's', '2021-11-21', 'Hilang/Rusak', '2021-11-18 16:35:57'),
(80, 'TRXKVQRR', 6, 's', '2021-11-27', 'Selesai', '2021-11-18 16:36:14'),
(81, 'TRXKVQRR', 6, 's', '2021-11-28', 'Selesai', '2021-11-18 16:36:14'),
(82, 'TRXKVQRR', 6, 's', '2021-11-29', 'Selesai', '2021-11-18 16:36:14'),
(83, 'TRXKVQRR', 6, 's', '2021-11-30', 'Selesai', '2021-11-18 16:36:14'),
(84, 'TRXKVQRR', 6, 's', '2021-12-01', 'Selesai', '2021-11-18 16:36:14'),
(85, 'TRXKVQRR', 6, 's', '2021-12-02', 'Selesai', '2021-11-18 16:36:14'),
(86, 'TRXKVQRR', 6, 's', '2021-12-03', 'Selesai', '2021-11-18 16:36:14'),
(87, 'TRXY77TZ', 9, 's', '2021-12-14', 'Selesai', '2021-12-13 12:54:12'),
(88, 'TRXY77TZ', 9, 's', '2021-12-15', 'Selesai', '2021-12-13 12:54:12'),
(89, 'TRXY77TZ', 9, 's', '2021-12-16', 'Selesai', '2021-12-13 12:54:12'),
(90, 'TRXY77TZ', 9, 's', '2021-12-17', 'Selesai', '2021-12-13 12:54:12'),
(91, 'TRXGAVK3', 7, 'l', '2021-12-19', 'Selesai', '2021-12-18 01:50:21'),
(92, 'TRXGAVK3', 7, 'l', '2021-12-20', 'Selesai', '2021-12-18 01:50:21'),
(93, 'TRXGAVK3', 7, 'l', '2021-12-21', 'Selesai', '2021-12-18 01:50:21'),
(94, 'TRXGAVK3', 7, 'l', '2021-12-22', 'Selesai', '2021-12-18 01:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id_cu` int(11) NOT NULL,
  `nama_visit` varchar(100) DEFAULT NULL,
  `email_visit` varchar(120) DEFAULT NULL,
  `telp_visit` char(16) DEFAULT NULL,
  `pesan` longtext DEFAULT NULL,
  `tgl_posting` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id_cu`, `nama_visit`, `email_visit`, `telp_visit`, `pesan`, `tgl_posting`, `status`) VALUES
(1, 'ME', 'gome@gmail.com', '2147483647', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2017-06-18 10:03:07', 1),
(2, 'kjk', 'jlkl@gmail.com', '98989898', 'kjlkjkljklj', '2018-03-06 14:01:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactusinfo`
--

CREATE TABLE `contactusinfo` (
  `id_info` int(11) NOT NULL,
  `alamat_kami` tinytext DEFAULT NULL,
  `email_kami` varchar(255) DEFAULT NULL,
  `telp_kami` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactusinfo`
--

INSERT INTO `contactusinfo` (`id_info`, `alamat_kami`, `email_kami`, `telp_kami`) VALUES
(1, 'Jl. iya jadian kaga', 'mutiaramotor@gmail.com', '08585233222');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(1) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Adat'),
(3, 'Modern');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(120) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_user`, `nama_user`, `email`, `password`, `telp`, `alamat`) VALUES
(5, 'Test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '0819898989', 'test doang'),
(6, 'Coba', 'coba@gmail.com', 'c3ec0f7b054e729c5a716c8125839829', '08986776473', 'Jl. coba'),
(7, 'Nama Saya', 'nama@gmail.com', 'e3555ebe8b7daf4a9966f8130fb3a93f', '08123456789', 'Alamat Saya'),
(9, 'santi', 'santi@gmail.com', 'ae1d4b431ead52e5ee1788010e8ec110', '0987654321', 'Malang'),
(10, 'denis', 'denis@gmail.com', 'de8c1d3c966798236b757c1d83f1586d', '098765432', 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '											<p align=\"justify\"><span style=\"color: rgb(153, 0, 0); font-size: small; font-weight: 700;\">This is Therms and Conditions</span></p><p align=\"justify\"><br></p>											'),
(5, 'Rekening', 'rekening', '																																	123456789 Bank BRI a/n IRFAN'),
(0, 'Driver', 'driver', '200000'),
(2, 'Privacy Policy', 'privacy', '											<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">This is Privacy Policy</span>'),
(3, 'Tentang Kami', 'aboutus', '																																	<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Kami menyewakan berbagai macam baju untuk berbagai keperluan.</span>																						'),
(11, 'FAQs', 'faqs', '											<div style=\"text-align: justify;\"><span style=\"font-size: 1em; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Q : Bagaimana cara menyewa baju disini?</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 1em; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">A : Pertama anda harus mendaftar terlebih dahulu sebagai member melalui menu yang telah disediakan.</span></div>											');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baju`
--
ALTER TABLE `baju`
  ADD PRIMARY KEY (`id_baju`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`kode_booking`);

--
-- Indexes for table `cek_booking`
--
ALTER TABLE `cek_booking`
  ADD PRIMARY KEY (`id_cek`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id_cu`);

--
-- Indexes for table `contactusinfo`
--
ALTER TABLE `contactusinfo`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `baju`
--
ALTER TABLE `baju`
  MODIFY `id_baju` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cek_booking`
--
ALTER TABLE `cek_booking`
  MODIFY `id_cek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id_cu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contactusinfo`
--
ALTER TABLE `contactusinfo`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
