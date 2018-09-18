SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
-- Table user
CREATE TABLE IF NOT EXISTS `user` (
  `Username` varchar(15) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`Username`, `Password`) VALUES
('slice','7c4a8d09ca3762af61e59520943dc26494f8941b');
-----------------------------------------------------------------------

-- Table student_faculty
CREATE TABLE IF NOT EXISTS `student_faculty` (
  `Username` varchar(15) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `DateofBirth` date NOT NULL,
  `Email` varchar(30) NOT NULL,
  `IsDebarred` tinyint(1) NOT NULL DEFAULT '0',
  `Gender` char(1) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `IsFaculty` tinyint(1) NOT NULL DEFAULT '0',
  `Dept` varchar(50) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `student_faculty` (`Username`, `Name`, `DateofBirth`, `Email`, `IsDebarred`, `Gender`, `Address`, `IsFaculty`, `Dept`) VALUES
('slice','Yunsen Lei','1995-07-21','yslei@stu.xidian.edu.cn',0,'M','Haitang #10',1,'InfoSec');
------------------------------------------------------------------------

-- Table devices
CREATE TABLE IF NOT EXISTS `devices` (
  `DeviceID` int(11) NOT NULL AUTO_INCREMENT,
  `DeviceName` varchar(16) NOT NULL,
  `Location` varchar(16) NOT NULL,
  `IsBorrowed` tinyint(1) NOT NULL,
  `BorrowerDate` datetime,
  `Borrower` varchar(15),
  `ReturnDate` datetime,
  `Parameter`varchar(100) DEFAULT NULL,
  PRIMARY KEY (`DeviceID`)
  )ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO `devices` (`DeviceID`,`DeviceName`,`Location`,`IsBorrowed`,`BorrowerDate`,`Borrower`,`ReturnDate`,`Parameter`) VALUES
(1,'computer','e101',0,NULL,NULL,NULL,'CPU:i7/GPU:GTX 1080/RAM:8G'),
(2,'oscilloscope','e104',1,'2017-1-13 10:00:00','slice','2017-1-13 16:00:00','TBS1000');
-----------------------------------------------------------------------



