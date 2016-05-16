-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 16 Mei 2016 pada 12.27
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bisarenang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_desc` tinytext NOT NULL,
  `body` text,
  `filename` varchar(125) NOT NULL,
  `headline` int(11) NOT NULL,
  `permalink` varchar(120) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `id_account`, `title`, `short_desc`, `body`, `filename`, `headline`, `permalink`, `meta_keywords`, `meta_description`, `created_date`, `modified_date`, `created_by`, `modified_by`, `status`) VALUES
(1, 1, 'judul', 'short desc', '<p>isi</p>\n', '1462963112.jpg', 1, 'judul.html', 'meta keywords', 'keta description', 1462954408, 1463125141, 1, 1, 1),
(2, 1, 'judul 2', 'short desc 2', '<p>isi</p>\n', '1462966260.jpg', 0, 'judul-2.html', 'meta keywords', 'meta description', 1462966260, 1463125098, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_counter`
--

CREATE TABLE `blog_counter` (
  `counter_blog_id` int(20) NOT NULL,
  `counter_count` int(11) NOT NULL,
  `counter_count_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `blog_counter`
--

INSERT INTO `blog_counter` (`counter_blog_id`, `counter_count`, `counter_count_date`) VALUES
(2, 6, '2016-05-13'),
(1, 1, '2016-05-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_desc` tinytext NOT NULL,
  `filename` varchar(125) NOT NULL,
  `permalink` varchar(120) NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_level`
--

CREATE TABLE `program_level` (
  `id` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_desc` tinytext NOT NULL,
  `body` text,
  `filename` varchar(125) NOT NULL,
  `permalink` varchar(120) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `role` tinyint(1) DEFAULT NULL COMMENT '1: administrator; 2: editor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_date`, `modified_date`, `status`, `role`) VALUES
(1, 'digit', 'admin@autobacs.co.id', 'f7695fc35dc8322c224a1de3d0cc314ef89b78ab', 0, 1447055705, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_counter`
--
ALTER TABLE `blog_counter`
  ADD PRIMARY KEY (`counter_blog_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_level`
--
ALTER TABLE `program_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `program_level`
--
ALTER TABLE `program_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
