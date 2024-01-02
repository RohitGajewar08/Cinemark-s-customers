-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 07:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinemark`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `director` varchar(100) NOT NULL,
  `release_year` varchar(50) NOT NULL,
  `budget` varchar(50) NOT NULL,
  `runtime` varchar(50) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `title`, `description`, `director`, `release_year`, `budget`, `runtime`, `rating`, `genre`, `image`) VALUES
(16, 'Salaar: Cease Fire - Part 1', 'Brace yourself for an extraordinary tale of rebellion filled with power-packed action.', 'Prashanth Neel', '2023', '400 Crore', '2hr 55m', '8.4', 'Action, Thriller', 'uploads/6594465e8e669.jpg'),
(17, 'Dunki', 'Four friends from a sleepy little village in Punjab share a common dream: to go to England. Their problem is that they have neither the visa nor the ticket. A soldier alights from a train one day, and their lives change. He gives them a soldier`s promise: He will take them to the land of their dreams. What follows is a hilarious and heartwarming tale of a perilous journey through the desert and the sea, but most crucially through the hinterlands of their mind.\r\n\r\nA journey that tests and defines', 'Rajkumar Hirani', '2023', '120 Crore', '2hr 41m', '7.4', 'Comedy, Drama', 'uploads/659449b19f866.jpeg'),
(18, 'Sam Bahadur', 'Sam Bahadur is a tribute to Field Marshal Sam HFJ Manekshaw, MC, India`s first Field Marshal and a legendary Army General. His career witnessed the shaping of India`s geopolitical borders, and his life was marked by significant milestones, from fighting in World War II to being the Chief of Army Staff during the 1971 Indo-Pakistan war, that led to the creation of Bangladesh.\r\n', 'Meghna Gulzar', '2023', '55 Crore', '2h 30m', '8.9', 'Biography, Drama', 'uploads/65944bc6ade46.jpg'),
(19, 'Animal', 'This is the story of a son whose love for his father knows no bounds. As their bond begins to fracture, a chain of extraordinary events unfold causing the son to undergo a remarkable transformation consumed by a thirst for vengeance.', 'Sandeep Reddy Vanga', '2023', '100 Crore', '3h 21m', '8.2', 'Action, Crime, Drama', 'uploads/65944c73740db.jpg'),
(20, '12th Fail', 'Based on Anurag Pathak`s bestselling novel of the same name, 12th Fail depicts the true story of an IPS officer Manoj Kumar Sharma hailing from a small town in Chambal, who fearlessly embraced the idea of restarting his academic journey and reclaiming his destiny at a place where millions of students attempt for the world`s toughest competitive exam, UPSC.\r\n', 'Vidhu Vinod Chopra', '2023', '20 Crore', '2h 27m', '9.5', 'd', 'uploads/65944d468d42f.jpeg'),
(21, 'Jhimma 2', 'The gang reunites for yet another excursion filled with adventure and self-discovery but this time with some unexpected twists. They come across new challenges that seem unsurpassable, but with the right people by your side, nothing seems impossible.', 'Hemant Dhome', '2023', '8 Crore', '2h 17m', '8.9', 'Comedy, Drama, Family', 'uploads/65944daba7f76.jpg'),
(22, 'Aquaman and the Lost Kingdom', 'When an ancient power is unleashed, Aquaman must forge an uneasy alliance with an unlikely ally to protect Atlantis, and the world, from irreversible devastation.', 'James Wan', '2023', '170 Crore', '2h 4m', '7.7', 'Action, Adventure, Fantasy, Superhero', 'uploads/65944e43aa74d.jpg'),
(23, '1134', 'Inspired from real ATM robberies that took place in Hyderabad, 1134 is the story of a series of sequential ATM robberies that have a pattern. Will the robbers be caught?', 'Ssharadh Chandra', '2024', 'NA', '1h 43m', 'NA', 'Crime, Thriller', 'uploads/65944eb01ce34.jpg'),
(24, 'The Diplomat', 'Based on an incredible true story, some wars are fought outside the battlefield and a true hero needs no weapon.', 'Shivam Nair', '2024', 'NA', 'NA', 'NA', 'Action, Thriller', 'uploads/65944f2773227.jpg'),
(25, 'Fighter', 'A high-octane cinematic spectacle starring Hrithik Roshan and Deepika Padukone in the lead, Fighter is directed by Siddharth Anand and produced by Viacom18 Studios, Mamta Anand, Ramon Chibb and Anku Pande.', 'Siddhart Anand', '2024', 'NA', 'NA', 'NA', 'Action, Thriller', 'uploads/65944f77781b8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`) VALUES
(1, 'pranav', 'Pranav@1', 'Pranav', 'Narkhede', 'pranav@gmail.com'),
(2, 'john_doe', 'JohnDoe@123', 'John', 'Doe', 'john.doe@email.com'),
(3, 'alice_smith', 'AliceSmith@456', 'Alice', 'Smith', 'alice.smith@email.com'),
(4, 'bob_jones', 'BobJones@789', 'Bob', 'Jones', 'bob.jones@email.com'),
(5, 'emily_wilson', 'EmilyWilson@987', 'Emily', 'Wilson', 'emily.wilson@email.com'),
(6, 'sam_brown', 'SamBrown@654', 'Sam', 'Brown', 'sam.brown@email.com'),
(7, 'linda_clark', 'LindaClark@321', 'Linda', 'Clark', 'linda.clark@email.com'),
(8, 'michael_white', 'MichaelWhite@987', 'Michael', 'White', 'michael.white@email.com'),
(9, 'susan_taylor', 'SusanTaylor@456', 'Susan', 'Taylor', 'susan.taylor@email.com'),
(10, 'alex_miller', 'AlexMiller@123', 'Alex', 'Miller', 'alex.miller@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `fk_username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
