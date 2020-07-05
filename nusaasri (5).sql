-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2020 at 09:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nusaasri`
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
(11, 'kasir', '11', 2147483647),
(12, 'penjahit', '12', 10101010),
(13, 'pemilik', '13', 10101010);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `id_aunt` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `tipe` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`id_aunt`, `name`, `tipe`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 'hak akses admin', 10101010, 10101001),
(3, 'kasir', 1, 'hak akses user', 10101010, 10101010),
(4, 'pemilik', 1, 'akses pemilik', 10101010, 10101010),
(5, 'penjahit', 1, 'karyawan', 10101010, 10101010);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `idc` int(11) NOT NULL,
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`idc`, `parent`, `child`) VALUES
(1, 'Admin', 15),
(2, 'Admin', 22),
(3, 'Admin', 33),
(14, 'Admin', 46),
(15, 'Admin', 47),
(16, 'Admin', 48),
(27, 'Admin', 39),
(28, 'Admin', 40),
(40, 'Admin', 12),
(42, 'Admin', 41),
(45, 'Admin', 49),
(46, 'Admin', 50),
(47, 'Admin', 51),
(51, 'Admin', 56),
(52, 'Admin', 55),
(53, 'Admin', 57),
(54, 'kasir', 58),
(56, 'Admin', 52),
(58, 'kasir', 59),
(59, 'kasir', 60),
(60, 'kasir', 61),
(61, 'Admin', 62),
(62, 'Admin', 63),
(63, 'Admin', 64),
(64, 'Admin', 65),
(65, 'Admin', 66),
(66, 'Admin', 67),
(67, 'Admin', 68),
(68, 'kasir', 67),
(69, 'kasir', 12),
(70, 'kasir', 62),
(71, 'kasir', 63),
(72, 'kasir', 64),
(73, 'kasir', 66),
(74, 'penjahit', 12),
(75, 'penjahit', 67),
(76, 'penjahit', 61),
(77, 'penjahit', 60),
(78, 'penjahit', 59),
(79, 'pemilik', 12),
(80, 'pemilik', 68);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jenis_barang` enum('Barang Jadi','Bahan Mentah','Aksesoris','') NOT NULL,
  `kategori` enum('sprei','gordyn','aksesoris') NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `varian` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `unit` enum('PCS','M') NOT NULL,
  `harga_jual` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `sku`, `nama_barang`, `jenis_barang`, `kategori`, `ukuran`, `varian`, `stok`, `unit`, `harga_jual`) VALUES
(1, 'BRG-04-', 'Barang 4', 'Barang Jadi', 'gordyn', 'M', 'Merah', 0, 'PCS', '80000'),
(3, 'BRG-03-', 'Barang 3', 'Barang Jadi', 'sprei', 'M', 'Hitam', 0, 'PCS', '80000'),
(4, 'BRG-01-', 'Barang 1', 'Barang Jadi', 'sprei', 'S', 'Merah', 0, 'PCS', '80000'),
(5, 'BRG-05-', 'barang 5', 'Bahan Mentah', 'gordyn', 'L', 'Kuning', 0, 'PCS', '60000');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `idbrgmasuk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `pemasok` varchar(100) NOT NULL,
  `tandaterima` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `harga_beli` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id_info` int(11) NOT NULL,
  `nama_web` varchar(100) NOT NULL,
  `tentang` text NOT NULL,
  `slogan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `wa` varchar(18) NOT NULL,
  `logo_web` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id_info`, `nama_web`, `tentang`, `slogan`, `alamat`, `email`, `wa`, `logo_web`) VALUES
(1, 'Nusa Asri', 'LOREM IPSUM', 'LORREM IPSUM', 'jl. Soekarna Hatta Malang', 'admin@gmail.com', '0821-3912-1467', '1file_14062020061047.png');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang_pesanan`
--

CREATE TABLE `jenis_barang_pesanan` (
  `id_barang_pesanan` int(11) NOT NULL,
  `jenis_barang` varchar(35) NOT NULL,
  `set_barang` varchar(35) NOT NULL,
  `value` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_barang_pesanan`
