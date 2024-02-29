-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 26, 2023 at 05:25 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artbyyou`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `AboutID` int(11) NOT NULL,
  `HomePage` text NOT NULL,
  `Story` text NOT NULL,
  `AboutImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`AboutID`, `HomePage`, `Story`, `AboutImage`) VALUES
(1, 'A community of artists coming together to share personal work and consignment pieces for the general public. Do you have what it takes?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum!', 'files/AllArt.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `ArtistID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `ArtistImage` varchar(50) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`ArtistID`, `Name`, `ArtistImage`, `Type`, `Description`) VALUES
(1, 'Jack Menn', 'files/artists/joe.jpg', 'Photographer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut magna ac nibh pretium bibendum. In sit amet nisl nec arcu molestie feugiat. Integer non velit vitae eros laoreet viverra.'),
(2, 'Pete Sanders', 'files/artists/pete.jpg', 'Food Lover', 'Sed rutrum volutpat nulla quis bibendum. Sed ac hendrerit dolor. Vivamus placerat urna nec enim luctus, nec consequat lectus suscipit. Nunc tincidunt sapien a augue pretium mollis.'),
(3, 'Mary Major', 'files/artists/mary.jpg', 'Photographer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut magna ac nibh pretium bibendum. In sit amet nisl nec arcu molestie feugiat. Integer non velit vitae eros laoreet viverra.'),
(4, 'Sue Kass', 'files/artists/sue.jpg', 'Painter / Photographer', 'Sed rutrum volutpat nulla quis bibendum. Sed ac hendrerit dolor. Vivamus placerat urna nec enim luctus, nec consequat lectus suscipit. Nunc tincidunt sapien a augue pretium mollis.'),
(5, 'Tina Vax', 'files/artists/tina.jpg', 'Pottery', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut magna ac nibh pretium bibendum. In sit amet nisl nec arcu molestie feugiat. Integer non velit vitae eros laoreet viverra.'),
(6, 'Alan Doyle', 'files/artists/alan.jpg', 'Photographer', 'Sed rutrum volutpat nulla quis bibendum. Sed ac hendrerit dolor. Vivamus placerat urna nec enim luctus, nec consequat lectus suscipit. Nunc tincidunt sapien a augue pretium mollis.'),
(7, 'Carl Palmer', 'files/artists/carl.jpg', 'Food Lover', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut magna ac nibh pretium bibendum. In sit amet nisl nec arcu molestie feugiat. Integer non velit vitae eros laoreet viverra.'),
(8, 'Jane Lester', 'files/artists/jane.jpg', 'Painter', 'Sed rutrum volutpat nulla quis bibendum. Sed ac hendrerit dolor. Vivamus placerat urna nec enim luctus, nec consequat lectus suscipit. Nunc tincidunt sapien a augue pretium mollis.');

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

CREATE TABLE `artwork` (
  `ArtID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `ArtImage` varchar(50) NOT NULL,
  `ThemeID` int(11) NOT NULL,
  `ArtistID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artwork`
--

INSERT INTO `artwork` (`ArtID`, `Title`, `ArtImage`, `ThemeID`, `ArtistID`) VALUES
(1, 'The Clay Vessel', 'files/Pottery/pottery1_tina.jpg', 6, 5),
(2, 'Fragments of History', 'files/Pottery/pottery2_tina.jpg', 6, 5),
(3, 'Sculpting Life', 'files/Pottery/pottery3_tina.jpg', 6, 5),
(4, 'Earthenware Odyssey', 'files/Pottery/pottery4_tina.jpg', 6, 5),
(5, 'Potters of the Past', 'files/Pottery/pottery5_tina.jpg', 6, 5),
(6, 'Molded Memories', 'files/Pottery/pottery6_tina.jpg', 6, 5),
(7, 'Flower Fields Forever', 'files/Flowers/flowers1_alan.jpg', 3, 6),
(8, 'Bloom Boom', 'files/Flowers/flowers2_alan.jpg', 3, 6),
(9, 'Petals in the Wind', 'files/Flowers/flowers3_alan.jpg', 3, 6),
(10, 'The Beauty of Blossoms', 'files/Flowers/flowers4_alan.jpg', 3, 6),
(11, 'Floral Symphony', 'files/Flowers/flowers5_alan.jpg', 3, 6),
(12, 'Garden of Dreams', 'files/Flowers/flowers6_alan.jpg', 3, 6),
(13, 'Feast for the Senses', 'files/Food/food1_pete.jpg', 4, 2),
(14, 'A Culinary Journey', 'files/Food/food2_pete.jpg', 4, 2),
(15, 'Tasting Palette', 'files/Food/food3_pete.jpg', 4, 2),
(16, 'Savoring Delights', 'files/Food/food4_carl.jpg', 4, 7),
(17, 'Gastronomic Bliss', 'files/Food/food5_carl.jpg', 4, 7),
(18, 'Epicurean Adventures', 'files/Food/food6_carl.jpg', 4, 7),
(19, 'Brushstrokes of Emotion', 'files/Painting/painting1_sue.jpg', 5, 4),
(20, 'Canvas of Dreams', 'files/Painting/painting2_sue.jpg', 5, 4),
(21, 'Chromatic Symphony', 'files/Painting/painting3_sue.jpg', 5, 4),
(22, 'Colors of the Mind', 'files/Painting/painting4_jane.jpg', 5, 8),
(23, 'The Art of Reflection', 'files/Painting/painting5_jane.jpg', 5, 8),
(24, 'Imaginative Expressions', 'files/Painting/painting6_jane.jpg', 5, 8),
(25, 'Sailing into the Sunset', 'files/Boats/boats1_joe.jpg', 1, 1),
(26, 'The Maritime Muse', 'files/Boats/boats2_joe.jpg', 1, 1),
(27, 'Nautical Adventures', 'files/Boats/boats3_joe.jpg', 1, 1),
(28, 'The Sea\'s Song', 'files/Boats/boats4_mary.jpg', 1, 3),
(29, 'Boat Horizons', 'files/Boats/boats5_mary.jpg', 1, 3),
(30, 'A Voyage of Discovery', 'files/Boats/boats6_mary.jpg', 1, 3),
(31, 'Urban Impressions', 'files/Buildings/buildings1_joe.jpg', 2, 1),
(32, 'Structures of Light and Shadow', 'files/Buildings/buildings2_joe.jpg', 2, 1),
(33, 'Cityscapes in Motion', 'files/Buildings/buildings3_joe.jpg', 2, 1),
(34, 'The Architecture of Time', 'files/Buildings/buildings4_mary.jpg', 2, 3),
(35, 'Skyline Reflections', 'files/Buildings/buildings5_mary.jpg', 2, 3),
(36, 'The Majesty of Manmade', 'files/Buildings/buildings6_mary.jpg', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `UserID` int(11) NOT NULL,
  `ArtistID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `ThemeID` int(11) NOT NULL,
  `Theme` varchar(100) NOT NULL,
  `ThemeImage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`ThemeID`, `Theme`, `ThemeImage`) VALUES
(1, 'Boats', 'files/Boats/boats3_joe.jpg'),
(2, 'Buildings', 'files/Buildings/buildings2_joe.jpg'),
(3, 'Flowers', 'files/Flowers/flowers1_alan.jpg'),
(4, 'Food', 'files/Food/food1_pete.jpg'),
(5, 'Painting', 'files/Painting/painting6_jane.jpg'),
(6, 'Pottery', 'files/Pottery/pottery1_tina.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`AboutID`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`ArtistID`);

--
-- Indexes for table `artwork`
--
ALTER TABLE `artwork`
  ADD PRIMARY KEY (`ArtID`),
  ADD KEY `fk_1` (`ThemeID`),
  ADD KEY `fk_2` (`ArtistID`);

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `fk_3` (`ArtistID`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`ThemeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `AboutID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `ArtistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `artwork`
--
ALTER TABLE `artwork`
  MODIFY `ArtID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `signin`
--
ALTER TABLE `signin`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `ThemeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artwork`
--
ALTER TABLE `artwork`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`ThemeID`) REFERENCES `themes` (`ThemeID`),
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`ArtistID`) REFERENCES `artists` (`ArtistID`);

--
-- Constraints for table `signin`
--
ALTER TABLE `signin`
  ADD CONSTRAINT `fk_3` FOREIGN KEY (`ArtistID`) REFERENCES `artists` (`ArtistID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
