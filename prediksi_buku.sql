-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2022 at 08:44 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prediksi_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` char(5) NOT NULL,
  `nama_buku` varchar(50) DEFAULT NULL,
  `jenis_buku` varchar(50) DEFAULT NULL,
  `jumlah_isi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `nama_buku`, `jenis_buku`, `jumlah_isi`) VALUES
('BK001', 'Buku Tulis SIMA 58L', 'Buku Tulis', 58);

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` smallint(6) NOT NULL,
  `nama_bulan` char(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `nama_bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `data_fuzzy`
--

CREATE TABLE `data_fuzzy` (
  `id_data_fuzzy` int(11) NOT NULL,
  `id_hasil_prediksi` int(11) DEFAULT NULL,
  `max_permintaan` mediumint(9) NOT NULL,
  `min_permintaan` mediumint(9) NOT NULL,
  `max_sisa` smallint(6) NOT NULL,
  `min_sisa` smallint(6) NOT NULL,
  `max_produksi` mediumint(9) NOT NULL,
  `min_produksi` mediumint(9) NOT NULL,
  `new_sisa_stok` smallint(6) NOT NULL,
  `new_permintaan` mediumint(9) NOT NULL,
  `sisa_banyak` double NOT NULL,
  `sisa_sedikit` double NOT NULL,
  `permintaan_naik` double NOT NULL,
  `permintaan_turun` double NOT NULL,
  `a_rules_1` double NOT NULL,
  `a_rules_2` double NOT NULL,
  `a_rules_3` double NOT NULL,
  `a_rules_4` double NOT NULL,
  `z_rules_1` double NOT NULL,
  `z_rules_2` double NOT NULL,
  `z_rules_3` double NOT NULL,
  `z_rules_4` double NOT NULL,
  `z_defuzzifikasi` double NOT NULL,
  `hasil_defuzzifikasi` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_fuzzy`
--

INSERT INTO `data_fuzzy` (`id_data_fuzzy`, `id_hasil_prediksi`, `max_permintaan`, `min_permintaan`, `max_sisa`, `min_sisa`, `max_produksi`, `min_produksi`, `new_sisa_stok`, `new_permintaan`, `sisa_banyak`, `sisa_sedikit`, `permintaan_naik`, `permintaan_turun`, `a_rules_1`, `a_rules_2`, `a_rules_3`, `a_rules_4`, `z_rules_1`, `z_rules_2`, `z_rules_3`, `z_rules_4`, `z_defuzzifikasi`, `hasil_defuzzifikasi`) VALUES
(1, 1, 5500, 2000, 600, 100, 6000, 3000, 440, 2600, 0.68, 0.32, 0.17142857142857, 0.82857142857143, 0.17142857142857, 0.17142857142857, 0.68, 0.32, 3514.2857142857, 3514.2857142857, 3960, 5040, 4103.5623100304, 4104);

-- --------------------------------------------------------

--
-- Table structure for table `data_produksi`
--

CREATE TABLE `data_produksi` (
  `id_produksi` int(11) NOT NULL,
  `id_buku` char(5) NOT NULL,
  `id_bulan` smallint(6) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `permintaan` int(11) DEFAULT NULL,
  `sisa_stok` int(11) DEFAULT NULL,
  `jumlah_produksi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_produksi`
--

INSERT INTO `data_produksi` (`id_produksi`, `id_buku`, `id_bulan`, `tahun`, `permintaan`, `sisa_stok`, `jumlah_produksi`) VALUES
(1, 'BK001', 8, 2021, 2000, 300, 3000),
(2, 'BK001', 9, 2021, 2300, 200, 3500),
(3, 'BK001', 10, 2021, 2700, 100, 5000),
(4, 'BK001', 11, 2021, 2600, 500, 3400),
(5, 'BK001', 12, 2021, 3000, 500, 6000),
(7, 'BK001', 1, 2022, 3050, 550, 4500),
(8, 'BK001', 2, 2022, 4000, 430, 5500),
(9, 'BK001', 3, 2022, 5500, 230, 3400),
(10, 'BK001', 4, 2022, 4500, 120, 3000),
(11, 'BK001', 5, 2022, 3000, 300, 4000),
(12, 'BK001', 6, 2022, 2300, 400, 5000),
(13, 'BK001', 7, 2022, 2500, 600, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_prediksi`
--

CREATE TABLE `hasil_prediksi` (
  `id_hasil_prediksi` int(11) NOT NULL,
  `id_buku` char(5) NOT NULL,
  `id_bulan` smallint(6) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `permintaan` int(11) DEFAULT NULL,
  `sisa_stok` int(11) DEFAULT NULL,
  `prediksi_produksi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_prediksi`
--

INSERT INTO `hasil_prediksi` (`id_hasil_prediksi`, `id_buku`, `id_bulan`, `tahun`, `permintaan`, `sisa_stok`, `prediksi_produksi`) VALUES
(1, 'BK001', 8, 2022, 2600, 440, 4104);

--
-- Triggers `hasil_prediksi`
--
DELIMITER $$
CREATE TRIGGER `tg_hapus_fuzzy` AFTER DELETE ON `hasil_prediksi` FOR EACH ROW BEGIN
DELETE FROM data_fuzzy where id_hasil_prediksi = OLD.id_hasil_prediksi;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `prediksi`
--

CREATE TABLE `prediksi` (
  `id_prediksi` int(11) NOT NULL,
  `id_produksi` int(11) NOT NULL,
  `id_hasil_prediksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_level` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `id_level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `data_fuzzy`
--
ALTER TABLE `data_fuzzy`
  ADD PRIMARY KEY (`id_data_fuzzy`);

--
-- Indexes for table `data_produksi`
--
ALTER TABLE `data_produksi`
  ADD PRIMARY KEY (`id_produksi`),
  ADD KEY `FK_DATA_PRO_MEMILIKI_BULAN` (`id_bulan`),
  ADD KEY `FK_DATA_PRO_PENCATATA_BUKU` (`id_buku`);

--
-- Indexes for table `hasil_prediksi`
--
ALTER TABLE `hasil_prediksi`
  ADD PRIMARY KEY (`id_hasil_prediksi`),
  ADD KEY `FK_HASIL_PR_BERDASARK_BULAN` (`id_bulan`),
  ADD KEY `FK_HASIL_PR_MEMPUNYAI_BUKU` (`id_buku`);

--
-- Indexes for table `prediksi`
--
ALTER TABLE `prediksi`
  ADD PRIMARY KEY (`id_prediksi`),
  ADD KEY `FK_MENGHASI_MENGHASIL_HASIL_PR` (`id_hasil_prediksi`),
  ADD KEY `FK_MENGHASI_MENGHASIL_DATA_PRO` (`id_produksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bulan` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `data_fuzzy`
--
ALTER TABLE `data_fuzzy`
  MODIFY `id_data_fuzzy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_produksi`
--
ALTER TABLE `data_produksi`
  MODIFY `id_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hasil_prediksi`
--
ALTER TABLE `hasil_prediksi`
  MODIFY `id_hasil_prediksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prediksi`
--
ALTER TABLE `prediksi`
  MODIFY `id_prediksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_produksi`
--
ALTER TABLE `data_produksi`
  ADD CONSTRAINT `FK_DATA_PRO_MEMILIKI_BULAN` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id_bulan`),
  ADD CONSTRAINT `FK_DATA_PRO_PENCATATA_BUKU` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `hasil_prediksi`
--
ALTER TABLE `hasil_prediksi`
  ADD CONSTRAINT `FK_HASIL_PR_BERDASARK_BULAN` FOREIGN KEY (`id_bulan`) REFERENCES `bulan` (`id_bulan`),
  ADD CONSTRAINT `FK_HASIL_PR_MEMPUNYAI_BUKU` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `prediksi`
--
ALTER TABLE `prediksi`
  ADD CONSTRAINT `FK_MENGHASI_MENGHASIL_DATA_PRO` FOREIGN KEY (`id_produksi`) REFERENCES `data_produksi` (`id_produksi`),
  ADD CONSTRAINT `FK_MENGHASI_MENGHASIL_HASIL_PR` FOREIGN KEY (`id_hasil_prediksi`) REFERENCES `hasil_prediksi` (`id_hasil_prediksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