--

INSERT INTO `jenis_barang_pesanan` (`id_barang_pesanan`, `jenis_barang`, `set_barang`, `value`) VALUES
(1, 'sprei', 'kaki', 'bedcover'),
(2, 'gordyn', 'jendela', 'poni'),
(3, 'wallpaper', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang_pesanan_model`
--

CREATE TABLE `jenis_barang_pesanan_model` (
  `id` int(10) NOT NULL,
  `id_barang_pesanan` int(10) NOT NULL,
  `model` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_barang_pesanan_model`
--

INSERT INTO `jenis_barang_pesanan_model` (`id`, `id_barang_pesanan`, `model`) VALUES
(1, 3, 'ring'),
(2, 3, 'biasa'),
(3, 3, 'tali kancing'),
(4, 1, 'biasa '),
(5, 1, 'simple'),
(6, 2, 'ring'),
(7, 2, 'biasa'),
(8, 2, 'tali kancing');

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
(46, 'Auth assignment', 'auth_assignment', 'hak akses penuh Controler auth_assignment/*', 'fa fa-laptop', 1, 39, 'menu'),
(47, 'Auth item', 'auth_item', 'hak akses penuh Controler Auth_item/*', 'fa fa-laptop', 1, 39, 'menu'),
(48, 'Auth detail', 'auth_item_child', 'hak akses penuh Controler Auth_item_child/*', 'fa fa-laptop', 1, 39, 'menu'),
(52, 'Info Web', 'info', 'hak akses Info', 'fa fa-list-alt', 1, 40, 'menu'),
(53, 'Akun', 'akun', 'hak akses info akun', 'fa fa-laptop', 1, 0, 'link'),
(59, 'users/read', 'users/read', 'hak akses aksi users/read/', 'fa fa-laptop', 1, 0, 'pager'),
(60, 'users/update_pass', 'users/update_pass', 'hak akses aksi users/read/', 'fa fa-laptop', 1, 0, 'pager'),
(61, 'users/update', 'users/update', 'hak akses aksi users/update/', 'fa fa-laptop', 1, 0, 'pager'),
(62, 'Barang Masuk', 'barang_masuk', 'menu barang', 'fa fa-laptop', 1, 0, 'link'),
(63, 'Stok Barang', 'barang', 'menu stok  barang', 'fa fa-laptop', 1, 0, 'link'),
(64, 'Penjualan', 'transaksi_penjualan', 'menu penjualan', 'fa fa-laptop', 1, 0, 'link'),
(65, 'Pelanggan', 'pelanggan', 'Menu Pelanggan', 'fa fa-laptop', 1, 40, 'menu'),
(66, 'Pemesanan', 'transaksi_pemesanan', 'menu Transaksi Pemesanan', 'fa fa-laptop', 1, 0, 'link'),
(67, 'Status Pemesanan', 'status_pemesanan', 'menu Status Pemesanan', 'fa fa-laptop', 1, 0, 'link'),
(68, 'Laporan Keuangan', 'transaksi_pengeluaran', 'menu Transaksi Pengeluaran', 'fa fa-laptop', 1, 0, 'link');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_telepon` int(11) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_telepon`, `alamat`) VALUES
(1, 'Rosi', 821312783, 'Malang'),
(2, 'rizal', 2147483647, 'malang');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pemesanan`
--

CREATE TABLE `transaksi_pemesanan` (
  `id_transaksi_pemesanan` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `kurir` varchar(35) NOT NULL,
  `potongan` enum('Rp','%') NOT NULL,
  `jumlah_potongan` varchar(100) NOT NULL,
  `jenis_pembayaran` enum('dp','lunas') NOT NULL,
  `metode_pembayaran` enum('cash','transfer') NOT NULL,
  `jml_pembayaran` int(100) NOT NULL,
  `status` enum('pesanan diterima','sudah dipotong','dijahit','finishing','pesanan selesai','siap dikirim','transaksi selesai') NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_pemesanan`
--

