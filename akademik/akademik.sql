-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2024 pada 16.45
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `kodemk` varchar(10) NOT NULL,
  `pertemuanke` int(11) NOT NULL,
  `topik` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `kodemk`, `pertemuanke`, `topik`) VALUES
(1, 'MK001', 1, 'Pengenalan Pemrograman'),
(2, 'MK002', 1, 'Pengantar Basis Data'),
(8, 'MK001', 3, 'Struktur Kontrol'),
(9, 'MK002', 1, 'Pengantar Basis Data'),
(10, 'MK002', 2, 'Model Data Relasional'),
(11, 'MK002', 3, 'Perancangan Database'),
(12, 'MK003', 1, 'Konsep Dasar Algoritma'),
(13, 'MK003', 2, 'Pseudocode dan Flowchart'),
(14, 'MK003', 3, 'Analisis Kompleksitas'),
(15, 'MK004', 1, 'Pengenalan Jaringan Komputer'),
(16, 'MK004', 2, 'Model OSI'),
(17, 'MK004', 3, 'Protokol TCP/IP'),
(18, 'MK005', 1, 'Pemrograman Berbasis Objek'),
(19, 'MK005', 2, 'Inheritance dan Polimorfisme'),
(20, 'MK005', 3, 'Konsep Abstraksi'),
(21, 'MK006', 1, 'Pengantar Keamanan Informasi'),
(22, 'MK006', 2, 'Enkripsi dan Dekripsi'),
(23, 'MK006', 3, 'Keamanan Jaringan'),
(24, 'MK007', 1, 'Pengenalan Sistem Operasi'),
(25, 'MK007', 2, 'Manajemen Proses'),
(26, 'MK007', 3, 'Manajemen Memori');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `kodemk` varchar(10) NOT NULL,
  `matakuliah` varchar(100) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `waktu` time NOT NULL,
  `ruangan` varchar(50) NOT NULL,
  `dosen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `kodemk`, `matakuliah`, `kelas`, `hari`, `waktu`, `ruangan`, `dosen`) VALUES
(1, 'MK001', 'Pemrograman Dasar', 'TI-A', 'Senin', '08:00:00', 'Lab Komputer 1', 'Dr. Ahmad '),
(2, 'MK002', 'Basis Data', 'TI-B', 'Rabu', '10:00:00', 'Lab Komputer 2', 'Dr. Siti Rahma'),
(11, 'MK003', 'Algoritma', 'TI-C', 'Jumat', '13:00:00', 'Lab Komputer 3', 'Dr. Joko Prasetyo'),
(12, 'MK004', 'Jaringan Komputer', 'TI-A', 'Kamis', '09:00:00', 'Lab Jaringan 1', 'Dr. Endah Wati'),
(13, 'MK005', 'Pemrograman Lanjut', 'TI-B', 'Selasa', '14:00:00', 'Lab Komputer 4', 'Dr. Wahyu Susilo'),
(14, 'MK006', 'Keamanan Informasi', 'TI-C', 'Senin', '11:00:00', 'Lab Keamanan 1', 'Dr. Ani Wijaya'),
(15, 'MK007', 'Sistem Operasi', 'TI-A', 'Rabu', '13:00:00', 'Lab Komputer 2', 'Dr. Rizki Firmansyah'),
(16, 'MK008', 'Statistika', 'TI-B', 'Kamis', '15:00:00', 'Lab Matematika', 'Dr. Nurul Fikri'),
(17, 'MK009', 'Manajemen Proyek', 'TI-C', 'Selasa', '08:00:00', 'Ruang Rapat', 'Dr. Dewi Saraswati'),
(18, 'MK010', 'Pengolahan Citra', 'TI-A', 'Jumat', '09:00:00', 'Lab Komputer 5', 'Dr. Agus Setiawan'),
(19, 'MK011', 'Pemrograman Web', 'TI-B', 'Senin', '10:00:00', 'Lab Komputer 3', 'Dr. Budi Nugraha'),
(20, 'MK012', 'Kecerdasan Buatan', 'TI-C', 'Rabu', '14:00:00', 'Lab AI', 'Dr. Citra Maharani'),
(21, 'MK013', 'Pemrograman Mobile', 'TI-A', 'Kamis', '08:00:00', 'Lab Komputer 6', 'Dr. Denny Ramadhan'),
(22, 'MK014', 'Sistem Informasi', 'TI-B', 'Jumat', '11:00:00', 'Lab Komputer 7', 'Dr. Erwin Kurniawan'),
(23, 'MK015', 'Pengantar Data Science', 'TI-C', 'Selasa', '10:00:00', 'Lab DS', 'Dr. Febrianto Sugih'),
(24, 'MK016', 'Data Mining', 'TI-A', 'Kamis', '13:00:00', 'Lab Komputer 1', 'Dr. Galih Ramli'),
(25, 'MK017', 'Cloud Computing', 'TI-B', 'Rabu', '08:00:00', 'Lab Komputer 8', 'Dr. Hari Purwanto'),
(26, 'MK018', 'Manajemen Database', 'TI-C', 'Senin', '09:00:00', 'Lab Komputer 9', 'Dr. Indah Pratiwi'),
(27, 'MK019', 'Pemrograman Python', 'TI-A', 'Selasa', '11:00:00', 'Lab Python', 'Dr. Junaidi Hasan'),
(28, 'MK020', 'Metodologi Penelitian', 'TI-B', 'Kamis', '10:00:00', 'Ruang Kuliah', 'Dr. Kartika Wijaya'),
(29, 'MK021', 'Teori Komputasi', 'TI-C', 'Jumat', '14:00:00', 'Lab Komputer 10', 'Dr. Laila Putri'),
(30, 'MK022', 'Pemrograman Java', 'TI-A', 'Senin', '08:00:00', 'Lab Komputer 11', 'Dr. Miftahul Huda'),
(31, 'MK023', 'Pengantar Robotika', 'TI-B', 'Rabu', '09:00:00', 'Lab Robotika', 'Dr. Nanda Rahman'),
(32, 'MK024', 'Manajemen TI', 'TI-C', 'Kamis', '14:00:00', 'Lab TI', 'Dr. Oktaviani Andini'),
(33, 'MK025', 'Pemrograman PHP', 'TI-A', 'Selasa', '13:00:00', 'Lab Komputer 12', 'Dr. Pandu Nugroho'),
(34, 'MK026', 'Analisis Algoritma', 'TI-B', 'Jumat', '15:00:00', 'Lab Komputer 13', 'Dr. Qory Anindita'),
(35, 'MK027', 'Big Data', 'TI-C', 'Senin', '10:00:00', 'Lab Big Data', 'Dr. Rian Suryadi'),
(36, 'MK028', 'Pemrograman C#', 'TI-A', 'Rabu', '11:00:00', 'Lab Komputer 14', 'Dr. Siska Amelia'),
(37, 'MK029', 'Teknik Kompilasi', 'TI-B', 'Kamis', '09:00:00', 'Lab Komputer 15', 'Dr. Taufiq Akbar'),
(38, 'MK030', 'Manajemen Server', 'TI-C', 'Selasa', '08:00:00', 'Lab Server', 'Dr. Umi Salamah'),
(39, 'MK0031', 'SAINS', 'D', 'Sabtu', '08:30:00', 'G. Machdor 302', 'Dr. Taty, S.Pd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kodemk` varchar(10) NOT NULL,
  `nilai_kehadiran` decimal(5,2) NOT NULL,
  `nilai_tugas` decimal(5,2) NOT NULL,
  `nilai_uts` decimal(5,2) NOT NULL,
  `nilai_uas` decimal(5,2) NOT NULL,
  `nilai_akhir` decimal(5,2) GENERATED ALWAYS AS (`nilai_kehadiran` * 0.1 + `nilai_tugas` * 0.2 + `nilai_uts` * 0.3 + `nilai_uas` * 0.4) VIRTUAL,
  `mutu` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `nim`, `nama`, `kodemk`, `nilai_kehadiran`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `mutu`) VALUES
