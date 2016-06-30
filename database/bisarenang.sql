-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 30 Mei 2016 pada 09.33
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
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_desc` text NOT NULL,
  `body` text NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `id_account`, `title`, `short_desc`, `body`, `created_date`, `modified_date`, `created_by`, `modified_by`, `status`) VALUES
(1, 0, 'About Bisa Renang', 'About Bisa Renang', '<h5>Mengenal Bisarenang</h5>\n\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<h5>Apa Tujuan Berenang</h5>\n\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<ul>\n	<li>Sehat</li>\n	<li>Semakin Tinggi</li>\n	<li>blablabla</li>\n	<li>Menyelam</li>\n</ul>\n\n<h5>Mengapa Berenang</h5>\n\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n', 1464591288, 1464591502, NULL, 1, 1);

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
(1, 1, 'judul', 'short desc', '<p>isi</p>\n', '1462963112.jpg', 1, 'judul.html', '0', '0', 1462954408, 1464585305, 1, 1, 1),
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
(2, 7, '2016-05-17'),
(1, 5, '2016-05-30');

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
  `headline` int(11) NOT NULL,
  `permalink` varchar(120) NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id`, `id_account`, `title`, `short_desc`, `filename`, `headline`, `permalink`, `created_date`, `modified_date`, `created_by`, `modified_by`, `status`) VALUES
(4, 1, 'judul program 2', 'short desc 2', '1464070284.jpg', 0, 'judul-program-2.html', 1463395200, 1464070284, 1, 1, 1),
(5, 1, 'judul program', 'short desc program', '1463470391.jpg', 1, 'judul-program.html', 1463470160, 1464584299, 1, 1, 1);

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

--
-- Dumping data untuk tabel `program_level`
--

INSERT INTO `program_level` (`id`, `id_program`, `level`, `id_account`, `title`, `short_desc`, `body`, `filename`, `permalink`, `meta_keywords`, `meta_description`, `created_date`, `modified_date`, `created_by`, `modified_by`, `status`) VALUES
(7, 4, 1, 1, 'wewewe', 'hjhjhj', '<p>hjhjhjh</p>\n', '1464070258.jpg', 'wewewe.html', '', '', 1463395200, 1464070258, 1, 1, 1),
(8, 4, 2, 1, 'xcxcxc', 'hjhjhjhjh', '<p>jhjhjhjhj</p>\n', '1464070269.jpg', 'xcxcxc.html', '', '', 1463395200, 1464070269, 1, 1, 1),
(9, 4, 3, 1, 'ghghgh', 'khhjhjhj', '<p>jhjhjhjhj</p>\n', '1464070279.jpg', 'ghghgh.html', '', '', 1463395200, 1464070279, 1, 1, 1),
(10, 5, 1, 1, 'judul beginner', 'short desc beginner', '<p>isi beginner</p>\n', '1463473914.jpg', 'judul-beginner.html', '', '', 1463470160, 1463473914, 1, 1, 1),
(11, 5, 2, 1, 'judul intermediate', 'short desc intermediate', '<p>isi intermediate</p>\n', '1463474027.jpg', 'judul-intermediate.html', '', '', 1463470160, 1463474027, 1, 1, 1),
(12, 5, 3, 1, 'judul advanced', 'short desc advanced', '<p>isi advanced</p>\n', '1463474048.jpg', 'judul-advanced.html', '', '', 1463470160, 1463474048, 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `safety`
--

CREATE TABLE `safety` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_desc` tinytext NOT NULL,
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

--
-- Dumping data untuk tabel `safety`
--

INSERT INTO `safety` (`id`, `id_account`, `title`, `short_desc`, `filename`, `permalink`, `meta_keywords`, `meta_description`, `created_date`, `modified_date`, `created_by`, `modified_by`, `status`) VALUES
(1, 1, 'safety swim title 2', 'safety swim short desc 2', '1463996172.jpg', 'safety-swim-title-2.html', '', '', 1463995767, 1463996172, 1, 1, 1);

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
(1, 'bisarenang', 'admin@bisarenang.com', 'c47d75eea049ea5afdac759973cb8075f58ad922', 0, 1464591009, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `safety`
--
ALTER TABLE `safety`
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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `program_level`
--
ALTER TABLE `program_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `safety`
--
ALTER TABLE `safety`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
