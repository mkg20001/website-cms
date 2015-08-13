SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
DROP TABLE IF EXISTS `DOMAIN_{DOMAIN}`;
CREATE TABLE IF NOT EXISTS `DOMAIN_{DOMAIN}` (
  `name` varchar(50) NOT NULL,
  `type` varchar(200) NOT NULL,
  `value` varchar(2000) NOT NULL,
  `value2` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Settings for Domain {DOMAIN}';
ALTER TABLE `DOMAIN_{DOMAIN}`
  ADD UNIQUE KEY `name` (`name`);
INSERT INTO `{DATABASE}`.`DOMAIN_{DOMAIN}` (`name`, `type`, `value`, `value2`) VALUES ('is_setup', 'setting', 'false','false');
INSERT INTO `{DATABASE}`.`domains` (`domain`, `title`, `webmaster`, `group`, `template`, `master`, `exdomain`) VALUES ('{DOMAIN}', '{TITLE}', '{WEBMASTER}', '{GROUP}', '{TEMPLATE}', '{MASTER}', '{EXDOMAIN}');

