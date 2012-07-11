CREATE TABLE IF NOT EXISTS `tracks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(1000) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `album` varchar(1000) NOT NULL,
  `spotifyid` varchar(250) NOT NULL,
  `release_date` int(11) NOT NULL,
  `played` tinyint(1) NOT NULL DEFAULT '0',
  `playing` tinyint(1) NOT NULL DEFAULT '0',
  `added_by` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

