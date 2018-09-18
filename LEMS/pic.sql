CREATE TABLE IF NOT EXISTS `devpic` (
	`Devicename` varchar(15) NOT NULL,
	`Picpath` varchar(50) NOT NULL,
	PRIMARY KEY (`Devicename`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `devpic` (`Devicename`, `Picpath`) VALUES
('computer','computer.jpg');
INSERT INTO `devpic` (`Devicename`, `Picpath`) VALUES
('switch','switch.jpg');
INSERT INTO `devpic` (`Devicename`, `Picpath`) VALUES
('oscilloscope','oscilloscope.jpg');