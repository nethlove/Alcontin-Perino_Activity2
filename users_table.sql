-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2025 at 08:40 PM
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
-- Database: `alcontin_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `user_id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `first_name`, `last_name`, `email`, `gender`, `user_address`, `date_created`, `username`, `password`) VALUES
(1, 'Derron', 'Sudworth', 'dsudworth0@dropbox.com', 'Male', '390 Lake View Junction', '2020-01-16', 'dsudworth0', 'bnmv'),
(2, 'Abby', 'Lodemann', 'alodemann1@people.com.cn', 'Male', '7 Vernon Plaza', '2025-10-02', 'alodemann1', 'jklj'),
(3, 'Imojean', 'Wortley', 'iwortley2@eepurl.com', 'Female', '65 Ridge Oak Circle', '2016-10-21', 'iwortley2', 'uiop'),
(4, 'Cirstoforo', 'Bolam', 'cbolam3@quantcast.com', 'Male', '7051 Farwell Crossing', '2025-10-15', 'cbolam3', 'qwerty\"?`'),
(5, 'Darya', 'Tither', 'dtither4@state.gov', 'Female', '596 Prairie Rose Park', '2025-07-16', 'dtither4', 'qwert'),
(6, 'Erma', 'Leuty', 'eleuty5@domainmarket.com', 'Female', '5 Hintze Place', '2025-10-05', 'eleuty5', 'passnako'),
(7, 'Leelah', 'Revan', 'lrevan6@mlb.com', 'Female', '940 Artisan Road', '2025-08-11', 'lrevan6', 'sureoy'),
(8, 'Carroll', 'Scopham', 'cscopham7@trellian.com', 'Male', '60 Dakota Alley', '2025-08-11', 'cscopham7', 'ayawba'),
(9, 'Rog', 'Basnall', 'rbasnall8@odnoklassniki.ru', 'Male', '599 Schurz Avenue', '2025-08-18', 'rbasnall8', 'lol'),
(10, 'Reinhard', 'Lung', 'rlung9@goodreads.com', 'Male', 'Bogo City', '2016-09-20', 'rlung9', 'shesh'),
(15, 'Kenneth', 'Love', 'kennethalcontin07@gmail.com', 'Male', 'Caduawan,Tabogon,Cebu', '2025-10-23', 'kentoy', 'kennethlove'),
(16, 'Jhonwill', 'Perino', 'jhonwill@gmail.com', 'Male', 'Bogo City', '2025-10-23', 'poypoy', 'jhonwill');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
