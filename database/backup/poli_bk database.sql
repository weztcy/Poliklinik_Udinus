-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 31, 2024 at 05:21 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poli_bk`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_poli`
--

CREATE TABLE `daftar_poli` (
  `id` int UNSIGNED NOT NULL,
  `id_pasien` int UNSIGNED NOT NULL,
  `id_jadwal` int UNSIGNED NOT NULL,
  `keluhan` text COLLATE utf8mb4_general_ci NOT NULL,
  `no_antrian` int UNSIGNED NOT NULL,
  `status_periksa` enum('0','1') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_poli`
--

INSERT INTO `daftar_poli` (`id`, `id_pasien`, `id_jadwal`, `keluhan`, `no_antrian`, `status_periksa`) VALUES
(3, 10, 6, 'batuk pilek', 1, '1'),
(4, 10, 9, 'usus saya mengkerut', 1, '1'),
(5, 10, 8, 'sakit', 1, '1'),
(6, 12, 10, 'Agus sakitt agus sedang sakit', 1, '0'),
(7, 12, 8, 'dasdasdasdadsd', 2, '0'),
(8, 20, 8, 'dhkjlhjgjkhl', 3, '0'),
(9, 22, 10, 'asdsadadad', 2, '0'),
(10, 22, 10, 'dafgshfdgfgdfg', 3, '0'),
(11, 22, 6, 'mau mokad', 2, '1'),
(12, 22, 16, 'qdwqdqwdqwdqd', 1, '1'),
(13, 21, 16, 'aduh perut saya sakit', 2, '1'),
(14, 22, 16, 'keluhan1', 3, '1'),
(15, 28, 8, 'Maria Farida Wulandari 1\r\n', 4, '0'),
(16, 28, 8, 'Maria Farida Wulandari 1', 5, '0'),
(17, 28, 16, 'wwwwwwwwwww', 4, '0'),
(18, 32, 16, 'ssssssssssssss', 5, '0');

-- --------------------------------------------------------

--
-- Table structure for table `detail_periksa`
--

CREATE TABLE `detail_periksa` (
  `id` int NOT NULL,
  `id_periksa` int NOT NULL,
  `id_obat` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_periksa`
--

INSERT INTO `detail_periksa` (`id`, `id_periksa`, `id_obat`) VALUES
(6, 4, 10),
(7, 4, 12),
(8, 5, 12),
(9, 6, 11),
(10, 6, 13),
(11, 7, 10),
(12, 7, 11),
(13, 7, 13),
(14, 8, 10),
(15, 8, 11),
(16, 8, 12),
(17, 8, 15),
(18, 9, 11),
(19, 9, 15),
(20, 9, 36),
(21, 10, 35);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_poli` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `password`, `alamat`, `no_hp`, `id_poli`) VALUES
(11, 'Dr. Aulia Sari, Sp.PD', '76709a2f768dbe38435c3999f8935b79', 'Jl. Raya No. 12, Semarang', '081234567890', 10),
(12, 'Dr. Budi Santoso, Sp.OG', '9250171b81d04e2ed38f0aa5595e8164', 'Jl. Raya Cempaka No. 45, Semarang', '08132451288', 10),
(13, 'Dr. Citra Dewi, Sp.A', 'fd00563937fbc80d548c96940f861f50', 'Jl. Cendana No. 98, Semarang', '085711223344', 10),
(15, 'Dr. Rudi H. Santoso, Sp.A', '7d49e40f4b3d8f68c19406a58303f826', 'Jl. Kartini No. 5, Semarang', '081298765432', 17),
(18, 'Dr. Indra P. Prasetyo, Sp.OG', '40035970c833b15490511e20962f414e', 'Jl. Sudirman No. 15, Semarang', '085678901234', 17),
(19, 'Dr. Novi R. Mulyani, Sp.KG', '141098c6bf8b1221a41ed878d2450b3b', 'Jl. Sukajadi No. 12, Semarang', '082134567890', 17),
(20, 'Dr. Fajar B. Pratama, Sp.THT', '76bce7c1491d5821495117f15aa0f70d', 'Jl. Kemuning No. 3, Semarang', '082134876543', 19),
(21, 'Dr. Maria R. Setiawan, Sp.KG', '92d5dcdebceadc3998ae0f8538435e27', 'Jl. Merdeka No. 8, Semarang', '082134567891', 16),
(22, 'Dr. Zita K. Mariani, Sp.KG', 'ce7a96d63ba28c3014382c3f953a2f57', 'Jl. Melati No. 4, Semarang', '081298745612', 16),
(23, 'Dr. Amelia W. Fadilah, Sp.M', '1d6f26cf23213d468c4002342da432ca', 'Jl. Sutan Syahrir No. 20, Semarang', '081246135790', 18),
(24, 'Dr. Linda S. Putri, Sp.Mata', '7c4c05f58fd2103bdc224dd5393bd256', 'Jl. Cipete Raya No. 6, Semarang', '085234678910', 18),
(26, 'Dr. Lidia C. Tan, Sp.KK', 'ad66c568298e178827d3a2adfca307af', 'Jl. Serpong No. 10, Semarang', '081134679532', 20),
(28, 'Dr. Dimas, Sp.PD', 'ef06a7207c4419362e8c9f85a7b9fd45', 'Jl. Pahlawan No. 23, Semarang', '081234567890', 10);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_periksa`
--

CREATE TABLE `jadwal_periksa` (
  `id` int UNSIGNED NOT NULL,
  `id_dokter` int NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') COLLATE utf8mb4_general_ci NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `aktif` char(1) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_periksa`
--

INSERT INTO `jadwal_periksa` (`id`, `id_dokter`, `hari`, `jam_mulai`, `jam_selesai`, `aktif`) VALUES
(6, 11, 'Senin', '08:00:00', '14:00:00', 'N'),
(7, 11, 'Jumat', '13:00:00', '16:00:00', 'N'),
(8, 12, 'Senin', '11:00:00', '16:00:00', 'Y'),
(9, 13, 'Senin', '13:00:00', '17:00:00', 'N'),
(10, 13, 'Kamis', '10:00:00', '13:00:00', 'Y'),
(11, 12, 'Jumat', '16:00:00', '18:00:00', 'N'),
(12, 11, 'Kamis', '23:30:00', '10:30:00', 'N'),
(13, 11, 'Kamis', '22:45:00', '12:45:00', 'Y'),
(14, 28, 'Selasa', '07:00:00', '08:00:00', 'N'),
(15, 28, 'Rabu', '17:00:00', '19:00:00', 'N'),
(16, 28, 'Kamis', '19:00:00', '21:00:00', 'Y'),
(17, 28, 'Jumat', '07:00:00', '08:30:00', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int NOT NULL,
  `nama_obat` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `kemasan` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `kemasan`, `harga`) VALUES
(10, 'Paracetamol', 'Tablet 500mg', 15000),
(11, 'Amoxicillin', 'Kapsul 500mg', 25000),
(12, 'Multivitamin', 'Box 30 kapsul', 40000),
(13, 'Cough Syrup', 'Botol 100ml', 20000),
(15, 'Ibuprofen', 'Tablet 400mg', 10000),
(16, 'Fluoride Toothpaste', 'Tube 120g', 20000),
(17, 'Clindamycin', 'Kapsul 300mg', 35000),
(18, 'Lidocaine', 'Gel 30g', 50000),
(20, 'Chlorhexidine Mouthwash', 'Botol 200ml', 25000),
(28, 'Paracetamol Syrup', 'Botol 60ml', 20000),
(29, 'Vitamin D3', 'Kapsul 1000 IU', 25000),
(30, 'Salbutamol', 'Inhaler 200mcg', 45000),
(31, 'Cetirizine', 'Sirup 100ml', 22000),
(32, 'Artificial Tears', 'Botol 10ml', 25000),
(33, 'Tobramycin Eye Drops', 'Botol 5ml', 40000),
(34, 'Prednisolone Eye Drops', 'Botol 5ml', 50000),
(35, 'Latanoprost', 'Botol 2.5ml', 75000),
(36, 'Antiallergic Eye Drops', 'Botol 10ml', 30000),
(37, 'Saline Nasal Spray', 'Botol 30ml', 20000),
(38, 'Fluticasone Nasal Spray', 'Botol 16g', 60000),
(39, 'Ambroxol', 'Sirup 100ml', 25000),
(40, 'Ciprofloxacin Ear Drops', 'Botol 10ml', 35000),
(41, 'Mometasone Furoate', 'Spray 50mcg', 70000),
(42, 'Hydrocortisone Cream', 'Tube 20g', 25000),
(43, 'Clindamycin Gel', 'Tube 30g', 50000),
(44, 'Miconazole', 'Salep 20g', 30000),
(45, 'Benzoyl Peroxide', 'Gel 50g', 35000),
(46, 'Tretinoin', 'Gel 20g', 75000);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_ktp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_rm` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `password`, `alamat`, `no_ktp`, `no_hp`, `no_rm`) VALUES
(10, 'Dini Rahayu Maulana', 'a00de8bd0f12de47ea4914f9296ef7b4', 'Jl. Raya Semarang No. 5, Semarang', '3201234567890123', '081234567890', '202401-001'),
(11, 'Joko Pratama Subrata', '7488e331b8b64e5794da3fa4eb10ad5d', 'Jl. Pahlawan No. 12, Semarang', '3202345678901234', '082134567891', '202412-002'),
(12, 'Anita Sari Lestari', '80ec08504af83331911f5882349af59d', 'Jl. Merdeka No. 22, Semarang', '3203456789012345', '083245678902', '202412-003'),
(13, 'Maria Farida Wulandari', '80ec08504af83331911f5882349af59d', 'Jl. Sudirman No. 30, Semarang', '134235341343254213', '081234678903', '202412-004'),
(14, 'Rudi Handoko Santoso', '80ec08504af83331911f5882349af59d', 'Jl. Kartini No. 8, Semarang', '3205678901234567', '085234567894', '202412-005'),
(15, 'Budi Santoso Prasetyo', '7488e331b8b64e5794da3fa4eb10ad5d', 'Jl. Gajah Mada No. 15, Semarang', '3206789012345678', '082345678905', '202412-006'),
(16, 'Lia Triana Kartika', '6ad14ba9986e3615423dfca256d04e3f', 'Jl. Yos Sudarso No. 18, Semarang', '3207890123456789', '083456789906', '202412-007'),
(17, 'Erwin Kusuma Santosa', '6ad14ba9986e3615423dfca256d04e3f', 'Jl. Jendral Sudirman No. 10, Semarang', '3208901234567890', '081234567907', '202412-008'),
(18, 'Nadia Lestari Sari', '80ec08504af83331911f5882349af59d', 'Jl. Tugu No. 9, Semarang', '3209012345678901', '085567890908', '202412-009'),
(20, 'Agus Setiawan Hidayat', '6ad14ba9986e3615423dfca256d04e3f', 'Jl. Semangka No. 20, Semarang', '3200123456789012', '082678901909', '202412-010'),
(21, 'dimas', '6ad14ba9986e3615423dfca256d04e3f', 'dsfdsadfsgdafdse', '1646446844846', '3452133453123432', '202412-011'),
(22, 'nigga', '6ad14ba9986e3615423dfca256d04e3f', 'asdfafsfafs', '87653456804324', '2433125442543', '202412-012'),
(24, 'Tika Indriani Pratama', '5a30c9609b52fe348fb6925896e061de', 'Jl. Belimbing No. 7, Semarang', '3201234876543210', '082134567890', '202412-013'),
(25, 'Dini Rahayu Maulana', '5a30c9609b52fe348fb6925896e061de', 'Jl. Raya Semarang No. 5, Semarang', '3201234567890123', '081234567890', '202412-014'),
(26, 'Joko Pratama Subrata', '5a30c9609b52fe348fb6925896e061de', 'Jl. Pahlawan No. 12, Semarang', '3202345678901234', '082134567891', '202412-015'),
(27, 'Anita Sari Lestari', '5a30c9609b52fe348fb6925896e061de', 'Jl. Merdeka No. 22, Semarang', '3203456789012345', '083245678902', '202412-016'),
(28, 'Maria Farida Wulandari', '5a30c9609b52fe348fb6925896e061de', 'Jl. Sudirman No. 30, Semarang', '3204567890123456', '081234678903', '202412-017'),
(29, 'Rudi Handoko Santoso', '5a30c9609b52fe348fb6925896e061de', 'Jl. Kartini No. 8, Semarang', '3205678901234567', '085234567894', '202412-018'),
(30, 'Budi Santoso Prasetyo', '5a30c9609b52fe348fb6925896e061de', 'Jl. Gajah Mada No. 15, Semarang', '3206789012345678', '082345678905', '202412-019'),
(31, 'Lia Triana Kartika', '5a30c9609b52fe348fb6925896e061de', 'Jl. Yos Sudarso No. 18, Semarang', '3207890123456789', '083456789906', '202412-020'),
(32, 'Erwin Kusuma Santosa', '5a30c9609b52fe348fb6925896e061de', 'Jl. Jendral Sudirman No. 10, Semarang', '3208901234567890', '081234567907', '202412-021'),
(33, 'Nadia Lestari Sari', '5a30c9609b52fe348fb6925896e061de', 'Jl. Tugu No. 9, Semarang', '3209012345678901', '085567890908', '202412-022'),
(34, 'Albert Kunei', '5a30c9609b52fe348fb6925896e061de', 'Jl. Merdeka No. 33, Semarang', '3203456789015322', '081337256889', '202412-023');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id` int NOT NULL,
  `id_daftar_poli` int UNSIGNED NOT NULL,
  `tgl_periksa` datetime NOT NULL,
  `catatan` text COLLATE utf8mb4_general_ci NOT NULL,
  `biaya_periksa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id`, `id_daftar_poli`, `tgl_periksa`, `catatan`, `biaya_periksa`) VALUES
(4, 3, '2024-01-06 10:00:00', 'semoga lekas sembuh', 176000),
(5, 4, '2024-01-08 00:32:00', 'semoga lekas sembuh', 172000),
(6, 5, '2024-01-08 14:50:00', 'semoga lekas sembuh', 178000),
(7, 11, '2024-12-29 19:47:00', 'modaro', 182000),
(8, 12, '2024-12-31 21:04:00', 'adsdsdsdsdsdsdsdsdsdsds', 240000),
(9, 13, '2024-12-31 22:17:00', 'wakowoakwko', 215000),
(10, 14, '2024-12-31 23:51:00', 'mmmmmmmmmm', 225000);

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id` int NOT NULL,
  `nama_poli` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id`, `nama_poli`, `keterangan`) VALUES
