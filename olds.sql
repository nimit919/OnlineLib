
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `olds`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `full` varchar(100) NOT NULL,
  `reg` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `aid` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`full`, `reg`, `email`, `aid`, `pass`) VALUES
('Admin', '123', 'adminlib@gmail.com', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `authors` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `subject`, `name`, `authors`, `edition`, `department`, `quantity`, `status`) VALUES
(1, 'DBMS', 'Database Management Systems', 'Raghu Ramakrishnan', '4th', 'CSE', 4, 'Available'),
(2, 'DBMS', 'Fundamentals of Database Systems', 'R. Elmasri & S. B. Navathe', '7th', 'CSE', 3, 'Available'),
(3, 'DLD', 'Digital Logic and Computer Design', 'M. Morris Mano', '1st', 'CSE', 2, 'Available'),
(4, 'MATHS', 'Probability and Statistics for engineers and scientists', 'R.E.Walpole, R.H.Myers, S.L.Mayers and K.Ye', '9th', 'MAT', 4, 'Available'),
(5, 'MATHS', 'Applied Statistics and Probability for Engineers', 'Douglas C. Montgomery, George C. Runger', '6th', 'MAT', 4, 'Available'),
(6, 'PHYSICS', 'Concepts of Modern Physics', 'Arthur Beiser et al.', '6th', 'PHY', 3, 'Available'),
(7, 'PHYSICS', 'Laser Fundamentals', 'Hill.  William Silfvast', '4th', 'PHY', 3, 'Available'),
(8, 'PHYSICS', 'Introduction to Electrodynamics', 'D. J. Griffith', '4th', 'PHY', 2, 'Available'),
(9, 'PHYSICS', 'Fiber Optic Communication Technology', 'Djafar K. Mynbaev and Lowell L.Scheiner', '3rd', 'PHY', 4, 'Available'),
(10, 'EVS', 'Environmental Science', 'G. Tyler Miller and Scott E. Spoolman', '15th', 'CHY', 3, 'Available'),
(11, 'EVS', 'Living in the Environment – Principles, Connections and Solutions', 'George Tyler Miller, Jr. and Scott Spoolman ', '17th', 'CHY', 3, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `comments` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `fname`, `comments`) VALUES
(23, '191652', 'For how many days do you issue books?'),
(25, 'Admin', '191652, For 14 days. After that if the book is not returned back to the library, there is a fine of 20rs of each day till you return the book.');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `id` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `approve` varchar(100) NOT NULL,
  `idate` varchar(100) NOT NULL,
  `rdate` varchar(100) NOT NULL,
  `late` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`id`, `bid`, `approve`, `idate`, `rdate`, `late`) VALUES
('191652', 10, 'Yes', '2020-07-25', '2020-08-08', ''),
('191537', 6, 'Returned', '2020-01-20', '2020-02-03', ''),
('191652', 2, 'Returned', '2020-03-12', '2020-03-26', ''),
('191535', 3, 'Expired', '2020-04-08', '2020-04-22', '2'),
('191535', 6, '', '', '', ''),
('191537', 11, '', '', '', ''),
('191652', 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `full` varchar(100) NOT NULL,
  `reg` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`full`, `reg`, `email`, `id`, `pass`) VALUES
('Mehak Gupta', '19BCE1652', 'mehak.gupta2019@vitstudent.ac.in', '191652', 'mehak'),
('Nimit Agrawal', '19BCE1537', 'nimit.agrawal2019@vitstudent.ac.in', '191537', 'nimit'),
('Arasada Ekaavera Aneel Kumar', '19BCE1535', 'ekaveera.aneelkumar2019@vitstudent.ac.in', '191535', 'ekaavera');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;
