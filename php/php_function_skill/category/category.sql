CREATE TABLE `categories` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `categoryName` varchar(100) NOT NULL,

  `parentCategory` int(11) DEFAULT '0',

  `sortInd` int(11) NOT NULL,

  PRIMARY KEY (`id`)

) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;