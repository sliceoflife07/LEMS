CREATE TABLE IF NOT EXISTS `computer_record` (
	`RecordID` int(11) NOT NULL AUTO_INCREMENT,
	`DeviceID` varchar(15) NOT NULL,
	`Devicename`varchar(15) DEFAULT 'computer',
	`Borrower` varchar(50) DEFAULT NULL,
	`BorrowDate` datetime DEFAULT NULL,
	`ReturnDate` datetime DEFAULT NULL,
	PRIMARY KEY (`RecordID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `switch_record` (
	`RecordID` int(11) NOT NULL AUTO_INCREMENT,
	`DeviceID` varchar(15) NOT NULL,
	`Devicename`varchar(15) DEFAULT 'switch',
	`Borrower` varchar(50) DEFAULT NULL,
	`BorrowDate` datetime DEFAULT NULL,
	`ReturnDate` datetime DEFAULT NULL,
	PRIMARY KEY (`RecordID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1; 

CREATE TABLE IF NOT EXISTS `oscilloscope_record` (
	`RecordID` int(11) NOT NULL AUTO_INCREMENT,
	`DeviceID` varchar(15) NOT NULL,
	`Devicename`varchar(15) DEFAULT 'oscilloscope',
	`Borrower` varchar(50) DEFAULT NULL,
	`BorrowDate` date DEFAULT NULL,
	`ReturnDate` date DEFAULT NULL,
	PRIMARY KEY (`RecordID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;