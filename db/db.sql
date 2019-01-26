CREATE TABLE `foodinventory` (
  `foodid` varchar(5) NOT NULL,
  `categoryid` varchar(5) NOT NULL,
  `foodbankid` varchar(5) NOT NULL,
  `foodname` varchar(45) NOT NULL,
  `actualQty` int(11) DEFAULT '0',
  `virtualQty` int(11) DEFAULT '0',
  PRIMARY KEY (`foodid`,`categoryid`,`foodbankid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `userid` varchar(5) NOT NULL,
  `fbid` varchar(5) NOT NULL,
  `password` varchar(12) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `role` smallint(6) DEFAULT '1',
  PRIMARY KEY (`userid`,`fbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `foodcategory` (
  `categoryid` varchar(5) NOT NULL,
  `categoryname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `foodbank` (
  `fbid` varchar(5) NOT NULL,
  `fbname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`fbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
