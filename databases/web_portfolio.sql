-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2024 at 04:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `certificate_name` varchar(255) DEFAULT NULL,
  `issuer` varchar(255) DEFAULT NULL,
  `date_issued` date DEFAULT NULL,
  `certificate_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `user_id`, `certificate_name`, `issuer`, `date_issued`, `certificate_url`) VALUES
(1, 1, ' Python and Statistics for Financial Analysis', 'The Hong Kong University of Science and\r\n Technology', '2024-01-21', 'coursera.pdf'),
(2, 2, 'AWS Course Completion Certificate', 'AWS training and certification', '2024-05-17', 'AWS training.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `start_year` year(4) NOT NULL,
  `end_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `school_name`, `start_year`, `end_year`) VALUES
(1, 1, 'SMK Negeri 1 Pungging', '2019', '2023'),
(2, 2, 'SMA GIKI 1 Surabaya', '2019', '2023'),
(3, 1, 'State University of Surabaya', '2023', '2027'),
(4, 2, 'State University of Surabaya', '2023', '2027');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `project_name`, `description`, `photo`, `url`) VALUES
(1, 1, 'Voli Solo DulDul', 'A 3D volleyball game built with Unity, where players test their skills in performing perfect underhand passes as the ball speeds across the court. Simple, fun, and immersive—dive in and feel the game!', 'Voli.png', 'http://example.com/portfolio'),
(2, 2, 'Penalty Game', 'Proyek ini adalah game tentang sepak bola VR, yang fokus pada tendangan penalti. Ada 2 mode: penjaga gawang atau penendang.', 'pinalti.png', 'https://drive.google.com/drive/folders/1eJu1AHSASD_IKk-HI1e3yx3FgChYezHp?usp=drive_link');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `category`, `name`, `logo_url`) VALUES
(1, 1, 'Programming Language', 'HTML', 'html.png'),
(2, 1, 'Programming Language', 'CSS', 'css.png'),
(3, 1, 'Framework', 'Bootstrap', 'bootstrap.png'),
(6, 1, 'Programming Language', 'PHP', 'php.png'),
(7, 1, 'Programming Language', 'Python', 'python.png'),
(8, 1, 'Programming Language', 'Javascript', 'js.png'),
(9, 1, 'Programming Language', 'C#', 'csharp.png'),
(10, 1, 'Framework', 'Flask', 'flask.png'),
(11, 1, 'Programming Language', 'mysql', 'mysql.png'),
(12, 1, 'Operating system', 'Linux', 'linux.png'),
(13, 2, 'Programming Language', 'Pyhton', 'python.png'),
(14, 2, 'Programming Language', 'C#', 'csharp.png'),
(15, 2, 'Framework', 'Laravel', 'laravel.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `bio`, `photo`) VALUES
(1, 'Nur Kholis Yusuf Rabbani', 'Driven by curiosity for the unconventional and the unexplained, I find fascination in exploring ideas that challenge logic and stretch the boundaries of understanding. For me, complexity and uncertainty are not obstacles but opportunities to uncover patterns, expand perspectives, and embrace the beauty of the unknown.', 'nur.jpg'),
(2, 'Ivan Budi Saputra', 'Back-end developer specializing in APIs and databases.', 'ivan.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
