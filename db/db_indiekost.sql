-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2020 pada 12.32
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_indiekost`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `nilai_booking` int(11) NOT NULL,
  `bukti_booking` varchar(255) NOT NULL,
  `status_booking` enum('belum dikonfirmasi','sudah dikonfirmasi','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id_booking`, `id_kamar`, `id_pengguna`, `tanggal_booking`, `nilai_booking`, `bukti_booking`, `status_booking`) VALUES
(2, 5, 14, '2020-06-01', 300000, 'dde797a709961171cfc1d25e696d5da0.jpg', ''),
(4, 6, 15, '2020-06-02', 300000, 'd0c8bac9e150cd7b37fdcd1c6a99e215.jpg', 'sudah dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` int(1) NOT NULL,
  `nama_akses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id_akses`, `nama_akses`) VALUES
(1, 'Admin'),
(2, 'Penghuni'),
(3, 'Calon Penghuni'),
(4, 'nonaktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_kost`
--

CREATE TABLE `info_kost` (
  `id_kost` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `jenis_kost` enum('Kost Putra','Kost Putri') NOT NULL,
  `nama_kost` varchar(255) NOT NULL,
  `alamat_kost` varchar(255) NOT NULL,
  `provinsi_kost` varchar(255) NOT NULL,
  `kota_kost` varchar(255) NOT NULL,
  `no_kost` varchar(255) NOT NULL,
  `email_kost` varchar(255) NOT NULL,
  `logo_kost` varchar(255) NOT NULL,
  `foto_kost` varchar(255) NOT NULL,
  `deskripsi_kost` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info_kost`
--

INSERT INTO `info_kost` (`id_kost`, `id_pengguna`, `jenis_kost`, `nama_kost`, `alamat_kost`, `provinsi_kost`, `kota_kost`, `no_kost`, `email_kost`, `logo_kost`, `foto_kost`, `deskripsi_kost`) VALUES
(1, 7, 'Kost Putri', 'Kost Putri Bidadari', 'Jl Baturaden 10', 'Jawa Timur', 'Jember', '085735678159', 'kostputribidadari@gmail.com', '', '5e1a933f6a2c9.jpeg', 'Kost Putri yang nyaman, aman, bersih, dan modern. Memiliki 2 lantai, dan 30 kamar. Fasilitas oke harga bersahabat. Terletak di daerah yang strategis. Cocok untuk pelajar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pengeluaran`
--

CREATE TABLE `jenis_pengeluaran` (
  `id_jenis_pengeluaran` int(11) NOT NULL,
  `kode_pengeluaran` varchar(255) NOT NULL,
  `kategori_pengeluaran` enum('Biaya Operasional','Biaya Pemeliharaan','Biaya Makanan','Biaya Marketing','Biaya Lainnya','Pajak') NOT NULL,
  `nama_pengeluaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pengeluaran`
--

INSERT INTO `jenis_pengeluaran` (`id_jenis_pengeluaran`, `kode_pengeluaran`, `kategori_pengeluaran`, `nama_pengeluaran`) VALUES
(1, 'P0001', 'Pajak', 'Pajak Bumi dan Bangunan'),
(2, 'P0002', 'Biaya Operasional', 'Listrik (PLN)'),
(3, 'P0003', 'Biaya Operasional', 'Air (PDAM)'),
(4, 'P0005', 'Biaya Pemeliharaan', 'Kebersihan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_status_pembayaran`
--

CREATE TABLE `jenis_status_pembayaran` (
  `id_status` int(11) NOT NULL,
  `nama_status_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_status_pembayaran`
--

INSERT INTO `jenis_status_pembayaran` (`id_status`, `nama_status_pembayaran`) VALUES
(1, 'sudah dikonfirmasi'),
(2, 'belum dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `nomor_kamar` int(11) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `luas_kamar` varchar(255) NOT NULL,
  `lantai_kamar` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `kapasitas_kamar` int(11) NOT NULL,
  `deskripsi_kamar` varchar(255) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `harga_harian` double NOT NULL,
  `harga_mingguan` double NOT NULL,
  `harga_bulanan` double NOT NULL,
  `harga_tahunan` double NOT NULL,
  `denda` double NOT NULL,
  `foto_kamar` varchar(255) NOT NULL,
  `is_used` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nomor_kamar`, `id_tipe`, `luas_kamar`, `lantai_kamar`, `kapasitas_kamar`, `deskripsi_kamar`, `id_layanan`, `harga_harian`, `harga_mingguan`, `harga_bulanan`, `harga_tahunan`, `denda`, `foto_kamar`, `is_used`) VALUES
(3, 111, 2, '4x4', '1', 1, 'Kamar nomor satu', 2, 10000, 80000, 300000, 360000, 5000, '5e166d07c1269.jpg', 1),
(4, 101, 1, '4x4', '1', 1, 'Kamar nomor satu', 2, 10000, 70000, 300000, 1200000, 5000, '5e166d1d291b0.jpg', 0),
(5, 102, 1, '4x4', '1', 1, 'Kamar nomor satu', 2, 10000, 65000, 300000, 330000, 5000, '5e166d28510e6.jpg', 0),
(6, 103, 1, '4x4', '1', 1, 'Kamar Mandi Dalam, Satu tempat tidur, satu lemari, satu meja, 2 kursi', 2, 10000, 65000, 300000, 330000, 5000, '5e166d36598d9.jpg', 0),
(7, 104, 1, '4x4', '1', 1, 'Kamar nomor satu', 2, 10000, 65000, 300000, 330000, 5000, '5e166d4179726.jpeg', 0),
(8, 105, 1, '4x4', '1', 1, 'asdasdasdasdsad', 1, 0, 0, 300000, 0, 5000, '5e192d0d9e4d6.jpg', 0),
(9, 106, 1, '4x4', '1', 1, 'asdadasdadasadds', 2, 0, 0, 400000, 0, 5000, '5e1a901df0b7d.jpeg', 0),
(11, 112, 1, '4x4', '1', 1, 'qwewqeqwe', 2, 0, 0, 300000, 0, 5000, 'a217152f35de32ad37b3dcee6e1fa393.jpg', 0),
(12, 113, 1, '4x4', '1', 1, 'deqdqdqwdwqdqwd', 2, 0, 0, 200000, 0, 5000, '987111ea3af2ba864c19b225d9a6422f.jpg', 0),
(14, 107, 1, '4x4', '1', 1, 'fegopjf ewiqdjhpw ewjp', 2, 0, 0, 400000, 0, 5000, '36335150ee1f69222b037e6796605080.jpg', 0),
(15, 108, 1, '4x4', '1', 1, 'wqwq weq qwefdaa qw', 2, 0, 0, 400000, 0, 5000, '62de68dcf1efe940de8e11c986b68dc1.jpg', 1),
(16, 109, 1, '4x4', '1', 1, 'qwewqqw', 2, 0, 0, 400000, 0, 5000, '224337fddcf30bc5f57f3d84b23ba205.jpg', 0),
(20, 110, 1, '4x4', '1', 1, 'Tes Deskripsi', 2, 0, 0, 400000, 0, 5000, '3ebac18627eb64c0d701a19ecaaa0b55.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(255) NOT NULL,
  `harga_harian` double NOT NULL,
  `harga_mingguan` double NOT NULL,
  `harga_bulanan` double NOT NULL,
  `harga_tahunan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `harga_harian`, `harga_mingguan`, `harga_bulanan`, `harga_tahunan`) VALUES
(1, 'Laundry', 10000, 65000, 30000, 330000),
(2, 'tidak ada layanan', 0, 0, 0, 0),
(3, 'setrika', 0, 0, 20000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menghuni`
--

CREATE TABLE `menghuni` (
  `id_menghuni` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menghuni`
--

INSERT INTO `menghuni` (`id_menghuni`, `id_kamar`, `id_pengguna`, `tanggal_masuk`, `tanggal_keluar`) VALUES
(3, 15, 13, '2020-04-05', '0000-00-00'),
(5, 4, 11, '2020-06-01', '0000-00-00'),
(6, 5, 14, '2020-06-01', '0000-00-00'),
(7, 6, 15, '2020-06-02', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_menghuni` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `nilai_pembayaran` double NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_menghuni`, `tanggal_pembayaran`, `nilai_pembayaran`, `bukti_pembayaran`, `keterangan`, `id_status`) VALUES
(11, 3, '2020-05-01', 300000, '', '', 1),
(12, 3, '2020-04-01', 300000, '', '', 1),
(16, 3, '2020-01-01', 300000, '8d70c04bc7d700b8142904d03866e7d7.jpg', 'Pembayaran bulan januari', 1),
(22, 5, '2020-06-01', 300000, '0cd2ef34f7855063885da045797722f3.jpg', 'Mendaftarkan ciloq ciliq ke kamar 101 oleh admin', 1),
(23, 6, '2020-06-01', 300000, 'dde797a709961171cfc1d25e696d5da0.jpg', 'Pembayaran Booking kamar no.102 tanggal: 2020-06-01', 1),
(24, 7, '2020-06-02', 300000, 'd0c8bac9e150cd7b37fdcd1c6a99e215.jpg', 'Pembayaran booking kamar no.103 tanggal: 2020-06-02', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_jenis_pengeluaran` int(11) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL,
  `nilai_pengeluaran` double NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `bukti_pengeluaran` varchar(255) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `id_jenis_pengeluaran`, `tanggal_pengeluaran`, `nilai_pengeluaran`, `keterangan`, `bukti_pengeluaran`, `id_pengguna`) VALUES
(9, 3, '2020-05-01', 200000, 'Pembayaran Bulan Mei 2020 dikala pandemi Covid-19', '48e832ede0cf3e2acf1c200f288e901d.jpg', 7),
(10, 1, '2020-05-01', 500000, 'Dipotong Subsidi pemerintah dikala pandemi covid-19', 'e3dff886a913420cbf08af90a5f0f4a1.jpg', 7),
(11, 2, '2020-05-01', 300000, 'PBB dikala pandemi covid 19', '2d45239d601e100669edbf7266e0bfdf.jpg', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `alamat_pengguna` varchar(255) DEFAULT NULL,
  `provinsi_pengguna` varchar(255) DEFAULT NULL,
  `kota_pengguna` varchar(255) DEFAULT NULL,
  `telepon_pengguna` varchar(255) NOT NULL,
  `email_pengguna` varchar(255) NOT NULL,
  `kelamin_pengguna` enum('Pria','Wanita') DEFAULT NULL,
  `tanggal_lahir_pengguna` date DEFAULT NULL,
  `no_ktp_pengguna` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `id_akses` int(1) NOT NULL,
  `foto_pengguna` varchar(255) DEFAULT NULL,
  `is_active` int(2) NOT NULL,
  `time_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `alamat_pengguna`, `provinsi_pengguna`, `kota_pengguna`, `telepon_pengguna`, `email_pengguna`, `kelamin_pengguna`, `tanggal_lahir_pengguna`, `no_ktp_pengguna`, `password`, `id_akses`, `foto_pengguna`, `is_active`, `time_created`) VALUES
(7, 'Abdul Jali', 'Jl Baturaden Gg 10 No. 7', 'Jawa Timur', 'Jember', '082335783552', 'nadasthing@gmail.com', 'Pria', '1999-12-15', '000988166627120913', '$2y$10$KsnsY8QiuzYbdOXeP2yTA.2MdawXr4mr74ORtZJpPMWmjBFwfYvxu', 1, '5e1a943eeae2e.jpg', 1, 1587647284),
(11, 'Ciloq Ciliq', 'Jl. Diponegoro VII 73', 'Jawa Timur', 'Jember', '085735678159', 'ciloqciliq@gmail.com', 'Wanita', '2020-05-04', '3509191412990007', '$2y$10$Tn3bc/gQgqfEzAyGN3jklOWe8SdI.YloNWcepR68Anx9I.vl/uM8e', 2, '45ded3a228621d361d70759aea6ca94c.jpg', 1, 1587714593),
(13, 'Ntsana Canteq Sekila', 'Jl berdua bersamaku', 'Jawa Timur', 'Jember', '08123456789', 'ntsana@gmail.com', 'Wanita', '2020-05-11', '1777288199129012', '$2y$10$1DvEVo0TOhUFJPad1G3IvOloHucu2sFLTAdq5l9NRNufS7na1NYMu', 2, '72724240987d5e26723855c272971df8.jpg', 1, 1587648461),
(14, 'Maudy Bawa Kemana', 'Jl Jalan Melulu Asek 69', 'Jawa Barat', 'Jakarta', '08123456789', 'maudybawakemana@gmail.com', 'Wanita', '2003-06-01', '3509191412990007', '$2y$10$67R.ktgBwzTc6ihCHFNuxeHrnjjVwhN5R0YWGGrjnC21xRX4EjPS6', 2, '11d64412761ec71b11f1dba46f2b22b8.jpeg', 1, 1587648461),
(15, 'Siti Zubaedah', 'Jl Kediri no 70', 'Jawa Timur', 'Kediri', '08123456789', 'sitizubaedah@gmail.com', 'Wanita', '2000-01-01', '3650921992891', '$2y$10$67R.ktgBwzTc6ihCHFNuxeHrnjjVwhN5R0YWGGrjnC21xRX4EjPS6', 2, '1017a83aa5fbe55fd7612ae8325fb670.jpg', 1, 1587648461);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id_tipe` int(11) NOT NULL,
  `nama_tipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id_tipe`, `nama_tipe`) VALUES
(1, 'reguler'),
(2, 'vip');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(8, 'hasni.nada.75@gmail.com', '15ea2c72bbb0be', 1587726123),
(9, 'alipbata123@gmail.com', '15eaad77a31614', 1588254586),
(10, 'alipbata124@gmail.com', '15eaad7f0660e5', 1588254704);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_kamar_2` (`id_kamar`,`id_pengguna`);

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `info_kost`
--
ALTER TABLE `info_kost`
  ADD PRIMARY KEY (`id_kost`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  ADD PRIMARY KEY (`id_jenis_pengeluaran`);

--
-- Indeks untuk tabel `jenis_status_pembayaran`
--
ALTER TABLE `jenis_status_pembayaran`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `id_tipe` (`id_tipe`,`id_layanan`),
  ADD KEY `id_layanan` (`id_layanan`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `menghuni`
--
ALTER TABLE `menghuni`
  ADD PRIMARY KEY (`id_menghuni`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_menghuni` (`id_menghuni`),
  ADD KEY `id_status` (`id_status`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_jenis_pengeluaran` (`id_jenis_pengeluaran`,`id_pengguna`),
  ADD KEY `pengeluaran_ibfk_2` (`id_pengguna`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_akses` (`id_akses`);

--
-- Indeks untuk tabel `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_akses` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `info_kost`
--
ALTER TABLE `info_kost`
  MODIFY `id_kost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_pengeluaran`
--
ALTER TABLE `jenis_pengeluaran`
  MODIFY `id_jenis_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jenis_status_pembayaran`
--
ALTER TABLE `jenis_status_pembayaran`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `menghuni`
--
ALTER TABLE `menghuni`
  MODIFY `id_menghuni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `info_kost`
--
ALTER TABLE `info_kost`
  ADD CONSTRAINT `info_kost_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_2` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_kamar` (`id_tipe`),
  ADD CONSTRAINT `kamar_ibfk_4` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`);

--
-- Ketidakleluasaan untuk tabel `menghuni`
--
ALTER TABLE `menghuni`
  ADD CONSTRAINT `menghuni_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menghuni_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_menghuni`) REFERENCES `menghuni` (`id_menghuni`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `jenis_status_pembayaran` (`id_status`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`id_jenis_pengeluaran`) REFERENCES `jenis_pengeluaran` (`id_jenis_pengeluaran`),
  ADD CONSTRAINT `pengeluaran_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
