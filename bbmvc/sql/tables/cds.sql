CREATE TABLE `cds` (
  `cd_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cd_title` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `cd_title_seo` varchar(200) DEFAULT NULL,
  `cd_artist` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `cd_year` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_id`),
  UNIQUE KEY `cd_title_seo` (`cd_title_seo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1
