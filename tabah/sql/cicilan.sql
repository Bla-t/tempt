-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2015 at 10:13 PM
-- Server version: 5.5.45-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tabah_nyicil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabah_barang`
--

CREATE TABLE IF NOT EXISTS `tabah_barang` (
  `kd_barang` int(5) NOT NULL AUTO_INCREMENT,
  `nm_barang` varchar(30) NOT NULL,
  `kd_kategori` varchar(3) NOT NULL,
  `ket_barang` text NOT NULL,
  `tgl_simpan` date NOT NULL,
  `jam_simpan` time NOT NULL,
  `td_barang` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10010 ;

--
-- Dumping data for table `tabah_barang`
--

INSERT INTO `tabah_barang` (`kd_barang`, `nm_barang`, `kd_kategori`, `ket_barang`, `tgl_simpan`, `jam_simpan`, `td_barang`) VALUES
(10000, 'Test', '0', 'Hanya tester', '0000-00-00', '00:00:00', '1'),
(10001, 'IPHONE 5', '5', '', '2015-11-14', '21:09:08', '0'),
(10002, 'OPPO NEO 5', '5', '', '2015-11-14', '21:31:43', '0'),
(10003, 'oppo neo 5', '5', '', '2015-11-14', '21:35:49', '1'),
(10004, 'ASUS ZENFONE', '5', '', '2015-11-14', '21:38:05', '0'),
(10005, 'TV LED 32" Samsung', '10', '', '2015-11-21', '07:19:50', '0'),
(10006, 'TV LG 32 Inch LED', '10', '', '2015-11-21', '07:20:04', '0'),
(10007, 'Panci Emas 24 Karatan', '0', '', '2015-11-21', '07:20:29', '0'),
(10008, 'Tas Cantik Biru', '0', '', '2015-11-21', '07:20:48', '0'),
(10009, 'kemben warna biru', '11', 'kemben plus aksesoris', '2015-11-21', '07:50:16', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tabah_cicilan`
--

