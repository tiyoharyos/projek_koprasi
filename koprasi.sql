-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 03:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koprasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(50) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'rizkyanugerah', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` text NOT NULL,
  `penulis` text NOT NULL,
  `tempat` text NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`id`, `judul`, `deskripsi`, `penulis`, `tempat`, `tanggal`, `jam`, `gambar`) VALUES
(1, 'Quote Untuk Hari Ini', 'memang paris tempat terindah, tapi akan lebih indah jika engkau menjadi istriku', 'Tafriyadi27', 'Bandung', '2023-07-14', '20:24:00', 'assets/img/berita/3db944d54b0bc6629ff13e21ab5cdcdf.JPG'),
(2, 'Quote Untuk Hari Ini', 'menikmati waktu bersamamu jauh terasa indah dibandingkan dengan hanya merokok dan menyeruput kopi', 'Tafriyadi27', 'Bandung', '2023-07-14', '20:48:00', 'assets/img/berita/8f251e0b03e91dab977201ca5a88d1be.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_pelatihan`
--

CREATE TABLE `tbl_jenis_pelatihan` (
  `id_jenis_pelatihan` int(50) NOT NULL,
  `nama_jenis_pelatihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jenis_pelatihan`
--

INSERT INTO `tbl_jenis_pelatihan` (`id_jenis_pelatihan`, `nama_jenis_pelatihan`) VALUES
(1, 'Pendidikan Anggota'),
(2, 'Pendidikan Pengurus'),
(3, 'Pendidikan Pengawas'),
(4, 'Pendidikan Pengelola/Karyawan'),
(5, 'Pendidikan Pemandu'),
(6, 'Pelatihan Pelatih');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_koprasi`
--

CREATE TABLE `tbl_koprasi` (
  `id_koprasi` int(50) NOT NULL,
  `nama_koprasi` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `badan_hukum` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `jenis_usaha` enum('Usaha Simpan Pinjam','Usaha Perdagangan Umum','Usaha Jasa') NOT NULL,
  `email` text NOT NULL,
  `jadwal_pelatihan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_koprasi`
--

INSERT INTO `tbl_koprasi` (`id_koprasi`, `nama_koprasi`, `alamat`, `badan_hukum`, `telepon`, `jenis_usaha`, `email`, `jadwal_pelatihan`) VALUES
(7, 'KPRI RSUD Indramayu', 'Indramayu', 'sekitar', '000000', 'Usaha Jasa', 'koprasia@gmail.com', '2023-05-06'),
(8, 'KPRI Mega Setra', 'disana', 'sekian', '0000000', 'Usaha Jasa', 'megasestra@gmail.com', '2023-06-07'),
(9, 'Kopkar Wiralodra', 'Kopkar Wiralodra', 'disni', '12311', 'Usaha Jasa', 'KopkarWiralodra@Gmail.com', '2023-06-15'),
(10, 'KPRI Komat', 'disasn', 'sekitar', '12311', 'Usaha Perdagangan Umum', 'nyologaming27@gmail.com', '2023-06-14'),
(11, 'KPRI Kopsuka', 'disana', 'sekira', '123', 'Usaha Simpan Pinjam', 'agus@gmail.com', '2023-06-21'),
(12, 'KPRI Koprim', 'disana', 'sekian', '123', 'Usaha Jasa', 'nyologaming27@gmail.com', '2023-06-16'),
(13, 'KPRI Kosma', 'disana disini', 'sekira', '12311', 'Usaha Perdagangan Umum', 'nyologaming27@gmail.com', '2023-06-12'),
(14, 'KPRI Oikonomia', 'sdas', 'sekitar', '12311', 'Usaha Jasa', 'koprasia@gmail.com', '2023-06-15'),
(15, 'KUD Sri Mina Sari', '123', 'sekian', '123', 'Usaha Perdagangan Umum', 'koprasia@gmail.com', '2023-06-13'),
(16, 'Kopkar Energi Wiralodra', 'disana disini22', 'sekira', '12311', 'Usaha Jasa', 'koprasia@gmail.com', '2023-06-14'),
(17, 'KPRI Merdeka', 'disana disini22', 'disni', '123', 'Usaha Jasa', 'nyologaming27@gmail.com', '2023-06-20'),
(18, 'KPRI Bina Kencana', 'disana disini', 'disni', '1232', 'Usaha Jasa', 'koprasia@gmail.com', '2023-06-19'),
(19, 'KPL Ngupaya Mina Dadap', 'disana', 'sekitar', '123', 'Usaha Jasa', 'nyologaming27@gmail.com', '2023-06-15'),
(20, 'KPRI Koptrans', 'disana disini', 'disni', '123', 'Usaha Perdagangan Umum', 'nyologaming27@gmail.com', '2023-06-20'),
(22, 'KPRI Komandra', 'disana disini', 'disni', '123', 'Usaha Simpan Pinjam', 'luikwanhang123@gmail.com', '2023-05-12'),
(25, 'KSU Kopsuper', 'disana disini', 'sekian', '0816253913', 'Usaha Jasa', 'kopsuper@gmail.com', '2023-06-15'),
(26, 'Kopkar Mesrania', 'disana', 'sekitar', '0182534901', 'Usaha Perdagangan Umum', 'mesrania@gmail.com', '2023-06-17'),
(27, 'KPRI Bahagia', 'disini', 'Sepersekian', '0815393134', 'Usaha Simpan Pinjam', 'bahagia123@gmail.com', '2023-06-23'),
(28, 'Primkopti', 'disana', 'sekian detik', '08172531234', 'Usaha Jasa', 'primkopti@gmail.com', '2023-06-15'),
(29, 'KPRI Tirta Ayu', 'disini', 'sekian menit', '08167321323', 'Usaha Perdagangan Umum', 'tirtaayu@gmail.com', '2023-06-20'),
(30, 'Primkopol', 'disana', 'sekian ', '08172563123', 'Usaha Simpan Pinjam', 'primkopol@gmail.com', '2023-06-15'),
(31, 'KPRI Warda', 'disana', 'sekian lah', '081625341432', 'Usaha Jasa', 'warda@gmail.com', '2023-06-07'),
(32, 'Abdi manunggal Jaya', 'disini', 'sekian ada', '08162449273', 'Usaha Perdagangan Umum', 'abdijaya@gmail.com', '2023-06-15'),
(33, 'Kopontren Alhidayah', 'disini', 'sekian kuy', '08192678164', 'Usaha Simpan Pinjam', 'alhidayah@gmail.com', '2023-06-08'),
(34, 'Koperasi Tirta Ayu', 'disana', 'sekian ada', '0812653414', 'Usaha Jasa', 'tirtaayu2@gmail.com', '2023-06-15'),
(35, 'Koperasi Tri Manunggal Jaya', 'disana', 'sekian ayu', '081639134', 'Usaha Perdagangan Umum', 'trimanunggal@gmail.com', '2023-06-12'),
(36, 'Koperasi Annisa', 'disana', 'sekian', '081672531', 'Usaha Simpan Pinjam', 'annisa@gmail.com', '2023-06-14'),
(37, 'KSU Hikmah Bina Ihsan S', 'disebrang', 'sekian kali', '081723514', 'Usaha Jasa', 'hikmahbina@gmail.com', '2023-06-09'),
(38, 'KPL Mina Sumitra', 'didepan', 'sekian', '0817235123', 'Usaha Perdagangan Umum', 'minasumitra@gmail.com', '2023-06-14'),
(39, 'Koperasi Komat', 'dibelakang', 'sekian', '0817622313', 'Usaha Simpan Pinjam', 'komat@gmail.com', '2023-06-13'),
(40, 'KPRI Holistik', 'dibelakang', 'sekian', '08132134124', 'Usaha Jasa', 'holistik@gmail.com', '2023-06-20'),
(41, 'KSP Mitra Jasa', 'disebrang', 'kesekian', '0817563142', 'Usaha Perdagangan Umum', 'mitrajasa@gmail.com', '2023-06-26'),
(42, 'KSU Srikandi', 'disebrang', 'kesekian kali', '08175641244', 'Usaha Simpan Pinjam', 'srikandi@gmail.com', '2023-06-19'),
(43, 'KPRI Galuh Pertayu', 'didepan', 'sekian', '08245265427', 'Usaha Jasa', 'galuhpertayu@gmail.com', '2023-06-16'),
(44, 'Mina Garam Rejeki', 'dibelakang', 'kesekian', '08325268037', 'Usaha Perdagangan Umum', 'minagaram@gmail.com', '2023-06-19'),
(45, 'KSU Mitra Industri', 'disamping', 'kesekian kali', '08315136773', 'Usaha Simpan Pinjam', 'mitraindustri@gmail.com', '2023-06-28'),
(46, 'KSP Darma Agung Jaya', 'dikiri', 'kesekian kalinya', '08672362489', 'Usaha Jasa', 'damaagungjaya@gmail.com', '2023-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(50) NOT NULL,
  `nama_pegawai` text NOT NULL,
  `nomer_telepon` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nama_pegawai`, `nomer_telepon`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `foto`) VALUES
