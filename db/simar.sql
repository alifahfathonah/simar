-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 16, 2021 at 08:38 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simar`
--

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_ruang`
--

CREATE TABLE `peminjaman_ruang` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `no_identitas` int(128) NOT NULL,
  `fakultas` varchar(128) NOT NULL,
  `prodi` varchar(128) NOT NULL,
  `nomor_wa` varchar(128) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `keperluan` text NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `status` enum('Menunggu','Diterima','Ditolak','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman_ruang`
--

INSERT INTO `peminjaman_ruang` (`id`, `nama`, `no_identitas`, `fakultas`, `prodi`, `nomor_wa`, `tanggal_kegiatan`, `jam_mulai`, `jam_selesai`, `keperluan`, `jumlah_peserta`, `status`) VALUES
(1, 'Fadhil Abigail Alvast', 123456, 'FTI', 'Teknik Informatika', '08123456789', '2020-01-01', '00:01:00', '01:59:00', 'Rapat', 50, 'Diterima'),
(2, 'Yoga', 2147483647, 'FAST', 'Pendidikan Biologi', '08179142943', '2020-01-02', '12:00:00', '14:00:00', 'Presentasi', 20, 'Menunggu'),
(3, 'Dimas Maulana', 234234, 'FKIP', 'Ilmu Hadist', '6435634', '2020-01-01', '20:59:00', '22:59:00', 'Ngaji', 50, 'Ditolak'),
(4, 'Ana Pujiastuti', 60171014, 'Perpustakaan', 'Perpustakaan', '085743939558', '2020-01-09', '08:30:00', '10:30:00', 'rapat perpustakaan', 20, 'Menunggu'),
(5, 'uuu', 9999, 'hhh', 'ubbu', '8989898', '2992-09-09', '02:22:00', '22:00:00', 'hihiuhu', 200, 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id` int(128) NOT NULL,
  `pemilik` int(128) NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `nama_kegiatan` varchar(128) NOT NULL,
  `asal_sertifikat` varchar(128) NOT NULL,
  `sebagai` varchar(128) NOT NULL,
  `jumlah_jam` int(128) NOT NULL,
  `file` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id`, `pemilik`, `tanggal_diterima`, `tanggal_kegiatan`, `nama_kegiatan`, `asal_sertifikat`, `sebagai`, `jumlah_jam`, `file`) VALUES
(4, 11, '2019-01-31', '2019-01-31', 'Kongres', 'FTI', 'Peserta', 20, 'images1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `pengolah` varchar(128) NOT NULL,
  `nomor_surat` varchar(128) NOT NULL,
  `tujuan` varchar(128) NOT NULL,
  `perihal` text NOT NULL,
  `jenis` varchar(16) NOT NULL,
  `file` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `tanggal_surat`, `pengolah`, `nomor_surat`, `tujuan`, `perihal`, `jenis`, `file`) VALUES
(1, '2019-01-03', 'pqweiopwq', '3123123', 'jwqiejqiow', 'sadljas', 'lkdas', 'Contoh-surat-lamaran-kerja-pdf⁃d⁃jpg1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `jenis_surat` varchar(16) NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `tanggal_surat` date NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `perihal` text NOT NULL,
  `asal_surat` varchar(128) NOT NULL,
  `disposisi` varchar(128) NOT NULL,
  `keterangan_dis` text NOT NULL,
  `file` varchar(128) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `jenis_surat`, `tanggal_diterima`, `tanggal_surat`, `no_surat`, `perihal`, `asal_surat`, `disposisi`, `keterangan_dis`, `file`) VALUES
(43, 'Umum', '2019-01-04', '2019-01-01', '01.001/SMK-AI/VIII/2017', 'Permohonan untuk meminjamkan buku ', 'SMK AI', 'Pak Tedy', 'Mohon di cek', 'surat.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(7, 'Zuflikar Ulya Zen', 'ulyazen@gmail.com', 'image.jpg', '$2y$10$kigDb.QEoi8GPlRX4WINo.80sD62h0xlOgJyvfDBZI2KSPW9yAKBu', 1, 1, 1570626518),
(8, 'Novika Puspitasari', 'vpuspita26@gmail.com', 'image.jpg', '$2y$10$s5rvl4fedPniE0ylUkFydewMdH3lRjxg8lUaI/GQpaC4flGHf8WZ6', 3, 1, 1570637224),
(9, 'admin2', 'sulapohan.ss@gmail.com', 'image.jpg', '$2y$10$00.dVbVQg66DN4TIj99Ui.dcvkQu/zagf.2EG.j/EBNh1Vj4co/GS', 3, 1, 1576483172),
(10, 'Pegawai', 'pegawai@uad.ac.id', 'image.jpg', '$2y$10$SbgyF8CBVDatOEYXl1jr4u0vCdgidlbrxZ1IxYoDRW0JJt0IwO0BW', 2, 1, 1576743860),
(11, 'Alvi', 'alvi@gmail.com', 'image.jpg', '$2y$10$RWJDVcl2dKto70/F.4thJejzrdcmjZCN4EVQKK4g2k9wVWFessIP2', 1, 1, 1578315677),
(12, 'Admin', 'admin@uad.ac.id', 'image.jpg', '$2y$10$v7kfYeq679QqSUsW/tXkwOVeo8ekPA91uErSNO1KY9nn.VEWAzOhq', 1, 1, 1578369743),
(13, 'Ana Pujiastuti', 'ana.pujiastuti@staff.uad.ac.id', 'image.jpg', '$2y$10$9bqGfAtnESDgG/yOcFBMJ.rRRhdvCGKcaeT0DVQ/j1SSzGtp.si7a', 2, 1, 1578465943),
(14, 'fadhil', 'fadhil@gmail.com', 'image.jpg', '$2y$10$Wy4YKBMVnTAnb7SpW2/Fs.gFnP3QOpki5C9thz6BtF5rC2DZY0Yya', 3, 1, 1578474404);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Pegawai'),
(3, 'User\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peminjaman_ruang`
--
ALTER TABLE `peminjaman_ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemilik` (`pemilik`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjaman_ruang`
--
ALTER TABLE `peminjaman_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `sertifikat_ibfk_1` FOREIGN KEY (`pemilik`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
