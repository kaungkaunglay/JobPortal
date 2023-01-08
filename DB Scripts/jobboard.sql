-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 05:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(3) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminname`, `email`, `mypassword`, `created_at`) VALUES
(1, 'Kaung Kaung', 'admin@gmail.com', '$2y$10$DXDzjqfu3.bR0oIbQoKtg.WdTWrkAwePUico6Z75GMX1S1Kc2GODq', '2022-12-31 11:02:27'),
(2, 'UwU', 'uwu@gmail.com', '$2y$10$nLngJnL.RAm5rEkCd4fQl.Ez4r06wR9o/9XtxaQQ610NwyyqhjHju', '2022-12-31 16:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Design', '2022-12-28 12:21:01'),
(2, 'development', '2022-12-28 12:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(3) NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `job_region` varchar(200) NOT NULL,
  `job_type` varchar(200) NOT NULL,
  `vacancy` int(3) NOT NULL,
  `job_category` varchar(200) NOT NULL,
  `experience` varchar(200) NOT NULL,
  `salary` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `application_deadline` varchar(200) NOT NULL,
  `job_description` text NOT NULL,
  `responsibilities` text NOT NULL,
  `education_experience` text NOT NULL,
  `other_benifits` text NOT NULL,
  `company_email` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `company_id` int(3) NOT NULL,
  `company_image` varchar(200) NOT NULL,
  `status` int(3) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_title`, `job_region`, `job_type`, `vacancy`, `job_category`, `experience`, `salary`, `gender`, `application_deadline`, `job_description`, `responsibilities`, `education_experience`, `other_benifits`, `company_email`, `company_name`, `company_id`, `company_image`, `status`, `created_at`) VALUES
