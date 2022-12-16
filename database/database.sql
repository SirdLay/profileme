-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2019 at 09:34 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profilemd_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `book_time` datetime NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `details` text,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 15, '', '', '', '2019-04-21 22:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `details` text,
  `company` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `details` text,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT 'free'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `google_ads`
--

CREATE TABLE `google_ads` (
  `id` int(11) NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `ad_type` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `code` mediumtext,
  `image` varchar(500) DEFAULT NULL,
  `thumb` varchar(500) DEFAULT NULL,
  `img_url` varchar(500) DEFAULT NULL,
  `is_open_new_window` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `max_impressions` int(11) DEFAULT NULL,
  `max_clicks` int(11) DEFAULT NULL,
  `banner_categories` int(11) DEFAULT NULL,
  `sections` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `google_fonts`
--

CREATE TABLE `google_fonts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `google_fonts`
--

INSERT INTO `google_fonts` (`id`, `name`, `slug`) VALUES
(1, 'Poppins', 'poppins'),
(2, 'Lato', 'lato'),
(3, 'Lobster', 'lobster'),
(4, 'Bree Serif', 'bree-serif'),
(5, 'Cabin', 'cabin'),
(6, 'Cookie', 'cookie'),
(7, 'Montserrat', 'montserrat'),
(8, 'Ubuntu', 'ubuntu'),
(9, 'Raleway', 'raleway'),
(10, 'Roboto', 'roboto'),
(11, 'Nunito', 'nunito'),
(12, 'Molengo', 'molengo'),
(13, 'Sarabun', 'sarabun'),
(14, 'Open Sans', 'open-sans'),
(15, 'Source Sans Pro', 'source-sans-pro'),
(16, 'PT Sans', 'pt-sans'),
(17, 'Noto Sans', 'noto-sans'),
(18, 'Roboto Mono', 'roboto-mono'),
(19, 'Muli', 'muli'),
(20, 'Arimo', 'arimo'),
(21, 'Fira Sans', 'fira-sans'),
(22, 'Noto Serif', 'noto-serif'),
(23, 'Work Sans', 'work-sans'),
(24, 'Quicksand', 'quicksand'),
(25, 'Dosis', 'dosis'),
(26, 'Rubik', 'rubik'),
(27, 'Oxygen', 'oxygen'),
(28, 'Hind', 'hind'),
(29, 'Josefin Sans', 'josefin-sans'),
(30, 'Noto Sans KR', 'noto-sans-kr'),
(31, 'Libre Franklin', 'libre-franklin'),
(32, 'Nunito Sans', 'nunito-sans'),
(33, 'Karla', 'karla'),
(34, 'Hind Siliguri', 'hind-siliguri'),
(35, 'Mukta Malar', 'mukta-malar'),
(36, 'Merriweather Sans', 'merriweather-sans'),
(37, 'Kanit', 'kanit'),
(38, 'Questrial', 'questrial'),
(39, 'Comfortaa', 'comfortaa'),
(40, 'Maven Pro', 'maven-pro'),
(41, 'Signika', 'signika'),
(42, 'Noto Sans TC', 'noto-sans-tc'),
(43, 'Varela Round', 'varela-round');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `bill_type` varchar(255) DEFAULT NULL,
  `is_special` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `slug`, `price`, `bill_type`, `is_special`) VALUES
(1, 'Free', 'free', '0.00', 'yearly', 0),
(2, 'Pro', 'pro', '25.00', 'yearly', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `details` longtext CHARACTER SET utf8,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `puid` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package` varchar(255) NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `details` text,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_category`
--

CREATE TABLE `portfolio_category` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolio_category`
--

INSERT INTO `portfolio_category` (`id`, `user_id`, `name`, `slug`, `status`) VALUES
(1, 15, 'Web development', 'web-development', 1),
(2, 15, 'Mockup Design', 'mockup-design', 1),
(3, 15, 'Software Design', 'software-design', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_services`
--

CREATE TABLE `product_services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `details` text,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `details` text,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `site_title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `footer_about` text CHARACTER SET utf8,
  `admin_email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `pagination_limit` int(11) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `google_analytics` mediumtext,
  `site_color` varchar(255) DEFAULT NULL,
  `site_font` varchar(255) DEFAULT NULL,
  `layout` int(11) DEFAULT NULL,
  `enable_captcha` int(11) NOT NULL DEFAULT '0',
  `enable_registration` int(11) NOT NULL,
  `captcha_site_key` varchar(255) DEFAULT NULL,
  `captcha_secret_key` varchar(255) DEFAULT NULL,
  `paypal_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_title`, `favicon`, `logo`, `keywords`, `description`, `footer_about`, `admin_email`, `mobile`, `copyright`, `pagination_limit`, `facebook`, `instagram`, `twitter`, `linkedin`, `google_analytics`, `site_color`, `site_font`, `layout`, `enable_captcha`, `enable_registration`, `captcha_site_key`, `captcha_secret_key`, `paypal_email`) VALUES
(1, 'Resumer', 'Personal resume & vcard', 'uploads/thumbnail/images_thumb-100x33.png', 'uploads/medium/images_medium-189x63.png', 'resume,cv,vcard', 'Personal resume & vcard', 'Freelancers and entrepreneurs use about.me to grow their audience and get more clients.', 'john@gmail.com', '', '© 2018 All rights reserved.', 0, 'https://www.facebook.com/', 'facebook.com', '', 'linkedin', '', '', '', 0, 0, 1, '6Ld0SpcUAAAAAFpKkQaTwbENLukNG_hMpPpckHT9', '6Ld0SpcUAAAAAAj-48ToNW4ceBXTdEIOxyhtPMtM', 'yourpaypal@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `site_contacts`
--

CREATE TABLE `site_contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `skill_level` int(11) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `slider_order` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `tag_slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `feedback` text,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(100) DEFAULT 'user',
  `account_type` varchar(255) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT 'registered',
  `phone` varchar(255) DEFAULT NULL,
  `address` text,
  `skype` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `envato` varchar(255) DEFAULT NULL,
  `upwork` varchar(255) DEFAULT NULL,
  `fiverr` varchar(255) DEFAULT NULL,
  `freelancer` varchar(255) DEFAULT NULL,
  `site_color` varchar(255) DEFAULT NULL,
  `site_font` varchar(500) DEFAULT NULL,
  `layout` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `about_me` varchar(5000) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `available_days` varchar(255) DEFAULT NULL,
  `google_analytics` text,
  `enable_portfolio` int(11) DEFAULT NULL,
  `enable_blog` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `designation`, `slug`, `email`, `user_name`, `password`, `role`, `account_type`, `user_type`, `phone`, `address`, `skype`, `whatsapp`, `facebook`, `twitter`, `linkedin`, `instagram`, `envato`, `upwork`, `fiverr`, `freelancer`, `site_color`, `site_font`, `layout`, `image`, `thumb`, `status`, `about_me`, `cv`, `available_days`, `google_analytics`, `enable_portfolio`, `enable_blog`, `created_at`) VALUES
(1, 'Admin', '', 'admin', 'admin@gmail.com', 'admin', '$2y$10$WGtHuZwiORfNEY28E/1nVOVOqkP7fsTYN4NnScNitlgcmf9VAgFS.', 'admin', '', 'registered', '', '', '', '', '', '', '', NULL, '', '', '', '', '', 'poppins', '', 'uploads/medium/sdfs_medium-263x263.jpg', 'uploads/thumbnail/sdfs_thumb-150x150.jpg', 1, 'test', 'uploads/files/Mehedi.rp.pdf', NULL, '', NULL, NULL, '2018-09-06 13:54:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_ads`
--
ALTER TABLE `google_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_fonts`
--
ALTER TABLE `google_fonts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_category`
--
ALTER TABLE `portfolio_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_services`
--
ALTER TABLE `product_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_contacts`
--
ALTER TABLE `site_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `google_ads`
--
ALTER TABLE `google_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `google_fonts`
--
ALTER TABLE `google_fonts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio_category`
--
ALTER TABLE `portfolio_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_services`
--
ALTER TABLE `product_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_contacts`
--
ALTER TABLE `site_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
