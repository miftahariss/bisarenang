-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Inang: localhost:3306
-- Waktu pembuatan: 30 Jun 2016 pada 08.57
-- Versi Server: 5.5.50-cll
-- Versi PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `k8059924_bisarenang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_account` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_desc` text NOT NULL,
  `body` text NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `basic`
--

CREATE TABLE IF NOT EXISTS `basic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_account` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_desc` tinytext NOT NULL,
  `body` text,
  `filename` varchar(125) DEFAULT NULL,
  `video_id` varchar(125) DEFAULT NULL,
  `headline` int(11) NOT NULL,
  `permalink` varchar(120) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `basic_counter`
--

CREATE TABLE IF NOT EXISTS `basic_counter` (
  `counter_basic_id` int(20) NOT NULL,
  `counter_count` int(11) NOT NULL,
  `counter_count_date` date NOT NULL,
  PRIMARY KEY (`counter_basic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_account` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `short_desc` tinytext NOT NULL,
  `body` text,
  `filename` varchar(125) NOT NULL,
  `video_id` varchar(125) NOT NULL,
  `headline` int(11) NOT NULL,
  `permalink` varchar(120) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `created_date` int(11) NOT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `created_by` tinyint(2) DEFAULT NULL,
  `modified_by` tinyint(2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_counter`
--

CREATE TABLE IF NOT EXISTS `blog_counter` (
  `counter_blog_id` int(20) NOT NULL,
  `counter_count` int(11) NOT NULL,
  `counter_count_date` date NOT NULL,
  PRIMARY KEY (`counter_blog_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_level`
--

CREATE TABLE IF NOT EXISTS `program_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `safety`
--

CREATE TABLE IF NOT EXISTS `safety` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` tinyint(1) DEFAULT '1' COMMENT '0=inactive; 1=active; 2=draft; default=1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  `modified_date` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `role` tinyint(1) DEFAULT NULL COMMENT '1: administrator; 2: editor',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