(1, '220001', 'Andi Saputra', 'MK001', 90.00, 85.00, 88.00, 92.00, 'A'),
(9, '220003', 'Citra Maharani', 'MK002', 95.00, 90.00, 89.00, 94.00, 'A'),
(10, '220004', 'Dian Pratiwi', 'MK002', 80.00, 78.00, 75.00, 85.00, 'B'),
(11, '220005', 'Eko Nugroho', 'MK003', 88.00, 84.00, 82.00, 90.00, 'B'),
(12, '220006', 'Fani Ramadhani', 'MK003', 92.00, 91.00, 90.00, 93.00, 'A'),
(13, '220007', 'Gilang Saputra', 'MK004', 87.00, 83.00, 85.00, 88.00, 'B'),
(14, '220008', 'Hana Sari', 'MK004', 95.00, 93.00, 92.00, 94.00, 'A'),
(15, '220009', 'Irfan Pratama', 'MK005', 78.00, 75.00, 74.00, 80.00, 'C'),
(16, '220010', 'Joko Santoso', 'MK005', 89.00, 86.00, 88.00, 90.00, 'B'),
(17, '220011', 'Karin Wulandari', 'MK006', 92.00, 90.00, 91.00, 93.00, 'A'),
(18, '220012', 'Lina Permata', 'MK006', 85.00, 82.00, 84.00, 88.00, 'B'),
(19, '220013', 'Miko Susanto', 'MK007', 80.00, 78.00, 75.00, 82.00, 'C'),
(20, '220014', 'Nina Amelia', 'MK007', 93.00, 90.00, 91.00, 95.00, 'A'),
(21, '220015', 'Oki Setiawan', 'MK008', 89.00, 87.00, 86.00, 90.00, 'B'),
(22, '220016', 'Puspa Indah', 'MK008', 85.00, 83.00, 82.00, 86.00, 'B'),
(23, '220017', 'Qori Ananda', 'MK009', 78.00, 76.00, 75.00, 80.00, 'C'),
(24, '220018', 'Rian Hartono', 'MK009', 95.00, 93.00, 92.00, 96.00, 'A'),
(25, '220019', 'Siti Nurhaliza', 'MK010', 90.00, 88.00, 87.00, 91.00, 'A'),
(26, '220020', 'Toni Wijaya', 'MK010', 84.00, 82.00, 81.00, 85.00, 'B'),
(27, '220021', 'Umar Alwi', 'MK011', 85.00, 83.00, 82.00, 86.00, 'B'),
(28, '220022', 'Vina Sari', 'MK011', 95.00, 94.00, 93.00, 96.00, 'A'),
(29, '220023', 'Wina Lestari', 'MK012', 88.00, 86.00, 85.00, 89.00, 'B'),
(30, '220024', 'Xena Putri', 'MK012', 91.00, 90.00, 89.00, 93.00, 'A'),
(31, '220025', 'Yuda Kurniawan', 'MK013', 79.00, 77.00, 76.00, 81.00, 'C'),
(32, '220026', 'Zahra Amalia', 'MK013', 93.00, 91.00, 92.00, 95.00, 'A'),
(33, '220027', 'Abdi Pratama', 'MK014', 88.00, 85.00, 87.00, 89.00, 'B'),
(34, '220028', 'Bela Sari', 'MK014', 84.00, 82.00, 80.00, 85.00, 'B'),
(35, '220029', 'Citra Maharani', 'MK015', 95.00, 93.00, 94.00, 96.00, 'A'),
(36, '220030', 'Dani Santoso', 'MK015', 78.00, 76.00, 75.00, 80.00, 'C');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodemk` (`kodemk`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kodemk` (`kodemk`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kodemk` (`kodemk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`kodemk`) REFERENCES `jadwal` (`kodemk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kodemk`) REFERENCES `jadwal` (`kodemk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
