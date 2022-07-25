-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2020 pada 07.45
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_coba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `user`, `pass`) VALUES
('1', 'Aulia', 'admin', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_coba`
--

CREATE TABLE `data_coba` (
  `no_reg` int(11) NOT NULL,
  `status_ayah` varchar(20) NOT NULL,
  `pekerjaan_ayah` varchar(35) NOT NULL,
  `gaji_ayah` varchar(25) NOT NULL,
  `status_ibu` varchar(20) NOT NULL,
  `pekerjaan_ibu` varchar(35) NOT NULL,
  `gaji_ibu` varchar(25) NOT NULL,
  `label` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_coba`
--

INSERT INTO `data_coba` ('no_reg',	'status_ayah',	'pekerjaan_ayah',	'gaji_ayah',	'status_ibu',	'pekerjaan_ibu',	'gaji_ibu',	'Label') VALUES
(20200011,	'hidup',	'Pegawai Swasta',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Ibu Rumah Tangga',	'< Rp.500.000.-',	'LUNAS'),
(20200017,	'hidup',	'Petani',	'< Rp.500.000.-',	'hidup',	'Ibu Rumah Tangga',	'< Rp.500.000.-',	'LUNAS'),
(20200023,	'hidup',	'Lain-lain',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Guru (Pengajar)',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'LUNAS'),
(20200024,	'hidup',	'Pegawai Negeri (PNS)',	'Rp.7.000.001,- sampai Rp.12.000.000,-',	'hidup',	'Ibu Rumah Tangga',	',< Rp.500.000.-',	'MENCICIL'),
(20200025,	'hidup',	'Pegawai Negeri (PNS)',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Pegawai Negeri (PNS)',	',Rp.3.500.001,- sampai Rp.7.000.000,-',	'LUNAS'),
(20200026,	'hidup',	'Tukang Listrik',	'Rp.7.000.001,- sampai Rp.12.000.000,-',	'hidup',	'Ibu Rumah Tangga',	'< Rp.500.000.-',	'LUNAS'),
(20200030,	'hidup',	'Pegawai Negeri (PNS)',	'Rp.7.000.001,- sampai Rp.12.000.000,-',	'hidup',	'TIDAK BEKERJA',	'< Rp.500.000.-',	'MENUNGGAK'),
(20200033,	'hidup',	'Pelaut',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Ibu Rumah Tangga',	'< Rp.500.000.-',	'MENCICIL'),
(20200035,	'hidup',	'Karyawan',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Ibu Rumah Tangga',	',< Rp.500.000.-',	'LUNAS'),
(20200074,	'hidup',	'Wiraswasta (Usaha Sendiri)',	'Rp.1.000.001 sampai Rp.3.500.000,-',	'hidup',	'Wiraswasta (Usaha Sendiri)',	'Rp.500.001,- sampai Rp.1.000.000,-','	'LUNAS'),
(20200092,	'hidup',	'Petani',	'Rp.3.500.001  sampai Rp.7.000.000,-',	'hidup',	'Ibu Rumah Tangga',	'Rp.1.000.001,- sampai Rp.3.500.000,-',	'LUNAS'),
(20200095,	'hidup',	'Karyawan',	'Rp.3.500.001  sampai Rp.7.000.000,-',	'hidup',	'Ibu Rumah Tangga',	'< Rp.500.000.-',	'LUNAS'),
(20200096,	'hidup',	'PENSIUN',	'Rp.1.000.001  sampai Rp.3.500.000,-',	'hidup',	'Pegawai Negeri (PNS)','	'Rp.3.500.001,- sampai Rp.7.000.000,-','	'MENCICIL'),
(20200107,	'hidup',	'Wiraswasta (Usaha Sendiri)',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Wiraswasta (Usaha Sendiri)',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'LUNAS'),
(20200110,	'hidup',	'Karyawan',	'> Rp.12.000.001,-',	'hidup',	'Ibu Rumah Tangga',	< Rp.500.000.-	'MENUNGGAK'),
(20200112,	'hidup',	'Notaris',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Wiraswasta (Usaha Sendiri)',	'Rp.500.001,- sampai Rp.1.000.000,-',	'MENUNGGAK'),
(20200114,	'hidup',	'Wiraswasta (Usaha Sendiri)',	'Rp.500.001,- sampai Rp.1.000.000,-',	'hidup',	'Ibu Rumah Tangga',	'< Rp.500.000.-',	'LUNAS'),
(20200120,	'hidup',	'Karyawan',	'Rp.7.000.001,- sampai Rp.12.000.000,-',	'hidup',	'Ibu Rumah Tangga',	'< Rp.500.000.-',	'LUNAS'),
(20200125,	'hidup',	'TNI',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Ibu Rumah Tangga',	',Rp.3.500.001,- sampai Rp.7.000.000,-',	'LUNAS');
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_train`
--

CREATE TABLE `data_coba` (
  `no_reg` int(11) NOT NULL,
  `status_ayah` varchar(20) NOT NULL,
  `pekerjaan_ayah` varchar(35) NOT NULL,
  `gaji_ayah` varchar(25) NOT NULL,
  `status_ibu` varchar(20) NOT NULL,
  `pekerjaan_ibu` varchar(35) NOT NULL,
  `gaji_ibu` varchar(25) NOT NULL,
  `label` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_train`
--

INSERT INTO `data_coba` ('no_reg',	'status_ayah',	'pekerjaan_ayah',	'gaji_ayah',	'status_ibu',	'pekerjaan_ibu',	'gaji_ibu',	'Label') VALUES
(20200011,	'hidup',	'Pegawai Swasta',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Ibu Rumah Tangga',	'< Rp.500.000.-',	'LUNAS'),
(20200017,	'hidup',	'Petani',	'< Rp.500.000.-',	'hidup',	'Ibu Rumah Tangga',	'< Rp.500.000.-',	'LUNAS'),
(20200023,	'hidup',	'Lain-lain',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Guru (Pengajar)',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'LUNAS'),
(20200024,	'hidup',	'Pegawai Negeri (PNS)',	'Rp.7.000.001,- sampai Rp.12.000.000,-',	'hidup',	'Ibu Rumah Tangga',	',< Rp.500.000.-',	'MENCICIL'),
(20200025,	'hidup',	'Pegawai Negeri (PNS)',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Pegawai Negeri (PNS)',	',Rp.3.500.001,- sampai Rp.7.000.000,-',	'LUNAS'),
(20200026,	'hidup',	'Tukang Listrik',	'Rp.7.000.001,- sampai Rp.12.000.000,-',	'hidup',	'Ibu Rumah Tangga',	'< Rp.500.000.-',	'LUNAS'),
(20200030,	'hidup',	'Pegawai Negeri (PNS)',	'Rp.7.000.001,- sampai Rp.12.000.000,-',	'hidup',	'TIDAK BEKERJA',	'< Rp.500.000.-',	'MENUNGGAK'),
(20200033,	'hidup',	'Pelaut',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Ibu Rumah Tangga',	'< Rp.500.000.-',	'MENCICIL'),
(20200035,	'hidup',	'Karyawan',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Ibu Rumah Tangga',	',< Rp.500.000.-',	'LUNAS'),
(20200074,	'hidup',	'Wiraswasta (Usaha Sendiri)',	'Rp.1.000.001,- sampai Rp.3.500.000,-',	'hidup',	'Wiraswasta (Usaha Sendiri)',	'Rp.500.001,- sampai Rp.1.000.000,-','	'LUNAS'),
(20200092,	'hidup',	'Petani',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Ibu Rumah Tangga',	'Rp.1.000.001 sampai Rp.3.500.000',	'LUNAS'),
(20200095,	'hidup',	'Karyawan',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Ibu Rumah Tangga',	'< Rp.500.000',	'LUNAS'),
(20200096,	'hidup',	'PENSIUN',	'Rp.1.000.001,- sampai Rp.3.500.000,-',	'hidup',	'Pegawai Negeri (PNS)','	'Rp.3.500.001,- sampai Rp.7.000.000,-','	'MENCICIL'),
(20200107,	'hidup',	'Wiraswasta (Usaha Sendiri)',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Wiraswasta (Usaha Sendiri)',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'LUNAS'),
(20200110,	'hidup',	'Karyawan',	'> Rp.12.000.001,-',	'hidup',	'Ibu Rumah Tangga',	< Rp.500.000.-	'MENUNGGAK'),
(20200112,	'hidup',	'Notaris',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Wiraswasta (Usaha Sendiri)',	'Rp.500.001,- sampai Rp.1.000.000,-',	'MENUNGGAK'),
(20200114,	'hidup',	'Wiraswasta (Usaha Sendiri)',	'Rp.500.001,- sampai Rp.1.000.000,-',	'hidup',	'Ibu Rumah Tangga',	'< Rp.500.000.-',	'LUNAS'),
(20200120,	'hidup',	'Karyawan',	'Rp.7.000.001,- sampai Rp.12.000.000,-',	'hidup',	'Ibu Rumah Tangga',	'< Rp.500.000.-',	'LUNAS'),
(20200125,	'hidup',	'TNI',	'Rp.3.500.001,- sampai Rp.7.000.000,-',	'hidup',	'Ibu Rumah Tangga',	',Rp.3.500.001,- sampai Rp.7.000.000,-',	'LUNAS');
);


-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_naive`
--

CREATE TABLE `hasil_naive` (
  `no_reg` int(11) NOT NULL,
  `status_ayah` varchar(20) NOT NULL,
  `pekerjaan_ayah` varchar(35) NOT NULL,
  `gaji_ayah` varchar(25) NOT NULL,
  `status_ibu` varchar(20) NOT NULL,
  `pekerjaan_ibu` varchar(35) NOT NULL,
  `gaji_ibu` varchar(25) NOT NULL,
  `label` varchar(15) NOT NULL,
  `hasil_menunggak` varchar(20) NOT NULL,
  `hasil_lunas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil_naive`
--

INSERT INTO `hasil_naive` (`no_reg`, `status_ayah`, `pekerjaan_ayah`, `gaji_ayah`,  `status_ibu`, `pekerjaan_ibu`, `gaji_ibu`, `label`, `hasil_menunggak`,  `hasil_lunas`) VALUES


--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `data_testing`
--
ALTER TABLE `data_coba`
  ADD PRIMARY KEY (`no_coba`);

--
-- Indeks untuk tabel `data_train`
--
ALTER TABLE `data_coba`
  ADD PRIMARY KEY (`no_coba`);

--
-- Indeks untuk tabel `hasil_naive`
--
ALTER TABLE `hasil_naive`
  ADD PRIMARY KEY (`id_hasil`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_testing`
--
ALTER TABLE `data_coba`
  MODIFY `no_testing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=571;

--
-- AUTO_INCREMENT untuk tabel `data_train`
--
ALTER TABLE `data_coba`
  MODIFY `no_train` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT untuk tabel `hasil_naive`
--
ALTER TABLE `hasil_naive`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
