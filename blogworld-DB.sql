-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4130
-- Date/time:                    2015-04-07 19:47:20
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table blogworld.blogs
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` blob NOT NULL,
  `topic_id` int(11) NOT NULL,
  `active_comments` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `is_completed` tinyint(4) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_blogs_users` (`user_id`),
  KEY `FK_blogs_topics` (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table contains the blog and its details ';

-- Data exporting was unselected.


-- Dumping structure for table blogworld.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_comments_blogs` (`blog_id`),
  KEY `FK_comments_users` (`first_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table contains comments';

-- Data exporting was unselected.


-- Dumping structure for table blogworld.topics
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table holds the topics on which a blog is associated';

-- Data exporting was unselected.


-- Dumping structure for table blogworld.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table contains user details ';

-- Data exporting was unselected.
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
