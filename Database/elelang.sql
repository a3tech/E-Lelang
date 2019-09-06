-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2019 at 02:54 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elelang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` char(5) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `no_hp`, `username`, `password`) VALUES
('A0001', 'aw', '222', 'aaa', 'bbb'),
('A0002', 'aw', 'annasinside@g', 'aw', 'aw');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_barang` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `nominal_bid` int(11) NOT NULL,
  `tanggal_berakhir` datetime NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `foto_1` varchar(100) DEFAULT NULL,
  `foto_2` varchar(100) DEFAULT NULL,
  `foto_3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `id_penjual`, `nama_barang`, `harga`, `deskripsi`, `kategori`, `nominal_bid`, `tanggal_berakhir`, `status`, `foto_1`, `foto_2`, `foto_3`) VALUES
(20, 2, 'LCD TV', 2000000, '-Deskripsi Dan Spesifikasi Produk-', 'ELEKTRONIK', 100000, '2018-12-16 12:12:12', 'selesai', 'e1.jpg', 'e2.jpg', 'e3.jpg'),
(21, 2, 'Guci Antik Sancai', 7000000, '-Deskripsi Dan Spesifikasi Produk-', 'BARANG ANTIK', 300000, '2019-12-20 23:00:00', 'mulai', 'a1.jpg', 'a2.jpg', 'a3.jpg'),
(27, 1, 'Pisau Butter Fly', 5000000, 'Pisau Kece', 'BARANG KOLEKSI', 200000, '2018-12-17 15:33:00', 'selesai', 'p1.jpg', 'p2.jpg', 'p3.jpg'),
(29, 3, 'Kucing Persia Peaknose', 5000000, 'Bukan Nasi Kucing', 'HEWAN', 500000, '2018-12-16 15:35:00', 'selesai', 'k1.jpg', 'k2.jpg', 'k3.jpg'),
(31, 3, 'Furniture Jati Minimalis', 2000000, 'inilah salah satu mebel furniture jepara minimalis yang diproduksi oleh istana amalia putra,barang ini sangan diminati diberbagai kalangan indonesia,harganyapun terjangkau', 'FURNITURE', 300000, '2019-12-31 14:30:00', 'mulai', 'f1.jpg', 'f2.jpg', 'f3.jpg'),
(33, 3, 'Pull Up Bar Iron Gym', 1000000, 'Alat fitness untuk latihan pull up', 'OLAHRAGA', 200000, '2018-12-16 18:12:56', 'selesai', 'pu1.jpg', 'pu2.jpg', 'pu3.jpg'),
(34, 3, 'Gucci Gang', 1000000, 'wew', 'BARANG ANTIK', 200000, '2019-01-19 14:20:00', 'selesai', '', '', ''),
(35, 3, 'Pisau Karambit', 1000000, 'Pisau kece mematikan', 'BARANG KOLEKSI', 100000, '2019-12-30 15:01:13', 'mulai', 'kk1.jpg', 'kk2.jpg', 'kk3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bidding`
--

