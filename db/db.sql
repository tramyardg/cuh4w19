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

CREATE TABLE `foodrequest` (
  `userid` varchar(5) NOT NULL,
  `requestdate` varchar(10) NOT NULL,  -- YYYY-MM-DD
  `food1` varchar(5) DEFAULT NULL,
  `food2` varchar(5) DEFAULT NULL,
  `food3` varchar(5) DEFAULT NULL,
  `food4` varchar(5) NOT NULL,
  `food5` varchar(5) DEFAULT NULL,
  `food6` varchar(5) DEFAULT NULL,
  `food7` varchar(5) DEFAULT NULL,
  `food8` varchar(5) DEFAULT NULL,
  `pickupdate` varchar(10) DEFAULT NULL,  -- YYYY-MM-DD
  `delivered` int(1) DEFAULT 0,  
   PRIMARY KEY (`userid`,`requestdate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