(1, 'Developer', 'Where', 'Part Time', 12, 'design', '3-6 years', '$50k - $70k', 'Male', '20-12-2023', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dolorem dolorum eos fugiat, iusto libero odio possimus quo quod rem suscipit tempore? At explicabo ipsa labore, modi nulla ratione similique?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dolorem dolorum eos fugiat, iusto libero odio possimus quo quod rem suscipit tempore? At explicabo ipsa labore, modi nulla ratione similique?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dolorem dolorum eos fugiat, iusto libero odio possimus quo quod rem suscipit tempore? At explicabo ipsa labore, modi nulla ratione similique?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dolorem dolorum eos fugiat, iusto libero odio possimus quo quod rem suscipit tempore? At explicabo ipsa labore, modi nulla ratione similique?', 'kk8225248@gmail.com', 'Aung Khant Zin', 3, 'tset1.png', 1, '2022-12-26 15:49:03'),
(2, 'Developer', 'Anywhere', 'Part Time', 12, 'design', '1-3 years', '$70k - $100k', 'Male', '20-12-2023', 'Kaung Kaung', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dolorem dolorum eos fugiat, iusto libero odio possimus quo quod rem suscipit tempore? At explicabo ipsa labore, modi nulla ratione similique?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dolorem dolorum eos fugiat, iusto libero odio possimus quo quod rem suscipit tempore? At explicabo ipsa labore, modi nulla ratione similique?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dolorem dolorum eos fugiat, iusto libero odio possimus quo quod rem suscipit tempore? At explicabo ipsa labore, modi nulla ratione similique?', 'johmoe@gmail.com', 'John Moe', 7, '04yO1RQQQj7e5kEow66iE52-31.webp', 0, '2022-12-26 16:13:56'),
(3, 'Graphic Designer', 'Anywhere', 'Part Time', 12, 'design', '1-3 years', '$50k - $70k', 'Female', '20-12-2023', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dolorem dolorum eos fugiat, iusto libero odio possimus quo quod rem suscipit tempore? At explicabo ipsa labore, modi nulla ratione similique?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dolorem dolorum eos fugiat, iusto libero odio possimus quo quod rem suscipit tempore? At explicabo ipsa labore, modi nulla ratione similique?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dolorem dolorum eos fugiat, iusto libero odio possimus quo quod rem suscipit tempore? At explicabo ipsa labore, modi nulla ratione similique?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis dolorem dolorum eos fugiat, iusto libero odio possimus quo quod rem suscipit tempore? At explicabo ipsa labore, modi nulla ratione similique?', 'johmoe@gmail.com', 'John Moe', 7, '04yO1RQQQj7e5kEow66iE52-31.webp', 0, '2022-12-26 16:14:25'),
(4, 'game developer', 'Anywhere', 'Part Time', 12, 'design', '1-3 years', '$50k - $70k', 'Male', '20-12-2023', 'sadfadsf', 'sdfadsfsd', 'fsdfasf', 'adfadsf', 'johmoe@gmail.com', 'John Moe', 7, '04yO1RQQQj7e5kEow66iE52-31.webp', 0, '2022-12-28 12:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` int(3) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `cv` varchar(200) NOT NULL,
  `worker_id` int(3) NOT NULL,
  `job_id` int(3) NOT NULL,
  `job_title` varchar(200) NOT NULL,
  `company_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `username`, `email`, `cv`, `worker_id`, `job_id`, `job_title`, `company_id`, `created_at`) VALUES
(4, 'Aung Khant Zin', 'kk8225248@gmail.com', 'received_584680439652971_1655127036.gif', 3, 2, 'Developer', 7, '2022-12-31 02:58:06');

-- --------------------------------------------------------

--
-- Table structure for table `password_rest`
--

CREATE TABLE `password_rest` (
  `id` int(3) NOT NULL,
  `temp_password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_rest`
--

INSERT INTO `password_rest` (`id`, `temp_password`, `email`, `created_at`) VALUES
(28, '435b817df0a988a20b648c108e017e8ab2ff443881eadab20236d4af1c06e5d1', 'aungkhantzin881@gmail.com', '2023-01-06 10:46:51'),
(29, '4e682612a681046b8097571a74554169ffcfd5cce56933ac765ef8171ff1a9c0', 'aungkhantzin881@gmail.com', '2023-01-06 10:47:36');

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobs`
--

CREATE TABLE `saved_jobs` (
  `id` int(3) NOT NULL,
  `job_id` int(3) NOT NULL,
  `worker_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `searches`
--

CREATE TABLE `searches` (
  `id` int(3) NOT NULL,
  `keyword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `searches`
--

INSERT INTO `searches` (`id`, `keyword`, `created_at`) VALUES
(1, 'designer', '2022-12-31 10:08:04'),
(2, 'designer', '2022-12-31 10:21:42'),
(3, 'Developer', '2022-12-31 10:21:48'),
(4, 'Developer', '2022-12-31 10:21:55'),
(5, 'software', '2022-12-31 10:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `cv` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `bio` varchar(500) DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `linkedin` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `type`, `mypassword`, `img`, `cv`, `title`, `bio`, `facebook`, `twitter`, `linkedin`, `created_at`) VALUES
(1, 'kk8225248@gmail.com', 'aungkhantzin881@gmail.com', '', '1a0562db1dd5e68ce98d7d7c00268b176264014f60d58f51fcf4386de42ebb8e', '11482733491610445586_1.webp', 'NULL', 'NULL', '', '', '', '', '2022-12-23 16:19:10'),
(2, 'kk8225248@gmail.com', 'aungkhantzin881@gmail.com', '', '1a0562db1dd5e68ce98d7d7c00268b176264014f60d58f51fcf4386de42ebb8e', 'web-coding.png', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-23 16:21:37'),
(3, 'Aung Khant Zin', 'kk8225248@gmail.com', 'Worker', '$2y$10$ZyGIPPaG5Sr178uUOx9/I.yeKWyzqGpVk9Vv4y4d2sgPN4Hb/xSzu', '11482733491610445586_1.webp', 'received_584680439652971_1655127036.gif', 'pull stack developer', 'I\'m software engineer with over two year experiences.', 'https://facebook.com/fkadskf', 'https://twitter.com/loveisgood', 'https://linkedin.com/dsjfsd', '2022-12-23 16:21:58'),
(4, 'AungKhantZin', 'aungkhantzin881@gmail.com', 'Worker', '1a0562db1dd5e68ce98d7d7c00268b176264014f60d58f51fcf4386de42ebb8e', '', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-24 05:40:07'),
(6, 'Aung Khant Zin', 'kk8225248@gmail.com', 'Worker', '$2y$10$DXDzjqfu3.bR0oIbQoKtg.WdTWrkAwePUico6Z75GMX1S1Kc2GODq', 'web-coding.png', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-24 05:46:14'),
(7, 'John Moe', 'johmoe@gmail.com', 'Company', '$2y$10$o8Xs4/I.8KKpzwuvp79EIeIs6OqbDEhxVSZCgV.M4pyS6S1e15pwm', '04yO1RQQQj7e5kEow66iE52-31.webp', 'NULL', 'NULL', 'Company Owner', '', '', '', '2022-12-25 15:47:59'),
(8, 'Guest', 'guest@gmail.com', 'Worker', '$2y$10$xjmgdxfcAzY9f4VVsTUqjeUBU/6d7BO9Igkucmjnd0Jcz898L/Fem', '14450421.jpg', 'viber_image_2021-12-25_13-51-42-442.jpg', 'just a title', 'I\'m fool', '', '', '', '2022-12-25 16:03:38'),
(9, 'KaungKaung', 'lw936421@gmail.com', 'Worker', '$2y$10$gEQiOARGgRc8GZyojkO5ougpASRgt.2JKmEgeP/cOuCGKVEbuW8Zu', 'viber_image_2022-01-17_14-25-58-792.jpg', 'photo_2022-05-24_05-43-19.jpg', '', 'Some ', '', '', '', '2022-12-25 16:09:33'),
(10, 'desers60', 'desers60@yahoo.com', 'Worker', '$2y$10$0sXq0nbBHABY0VyHpD8Y8ecsrpAaOBVGINUS4lLkQy2GzHda/NIqi', 'download (2).png', '', 'sadfds', 'dsfadsf', '', '', '', '2022-12-25 16:12:46'),
(11, 'Rainbow', 'rainbow@gmail.com', 'Worker', '$2y$10$BkAe5N/vi/jLbiH5fJKkTutq3IK6e/JkPGQJvM42e94vUBIfzLfoK', 'test2.png', '', '', 'Hi, It\'s me Hi, I\'m problem , it\'s me', '', '', '', '2022-12-25 16:34:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_rest`
--
ALTER TABLE `password_rest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searches`
--
ALTER TABLE `searches`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `password_rest`
--
ALTER TABLE `password_rest`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `searches`
--
ALTER TABLE `searches`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
