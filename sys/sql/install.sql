SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE DATABASE IF NOT EXISTS `{DATABASE}` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `{DATABASE}`;
CREATE TABLE IF NOT EXISTS `settings` (
  `name` varchar(50) NOT NULL,
  `value` varchar(200) NOT NULL,
  `value2` varchar(200) NOT NULL,
  `value3` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Global Settings';
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  `perm` varchar(10) NOT NULL,
  `sessions` varchar(200) NOT NULL,
  `devices` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Users and Sessions';
ALTER TABLE `settings`
  ADD UNIQUE KEY `name` (`name`);
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`);
