-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2024 pada 16.16
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rmb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kode_brng` varchar(15) NOT NULL,
  `nama_brng` varchar(80) NOT NULL,
  `kode_sat` char(4) NOT NULL,
  `jenis` char(5) NOT NULL,
  `harga` double NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kode_brng`, `nama_brng`, `kode_sat`, `jenis`, `harga`, `status`) VALUES
('A001', 'BETON', 'TON', 'A123', 2112, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datainvoice`
--

CREATE TABLE `datainvoice` (
  `Nama_Bank` varchar(50) NOT NULL,
  `No_Rekening` varchar(50) DEFAULT NULL,
  `Atas_nama` varchar(50) DEFAULT NULL,
  `Bag_keuangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `datainvoice1`
--

CREATE TABLE `datainvoice1` (
  `Nama_Bank` varchar(50) NOT NULL,
  `No_Rekening` varchar(50) DEFAULT NULL,
  `Atas_nama` varchar(50) DEFAULT NULL,
  `Bag_keuangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `distribusi`
--

CREATE TABLE `distribusi` (
  `no_pemesanan` varchar(20) NOT NULL,
  `dep_asal` char(5) DEFAULT NULL,
  `kode_brng` varchar(15) NOT NULL,
  `tim_muat` double DEFAULT NULL,
  `no_kendaraan` varchar(15) NOT NULL,
  `supir` varchar(50) DEFAULT NULL,
  `tgl_berangkat` date NOT NULL,
  `uang_JP` double DEFAULT NULL,
  `uang_JT` double DEFAULT NULL,
  `Keterangan` varchar(100) DEFAULT NULL,
  `nip_penginputan` varchar(15) DEFAULT NULL,
  `tgl_sampai` date DEFAULT NULL,
  `tim_bongkar` double DEFAULT NULL,
  `volume` double DEFAULT NULL,
  `selisih_mb` double DEFAULT NULL,
  `harga` double NOT NULL,
  `total_harga` double DEFAULT NULL,
  `nip_closing` varchar(15) DEFAULT NULL,
  `status` enum('Sudah Berangkat','Sudah Datang') DEFAULT NULL,
  `jam_berangkat` time NOT NULL,
  `jam_sampai` time DEFAULT NULL,
  `asal_tambahan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `distribusikosong`
--

CREATE TABLE `distribusikosong` (
  `no_distribusi` varchar(15) NOT NULL,
  `dep_asal` char(5) DEFAULT NULL,
  `no_kendaraan` varchar(15) NOT NULL,
  `supir` varchar(50) DEFAULT NULL,
  `tgl_berangkat` date NOT NULL,
  `uang_JP` double DEFAULT NULL,
  `nip_penginputan` varchar(15) DEFAULT NULL,
  `status` enum('Sudah Berangkat','Sudah Datang') DEFAULT NULL,
  `dep_tujuan` char(5) DEFAULT NULL,
  `jam_berangkat` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisbarang`
--

CREATE TABLE `jenisbarang` (
  `kd_jenis` char(5) NOT NULL,
  `nm_jenis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenisbarang`
--

INSERT INTO `jenisbarang` (`kd_jenis`, `nm_jenis`) VALUES
('A123', 'TON');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `no_kendaraan` varchar(15) NOT NULL,
  `merk_kendaraan` varchar(80) NOT NULL,
  `jenis` varchar(80) NOT NULL,
  `Berat` double NOT NULL,
  `status` enum('0','1') NOT NULL,
  `supir` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`no_kendaraan`, `merk_kendaraan`, `jenis`, `Berat`, `status`, `supir`) VALUES
('BM1231QQ', 'HIACE', 'MINIBUS', 1, '1', 'AAWW');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `kode_konsumen` char(5) NOT NULL,
  `nama_konsumen` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `nama_bank` varchar(30) DEFAULT NULL,
  `rekening` varchar(20) DEFAULT NULL,
  `penjab` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`kode_konsumen`, `nama_konsumen`, `alamat`, `kota`, `no_telp`, `nama_bank`, `rekening`, `penjab`) VALUES
('sada', 'asda', 'sad', 'asd', '22', '2esd', '1321', 'sadfa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_approval`
--

CREATE TABLE `master_approval` (
  `Approval1` char(5) NOT NULL,
  `Approval2` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `jbtn` varchar(25) NOT NULL,
  `jnj_jabatan` varchar(5) NOT NULL,
  `kode_kelompok` varchar(3) NOT NULL,
  `kode_resiko` varchar(3) NOT NULL,
  `kode_emergency` varchar(3) NOT NULL,
  `departemen` char(4) NOT NULL,
  `bidang` varchar(15) NOT NULL,
  `stts_wp` char(5) NOT NULL,
  `stts_kerja` char(3) NOT NULL,
  `npwp` varchar(15) NOT NULL,
  `pendidikan` varchar(80) NOT NULL,
  `gapok` double NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `mulai_kerja` date NOT NULL,
  `ms_kerja` enum('<1','PT','FT>1') NOT NULL,
  `indexins` char(4) NOT NULL,
  `bpd` varchar(50) NOT NULL,
  `rekening` varchar(25) NOT NULL,
  `stts_aktif` enum('AKTIF','CUTI','KELUAR','TENAGA LUAR') NOT NULL,
  `wajibmasuk` tinyint(2) NOT NULL,
  `pengurang` double NOT NULL,
  `indek` tinyint(4) NOT NULL,
  `mulai_kontrak` date DEFAULT NULL,
  `cuti_diambil` int(11) NOT NULL,
  `dankes` double NOT NULL,
  `photo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `nik`, `nama`, `jk`, `jbtn`, `jnj_jabatan`, `kode_kelompok`, `kode_resiko`, `kode_emergency`, `departemen`, `bidang`, `stts_wp`, `stts_kerja`, `npwp`, `pendidikan`, `gapok`, `tmp_lahir`, `tgl_lahir`, `alamat`, `kota`, `mulai_kerja`, `ms_kerja`, `indexins`, `bpd`, `rekening`, `stts_aktif`, `wajibmasuk`, `pengurang`, `indek`, `mulai_kontrak`, `cuti_diambil`, `dankes`, `photo`) VALUES
(1, '1471112706970001', 'Andre Vari Antoni', 'Pria', 'J', 'JJ', 'KK0', 'KR0', 'KE0', 'Depa', 'Bidang', 'WP', 'Akt', '-', 'S1', 30120010, 'Pekanbaru', '2020-01-14', 'sad', 'asd', '2024-06-13', '', '1', '0', '231003102101', 'AKTIF', 0, 0, 0, '2024-06-13', 0, 1, 'PasPhoto.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `no_pemesanan` varchar(20) NOT NULL,
  `no_invoice` varchar(20) NOT NULL,
  `kode_konsumen` char(5) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tgl_deadline` date DEFAULT NULL,
  `cabang_permintaan` char(5) DEFAULT NULL,
  `status_permintaan` enum('Proses Pengajuan','Proses Approval','Proses Distribusi','Selesai') DEFAULT NULL,
  `cabang_approval` char(5) DEFAULT NULL,
  `status_approval` enum('Disetujui','Dipending','Ditolak','Proses Pengajuan') DEFAULT NULL,
  `cabang_distribusi` char(5) DEFAULT NULL,
  `status_distribusi` enum('Disetujui','Dipending','Ditolak','Pengajuan','Proses Pengajuan','Closing') DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `potongan` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `ppn` double DEFAULT NULL,
  `pph` double DEFAULT NULL,
  `tagihan` double DEFAULT NULL,
  `jenis_harga` enum('T Muat','T Bongkar','T Muat + Bongkar','-') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanandetail`
--

CREATE TABLE `pemesanandetail` (
  `no_pemesanan` varchar(20) NOT NULL,
  `kode_brng` varchar(15) NOT NULL,
  `kode_sat` char(5) DEFAULT NULL,
  `jumlah` double NOT NULL,
  `harga` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` text NOT NULL,
  `user_password` text NOT NULL,
  `user_nama` text NOT NULL,
  `user_level` enum('superadmin','admin','user') NOT NULL,
  `user_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_nama`, `user_level`, `user_foto`) VALUES
(1, 'superadmin', '202cb962ac59075b964b07152d234b70', 'Super Admin', 'superadmin', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_brng`),
  ADD KEY `nama_brng` (`nama_brng`),
  ADD KEY `harga` (`harga`);

--
-- Indeks untuk tabel `datainvoice`
--
ALTER TABLE `datainvoice`
  ADD PRIMARY KEY (`Nama_Bank`),
  ADD KEY `nama_suplier` (`No_Rekening`),
  ADD KEY `alamat` (`Atas_nama`),
  ADD KEY `kota` (`Bag_keuangan`);

--
-- Indeks untuk tabel `datainvoice1`
--
ALTER TABLE `datainvoice1`
  ADD PRIMARY KEY (`Nama_Bank`),
  ADD KEY `nama_suplier` (`No_Rekening`),
  ADD KEY `alamat` (`Atas_nama`),
  ADD KEY `kota` (`Bag_keuangan`);

--
-- Indeks untuk tabel `distribusi`
--
ALTER TABLE `distribusi`
  ADD PRIMARY KEY (`no_pemesanan`,`no_kendaraan`,`tgl_berangkat`,`jam_berangkat`),
  ADD KEY `no_faktur` (`no_pemesanan`),
  ADD KEY `kode_brng` (`kode_brng`);

--
-- Indeks untuk tabel `distribusikosong`
--
ALTER TABLE `distribusikosong`
  ADD PRIMARY KEY (`no_distribusi`);

--
-- Indeks untuk tabel `jenisbarang`
--
ALTER TABLE `jenisbarang`
  ADD PRIMARY KEY (`kd_jenis`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`no_kendaraan`),
  ADD KEY `nama_brng` (`merk_kendaraan`),
  ADD KEY `harga` (`Berat`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`kode_konsumen`),
  ADD KEY `nama_suplier` (`nama_konsumen`),
  ADD KEY `alamat` (`alamat`),
  ADD KEY `kota` (`kota`),
  ADD KEY `no_telp` (`no_telp`);

--
-- Indeks untuk tabel `master_approval`
--
ALTER TABLE `master_approval`
  ADD PRIMARY KEY (`Approval1`,`Approval2`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik_2` (`nik`),
  ADD KEY `departemen` (`departemen`),
  ADD KEY `bidang` (`bidang`),
  ADD KEY `stts_wp` (`stts_wp`),
  ADD KEY `stts_kerja` (`stts_kerja`),
  ADD KEY `pendidikan` (`pendidikan`),
  ADD KEY `indexins` (`indexins`),
  ADD KEY `jnj_jabatan` (`jnj_jabatan`),
  ADD KEY `bpd` (`bpd`),
  ADD KEY `nama` (`nama`),
  ADD KEY `jbtn` (`jbtn`),
  ADD KEY `npwp` (`npwp`),
  ADD KEY `dankes` (`dankes`),
  ADD KEY `cuti_diambil` (`cuti_diambil`),
  ADD KEY `mulai_kontrak` (`mulai_kontrak`),
  ADD KEY `stts_aktif` (`stts_aktif`),
  ADD KEY `tmp_lahir` (`tmp_lahir`),
  ADD KEY `alamat` (`alamat`),
  ADD KEY `mulai_kerja` (`mulai_kerja`),
  ADD KEY `gapok` (`gapok`),
  ADD KEY `kota` (`kota`),
  ADD KEY `pengurang` (`pengurang`),
  ADD KEY `indek` (`indek`),
  ADD KEY `jk` (`jk`),
  ADD KEY `ms_kerja` (`ms_kerja`),
  ADD KEY `tgl_lahir` (`tgl_lahir`),
  ADD KEY `rekening` (`rekening`),
  ADD KEY `wajibmasuk` (`wajibmasuk`),
  ADD KEY `kode_emergency` (`kode_emergency`),
  ADD KEY `kode_kelompok` (`kode_kelompok`),
  ADD KEY `kode_resiko` (`kode_resiko`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`no_pemesanan`),
  ADD KEY `kode_suplier` (`kode_konsumen`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `pemesanandetail`
--
ALTER TABLE `pemesanandetail`
  ADD KEY `no_faktur` (`no_pemesanan`),
  ADD KEY `kode_brng` (`kode_brng`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `distribusi`
--
ALTER TABLE `distribusi`
  ADD CONSTRAINT `relasi11` FOREIGN KEY (`no_pemesanan`) REFERENCES `pemesanan` (`no_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `rozi_konsumen_ibfk1` FOREIGN KEY (`kode_konsumen`) REFERENCES `konsumen` (`kode_konsumen`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemesanandetail`
--
ALTER TABLE `pemesanandetail`
  ADD CONSTRAINT `relasi1` FOREIGN KEY (`no_pemesanan`) REFERENCES `pemesanan` (`no_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi2` FOREIGN KEY (`kode_brng`) REFERENCES `barang` (`kode_brng`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
