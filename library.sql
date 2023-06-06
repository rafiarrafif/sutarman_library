-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2023 pada 17.36
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `isbn` varchar(13) NOT NULL,
  `namebook` varchar(100) DEFAULT NULL,
  `penulis` varchar(150) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `penerbit` varchar(80) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`isbn`, `namebook`, `penulis`, `year`, `penerbit`, `jumlah`) VALUES
('9780593189641', 'Atomic Habits', 'James Clear', 2020, 'Penguin Us', 4),
('9786020333175', 'Rich Dad Poor Dad', 'Robert T.Kiyosaki', 2016, 'Gramedia', 13),
('9786020351179', 'Bintang', 'Tere Liye', 2017, 'Gramedia Pustaka Utama', 26),
('9786020523316', 'Melangkah', 'Js. Khairen', 2020, 'Gramedia Widiasarana Indonesia', 26),
('9786020652252', 'Si Putih', 'Tere Liye', 2021, 'Gramedia Pustaka Utama', 25),
('9786020670690', 'Angsa dan Kelelawar', 'Kiego Higashino', 2023, 'Gramedia Pustaka Utama', 19),
('9786022203018', 'Merebah Riuh', 'Sacessahci', 2019, 'Bukune', 30),
('9786024819484', 'My Long Black: Unsent Letters', 'Zulie', 2022, 'Kepustakaan Populer Gramedia', 24),
('9786029474039', 'Berjuta Rasanya', 'Tere Liye', 2012, 'Mahaka', 32),
('9786230017193', 'Demon Slayer: Kimetsu no Yaiba 01', 'Koyoharu Gotouge', 2020, 'Elex Media Komputindo', 25),
('9786230018220', 'Demon Slayer: Kimetsu no Yaiba 02', 'Koyoharu Gotouge', 2020, 'Elex Media Komputindo', 27),
('9786230018961', 'Demon Slayer: Kimetsu no Yaiba 03', 'Koyoharu Gotouge', 2020, 'Elex Media Komputindo', 26),
('9786230019685', 'Demon Slayer: Kimetsu no Yaiba 04', 'Koyoharu Gotouge', 2021, 'Elex Media Komputindo', 15),
('9786230022180', 'Jujutsu Kaisen 01', 'Gege Akutami', 2021, 'Elex Media Komputindo', 31),
('9786230022711', 'Demon Slayer: Kimetsu no Yaiba 10', 'Koyoharu Gotouge', 2022, 'Elex Media Komputindo', 31),
('9786230024382', 'Demon Slayer: Kimetsu no Yaiba 05', 'Koyoharu Gotouge', 2021, 'Elex Media Komputindo', 18),
('9786230024399', 'Jujutsu Kaisen 02', 'Gege Akutami', 2021, 'Elex Media Komputindo', 28),
('9786230024672', 'Jujutsu Kaisen 03', 'Gege Akutami', 2021, 'Elex Media Komputindo', 18),
('9786230024689', 'Demon Slayer: Kimetsu no Yaiba 06', 'Koyoharu Gotouge', 2021, 'Elex Media Komputindo', 22),
('9786230025883', 'Jujutsu Kaisen 07', 'Gege Akutami', 2022, 'Elex Media Komputindo', 16),
('9786230026942', 'Jujutsu Kaisen 04', 'Gege Akutami', 2021, 'Elex Media Komputindo', 21),
('9786230027871', 'Demon Slayer: Kimetsu no Yaiba 07', 'Koyoharu Gotouge', 2021, 'Elex Media Komputindo', 31),
('9786230029783', 'Jujutsu Kaisen 05', 'Gege Akutami', 2022, 'Elex Media Komputindo', 24),
('9786230029806', 'Demon Slayer: Kimetsu no Yaiba 08', 'Koyoharu Gotouge', 2022, 'Elex Media Komputindo', 33),
('9786230029974', 'Blue Lock 01', 'Muneyuki Kaneshiro', 2022, 'Elex Media Komputindo', 30),
('9786230031274', 'Jujutsu Kaisen 06', 'Gege Akutami', 2022, 'Elex Media Komputindo', 20),
('9786230031281', 'Demon Slayer: Kimetsu no Yaiba 09', 'Koyoharu Gotouge', 2022, 'Elex Media Komputindo', 35),
('9786230031397', 'Blue Lock 02', 'Muneyuki Kaneshiro', 2022, 'Elex Media Komputindo', 29),
('9786230031489', 'Silent Demon', 'Fino Y.K', 2022, 'Elex Media Komputindo', 31),
('9786230032288', 'Blue Lock 03', 'Muneyuki Kaneshiro', 2022, 'Elex Media Komputindo', 31),
('9786230034336', 'Blue Lock 04', 'Muneyuki Kaneshiro', 2022, 'Elex Media Komputindo', 27),
('9786230035135', 'Blue Lock 05', 'Muneyuki Kaneshiro', 2022, 'Elex Media Komputindo', 22),
('9786230035388', 'Demon Slayer: Kimetsu no Yaiba 11', 'Koyoharu Gotouge', 2022, 'Elex Media Komputindo', 23),
('9786230036743', 'Rumus-Rumus Juara, Di Balik Rumus-Rumus Juara', 'Mischka Aoki & Devon Kei Enzo', 2022, 'Elex Media Komputindo', 10),
('9786230036767', 'Demon Slayer: Kimetsu no Yaiba 12', 'Koyoharu Gotouge', 2023, 'Elex Media Komputindo', 25),
('9786230036828', 'Jujutsu Kaisen 08', 'Gege Akutami', 2023, 'Elex Media Komputindo', 15),
('9786230036996', 'Immortal Butterfly: Dark Urban Legend', 'Ryo Azuki', 2022, 'Elex Media Komputindo', 23),
('9786230037009', 'Waru', 'Aji Fauzi', 2022, 'Elex Media Komputindo', 26),
('9786230037405', 'Lemonade Granny', 'Hyung I Rang', 2022, 'Elex Media Komputindo', 17),
('9786230046698', 'Jujutsu Kaisen 09', 'Gege Akutami', 2023, 'Elex Media Komputindo', 17),
('9786230046810', 'Demon Slayer: Kimetsu no Yaiba 13', 'Koyoharu Gotouge', 2023, 'Elex Media Komputindo', 13),
('9786230404306', 'Bicara Itu Ada Seninya', 'Oh Su Hyang', 2021, 'Bhuana Ilmu Populer', 17),
('9786238829682', 'Hello', 'Tere Liye', 2023, 'Penerbit Sabak Grip', 19),
('9786239554569', 'Tentang Kamu', 'Tere Liye', 2021, 'Penerbit Sabak Grip', 30),
('9786239726249', 'Bibi Gill', 'Tere Liye', 2022, 'Penerbit Sabak Grip', 29),
('9786239726256', 'Sagaras', 'Tere Liye', 2022, 'Penerbit Sabak Grip', 14),
('9786239726270', 'Matahari', 'Tere Liye', 2022, 'Penerbit Sabak Grip', 33),
('9786239726287', 'Bulan', 'Tere Liye', 2022, 'Penerbit Sabak Grip', 16),
('9786239987879', 'Hujan', 'Tere Liye', 2022, 'Penerbit Sabak Grip', 26),
('9789793062792', 'Laskar Pelangi', 'Andrea Hirata', 2011, 'Bentang Pusaka', 17),
('9999999999999', 'Rafi Arrafif', 'ASASASA', 2021, 'aqa', 23),
('FINALTEST', 'Final Quality Control and Bug Fixing', 'Sutarman Library', 2023, 'MY TEAM', 100),
('SCOOPG10530', 'Negeri 5 Menara', 'Ahmad Fuadi', 2013, 'Gramedia', 7),
('SCOOPG143505', 'Laut Bercerita', 'Leila S. Chudori', 2017, 'Kepustakaan Populer Gramedia', 17),
('WAHYUWAHYU123', 'Legenda Wicaksono', 'Gindha Wisnu', 2014, 'Hasbullah VIII', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id` int(11) NOT NULL,
  `nis` int(11) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `namestudent` varchar(255) DEFAULT NULL,
  `namebook` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pinjaman`
--

INSERT INTO `pinjaman` (`id`, `nis`, `isbn`, `namestudent`, `namebook`) VALUES
(93, 1234560, '9786020333175', 'IVO', 'Rich Dad Poor Dad'),
(98, 1234560, 'WAHYUWAHYU123', 'IVO', 'Legenda Wicaksono'),
(101, 64353452, '9786239726287', 'Ajimat', 'Bulan'),
(102, 63212355, '9786239554569', 'Amelia', 'Tentang Kamu'),
(103, 23213142, 'SCOOPG143505', 'Budiyanto', 'Laut Bercerita'),
(104, 12313243, '9786239726256', 'Hasim', 'Sagaras'),
(105, 43534534, '9786239726270', 'Nakshatra', 'Matahari'),
(106, 13141344, '9786230019685', 'Anita', 'Demon Slayer: Kimetsu no Yaiba 04'),
(107, 22101165, '9786230022180', 'Yoshio Faza Clearesta', 'Jujutsu Kaisen 01'),
(108, 12423453, '9786239726270', 'Adit', 'Matahari'),
(109, 13141344, '9786239726287', 'Anita', 'Bulan'),
(110, 13123124, 'SCOOPG143505', 'Yuniar', 'Laut Bercerita'),
(111, 93849123, '9786239987879', 'Puji', 'Hujan'),
(119, 24324324, '9780593189641', 'Uwais', 'Atomic Habits'),
(120, 22101075, '9786029474039', 'Helmi Arrafif Kanahaya', 'Berjuta Rasanya'),
(122, 11, '9780593189641', 'ANAS', 'Atomic Habits');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sandi`
--

CREATE TABLE `sandi` (
  `id` int(11) NOT NULL,
  `admin_db` varchar(15) DEFAULT NULL,
  `pass` varchar(15) DEFAULT NULL,
  `time_session` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sandi`
--

INSERT INTO `sandi` (`id`, `admin_db`, `pass`, `time_session`) VALUES
(1, 'admin', 'admin123', 1200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `namestudent` varchar(150) DEFAULT NULL,
  `class` varchar(11) DEFAULT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `namestudent`, `class`, `jenis_kelamin`) VALUES
(11, 'ANAS', 'X MIPA 1', 'Female'),
(1234560, 'IVO', '10 mipa 15', 'Male'),
(12313243, 'Hasim', 'X MIPA 4', 'Male'),
(12423453, 'Adit', 'XII MIPA 3', 'Female'),
(12939242, 'Nainggolan', 'XI MIPA 1', 'Male'),
(13123124, 'Yuniar', 'XII MIPA 1', 'Female'),
(13141344, 'Anita', 'XII MIPA 9', 'Female'),
(13434143, 'Agus', 'X MIPA 3', 'Male'),
(13464536, 'Check 1', '10 mipa 15', 'Male'),
(21382131, 'Ragil', 'XII MIPA 12', 'Female'),
(21432423, 'Soeharto', 'XII MIPA 5', 'Male'),
(21433124, 'Septi', 'XII MIPA 12', 'Female'),
(22101075, 'Helmi Arrafif Kanahaya', 'XI MIPA 5', 'Male'),
(22101106, 'Muhammad Faturochman', 'XII MIPA 7', 'Female'),
(22101120, 'Muhammad Raja\'Asyraf', 'X MIPA 3', 'Male'),
(22101165, 'Yoshio Faza Clearesta', 'X MIPA 8', 'Male'),
(23213142, 'Budiyanto', 'XII MIPA 10', 'Female'),
(23534534, 'Kusyala', 'XI MIPA 12', 'Female'),
(24324324, 'Uwais', 'XI MIPA 6', 'Female'),
(24332432, 'Sutarman', 'XII MIPA 4', 'Male'),
(32423431, 'Siti', 'XI MIPA 6', 'Female'),
(32423432, 'Aisyah', 'XII MIPA 8', 'Female'),
(32424324, 'Pia', 'XII MIPA 7', 'Female'),
(32532525, 'Gaiman', 'XII MIPA 4', 'Female'),
(34234343, 'Zainal', 'X MIPA 9', 'Female'),
(34343322, 'Yatno', 'X MIPA 7', 'Female'),
(34543224, 'Puan', 'XI MIPA 9', 'Female'),
(34567555, 'Agus Haryanto', '10 mipa 6', 'Female'),
(35325324, 'Parman', 'XI MIPA 5', 'Male'),
(36123435, 'Purnawati', 'XI MIPA 7', 'Female'),
(36124234, 'Fudly', 'X MIPA 10', 'Female'),
(36124354, 'Megawati', 'XI MIPA 8', 'Female'),
(36128798, 'David', 'X MIPA 2', 'Male'),
(36134324, 'Irawan', 'XI MIPA 4', 'Male'),
(36134634, 'Syauqi', 'X MIPA 11', 'Female'),
(36141324, 'Bancar', 'XI MIPA 3', 'Male'),
(36165465, 'Jannah', 'X MIPA 12', 'Female'),
(36436436, 'Alambana', 'XI MIPA 2', 'Female'),
(36765757, 'Dipa', 'XI MIPA 1', 'Male'),
(39048394, 'Indra', 'XI MIPA 2', 'Male'),
(41241242, 'Hutagalung', 'XII MIPA 8', 'Female'),
(41545245, 'Yuliarti', 'XII MIPA 7', 'Female'),
(43243434, 'Tri', 'X MIPA 8', 'Female'),
(43534534, 'Nakshatra', 'XI MIPA 11', 'Female'),
(52325325, 'Eka', 'XII MIPA 6', 'Female'),
(52353252, 'Kadiman', 'XII MIPA 5', 'Female'),
(53232523, 'Gawati', 'XI MIPA 3', 'Male'),
(53253253, 'Yanto', 'X MIPA 6', 'Female'),
(54252344, 'Zulaikha', 'XII MIPA 11', 'Female'),
(54352532, 'Ellis', 'XII MIPA 3', 'Female'),
(54354354, 'Maharani', 'XI MIPA 10', 'Female'),
(56463452, 'Daliono', 'XI MIPA 5', 'Male'),
(63212355, 'Amelia', 'XII MIPA 2', 'Male'),
(63414131, 'Widodo', 'X MIPA 5', 'Female'),
(64353452, 'Ajimat', 'XII MIPA 6', 'Female'),
(64354325, 'Yulia', 'XII MIPA 10', 'Female'),
(64364364, 'Kusyowo', 'XII MIPA 9', 'Female'),
(69696969, 'Julia', 'XI MIPA 7', 'Female'),
(73167233, 'Rahmat', 'XII MIPA 11', 'Female'),
(74375475, 'Joko', 'XII MIPA 1', 'Male'),
(81230767, 'aaaa', 'XII MIPA 8', 'Female'),
(87686867, 'Didik', 'XII MIPA 2', 'Male'),
(93849123, 'Puji', 'XI MIPA 4', 'Male'),
(214131321, 'Sepatu Dahlan', 'X MIPA 7', 'Male'),
(312313123, 'ivo', 'X MIPA 1', 'Male'),
(963852741, 'Final Quality Control', 'X MIPA 8', 'Female'),
(2147483647, 'SITI MAIMUNAH', 'XI MIPA 2', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`isbn`);

--
-- Indeks untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nis` (`nis`),
  ADD KEY `isbn` (`isbn`);

--
-- Indeks untuk tabel `sandi`
--
ALTER TABLE `sandi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT untuk tabel `sandi`
--
ALTER TABLE `sandi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `pinjaman_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  ADD CONSTRAINT `pinjaman_ibfk_2` FOREIGN KEY (`isbn`) REFERENCES `buku` (`isbn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
