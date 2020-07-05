-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2019 at 11:05 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paude`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `id_assignment` int(11) NOT NULL,
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`id_assignment`, `item_name`, `user_id`, `created_at`) VALUES
(1, 'Admin', '1', 0),
(2, 'user', '2', 2147483647),
(3, 'user', '3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `id_aunt` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `tipe` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`id_aunt`, `name`, `tipe`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 'hak akses admin', 10101010, 10101001),
(3, 'user', 1, 'hak akses user', 10101010, 10101001);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `idc` int(11) NOT NULL,
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`idc`, `parent`, `child`) VALUES
(1, 'Admin', '15'),
(2, 'Admin', '22'),
(3, 'Admin', '33'),
(14, 'Admin', '46'),
(15, 'Admin', '47'),
(16, 'Admin', '48'),
(27, 'Admin', '39'),
(28, 'Admin', '40'),
(40, 'Admin', '12'),
(42, 'Admin', '41'),
(43, 'user', '12'),
(45, 'Admin', '49'),
(46, 'Admin', '50');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dataktp`
--

CREATE TABLE `dataktp` (
  `id_dataktp` int(11) NOT NULL,
  `nik` varchar(18) NOT NULL,
  `nama_ktp` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('','Laki-Laki','Perempuan','Ex') NOT NULL,
  `gol_darah` enum('','O','A','B','AB') NOT NULL,
  `alamat` text NOT NULL,
  `rt` int(3) NOT NULL,
  `rw` int(3) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `agama` enum('','Islam','Kristen','Khatolik','Hindu','Budha','Konghucu','Kepercayaan') NOT NULL,
  `pendidik` varchar(30) NOT NULL,
  `status_perkawinan` enum('','Belum Kawin','Kawin','Cerai','Cerai Mati') NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `kewarganegaraan` varchar(100) NOT NULL,
  `berlaku` varchar(100) NOT NULL,
  `gambar_scan` text NOT NULL,
  `idscanrfid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataktp`
--

INSERT INTO `dataktp` (`id_dataktp`, `nik`, `nama_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `gol_darah`, `alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `agama`, `pendidik`, `status_perkawinan`, `pekerjaan`, `kewarganegaraan`, `berlaku`, `gambar_scan`, `idscanrfid`) VALUES
(1, '123', 'adi', 'malang', '1998-10-18', 'Laki-Laki', 'A', 'jl. karya timur', 3, 4, 'Ngawonggo', 'Tajinan', 'Kab. Malang', 'Jawa Timur', 'Islam', 'TIDAK / BELUM SEKOLAH', 'Belum Kawin', 'Swasta', 'WNI', 'Seumur Hidup', '', 0),
(2, '124', 'yudi', 'jombanh', '1998-10-19', 'Laki-Laki', 'A', 'jl. Industri', 1, 4, 'Ngawonggo', 'Tajinan', 'Kab. Malang', 'Jawa Timur', 'Islam', 'TAMAT SD / SEDERAJAT', 'Belum Kawin', 'Wirausaha', 'WNI', 'Seumur Hidup', '', 0),
(3, '125', 'maman', 'surabaya', '1998-10-20', 'Laki-Laki', 'AB', 'jl. Industri', 1, 4, 'Ngawonggo', 'Tajinan', 'Kab. Malang', 'Jawa Timur', 'Kristen', 'SMP/SEDERAJAT', 'Belum Kawin', 'Swasta', 'WNI', 'Seumur Hidup', '', 0),
(4, '126', 'arsi', 'kudus', '1998-10-21', 'Laki-Laki', 'AB', 'jl. Industri', 1, 4, 'Ngawonggo', 'Tajinan', 'Kab. Malang', 'Jawa Timur', 'Islam', 'SMA / SEDERAJAT', 'Belum Kawin', 'Swasta', 'WNI', 'Seumur Hidup', '', 0),
(5, '127', 'rani', 'sleman', '1998-10-22', 'Perempuan', 'O', 'jl. Industri', 1, 4, 'Ngawonggo', 'Tajinan', 'Kab. Malang', 'Jawa Timur', 'Islam', 'DIPLOMA I / II', 'Belum Kawin', 'Ibu Rumah Tangga', 'WNI', 'Seumur Hidup', '', 0),
(6, '128', 'yoni', 'kediri', '1998-10-23', 'Perempuan', 'O', 'jl. Industri', 1, 4, 'Ngawonggo', 'Tajinan', 'Kab. Malang', 'Jawa Timur', 'Islam', 'AKADEMI/ DIPLOMA III/S. MUDA', 'Belum Kawin', 'Ibu Rumah Tangga', 'WNI', 'Seumur Hidup', '', 0),
(7, '129', 'amanda', 'malang', '1998-10-24', 'Perempuan', 'B', 'jl. Industri', 1, 4, 'Ngawonggo', 'Tajinan', 'Kab. Malang', 'Jawa Timur', 'Islam', 'DIPLOMA IV/ STRATA I', 'Belum Kawin', 'Wirausaha', 'WNI', 'Seumur Hidup', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_domisili`
--

CREATE TABLE `data_domisili` (
  `id_domisili` int(11) NOT NULL,
  `id_dataktp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_domisili`
--

INSERT INTO `data_domisili` (`id_domisili`, `id_dataktp`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `infodesa`
--

CREATE TABLE `infodesa` (
  `id_infodesa` int(11) NOT NULL,
  `kode_wilayah` varchar(50) NOT NULL,
  `id_kota` varchar(50) NOT NULL,
  `id_kecamatan` varchar(50) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `alamat_desa` text NOT NULL,
  `telp_desa` varchar(12) NOT NULL,
  `web_desa` varchar(50) NOT NULL,
  `email_desa` varchar(50) NOT NULL,
  `kodepos` int(6) NOT NULL,
  `logo_desa` text NOT NULL,
  `kepala_desa` varchar(50) NOT NULL,
  `nip_kades` varchar(50) NOT NULL,
  `kodeproduk` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infodesa`
--

INSERT INTO `infodesa` (`id_infodesa`, `kode_wilayah`, `id_kota`, `id_kecamatan`, `nama_desa`, `alamat_desa`, `telp_desa`, `web_desa`, `email_desa`, `kodepos`, `logo_desa`, `kepala_desa`, `nip_kades`, `kodeproduk`) VALUES
(1, '12456', 'Kabupaten Malang', 'Tajinan', 'Ngawonggo', 'Jl. Suroyudo No. 181 Ngawonggo', '085100000928', 'desa-ngawonggo.malangkab.go.id', 'pemdesngawonggo@gmail.com', 65172, 'logo-login.png', 'Drs. SURI WAHYUDI', '19611006 198803 1 005', '27819');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `alias` varchar(25) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `alias`, `nama_kategori`, `status`) VALUES
(1, 'makanan', 'Makanan', 'Y'),
(2, 'minuman', 'Minuman', 'Y'),
(3, 'pokok', 'Sembako', 'Y'),
(4, 'lainlain', 'Lainnya', 'Y'),
(5, 'sayuran', 'Sayuran', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `status_kecamatan` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `id_kota`, `status_kecamatan`) VALUES
(1, 'Tajinan', 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `status_kota` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `status_kota`) VALUES
(1, 'Kabupaten Malang', 'Y'),
(2, 'Kota Malang', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `deskrip` text NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_active` int(1) NOT NULL,
  `is_parent` int(1) NOT NULL,
  `tipe` enum('menu','link','pager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `deskrip`, `icon`, `is_active`, `is_parent`, `tipe`) VALUES
(12, 'Dashboard', 'dashboard', 'hak akses info desa', 'fa fa-laptop', 1, 0, 'link'),
(15, 'menu management', 'menu', 'hak akses penuh Controler menu/*', 'fa fa-list-alt', 1, 39, 'menu'),
(22, 'GENERATOR', 'harviacode', 'hak akses penuh Controler harviacode/*', 'fa fa-laptop', 1, 39, 'menu'),
(33, 'user', 'users', 'hak akses penuh Controler user/*', 'fa fa-laptop', 1, 39, 'menu'),
(39, 'Admin', '#', '', 'fa fa-laptop', 1, 0, 'menu'),
(40, 'data', '#', '', 'fa fa-laptop', 1, 0, 'menu'),
(41, 'info desa', 'infodesa', 'hak akses info desa', 'fa fa-laptop', 1, 0, 'link'),
(46, 'Auth assignment', 'auth_assignment', 'hak akses penuh Controler auth_assignment/*', 'fa fa-laptop', 1, 39, 'menu'),
(47, 'Auth item', 'auth_item', 'hak akses penuh Controler Auth_item/*', 'fa fa-laptop', 1, 39, 'menu'),
(48, 'Auth detail', 'auth_item_child', 'hak akses penuh Controler Auth_item_child/*', 'fa fa-laptop', 1, 39, 'menu'),
(49, 'Data Penduduk', 'Dataktp', 'hak akses penuh controller dataktp', 'fa fa-list-alt', 1, 40, 'menu'),
(50, 'Data Catatan Domisili', 'data_domisili', 'hak akses Data_domisili', 'fa fa-list-alt', 1, 40, 'menu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `Foto` varchar(100) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `company`, `phone`, `Foto`, `active`) VALUES
(1, 'admin1', 'cff17d8b974e14ca0d440478bb59c2d1', 'pakketua.x.rpl.b@gmail.com', 'admin1', NULL, NULL, '083834558876', 'default.png', 1),
(2, 'user12', '46f94c8de14fb36680850768ff1b7f2a', 'ranggahafidz729@gmail.com', 'user12', NULL, NULL, NULL, '2file_07042019053112.jpg', 1),
(3, 'nuril123', 'e10adc3949ba59abbe56e057f20f883e', 'nuril@gmail.com', 'nuril adm', NULL, NULL, '089333212156', 'default.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_detail`
--

CREATE TABLE `users_detail` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` datetime NOT NULL,
  `created_on` varchar(100) NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_detail`
--

INSERT INTO `users_detail` (`id`, `ip_address`, `activation_code`, `forgotten_password_time`, `created_on`, `last_login`) VALUES
(1, '109.109.109.109', NULL, '0000-00-00 00:00:00', '20190320025325', NULL),
(2, NULL, NULL, '0000-00-00 00:00:00', '20190321012335', NULL),
(3, '::1', NULL, '0000-00-00 00:00:00', '20190831013116', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_akses`
-- (See below for the actual view)
--
CREATE TABLE `view_akses` (
`id` int(11) unsigned
,`username` varchar(100)
,`first_name` varchar(50)
,`name_level` varchar(64)
,`id_aunt` int(11)
,`id_child` int(11)
,`name` varchar(50)
,`link` varchar(50)
,`deskrip` text
,`icon` varchar(30)
,`is_active` int(1)
,`is_parent` int(1)
,`tipe` enum('menu','link','pager')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_auth_child`
-- (See below for the actual view)
--
CREATE TABLE `view_auth_child` (
`idc` int(11)
,`parent` varchar(64)
,`child` varchar(64)
,`name` varchar(50)
,`link` varchar(50)
,`deskrip` text
,`icon` varchar(30)
,`is_parent` int(1)
,`is_active` int(1)
,`tipe` enum('menu','link','pager')
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_domosoli`
-- (See below for the actual view)
--
CREATE TABLE `view_domosoli` (
`id_domisili` int(11)
,`nama_ktp` varchar(100)
,`tempat_lahir` varchar(100)
,`tgl_lahir` date
,`nik` varchar(18)
,`jenis_kelamin` enum('','Laki-Laki','Perempuan','Ex')
,`pekerjaan` varchar(100)
,`status_perkawinan` enum('','Belum Kawin','Kawin','Cerai','Cerai Mati')
,`pendidik` varchar(30)
,`agama` enum('','Islam','Kristen','Khatolik','Hindu','Budha','Konghucu','Kepercayaan')
,`alamat` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_hk`
-- (See below for the actual view)
--
CREATE TABLE `view_hk` (
`id` int(11) unsigned
,`username` varchar(100)
,`id_assignment` int(11)
,`item_name` varchar(64)
,`created_at` int(11)
,`idc` int(11)
,`child` varchar(64)
);

-- --------------------------------------------------------

--
-- Structure for view `view_akses`
--
DROP TABLE IF EXISTS `view_akses`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_akses`  AS  select `users`.`id` AS `id`,`users`.`username` AS `username`,`users`.`first_name` AS `first_name`,`auth_item`.`name` AS `name_level`,`auth_item`.`id_aunt` AS `id_aunt`,`menu`.`id` AS `id_child`,`menu`.`name` AS `name`,`menu`.`link` AS `link`,`menu`.`deskrip` AS `deskrip`,`menu`.`icon` AS `icon`,`menu`.`is_active` AS `is_active`,`menu`.`is_parent` AS `is_parent`,`menu`.`tipe` AS `tipe` from ((((`users` join `auth_assignment` on((`users`.`id` = `auth_assignment`.`user_id`))) join `auth_item` on((`auth_item`.`name` = `auth_assignment`.`item_name`))) join `auth_item_child` on((`auth_item`.`name` = `auth_item_child`.`parent`))) join `menu` on((`menu`.`id` = `auth_item_child`.`child`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_auth_child`
--
DROP TABLE IF EXISTS `view_auth_child`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_auth_child`  AS  select `auth_item_child`.`idc` AS `idc`,`auth_item_child`.`parent` AS `parent`,`auth_item_child`.`child` AS `child`,`menu`.`name` AS `name`,`menu`.`link` AS `link`,`menu`.`deskrip` AS `deskrip`,`menu`.`icon` AS `icon`,`menu`.`is_parent` AS `is_parent`,`menu`.`is_active` AS `is_active`,`menu`.`tipe` AS `tipe` from (`auth_item_child` join `menu` on((`menu`.`id` = `auth_item_child`.`child`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_domosoli`
--
DROP TABLE IF EXISTS `view_domosoli`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_domosoli`  AS  select `data_domisili`.`id_domisili` AS `id_domisili`,`dataktp`.`nama_ktp` AS `nama_ktp`,`dataktp`.`tempat_lahir` AS `tempat_lahir`,`dataktp`.`tgl_lahir` AS `tgl_lahir`,`dataktp`.`nik` AS `nik`,`dataktp`.`jenis_kelamin` AS `jenis_kelamin`,`dataktp`.`pekerjaan` AS `pekerjaan`,`dataktp`.`status_perkawinan` AS `status_perkawinan`,`dataktp`.`pendidik` AS `pendidik`,`dataktp`.`agama` AS `agama`,`dataktp`.`alamat` AS `alamat` from (`data_domisili` join `dataktp` on((`dataktp`.`id_dataktp` = `data_domisili`.`id_dataktp`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_hk`
--
DROP TABLE IF EXISTS `view_hk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_hk`  AS  select `users`.`id` AS `id`,`users`.`username` AS `username`,`auth_assignment`.`id_assignment` AS `id_assignment`,`auth_assignment`.`item_name` AS `item_name`,`auth_assignment`.`created_at` AS `created_at`,`auth_item_child`.`idc` AS `idc`,`auth_item_child`.`child` AS `child` from ((`auth_assignment` join `users` on((`users`.`id` = `auth_assignment`.`user_id`))) join `auth_item_child` on((`auth_item_child`.`parent` = `auth_assignment`.`item_name`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`id_assignment`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`id_aunt`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`idc`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `dataktp`
--
ALTER TABLE `dataktp`
  ADD PRIMARY KEY (`id_dataktp`);

--
-- Indexes for table `data_domisili`
--
ALTER TABLE `data_domisili`
  ADD PRIMARY KEY (`id_domisili`);

--
-- Indexes for table `infodesa`
--
ALTER TABLE `infodesa`
  ADD PRIMARY KEY (`id_infodesa`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_detail`
--
ALTER TABLE `users_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  MODIFY `id_assignment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_item`
--
ALTER TABLE `auth_item`
  MODIFY `id_aunt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `dataktp`
--
ALTER TABLE `dataktp`
  MODIFY `id_dataktp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_domisili`
--
ALTER TABLE `data_domisili`
  MODIFY `id_domisili` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `infodesa`
--
ALTER TABLE `infodesa`
  MODIFY `id_infodesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
