-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2018 at 03:28 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_swap`
--

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `gamename` varchar(50) NOT NULL,
  `genre` varchar(30) NOT NULL DEFAULT 'N/A',
  `rating` varchar(10) DEFAULT 'Mature 18+',
  `description` varchar(1000) DEFAULT 'No Description Available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`gamename`, `genre`, `rating`, `description`) VALUES
('Bloodborne', 'Action RPG', 'Mature 18+', 'No Description Available'),
('God of War (2018)', 'Hack and Slash', 'Mature 18+', 'God of War is an action-adventure video game developed by Santa Monica Studio and published by Sony Interactive Entertainment (SIE). Released on April 20, 2018, for the PlayStation 4 (PS4) console, it is the eighth installment in the God of War series, the eighth chronologically, and the sequel to 2010\'s God of War III. Unlike previous games, which were loosely based on Greek mythology, this game is loosely based on Norse mythology. The main protagonists are Kratos, the former Greek God of War, and his young son Atreus. Following the death of Kratos\' second wife and Atreus\' mother, they journey to fulfill her promise and spread her ashes at the highest peak of the nine realms. Kratos keeps his troubled past a secret from Atreus, who is unaware of his divine nature. Along their journey, they encounter monsters and gods of the Norse world.'),
('Gravity Rush 2', 'Action Adventure', 'Teen 13+', 'No Description Available'),
('Horizon Zero Dawn - Complete Edition', 'Action Adventure', 'Teen 13+', 'Horizon Zero Dawn is an action role-playing video game developed by Guerrilla Games and published by Sony Interactive Entertainment. It was released for the PlayStation 4 in early 2017. The plot revolves around Aloy, a hunter living in a world overrun by machines. Having been an outcast her whole life, she sets out to discover the dangers that kept her sheltered. The player uses ranged weapons, a spear and stealth tactics to combat the mechanised creatures, whose remains can be looted for resources. A skill tree provides the player with new abilities and passive bonuses. The game features an open world environment for Aloy to explore, while undertaking side and main story quests.'),
('NieR: Automata', 'JRPG', 'Mature 18+', 'Nier: Automata is an action role-playing game developed by PlatinumGames and published by Square Enix. The game was released for the PlayStation 4 and Microsoft Windows in early 2017, with an Xbox One port later in June 2018. Nier: Automata is a sequel to the 2010 video game Nier, a spin-off of the Drakengard series. Set in the midst of a proxy war between machines created by otherworldly invaders and the remnants of humanity, the story follows the battles of a combat android, her companion, and a fugitive prototype. Gameplay combines role-playing elements with action-based combat and mixed genre gameplay similar to that of Nier.'),
('Persona 5', 'RPG', 'Mature 18+', 'No Description Available'),
('Uncharted 4 - A Thief\'s End', 'Adventure', '16+', 'No Description Available');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sender` varchar(15) NOT NULL,
  `receiver` varchar(15) NOT NULL,
  `msg` varchar(300) NOT NULL,
  `msgread` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`time`, `sender`, `receiver`, `msg`, `msgread`) VALUES
