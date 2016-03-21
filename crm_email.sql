-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2016 at 02:07 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_email`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_asign_email`
--

CREATE TABLE `email_asign_email` (
  `id` int(11) NOT NULL,
  `email_from` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_to` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_asign_email`
--

INSERT INTO `email_asign_email` (`id`, `email_from`, `email_to`, `date`, `status`) VALUES
(1, 'minhnhut079@vietfuntravel.com.vn', 'minhnhut@vietfuntravel.com.vn', '2015-09-21 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_asign_table`
--

CREATE TABLE `email_asign_table` (
  `id` int(11) NOT NULL,
  `email_from` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_to` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_asign_table`
--

INSERT INTO `email_asign_table` (`id`, `email_from`, `email_to`, `date`, `status`) VALUES
(4, 'minhnhut@vietfuntravel.com.vn', 'minhnhut@vietfuntravel.com', '2016-01-25 10:28:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_draft`
--

CREATE TABLE `email_draft` (
  `id` int(4) NOT NULL,
  `row_id` int(4) NOT NULL,
  `email_out` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `table` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mail_cc` text COLLATE utf8_unicode_ci NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `folder_id` int(12) NOT NULL,
  `folder_segment` int(12) NOT NULL,
  `folder_child_id` int(12) NOT NULL,
  `folder_child_segment` int(12) NOT NULL,
  `transfer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `start` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_draft`
--

INSERT INTO `email_draft` (`id`, `row_id`, `email_out`, `table`, `date`, `email`, `mail_cc`, `subject`, `file`, `content`, `folder_id`, `folder_segment`, `folder_child_id`, `folder_child_segment`, `transfer`, `start`, `status`) VALUES
(4066, 4059, 'minhnhut@vietfuntravel.com.vn', 'email_minhnhut_vietfuntravel_com_vn', '2016-01-23 05:19:12', '', '', '', '', '&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;tgiky8o7&lt;/p&gt;', 0, 0, 0, 0, 'draft', 0, 1),
(4068, 4067, 'minhnhut@vietfuntravel.com.vn', 'email_minhnhut_vietfuntravel_com_vn', '2016-01-26 07:54:14', '', '', '', '', '&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;tgiky8o7&lt;/p&gt;', 0, 0, 0, 0, 'draft', 0, 1),
(4101, 0, 'minhnhut@vietfuntravel.com.vn', 'email_minhnhut_vietfuntravel_com', '2016-01-26 08:35:02', 'minhnhut@vietfuntravel.com.vn', '', 'Gửi email test asign cho minh nhut oo79', '[{"name":"menu.png","size":"1"},{"name":"1928-500-gold-certificate-bank-note.jpg","size":"41"},{"name":"500+dollars.jpg","size":"1488"}]', '&lt;p&gt;&lt;br&gt;&lt;/p&gt;Gởi email test sẽ assign\n&lt;br&gt;', 0, 0, 0, 0, 'draft', 0, 1),
(4106, 4102, 'minhnhut@vietfuntravel.com.vn', 'email_minhnhut0079_vietfuntravel_com_vn', '2016-01-27 07:34:59', '', '', '', '', '&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;tgiky8o7&lt;/p&gt;', 0, 0, 0, 0, 'draft', 0, 1),
(4107, 4107, 'minhnhut@vietfuntravel.com.vn', 'email_minhnhut0079_vietfuntravel_com_vn', '2016-01-27 07:35:08', '', '', '', '', '&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;tgiky8o7&lt;/p&gt;', 0, 0, 0, 0, 'draft', 0, 1),
(4116, 4108, 'minhnhut@vietfuntravel.com.vn', 'email_minhnhut_vietfuntravel_com', '2016-02-17 10:31:38', 'minhnhut0079@gmail.com', '[]', 'Gui email test', '', '&lt;p&gt;Gui email kem theo tong dai dien thoai&lt;/p&gt;&lt;pre&gt;&lt;span style=&quot;font-family: Arial,Helvetica;&quot; data-fr-verified=&quot;true&quot;&gt;&lt;strong&gt;&lt;span style=&quot;color: #2969B0;&quot; data-fr-verified=&quot;true&quot;&gt;Nguyễn Minh Nhựt&lt;/span&gt;&lt;/strong&gt;&lt;br&gt;Email: &lt;em&gt;&lt;span style=&quot;color: #B8312F;&quot; data-fr-verified=&quot;true&quot;&gt;minhnhut0079@gmail.com&lt;/span&gt;&lt;/em&gt;&lt;br&gt;&lt;span style=&quot;color: #7C706B;&quot; data-fr-verified=&quot;true&quot;&gt;Phone: 0039403403&lt;/span&gt;&lt;br&gt;Address: &lt;strong&gt;&lt;span style=&quot;color: #2969B0;&quot; data-fr-verified=&quot;true&quot;&gt;192 Nguyen Cong Tru, Q. 1&lt;/span&gt;&lt;/strong&gt;&lt;br&gt;------- IT Support ---------&lt;/span&gt;&lt;/pre&gt;', 0, 0, 0, 0, 'draft', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_filter`
--

CREATE TABLE `email_filter` (
  `id` int(11) NOT NULL,
  `from` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `to` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_filter`
--

INSERT INTO `email_filter` (`id`, `from`, `to`, `date`) VALUES
(14, 'minhnhut@vietfuntravel.com', 'tranminhvf@gmail.com', '2015-11-14 09:31:33'),
(17, 'minhnhut@vietfuntravel.com', 'codek365@mail.com', '2015-11-14 09:53:21'),
(19, 'tranminhvf@gmail.com', 'tranminh1236@gmail.com', '2015-11-14 09:56:49'),
(33, 'minhnhut@vietfuntravel.com.vn', 'minhnhut079@yahoo.com.vn', '2015-11-27 09:07:45'),
(43, 'minhnhut0079@vietfuntravel.com.vn', 'minhnhut0079@vietfuntravel.com.vn', '2015-11-27 15:17:23'),
(44, 'tranminhvf@gmail.com', 'codek365@gmail.com', '2016-01-06 10:26:42'),
(53, 'minhnhut@vietfuntravel.com', 'minhnhut@vietfuntravel.com.vn', '2016-01-26 14:35:02'),
(54, 'minhnhut@vietfuntravel.com', 'minhnhut0079@gmail.com', '2016-01-28 08:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `email_folder`
--

CREATE TABLE `email_folder` (
  `id` int(5) NOT NULL,
  `type` int(2) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_folder`
--

INSERT INTO `email_folder` (`id`, `type`, `email`, `code`, `name`) VALUES
(16, 1, 'minhnhut@vietfuntravel.com.vn', 'folder_1447467848', 'lala'),
(17, 1, 'minhnhut@vietfuntravel.com.vn', 'folder_14474678483', 'pepe'),
(20, 1, 'minhnhut@vietfuntravel.com', 'folder_1452914203', 'minhnhut');

-- --------------------------------------------------------

--
-- Table structure for table `email_folder_child`
--

CREATE TABLE `email_folder_child` (
  `id` int(5) NOT NULL,
  `folder_id` int(5) NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_folder_child`
--

INSERT INTO `email_folder_child` (`id`, `folder_id`, `code`, `name`) VALUES
(7, 14, 'folder_1447984177', 'KhachDuLich'),
(8, 15, 'folder_1452653145', 'Vietfuntravel'),
(9, 17, 'folder_1452654747', 'vietkhaiphong');

-- --------------------------------------------------------

--
-- Table structure for table `email_folder_child_segment`
--

CREATE TABLE `email_folder_child_segment` (
  `id` int(5) NOT NULL,
  `folder_child_id` int(5) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_folder_child_segment`
--

INSERT INTO `email_folder_child_segment` (`id`, `folder_child_id`, `name`) VALUES
(84, 9, 'inbox'),
(85, 9, 'send'),
(86, 9, 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `email_folder_segment`
--

CREATE TABLE `email_folder_segment` (
  `id` int(5) NOT NULL,
  `folder_id` int(5) NOT NULL,
  `type` int(5) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_folder_segment`
--

INSERT INTO `email_folder_segment` (`id`, `folder_id`, `type`, `name`) VALUES
(37, 16, 1, 'inbox'),
(38, 16, 1, 'send'),
(39, 16, 1, 'draft'),
(40, 17, 1, 'inbox'),
(44, 20, 1, 'inbox'),
(45, 20, 1, 'send'),
(46, 20, 1, 'draft');

-- --------------------------------------------------------

--
-- Table structure for table `email_gnjwnegj_ngnjev_receive_inbox`
--

CREATE TABLE `email_gnjwnegj_ngnjev_receive_inbox` (
  `id` int(6) UNSIGNED NOT NULL,
  `date` datetime DEFAULT NULL,
  `from_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `attach` text COLLATE utf8_unicode_ci,
  `transfer` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_id` int(5) DEFAULT NULL,
  `folder_segment` int(5) DEFAULT NULL,
  `folder_child_id` int(5) DEFAULT NULL,
  `folder_child_segment` int(5) DEFAULT NULL,
  `reader` int(1) DEFAULT NULL,
  `start` int(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_gnjwnegj_ngnjev_send_email`
--

CREATE TABLE `email_gnjwnegj_ngnjev_send_email` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` int(2) DEFAULT NULL,
  `email_out` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `from_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc` text COLLATE utf8_unicode_ci,
  `subject` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `attach` text COLLATE utf8_unicode_ci,
  `transfer` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_id` int(5) DEFAULT NULL,
  `folder_segment` int(5) DEFAULT NULL,
  `folder_child_id` int(5) DEFAULT NULL,
  `folder_child_segment` int(5) DEFAULT NULL,
  `start` int(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_hh_gh_receive_inbox`
--

CREATE TABLE `email_hh_gh_receive_inbox` (
  `id` int(6) UNSIGNED NOT NULL,
  `date` datetime DEFAULT NULL,
  `from_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc` text COLLATE utf8_unicode_ci,
  `subject` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `attach` text COLLATE utf8_unicode_ci,
  `transfer` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_id` int(5) DEFAULT NULL,
  `folder_type` int(5) DEFAULT NULL,
  `folder_segment` int(5) DEFAULT NULL,
  `reader` int(1) DEFAULT NULL,
  `start` int(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_hh_gh_send_email`
--

CREATE TABLE `email_hh_gh_send_email` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` int(2) DEFAULT NULL,
  `email_out` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `from_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc` text COLLATE utf8_unicode_ci,
  `subject` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `attach` text COLLATE utf8_unicode_ci,
  `transfer` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_id` int(5) DEFAULT NULL,
  `folder_type` int(5) DEFAULT NULL,
  `folder_segment` int(5) DEFAULT NULL,
  `start` int(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_minhnhut0079_vietfuntravel_com_receive_inbox`
--

CREATE TABLE `email_minhnhut0079_vietfuntravel_com_receive_inbox` (
  `id` int(6) UNSIGNED NOT NULL,
  `date` datetime DEFAULT NULL,
  `from_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `attach` text COLLATE utf8_unicode_ci,
  `transfer` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_id` int(5) DEFAULT NULL,
  `folder_segment` int(5) DEFAULT NULL,
  `folder_child_id` int(5) NOT NULL,
  `folder_child_segment` int(5) NOT NULL,
  `reader` int(1) DEFAULT NULL,
  `start` int(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_minhnhut0079_vietfuntravel_com_receive_inbox`
--

INSERT INTO `email_minhnhut0079_vietfuntravel_com_receive_inbox` (`id`, `date`, `from_email`, `to_email`, `subject`, `body`, `attach`, `transfer`, `folder_id`, `folder_segment`, `folder_child_id`, `folder_child_segment`, `reader`, `start`, `status`) VALUES
(2, '2015-11-11 15:25:58', 'minhnhut0079@gmail.com', 'minhnhut@vietfuntravel.com.vn', 'Gui cho may 1 email', 'Tao gui cho may 1 email nha pa\r\n', '', 'inbox', 14, 31, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_minhnhut0079_vietfuntravel_com_send_email`
--

CREATE TABLE `email_minhnhut0079_vietfuntravel_com_send_email` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` int(2) DEFAULT NULL,
  `email_out` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `from_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc` text COLLATE utf8_unicode_ci,
  `subject` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `attach` text COLLATE utf8_unicode_ci,
  `transfer` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_id` int(5) DEFAULT NULL,
  `folder_segment` int(5) DEFAULT NULL,
  `folder_child_id` int(5) NOT NULL,
  `folder_child_segment` int(11) NOT NULL,
  `start` int(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_minhnhut0079_vietfuntravel_com_send_email`
--

INSERT INTO `email_minhnhut0079_vietfuntravel_com_send_email` (`id`, `user_id`, `email_out`, `date`, `from_email`, `to_email`, `cc`, `subject`, `body`, `attach`, `transfer`, `folder_id`, `folder_segment`, `folder_child_id`, `folder_child_segment`, `start`, `status`) VALUES
(21, 58, 'minhnhut@vietfuntravel.com.vn', '2015-11-20 08:44:18', 'minhnhut0079@vietfuntravel.com', 'minhnhut0079@gmail.com', '', 'Re: Gui thong tin host girl', 'Tao da nhan duoc hot girl\n\nOn Sat, Nov 14, 2015 at 9:49 AM, Sale Admin Vietfuntravel.com.vn <\nminhnhut@vietfuntravel.com.vn> wrote:\n\n> Gui thong tin hot girl\n>\n', '""', 'send', 18, 41, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_minhnhut0079_vietfuntravel_com_vn_receive_inbox`
--

CREATE TABLE `email_minhnhut0079_vietfuntravel_com_vn_receive_inbox` (
  `id` int(6) UNSIGNED NOT NULL,
  `date` datetime DEFAULT NULL,
  `from_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `attach` text COLLATE utf8_unicode_ci,
  `transfer` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_id` int(5) DEFAULT NULL,
  `folder_segment` int(5) DEFAULT NULL,
  `folder_child_id` int(5) NOT NULL,
  `folder_child_segment` int(5) NOT NULL,
  `reader` int(1) DEFAULT NULL,
  `start` int(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_minhnhut0079_vietfuntravel_com_vn_send_email`
--

CREATE TABLE `email_minhnhut0079_vietfuntravel_com_vn_send_email` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` int(2) DEFAULT NULL,
  `email_out` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `from_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc` text COLLATE utf8_unicode_ci,
  `subject` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `attach` text COLLATE utf8_unicode_ci,
  `transfer` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_id` int(5) DEFAULT NULL,
  `folder_segment` int(5) DEFAULT NULL,
  `folder_child_id` int(5) NOT NULL,
  `folder_child_segment` int(5) NOT NULL,
  `start` int(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_minhnhut_vietfuntravel_com_receive_inbox`
--

CREATE TABLE `email_minhnhut_vietfuntravel_com_receive_inbox` (
  `id` int(6) UNSIGNED NOT NULL,
  `date` datetime DEFAULT NULL,
  `from_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc` text COLLATE utf8_unicode_ci,
  `subject` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `attach` text COLLATE utf8_unicode_ci,
  `transfer` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_id` int(5) DEFAULT NULL,
  `folder_segment` int(5) DEFAULT NULL,
  `folder_child_id` int(5) NOT NULL,
  `folder_child_segment` int(5) NOT NULL,
  `reader` int(1) DEFAULT NULL,
  `start` int(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_minhnhut_vietfuntravel_com_receive_inbox`
--

INSERT INTO `email_minhnhut_vietfuntravel_com_receive_inbox` (`id`, `date`, `from_email`, `to_email`, `cc`, `subject`, `body`, `attach`, `transfer`, `folder_id`, `folder_segment`, `folder_child_id`, `folder_child_segment`, `reader`, `start`, `status`) VALUES
(33, '2016-01-18 09:38:28', 'minhnhut0079@gmail.com', 'minhnhut@vietfuntravel.com.vn', NULL, 'Gửi email test asign cho minh nhut oo79', 'Gởi email test sẽ assign\r\n', '', 'inbox', 20, 0, 0, 0, 0, 1, 1),
(34, '2016-01-06 09:16:43', 'sales@vietfuntravel.com.vn', 'minhnhut@vietfuntravel.com.vn', NULL, 'Du Lịch Việt Vui - Viet Fun Travel - Cám ơn Quý khách đã đăng ký', '\r\n\r\n<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">\r\n<html xmlns="http://www.w3.org/1999/xhtml">\r\n<head>\r\n<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\r\n<title>Du Lịch Việt Vui - Viet Fun Travel - Cám ơn Quý khách đã đăng ký</title>\r\n</head>\r\n\r\n<body>\r\n<div style="width:650px;min-height:auto;margin:0px auto;overflow:hidden;display:table;font-size:13px;font-family:''Segoe UI'',''HelveticaNeue'',Arial,Helvetica,sans-serif">\r\n  <div style="display:table;width:650px;min-height:71px;font-size:20px"> <a href="http://vietfuntravel.com.vn/" style="font-weight:bold;color:#006c9a;text-decoration:none" target="_blank"> <img src="http://www.vietfuntravel.com.vn/image/data/logo.jpg" border="0" alt="Viet Fun Travel"> </a> </div>\r\n  <div style="width:650px;margin:0px auto;display:table;min-height:auto;margin-bottom: 10px;">\r\n    <p style="padding:0 10px;color:#282828;">Chào mừng và cám ơn Quý khách đã đăng ký tại <b>Du Lịch Việt Vui - Viet Fun Travel</b>!</p>\r\n    <p style="padding:0 10px;color:#282828;">Tài khoản của Quý khách đã được tạo và Quý khách có thể đăng nhập bằng email và mật khẩu bằng đường dẫn sau:</p>\r\n    <div style="background:#fff8cc;border:1px solid #ffe222;padding:8px;margin:10px 0;">\r\n    <p style="padding:0 10px;color:#282828;"><b>Link đăng nhập:</b> <a href="http://vfcomvn.vf/tai-khoan/dang-nhap">http://vfcomvn.vf/tai-khoan/dang-nhap</a></p>\r\n    <p style="padding:0 10px;color:#282828;"><b>Email:</b> minhnhut@vietfuntravel.com.vn</p>\r\n    <p style="padding:0 10px;color:#282828;"><b>Mật khẩu:</b> 12345</p>\r\n    </div>\r\n    <p style="padding:0 10px;color:#282828;">Sau khi đăng nhập, Quý khách có thể truy cập vào dịch vụ như là xem lịch sử đơn hàng, in hóa đơn và sửa thông tin tài khoản.</p>\r\n    <p style="padding:0 10px;color:#282828;">Cám ơn,</p>\r\n    <p style="padding:0 10px;color:#282828;">Du Lịch Việt Vui - Viet Fun Travel</p>\r\n  </div>\r\n  <div style="background-color:#cfdfeb;padding:5px;">\r\n  <div style="color:#535353;font-size:14px;line-height:23px">\r\n      <div style="font-size:17px;color:#636363;font-weight:bold;margin:10px 10px 0 10px">CÔNG TY TNHH DU LỊCH VIỆT VUI - VIET FUN TRAVEL CO., LTD</div>\r\n      <div style="margin-left:10px"><b>» Địa chỉ:</b> 28/13 Bùi Viện, P. Phạm Ngũ Lão, Quận 1, TP.HCM</div>\r\n      <div style="margin-left:10px"><b>» Điện thoại:</b> +84 (08) 360 226 49 - (08) 2210 2465 - (08) 2240 6474 - (08) 6651 81 67</div>\r\n      <div style="margin-left:10px"><b>» Hỗ trợ:</b> +84 (0) 903 550 236 - +84 (0) 903 779 759 </div>\r\n      <div style="margin-left:10px;margin-bottom:10px"><b>» Email:</b> <a href="mailto:sales@vietfuntravel.com.vn" target="_blank">sales@vietfuntravel.com.vn</a> <b>» Website:</b> <a href="http://www.vietfuntravel.com.vn" target="_blank">www.vietfuntravel.com.vn</a> <i>(Tiếng Việt)</i></div>\r\n    </div>\r\n  </div>\r\n</div>\r\n</body>\r\n</html>\r\n\r\n', '', 'inbox', 0, 0, 0, 0, 0, 1, 1),
(35, '2016-01-26 14:35:02', 'minhnhut@vietfuntravel.com.vn', 'minhnhut@vietfuntravel.com.vn', NULL, 'Gửi email test asign cho minh nhut oo79', '--B_ALT_56a721a6a91d0\r\nContent-Type: text/plain; charset=utf-8\r\nContent-Transfer-Encoding: 8bit\r\n\r\ntgiky8o7\r\n\r\n\r\n--B_ALT_56a721a6a91d0\r\nContent-Type: text/html; charset=utf-8\r\nContent-Transfer-Encoding: quoted-printable\r\n\r\n<p><br></p><p>tgiky8o7</p>\r\n\r\n--B_ALT_56a721a6a91d0--\r\n', '{"1":"menu_1453793700.png","2":"1928-500-gold-certificate-bank-note_1453793700.jpg","3":"500+dollars_1453793700.jpg"}', 'inbox', 0, 0, 0, 0, 0, 1, 1),
(36, '2016-01-28 09:45:48', 'minhnhut0079@gmail.com', 'minhnhut@vietfuntravel.com.vn', NULL, 'Re: Gui email test', '--001a114339408120fa052a5bea6a\r\nContent-Type: multipart/alternative; boundary=001a114339408120f4052a5bea68\r\n\r\n--001a114339408120f4052a5bea68\r\nContent-Type: text/plain; charset=UTF-8\r\nContent-Transfer-Encoding: quoted-printable\r\n\r\nMinh nhan duoc hinh cua ban\r\n\r\nOn Thu, Jan 28, 2016 at 8:50 AM, Sale Admin Vietfuntravel.com.vn <\r\nminhnhut@vietfuntravel.com.vn> wrote:\r\n\r\n> Gui email kem theo tong dai dien thoai\r\n>\r\n> *Nguy=E1=BB=85n Minh Nh=E1=BB=B1t*\r\n> Email: *minhnhut0079@gmail.com <minhnhut0079@gmail.com>*Phone: 0039403403\r\n> Address: *192 Nguyen Cong Tru, Q. 1*\r\n> ------- IT Support ---------\r\n>\r\n>\r\n\r\n--001a114339408120f4052a5bea68\r\nContent-Type: text/html; charset=UTF-8\r\nContent-Transfer-Encoding: quoted-printable\r\n\r\n<div dir=3D"ltr">Minh nhan duoc hinh cua ban=C2=A0</div><div class=3D"gmail=\r\n_extra"><br><div class=3D"gmail_quote">On Thu, Jan 28, 2016 at 8:50 AM, Sal=\r\ne Admin <a href=3D"http://Vietfuntravel.com.vn">Vietfuntravel.com.vn</a> <s=\r\npan dir=3D"ltr"><<a href=3D"mailto:minhnhut@vietfuntravel.com.vn" target=\r\n=3D"_blank">minhnhut@vietfuntravel.com.vn</a>></span> wrote:<br><blockqu=\r\note class=3D"gmail_quote" style=3D"margin:0 0 0 .8ex;border-left:1px #ccc s=\r\nolid;padding-left:1ex"><p>Gui email kem theo tong dai dien thoai</p><pre><s=\r\npan style=3D"font-family:Arial,Helvetica"><strong><span style=3D"color:#296=\r\n9b0">Nguy=E1=BB=85n Minh Nh=E1=BB=B1t</span></strong>\r\nEmail: <em><span style=3D"color:#b8312f"><a href=3D"mailto:minhnhut0079@gma=\r\nil.com" target=3D"_blank">minhnhut0079@gmail.com</a></span></em>\r\n<span style=3D"color:#7c706b">Phone: 0039403403</span>\r\nAddress: <strong><span style=3D"color:#2969b0">192 Nguyen Cong Tru, Q. 1</s=\r\npan></strong>\r\n------- IT Support ---------</span></pre>\r\n</blockquote></div><br></div>\r\n\r\n--001a114339408120f4052a5bea68--\r\n--001a114339408120fa052a5bea6a\r\nContent-Type: image/jpeg; name="hotgirl.jpg"\r\nContent-Disposition: attachment; filename="hotgirl.jpg"\r\nContent-Transfer-Encoding: base64\r\nX-Attachment-Id: f_ijxns3ip1\r\n\r\n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\r\nhNmtpiGZmgdsjy8SpeV3MeX3XIec0diclEX/2Q==\r\n--001a114339408120fa052a5bea6a--\r\n', '{"1":"hotgirl.jpg"}', 'inbox', 0, 0, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_minhnhut_vietfuntravel_com_send_email`
--

CREATE TABLE `email_minhnhut_vietfuntravel_com_send_email` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` int(2) DEFAULT NULL,
  `email_out` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `from_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc` text COLLATE utf8_unicode_ci,
  `subject` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `attach` text COLLATE utf8_unicode_ci,
  `transfer` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_id` int(5) DEFAULT NULL,
  `folder_segment` int(5) DEFAULT NULL,
  `folder_child_id` int(5) NOT NULL,
  `folder_child_segment` int(5) NOT NULL,
  `start` int(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_minhnhut_vietfuntravel_com_send_email`
--

INSERT INTO `email_minhnhut_vietfuntravel_com_send_email` (`id`, `user_id`, `email_out`, `date`, `from_email`, `to_email`, `cc`, `subject`, `body`, `attach`, `transfer`, `folder_id`, `folder_segment`, `folder_child_id`, `folder_child_segment`, `start`, `status`) VALUES
(7, 31, 'minhnhut@vietfuntravel.com.vn', '2016-01-26 14:35:02', 'minhnhut@vietfuntravel.com', 'minhnhut@vietfuntravel.com.vn', '', 'Gửi email test asign cho minh nhut oo79', '<p><br></p><p>tgiky8o7</p>', '[{"size":"1","name":"menu_1453793700.png"},{"size":"41","name":"1928-500-gold-certificate-bank-note_1453793700.jpg"},{"size":"1488","name":"500+dollars_1453793700.jpg"}]', 'send', NULL, NULL, 0, 0, 1, 1),
(8, 54, 'minhnhut@vietfuntravel.com.vn', '2016-01-28 08:50:54', 'minhnhut@vietfuntravel.com', 'minhnhut0079@gmail.com', '[]', 'Gui email test', '<p>Gui email kem theo tong dai dien thoai</p><pre><span style="font-family: Arial,Helvetica;"><strong><span style="color: #2969B0;">Nguyễn Minh Nhựt</span></strong>\nEmail: <em><span style="color: #B8312F;">minhnhut0079@gmail.com</span></em>\n<span style="color: #7C706B;">Phone: 0039403403</span>\nAddress: <strong><span style="color: #2969B0;">192 Nguyen Cong Tru, Q. 1</span></strong>\n------- IT Support ---------</span></pre>', '[{"size":"37","name":"img-tongdai_1453945800.png"}]', 'send', NULL, NULL, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_minhnhut_vietfuntravel_com_vn_receive_inbox`
--

CREATE TABLE `email_minhnhut_vietfuntravel_com_vn_receive_inbox` (
  `id` int(6) UNSIGNED NOT NULL,
  `date` datetime DEFAULT NULL,
  `from_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc` text COLLATE utf8_unicode_ci,
  `subject` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `attach` text COLLATE utf8_unicode_ci,
  `transfer` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_id` int(5) DEFAULT NULL,
  `folder_segment` int(5) DEFAULT NULL,
  `folder_child_id` int(5) NOT NULL,
  `folder_child_segment` int(5) NOT NULL,
  `reader` int(1) DEFAULT NULL,
  `start` int(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_minhnhut_vietfuntravel_com_vn_receive_inbox`
--

INSERT INTO `email_minhnhut_vietfuntravel_com_vn_receive_inbox` (`id`, `date`, `from_email`, `to_email`, `cc`, `subject`, `body`, `attach`, `transfer`, `folder_id`, `folder_segment`, `folder_child_id`, `folder_child_segment`, `reader`, `start`, `status`) VALUES
(96, '2016-01-11 09:14:39', 'minhnhut@vietfuntravel.com.vn', 'minhnhut@vietfuntravel.com.vn', NULL, 'Re: Gui email kem theo host girl', 'Vào ngày 2016-01-11 08:20, Sale Admin Vietfuntravel.com.vn viết:\r\n> Gửi ảnh host girl cho đồng bào cả nước xem chơi cho vui\r\n> \r\n> NGUYỄN MINH NHỰT\r\n> Email: _minhnhut0079@gmail.com_\r\n> Phone: 0039403403\r\n> Address: 192 NGUYEN CONG TRU, Q. 1\r\n> ------- IT Support ---------\r\n\r\n', '', 'inbox', 17, 40, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_minhnhut_vietfuntravel_com_vn_send_email`
--

CREATE TABLE `email_minhnhut_vietfuntravel_com_vn_send_email` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` int(2) DEFAULT NULL,
  `email_out` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `from_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc` text COLLATE utf8_unicode_ci,
  `subject` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `attach` text COLLATE utf8_unicode_ci,
  `transfer` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_id` int(5) DEFAULT NULL,
  `folder_segment` int(5) DEFAULT NULL,
  `folder_child_id` int(5) NOT NULL,
  `folder_child_segment` int(5) NOT NULL,
  `start` int(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_outbound`
--

CREATE TABLE `email_outbound` (
  `id` int(2) NOT NULL,
  `protocol` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `webmail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_host` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_port` int(5) NOT NULL,
  `smtp_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_outbound`
--

INSERT INTO `email_outbound` (`id`, `protocol`, `webmail`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `fullname`, `password`, `status`) VALUES
(13, 'smtp', 'webmail.vietfuntravel.com.vn', '128.199.159.150', 25, 'minhnhut@vietfuntravel.com.vn', 'minhnhut0079@', 'Sale Admin Vietfuntravel.com.vn', '', 1),
(14, 'smtp', 'mail.vietfuntravel.com', '162.144.94.85', 25, 'minhnhut@vietfuntravel.com', 'minhnhut0079@', 'Sale Admin Vietfuntravel.com', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_recycle`
--

CREATE TABLE `email_recycle` (
  `id` int(5) NOT NULL,
  `table` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `from_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `to` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `attach` text COLLATE utf8_unicode_ci NOT NULL,
  `read` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_signed`
--

CREATE TABLE `email_signed` (
  `id` int(1) NOT NULL,
  `user_id` int(5) NOT NULL,
  `signed` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_signed`
--

INSERT INTO `email_signed` (`id`, `user_id`, `signed`, `status`) VALUES
(1, 54, '&lt;pre&gt;&lt;span style=&quot;font-family: Arial,Helvetica;&quot;&gt;&lt;strong&gt;&lt;span style=&quot;color: #2969B0;&quot;&gt;Nguyễn Minh Nhựt&lt;/span&gt;&lt;/strong&gt;\r\nEmail: &lt;em&gt;&lt;span style=&quot;color: #B8312F;&quot;&gt;minhnhut0079@gmail.com&lt;/span&gt;&lt;/em&gt;\r\n&lt;span style=&quot;color: #7C706B;&quot;&gt;Phone: 0039403403&lt;/span&gt;\r\nAddress: &lt;strong&gt;&lt;span style=&quot;color: #2969B0;&quot;&gt;192 Nguyen Cong Tru, Q. 1&lt;/span&gt;&lt;/strong&gt;\r\n------- IT Support ---------&lt;/span&gt;&lt;/pre&gt;', 1),
(2, 31, '&lt;p&gt;tgiky8o7&lt;/p&gt;', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_system`
--

CREATE TABLE `email_system` (
  `id` int(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `table` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_system`
--

INSERT INTO `email_system` (`id`, `user_id`, `email`, `password`, `table`, `status`) VALUES
(75, 0, 'minhnhut@vietfuntravel.com.vn', 'f17d1b31c90697f2dcb0a508270c6835', 'email_minhnhut_vietfuntravel_com_vn', 1),
(76, 0, 'minhnhut@vietfuntravel.com', 'f17d1b31c90697f2dcb0a508270c6835', 'email_minhnhut_vietfuntravel_com', 1),
(77, 58, 'minhnhut0079@vietfuntravel.com.vn', 'f17d1b31c90697f2dcb0a508270c6835', 'email_minhnhut0079_vietfuntravel_com_vn', 1),
(78, 58, 'minhnhut0079@vietfuntravel.com', 'f17d1b31c90697f2dcb0a508270c6835', 'email_minhnhut0079_vietfuntravel_com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_tranminhvf_gmail_com_receive_inbox`
--

CREATE TABLE `email_tranminhvf_gmail_com_receive_inbox` (
  `id` int(6) UNSIGNED NOT NULL,
  `date` datetime DEFAULT NULL,
  `from_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `attach` text COLLATE utf8_unicode_ci,
  `transfer` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_id` int(5) DEFAULT NULL,
  `folder_segment` int(5) DEFAULT NULL,
  `folder_child_id` int(5) DEFAULT NULL,
  `folder_child_segment` int(5) DEFAULT NULL,
  `reader` int(1) DEFAULT NULL,
  `start` int(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_tranminhvf_gmail_com_receive_inbox`
--

INSERT INTO `email_tranminhvf_gmail_com_receive_inbox` (`id`, `date`, `from_email`, `to_email`, `subject`, `body`, `attach`, `transfer`, `folder_id`, `folder_segment`, `folder_child_id`, `folder_child_segment`, `reader`, `start`, `status`) VALUES
(1, '2015-12-02 14:47:10', 'codek365@gmail.com', 'minhnhut@vietfuntravel.com.vn', '=?UTF-8?B?RndkOiBbZml4YnVnc10tIEFkZCBsaW5rIGJhbm5lciB04bq/dCBuZ3V5w6puIMSRw6Fu?=', '<div dir="ltr">Xử lí xong thì báo cho Thanh và CC anh<br clear="all"><div><div class="gmail_signature"><div dir="ltr"><div><div dir="ltr"><div><div dir="ltr"><div><font size="2" color="#3d85c6"><i><b>Best regards</b></i></font></div><div style="font-size:12.8000001907349px"><span style="font-size:12.8000001907349px"><b><font color="#3d85c6"><br></font></b></span></div><b style="font-size:12.8000001907349px"><font color="#3d85c6">Khoa Nguyen </font></b><div style="font-size:12.8000001907349px"><b><i><font color="#3d85c6">Technology Developer</font></i></b></div><div style="font-size:12.8000001907349px"><b><i><font color="#3d85c6"><br></font></i></b></div><div style="font-size:12.8000001907349px"><b><font color="#3d85c6">C: (84)  934 141 331</font></b></div><div style="font-size:12.8000001907349px"><b><font color="#3d85c6">E: <a href="mailto:codek365@gmail.com" target="_blank">codek365@gmail.com</a></font></b></div><div><b><font color="#3d85c6"><span style="font-size:12.8000001907349px">W: </span><u><a href="http://you-tek.net" target="_blank">http://you-tek.net</a></u></font></b></div><div><b><font color="#3d85c6">Skype: coderfarm</font></b></div></div></div></div></div></div></div></div>\r\n<br><div class="gmail_quote">---------- Forwarded message ----------<br>From: <b class="gmail_sendername">Nguyễn Hoàng Thanh</b> <span dir="ltr"><<a href="mailto:thanhnh@vietfuntravel.com.vn">thanhnh@vietfuntravel.com.vn</a>></span><br>Date: Wed, Dec 2, 2015 at 2:44 PM<br>Subject: [fixbugs]- Add link banner tết nguyên đán<br>To: <a href="mailto:khoanguyen@vietfuntravel.com.vn">khoanguyen@vietfuntravel.com.vn</a><br><br><br>\r\n<div lang="EN-US" link="blue" vlink="purple"><div><p class="MsoNormal">2 banner chèn link về <a href="http://www.vietfuntravel.com.vn/tour-du-lich-tet-duong-lich.html" target="_blank">http://www.vietfuntravel.com.vn/tour-du-lich-tet-duong-lich.html</a> title=”Tour Du Lịch Tết Dương Lịch 2016” target="_blank"<u></u><u></u></p><p class="MsoNormal"><img border="0" width="1038" height="519" src="cid:image001.png@01D12D0F.E2FAED70"><u></u><u></u></p><p class="MsoNormal"><u></u> <u></u></p><p class="MsoNormal"><img border="0" width="791" height="388" src="cid:image002.png@01D12D0F.E2FAED70"><u></u><u></u></p></div></div></div><br><br><br><br><div class="mt-signature"><font color="#999999" class="mt-signature-text">Sent with <a href="https://mailtrack.io/install?source=signature&lang=en&referral=codek365@gmail.com&idSignature=22" class="mt-install">MailTrack</a></font></div></div>\r\n', '{"1":"image002.png","2":"image001.png"}', 'inbox', 0, 0, 0, 0, 0, 1, 1),
(2, '2015-12-11 11:34:52', 'codek365@gmail.com', 'minhtran@vietfuntravel.com.vn', '=?UTF-8?B?RndkOiBFdmVudCBExrDGoW5nIEzhu4tjaA==?=', '<div dir="ltr"><br clear="all"><div><div class="gmail_signature"><div dir="ltr"><div><div dir="ltr"><div><div dir="ltr"><div><font size="2" color="#3d85c6"><i><b>Best regards</b></i></font></div><div style="font-size:12.8000001907349px"><span style="font-size:12.8000001907349px"><b><font color="#3d85c6"><br></font></b></span></div><b style="font-size:12.8000001907349px"><font color="#3d85c6">Khoa Nguyen </font></b><div style="font-size:12.8000001907349px"><b><i><font color="#3d85c6">Technology Developer</font></i></b></div><div style="font-size:12.8000001907349px"><b><i><font color="#3d85c6"><br></font></i></b></div><div style="font-size:12.8000001907349px"><b><font color="#3d85c6">C: (84)  934 141 331</font></b></div><div style="font-size:12.8000001907349px"><b><font color="#3d85c6">E: <a href="mailto:codek365@gmail.com" target="_blank">codek365@gmail.com</a></font></b></div><div><b><font color="#3d85c6"><span style="font-size:12.8000001907349px">W: </span><u><a href="http://you-tek.net" target="_blank">http://you-tek.net</a></u></font></b></div><div><b><font color="#3d85c6">Skype: coderfarm</font></b></div></div></div></div></div></div></div></div>\r\n<br><div class="gmail_quote">---------- Forwarded message ----------<br>From: <b class="gmail_sendername">khoa nguyen</b> <span dir="ltr"><<a href="mailto:codek365@gmail.com">codek365@gmail.com</a>></span><br>Date: 2015-12-11 11:29 GMT+07:00<br>Subject: Re: Event Dương Lịch<br>To: Nguyễn Hoàng Thanh <<a href="mailto:thanhnh@vietfuntravel.com.vn">thanhnh@vietfuntravel.com.vn</a>><br><br><br><div dir="ltr">Em bị ngộ nhận à? "<span style="color:rgb(31,73,125);font-family:Calibri,sans-serif;font-size:14.6667px">Như em đã nói. </span><b style="color:rgb(31,73,125);font-family:Calibri,sans-serif;font-size:14.6667px">XONG EVENT TẾT NGUYÊN ĐÁN"</b><font color="#000000"><b style="font-family:Calibri,sans-serif;font-size:14.6667px"> </b><span style="font-family:Calibri,sans-serif;font-size:14.6667px">là cái gì? VFT đang chạy Event Dương Lịch, Tết Nguyên Đán = Tết Âm Lịch, => còn xa lắm mới tới. Anh Tuân đang quan tâm "Tại sao Dương Lịch chưa xong?". Anh làm xong cái anh Tuân nói nên anh cần em giải thích tại sao chưa xong? Chưa xong chỗ nào để kinh doanh ra tiền trả lương, anh không rảnh để đi đấu đá vấn đề cá nhân! Minh và Nhựt yêu cầu anh giải trình lên trên, em làm không được anh sẽ tự làm. </span></font><br><br><br><br><div><font color="#999999">Sent with <a href="https://mailtrack.io/install?source=signature&lang=en&referral=codek365@gmail.com&idSignature=22" target="_blank">MailTrack</a></font></div><img width="0" height="0" src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"></div><div class="gmail_extra"><span class=""><br clear="all"><div><div><div dir="ltr"><div><div dir="ltr"><div><div dir="ltr"><div><font size="2" color="#3d85c6"><i><b>Best regards</b></i></font></div><div style="font-size:12.8000001907349px"><span style="font-size:12.8000001907349px"><b><font color="#3d85c6"><br></font></b></span></div><b style="font-size:12.8000001907349px"><font color="#3d85c6">Khoa Nguyen </font></b><div style="font-size:12.8000001907349px"><b><i><font color="#3d85c6">Technology Developer</font></i></b></div><div style="font-size:12.8000001907349px"><b><i><font color="#3d85c6"><br></font></i></b></div><div style="font-size:12.8000001907349px"><b><font color="#3d85c6">C: (84)  934 141 331</font></b></div><div style="font-size:12.8000001907349px"><b><font color="#3d85c6">E: <a href="mailto:codek365@gmail.com" target="_blank">codek365@gmail.com</a></font></b></div><div><b><font color="#3d85c6"><span style="font-size:12.8000001907349px">W: </span><u><a href="http://you-tek.net" target="_blank">http://you-tek.net</a></u></font></b></div><div><b><font color="#3d85c6">Skype: coderfarm</font></b></div></div></div></div></div></div></div></div>\r\n<br></span><div><div class="h5"><div class="gmail_quote">2015-12-11 11:22 GMT+07:00 Nguyễn Hoàng Thanh <span dir="ltr"><<a href="mailto:thanhnh@vietfuntravel.com.vn" target="_blank">thanhnh@vietfuntravel.com.vn</a>></span>:<br><blockquote class="gmail_quote" style="margin:0 0 0 .8ex;border-left:1px #ccc solid;padding-left:1ex"><div lang="EN-US" link="blue" vlink="purple"><div><p class="MsoNormal"><span style="font-size:11.0pt;font-family:"Calibri","sans-serif";color:#1f497d">Như em đã nói. <b>XONG EVENT TẾT NGUYÊN ĐÁN</b> trên site VFT rồi mới tới vấn đề khác. Vấn đề cũ chưa giải quyết xong thì tại sao lại phanh khui vấn đề khác làm gì.<u></u><u></u></span></p><p class="MsoNormal"><span style="font-size:11.0pt;font-family:"Calibri","sans-serif";color:#1f497d"><u></u> <u></u></span></p><p class="MsoNormal"><b><span style="font-size:10.0pt;font-family:"Tahoma","sans-serif"">From:</span></b><span style="font-size:10.0pt;font-family:"Tahoma","sans-serif""> khoa nguyen [mailto:<a href="mailto:codek365@gmail.com" target="_blank">codek365@gmail.com</a>] <br><b>Sent:</b> 11 Tháng Mười Hai 2015 11:15 SA<br><b>To:</b> Nguyễn Hoàng Thanh<br><b>Subject:</b> Re: Event Dương Lịch<u></u><u></u></span></p><p class="MsoNormal"><u></u> <u></u></p><div><span><p class="MsoNormal" style="margin-bottom:12.0pt">Có gì đó không ổn, Event nào thì làm hoàn thành Event đó. Nếu không xong thì báo không xong, nếu còn lỗi thì báo  còn lỗi, không thì báo là hoàn thành. Làm vậy 1 tay che trời à? Người ta nói anh <b>ngồi chơi</b> là anh không đồng ý! Cái nào ra cái đó và đây là việc trả lời với cấp trên em chứ không phải việc riêng em. Em xác nhận chưa thì cụ thể chưa cái gì, Event chạy để kinh doanh ra tiền chứ chứ không phải để "<b>SOI" </b>nhau, anh không có hứng thú. Đó cũng là yêu cầu của Minh và  Nhựt, nó phải trả lời cấp trên chứ không riêng gì anh phải làm. Nếu không thì 2 đứa nó cũng được xếp vào nhóm <b>"ăn không ngồi rồi", </b>tụi nó cần anh giải thích, và anh cần em giải thích.<b> </b><br> <br><br><u></u><u></u></p><div><p class="MsoNormal"><span style="color:#999999">Sent with <a href="https://mailtrack.io/install?source=signature&lang=en&referral=codek365@gmail.com&idSignature=22" target="_blank">MailTrack</a></span><u></u><u></u></p></div></span><p class="MsoNormal"><span style="border:solid windowtext 1.0pt;padding:0cm"><img border="0" width="100" height="100" src="cid:~WRD000.jpg" alt="Description: Image removed by sender."></span><u></u><u></u></p></div><div><span><p class="MsoNormal"><br clear="all"><u></u><u></u></p><div><div><div><div><div><div><div><div><p class="MsoNormal"><b><i><span style="font-size:10.0pt;color:#3d85c6">Best regards</span></i></b><u></u><u></u></p></div><div><p class="MsoNormal"><span style="font-size:9.5pt"><u></u> <u></u></span></p></div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">Khoa Nguyen </span></b><u></u><u></u></p><div><p class="MsoNormal"><b><i><span style="font-size:9.5pt;color:#3d85c6">Technology Developer</span></i></b><span style="font-size:9.5pt"><u></u><u></u></span></p></div><div><p class="MsoNormal"><span style="font-size:9.5pt"><u></u> <u></u></span></p></div><div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">C: (84)  934 141 331</span></b><span style="font-size:9.5pt"><u></u><u></u></span></p></div><div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">E: <a href="mailto:codek365@gmail.com" target="_blank">codek365@gmail.com</a></span></b><span style="font-size:9.5pt"><u></u><u></u></span></p></div><div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">W: </span><u><span style="color:#3d85c6"><a href="http://you-tek.net" target="_blank">http://you-tek.net</a></span></u></b><u></u><u></u></p></div><div><p class="MsoNormal"><b><span style="color:#3d85c6">Skype: coderfarm</span></b><u></u><u></u></p></div></div></div></div></div></div></div></div><p class="MsoNormal"><u></u> <u></u></p></span><div><span><p class="MsoNormal">2015-12-11 11:07 GMT+07:00 Nguyễn Hoàng Thanh <<a href="mailto:thanhnh@vietfuntravel.com.vn" target="_blank">thanhnh@vietfuntravel.com.vn</a>>:<u></u><u></u></p></span><div><div><span><p class="MsoNormal"><span style="font-size:11.0pt;font-family:"Calibri","sans-serif";color:#1f497d">Trước tiên anh hoàn thành phần tết Nguyên Đán cho xong trên VFT. Rồi sau đó em sẽ nói về vấn đề tết Dương Lịch sau.</span><u></u><u></u></p><p class="MsoNormal"><span style="font-size:11.0pt;font-family:"Calibri","sans-serif";color:#1f497d"> </span><u></u><u></u></p><p class="MsoNormal"><b><span style="font-size:10.0pt;font-family:"Tahoma","sans-serif"">From:</span></b><span style="font-size:10.0pt;font-family:"Tahoma","sans-serif""> khoa nguyen [mailto:<a href="mailto:codek365@gmail.com" target="_blank">codek365@gmail.com</a>] <br><b>Sent:</b> 11 Tháng Mười Hai 2015 11:02 SA<br><b>To:</b> Nguyễn Hoàng Thanh<br><b>Subject:</b> Event Dương Lịch</span><u></u><u></u></p><p class="MsoNormal"> <u></u><u></u></p></span><div><span><p class="MsoNormal">Hi Thanh,<u></u><u></u></p><div><p class="MsoNormal"> <u></u><u></u></p></div><div><p class="MsoNormal">Hôm qua anh có nghe báo là Event Dương Lịch chưa xong, em xác nhận giúp anh các phần nào chưa xong? Nếu chưa xong thì chính xác là phần nào và thời gian để làm, anh sẽ sắp xếp. Nếu xong thì xác nhận xong để anh biết. <u></u><u></u></p></div><div><p class="MsoNormal"><br clear="all"><u></u><u></u></p><div><div><div><div><div><div><div><div><p class="MsoNormal"><b><i><span style="font-size:10.0pt;color:#3d85c6">Best regards</span></i></b><u></u><u></u></p></div><div><p class="MsoNormal"><span style="font-size:9.5pt"> </span><u></u><u></u></p></div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">Khoa Nguyen </span></b><u></u><u></u></p><div><p class="MsoNormal"><b><i><span style="font-size:9.5pt;color:#3d85c6">Technology Developer</span></i></b><u></u><u></u></p></div><div><p class="MsoNormal"><span style="font-size:9.5pt"> </span><u></u><u></u></p></div><div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">C: (84)  934 141 331</span></b><u></u><u></u></p></div><div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">E: <a href="mailto:codek365@gmail.com" target="_blank">codek365@gmail.com</a></span></b><u></u><u></u></p></div><div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">W: </span><u><span style="color:#3d85c6"><a href="http://you-tek.net" target="_blank">http://you-tek.net</a></span></u></b><u></u><u></u></p></div><div><p class="MsoNormal"><b><span style="color:#3d85c6">Skype: coderfarm</span></b><u></u><u></u></p></div></div></div></div></div></div></div></div><p class="MsoNormal" style="margin-bottom:12.0pt"><u></u> <u></u></p><div><p class="MsoNormal"><span style="color:#999999">Sent with <a href="https://mailtrack.io/install?source=signature&lang=en&referral=codek365@gmail.com&idSignature=22" target="_blank">MailTrack</a></span><u></u><u></u></p></div></div></span><p class="MsoNormal"><span style="border:solid windowtext 1.0pt;padding:0cm"><img border="0" width="100" height="100" src="cid:~WRD000.jpg" alt="Description: Description: Image removed by sender."></span><u></u><u></u></p></div></div></div></div><p class="MsoNormal"><u></u> <u></u></p></div></div></div></blockquote></div><br></div></div></div>\r\n</div><br><br><br><br><div class="mt-signature"><font color="#999999" class="mt-signature-text">Sent with <a href="https://mailtrack.io/install?source=signature&lang=en&referral=codek365@gmail.com&idSignature=22" class="mt-install">MailTrack</a></font></div><img width="0" height="0" class="mailtrack-img" src="https://mailtrack.io/trace/mail/484e6aca12451355f3d329f4f1e7c496648cb111.png"></div>\r\n', '{"1":"~WRD000.jpg"}', 'inbox', 0, 0, 0, 0, 0, 1, 1),
(3, '2015-12-11 13:43:05', 'codek365@gmail.com', 'minhtran@vietfuntravel.com.vn', '=?UTF-8?B?RndkOiBFdmVudCBExrDGoW5nIEzhu4tjaA==?=', '<div dir="ltr"><br clear="all"><div><div class="gmail_signature"><div dir="ltr"><div><div dir="ltr"><div><div dir="ltr"><div><font size="2" color="#3d85c6"><i><b>Best regards</b></i></font></div><div style="font-size:12.8000001907349px"><span style="font-size:12.8000001907349px"><b><font color="#3d85c6"><br></font></b></span></div><b style="font-size:12.8000001907349px"><font color="#3d85c6">Khoa Nguyen </font></b><div style="font-size:12.8000001907349px"><b><i><font color="#3d85c6">Technology Developer</font></i></b></div><div style="font-size:12.8000001907349px"><b><i><font color="#3d85c6"><br></font></i></b></div><div style="font-size:12.8000001907349px"><b><font color="#3d85c6">C: (84)  934 141 331</font></b></div><div style="font-size:12.8000001907349px"><b><font color="#3d85c6">E: <a href="mailto:codek365@gmail.com" target="_blank">codek365@gmail.com</a></font></b></div><div><b><font color="#3d85c6"><span style="font-size:12.8000001907349px">W: </span><u><a href="http://you-tek.net" target="_blank">http://you-tek.net</a></u></font></b></div><div><b><font color="#3d85c6">Skype: coderfarm</font></b></div></div></div></div></div></div></div></div>\r\n<br><div class="gmail_quote">---------- Forwarded message ----------<br>From: <b class="gmail_sendername">Nguyễn Hoàng Thanh</b> <span dir="ltr"><<a href="mailto:thanhnh@vietfuntravel.com.vn">thanhnh@vietfuntravel.com.vn</a>></span><br>Date: 2015-12-11 13:37 GMT+07:00<br>Subject: RE: Event Dương Lịch<br>To: khoa nguyen <<a href="mailto:codek365@gmail.com">codek365@gmail.com</a>><br><br><br><div lang="EN-US" link="blue" vlink="purple"><div><p class="MsoNormal"><span style="font-size:11.0pt;font-family:"Calibri","sans-serif";color:#1f497d">Em không giải thích thêm với anh thêm vấn đề gì nữa. Event tết nguyên đán với anh còn lâu mới tới. còn với em đã quá trể so với tiến độ. Những cái team code đang làm hiện tại chỉ là 1/3 trong kế hoạch làm việc Event Tết Nguyên Đán thôi.<u></u><u></u></span></p><p class="MsoNormal"><span style="font-size:11.0pt;font-family:"Calibri","sans-serif";color:#1f497d"><u></u> <u></u></span></p><p class="MsoNormal"><b><span style="font-size:10.0pt;font-family:"Tahoma","sans-serif"">From:</span></b><span style="font-size:10.0pt;font-family:"Tahoma","sans-serif""> khoa nguyen [mailto:<a href="mailto:codek365@gmail.com" target="_blank">codek365@gmail.com</a>] <br><b>Sent:</b> 11 Tháng Mười Hai 2015 11:29 SA<span class=""><br><b>To:</b> Nguyễn Hoàng Thanh<br><b>Subject:</b> Re: Event Dương Lịch<u></u><u></u></span></span></p><p class="MsoNormal"><u></u> <u></u></p><div><p class="MsoNormal" style="margin-bottom:12.0pt">Em bị ngộ nhận à? "<span style="font-size:11.0pt;font-family:"Calibri","sans-serif";color:#1f497d">Như em đã nói. <b>XONG EVENT TẾT NGUYÊN ĐÁN"</b></span><b><span style="font-size:11.0pt;font-family:"Calibri","sans-serif";color:black"> </span></b><span style="font-size:11.0pt;font-family:"Calibri","sans-serif";color:black">là cái gì? VFT đang chạy Event Dương Lịch, Tết Nguyên Đán = Tết Âm Lịch, => còn xa lắm mới tới. Anh Tuân đang quan tâm "Tại sao Dương Lịch chưa xong?". Anh làm xong cái anh Tuân nói nên anh cần em giải thích tại sao chưa xong? Chưa xong chỗ nào để kinh doanh ra tiền trả lương, anh không rảnh để đi đấu đá vấn đề cá nhân! Minh và Nhựt yêu cầu anh giải trình lên trên, em làm không được anh sẽ tự làm. </span><br><br><br><u></u><u></u></p><div><p class="MsoNormal"><span style="color:#999999">Sent with <a href="https://mailtrack.io/install?source=signature&lang=en&referral=codek365@gmail.com&idSignature=22" target="_blank">MailTrack</a></span><u></u><u></u></p></div><p class="MsoNormal"><span style="border:solid windowtext 1.0pt;padding:0cm"><img border="0" width="100" height="100" src="cid:~WRD000.jpg" alt="Description: Image removed by sender."></span><u></u><u></u></p></div><div><span class=""><p class="MsoNormal"><br clear="all"><u></u><u></u></p><div><div><div><div><div><div><div><div><p class="MsoNormal"><b><i><span style="font-size:10.0pt;color:#3d85c6">Best regards</span></i></b><u></u><u></u></p></div><div><p class="MsoNormal"><span style="font-size:9.5pt"><u></u> <u></u></span></p></div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">Khoa Nguyen </span></b><u></u><u></u></p><div><p class="MsoNormal"><b><i><span style="font-size:9.5pt;color:#3d85c6">Technology Developer</span></i></b><span style="font-size:9.5pt"><u></u><u></u></span></p></div><div><p class="MsoNormal"><span style="font-size:9.5pt"><u></u> <u></u></span></p></div><div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">C: (84)  934 141 331</span></b><span style="font-size:9.5pt"><u></u><u></u></span></p></div><div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">E: <a href="mailto:codek365@gmail.com" target="_blank">codek365@gmail.com</a></span></b><span style="font-size:9.5pt"><u></u><u></u></span></p></div><div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">W: </span><u><span style="color:#3d85c6"><a href="http://you-tek.net" target="_blank">http://you-tek.net</a></span></u></b><u></u><u></u></p></div><div><p class="MsoNormal"><b><span style="color:#3d85c6">Skype: coderfarm</span></b><u></u><u></u></p></div></div></div></div></div></div></div></div><p class="MsoNormal"><u></u> <u></u></p></span><div><span class=""><p class="MsoNormal">2015-12-11 11:22 GMT+07:00 Nguyễn Hoàng Thanh <<a href="mailto:thanhnh@vietfuntravel.com.vn" target="_blank">thanhnh@vietfuntravel.com.vn</a>>:<u></u><u></u></p></span><div><div><span class=""><p class="MsoNormal"><span style="font-size:11.0pt;font-family:"Calibri","sans-serif";color:#1f497d">Như em đã nói. <b>XONG EVENT TẾT NGUYÊN ĐÁN</b> trên site VFT rồi mới tới vấn đề khác. Vấn đề cũ chưa giải quyết xong thì tại sao lại phanh khui vấn đề khác làm gì.</span><u></u><u></u></p><p class="MsoNormal"><span style="font-size:11.0pt;font-family:"Calibri","sans-serif";color:#1f497d"> </span><u></u><u></u></p><p class="MsoNormal"><b><span style="font-size:10.0pt;font-family:"Tahoma","sans-serif"">From:</span></b><span style="font-size:10.0pt;font-family:"Tahoma","sans-serif""> khoa nguyen [mailto:<a href="mailto:codek365@gmail.com" target="_blank">codek365@gmail.com</a>] <br><b>Sent:</b> 11 Tháng Mười Hai 2015 11:15 SA<br><b>To:</b> Nguyễn Hoàng Thanh<br><b>Subject:</b> Re: Event Dương Lịch</span><u></u><u></u></p><p class="MsoNormal"> <u></u><u></u></p></span><div><span class=""><p class="MsoNormal" style="margin-bottom:12.0pt">Có gì đó không ổn, Event nào thì làm hoàn thành Event đó. Nếu không xong thì báo không xong, nếu còn lỗi thì báo  còn lỗi, không thì báo là hoàn thành. Làm vậy 1 tay che trời à? Người ta nói anh <b>ngồi chơi</b> là anh không đồng ý! Cái nào ra cái đó và đây là việc trả lời với cấp trên em chứ không phải việc riêng em. Em xác nhận chưa thì cụ thể chưa cái gì, Event chạy để kinh doanh ra tiền chứ chứ không phải để "<b>SOI" </b>nhau, anh không có hứng thú. Đó cũng là yêu cầu của Minh và  Nhựt, nó phải trả lời cấp trên chứ không riêng gì anh phải làm. Nếu không thì 2 đứa nó cũng được xếp vào nhóm <b>"ăn không ngồi rồi", </b>tụi nó cần anh giải thích, và anh cần em giải thích.<b> </b><br> <u></u><u></u></p><div><p class="MsoNormal"><span style="color:#999999">Sent with <a href="https://mailtrack.io/install?source=signature&lang=en&referral=codek365@gmail.com&idSignature=22" target="_blank">MailTrack</a></span><u></u><u></u></p></div></span><p class="MsoNormal"><span style="border:solid windowtext 1.0pt;padding:0cm"><img border="0" width="100" height="100" src="cid:~WRD000.jpg" alt="Description: Description: Image removed by sender."></span><u></u><u></u></p></div><div><span class=""><p class="MsoNormal"><br clear="all"><u></u><u></u></p><div><div><div><div><div><div><div><div><p class="MsoNormal"><b><i><span style="font-size:10.0pt;color:#3d85c6">Best regards</span></i></b><u></u><u></u></p></div><div><p class="MsoNormal"><span style="font-size:9.5pt"> </span><u></u><u></u></p></div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">Khoa Nguyen </span></b><u></u><u></u></p><div><p class="MsoNormal"><b><i><span style="font-size:9.5pt;color:#3d85c6">Technology Developer</span></i></b><u></u><u></u></p></div><div><p class="MsoNormal"><span style="font-size:9.5pt"> </span><u></u><u></u></p></div><div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">C: (84)  934 141 331</span></b><u></u><u></u></p></div><div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">E: <a href="mailto:codek365@gmail.com" target="_blank">codek365@gmail.com</a></span></b><u></u><u></u></p></div><div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">W: </span><u><span style="color:#3d85c6"><a href="http://you-tek.net" target="_blank">http://you-tek.net</a></span></u></b><u></u><u></u></p></div><div><p class="MsoNormal"><b><span style="color:#3d85c6">Skype: coderfarm</span></b><u></u><u></u></p></div></div></div></div></div></div></div></div><p class="MsoNormal"> <u></u><u></u></p></span><div><span class=""><p class="MsoNormal">2015-12-11 11:07 GMT+07:00 Nguyễn Hoàng Thanh <<a href="mailto:thanhnh@vietfuntravel.com.vn" target="_blank">thanhnh@vietfuntravel.com.vn</a>>:<u></u><u></u></p></span><div><div><span class=""><p class="MsoNormal"><span style="font-size:11.0pt;font-family:"Calibri","sans-serif";color:#1f497d">Trước tiên anh hoàn thành phần tết Nguyên Đán cho xong trên VFT. Rồi sau đó em sẽ nói về vấn đề tết Dương Lịch sau.</span><u></u><u></u></p><p class="MsoNormal"><span style="font-size:11.0pt;font-family:"Calibri","sans-serif";color:#1f497d"> </span><u></u><u></u></p><p class="MsoNormal"><b><span style="font-size:10.0pt;font-family:"Tahoma","sans-serif"">From:</span></b><span style="font-size:10.0pt;font-family:"Tahoma","sans-serif""> khoa nguyen [mailto:<a href="mailto:codek365@gmail.com" target="_blank">codek365@gmail.com</a>] <br><b>Sent:</b> 11 Tháng Mười Hai 2015 11:02 SA<br><b>To:</b> Nguyễn Hoàng Thanh<br><b>Subject:</b> Event Dương Lịch</span><u></u><u></u></p><p class="MsoNormal"> <u></u><u></u></p></span><div><span class=""><p class="MsoNormal">Hi Thanh,<u></u><u></u></p><div><p class="MsoNormal"> <u></u><u></u></p></div><div><p class="MsoNormal">Hôm qua anh có nghe báo là Event Dương Lịch chưa xong, em xác nhận giúp anh các phần nào chưa xong? Nếu chưa xong thì chính xác là phần nào và thời gian để làm, anh sẽ sắp xếp. Nếu xong thì xác nhận xong để anh biết. <u></u><u></u></p></div><div><p class="MsoNormal"><br clear="all"><u></u><u></u></p><div><div><div><div><div><div><div><div><p class="MsoNormal"><b><i><span style="font-size:10.0pt;color:#3d85c6">Best regards</span></i></b><u></u><u></u></p></div><div><p class="MsoNormal"><span style="font-size:9.5pt"> </span><u></u><u></u></p></div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">Khoa Nguyen </span></b><u></u><u></u></p><div><p class="MsoNormal"><b><i><span style="font-size:9.5pt;color:#3d85c6">Technology Developer</span></i></b><u></u><u></u></p></div><div><p class="MsoNormal"><span style="font-size:9.5pt"> </span><u></u><u></u></p></div><div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">C: (84)  934 141 331</span></b><u></u><u></u></p></div><div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">E: <a href="mailto:codek365@gmail.com" target="_blank">codek365@gmail.com</a></span></b><u></u><u></u></p></div><div><p class="MsoNormal"><b><span style="font-size:9.5pt;color:#3d85c6">W: </span><u><span style="color:#3d85c6"><a href="http://you-tek.net" target="_blank">http://you-tek.net</a></span></u></b><u></u><u></u></p></div><div><p class="MsoNormal"><b><span style="color:#3d85c6">Skype: coderfarm</span></b><u></u><u></u></p></div></div></div></div></div></div></div></div><p class="MsoNormal" style="margin-bottom:12.0pt"> <u></u><u></u></p><div><p class="MsoNormal"><span style="color:#999999">Sent with <a href="https://mailtrack.io/install?source=signature&lang=en&referral=codek365@gmail.com&idSignature=22" target="_blank">MailTrack</a></span><u></u><u></u></p></div></div></span><p class="MsoNormal"><span style="border:solid windowtext 1.0pt;padding:0cm"><img border="0" width="100" height="100" src="cid:~WRD000.jpg" alt="Description: Description: Description: Image removed by sender."></span><u></u><u></u></p></div></div></div></div><p class="MsoNormal"> <u></u><u></u></p></div></div></div></div><p class="MsoNormal"><u></u> <u></u></p></div></div></div></div><br><br><br><br><div class="mt-signature"><font color="#999999" class="mt-signature-text">Sent with <a href="https://mailtrack.io/install?source=signature&lang=en&referral=codek365@gmail.com&idSignature=22" class="mt-install">MailTrack</a></font></div><img width="0" height="0" class="mailtrack-img" src="https://mailtrack.io/trace/mail/e195d6cedfe7436c0dc51653b0bf6b0af89c5e5b.png"></div>\r\n', '{"1":"~WRD000.jpg"}', 'inbox', 0, 0, 0, 0, 0, 1, 1),
(4, '2015-12-15 09:42:27', 'codek365@gmail.com', 'minhnhut@vietfuntravel.com.vn', 'TEAM-CODE.xlsx - Invitation to edit', 'I''ve shared an item with you:\r\n\r\nTEAM-CODE.xlsx\r\nhttps://docs.google.com/spreadsheets/d/10atMdl0oHmn3S6Gqr6KqAkNh-cj0E1JYUhfNsfS2e4w/edit?usp=sharing&invite=CILgrKkN&ts=566f7e13\r\n\r\nIt''s not an attachment -- it''s stored online. To open this item, just click  \r\nthe link above.\r\n', '', 'inbox', 0, 0, 0, 0, 0, 1, 1),
(5, '2015-12-15 10:28:34', 'codek365@gmail.com', 'minhnhut@vietfuntravel.com.vn', 'Project - Invitation to collaborate', 'SSd2ZSBzaGFyZWQgYW4gaXRlbSB3aXRoIHlvdToNCg0KUHJvamVjdA0KaHR0cHM6Ly9kcml2ZS5n\r\nb29nbGUuY29tL2ZvbGRlcnZpZXc/aWQ9MEI0VWM5NXdIX092bFNqbHlUMmN0UWxBeWFITSZ1c3A9\r\nc2hhcmluZyZpbnZpdGU9Q0t1Z29KRUImdHM9NTY2Zjg4ZTINCg0KSXQncyBub3QgYW4gYXR0YWNo\r\nbWVudCAtLSBpdCdzIHN0b3JlZCBvbmxpbmUuIFRvIG9wZW4gdGhpcyBpdGVtLCBqdXN0IGNsaWNr\r\nICANCnRoZSBsaW5rIGFib3ZlLg0KDQpOaOG6rW4gUHJvamVjdCBuw6ggbeG6pXkga3UNCg==', '', 'inbox', 0, 0, 0, 0, 0, 1, 1),
(6, '2016-01-05 09:31:23', 'codek365@gmail.com', 'minhnhut@vietfuntravel.com.vn', 'Re: hgcfvhgfhgfhg', 'helo\r\n\r\n*Best regards*\r\n\r\n*Khoa Nguyen *\r\n*Technology Developer*\r\n\r\n*C: (84)  934 141 331*\r\n*E: codek365@gmail.com <codek365@gmail.com>*\r\n*W: http://you-tek.net <http://you-tek.net>*\r\n*Skype: coderfarm*\r\n\r\nOn Tue, Jan 5, 2016 at 9:29 AM, Nhut Minh <minhnhut@vietfuntravel.com.vn>\r\nwrote:\r\n\r\n> hgjyghjgf\r\n>\r\n', '', 'inbox', 0, 0, 0, 0, 0, 1, 1),
(7, '2016-01-05 09:34:23', 'codek365@gmail.com', 'minhnhut@vietfuntravel.com.vn', 'Re: 35215241362', 'xczvfxdvxcvzxc\r\n\r\n*Best regards*\r\n\r\n*Khoa Nguyen *\r\n*Technology Developer*\r\n\r\n*C: (84)  934 141 331*\r\n*E: codek365@gmail.com <codek365@gmail.com>*\r\n*W: http://you-tek.net <http://you-tek.net>*\r\n*Skype: coderfarm*\r\n\r\nOn Tue, Jan 5, 2016 at 9:33 AM, Nhut Minh <minhnhut@vietfuntravel.com.vn>\r\nwrote:\r\n\r\n> ;.,l;;p\r\n>\r\n', '', 'inbox', 0, 0, 0, 0, 0, 1, 1),
(8, '2016-01-05 09:36:12', 'codek365@gmail.com', 'minhnhut@vietfuntravel.com.vn', 'sdfsfdsf', 'dsfsdfsd\r\n*Best regards*\r\n\r\n*Khoa Nguyen *\r\n*Technology Developer*\r\n\r\n*C: (84)  934 141 331*\r\n*E: codek365@gmail.com <codek365@gmail.com>*\r\n*W: http://you-tek.net <http://you-tek.net>*\r\n*Skype: coderfarm*\r\n', '', 'inbox', 0, 0, 0, 0, 0, 1, 1),
(9, '2016-01-05 09:57:25', 'codek365@gmail.com', 'minhnhut@vietfuntravel.com.vn', 'Re: sdfsfdsf', 'ok\r\n\r\n\r\n*Best regards*\r\n\r\n*Khoa Nguyen *\r\n*Technology Developer*\r\n\r\n*C: (84)  934 141 331*\r\n*E: codek365@gmail.com <codek365@gmail.com>*\r\n*W: http://you-tek.net <http://you-tek.net>*\r\n*Skype: coderfarm*\r\n\r\nOn Tue, Jan 5, 2016 at 9:57 AM, Nhut Minh <minhnhut@vietfuntravel.com.vn>\r\nwrote:\r\n\r\n> ghjvgjv\r\n>\r\n> On Tue, Jan 5, 2016 at 9:36 AM, khoa nguyen <codek365@gmail.com> wrote:\r\n>\r\n>> dsfsdfsd\r\n>> *Best regards*\r\n>>\r\n>> *Khoa Nguyen *\r\n>> *Technology Developer*\r\n>>\r\n>> *C: (84)  934 141 331*\r\n>> *E: codek365@gmail.com <codek365@gmail.com>*\r\n>> *W: http://you-tek.net <http://you-tek.net>*\r\n>> *Skype: coderfarm*\r\n>>\r\n>\r\n>\r\n', '', 'inbox', 0, 0, 0, 0, 0, 1, 1),
(10, '2016-01-05 17:40:10', 'codek365@gmail.com', 'minhnhut@vietfuntravel.com.vn', 'CRM - Invitation to comment', 'I''ve shared an item with you:\r\n\r\nCRM\r\nhttps://docs.google.com/spreadsheets/d/1XWQaqvsIGyyVfi4Ha-3TCpFnPMp7rCcTac-gyTZM0IQ/edit?usp=sharing&ts=568b9d8a\r\n\r\nIt''s not an attachment -- it''s stored online. To open this item, just click  \r\nthe link above.\r\n', '', 'inbox', 0, 0, 0, 0, 0, 1, 1),
(11, '2016-01-08 09:27:53', 'codek365@gmail.com', 'minhnhut@vietfuntravel.com.vn', 'phan_cong_thay_the_leader - Invitation to edit', 'SSd2ZSBzaGFyZWQgYW4gaXRlbSB3aXRoIHlvdToNCg0KcGhhbl9jb25nX3RoYXlfdGhlX2xlYWRl\r\ncg0KaHR0cHM6Ly9kb2NzLmdvb2dsZS5jb20vc3ByZWFkc2hlZXRzL2QvMWE4MGFxdFl6QlNoRjh6\r\nTlgyWEQzam9vVEpQbnJQMXJSM3RYNC1mX0VkOFkvZWRpdD91c3A9c2hhcmluZyZpbnZpdGU9Q04z\r\ndno4QU0mdHM9NTY4ZjFlYTkNCg0KSXQncyBub3QgYW4gYXR0YWNobWVudCAtLSBpdCdzIHN0b3Jl\r\nZCBvbmxpbmUuIFRvIG9wZW4gdGhpcyBpdGVtLCBqdXN0IGNsaWNrICANCnRoZSBsaW5rIGFib3Zl\r\nLg0KDQrEkMOieSBsw6AgYuG6o24gcGjDom4gY8O0bmcgY8O0bmcgdmnhu4djIHThuqFtIHRo4bud\r\naS4gU+G6vSBi4buVIHh1bmcgdGjDqm0ga2hpIG5o4bqtbiDEkcaw4bujYyBjw6FjICANCnnDqnUg\r\nY+G6p3UgbeG7m2kuIFRyb25nIGzDumMgYW5oIHbhuq9uZyBt4bq3dCwgY8OhYyBi4bqhbiBz4bq9\r\nIHRoYXkgYW5oIHjhu60gbMOtIG5o4buvbmcgduG6pW4gxJHhu4EgIA0KdHJvbmcgc2hlZXQgbsOg\r\neS4NCg==', '', 'inbox', 0, 0, 0, 0, 0, 1, 1),
(12, '2016-01-08 09:28:51', 'codek365@gmail.com', 'minhnhut@vietfuntravel.com.vn', 'phan_cong_thay_the_leader - Invitation to edit', 'I''ve shared an item with you:\r\n\r\nphan_cong_thay_the_leader\r\nhttps://docs.google.com/spreadsheets/d/1a80aqtYzBShF8zNX2XD3jooTJPnrP1rR3tX4-f_Ed8Y/edit?usp=sharing&invite=C3vz8AM&tsV8f1ee3\r\n\r\nIt''s not an attachment -- it''s stored online. To open this item, just click\r\nthe link above.\r\n', '', 'inbox', 0, 0, 0, 0, 0, 1, 1),
(13, '2016-01-08 09:27:53', 'codek365@gmail.com', 'minhnhut@vietfuntravel.com.vn', 'phan_cong_thay_the_leader - Invitation to edit', 'SSd2ZSBzaGFyZWQgYW4gaXRlbSB3aXRoIHlvdToNCg0KcGhhbl9jb25nX3RoYXlfdGhlX2xlYWRl\r\ncg0KaHR0cHM6Ly9kb2NzLmdvb2dsZS5jb20vc3ByZWFkc2hlZXRzL2QvMWE4MGFxdFl6QlNoRjh6\r\nTlgyWEQzam9vVEpQbnJQMXJSM3RYNC1mX0VkOFkvZWRpdD91c3A9c2hhcmluZyZpbnZpdGU9Q04z\r\ndno4QU0mdHM9NTY4ZjFlYTkNCg0KSXQncyBub3QgYW4gYXR0YWNobWVudCAtLSBpdCdzIHN0b3Jl\r\nZCBvbmxpbmUuIFRvIG9wZW4gdGhpcyBpdGVtLCBqdXN0IGNsaWNrICANCnRoZSBsaW5rIGFib3Zl\r\nLg0KDQrEkMOieSBsw6AgYuG6o24gcGjDom4gY8O0bmcgY8O0bmcgdmnhu4djIHThuqFtIHRo4bud\r\naS4gU+G6vSBi4buVIHh1bmcgdGjDqm0ga2hpIG5o4bqtbiDEkcaw4bujYyBjw6FjICANCnnDqnUg\r\nY+G6p3UgbeG7m2kuIFRyb25nIGzDumMgYW5oIHbhuq9uZyBt4bq3dCwgY8OhYyBi4bqhbiBz4bq9\r\nIHRoYXkgYW5oIHjhu60gbMOtIG5o4buvbmcgduG6pW4gxJHhu4EgIA0KdHJvbmcgc2hlZXQgbsOg\r\neS4NCg==', '', 'inbox', 0, 0, 0, 0, 0, 1, 1),
(14, '2016-01-08 09:28:51', 'codek365@gmail.com', 'minhnhut@vietfuntravel.com.vn', 'phan_cong_thay_the_leader - Invitation to edit', 'I''ve shared an item with you:\r\n\r\nphan_cong_thay_the_leader\r\nhttps://docs.google.com/spreadsheets/d/1a80aqtYzBShF8zNX2XD3jooTJPnrP1rR3tX4-f_Ed8Y/edit?usp=sharing&invite=CN3vz8AM&ts=568f1ee3\r\n\r\nIt''s not an attachment -- it''s stored online. To open this item, just click  \r\nthe link above.\r\n', '', 'inbox', 0, 0, 0, 0, 0, 1, 1),
(15, '2016-01-08 09:28:51', 'codek365@gmail.com', 'minhnhut@vietfuntravel.com.vn', 'phan_cong_thay_the_leader - Invitation to edit', 'I''ve shared an item with you:\r\n\r\nphan_cong_thay_the_leader\r\nhttps://docs.google.com/spreadsheets/d/1a80aqtYzBShF8zNX2XD3jooTJPnrP1rR3tX4-f_Ed8Y/edit?usp=sharing&invite=CN3vz8AM&ts=568f1ee3\r\n\r\nIt''s not an attachment -- it''s stored online. To open this item, just click  \r\nthe link above.\r\n', '', 'inbox', 0, 0, 0, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_tranminhvf_gmail_com_send_email`
--

CREATE TABLE `email_tranminhvf_gmail_com_send_email` (
  `id` int(6) UNSIGNED NOT NULL,
  `user_id` int(2) DEFAULT NULL,
  `email_out` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `from_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cc` text COLLATE utf8_unicode_ci,
  `subject` text COLLATE utf8_unicode_ci,
  `body` text COLLATE utf8_unicode_ci,
  `attach` text COLLATE utf8_unicode_ci,
  `transfer` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `folder_id` int(5) DEFAULT NULL,
  `folder_segment` int(5) DEFAULT NULL,
  `folder_child_id` int(5) DEFAULT NULL,
  `folder_child_segment` int(5) DEFAULT NULL,
  `start` int(2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_tranminhvf_gmail_com_send_email`
--

INSERT INTO `email_tranminhvf_gmail_com_send_email` (`id`, `user_id`, `email_out`, `date`, `from_email`, `to_email`, `cc`, `subject`, `body`, `attach`, `transfer`, `folder_id`, `folder_segment`, `folder_child_id`, `folder_child_segment`, `start`, `status`) VALUES
(1, 54, 'minhnhut@vietfuntravel.com.vn', '2015-11-14 09:54:35', 'tranminhvf@gmail.com', 'codek365@gmail.com', '', 'Sự cố sau khi chuyển hạ tầng', '<p>reasdasdasdsadsa</p><pre><span style="font-family: Arial,Helvetica;"><strong><span style="color: #2969B0;">Nguyễn Minh Nhựt</span></strong>\nEmail: <em><span style="color: #B8312F;">minhnhut0079@gmail.com</span></em>\n<span style="color: #7C706B;">Phone: 0039403403</span>\nAddress: <strong><span style="color: #2969B0;">192 Nguyen Cong Tru, Q. 1</span></strong>\n------- IT Support ---------</span></pre>', '""', 'send', NULL, NULL, NULL, NULL, 1, 1),
(2, 54, 'minhnhut@vietfuntravel.com.vn', '2015-11-14 09:56:49', 'tranminhvf@gmail.com', 'tranminh1236@gmail.com', '[tranminh1236@yahoo.com,]', 'efe', '<p><br></p><pre><span style="font-family: Arial,Helvetica;"><strong><span style="color: #2969B0;">ewgbvewvửebvgwbvewbveswvwevNguyễn Minh Nhựt</span></strong>\nEmail: <em><span style="color: #B8312F;">minhnhut0079@gmail.com</span></em>\n<span style="color: #7C706B;">Phone: 0039403403</span>\nAddress: <strong><span style="color: #2969B0;">192 Nguyen Cong Tru, Q. 1</span></strong>\n------- IT Support ---------</span></pre>', '[{"size":"5"},{"size":"5"}]', 'send', NULL, NULL, NULL, NULL, 1, 1),
(3, 31, 'minhnhut@vietfuntravel.com.vn', '2016-01-06 10:26:42', 'tranminhvf@gmail.com', 'codek365@gmail.com', '', 'Re: sdfsfdsf', '<p><br></p><p>tgiky8o7</p>', '[{"size":"463","name":"Screenshot from 2015-12-05 09:10:54_1452050760.png"}]', 'send', NULL, NULL, NULL, NULL, 1, 1),
(4, 54, 'minhnhut@vietfuntravel.com.vn', '2016-01-11 08:20:33', 'tranminhvf@gmail.com', 'minhnhut0079@gmail.com', '[minhnhut@vietfuntravel.com.vn,]', 'Gui email kem theo host girl', '<p>Gửi ảnh host girl cho đồng bào cả nước xem chơi cho vui</p><pre><span style="font-family: Arial,Helvetica;"><strong><span style="color: #2969B0;">Nguyễn Minh Nhựt</span></strong>\nEmail: <em><span style="color: #B8312F;">minhnhut0079@gmail.com</span></em>\n<span style="color: #7C706B;">Phone: 0039403403</span>\nAddress: <strong><span style="color: #2969B0;">192 Nguyen Cong Tru, Q. 1</span></strong>\n------- IT Support ---------</span></pre>', '[{"size":"8"}]', 'send', NULL, NULL, NULL, NULL, 1, 1),
(5, 54, 'minhnhut@vietfuntravel.com.vn', '2016-01-11 08:38:55', 'tranminhvf@gmail.com', 'minhnhut0079@gmail.com', '[minhnhut0079@vietfuntravel.com.vn,]', 'Gui anh hotgirl', '<p>Gửi ảnh hotgirl cho bà con cô bác, đồng bào cả nước cùng xem và đánh gía</p><pre><span style="font-family: Arial,Helvetica;"><strong><span style="color: #2969B0;">Nguyễn Minh Nhựt</span></strong>\nEmail: <em><span style="color: #B8312F;">minhnhut0079@gmail.com</span></em>\n<span style="color: #7C706B;">Phone: 0039403403</span>\nAddress: <strong><span style="color: #2969B0;">192 Nguyen Cong Tru, Q. 1</span></strong>\n------- IT Support ---------</span></pre>', '[{"size":"8"}]', 'send', NULL, NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(9) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `name_display` varchar(255) NOT NULL,
  `email` varchar(96) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `code` varchar(40) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `group_id`, `username`, `password`, `salt`, `firstname`, `lastname`, `name_display`, `email`, `phone`, `image`, `code`, `ip`, `status`, `date_added`) VALUES
(1, 85, 'adminis', '5515dc9b881e8ea0b8bf97654bd846cdb51563d3', '27d348ae3', 'Admin', 'Viet Fun', 'Viet Fun Travel', 'sales@vietfuntravel.com.vn', '0907016652', '', '', '127.0.0.1', 1, '2015-08-18 08:43:08'),
(3, 85, 'nhthanh', '546cdfed8ab5f87a25e9361a7766b1cd', '', 'Hoang', 'Thanh', 'Thanh - Viet Fun Travel', 'hoangthanhnguyen@yahoo.com', '0', '', '', '118.69.63.110', 1, '2015-08-18 08:43:04'),
(22, 85, 'linh', '149b1c5c20b5f08b6854d0989d93663268141e67', 'fd9d4e259', 'linh', 'linh', 'Linh - Viet Fun Travel', 'linh@vietfuntravel.com.vn', '0', '', '', '', 1, '2015-08-18 08:41:39'),
(7, 85, 'khanhly1990', 'ba6011bf864e91029c6911314468252d', '', 'Khanh Ly', 'Ly', 'Ly - Viet Fun Travel', 'lykhanh1990@gmail.com', '0', '', '', '118.69.63.110', 1, '2015-08-18 08:42:34'),
(6, 85, 'phong', 'fb52524ea1de4959764f3ce3f614ef7f', '', 'Phạm Thị', 'Hồng', 'Hồng - Viet Fun Travel', 'reservation@vietfuntravel.com.vn', '01203812085', 'data/chuky/hong.jpg', '', '118.69.55.190', 0, '2015-08-18 08:42:59'),
(26, 85, 'hanle', '7c0b57cec46e7b93faaf115ecb9a2afe451f676b', '0d9fe30e5', 'Lê', 'Nguyễn Ngọc Hân', 'Ngọc Hân - Viet Fun Travel', 'hanle@vietfuntravel.com.vn', '0939906709', 'data/chuky/ngoc-han.jpg', '', '113.173.205.160', 1, '2015-08-18 08:40:45'),
(11, 85, 'phue', 'aa77a17d27fb69e70db553866a0551f0', '', 'Phan ', 'Thị Kim Huệ', 'Huệ - Viet Fun Travel', 'hue@vietfuntravel.com.vn', '01224009984', 'data/chuky/hue.jpg', '', '42.118.168.190', 1, '2015-08-18 08:42:27'),
(14, 85, 'admins', 'be9135631002357c5a43e4c5729ebffa8cbc3894', 'e3f9a10c4', 'Nguyen', 'Yen', 'Quyến - Viet Fun Travel', 'sales@vietfuntravel.com', '0', '', '', '118.69.63.110', 1, '2015-08-18 08:43:16'),
(15, 85, 'thaocao', 'bf32d197f35684b9c075b9eb9823ee0c', '', 'Cao', 'Thị Thanh Thảo', 'Thảo - Viet Fun Travel', 'thao@vietfuntravel.com.vn', '0972990206', 'data/chuky/thao.jpg', '', '118.69.55.190', 1, '2015-08-18 08:41:57'),
(16, 85, 'thutrang', '1e184ab537f0d6d6d94bbb5790b1fee0', '', 'Lê', 'Thị Thu Trang', 'Trang - Viet Fun Travel', 'trang@vietfuntravel.com.vn', '0907702822', 'data/chuky/trang.jpg', '', '118.69.55.190', 1, '2015-08-18 08:41:51'),
(24, 85, 'xuyenduong', '6b8a8e63dce18897db9228c4d0abd77623aaa5dd', '9c0d1a796', 'Dương', 'Thị Mỹ Xuyên', 'Dương Thị Mỹ Xuyên', 'xuyenduong@vietfuntravel.com.vn', '0938636817', 'data/chuky/my-xuyen.jpg', '', '118.69.55.190', 1, '2015-08-18 08:41:21'),
(19, 85, 'nthnga', '7a93876fe901cb5ad2955fa3a97a2e4e4318a1c1', '9b21f17c3', 'Huyen', 'Nga', 'administrator', 'nthnga@vietfuntravel.com.vn', '0', '', '', '118.69.63.110', 1, '2015-08-18 08:41:44'),
(23, 85, 'myxuyen', 'fed9bf6a4bd5286e24069a90d8a8c9c824f7c218', 'e9a963bdf', 'myxuyen', 'myxuyen', 'myxuyen', 'myxuyen@yahoo.com', '0', '', '', '118.69.55.190', 0, '2015-08-18 08:41:33'),
(25, 85, 'thinguyen', 'd592ba6e67c974b15765d4e4c9a7a2431eb56375', '260f00485', 'Nguyễn', 'Thanh Hồng Thi', 'Hồng Thi - Viet Fun Travel', 'thinguyen@vietfuntravel.com.vn', '01697233177', 'data/chuky/hong-thi.jpg', '', '118.69.55.190', 1, '2015-08-18 08:40:52'),
(27, 85, 'minhthien', '8813922cbeeb43623f35f48aa6a49140a80db435', 'da5d87769', 'Minh', 'Thien', 'minh thien', 'chuaco@yahoo.com', '0', '', '', '118.69.63.110', 1, '2015-08-18 08:40:33'),
(28, 85, 'tranminh1236', '202cb962ac59075b964b07152d234b70', 'd33b2ce7c', 'tran', 'minh', 'tranminh', 'tranminh1236@gmail.com', '01664245149', '', '', '127.0.0.1', 1, '2015-09-04 09:50:37'),
(31, 82, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 'Tran', 'Minh', 'Tran Minh', 'tranminh1236@gmail.com', '01664245149', '', '', '', 1, '0000-00-00 00:00:00'),
(58, 85, 'minhnhut', '827ccb0eea8a706c4c34a16891f84e7b', '', 'Nguyen Minh', 'Nhut', 'minhnhut', 'minhnhut0079@vietfuntravel.com.vn', '090900909', '', '', '', 1, '2015-10-23 10:29:47'),
(54, 82, 'admintop', '827ccb0eea8a706c4c34a16891f84e7b', '', 'Admin', 'top', 'admintop', 'admintop@vietfuntravel.com.vn', '0909409330', '', '', '', 1, '2015-09-24 09:10:29'),
(57, 85, 'minhnguyen', '827ccb0eea8a706c4c34a16891f84e7b', '', 'Tran Minh', 'Nguyen', 'minhnguyen', 'minhnhut0079@vietfuntravel.com.vn', '09090940394', '', '', '', 1, '2015-10-14 10:40:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_asign_email`
--
ALTER TABLE `email_asign_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_asign_table`
--
ALTER TABLE `email_asign_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_draft`
--
ALTER TABLE `email_draft`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_filter`
--
ALTER TABLE `email_filter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_folder`
--
ALTER TABLE `email_folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_folder_child`
--
ALTER TABLE `email_folder_child`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_folder_child_segment`
--
ALTER TABLE `email_folder_child_segment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_folder_segment`
--
ALTER TABLE `email_folder_segment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_gnjwnegj_ngnjev_receive_inbox`
--
ALTER TABLE `email_gnjwnegj_ngnjev_receive_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_gnjwnegj_ngnjev_send_email`
--
ALTER TABLE `email_gnjwnegj_ngnjev_send_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_hh_gh_receive_inbox`
--
ALTER TABLE `email_hh_gh_receive_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_hh_gh_send_email`
--
ALTER TABLE `email_hh_gh_send_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_minhnhut0079_vietfuntravel_com_receive_inbox`
--
ALTER TABLE `email_minhnhut0079_vietfuntravel_com_receive_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_minhnhut0079_vietfuntravel_com_send_email`
--
ALTER TABLE `email_minhnhut0079_vietfuntravel_com_send_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_minhnhut0079_vietfuntravel_com_vn_receive_inbox`
--
ALTER TABLE `email_minhnhut0079_vietfuntravel_com_vn_receive_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_minhnhut0079_vietfuntravel_com_vn_send_email`
--
ALTER TABLE `email_minhnhut0079_vietfuntravel_com_vn_send_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_minhnhut_vietfuntravel_com_receive_inbox`
--
ALTER TABLE `email_minhnhut_vietfuntravel_com_receive_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_minhnhut_vietfuntravel_com_send_email`
--
ALTER TABLE `email_minhnhut_vietfuntravel_com_send_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_minhnhut_vietfuntravel_com_vn_receive_inbox`
--
ALTER TABLE `email_minhnhut_vietfuntravel_com_vn_receive_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_minhnhut_vietfuntravel_com_vn_send_email`
--
ALTER TABLE `email_minhnhut_vietfuntravel_com_vn_send_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_outbound`
--
ALTER TABLE `email_outbound`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_recycle`
--
ALTER TABLE `email_recycle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_signed`
--
ALTER TABLE `email_signed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_system`
--
ALTER TABLE `email_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_tranminhvf_gmail_com_receive_inbox`
--
ALTER TABLE `email_tranminhvf_gmail_com_receive_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_tranminhvf_gmail_com_send_email`
--
ALTER TABLE `email_tranminhvf_gmail_com_send_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_asign_email`
--
ALTER TABLE `email_asign_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `email_asign_table`
--
ALTER TABLE `email_asign_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `email_draft`
--
ALTER TABLE `email_draft`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4117;
--
-- AUTO_INCREMENT for table `email_filter`
--
ALTER TABLE `email_filter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `email_folder`
--
ALTER TABLE `email_folder`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `email_folder_child`
--
ALTER TABLE `email_folder_child`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `email_folder_child_segment`
--
ALTER TABLE `email_folder_child_segment`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `email_folder_segment`
--
ALTER TABLE `email_folder_segment`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `email_gnjwnegj_ngnjev_receive_inbox`
--
ALTER TABLE `email_gnjwnegj_ngnjev_receive_inbox`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_gnjwnegj_ngnjev_send_email`
--
ALTER TABLE `email_gnjwnegj_ngnjev_send_email`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_hh_gh_receive_inbox`
--
ALTER TABLE `email_hh_gh_receive_inbox`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_hh_gh_send_email`
--
ALTER TABLE `email_hh_gh_send_email`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_minhnhut0079_vietfuntravel_com_receive_inbox`
--
ALTER TABLE `email_minhnhut0079_vietfuntravel_com_receive_inbox`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `email_minhnhut0079_vietfuntravel_com_send_email`
--
ALTER TABLE `email_minhnhut0079_vietfuntravel_com_send_email`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `email_minhnhut0079_vietfuntravel_com_vn_receive_inbox`
--
ALTER TABLE `email_minhnhut0079_vietfuntravel_com_vn_receive_inbox`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_minhnhut0079_vietfuntravel_com_vn_send_email`
--
ALTER TABLE `email_minhnhut0079_vietfuntravel_com_vn_send_email`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_minhnhut_vietfuntravel_com_receive_inbox`
--
ALTER TABLE `email_minhnhut_vietfuntravel_com_receive_inbox`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `email_minhnhut_vietfuntravel_com_send_email`
--
ALTER TABLE `email_minhnhut_vietfuntravel_com_send_email`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `email_minhnhut_vietfuntravel_com_vn_receive_inbox`
--
ALTER TABLE `email_minhnhut_vietfuntravel_com_vn_receive_inbox`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `email_minhnhut_vietfuntravel_com_vn_send_email`
--
ALTER TABLE `email_minhnhut_vietfuntravel_com_vn_send_email`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_outbound`
--
ALTER TABLE `email_outbound`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `email_recycle`
--
ALTER TABLE `email_recycle`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_signed`
--
ALTER TABLE `email_signed`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `email_system`
--
ALTER TABLE `email_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `email_tranminhvf_gmail_com_receive_inbox`
--
ALTER TABLE `email_tranminhvf_gmail_com_receive_inbox`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `email_tranminhvf_gmail_com_send_email`
--
ALTER TABLE `email_tranminhvf_gmail_com_send_email`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