INSERT INTO `transaksi_pemesanan` (`id_transaksi_pemesanan`, `tanggal_transaksi`, `id_pelanggan`, `tanggal_selesai`, `kurir`, `potongan`, `jumlah_potongan`, `jenis_pembayaran`, `metode_pembayaran`, `jml_pembayaran`, `status`, `total`) VALUES
(1, '2020-06-28', 1, '2020-06-30', 'sasa', 'Rp', '500', 'lunas', 'cash', 4500, 'transaksi selesai', '4500'),
(2, '2020-06-28', 2, '2020-06-30', 'sasa', 'Rp', '1000', 'lunas', 'cash', 39000, 'transaksi selesai', '39000'),
(3, '2020-06-30', 2, '2020-06-30', 'sasa', 'Rp', '32323', 'lunas', 'cash', 513122, 'pesanan diterima', '513122'),
(4, '2020-07-05', 1, '2020-07-06', 'sadsa', 'Rp', '231', 'lunas', 'cash', 5464333, 'siap dikirim', '5464333'),
(5, '2020-07-05', 1, '2020-07-08', 'sasa', 'Rp', '021321', 'dp', 'cash', 230000, 'pesanan diterima', '300000'),
(6, '2020-07-06', 2, '2020-07-08', 'sasa', 'Rp', '211221', 'dp', 'transfer', 3000000, 'pesanan diterima', '21000000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pemesanan_detail`
--

CREATE TABLE `transaksi_pemesanan_detail` (
  `id` int(11) NOT NULL,
  `id_barang_pesanan` int(11) NOT NULL,
  `value` varchar(100) DEFAULT NULL,
  `id_barang_pesanan_model` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` enum('pcs','m') NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `id_transaksi_pemesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_pemesanan_detail`
--

INSERT INTO `transaksi_pemesanan_detail` (`id`, `id_barang_pesanan`, `value`, `id_barang_pesanan_model`, `nama_barang`, `qty`, `unit`, `harga_barang`, `jumlah`, `id_transaksi_pemesanan`) VALUES
(1, 1, 'bedcover', 4, 'kain', 2, 'pcs', 1000, 2000, 1),
(2, 3, '', 1, 'batik', 1, 'm', 3000, 3000, 1),
(3, 1, NULL, 5, 'arit', 1, 'pcs', 10000, 10000, 2),
(4, 2, 'poni', 0, 'gfhfh', 1, 'pcs', 20000, 20000, 2),
(5, 1, 'bedcover', 4, 'mukena', 1, 'pcs', 545445, 545445, 3),
(6, 1, 'bedcover', 5, 'kain', 1, 'pcs', 5464564, 5464564, 4),
(7, 2, 'poni', 6, 'amer', 1, 'pcs', 321321, 321321, 5),
(8, 1, 'bedcover', 5, 'kain', 1, 'pcs', 21211221, 21211221, 6);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pemesanan_kain`
--

CREATE TABLE `transaksi_pemesanan_kain` (
  `id_kain` int(11) NOT NULL,
  `nama_kain` varchar(35) NOT NULL,
  `bidang` enum('bidang kecil','bidang besar') NOT NULL,
  `ukuran` int(100) NOT NULL,
  `pemakaian` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `idtransaksi_pemesanan_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_pemesanan_kain`
--

INSERT INTO `transaksi_pemesanan_kain` (`id_kain`, `nama_kain`, `bidang`, `ukuran`, `pemakaian`, `harga`, `idtransaksi_pemesanan_detail`) VALUES
(1, 'wol', 'bidang kecil', 1, 'bekas', 500, 1),
(2, 'wol', 'bidang kecil', 2, 'bekas', 400, 2),
(3, 'kain', 'bidang besar', 1, 'baru', 500, 2),
(4, 'wol', 'bidang kecil', 4, '4', 120000, 3),
(5, 'gfh', 'bidang besar', 4, '4', 3000, 4),
(6, 'dfs', 'bidang kecil', 54, 'cdscs', 546464, 5),
(7, 'wol', 'bidang kecil', 1, 'bekas', 37, 6),
(8, 'wol', 'bidang kecil', 21321, 'bekas', 8, 7),
(9, 'wol', 'bidang kecil', 21, 'bekas', 23, 8);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pengeluaran`
--

CREATE TABLE `transaksi_pengeluaran` (
  `id_transaksi_pengeluaran` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `rincian` text NOT NULL,
  `nominal` int(100) NOT NULL,
  `sumber_dana` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_pengeluaran`
--

INSERT INTO `transaksi_pengeluaran` (`id_transaksi_pengeluaran`, `tanggal`, `rincian`, `nominal`, `sumber_dana`) VALUES
(1, '2020-06-30', 'pembelian 10 ulung benang', 30000, 'kasir'),
(2, '2020-07-06', 'dsffs', 3434534, 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan`
--

CREATE TABLE `transaksi_penjualan` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` datetime DEFAULT NULL,
  `id_pelanggan` int(100) DEFAULT NULL,
  `potongan` enum('Rp','%') NOT NULL,
  `jumlah_potongan` varchar(100) NOT NULL,
  `jml_pembayaran` int(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `jenis_pembayaran` enum('dp','lunas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_penjualan`
--

INSERT INTO `transaksi_penjualan` (`id_transaksi`, `tanggal_transaksi`, `id_pelanggan`, `potongan`, `jumlah_potongan`, `jml_pembayaran`, `total`, `jenis_pembayaran`) VALUES
(1, '2020-06-22 00:00:00', 1, 'Rp', '1000', 159000, '159000', 'lunas'),
(2, '2020-06-23 01:17:58', 1, '%', '10', 72000, '72000', 'lunas'),
(3, '2020-06-24 16:49:21', 2, '%', '10', 40000, '180000', 'dp'),
(4, '2020-06-30 15:49:03', 1, '%', '12', 70400, '70400', 'lunas'),
(5, '2020-07-06 01:31:50', 1, 'Rp', '0', 80000, '80000', 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_penjualan_detail`
--

CREATE TABLE `transaksi_penjualan_detail` (
  `id_detail_transaksi_penjualan` int(11) NOT NULL,
  `id_transaksi_penjualan` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `subtotal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_penjualan_detail`
--

INSERT INTO `transaksi_penjualan_detail` (`id_detail_transaksi_penjualan`, `id_transaksi_penjualan`, `id_barang`, `qty`, `harga_jual`, `subtotal`) VALUES
(1, 1, 4, 1, 80000, '80000'),
(2, 1, 3, 1, 80000, '80000'),
(3, 2, 4, 1, 80000, '80000'),
(4, 3, 1, 1, 80000, '80000'),
(5, 4, 1, 1, 80000, '80000'),
(6, 5, 1, 1, 80000, '80000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nokartuidentitas` varchar(30) NOT NULL,
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

INSERT INTO `users` (`id`, `username`, `password`, `email`, `nokartuidentitas`, `first_name`, `last_name`, `company`, `phone`, `Foto`, `active`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', '', 'admin1', NULL, NULL, '083834558876', 'default.png', 1),
(11, 'kasir4', 'e10adc3949ba59abbe56e057f20f883e', 'pakketua.x.rpl.b@gmail.com', '2323213213421', 'kasir', NULL, NULL, '08942141241', 'default.png', 1),
(12, 'user71', 'e10adc3949ba59abbe56e057f20f883e', 'keilmuanpoltekom@gmail.com', '2323213213421', 'penjahit', NULL, NULL, '08942141241', 'default.png', 1),
(13, 'pemilik', 'e10adc3949ba59abbe56e057f20f883e', 'khodirotulu@gmail.com', '786876768', 'pemilik', NULL, NULL, '77897878', 'default.png', 1);

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
(11, '::1', NULL, '0000-00-00 00:00:00', '20200705164715', NULL),
(12, '::1', NULL, '0000-00-00 00:00:00', '20200706013956', NULL),
(13, '::1', NULL, '0000-00-00 00:00:00', '20200706014728', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `varian`
--

CREATE TABLE `varian` (
  `id_varian` int(11) NOT NULL,
  `nama_varian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `varian`
--

INSERT INTO `varian` (`id_varian`, `nama_varian`) VALUES
(1, 'Merah'),
(2, 'Hitam'),
(3, 'Kuning'),
(4, 'Hijau');

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
,`child` int(64)
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
-- Stand-in structure for view `view_barang`
-- (See below for the actual view)
--
CREATE TABLE `view_barang` (
`id_barang` int(11)
,`sku` varchar(100)
,`nama_barang` varchar(100)
,`jenis_barang` enum('Barang Jadi','Bahan Mentah','Aksesoris','')
,`kategori` enum('sprei','gordyn','aksesoris')
,`ukuran` varchar(100)
,`varian` varchar(100)
,`nama_varian` varchar(255)
,`stok` int(11)
,`unit` enum('PCS','M')
,`harga_jual` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_barang_masuk`
-- (See below for the actual view)
--
CREATE TABLE `view_barang_masuk` (
`idbrgmasuk` int(11)
,`tanggal` date
,`id_barang` int(11)
,`sku` varchar(100)
,`nama_barang` varchar(100)
,`jenis_barang` enum('Barang Jadi','Bahan Mentah','Aksesoris','')
,`penerima` varchar(100)
,`pemasok` varchar(100)
,`tandaterima` varchar(100)
,`jumlah` varchar(100)
,`unit` enum('PCS','M')
,`harga_beli` varchar(100)
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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_akses`  AS  select `users`.`id` AS `id`,`users`.`username` AS `username`,`users`.`first_name` AS `first_name`,`auth_item`.`name` AS `name_level`,`auth_item`.`id_aunt` AS `id_aunt`,`menu`.`id` AS `id_child`,`menu`.`name` AS `name`,`menu`.`link` AS `link`,`menu`.`deskrip` AS `deskrip`,`menu`.`icon` AS `icon`,`menu`.`is_active` AS `is_active`,`menu`.`is_parent` AS `is_parent`,`menu`.`tipe` AS `tipe` from ((((`users` join `auth_assignment` on(`users`.`id` = `auth_assignment`.`user_id`)) join `auth_item` on(`auth_item`.`name` = `auth_assignment`.`item_name`)) join `auth_item_child` on(`auth_item`.`name` = `auth_item_child`.`parent`)) join `menu` on(`menu`.`id` = `auth_item_child`.`child`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_auth_child`
--
DROP TABLE IF EXISTS `view_auth_child`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_auth_child`  AS  select `auth_item_child`.`idc` AS `idc`,`auth_item_child`.`parent` AS `parent`,`auth_item_child`.`child` AS `child`,`menu`.`name` AS `name`,`menu`.`link` AS `link`,`menu`.`deskrip` AS `deskrip`,`menu`.`icon` AS `icon`,`menu`.`is_parent` AS `is_parent`,`menu`.`is_active` AS `is_active`,`menu`.`tipe` AS `tipe` from (`auth_item_child` join `menu` on(`menu`.`id` = `auth_item_child`.`child`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_barang`
--
DROP TABLE IF EXISTS `view_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barang`  AS  select `barang`.`id_barang` AS `id_barang`,`barang`.`sku` AS `sku`,`barang`.`nama_barang` AS `nama_barang`,`barang`.`jenis_barang` AS `jenis_barang`,`barang`.`kategori` AS `kategori`,`barang`.`ukuran` AS `ukuran`,`barang`.`varian` AS `varian`,`varian`.`nama_varian` AS `nama_varian`,`barang`.`stok` AS `stok`,`barang`.`unit` AS `unit`,`barang`.`harga_jual` AS `harga_jual` from (`barang` join `varian` on(`barang`.`varian` = `varian`.`id_varian`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_barang_masuk`
--
DROP TABLE IF EXISTS `view_barang_masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barang_masuk`  AS  select `barang_masuk`.`idbrgmasuk` AS `idbrgmasuk`,`barang_masuk`.`tanggal` AS `tanggal`,`barang_masuk`.`id_barang` AS `id_barang`,`barang`.`sku` AS `sku`,`barang`.`nama_barang` AS `nama_barang`,`barang`.`jenis_barang` AS `jenis_barang`,`barang_masuk`.`penerima` AS `penerima`,`barang_masuk`.`pemasok` AS `pemasok`,`barang_masuk`.`tandaterima` AS `tandaterima`,`barang_masuk`.`jumlah` AS `jumlah`,`barang`.`unit` AS `unit`,`barang_masuk`.`harga_beli` AS `harga_beli` from (`barang_masuk` join `barang` on(`barang_masuk`.`id_barang` = `barang`.`id_barang`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_hk`
--
DROP TABLE IF EXISTS `view_hk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_hk`  AS  select `dataecg`.`users`.`id` AS `id`,`dataecg`.`users`.`username` AS `username`,`dataecg`.`auth_assignment`.`id_assignment` AS `id_assignment`,`dataecg`.`auth_assignment`.`item_name` AS `item_name`,`dataecg`.`auth_assignment`.`created_at` AS `created_at`,`dataecg`.`auth_item_child`.`idc` AS `idc`,`dataecg`.`auth_item_child`.`child` AS `child` from ((`dataecg`.`auth_assignment` join `dataecg`.`users` on(`dataecg`.`users`.`id` = `dataecg`.`auth_assignment`.`user_id`)) join `dataecg`.`auth_item_child` on(`dataecg`.`auth_item_child`.`parent` = `dataecg`.`auth_assignment`.`item_name`)) order by `dataecg`.`users`.`id` ;

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
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`) USING BTREE;

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`idbrgmasuk`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `jenis_barang_pesanan`
--
ALTER TABLE `jenis_barang_pesanan`
  ADD PRIMARY KEY (`id_barang_pesanan`);

--
-- Indexes for table `jenis_barang_pesanan_model`
--
ALTER TABLE `jenis_barang_pesanan_model`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `transaksi_pemesanan`
--
ALTER TABLE `transaksi_pemesanan`
  ADD PRIMARY KEY (`id_transaksi_pemesanan`);

--
-- Indexes for table `transaksi_pemesanan_detail`
--
ALTER TABLE `transaksi_pemesanan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_pemesanan_kain`
--
ALTER TABLE `transaksi_pemesanan_kain`
  ADD PRIMARY KEY (`id_kain`);

--
-- Indexes for table `transaksi_pengeluaran`
--
ALTER TABLE `transaksi_pengeluaran`
  ADD PRIMARY KEY (`id_transaksi_pengeluaran`);

--
-- Indexes for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  ADD PRIMARY KEY (`id_transaksi`) USING BTREE;

--
-- Indexes for table `transaksi_penjualan_detail`
--
ALTER TABLE `transaksi_penjualan_detail`
  ADD PRIMARY KEY (`id_detail_transaksi_penjualan`) USING BTREE;

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
-- Indexes for table `varian`
--
ALTER TABLE `varian`
  ADD PRIMARY KEY (`id_varian`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  MODIFY `id_assignment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `auth_item`
--
ALTER TABLE `auth_item`
  MODIFY `id_aunt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `idbrgmasuk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_barang_pesanan`
--
ALTER TABLE `jenis_barang_pesanan`
  MODIFY `id_barang_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_barang_pesanan_model`
--
ALTER TABLE `jenis_barang_pesanan_model`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_pemesanan`
--
ALTER TABLE `transaksi_pemesanan`
  MODIFY `id_transaksi_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi_pemesanan_detail`
--
ALTER TABLE `transaksi_pemesanan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi_pemesanan_kain`
--
ALTER TABLE `transaksi_pemesanan_kain`
  MODIFY `id_kain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi_pengeluaran`
--
ALTER TABLE `transaksi_pengeluaran`
  MODIFY `id_transaksi_pengeluaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_penjualan`
--
ALTER TABLE `transaksi_penjualan`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi_penjualan_detail`
--
ALTER TABLE `transaksi_penjualan_detail`
  MODIFY `id_detail_transaksi_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `varian`
--
ALTER TABLE `varian`
  MODIFY `id_varian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