('2018-07-28 13:18:08', 'zireael9797', 'codger', 'more ja', 'yes'),
('2018-07-28 19:07:45', 'codger', 'zireael9797', 'you first', 'yes'),
('2018-07-28 19:27:40', 'zireael9797', 'codger', 'die', 'yes'),
('2018-07-28 19:29:53', 'zireael9797', 'fueanta', 'hey', 'no'),
('2018-07-28 19:32:09', 'fueanta', 'zireael9797', 'ki hoise?', 'yes'),
('2018-07-28 19:33:04', 'zireael9797', 'fueanta', 'kisu na, 30 tk je pai ferot de :3', 'no'),
('2018-07-28 20:08:00', 'zireael9797', 'tahmid', 'heyo', 'no'),
('2018-07-28 20:08:30', 'tahmid', 'zireael9797', 'what\'s up', 'yes'),
('2018-07-29 00:06:09', 'zireael9797', 'codger', 'you there?', 'yes'),
('2018-07-29 00:18:11', 'baka', 'zireael9797', 'mara kha', 'yes'),
('2018-07-29 11:32:32', 'zireael9797', 'baka', 'you first', 'no'),
('2018-07-29 11:34:13', 'zireael9797', 'mishkat', 'The only way you can game on a mac is by using it as a mousepad', 'yes'),
('2018-07-30 14:50:38', 'tahmid', 'mishkat', 'how are you vaiya', 'yes'),
('2018-07-30 14:53:00', 'mishkat', 'tahmid', 'who are you?', 'yes'),
('2018-07-30 20:50:53', 'zireael9797', 'mishkat', 'hellow', 'yes'),
('2018-07-30 20:52:31', 'tahmid', 'mishkat', 'a ghost', 'yes'),
('2018-07-31 00:15:35', 'zireael9797', 'mishkat', 'die', 'yes'),
('2018-07-31 00:15:59', 'zireael9797', 'mishkat', 'kys', 'yes'),
('2018-07-31 00:19:09', 'zireael9797', 'mishkat', 'test 1', 'yes'),
('2018-07-31 00:19:18', 'zireael9797', 'mishkat', 'test 2', 'yes'),
('2018-07-31 00:19:58', 'mishkat', 'zireael9797', 'kalke project submission', 'yes'),
('2018-07-31 00:20:24', 'zireael9797', 'mishkat', 'jani', 'yes'),
('2018-07-31 00:20:38', 'zireael9797', 'mishkat', 'papers print kore anis', 'yes'),
('2018-07-31 15:00:34', 'sohel47', '1234', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(12) NOT NULL,
  `byuser` varchar(15) NOT NULL,
  `onpost` int(10) NOT NULL,
  `offer` varchar(200) NOT NULL,
  `cash` int(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `byuser`, `onpost`, `offer`, `cash`) VALUES
(45, 'mishkat', 1, 'MacOS e cholbe? ^_^\r\n', 0),
(46, 'fueanta', 1, 'yo!!', 0),
(49, 'zireael9797', 17, 'pocha gem', 0),
(50, 'zireael9797', 18, 'jailbreak kor', 0),
(52, 'baka', 1, 'Weeeb....... :3\r\n', 0),
(54, 'codger', 1, 'I BID HIGHER', 9999),
(55, 'zireael9797', 21, '\r\nP.S. will exchange with detroit', 0),
(56, 'zireael9797', 19, '10tk wtf?', 0),
(58, 'zireael9797', 1, 'sold for 9999 to codger :3', 0),
(59, 'codger', 1, 'wait I wasn\'t being serious ._.', 0),
(61, '1234', 17, 'ewsrdtfghjkl', -5000);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `forgame` varchar(50) NOT NULL,
  `fromuser` varchar(15) NOT NULL,
  `post` varchar(800) DEFAULT NULL,
  `price` int(4) DEFAULT '0',
  `platform` varchar(4) NOT NULL,
  `cond` varchar(4) NOT NULL DEFAULT 'USED',
  `sale_exchange` varchar(20) NOT NULL DEFAULT 'Sale and Exchange'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `forgame`, `fromuser`, `post`, `price`, `platform`, `cond`, `sale_exchange`) VALUES
(1, 'NieR: Automata', 'zireael9797', 'Just kidding lol, why would I wanna sell it?', 9000, 'PS4', 'USED', 'Sale and Exchange'),
(17, 'God of War (2018)', 'sohel47', 'no damaged ,,, fresh as new.', 2500, 'PS4', 'USED', 'Sale and Exchange'),
(18, 'Horizon Zero Dawn - Complete Edition', 'SeanSadman', '', 2000, 'PS4', 'USED', 'Sale and Exchange'),
(19, 'Horizon Zero Dawn - Complete Edition', 'fueanta', 'Test Run', 10, 'PS4', 'NEW', 'Sale and Exchange'),
(21, 'Persona 5', 'zireael9797', 'new game post', 300, 'PS4', 'NEW', 'Sale and Exchange'),
(22, 'God of War (2018)', 'zireael9797', '', 100, 'XBOX', 'NEW', 'Sale Only'),
(23, 'Uncharted 4 - A Thief\'s End', 'codger', 'exchange with horizon, will add cash', 2000, 'PS4', 'NEW', 'Sale and Exchange'),
(25, 'Uncharted 4 - A Thief\'s End', 'mishkat', 'mac e dhukaite pari nai tai sell kore dibo', 0, 'PS4', 'USED', 'Sale and Exchange'),
(27, 'Uncharted 4 - A Thief\'s End', '1234', '', -678, 'PS4', 'NEW', 'Exchange Only');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `pass`) VALUES
('1234', 'hello@com', '1234'),
('baka', 'baka@a.com', 'baka01'),
('codger', 'ssadman8@gmail.com', 'buttpotato'),
('fueanta', 'fueanta@gmail.com', 'nVidi@'),
('goku', 'goku@gmail.com', 'goku'),
('mishkat', 'mishu.sarowar@gmail.com', 'cse370cse370'),
('SeanSadman', 'hayate.theimpossiblekid.black@gmail.com', 'idletears'),
('sifatjamil369', 'sifatjamil369@gmail.com', 'gorillaglue'),
('sohel47', 'absohel47@gmail.com', '76435'),
('tahmid', 'tahmidhossain9797@gmail.com', 'qwertyuiop'),
('zireael9797', 'ryanhossain9797@gmail.com', 'ageraone1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`gamename`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`time`,`sender`,`receiver`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `byuser` (`byuser`),
  ADD KEY `onpost` (`onpost`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forgame` (`forgame`),
  ADD KEY `fromuser` (`fromuser`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`byuser`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_ibfk_2` FOREIGN KEY (`onpost`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`forgame`) REFERENCES `games` (`gamename`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`fromuser`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
