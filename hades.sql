-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2019 at 10:51 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hades`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(400) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created`) VALUES
(1, 'Red', 'red', 'this is the reds', '2019-10-25 09:14:50'),
(2, 'Blue', 'blue', 'this is blue', '2019-10-25 09:15:12'),
(3, 'Black', 'black', 'hasdas', '2019-10-25 09:15:25'),
(4, 'White', 'white', 'sadasads', '2019-10-25 09:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `link` varchar(400) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `subject` varchar(400) NOT NULL,
  `body` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `is_member` tinyint(4) NOT NULL DEFAULT '0',
  `is_read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(400) NOT NULL,
  `is_image` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `keyword` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `body`, `keyword`, `description`, `modified`) VALUES
(1, 'About', 'about', '<h2>Peraturan Perundang-Undangan</h2>\r\n\r\n<p>Silakan mendownload peraturan perundang-undangan di sini :</p>\r\n\r\n<p>1.&nbsp;<strong><a href=\"http://pusat.baznas.go.id/wp-content/perpu/Undang-Undang%20No%2023%20Tahun%202011%20tentang%20Pengelolaan%20Zakat.pdf\" rel=\"noopener\" target=\"_blank\">Undang-Undang Nomor 23 Tahun 2011 Tentang Pengelolaan Zakat</a></strong><br />\r\n2.&nbsp;<strong><a href=\"http://pusat.baznas.go.id/wp-content/perpu/PP%20Nomor%2014%20Tahun%202014%20tentang%20Pengelolaan%20Zakat.pdf\" rel=\"noopener\" target=\"_blank\" title=\"PP Zakat\">Peraturan Pemerintah Nomor 14 Tahun 2014 Tentang Pelaksanaan Undang-Undang Nomor 23 Tahun 2011</a></strong><br />\r\n3.&nbsp;<strong><a href=\"http://diy.baznas.go.id/wp-content/uploads/2016/04/Inpres-No-3-Tahun-2014-Pengumpulan-Zakat.pdf\">Instruksi Presiden No. 3 Tahun 2014</a></strong><br />\r\n4.&nbsp;<strong><a href=\"http://pusat.baznas.go.id/wp-content/perpu/II.2.%20KMA%20118%20Thn%202014%20Pembentukan%20BAZNAS%20Provinsi.pdf\">Keputusan Menteri Agama Republik Indonesia Nomor 118 Tahun 2014 Tentang Pembentukan BAZNAS Provinsi</a></strong><br />\r\n5.&nbsp;<strong><a href=\"http://pusat.baznas.go.id/wp-content/perpu/III.2.%20Peraturan%20DJP%20No.%20PER-33%20PJ%202011.pdf\">Peraturan Dirjen Pajak Nomor PER-33/PJ/2011</a></strong></p>\r\n\r\n<p>6. Surat Edaran Gubernur Daerah Istimewa Yogyakarta Nomor 451/2252 Tahun 2009</p>\r\n', '', '', '2019-10-29 08:27:25'),
(2, 'Contact', 'contact', '<p>asdas</p>\r\n', 'sad', 'das', '2019-10-31 04:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(400) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `body`, `published`, `image`, `created`, `modified`) VALUES
(1, 5, 1, 'Cake PHP Rapid Development', '<p>zdsssssss dzcccccccccccc</p>\r\n', 0, '0754080bursa-saham780x390.jpg', '2019-10-29 08:13:04', '2019-10-29 08:13:04'),
(3, 5, 2, 'Codeigniter', '<p>dggggggggggggggggggggggggggg</p>\r\n', 0, 'OTY4NzE1NzE3MDk5MDY.jpg', '2019-10-29 08:14:18', '2019-10-29 08:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `posts_tags`
--

CREATE TABLE `posts_tags` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts_tags`
--

INSERT INTO `posts_tags` (`post_id`, `tag_id`) VALUES
(1, 2),
(3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(400) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `description`) VALUES
(1, 'metalcore', 'metalcore', 'dadas'),
(2, 'grindcore', 'grindcore', 'dsadsa'),
(3, 'slam', 'slam', 'da'),
(4, 'trash', 'trash', 'cc'),
(5, 'heavy', 'heavy', 'dd'),
(6, 'djent', 'djent', 'da');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(400) NOT NULL,
  `password` varchar(400) NOT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `ip` varchar(60) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  `avatar` varchar(400) NOT NULL,
  `role` enum('admin','owner','member') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `phone`, `is_active`, `ip`, `created`, `modified`, `avatar`, `role`) VALUES
(5, 'Porus Ruby', 'porusruby@gmail.com', '$2y$10$sX6waSHfTerse0rj57zxz.mtIu0PuevT9E1zwi0hUiTvnO48R6JZ6', '083156576176', 1, '081.227.234', '2019-10-11 05:56:27', '2019-10-31 08:14:35', 'Podo-Avatar2-02.png', 'admin'),
(17, 'Yoyopo', 'yoyopo@gmail.com', '$2y$10$40Wfu/b5RHrfAyIupY0Jf.uEoYOwZIFrLpu9tkWRTM3WYIlE6ZRAi', '083156576176', 0, NULL, '2019-11-01 08:44:32', '2019-11-01 08:44:32', 'yoyopo.png', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD PRIMARY KEY (`post_id`,`tag_id`),
  ADD KEY `tag_key` (`tag_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD CONSTRAINT `post_key` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `tag_key` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
