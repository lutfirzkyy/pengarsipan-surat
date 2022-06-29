-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 08:52 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_lutfi`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi_surat`
--

CREATE TABLE `disposisi_surat` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `sifat` varchar(100) NOT NULL,
  `tanggal_disposisi` date NOT NULL,
  `isi_disposisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposisi_surat`
--

INSERT INTO `disposisi_surat` (`id`, `no_surat`, `tanggal_surat`, `pengirim`, `perihal`, `sifat`, `tanggal_disposisi`, `isi_disposisi`) VALUES
(1, '01/SM/2022', '2022-06-18', 'udin', 'undangan', 'BIASA', '2022-06-18', 'lanjutkan');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `keterangan`) VALUES
(1, 'Staff', ''),
(2, 'Direktur', ''),
(3, 'Humas', '');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_pegawai`
--

CREATE TABLE `kegiatan_pegawai` (
  `id` int(11) NOT NULL,
  `kode_kegiatan` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telepon` varchar(16) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `tanggal_kegiatan` date NOT NULL,
  `tempat_kegiatan` varchar(100) NOT NULL,
  `alamat_kegiatan` varchar(100) NOT NULL,
  `verifikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_pegawai`
--

INSERT INTO `kegiatan_pegawai` (`id`, `kode_kegiatan`, `nik`, `nama`, `no_telepon`, `jabatan`, `nama_kegiatan`, `tanggal_kegiatan`, `tempat_kegiatan`, `alamat_kegiatan`, `verifikasi`) VALUES
(1, '001/2022', '321', 'madun', '083141025824', 'Humas', 'tes', '2022-06-18', 'aula', 'bjm', 'Diajukan');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `no_telepon` varchar(16) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `username`, `password`, `role`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `no_telepon`, `alamat`, `jabatan`, `foto`) VALUES
(1, 'PGW-001', '1', 'pegawai', '321', 'madun', 'bjm', '1994-06-18', 'Laki-Laki', 'Islam', '083141025824', 'jalan cemara', 'Humas', '429d0-avatar.png'),
(3, 'admin', 'admin', 'admin', '', 'Administrator', '', '0000-00-00', '', '', '083141025824', '', '', ''),
(4, 'kepala dinas', 'dinas', 'kepala dinas', '', 'Kepala Dinas', '', '0000-00-00', '', '', '081350292831', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sppd`
--

CREATE TABLE `sppd` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  `verifikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sppd`
--

INSERT INTO `sppd` (`id`, `no_surat`, `tanggal_surat`, `tujuan`, `nik`, `nama`, `no_telepon`, `jabatan`, `tanggal_berangkat`, `tanggal_kembali`, `keperluan`, `lampiran`, `verifikasi`) VALUES
(1, '001/SPPD/2022', '2022-06-18', 'dispora bjb', '321', 'madun', '083141025824', 'Humas', '2022-06-18', '2022-06-19', 'menghadiri rapat', '277e3-pdo.png', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `surat_balasan`
--

CREATE TABLE `surat_balasan` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `no_surat_keluar` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `sifat` varchar(100) NOT NULL,
  `keterangan_balasan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_balasan`
--

INSERT INTO `surat_balasan` (`id`, `no_surat`, `tanggal`, `no_surat_keluar`, `tujuan`, `perihal`, `sifat`, `keterangan_balasan`) VALUES
(1, '001/SB/2022', '2022-06-18', '001/SK/2022', 'dispora bjb', 'undangan', 'BIASA', 'lanjutkan');

-- --------------------------------------------------------

--
-- Table structure for table `surat_izin`
--

CREATE TABLE `surat_izin` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `tanggal_mulai_izin` date NOT NULL,
  `tanggal_selesai_izin` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  `verifikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `sifat` varchar(100) NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  `verifikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `no_surat`, `tanggal_surat`, `tujuan`, `perihal`, `sifat`, `lampiran`, `verifikasi`) VALUES
(1, '001/SK/2022', '2022-06-18', 'dispora bjb', 'undangan', 'BIASA', '', 'Diizinkan');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `pengirim` varchar(100) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `sifat` varchar(100) NOT NULL,
  `lampiran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `no_surat`, `tanggal_surat`, `tanggal_terima`, `pengirim`, `perihal`, `sifat`, `lampiran`) VALUES
(1, '01/SM/2022', '2022-06-18', '2022-06-18', 'udin', 'undangan', 'BIASA', '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  `verifikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_tugas`
--

INSERT INTO `surat_tugas` (`id`, `no_surat`, `tanggal_surat`, `nik`, `nama`, `no_telepon`, `jabatan`, `tujuan`, `tanggal_berangkat`, `tanggal_kembali`, `keperluan`, `lampiran`, `verifikasi`) VALUES
(1, '001/ST/2022', '2022-06-18', '321', 'madun', '083141025824', 'Humas', 'dispora bjb', '2022-06-18', '2022-06-24', 'sosialisasi', 'b1337-pdo.png', 'Diizinkan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role` enum('admin','kepala dinas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin'),
(3, 'kepala dinas', '827ccb0eea8a706c4c34a16891f84e7b', 'Kepala Dinas', 'kepala dinas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi_surat`
--
ALTER TABLE `disposisi_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan_pegawai`
--
ALTER TABLE `kegiatan_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sppd`
--
ALTER TABLE `sppd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_balasan`
--
ALTER TABLE `surat_balasan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_izin`
--
ALTER TABLE `surat_izin`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposisi_surat`
--
ALTER TABLE `disposisi_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kegiatan_pegawai`
--
ALTER TABLE `kegiatan_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sppd`
--
ALTER TABLE `sppd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `surat_balasan`
--
ALTER TABLE `surat_balasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `surat_izin`
--
ALTER TABLE `surat_izin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
