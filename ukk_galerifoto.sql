-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 09:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_galerifoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `albumid` int(11) NOT NULL,
  `namaalbum` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggalbuat` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`albumid`, `namaalbum`, `deskripsi`, `tanggalbuat`, `userid`) VALUES
(15, 'mobil', 'mobil alphard           ', '2024-11-06', 2),
(16, 'handphone', 'handphone iphone\r\n            ', '2024-11-06', 2),
(17, 'laptop 1', 'laptop iphone', '2024-11-05', 2),
(22, 'komputer', 'komputer', '2024-11-04', 3),
(29, 'rak sepatu', 'sepatu', '2024-11-05', 2),
(40, 'gunung rinjani', 'cantikkk', '2024-11-06', 6),
(43, 'prau', 'prau', '2024-11-06', 5),
(44, 'salak', 'salak', '2024-11-06', 5),
(45, 'merbabu', 'merbabu', '2024-11-06', 5),
(46, 'Gunung', 'Gunung', '2024-11-06', 2),
(47, 'keyboard', 'keybpoyaafsdg', '2024-11-06', 8);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `fotoid` int(11) NOT NULL,
  `judulfoto` varchar(255) NOT NULL,
  `deskripsifoto` text NOT NULL,
  `tanggalunggah` date NOT NULL,
  `lokasifile` varchar(255) NOT NULL,
  `albumid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `tanggalunggah`, `lokasifile`, `albumid`, `userid`) VALUES
(17, 'gunung papandayan', 'indahhhh', '2024-11-06', '1361544539.papandayan.jpg', 46, 2),
(18, 'gunung merapi', 'indah', '2024-11-06', '1250882891.merapi.jpg', 46, 2),
(19, 'gunung sindoro', 'menarik', '2024-11-06', '1276355567.sindoro.jpg', 46, 2),
(20, 'gunung bromo', 'menarik', '2024-11-06', '494936806.bromo.jpg', 46, 2),
(26, 'gunung ciremai', 'keren', '2024-11-06', '1722522742.ciremai.jpg', 46, 2),
(27, 'gunung pangrango', 'keren', '2024-11-06', '567586572.pangrango.jpg', 46, 2),
(28, 'gunung gede', 'sejuk', '2024-11-06', '968602985.gede.jpg', 46, 2),
(29, 'gunung cikuray', 'sejuk', '2024-11-06', '191339379.cikuray.jpg', 46, 2),
(35, 'gunung prau', 'cantikkk            ', '2024-11-06', '626038133.prau.jpg', 43, 5),
(42, 'gunung rinjani', 'cantikkk                ', '2024-11-06', '1977488899.rinjani.jpg', 40, 6),
(43, 'gunung salak', 'menyenangkan                ', '2024-11-06', '92026972.salak.jpg', 44, 5),
(44, 'gunung merbabu', 'menyenangkan                ', '2024-11-06', '201143001.merbabu.jpg', 45, 5),
(47, 'gunung manglayang', 'sepoy sepoy', '2024-11-06', '1803409344.manglayang.jpg', 46, 2),
(48, 'gunung geulis', 'sepoy sepoy', '2024-11-06', '875068282.gunung geulis.jpg', 46, 2),
(49, 'mobil', 'mobil alphard', '2024-11-06', '2066713694.alpar.jpg', 15, 2),
(50, 'komputer', 'komputer', '2024-11-06', '385432987.komputer.jpg', 22, 3),
(51, 'iphone', 'iphone', '2024-11-06', '1182682760.ip.jpg', 16, 2),
(52, 'laptop', 'laptop', '2024-11-06', '2082513669.laptop.jpg', 17, 2),
(53, 'nike zoom', 'nike zoom', '2024-11-06', '1672932403.rak.jpg', 29, 2),
(54, 'keyboard', 'hhhhh', '2024-11-06', '1949099697.keyboard.jfif', 47, 8);

-- --------------------------------------------------------

--
-- Table structure for table `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `komentarid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalkomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentarfoto`
--

INSERT INTO `komentarfoto` (`komentarid`, `fotoid`, `userid`, `isikomentar`, `tanggalkomentar`) VALUES
(43, 54, 8, 'asli', '2024-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likefoto`
--

INSERT INTO `likefoto` (`likeid`, `fotoid`, `userid`, `tanggallike`) VALUES
(58, 54, 8, '2024-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `role` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `namalengkap`, `alamat`, `role`) VALUES
(2, 'arief', '202cb962ac59075b964b07152d234b70', 'arief@gmail.com', 'arieff', 'bandung', 'admin'),
(3, 'mas arr', '827ccb0eea8a706c4c34a16891f84e7b', 'masarr@gmail.com', 'mas arr', 'bandung', 'user'),
(5, 'user2', '81dc9bdb52d04dc20036dbd8313ed055', 'user2@gmail.com', 'user2', 'bandung', 'user'),
(6, 'user1', 'e10adc3949ba59abbe56e057f20f883e', 'user1@gmail.com', 'user1', 'bandung', 'user'),
(8, 'user3', 'fae0b27c451c728867a567e8c1bb4e53', 'user3@gmail.com', 'user3', 'bandung', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `albumid` (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`albumid`) REFERENCES `album` (`albumid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