CREATE TABLE IF NOT EXISTS `tabah_cicilan` (
  `kd_cicilan` int(7) NOT NULL AUTO_INCREMENT,
  `kd_peminjam` int(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `kd_barang` int(5) NOT NULL,
  `nil_harga` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Total Harga Barang',
  `tgl_simpan` date NOT NULL,
  `jam_simpan` time NOT NULL,
  `td_cicilan` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_cicilan`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1000002 ;

--
-- Dumping data for table `tabah_cicilan`
--

INSERT INTO `tabah_cicilan` (`kd_cicilan`, `kd_peminjam`, `tgl_pinjam`, `kd_barang`, `nil_harga`, `tgl_simpan`, `jam_simpan`, `td_cicilan`) VALUES
(1000000, 10001, '2015-07-01', 10007, '2300000', '2015-11-21', '07:22:28', '0'),
(1000001, 10002, '2015-08-01', 10009, '300000', '2015-11-21', '07:52:06', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tabah_kategori`
--

CREATE TABLE IF NOT EXISTS `tabah_kategori` (
  `kd_kategori` int(3) NOT NULL AUTO_INCREMENT,
  `nm_kategori` varchar(30) NOT NULL,
  `ket_kategori` text NOT NULL,
  `tgl_simpan` date NOT NULL,
  `jam_simpan` time NOT NULL,
  `td_kategori` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tabah_kategori`
--

INSERT INTO `tabah_kategori` (`kd_kategori`, `nm_kategori`, `ket_kategori`, `tgl_simpan`, `jam_simpan`, `td_kategori`) VALUES
(0, 'Tak Berkategori', 'Merupakan Kategori Bawaan, Hanya Untuk Barang Tak Berkategori.', '2015-11-03', '08:11:19', '0'),
(8, 'handphone', '', '2015-11-14', '21:40:41', '1'),
(9, 'handphone', '', '2015-11-14', '21:41:38', '1'),
(6, 'handpone', '', '2015-11-14', '21:19:45', '1'),
(7, 'handphone', '', '2015-11-14', '21:39:25', '1'),
(5, 'HAND PHONE', 'Semua barang berjenis smartphone dan hand phone celuller, di sini tempatnya...', '2015-11-14', '21:12:30', '0'),
(10, 'TELEVISI', 'Semua Barang Berjenis TV, ada di sini..', '2015-11-21', '07:19:27', '0'),
(11, 'BAJU WANITA', 'dress\r\n', '2015-11-21', '07:48:14', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tabah_nilai_cicilan`
--

CREATE TABLE IF NOT EXISTS `tabah_nilai_cicilan` (
  `kd_nilai` int(10) NOT NULL AUTO_INCREMENT COMMENT 'untuk tabel ini',
  `kd_cicilan` int(7) NOT NULL COMMENT 'kode cicilan per barang',
  `cicilanke` int(2) NOT NULL COMMENT 'cicilan ke nilainya terserah',
  `angka_nilai` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Angka rupiah di sini',
  `tgl_tempo` date NOT NULL COMMENT 'Jatuh tempo',
  `td_lunas` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_nilai`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tabah_nilai_cicilan`
--

INSERT INTO `tabah_nilai_cicilan` (`kd_nilai`, `kd_cicilan`, `cicilanke`, `angka_nilai`, `tgl_tempo`, `td_lunas`) VALUES
(1, 1000000, 1, '23444', '2015-07-31', '0'),
(2, 1000000, 2, '2344', '2015-08-30', '0'),
(3, 1000000, 3, '23444', '2015-09-29', '0'),
(4, 1000000, 4, '23444', '2015-10-29', '0'),
(5, 1000000, 5, '2334', '2015-11-28', '0'),
(6, 1000000, 6, '564433', '2015-12-28', '0'),
(7, 1000001, 1, '50000', '2015-08-31', '1'),
(8, 1000001, 2, '', '2015-09-30', '1'),
(9, 1000001, 3, '', '2015-10-30', '1'),
(10, 1000001, 4, '', '2015-11-29', '0'),
(11, 1000001, 5, '', '2015-12-29', '0'),
(12, 1000001, 6, '', '2016-01-28', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tabah_peminjam`
--

CREATE TABLE IF NOT EXISTS `tabah_peminjam` (
  `kd_peminjam` int(5) NOT NULL AUTO_INCREMENT,
  `nm_peminjam` varchar(30) NOT NULL,
  `idc_peminjam` varchar(40) NOT NULL,
  `amt_peminjam` text NOT NULL,
  `tlp_peminjam` varchar(30) NOT NULL,
  `tgl_simpan` date NOT NULL,
  `jam_simpan` time NOT NULL,
  `td_peminjam` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_peminjam`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10003 ;

--
-- Dumping data for table `tabah_peminjam`
--

INSERT INTO `tabah_peminjam` (`kd_peminjam`, `nm_peminjam`, `idc_peminjam`, `amt_peminjam`, `tlp_peminjam`, `tgl_simpan`, `jam_simpan`, `td_peminjam`) VALUES
(10000, '', '', '', '', '0000-00-00', '00:00:00', '1'),
(10001, 'Lorem Ipsum', 'A32112299876737', 'Jl. Gedi Anumu, Jawa Selatan', 'Telpon Saja Aku', '2015-11-21', '07:21:50', '0'),
(10002, 'siska', '16710', 'r.sukamto', '089766545556', '2015-11-21', '07:46:26', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tabah_usaha`
--

CREATE TABLE IF NOT EXISTS `tabah_usaha` (
  `kd_usaha` int(5) NOT NULL AUTO_INCREMENT,
  `nm_usaha` varchar(60) NOT NULL,
  `alm_usaha` text NOT NULL,
  `logo_usaha` varchar(300) NOT NULL DEFAULT 'takberlogo.jpg',
  `tgl_simpan` date NOT NULL,
  `jam_simpan` time NOT NULL,
  `td_usaha` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_usaha`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10073 ;

--
-- Dumping data for table `tabah_usaha`
--

INSERT INTO `tabah_usaha` (`kd_usaha`, `nm_usaha`, `alm_usaha`, `logo_usaha`, `tgl_simpan`, `jam_simpan`, `td_usaha`) VALUES
(10001, 'Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'tak-berlogo.jpg 	', '2015-11-16', '16:27:00', '1'),
(10002, 'Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'tak-berlogo.jpg 	', '2015-11-16', '17:07:03', '1'),
(10003, 'Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'tak-berlogo.jpg 	', '2015-11-16', '17:07:07', '1'),
(10004, 'Khasan Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'tak-berlogo.jpg 	', '2015-11-16', '17:08:27', '1'),
(10005, 'Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'tak-berlogo.jpg 	', '2015-11-16', '17:08:34', '1'),
(10006, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'tak-berlogo.jpg 	', '2015-11-17', '06:09:38', '1'),
(10007, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'tak-berlogo.jpg 	', '2015-11-17', '06:10:16', '1'),
(10008, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'tak-berlogo.jpg 	', '2015-11-17', '16:59:39', '1'),
(10009, 'CV. Tabah Mandiri', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'tak-berlogo.jpg 	', '2015-11-17', '16:59:50', '1'),
(10010, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'takberlogo.jpg', '2015-11-17', '16:59:55', '1'),
(10011, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', '', '2015-11-18', '07:17:31', '1'),
(10012, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'takberlogo.jpg', '2015-11-18', '07:18:16', '1'),
(10013, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', '', '2015-11-18', '07:23:10', '1'),
(10014, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', '', '2015-11-18', '07:23:13', '1'),
(10015, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'takberlogo.jpg', '2015-11-18', '07:23:18', '1'),
(10016, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', '', '2015-11-18', '07:24:22', '1'),
(10017, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', '', '2015-11-18', '13:11:22', '1'),
(10018, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'takberlogo.jpg', '2015-11-18', '13:11:25', '1'),
(10019, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', '', '2015-11-18', '13:11:43', '1'),
(10020, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'takberlogo.jpg', '2015-11-18', '13:11:47', '1'),
(10021, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', '', '2015-11-18', '13:12:20', '1'),
(10022, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'takberlogo.jpg', '2015-11-18', '13:12:22', '1'),
(10023, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', '', '2015-11-18', '13:12:24', '1'),
(10024, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'takberlogo.jpg', '2015-11-18', '13:19:37', '1'),
(10025, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', '', '2015-11-18', '13:19:38', '1'),
(10026, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', '', '2015-11-18', '13:19:42', '1'),
(10027, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'takberlogo.jpg', '2015-11-18', '13:19:44', '1'),
(10028, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', '', '2015-11-18', '13:20:32', '1'),
(10029, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'takberlogo.jpg', '2015-11-18', '13:20:34', '1'),
(10030, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', '', '2015-11-18', '13:20:42', '1'),
(10031, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'takberlogo.jpg', '2015-11-18', '13:22:33', '1'),
(10032, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'logo.jpg', '2015-11-18', '13:28:10', '1'),
(10033, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'takberlogo.jpg', '2015-11-18', '13:28:15', '1'),
(10034, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'logo.jpg', '2015-11-18', '13:28:34', '1'),
(10035, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'takberlogo.jpg', '2015-11-18', '13:30:20', '1'),
(10036, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'logo.jpg', '2015-11-18', '13:30:24', '1'),
(10037, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'takberlogo.jpg', '2015-11-18', '13:47:27', '1'),
(10038, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', '', '2015-11-18', '13:48:43', '1'),
(10039, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'takberlogo.jpg', '2015-11-18', '13:48:48', '1'),
(10040, 'CV. Tabah Mandiri Cicilan', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'takberlogo.jpg', '2015-11-18', '13:53:35', '1'),
(10041, 'CV. Tabah Mandiri Cicilanku', 'Jl. Tentara Pelajar No. 12A\r\nJakarta Selatan', 'takberlogo.jpg', '2015-11-18', '13:53:45', '1'),
(10042, 'CV. Tabah Mandiri Cicilan', '', 'takberlogo.jpg', '2015-11-18', '13:54:04', '1'),
(10043, 'CV. Tabah Mandiri Cicilan', '', 'rss_logo_gray_small.jpg', '2015-11-18', '13:55:50', '1'),
(10044, 'CV. Tabah Mandiri Cicilan', '', 'takberlogo.jpg', '2015-11-18', '13:58:12', '1'),
(10045, 'CV. Tabah Mandiri Cicilan', '', '', '2015-11-18', '14:00:34', '1'),
(10046, 'CV. Tabah Mandiri Cicilan', '', 'takberlogo.jpg', '2015-11-18', '14:00:58', '1'),
(10047, 'CV. Tabah Mandiri Cicilan', '', 'takberlogo.jpg', '2015-11-18', '14:03:35', '1'),
(10048, 'CV. Tabah Mandiri Cicilan', '', 'rss_logo_gray_small.jpg', '2015-11-18', '14:04:18', '1'),
(10049, 'CV. Tabah Mandiri Cicilan', '', 'rss_logo_gray_small.jpg', '2015-11-18', '14:04:22', '1'),
(10050, 'CV. Tabah Mandiri Cicilan', '', 'rss_logo_gray_small.jpg', '2015-11-18', '14:04:25', '1'),
(10051, 'CV. Tabah Mandiri Cicilan', '', 'takberlogo.jpg', '2015-11-18', '14:04:29', '1'),
(10052, 'CV. Tabah Mandiri Cicilan', '', 'takberlogo.jpg', '2015-11-18', '14:04:32', '1'),
(10053, 'CV. Tabah Mandiri Cicilan', '', 'takberlogo.jpg', '2015-11-18', '14:04:34', '1'),
(10054, 'CV. Tabah Mandiri Cicilan', '', 'rss_logo_gray_small.jpg', '2015-11-18', '14:05:00', '1'),
(10055, 'CV. Tabah Mandiri Cicilan', '', 'takberlogo.jpg', '2015-11-18', '16:56:24', '1'),
(10056, 'CV. Tabah Mandiri Cicilan', '', 'rss_logo_gray_small.jpg', '2015-11-18', '16:57:00', '1'),
(10057, 'CV. Tabah Mandiri Cicilan', '', 'takberlogo.jpg', '2015-11-18', '17:09:44', '1'),
(10058, 'CV. Tabah Mandiri Cicilan', '', 'twitter_logo.gif', '2015-11-18', '17:09:53', '1'),
(10059, 'CV. Tabah Mandiri Cicilan', '', 'takberlogo.jpg', '2015-11-18', '22:06:34', '1'),
(10060, 'CV. Tabah Mandiri Cicilan', '', 'fb_logo.png', '2015-11-18', '22:06:49', '1'),
(10061, 'CV. Tabah Mandiri Cicilan', '', 'takberlogo.jpg', '2015-11-18', '22:06:54', '1'),
(10062, 'CV. Tabah Mandiri Cicilan', '', 'twitter_logo.png', '2015-11-18', '22:06:59', '1'),
(10063, 'CV. Tabah Mandiri Cicilan', 'Jl. Kuningan Barat 2A\r\nJakarta', 'twitter_logo.png', '2015-11-18', '22:07:35', '1'),
(10064, 'CV. Tabah Mandiri Cicilan', 'Jl. Kuningan Barat 2A\r\nJakarta', 'takberlogo.jpg', '2015-11-18', '22:09:51', '1'),
(10065, 'CV. Tabah Mandiri Cicilan', 'Jl. Kuningan Barat 2A\r\nJakarta', 'fb_logo.png', '2015-11-18', '22:09:56', '1'),
(10066, 'CV. Tabah Mandiri Cicilan', 'Jl. Kuningan Barat 2A\r\nJakarta', 'takberlogo.jpg', '2015-11-19', '11:35:12', '1'),
(10067, 'CV. Tabah Mandiri Cicilan', 'Jl. Kuningan Barat 2A\r\nJakarta', 'kopi.jpg', '2015-11-19', '11:35:59', '1'),
(10068, 'CV. Tabah Mandiri Cicilan', 'Jl. Kuningan Barat 2A\r\nJakarta', 'takberlogo.jpg', '2015-11-19', '13:50:58', '1'),
(10069, 'CV. Tabah Mandiri Cicilan', 'Jl. Kuningan Barat 2A\r\nJakarta', 'twitter_logo.gif', '2015-11-19', '13:51:38', '1'),
(10070, 'CV. Tabah Mandiri Cicilan', 'Jl. Kuningan Barat 2A\r\nJakarta', 'takberlogo.jpg', '2015-11-21', '06:30:14', '1'),
(10071, 'CV. Tabah Mandiri Cicilan', 'Jl. Kuningan Barat 2A\r\nJakarta', 'takberlogo.jpg', '2015-11-21', '06:31:13', '1'),
(10072, 'ASANOER Software Corp.', 'Jl. Manggis 20A No. 1 Kemuning, \r\nJawa Tengah 53322', 'takberlogo.jpg', '2015-11-21', '07:17:54', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tabah_user`
--

CREATE TABLE IF NOT EXISTS `tabah_user` (
  `kd_user` int(5) NOT NULL AUTO_INCREMENT,
  `lengkap_user` varchar(50) NOT NULL DEFAULT 'Pengguna',
  `nm_user` varchar(20) NOT NULL,
  `sd_user` varchar(200) NOT NULL,
  `email_user` varchar(100) NOT NULL DEFAULT 'khasan@asanoer.com',
  `sbg_user` varchar(1) NOT NULL DEFAULT '0' COMMENT 'Untuk User Sebagai',
  `tlp_user` varchar(30) NOT NULL,
  `tgl_simpan` date NOT NULL,
  `jam_simpan` time NOT NULL,
  `td_user` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10004 ;

--
-- Dumping data for table `tabah_user`
--

INSERT INTO `tabah_user` (`kd_user`, `lengkap_user`, `nm_user`, `sd_user`, `email_user`, `sbg_user`, `tlp_user`, `tgl_simpan`, `jam_simpan`, `td_user`) VALUES
(10003, 'ASANOER.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'demo@demo.asanoer.com', '2', '0221122333', '2015-11-21', '06:18:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tabah_user_sbg`
--

CREATE TABLE IF NOT EXISTS `tabah_user_sbg` (
  `kd_sbg` int(2) NOT NULL AUTO_INCREMENT,
  `nm_sbg` varchar(20) NOT NULL DEFAULT 'pengguna biasa',
  PRIMARY KEY (`kd_sbg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tabah_user_sbg`
--

INSERT INTO `tabah_user_sbg` (`kd_sbg`, `nm_sbg`) VALUES
(1, 'Administrator'),
(2, 'pengguna biasa');