(10, 'Poliklinik Umum', 'Poliklinik umum adalah fasilitas kesehatan yang menyediakan pelayanan medis dasar untuk diagnosis, perawatan, dan pencegahan penyakit umum. Poliklinik ini menangani masalah kesehatan yang tidak spesifik pada satu sistem tubuh, seperti demam, flu, batuk, infeksi ringan, dan pemeriksaan kesehatan rutin.'),
(16, 'Poliklinik Gigi', 'Poliklinik gigi adalah fasilitas medis yang khusus menangani masalah kesehatan gigi dan mulut. Layanan yang diberikan mencakup pembersihan gigi, pencabutan gigi, perawatan saluran akar, pemasangan gigi palsu, serta pemeriksaan dan pengobatan masalah lainnya seperti gusi berdarah, gigi berlubang, dan perawatan ortodonti (braces).'),
(17, 'Poliklinik Anak', 'Poliklinik anak adalah klinik yang didedikasikan untuk perawatan kesehatan anak-anak dari bayi hingga remaja. Poliklinik ini menangani berbagai masalah kesehatan anak, termasuk imunisasi, tumbuh kembang, infeksi, alergi, gangguan pernapasan, serta penyakit yang sering dialami anak-anak seperti diare, batuk pilek, dan demam.'),
(18, 'Poliklinik Mata', 'Poliklinik mata adalah fasilitas kesehatan yang berfokus pada perawatan dan pengobatan masalah kesehatan mata. Layanan yang diberikan mencakup pemeriksaan mata, pengobatan penyakit mata (seperti konjungtivitis, katarak, glaukoma), perbaikan penglihatan (misalnya dengan kacamata atau operasi LASIK), serta perawatan masalah mata lainnya.'),
(19, 'Poliklinik THT', 'Poliklinik THT adalah layanan medis yang menangani penyakit dan gangguan pada telinga, hidung, dan tenggorokan. Dokter spesialis THT akan menangani masalah seperti infeksi telinga, gangguan pendengaran, sinusitis, radang tenggorokan, gangguan suara, dan alergi saluran pernapasan atas.'),
(20, 'Poliklinik Kulit', 'Poliklinik kulit (atau dermatologi) adalah klinik yang mengkhususkan diri pada perawatan masalah kulit, rambut, dan kuku. Dokter spesialis kulit menangani berbagai masalah seperti jerawat, eksim, psoriasis, infeksi kulit, alergi kulit, serta perawatan kosmetik seperti perawatan anti-penuaan dan pengobatan kerutan.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_daftarPoli_jadwal` (`id_jadwal`),
  ADD KEY `fk_daftarPoli_pasien` (`id_pasien`);

--
-- Indexes for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detailPeriksa_periksa` (`id_periksa`),
  ADD KEY `fk_detailPeriksa_obat` (`id_obat`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dokter_poli` (`id_poli`);

--
-- Indexes for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jadwal_dokter` (`id_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_periksa_daftarPoli` (`id_daftar_poli`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_poli`
--
ALTER TABLE `daftar_poli`
  ADD CONSTRAINT `fk_daftarPoli_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_periksa` (`id`),
  ADD CONSTRAINT `fk_daftarPoli_pasien` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`);

--
-- Constraints for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD CONSTRAINT `fk_detailPeriksa_obat` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `fk_detailPeriksa_periksa` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id`);

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `fk_dokter_poli` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id`);

--
-- Constraints for table `jadwal_periksa`
--
ALTER TABLE `jadwal_periksa`
  ADD CONSTRAINT `fk_jadwal_dokter` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`);

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `fk_periksa_daftarPoli` FOREIGN KEY (`id_daftar_poli`) REFERENCES `daftar_poli` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