CREATE TABLE `bidding` (
  `id_bidding` char(5) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `kd_barang` char(5) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bid` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidding`
--

INSERT INTO `bidding` (`id_bidding`, `id_pembeli`, `kd_barang`, `id_penjual`, `tanggal`, `bid`, `total`) VALUES
('BD001', 10, '21', 2, '2019-01-19', 300000, 7300000),
('BD002', 10, '21', 2, '2019-01-19', 400000, 7400000),
('BD003', 11, '21', 2, '2019-01-19', 350000, 7350000),
('BD004', 10, '34', 3, '2019-01-19', 250000, 1250000),
('BD005', 10, '34', 3, '2019-01-19', 300000, 1300000),
('BD006', 11, '34', 3, '2019-01-19', 500000, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_konfirmasi`
--

CREATE TABLE `detail_konfirmasi` (
  `id_konfirm` char(5) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `atas_nama` varchar(30) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_konfirmasi`
--

INSERT INTO `detail_konfirmasi` (`id_konfirm`, `id_pembeli`, `atas_nama`, `no_rek`, `keterangan`) VALUES
('BI001', 10, 'z', 'z', 'z'),
('BI002', 10, 'z', 'z', 'z'),
('BI001', 10, 'z', 'z', 'z'),
('BI002', 10, 'z', 'z', 'z'),
('BI003', 10, 'z', 'z', 'pak tulong pakkk');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `id_pembeli`, `id_penjual`, `pesan`, `tanggal`) VALUES
(5, 10, 2, 'mantul', '2018-12-16'),
(8, 11, 2, 'barang sesuai ekspektasi !', '2018-12-17'),
(9, 12, 2, 'memang cakep barangnya', '2019-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id_info` char(5) NOT NULL,
  `id_admin` char(5) DEFAULT NULL,
  `judul` varchar(30) NOT NULL,
  `isi_informasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id_info`, `id_admin`, `judul`, `isi_informasi`) VALUES
('I0001', 'A0001', 'Apa Itu Lelang ?', 'Sebagai satu-satunya situs yang murni menerapkan sistem lelang secara online kami ingin membantu Anda memperoleh penawaran terbaik dari setiap barang yang dilelang di balelang.com. Beberapa hal yang bersifat kompleks dalam lelang secara offline telah kami persiapkan dengan sangat matang sehingga dapat menyuguhkan kemudahan dalam berbagai fitur yang dapat Anda akses secara online dan tentu saja akan terus kami update secara berkala.<br/><br/>\r\n\r\nJika Anda memiliki saran dan kritik silahkan menghubungi kami demi membuat balelang.com semakin baik di masa mendatang.'),
('I0002', 'A0002', 'Auctioneer', 'Menjadi Auctioneer haruslah pandai menarik perhatian banyak orang untuk mengikuti lelang dan menganalisis latar belakang peserta lelang, barang koleksi dan antik hendaknya di lelang kepada para peserta yang mempunyai hobi sebagai kolektor, barang dengan kategori elektronik dan mesin mempunyai pangsa peminat yang lebih luas lagi sehingga peminat yang dituju adalah mereka yang tertarik pula pada hal tersebut.<br/><br/>\r\nDisini anda dapat belajar untuk memulai menjadi seorang Auctioneer pemula hingga nantinya menjadi seorang Auctioneer yang mempunyai jam terbang tinggi, bersama situs lelang online balelang.com anda akan bergabung bersama ribuan Auctioneer di seluruh indonesia sehingga kita dapat bersama-sama membangun iklim perdagangan bangsa yang lebih kreatif dan inovatif, apakah anda siap bertemu dengan ribuan peminat dan ribuan bidder diseluruh indonesia ?<br/><br/>\r\n \r\nHIMBAUAN<br/>\r\n1.Auctioneer adalah pengguna yang terdaftar sebagai pengguna di balelang.com, jika Anda belum terdaftar silahkan menuju form Registrasi.<br/>\r\n2.Barang yang dilelang bersifat legal sesuai Undang-Undang yang berlaku.<br/>\r\n3.Segala bentuk iklan lelang dari Auctioneer bersifat serius, penuh kesadaran dan tanggung jawab.<br/>\r\n4.Panduan memasang iklan silahkan mengunjungi Pasang Iklan.<br/>\r\n5.Kami mengingatkan tentang adanya prinsip saling mengamankan antar Auctioneer dan Winner.<br/>\r\n6.Dengan melakukan lelang di balelang.com berarti Anda terikat hingga masa lelang berakhir.<br/>\r\n7.Seluruh transaksi menggunakan sistem pembayaran resmi Balelang demi keamanan dan kenyamanan bertransaksi.<br/>\r\n8.Jika terjadi pelanggaran berupa WIN and RUN silahkan hubungi form Pengaduan.<br/><br/>\r\n \r\nLARANGAN<br/>\r\n1.Menulis komentar yang mengandung kata kotor, Rasis, dan SARA.<br/>\r\n2.Jangan menulis iklan yang absurd contoh â€ KUCING PERSIA LANGKA BLASTERAN ANJING CIHUA-HUA â€œ.<br/>\r\n3.Melakukan lelang fiktif, memasang iklan lelang tetapi barangnya tidak ada.<br/>\r\n4.Demi menghindari Auction and Run maka kami melarang Anda menjual barang diluar balelang.com hingga masa lelang berakhir.<br/>\r\n5.Auction and run yaitu ketika terdapat Winner pada iklan yang Anda buat tapi justru tidak ada kejelasan tentang barang tersebut.<br/>\r\n6.Melakukan penipuan.<br/>\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `id_penjual` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `komen` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `kd_barang`, `id_pembeli`, `id_penjual`, `email`, `komen`, `tanggal`) VALUES
(6, 21, 10, NULL, 'wew@gmail.com', 'Barangnya bagus', '2018-12-14'),
(8, 21, 10, NULL, 'wew@gmail.com', 'cius', '2018-12-14'),
(9, 21, 10, NULL, 'wew@gmail.com', 'zz', '2018-12-16'),
(10, 21, 10, NULL, 'wew@gmail.com', 'wewwwwwwwwwwwww', '2019-01-19'),
(11, 21, NULL, 1, 'annas.am@student.amikom.ac.id', 'amacak', '2019-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konfirm` char(5) NOT NULL,
  `jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirm`, `jenis`) VALUES
('BI001', 'Top Up Saldo'),
('BI002', 'Jasa Rekber'),
('BI003', 'Top Up Saldo');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` int(11) NOT NULL,
  `atas_nama` varchar(30) NOT NULL,
  `no_rek` varchar(25) NOT NULL,
  `nama_bank` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `profesi` varchar(10) NOT NULL,
  `saldo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `atas_nama`, `no_rek`, `nama_bank`, `email`, `alamat`, `username`, `password`, `no_telp`, `profesi`, `saldo`) VALUES
(10, 'z', 'z', 'z', 'wew@gmail.com', 'z', 'z', 'z', 'z', 'Pembeli', 500000),
(11, 's', 's', 's', 'agungsuroto@gmail.com', 's', 'waw', 'waw', 's', 'Pembeli', 500000),
(12, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'pembeli', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `pemenang`
--

CREATE TABLE `pemenang` (
  `id_bidding` char(5) DEFAULT NULL,
  `id_pembeli` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemenang`
--

INSERT INTO `pemenang` (`id_bidding`, `id_pembeli`, `total`) VALUES
('BD006', 11, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` int(11) NOT NULL,
  `atas_nama` varchar(30) NOT NULL,
  `no_rek` varchar(25) NOT NULL,
  `nama_bank` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `profesi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `atas_nama`, `no_rek`, `nama_bank`, `email`, `alamat`, `username`, `password`, `no_telp`, `profesi`) VALUES
(1, 'h', '54321', 'h', 'annas.am@student.amikom.ac.id', 'h', 'h', 'h', 'h', 'Penjual'),
(2, 'w', '678910', 'w', 'wew@gmail.com', 'w', 'w', 'w', 'w', 'Penjual'),
(3, 'Agung Bagus', '12345', 'BCA', 'annasinside@gmail.com', 'Mbantul', 'penjual1', 'admin', '085726186476', 'Penjual');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `id_penjual` int(11) DEFAULT NULL,
  `emailpenjual` varchar(30) NOT NULL,
  `emailpembeli` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_pembeli`, `id_penjual`, `emailpenjual`, `emailpembeli`, `subject`, `pesan`, `tanggal_masuk`) VALUES
(3, 10, NULL, 'annas.am@student.amikom.ac.id', 'wew@gmail.com', 'z', 'z', '2018-11-20'),
(4, 11, NULL, 'wew@gmail.com', 'agungsuroto@gmail.com', 'waw', 'waw', '2018-11-20'),
(6, NULL, 2, 'wew@gmail.com', 'agungsuroto@gmail.com', 'w', 'goblok', '2018-11-20'),
(7, NULL, 1, 'annas.am@student.amikom.ac.id', 'wew@gmail.com', 'Pemenang Barang Koleksi Pisau ', 'Selamat anda telah menjadi pemenang dari barang yang saya lelang, silahkan konfirmasi ke admin untuk menggunakan jasa rekber.', '2018-12-10'),
(9, 10, NULL, 'annas.am@student.amikom.ac.id', 'wew@gmail.com', 'tai', 'tai', '2018-12-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`),
  ADD KEY `id_penjual` (`id_penjual`);

--
-- Indexes for table `bidding`
--
ALTER TABLE `bidding`
  ADD PRIMARY KEY (`id_bidding`),
  ADD KEY `kd_barang` (`kd_barang`),
  ADD KEY `id_pembeli` (`id_pembeli`);

--
-- Indexes for table `detail_konfirmasi`
--
ALTER TABLE `detail_konfirmasi`
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_konfirm` (`id_konfirm`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_penjual` (`id_penjual`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_penjual` (`id_penjual`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id_konfirm`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `pemenang`
--
ALTER TABLE `pemenang`
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_bidding` (`id_bidding`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_pembeli` (`id_pembeli`),
  ADD KEY `id_penjual` (`id_penjual`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kd_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id_pembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id_penjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`);

--
-- Constraints for table `bidding`
--
ALTER TABLE `bidding`
  ADD CONSTRAINT `bidding_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`);

--
-- Constraints for table `detail_konfirmasi`
--
ALTER TABLE `detail_konfirmasi`
  ADD CONSTRAINT `detail_konfirmasi_ibfk_2` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `detail_konfirmasi_ibfk_3` FOREIGN KEY (`id_konfirm`) REFERENCES `konfirmasi` (`id_konfirm`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`);

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_3` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `komentar_ibfk_4` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`),
  ADD CONSTRAINT `komentar_ibfk_5` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`);

--
-- Constraints for table `pemenang`
--
ALTER TABLE `pemenang`
  ADD CONSTRAINT `pemenang_ibfk_1` FOREIGN KEY (`id_bidding`) REFERENCES `bidding` (`id_bidding`),
  ADD CONSTRAINT `pemenang_ibfk_2` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`),
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`id_penjual`) REFERENCES `penjual` (`id_penjual`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
