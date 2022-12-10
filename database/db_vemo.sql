-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2022 pada 01.37
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vemo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` int(11) NOT NULL,
  `departemen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `departemen`) VALUES
(1, 'HR'),
(2, 'IT'),
(3, 'Marketing'),
(4, 'Purchasing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kendaraan`
--

CREATE TABLE `jenis_kendaraan` (
  `id_jenis_kendaraan` int(11) NOT NULL,
  `jenis_kendaraan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`id_jenis_kendaraan`, `jenis_kendaraan`) VALUES
(1, 'Angkutan Barang'),
(2, 'Angkutan Orang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `nama_kendaraan` varchar(100) NOT NULL,
  `plat_nomor` varchar(50) NOT NULL,
  `id_jenis_kendaraan` int(11) NOT NULL,
  `id_tipe_kendaraan` int(11) NOT NULL,
  `jumlah_konsumsi_bbm` int(11) NOT NULL,
  `jadwal_servis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nama_kendaraan`, `plat_nomor`, `id_jenis_kendaraan`, `id_tipe_kendaraan`, `jumlah_konsumsi_bbm`, `jadwal_servis`) VALUES
(2, 'suzuki pick up warna hitam', 'B 1123 ABC', 1, 2, 20, '2022-12-09'),
(4, 'Toyota Avanza', 'D 4522', 2, 2, 30, '2022-12-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `kode_pemesanan` varchar(10) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `no_handphone` int(12) NOT NULL,
  `id` int(11) NOT NULL,
  `driver` varchar(100) NOT NULL,
  `id_status_pemesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `kode_pemesanan`, `tanggal_pemesanan`, `nama_pemesan`, `id_departemen`, `no_handphone`, `id`, `driver`, `id_status_pemesanan`) VALUES
(2, 'AO001', '2022-12-01', 'Pegawai5', 3, 2147483647, 4, 'Driver 2', 1),
(3, 'AB001', '2022-11-30', 'Pegawai3', 2, 812312312, 2, 'Driver 1', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pemesanan`
--

CREATE TABLE `status_pemesanan` (
  `id_status_pemesanan` int(11) NOT NULL,
  `status_pemesanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_pemesanan`
--

INSERT INTO `status_pemesanan` (`id_status_pemesanan`, `status_pemesanan`) VALUES
(1, 'Menunggu Persetujuan'),
(2, 'Disetujui'),
(3, 'Dibatalkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_kendaraan`
--

CREATE TABLE `tipe_kendaraan` (
  `id_tipe_kendaraan` int(11) NOT NULL,
  `tipe_kendaraan` varchar(100) NOT NULL,
  `id_jenis_kendaraan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipe_kendaraan`
--

INSERT INTO `tipe_kendaraan` (`id_tipe_kendaraan`, `tipe_kendaraan`, `id_jenis_kendaraan`) VALUES
(1, 'Kecil', 1),
(2, 'Sedang', 1),
(3, 'Besar', 1),
(4, 'Kecil', 2),
(5, 'Sedang', 2),
(6, 'Besar', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `id_departemen`, `id_role`) VALUES
(2, 'Person', 'admin', '$2y$10$OSnWvF2GfYok9JhcfH6V1.18oS4I65RI13GDwRk2hB0OWP2hQwZ82', 2, 1),
(3, 'Atasan 1', 'atasan1', '$2y$10$MjMtNFhpsUEfyqq8Hc.fie5Ws7/IVoBm5mZsn41f9MO1WrdnxIn/y', 2, 2),
(4, 'Atasan 2', 'atasan2', '$2y$10$l1G3TulPvplQTJJdRDi00eVK9Uws/dp7f4/BgDlPpP92zt1nhXXQq', 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Atasan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indeks untuk tabel `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  ADD PRIMARY KEY (`id_jenis_kendaraan`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipe_kendaraan` (`id_tipe_kendaraan`),
  ADD KEY `id_jenis_kendaraan` (`id_jenis_kendaraan`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_departemen` (`id_departemen`),
  ADD KEY `id` (`id`),
  ADD KEY `id_status_pemesanan` (`id_status_pemesanan`);

--
-- Indeks untuk tabel `status_pemesanan`
--
ALTER TABLE `status_pemesanan`
  ADD PRIMARY KEY (`id_status_pemesanan`);

--
-- Indeks untuk tabel `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
  ADD PRIMARY KEY (`id_tipe_kendaraan`),
  ADD KEY `id_jenis_kendaraan` (`id_jenis_kendaraan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_departemen` (`id_departemen`),
  ADD KEY `id_role` (`id_role`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `id_jenis_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `status_pemesanan`
--
ALTER TABLE `status_pemesanan`
  MODIFY `id_status_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
  MODIFY `id_tipe_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`id_tipe_kendaraan`) REFERENCES `tipe_kendaraan` (`id_tipe_kendaraan`),
  ADD CONSTRAINT `kendaraan_ibfk_2` FOREIGN KEY (`id_jenis_kendaraan`) REFERENCES `jenis_kendaraan` (`id_jenis_kendaraan`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_departemen`) REFERENCES `departemen` (`id_departemen`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id`) REFERENCES `kendaraan` (`id`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`id_status_pemesanan`) REFERENCES `status_pemesanan` (`id_status_pemesanan`);

--
-- Ketidakleluasaan untuk tabel `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
  ADD CONSTRAINT `tipe_kendaraan_ibfk_1` FOREIGN KEY (`id_jenis_kendaraan`) REFERENCES `jenis_kendaraan` (`id_jenis_kendaraan`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_departemen`) REFERENCES `departemen` (`id_departemen`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_departemen`) REFERENCES `departemen` (`id_departemen`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
