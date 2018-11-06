-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2018 at 01:54 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `create_at`) VALUES
(11, 6, 'Technology', '2018-03-28 04:12:24'),
(12, 7, 'School', '2018-07-02 10:03:00'),
(13, 6, 'Development', '2018-07-09 10:37:29'),
(22, 8, 'Work', '2018-07-25 01:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `body`, `created_at`) VALUES
(1, 44, 'mawrin', 'masdasd@gmail.com', 'hahahaha', '2018-07-02 10:03:25'),
(2, 58, 'marwin', 'adsgsadg@yahoo.com', 'adgasa', '2018-07-04 07:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL COMMENT 'Upload Date',
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Unblock, 0=Block'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_status` varchar(15) NOT NULL,
  `author` varchar(30) NOT NULL,
  `deleted_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `body`, `post_image`, `meta_title`, `meta_description`, `updated_at`, `created_at`, `post_status`, `author`, `deleted_status`) VALUES
(247, 13, 36, 'p111111111111111', 'p111111111111111', '<p>1111111111111111</p>\r\n', '9a8033d312873170ca68ca1dbf77d6e8.jpg', 'p111111111111111', '1111111111111', '2018-07-26 07:52:14', '2018-07-26 07:52:14', 'published', '1111111111111111', 0),
(250, 13, 36, 'p22222222222222', 'p22222222222222', '<p>222222222222222222222</p>\r\n', 'automation-testing.jpg', 'p22222222222222', '22222222222222', '2018-07-26 07:53:03', '2018-07-26 07:53:03', 'published', '222222222222222222222', 0),
(251, 13, 36, 'p33333333333333', 'p33333333333333', '<p>333333333333333333</p>\r\n', 'biometric-small.jpg', 'p33333333333333', '333333333333333333', '2018-07-26 07:53:20', '2018-07-26 07:53:20', 'published', '33333333333333333', 0),
(252, 13, 36, 'p444444444444444444', 'p444444444444444444', '<p>p4444444444444444444</p>\r\n', 'Delphox-Designs-iOS-8-Desktop-Wallpaper-12.jpg', 'p444444444444444444', 'p4444444444444444', '2018-07-26 07:53:35', '2018-07-26 07:53:35', 'published', '444444444444444444444444444', 0),
(254, 13, 36, 'p55555555555555555', 'p55555555555555555', '<p>555555555555555</p>\r\n', 'image-clean-code.png', 'p55555555555555555', '55555555555', '2018-07-26 07:54:18', '2018-07-26 07:54:18', 'published', '555555555555555555555555555555', 0),
(255, 13, 36, 'p66666666666666666', 'p66666666666666666', '<p>666666666666666666666</p>\r\n', 'empoy2.png', 'p66666666666666666', '6666666666666666', '2018-07-26 08:11:12', '2018-07-26 07:54:36', 'draft', '6666666666666666666', 0),
(256, 13, 36, 'p777777777777777', 'p777777777777777', '<p>7777777777777</p>\r\n', '9588457.png', 'p777777777777777', '7777777777777', '2018-07-26 08:11:57', '2018-07-26 07:54:51', 'draft', '777777777777777777777777777', 0),
(257, 13, 36, 'd1111111111111111111111111111111111', 'd1111111111111111111111111111111111', '<p>111111111111111</p>\r\n', 'img-2.jpg', 'd1111111111111111111111111111111111', '11111111111111', '2018-07-26 07:56:34', '2018-07-26 07:56:34', 'draft', '11111111111111', 0),
(258, 13, 36, 'd22222222222222222', 'd22222222222222222', '<p>2222222222222222222222</p>\r\n', 'img-3.jpg', 'd22222222222222222', '2222222222222222222', '2018-07-30 11:39:41', '2018-07-26 07:57:15', 'draft', '22222222222222222', 1),
(259, 13, 36, 'd333333333333', 'd333333333333', '<p>3333333333333333</p>\r\n', 'img-4.jpg', 'd333333333333', '333333333333333', '2018-07-30 11:20:09', '2018-07-26 07:57:33', 'draft', '333333333333333', 1),
(260, 13, 36, 'd444444444444444444', 'd444444444444444444', '<p>4444444444444444444</p>\r\n', 'Congrats.png', 'd444444444444444444', '44444444444444444444444', '2018-07-27 01:53:17', '2018-07-26 07:58:05', 'published', '444444444444444444444', 0),
(261, 13, 36, 'd666666666', 'd666666666', '<p>66666666666666666666</p>\r\n', 'innovation-small.jpg', 'd666666666', '666666666666666', '2018-07-26 09:14:11', '2018-07-26 07:58:35', 'published', '666666666666666666', 0),
(263, 13, 36, 'd7777777777', 'd7777777777', '<p>7777777777777777777777777</p>\r\n', '9a8033d312873170ca68ca1dbf77d6e8.jpg', 'd7777777777', '777777777777777', '2018-07-27 01:54:10', '2018-07-26 07:59:22', 'published', '777777777777777777777', 0),
(264, 13, 36, 'sssssssssssss', 'sssssssssssss', '<p>sssssssssssss</p>\r\n', 'empty.jpg', 'sssssssssssss', 'sssssssssssssss', '2018-07-27 05:36:35', '2018-07-27 05:36:35', 'published', 'sssssssssssssssssssssssssss', 0),
(265, 13, 36, 'What is Lorem Ipsum?11', 'What-is-Lorem-Ipsum11', '<p>asdasdasd</p>\r\n', 'blog1.jpg', 'What is Lorem Ipsum?11', '', '2018-07-27 05:48:13', '2018-07-27 05:48:13', 'published', 'asdasdasdasd', 0),
(266, 13, 36, '11111111111111', '11111111111111', '<p>1111111111111</p>\r\n', 'Congrats.png', '11111111111111', '', '2018-07-30 11:23:43', '2018-07-27 05:48:27', 'published', '111111111111111111', 1),
(267, 13, 36, 'aaaaaaaaaaaa', 'aaaaaaaaaaaa', '<p>aaaaaaaaaaa</p>\r\n', 'download.jpg', 'aaaaaaaaaaaa', 'aaaaaaaaaa', '2018-07-30 10:16:52', '2018-07-27 06:11:09', 'published', 'aaaaaaaa', 1),
(268, 13, 36, 'ggggggggggggggg', 'ggggggggggggggg', '<p>asdasdasd</p>\r\n', 'code-2620118_960_720.jpg', 'ggggggggggggggg', '4', '2018-07-30 10:02:54', '2018-07-27 06:22:26', 'published', 'gggggggggggg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `zipcode`, `email`, `username`, `password`, `registered_date`) VALUES
(6, 'marwin', '6000', 'marwin@gmail.com', 'marwin', '38a5d9570abdc35a5cf3588a926130c6', '2018-03-28 10:41:47'),
(7, 'marwin', '6000', 'keeper@gmail.com', 'keeper', '6cc61f49c2ae633aed091f22d7868752', '2018-07-02 17:55:39'),
(36, 'Jason', '', '', 'Jason', 'c4ca4238a0b923820dcc509a6f75849b', '2018-07-25 14:10:10'),
(53, 'asd', NULL, NULL, 'asd', '7815696ecbf1c96e6894b779456d330e', '2018-07-27 13:08:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
