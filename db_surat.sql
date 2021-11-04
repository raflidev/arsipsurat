-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 02:59 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username_admin`, `password`) VALUES
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 'admin2', 'admin2', '315f166c5aca63a157f7d41007675cb44a948b33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_arsip_suratkeluar`
--

CREATE TABLE `tb_arsip_suratkeluar` (
  `id_arsipkeluar` int(11) NOT NULL,
  `id_suratkeluar` int(11) NOT NULL,
  `no_box` int(11) NOT NULL,
  `no_rak` int(11) NOT NULL,
  `no_fisis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_arsip_suratkeluar`
--

INSERT INTO `tb_arsip_suratkeluar` (`id_arsipkeluar`, `id_suratkeluar`, `no_box`, `no_rak`, `no_fisis`) VALUES
(2, 27, 11, 1, 112);

-- --------------------------------------------------------

--
-- Table structure for table `tb_arsip_suratmasuk`
--

CREATE TABLE `tb_arsip_suratmasuk` (
  `id_arsipmasuk` int(11) NOT NULL,
  `id_suratmasuk` int(11) NOT NULL,
  `no_box` int(11) NOT NULL,
  `no_rak` int(11) NOT NULL,
  `no_fisis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_arsip_suratmasuk`
--

INSERT INTO `tb_arsip_suratmasuk` (`id_arsipmasuk`, `id_suratmasuk`, `no_box`, `no_rak`, `no_fisis`) VALUES
(1, 2, 1, 2, 2),
(3, 5, 3, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bagian`
--

CREATE TABLE `tb_bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(120) NOT NULL,
  `username_admin_bagian` varchar(50) NOT NULL,
  `password_bagian` varchar(50) NOT NULL,
  `nama_lengkap` varchar(70) NOT NULL,
  `tanggal_lahir_bagian` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp_bagian` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bagian`
--

INSERT INTO `tb_bagian` (`id_bagian`, `nama_bagian`, `username_admin_bagian`, `password_bagian`, `nama_lengkap`, `tanggal_lahir_bagian`, `alamat`, `no_hp_bagian`) VALUES
(1, 'WALIKOTA', 'walikota', 'daaf9486f7039e0087f268db4215998bfb6185cb', 'walikota', '2017-05-25', 'samarinda', '081222222222'),
(2, 'WAKIL WALIKOTA', 'wawali', '61e1322f11261e3c4c9c8631f86bc70237c5ee42', 'wawali', '2017-11-04', 'samarinda', '081222222222'),
(3, 'SEKDA', 'sekda', 'ba09b363755a11c5a46f1be9a8dd6e579a1c75b7', 'SEKDA', '2017-11-10', 'Samarinda', '081299101309'),
(4, 'PLH.SEKDA', 'plh sekda', 'ce26252389e1562bdd0a4094270b2cfb2d16f6be', 'plh sekda', '2017-11-10', 'Samarinda', '087731311111'),
(5, 'ASS.I', 'ass i', '972a3c20bb3d97797348df57ec7d81185de5ce17', 'ass i', '2017-11-10', 'samarinda', '322222222222'),
(6, 'PLT.ASS.I', 'plt ass i', '4182b75e1a82d3e2d1751e9d903eefad6a80d212', 'plt ass i', '2017-11-03', 'samarinda', '233333333333'),
(7, 'PLT.ASS.II', 'plt ass ii', '3f17afaf0a4238fdd1ddc0c3a88686fb96f5c68c', 'plt ass ii', '2017-11-10', 'bpp', '344444444444'),
(8, 'ASS.III', 'ass iii', 'fed0054dcfee81465402afa25f65e9f66cb697af', 'ass iii', '2017-11-01', 'bpp', '222222222222'),
(9, 'UMUM', 'umum', 'b617726c7f45ecb196ef74881089fa17d90d7276', 'umum', '2017-11-17', 'smd', '333333333333'),
(10, 'TU', 'tu', 'a3da4c6307d230e1f1c8ad62e00d05ff1f1f5b52', 'tu', '2017-11-10', 'badak', '24224242'),
(11, 'KESRA', 'kesra', '983a6611e9d0f6e5601896247285eb2858ff46bd', 'kesra', '2017-11-17', 'bpp', '098979989999'),
(12, 'ADM.PEMB', 'adm pemb', '263bca10cf6fe2407537f3da354c2a5bd41f0046', 'adm pemb', '2017-11-07', 'samarinda', '089836323711'),
(13, 'ORTAL', 'ortal', '1e760e356d62c56a70893e1d3843c1c89b4a2212', 'ortal', '2017-11-13', 'samarinda', '081299101309'),
(14, 'PEM-OTDA', 'pem-otda', '278f69af54d64f658a430ecc6e060a9c936cba75', 'pem-otda', '2017-11-13', 'samarinda', '081222222222'),
(15, 'EKONOMI & SDA', 'ekonomi', 'edbc608bc611081ad29a586f1a328fc553a83cb5', 'ekonomi', '2017-11-15', 'samarinda', '081299101309'),
(16, 'HUKUM', 'hukum', 'ab86e34c8b761c9e534f9c020f83cb927c1ad673', 'hukum', '2017-11-15', 'Balikpapan', '081222222222'),
(17, 'BKPPD', 'bkppd', '50818d7e0331a1dec698c35c32af22556f90fb1a', 'bkppd', '2017-12-01', 'samarinda', '081299101309'),
(18, 'PROTOKOL', 'protokol', 'a50492e61cab897b02e491d340de4083cb74f537', 'protokol', '2017-12-01', 'samarinda', '081242424223'),
(19, 'HUMAS', 'humas', 'b4c4048e1c66effb3ac466b6f33df58c0e93672c', 'humas', '2017-12-01', 'samarinda', '081344444444'),
(20, 'INFRASTRUKTUR', 'infrastruktur', 'cc48a8c41985da07efc915fea8fc0ac3bec7f0e9', 'infrastruktur', '2017-12-01', 'smd', '083455253225');

-- --------------------------------------------------------

--
-- Table structure for table `tb_disposisi`
--

CREATE TABLE `tb_disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `id_suratmasuk` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_disposisi`
--

INSERT INTO `tb_disposisi` (`id_disposisi`, `id_suratmasuk`, `id_bagian`, `pesan`) VALUES
(6, 36, 1, 'yaya walikota'),
(7, 36, 9, 'umum'),
(8, 3, 9, 'nice'),
(9, 5, 3, 'laporan telah diterima'),
(10, 2, 2, 'sudah diterima dengan baik'),
(11, 8, 2, 'bagus.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratkeluar`
--

CREATE TABLE `tb_suratkeluar` (
  `id_suratkeluar` int(11) NOT NULL,
  `tanggalkeluar_suratkeluar` datetime NOT NULL,
  `kode_suratkeluar` varchar(10) NOT NULL,
  `nomor_suratkeluar` varchar(45) NOT NULL,
  `nama_bagian` varchar(70) NOT NULL,
  `tanggalsurat_suratkeluar` date NOT NULL,
  `kepada_suratkeluar` varchar(255) NOT NULL,
  `perihal_suratkeluar` text NOT NULL,
  `file_suratkeluar` varchar(255) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `tanggal_entry` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_suratkeluar`
--

INSERT INTO `tb_suratkeluar` (`id_suratkeluar`, `tanggalkeluar_suratkeluar`, `kode_suratkeluar`, `nomor_suratkeluar`, `nama_bagian`, `tanggalsurat_suratkeluar`, `kepada_suratkeluar`, `perihal_suratkeluar`, `file_suratkeluar`, `operator`, `tanggal_entry`) VALUES
(27, '2017-11-15 11:15:00', '411', '3451/WALIKOTA/2017', 'WALIKOTA', '2017-11-15', 'Masyarakat', 'Himbauan Gotong Royong', '2021-3451.pdf', 'admin', '2021-10-22 16:23:28'),
(29, '2017-11-15 08:20:00', '851', '3453/TU/2017', 'TU', '2017-11-15', 'Kepala Bagian Tata Usaha', 'Cuti Tahunan ', '2017-3453.pdf', 'admin', '2017-11-18 02:39:32'),
(30, '2017-11-14 13:25:00', '915.1', '3454/ADM.PEMB/2017', 'ADM.PEMB', '2017-11-15', 'Walikota', 'Daftar Usulan Proyek', '2017-3454.pdf', 'admin', '2017-11-14 23:29:41'),
(31, '2017-11-17 08:30:00', '125.4', '3455/PEM-OTDA/2017', 'PEM-OTDA', '2017-11-16', 'Camat Samarida Seberang', 'Pemekaran Wilayah', '2017-3455.pdf', 'admin', '2017-11-16 02:30:02'),
(35, '2017-11-17 08:30:00', '821.1', '3452/TU/2017', 'TU', '2017-11-16', 'Kepala Bagian Lingkup Pemkot Samarinda', 'Pengangkatan Jabatan Pegawai Negeri ', '2017-3452.pdf', 'admin', '2017-11-16 17:35:35'),
(88, '2017-11-17 08:45:00', '476.4', '3456/KESRA/2017', 'KESRA', '2017-11-17', 'Lurah SE-KOTA SAMARINDA', 'Peninjauan Kampung KB', '2017-3456.pdf', 'admin', '2017-11-17 02:58:51'),
(90, '2017-11-18 08:30:00', '376', '3458/ASSIII/2017', 'ASS.III', '2017-11-18', 'Kontraktor Bangunan', 'Penindakan Bangunan tanpa surat izin mendirikan bangunan', '2017-3458.pdf', 'admin', '2017-11-18 03:19:54'),
(91, '2017-11-30 01:00:00', '454', '3457/ORTAL/2017', 'ORTAL', '2017-11-30', 'Lurah SE-KOTA SAMARINDA', 'Pelatihan Kelembagaan Desa', '2017-3457.pdf', 'admin', '2017-11-30 00:01:06'),
(92, '2017-12-06 08:17:00', '342', '3459/TU/2017', 'TU', '2017-12-06', 'CAMAT SE-KOTA SAMARINDA', 'pilgub', '2017-3459.pdf', 'admin', '2017-12-06 07:19:29'),
(93, '2021-10-14 17:38:00', '1000101', '3460', 'WALIKOTA', '2021-10-14', 'a', 'a', '2021-3460.pdf', 'admin', '2021-10-14 17:44:25'),
(94, '2021-10-14 17:38:47', '', '3461', 'WALIKOTA', '2021-10-14', '', '', '2021-3461.pdf', '', '2021-10-14 17:38:47'),
(95, '2021-10-15 17:39:00', '11011', '3462', 'UMUM', '2021-10-14', 'a', 'a', '2021-3462.pdf', 'admin', '2021-10-14 17:40:23'),
(96, '2021-10-14 17:41:11', '', '3463', 'WALIKOTA', '2021-10-14', '', '', '2021-3463.pdf', '', '2021-10-14 17:41:11'),
(97, '2021-10-14 17:41:00', '1010101', '3464', 'WALIKOTA', '2021-10-14', 'a', 'a', '2021-3464.pdf', 'admin', '2021-10-14 17:41:52'),
(99, '2021-10-17 12:59:00', '1', '3465', 'WALIKOTA', '2021-10-17', '1', '1', '2021-3465.pdf', 'admin', '2021-10-17 12:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_suratmasuk`
--

CREATE TABLE `tb_suratmasuk` (
  `id_suratmasuk` int(11) NOT NULL,
  `tanggalmasuk_suratmasuk` datetime NOT NULL DEFAULT current_timestamp(),
  `kode_suratmasuk` varchar(10) NOT NULL,
  `nomorurut_suratmasuk` varchar(7) NOT NULL,
  `nomor_suratmasuk` varchar(25) NOT NULL,
  `tanggalsurat_suratmasuk` date NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `kepada_suratmasuk` varchar(255) NOT NULL,
  `perihal_suratmasuk` text NOT NULL,
  `file_suratmasuk` varchar(255) NOT NULL,
  `operator` varchar(50) NOT NULL,
  `tanggal_entry` datetime NOT NULL DEFAULT current_timestamp(),
  `disposisi1` varchar(50) NOT NULL,
  `tanggal_disposisi1` datetime NOT NULL,
  `disposisi2` varchar(50) NOT NULL,
  `tanggal_disposisi2` datetime NOT NULL,
  `disposisi3` varchar(50) NOT NULL,
  `tanggal_disposisi3` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_suratmasuk`
--

INSERT INTO `tb_suratmasuk` (`id_suratmasuk`, `tanggalmasuk_suratmasuk`, `kode_suratmasuk`, `nomorurut_suratmasuk`, `nomor_suratmasuk`, `tanggalsurat_suratmasuk`, `pengirim`, `kepada_suratmasuk`, `perihal_suratmasuk`, `file_suratmasuk`, `operator`, `tanggal_entry`, `disposisi1`, `tanggal_disposisi1`, `disposisi2`, `tanggal_disposisi2`, `disposisi3`, `tanggal_disposisi3`) VALUES
(2, '2017-09-20 13:00:00', '900', '4518', '050/588/300.01', '2017-09-20', 'BAPPEDA KOTA SAMARINDA', 'Sekretaris Daerah', 'Penyampaian Usulan Bantuan Keuangan Pada APBD Prov.Kaltim Tahun 2018\\\\\\\\r\\\\\\\\n', '2021-4518.pdf', 'admin', '2021-10-17 11:57:22', 'WAKIL WALIKOTA', '1970-01-01 07:00:00', 'PLT.ASS.II', '2017-09-28 09:00:00', 'ADM.PEMB', '2017-09-29 10:00:00'),
(3, '2017-09-20 14:00:00', '010', '4519', '036/B/HMJELEKTRO/IX/2017', '2017-09-18', 'FORUM KOMUNIKASI HIMPUNAN MAHASISWA ELEKTRO INDONESIA WILAYAH XIII KALIMANTAN', 'UMUM', 'Permohonan\r\n', '2017-4519.pdf', 'admin2', '2017-11-14 23:43:44', 'UMUM', '2017-09-22 11:00:00', '', '1970-01-01 07:00:00', 'UMUM', '2017-09-22 11:05:00'),
(5, '2017-09-21 15:10:00', '660', '4520', '660.2/1539/100.14', '2017-09-19', 'DINAS LINGKUNGAN HIDUP KOTA SAMARINDA', 'Sekretaris Daerah', 'Penting', '2017-4520.pdf', 'admin2', '2017-11-14 23:58:01', 'SEKDA', '2017-09-21 23:00:00', 'PLT.ASS.II', '2017-09-24 21:00:00', 'EKONOMI & SDA', '2017-09-25 09:00:00'),
(6, '2017-09-26 10:00:00', '061', '4521', '061/4382/SJ', '2017-09-20', 'MENDAGRI RI', 'Organisasi', 'Surat Edaran Tentang Mekanisme Layanan Administrasi Kemendagri\r\n', '2017-4521.pdf', 'admin', '2017-12-02 21:44:11', 'ASS.III', '2017-09-26 15:00:00', '', '1970-01-01 07:00:00', 'ORTAL', '2017-09-27 11:30:00'),
(7, '2017-09-25 14:00:00', '503', '4522', '503/744/100.26', '2017-09-25', 'DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU KOTA SAMARINDA', 'PLH SEKDA', 'Tindak Lanjut Permohonan Penghapusan Denda Retribusi IMB PT.Borneo Inti Graha\r\n', '2017-4522.pdf', 'admin', '2017-12-06 00:32:23', 'PLH.SEKDA', '2017-09-26 10:00:00', '', '1970-01-01 07:00:00', 'HUKUM', '2017-09-27 15:00:00'),
(8, '2017-12-06 08:12:00', '454', '4523 ', '4121/wawali/2017', '2017-12-06', 'pdam', 'wawali', 'air', '2017-4523.pdf', 'admin', '2017-12-06 07:15:07', 'WAKIL WALIKOTA', '2017-12-14 08:14:00', 'ADM.PEMB', '2017-12-12 08:14:00', 'PEM-OTDA', '2017-12-13 08:15:00'),
(36, '2021-10-17 21:07:00', '1', '4524', '1', '2021-10-17', '1', '1', '1', '2021-4524.pdf', 'admin', '2021-10-28 21:23:04', 'WALIKOTA', '1970-01-01 07:00:00', 'UMUM', '1970-01-01 07:00:00', '', '1970-01-01 07:00:00'),
(37, '2021-10-17 21:09:00', '1', '4525', '1', '2021-10-17', '1', '1', '1', '2021-4525.pdf', 'admin', '2021-10-17 21:10:12', '', '1970-01-01 07:00:00', '', '1970-01-01 07:00:00', '', '1970-01-01 07:00:00'),
(38, '2021-10-17 21:11:00', '1', '4526', '1', '2021-10-17', '1', '1', '1', '2021-4526.pdf', 'admin', '2021-10-17 21:11:26', '', '1970-01-01 07:00:00', '', '1970-01-01 07:00:00', '', '1970-01-01 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tu`
--

CREATE TABLE `tb_tu` (
  `id_tu` int(11) NOT NULL,
  `nama_tu` varchar(60) NOT NULL,
  `ttd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tu`
--

INSERT INTO `tb_tu` (`id_tu`, `nama_tu`, `ttd`) VALUES
(2, 'Isnan Akbar, A.Md.,', 'ttd.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username_admin` (`username_admin`);

--
-- Indexes for table `tb_arsip_suratkeluar`
--
ALTER TABLE `tb_arsip_suratkeluar`
  ADD PRIMARY KEY (`id_arsipkeluar`),
  ADD UNIQUE KEY `id_suratkeluar` (`id_suratkeluar`);

--
-- Indexes for table `tb_arsip_suratmasuk`
--
ALTER TABLE `tb_arsip_suratmasuk`
  ADD PRIMARY KEY (`id_arsipmasuk`),
  ADD UNIQUE KEY `id_suratmasuk` (`id_suratmasuk`);

--
-- Indexes for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`id_bagian`),
  ADD UNIQUE KEY `username_admin_bagian` (`username_admin_bagian`);

--
-- Indexes for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  ADD PRIMARY KEY (`id_suratkeluar`),
  ADD UNIQUE KEY `nomor_suratkeluar` (`nomor_suratkeluar`);

--
-- Indexes for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  ADD PRIMARY KEY (`id_suratmasuk`),
  ADD UNIQUE KEY `nomorurut_suratmasuk` (`nomorurut_suratmasuk`);

--
-- Indexes for table `tb_tu`
--
ALTER TABLE `tb_tu`
  ADD PRIMARY KEY (`id_tu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_arsip_suratkeluar`
--
ALTER TABLE `tb_arsip_suratkeluar`
  MODIFY `id_arsipkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_arsip_suratmasuk`
--
ALTER TABLE `tb_arsip_suratmasuk`
  MODIFY `id_arsipmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_suratkeluar`
--
ALTER TABLE `tb_suratkeluar`
  MODIFY `id_suratkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `tb_suratmasuk`
--
ALTER TABLE `tb_suratmasuk`
  MODIFY `id_suratmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_tu`
--
ALTER TABLE `tb_tu`
  MODIFY `id_tu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
