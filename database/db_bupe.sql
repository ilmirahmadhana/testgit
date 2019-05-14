-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 Mei 2019 pada 14.51
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bupe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(3) NOT NULL,
  `nm_customer` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nm_customer`, `alamat`, `no_telepon`) VALUES
(1, 'Dhika Ira Riswana', 'Paiton', '0812345678910'),
(5, 'Hamjek kogoya', 'asdwek', '0123891283');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_hutang`
--

CREATE TABLE `dt_hutang` (
  `id_dt_hutang` int(4) NOT NULL,
  `id_hutang` int(4) NOT NULL,
  `bayar` int(8) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_hutang`
--

INSERT INTO `dt_hutang` (`id_dt_hutang`, `id_hutang`, `bayar`, `tgl`) VALUES
(1, 1, 18000, '2019-01-09'),
(2, 1, 40000, '2019-01-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_pembelian`
--

CREATE TABLE `dt_pembelian` (
  `id_dt_pb` int(4) NOT NULL,
  `id_pb` varchar(7) NOT NULL,
  `id_brg` varchar(7) NOT NULL,
  `jml_brg` int(3) NOT NULL,
  `harga_total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_pembelian`
--

INSERT INTO `dt_pembelian` (`id_dt_pb`, `id_pb`, `id_brg`, `jml_brg`, `harga_total`) VALUES
(7, 'TRB0001', 'BRG0002', 4, 468000),
(14, 'TRB0002', 'BRG0001', 10, 1150000),
(15, 'TRB0003', 'BRG0001', 10, 1150000),
(16, 'TRB0004', 'BRG0001', 2, 230000);

--
-- Trigger `dt_pembelian`
--
DELIMITER $$
CREATE TRIGGER `tambah_item_pb` BEFORE INSERT ON `dt_pembelian` FOR EACH ROW BEGIN
INSERT INTO transaksi_pb(id_pb,id_sales,tgl,total_harga,bayar,id_hutang,kembali) VALUES(new.id_pb,null,sysdate(),null,null,null,null) ON DUPLICATE KEY UPDATE id_pb=id_pb;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_penjualan`
--

CREATE TABLE `dt_penjualan` (
  `id_dt_pj` int(4) NOT NULL,
  `id_pj` varchar(7) NOT NULL,
  `id_brg` varchar(7) NOT NULL,
  `jml_brg` int(3) NOT NULL,
  `harga_total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_penjualan`
--

INSERT INTO `dt_penjualan` (`id_dt_pj`, `id_pj`, `id_brg`, `jml_brg`, `harga_total`) VALUES
(76, 'TRJ0001', 'BRG0002', 2, 240000),
(77, 'TRJ0002', 'BRG0001', 2, 234000),
(78, 'TRJ0003', 'BRG0001', 5, 585000),
(79, 'TRJ0004', 'BRG0001', 2, 234000),
(80, 'TRJ0004', 'BRG0002', 2, 240000);

--
-- Trigger `dt_penjualan`
--
DELIMITER $$
CREATE TRIGGER `tambah_item_pj` BEFORE INSERT ON `dt_penjualan` FOR EACH ROW BEGIN
INSERT INTO transaksi_pj(id_pj,id_customer,tgl,total_harga,bayar,id_piutang,kembali) VALUES(new.id_pj,null,sysdate(),null,null,null,null) ON DUPLICATE KEY UPDATE id_pj=id_pj;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_piutang`
--

CREATE TABLE `dt_piutang` (
  `id_dt_piutang` int(4) NOT NULL,
  `id_piutang` int(4) NOT NULL,
  `bayar` int(8) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_piutang`
--

INSERT INTO `dt_piutang` (`id_dt_piutang`, `id_piutang`, `bayar`, `tgl`) VALUES
(6, 1, 10000, '2019-01-08'),
(7, 1, 10000, '2019-01-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grup`
--

CREATE TABLE `grup` (
  `id_grup` int(3) NOT NULL,
  `nama_grup` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `grup`
--

INSERT INTO `grup` (`id_grup`, `nama_grup`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE `hutang` (
  `id_hutang` int(4) NOT NULL,
  `jml_hutang` int(8) NOT NULL,
  `tgl_jthtempo` date NOT NULL,
  `ket` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hutang`
--

INSERT INTO `hutang` (`id_hutang`, `jml_hutang`, `tgl_jthtempo`, `ket`) VALUES
(1, 110000, '2019-02-09', 'Jl. kita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(4) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah_pengeluaran` int(7) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tgl`, `jumlah_pengeluaran`, `keterangan`) VALUES
(1, '2018-12-06', 15000, 'Makan'),
(2, '2018-12-06', 25000, 'Jalan-jalan+makan'),
(3, '2018-12-08', 5000000, 'Beli HP'),
(4, '2018-12-09', 1500000, 'Party'),
(5, '2018-12-14', 10000, 'Makan siang'),
(6, '2018-12-19', 5000, 'Cilok'),
(7, '2019-01-03', 300000, 'bensin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `piutang`
--

CREATE TABLE `piutang` (
  `id_piutang` int(4) NOT NULL,
  `jml_hutang` int(8) NOT NULL,
  `tgl_jthtempo` date NOT NULL,
  `ket` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `piutang`
--

INSERT INTO `piutang` (`id_piutang`, `jml_hutang`, `tgl_jthtempo`, `ket`) VALUES
(1, 0, '2019-02-08', 'Jl. Teripang no 10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_brg` varchar(7) NOT NULL,
  `nama_brg` varchar(40) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `jenis_brg` varchar(20) NOT NULL,
  `stok` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_brg`, `nama_brg`, `harga_beli`, `harga_jual`, `jenis_brg`, `stok`) VALUES
('BRG0001', 'Cat Metrolite', 115000, 117000, 'Cat', 25),
('BRG0002', 'Cat Duco', 117000, 120000, 'Cat', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `id_sales` int(3) NOT NULL,
  `nm_sales` varchar(45) NOT NULL,
  `nm_perusahaan` varchar(45) NOT NULL,
  `alamat_perusahaan` varchar(45) NOT NULL,
  `no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sales`
--

INSERT INTO `sales` (`id_sales`, `nm_sales`, `nm_perusahaan`, `alamat_perusahaan`, `no_telepon`) VALUES
(3, 'Jalaluddin', 'PT. Terus Maju', 'Jl. yang lurus', '08123562');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pb`
--

CREATE TABLE `transaksi_pb` (
  `id_pb` varchar(7) NOT NULL,
  `id_sales` int(3) DEFAULT NULL,
  `tgl` date NOT NULL,
  `total_harga` int(10) DEFAULT NULL,
  `bayar` int(10) DEFAULT NULL,
  `id_hutang` int(4) DEFAULT NULL,
  `kembali` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_pb`
--

INSERT INTO `transaksi_pb` (`id_pb`, `id_sales`, `tgl`, `total_harga`, `bayar`, `id_hutang`, `kembali`) VALUES
('TRB0001', 3, '2019-01-09', 468000, 358000, 1, 0),
('TRB0002', NULL, '2019-01-09', 1150000, 1200000, NULL, 50000),
('TRB0003', NULL, '2019-01-16', NULL, NULL, NULL, NULL),
('TRB0004', NULL, '2019-01-16', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pj`
--

CREATE TABLE `transaksi_pj` (
  `id_pj` varchar(7) NOT NULL,
  `id_customer` int(3) DEFAULT NULL,
  `tgl` date NOT NULL,
  `total_harga` int(10) DEFAULT NULL,
  `bayar` int(10) DEFAULT NULL,
  `id_piutang` int(4) DEFAULT NULL,
  `kembali` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_pj`
--

INSERT INTO `transaksi_pj` (`id_pj`, `id_customer`, `tgl`, `total_harga`, `bayar`, `id_piutang`, `kembali`) VALUES
('TRJ0001', 5, '2019-01-08', 240000, 240000, 1, 0),
('TRJ0002', NULL, '2019-02-09', 234000, 240000, NULL, 6000),
('TRJ0003', NULL, '2019-01-16', 585000, 1000000, NULL, 415000),
('TRJ0004', NULL, '2019-01-16', 474000, 1000000, NULL, 526000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `username` char(12) NOT NULL,
  `password` char(15) NOT NULL,
  `grup` int(3) NOT NULL,
  `password2` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `grup`, `password2`) VALUES
(1, 'admin', 'admin', 1, NULL),
(2, 'izzuddin', '230898', 2, NULL),
(3, 'irham', 'irham', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `dt_hutang`
--
ALTER TABLE `dt_hutang`
  ADD PRIMARY KEY (`id_dt_hutang`),
  ADD KEY `id_hutang_dt_hutang_idx` (`id_hutang`);

--
-- Indexes for table `dt_pembelian`
--
ALTER TABLE `dt_pembelian`
  ADD PRIMARY KEY (`id_dt_pb`),
  ADD KEY `id_brg_dt_pb_idx` (`id_brg`),
  ADD KEY `id_pb_dt_pb_idx` (`id_pb`);

--
-- Indexes for table `dt_penjualan`
--
ALTER TABLE `dt_penjualan`
  ADD PRIMARY KEY (`id_dt_pj`),
  ADD KEY `kd_pj_dt_idx` (`id_pj`),
  ADD KEY `id_brg_dt_pj_idx` (`id_brg`);

--
-- Indexes for table `dt_piutang`
--
ALTER TABLE `dt_piutang`
  ADD PRIMARY KEY (`id_dt_piutang`),
  ADD KEY `id_piutang_dt_piutang_idx` (`id_piutang`);

--
-- Indexes for table `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`id_grup`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_hutang`),
  ADD KEY `kd_brg_hutang_idx` (`id_hutang`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`id_piutang`),
  ADD KEY `kd_brg_piutang_idx` (`id_piutang`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indexes for table `transaksi_pb`
--
ALTER TABLE `transaksi_pb`
  ADD PRIMARY KEY (`id_pb`),
  ADD KEY `id_sales_pb_idx` (`id_sales`),
  ADD KEY `id_hutang_pb_idx` (`id_hutang`);

--
-- Indexes for table `transaksi_pj`
--
ALTER TABLE `transaksi_pj`
  ADD PRIMARY KEY (`id_pj`),
  ADD KEY `kd_brg_idx` (`id_piutang`),
  ADD KEY `id_customer_pj_idx` (`id_customer`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_grup_user_idx` (`grup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dt_hutang`
--
ALTER TABLE `dt_hutang`
  MODIFY `id_dt_hutang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dt_pembelian`
--
ALTER TABLE `dt_pembelian`
  MODIFY `id_dt_pb` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `dt_penjualan`
--
ALTER TABLE `dt_penjualan`
  MODIFY `id_dt_pj` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `dt_piutang`
--
ALTER TABLE `dt_piutang`
  MODIFY `id_dt_piutang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_hutang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id_piutang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sales` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dt_hutang`
--
ALTER TABLE `dt_hutang`
  ADD CONSTRAINT `id_hutang_dt_hutang` FOREIGN KEY (`id_hutang`) REFERENCES `hutang` (`id_hutang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `dt_pembelian`
--
ALTER TABLE `dt_pembelian`
  ADD CONSTRAINT `id_brg_dt_pb` FOREIGN KEY (`id_brg`) REFERENCES `produk` (`id_brg`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_pb_dt_pb` FOREIGN KEY (`id_pb`) REFERENCES `transaksi_pb` (`id_pb`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `dt_penjualan`
--
ALTER TABLE `dt_penjualan`
  ADD CONSTRAINT `id_brg_dt_pj` FOREIGN KEY (`id_brg`) REFERENCES `produk` (`id_brg`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_pj_dt_pj` FOREIGN KEY (`id_pj`) REFERENCES `transaksi_pj` (`id_pj`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `dt_piutang`
--
ALTER TABLE `dt_piutang`
  ADD CONSTRAINT `id_piutang_dt_piutang` FOREIGN KEY (`id_piutang`) REFERENCES `piutang` (`id_piutang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `id_grup_user` FOREIGN KEY (`grup`) REFERENCES `grup` (`id_grup`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
