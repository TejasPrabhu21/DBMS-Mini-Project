-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 05:57 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `updatebusdata` (IN `busno` INT, IN `did` VARCHAR(20), IN `cid` NUMERIC(10), IN `rid` INT, IN `cap` INT, IN `nofstu` INT)   BEGIN

	update BUS set Driver_id=did ,Coordinator_id=cid ,Route_no=rid ,Capacity=cap ,No_of_Students=nofstu where Bus_no=busno;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatebuspassdata` (IN `pid` INT, IN `usnno` VARCHAR(10), IN `is_date` DATE, IN `v_date` DATE, IN `f_status` VARCHAR(10))   BEGIN

	update BUS_PASS set Issued_date=is_date , Valid_till=v_date , Fee_status=f_status where USN=usnno;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatecoordinatordata` (IN `c_id` INT, IN `c_name` VARCHAR(20), IN `c_contact` INT(10))   BEGIN

	update coordinator set Coordinator_name=c_name , Contact=c_contact where Coordinator_id=c_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatedriverdata` (IN `d_id` INT, IN `d_name` VARCHAR(20), IN `d_contact` NUMERIC(10))   BEGIN

	update DRIVER set Driver_name=d_name , Driver_contact=d_contact where Driver_id=d_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updatestudentdata` (IN `usnno` VARCHAR(10), IN `nme` VARCHAR(20), IN `busno` INT, IN `ads` VARCHAR(30), IN `cont` NUMERIC(10), IN `gnder` VARCHAR(10), IN `pword` VARCHAR(30))   BEGIN

	update STUDENT set Name=nme ,Bus_no=busno ,Address=ads ,Contact=cont ,Gender=gnder ,Password=pword where USN=usnno;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `Bus_no` int(11) NOT NULL,
  `Driver_id` int(11) NOT NULL,
  `Coordinator_id` int(11) NOT NULL,
  `Route_no` int(11) DEFAULT NULL,
  `Capacity` int(11) DEFAULT NULL,
  `No_of_Students` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`Bus_no`, `Driver_id`, `Coordinator_id`, `Route_no`, `Capacity`, `No_of_Students`) VALUES
(1, 1, 1, 1, 50, 3),
(2, 1, 3, 2, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bus_pass`
--

CREATE TABLE `bus_pass` (
  `Pass_id` int(11) NOT NULL,
  `USN` varchar(10) NOT NULL,
  `Issued_date` date DEFAULT NULL,
  `Valid_till` date DEFAULT NULL,
  `Fee_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_pass`
--

INSERT INTO `bus_pass` (`Pass_id`, `USN`, `Issued_date`, `Valid_till`, `Fee_status`) VALUES
(11, '4cb20cs002', '2023-01-10', '2023-03-10', 'paid'),
(22, '4cb20cs001', '2023-05-05', '2023-06-07', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `Coordinator_id` int(11) NOT NULL,
  `Coordinator_name` varchar(20) DEFAULT NULL,
  `contact` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`Coordinator_id`, `Coordinator_name`, `contact`) VALUES
(1, 'Rajesh', '1231231233'),
(3, 'coordi', '1122112211');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `Driver_id` int(11) NOT NULL,
  `Driver_name` varchar(20) DEFAULT NULL,
  `Driver_contact` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`Driver_id`, `Driver_name`, `Driver_contact`) VALUES
(1, 'karthik', '9765555555'),
(2, 'James', '2581111222');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `Route_no` int(11) NOT NULL,
  `Loc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`Route_no`, `Loc`) VALUES
(1, 'loc1'),
(1, 'loc2'),
(2, 'loc3'),
(2, 'loc4'),
(3, 'loc1'),
(3, 'loc2'),
(3, 'loc3');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `date`, `text`) VALUES
(11, '2023-01-10 15:41:01', 'bus will be late today'),
(12, '2023-01-10 15:47:55', 'hellofdf sidfdfdfidf f hdfd\r\ndfsdfdfl');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `Route_no` int(11) NOT NULL,
  `Start_loc` varchar(30) DEFAULT NULL,
  `End_loc` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`Route_no`, `Start_loc`, `End_loc`) VALUES
(1, 'Barebail', 'Canara Enginerring college'),
(2, 'Konchadi', 'Canara Enginerring college'),
(3, 'pumpwell', 'cec');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `USN` varchar(10) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Bus_no` int(11) DEFAULT NULL,
  `Address` varchar(30) DEFAULT NULL,
  `Contact` decimal(10,0) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`USN`, `Name`, `Bus_no`, `Address`, `Contact`, `Gender`, `Password`) VALUES
('4cb20cs001', 'K TEJAS PRABHU', 1, 'koncahdy', '9898987722', 'male', '12345678'),
('4cb20cs002', 'TEJAS PRABHU', 2, 'koncahdy', '2222222222', 'male', '12345678'),
('4cb20cs003', 'mark', 1, 'helllo', '1233212', 'M', '12345678'),
('4cb20cs004', 'darshan', 1, 'surathkal', '9876546549', 'M', '12345678');

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `t` AFTER INSERT ON `student` FOR EACH ROW BEGIN
update bus
set No_of_Students=No_of_Students+1
where Bus_no=new.Bus_no;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`Bus_no`,`Driver_id`,`Coordinator_id`),
  ADD KEY `Driver_id` (`Driver_id`),
  ADD KEY `Coordinator_id` (`Coordinator_id`),
  ADD KEY `Route_no` (`Route_no`);

--
-- Indexes for table `bus_pass`
--
ALTER TABLE `bus_pass`
  ADD PRIMARY KEY (`Pass_id`,`USN`),
  ADD KEY `USN` (`USN`);

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`Coordinator_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`Driver_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`Route_no`,`Loc`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`Route_no`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`USN`),
  ADD KEY `Bus_no` (`Bus_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`Driver_id`) REFERENCES `driver` (`Driver_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bus_ibfk_2` FOREIGN KEY (`Coordinator_id`) REFERENCES `coordinator` (`Coordinator_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bus_ibfk_3` FOREIGN KEY (`Route_no`) REFERENCES `route` (`Route_no`) ON DELETE CASCADE;

--
-- Constraints for table `bus_pass`
--
ALTER TABLE `bus_pass`
  ADD CONSTRAINT `bus_pass_ibfk_1` FOREIGN KEY (`USN`) REFERENCES `student` (`USN`) ON DELETE CASCADE;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`Route_no`) REFERENCES `route` (`Route_no`) ON DELETE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Bus_no`) REFERENCES `bus` (`Bus_no`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