(1, 'ariaaa', '081927361345', 'bandung', '2023-02-09', 'disana ku menunggu', 'assets/img/pegawai/061a541d04e96343b378ce25adb3b88d.png'),
(2, 'ariaa', '08193451245', 'ciamis ', '2023-02-08', 'disini dan disana', 'assets/img/pegawai/1dc22dddfee379ad380dafd045c40326.png'),
(3, 'ariaa', '08193451245', 'ciamis ', '2023-02-08', 'disini dan disana', 'assets/img/pegawai/7b41efcf986ee7f6287c827c0f7b49de.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peserta`
--

CREATE TABLE `tbl_peserta` (
  `id_peserta` int(50) NOT NULL,
  `nama_peserta` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pendidikan` enum('SLTA','D3','D4','S1','S2','S3') NOT NULL,
  `telepon` char(13) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `id_koprasi` int(50) DEFAULT NULL,
  `id_jenis_pelatihan` int(50) DEFAULT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_peserta`
--

INSERT INTO `tbl_peserta` (`id_peserta`, `nama_peserta`, `tempat_lahir`, `tanggal_lahir`, `pendidikan`, `telepon`, `alamat`, `foto`, `id_koprasi`, `id_jenis_pelatihan`, `status`) VALUES
(1, 'Wakhyu Dinnur', 'Bandung', '1976-11-07', 'SLTA', '08179091171', 'Kecamatan Sindang Indramayu', 'assets/img/peserta/439b49b62fe596ea0f0c82d2180d7be1.png', 7, 2, 'diterima'),
(2, 'Fithor E', 'Pekalongan', '1977-09-22', 'SLTA', '087828870848', 'Kecamatan Krangkeng Indramayu', 'assets/img/peserta/c1b1eaf241721759bfc62c8a9341af41.png', 8, 1, 'ditolak'),
(3, 'Ati Hikmawati, SE', 'Majalengka', '1979-11-23', 'S1', '081911444941', 'Kecamatan Losarang Indramayu', 'assets/img/peserta/83a9ef52283a21db17986c076a2c4cce.png', 9, 6, 'diterima'),
(4, 'Ananda Qurotul A, SPd', 'Indramayu', '1994-08-29', 'S1', '089537742394', 'Kecamatan blabla Indramayu', 'assets/img/peserta/4d270205e43a42f1f64372ebf3b70204.png', 13, 1, 'ditolak'),
(5, 'Wirahendra TW', 'Indramayu', '1975-07-26', 'SLTA', '082130053744', 'Kecamatan Karangampel Indramayu', 'assets/img/peserta/8ba052178095988abbf2b4c459878077.png', 11, 1, 'diterima'),
(6, 'Hj.Junita N, Mp.Sy', 'Indramayu', '1976-06-11', 'S2', '082121059951', 'Jl. Soekarno Hatta No.03 Indramayu', 'assets/img/peserta/5e2d128b3247e27b2d7943c302c70706.png', 22, 1, 'ditolak'),
(7, 'Dyah Apriyani, SP', 'Indramayu', '1992-04-23', 'S1', '', 'Jl. Raya Pabean Udik Indramayu', 'assets/img/peserta/6367310ceaa62b4fd8a1fc891395ba48.png', 12, 1, 'diterima'),
(8, 'Feny H, A.Md', 'Indramayu', '1999-10-14', 'D3', '082245425365', 'Komplek Bumi Patra Pertamina Im', 'assets/img/peserta/40310123fab499a84dab89978da24c77.png', 13, 1, 'ditolak'),
(9, 'Hj. Catur Etawati', 'Indramayu', '1978-07-10', 'SLTA', '087828567799', 'Sindang Indramayu', 'assets/img/peserta/dd648cb341aecc8ff2f6d8dceee24d41.png', 13, 1, 'diterima'),
(10, 'Asni Z, S.Pd', 'Indramayu', '1980-04-10', 'S1', '', 'Jl Gatot Subroto Indramayu', 'assets/img/peserta/ffa8d7842c147f6b8da97df7ff9dc282.png', 14, 1, 'ditolak'),
(11, 'Hasyim A', 'Indramayu', '1996-08-16', 'SLTA', '081911444901', 'Glayem Kec. A Indramayu', 'assets/img/peserta/7e810ed276d5f2ecc601e7738daa3b0e.png', 7, 1, 'diterima'),
(12, 'Wandi', 'Indramayu', '1986-05-29', 'SLTA', '082115959510', 'Puntang Losarang Indramayu', 'assets/img/peserta/47f14f57936067aed988e8b7347ae61c.png', 17, 1, 'ditolak'),
(13, 'Moh.Solihin , S.Pd.', 'Indramayu', '1978-04-07', 'S1', '081911444901', 'Jl. Yos Sudarso Indramayu', 'assets/img/peserta/67badcda3708c2f0c369b91302018f58.png', 17, 1, 'diterima'),
(14, 'Lili Fiolita', 'Indramayu', '1994-08-19', 'SLTA', '087744405552', 'Jl. Kapten Arya GG.7 Kel Karanganyar', 'assets/img/peserta/686d4feb70114f85d4ad499dc6810a4c.png', 18, 1, 'ditolak'),
(15, 'Bahrudin', 'Indramayu', '1992-09-19', 'SLTA', '087809763719', 'Dadap Kec. Juntinyuat Indramayu', 'assets/img/peserta/cd978056d4a93384906097b682c9296d.png', 19, 1, 'diterima'),
(16, 'Diana M, SE', 'Indramayu', '1979-03-06', 'S1', '', 'Jl, Letnan Purbadi Indramayu', 'assets/img/peserta/9922dcf6309e2eb3ff22c2ad01d61d87.png', 20, 1, 'ditolak'),
(17, 'Lili Fiolita', 'Indramayu', '1994-08-19', 'SLTA', '087744405552', 'Jl. Kapten Arya GG.7 Kel Karanganyar', 'assets/img/peserta/5a545551d9e52808645cb54e6452baad.png', 18, 3, NULL),
(18, 'Oka Nurkholis', 'Indramayu', '1999-10-12', 'SLTA', '087817130861', 'Jl. Raya Balongan Indramayu', 'assets/img/peserta/72378f80ce5685349077d0b94d12dee6.png', 26, 5, NULL),
(19, 'Sriyono, M.Pd.', 'Ketaman', '1961-09-05', 'S2', '081214251176', 'Jl. Soekarno Hatta No.02 Indramayu', 'assets/img/peserta/c53ad9739d57b796de158673c8c24228.png', 27, 3, NULL),
(20, 'Nazry Dewi R', 'Pangkalan B', '1972-05-20', 'SLTA', '081324300775', 'Perum BumiPatra Indramayu', 'assets/img/peserta/f8f71794290e24b0c8b054a256e855ee.png', 25, 1, NULL),
(21, 'Hj.Junita N, Mp.Sy', 'Indramayu', '1976-06-11', 'S2', '082121059951', 'Jl. Soekarno Hatta No.03 Indramayu', 'assets/img/peserta/e53944aaa104ff7f10516c060edba470.png', 22, 1, NULL),
(22, 'Yunan', 'Indramayu', '1967-02-04', 'SLTA', '082317870432', 'Jl. Gatot Subroto Indramayu', 'assets/img/peserta/a2be5b2cb83bfdc6443130650ef9c3d2.png', 28, 1, NULL),
(23, 'Tri Starlet, S.Pd', 'Indramayu', '1982-10-26', 'S1', '082115931967', 'Jl. Raya Terusan Indramayu', 'assets/img/peserta/96837d053367c3f6d3dfc9767af12a3d.png', 14, 1, NULL),
(24, 'Ayu Rahmawati, S.Sos', 'Indramayu', '1992-01-29', 'S1', '085254743897', 'Desa malang Semirang Jatibarang Im', 'assets/img/peserta/97d88553f46b28b4d2d4983f890035e9.png', 7, 1, NULL),
(25, 'Sutoni, SH', 'Indramayu', '1985-10-01', 'S1', '085295905999', 'Jl. Letjen Suprapto Indramayu', 'assets/img/peserta/ce992565716bf7d638a1b4e214aafe2a.png', 29, 1, NULL),
(26, 'Haris Sugianto', 'Indramayu', '1985-03-28', 'SLTA', '085321665988', 'Jl. Gatot Subroto Indramayu', 'assets/img/peserta/88f13a322d0a9634b69b19b6712f2ffd.png', 30, 1, NULL),
(27, 'Moh.Solihin , S.Pd.', 'Indramayu', '1978-04-07', 'S1', '081911444901', 'Kel. Margadadi Kec. Indramayu', 'assets/img/peserta/94087e16212e2ad9d7ea99fa01cf6328.png', 17, 1, NULL),
(28, 'Putri Khofiatun, S.Pd.', 'Indramayu', '1999-01-18', 'S1', '085163741801', 'Desa Juntinyuat Indramayu', 'assets/img/peserta/825084995b732944b7a58b52e444c86c.png', 15, 1, NULL),
(29, 'Wandi', 'Indramayu', '1986-05-29', 'SLTA', '082115959510', 'Desa Wirakanan Kandanghaur Im', 'assets/img/peserta/45d2577e789fd62764d4a73d32315f0c.png', 16, 1, NULL),
(30, 'Lucas A, M.Pd.', 'Indramayu', '1973-04-17', 'S2', '081320592325', 'Jl. Letjen MT Haryono Sindang Im', 'assets/img/peserta/85f343d00f3307507a37b6ef0800e3ae.png', 13, 1, NULL),
(31, 'Andi Sugiharta', 'Indramayu', '1972-02-22', 'SLTA', '081320265168', 'Jl. Olah Raga No. 3 Indramayu', 'assets/img/peserta/96261a2024469bbd0924ee5ce6cf7a3a.png', 31, 1, NULL),
(32, 'Monita Indah S, SE', 'Indramayu', '1982-05-12', 'S1', '087827907772', 'Jl. Pantura Losarang Indramayu', 'assets/img/peserta/ff7b2fbf4014be56f501458436f8e680.png', 9, 1, NULL),
(33, 'Sakirin', 'Indramayu', '1992-10-22', 'SLTA', '081324431859', 'Desa Anjatan Krangkeng Im', 'assets/img/peserta/2f45345f1424c3b3c2043f276527ca13.png', 32, 1, NULL),
(34, 'Ahmad Fahruroji', 'Indramayu', '1986-01-12', 'SLTA', '085235122202', 'Desa Patrol Indramayu', 'assets/img/peserta/dbe8205969d55ad8b70fa2e40c6217a8.png', 33, 1, NULL),
(35, 'Rina Agustianingsih', 'Indramayu', '1986-08-31', 'SLTA', '081395977768', 'Desa Bungkul Bojongsari Indramayu', 'assets/img/peserta/f8a3f6461c5a1faeec905b60e54d4873.png', 34, 1, NULL),
(36, 'Hj. Lina Herlina, M.Pd', 'Cirebon', '1969-12-19', 'S2', '082319192476', 'Desa Wanakaya Cirebon', 'assets/img/peserta/65a3fa016443dd566bddda3a98632054.png', 35, 1, NULL),
(37, 'Lilis Komalawati', 'Bandung', '1967-02-21', 'SLTA', '081324587964', 'Jl. Wiralodra Kel.Lemahabang Im.', 'assets/img/peserta/aa516346d42036fae4010c26760dce59.png', 36, 1, NULL),
(38, 'Widiastuti', 'Indramayu', '1977-09-24', 'SLTA', '081802236459', 'Jl. Jendral Sudirman Lemahmekar Im.', 'assets/img/peserta/9df73dc24b66db1afa550884d8e9e8d2.png', 11, 1, NULL),
(39, 'Fikriyah', 'Indramayu', '1993-11-01', 'SLTA', '085795005780', 'Desa Juntinyuat Indramayu', 'assets/img/peserta/04e4acbe534017bc91355034ff78ab74.png', 15, 1, NULL),
(40, 'Siti Rohani', 'Indramayu', '1986-09-06', 'SLTA', '081904046745', 'Desa Eretan Wetan Kandanghaur Im', 'assets/img/peserta/2bff786dd931ee811e128f2bfc77a5ad.png', 37, 1, NULL),
(41, 'Nani Iriani, B.Sc.', 'Indramayu', '1963-04-21', 'D3', '087828884963', 'BTN Margalaksana Margadadi Im', 'assets/img/peserta/a0706ba033b0dab14814d295c964010f.png', 9, 1, NULL),
(42, 'Pitriyah Handayani', 'Indramayu', '1993-04-21', 'SLTA', '089602881591', 'Desa Karangsong Indramayu', 'assets/img/peserta/1d820f707390fd851d7bf56e55b815fb.png', 38, 1, NULL),
(43, 'Sri Hikmawati', 'Indramayu', '1997-03-28', 'SLTA', '081708222941', 'BTN Margalaksana Margadadi Im', 'assets/img/peserta/3c6d774b50abd313de4a2ff39473f886.png', 36, 1, NULL),
(44, 'Sri Nurhayati', 'Indramayu', '1975-07-14', 'SLTA', '085316218075', 'Kapetakan Cirebon', 'assets/img/peserta/944501b34abcda9ec029883620e52fb2.png', 39, 1, NULL),
(45, 'Busron, M.Pd.', 'Indramayu', '1966-03-12', 'S2', '085224054442', 'Jatimarta Cirebon', 'assets/img/peserta/c061a2a35421841a89d3f5eba6774be4.png', 40, 1, NULL),
(46, 'A. Sulandani ', 'Indramayu', '1981-11-17', 'SLTA', '08971865979', 'Jl. Gatot Subroto Indramayu', 'assets/img/peserta/31141f88a55698904160dd3da6d68382.png', 27, 1, NULL),
(47, 'Drs.H.Farid Asyhari', 'Indramayu', '1965-08-11', 'S1', '08189566649', 'Desa Singajaya Indramayu', 'assets/img/peserta/1b6ee25465f2eb33711a828964719cb7.png', 41, 1, NULL),
(48, 'Atit Rohayati', 'Garut', '1974-12-04', 'SLTA', '0818231769', 'Desa Pabean Udik Indramayu', 'assets/img/peserta/b81f5fa8cdd4b857fb42eeeb57c7b029.png', 42, 1, NULL),
(49, 'Ida Indrawati', 'Indramayu', '1987-06-12', 'SLTA', '085923174365', 'Desa Sindang Kecamatan Sindang Im', 'assets/img/peserta/255f7af2027dace8a69e09004a2adc7f.png', 7, 1, NULL),
(50, 'Ato Susanto, SP', 'Indramayu', '1974-07-11', 'S1', '087828856595', 'Kel.Margadadi Kec.Indramayu', 'assets/img/peserta/baa73177016622e288f8d91103240fca.png', 43, 1, NULL),
(51, 'Sugeng Siswanto', 'Indramayu', '1970-07-10', 'SLTA', '081294547562', 'Desa Singajaya Kec. Indramayu', 'assets/img/peserta/25c83f700319fbce0ae330092b310587.png', 26, 1, NULL),
(52, 'Fitri Nurbani', 'Indramayu', '1972-10-24', 'SLTA', '082240403250', 'Desa Lobener Kec. Jatibarang Im', 'assets/img/peserta/e245161b56bcdd37d0ad4c13517fbdaa.png', 31, 1, NULL),
(53, 'Dulkalim', 'Indramayu', '1970-09-14', 'SLTA', '081312004508', 'Desa Kaplongan Indramayu', 'assets/img/peserta/cb88d40936814f71c92674779c1cff56.png', 8, 1, NULL),
(54, 'Anik Andiyani', 'Sleman', '1979-08-12', 'S1', '08112431703', 'Desa Terusan Indramayu', 'assets/img/peserta/61a2da3141aa8e5c9d032780271c2a58.png', 14, 1, NULL),
(55, 'Sugiyono', 'Indramayu', '1965-12-11', 'SLTA', '081320444320', 'Desa Puntang Kec.Losarang Im', 'assets/img/peserta/0a7afce4479797d7efc998fdc31edb10.png', 44, 1, NULL),
(56, 'Nia Darniah, SP', 'Indramayu', '1992-02-21', 'S1', '087707490131', 'Desa Kenanga Kec.Sindang Im', 'assets/img/peserta/17f8dcc734ec6dd66d0caab468dbd868.png', 45, 1, NULL),
(57, 'I. Aries Santi', 'Indramayu', '1991-03-30', 'SLTA', '087727974955', 'Desa Kenanga Kec.Sindang Im', 'assets/img/peserta/53deac7894b77e6d9c0b53852cd0247d.png', 45, 1, NULL),
(58, 'Darmanto', 'Indramayu', '1980-07-24', 'SLTA', '087728974163', 'Desa Lelea Kec.Lelea Indramayu', 'assets/img/peserta/a456b2d080fff73727c20ce69569ce41.png', 46, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jenis_pelatihan`
--
ALTER TABLE `tbl_jenis_pelatihan`
  ADD PRIMARY KEY (`id_jenis_pelatihan`);

--
-- Indexes for table `tbl_koprasi`
--
ALTER TABLE `tbl_koprasi`
  ADD PRIMARY KEY (`id_koprasi`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `tbl_anggota_tbl_jenis_pelatihan_fk` (`id_jenis_pelatihan`),
  ADD KEY `tbl_anggota_tbl_koprasi_fk` (`id_koprasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_jenis_pelatihan`
--
ALTER TABLE `tbl_jenis_pelatihan`
  MODIFY `id_jenis_pelatihan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_koprasi`
--
ALTER TABLE `tbl_koprasi`
  MODIFY `id_koprasi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_peserta`
--
ALTER TABLE `tbl_peserta`
  ADD CONSTRAINT `tbl_anggota_tbl_jenis_pelatihan_fk` FOREIGN KEY (`id_jenis_pelatihan`) REFERENCES `tbl_jenis_pelatihan` (`id_jenis_pelatihan`),
  ADD CONSTRAINT `tbl_anggota_tbl_koprasi_fk` FOREIGN KEY (`id_koprasi`) REFERENCES `tbl_koprasi` (`id_koprasi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
