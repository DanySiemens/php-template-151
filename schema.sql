-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';


DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `content` varchar(500) CHARACTER SET armscii8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `post` (`id`, `user_id`, `title`, `content`) VALUES
(7,	6,	'Post1',	'Inhalt1'),
(9,	6,	'Post2',	'Inhalt2');
(7,	6,	'Post3',	'Inhalt3'),
(9,	6,	'Post4',	'Inhalt4');


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isActivated` tinyint(4) NOT NULL,
  `activationCode` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `email`, `password`, `isActivated`, `activationCode`) VALUES
(4,	'test@byom.de',	'$2y$10$8H0wdWJL28dA7/Z6kUhQeex8MLmXHsnMo6FIwfbI9Q.iyCqlNy8Xy',	1,	'DCj006wBPe2Q5Gv5'),
(6,	'test2@byom.de',	'$2y$10$gQpy42h4IafTK6FZtAG5TOhRTtxEBbmuCxNgYxbJMezhhEF0.7TmC',	1,	'CyMi6Dro2NuySgVY');

-- 2017-06-22 20:03:07
