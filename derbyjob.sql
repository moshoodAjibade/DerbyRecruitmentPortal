
CREATE TABLE `application` (
  `id` int(30) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `position_id` int(30) NOT NULL,
  `resume_path` text NOT NULL,
  `process_id` tinyint(30) NOT NULL DEFAULT 0 COMMENT '0=for review\r\n',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `firstname`, `lastname`, `email`, `gender`,  `contact`, `address`, `position_id`, `resume_path`, `process_id`, `date_created`) VALUES
(1, 'John', 'Smith','jsmith@sample.com', 'Male', '+18456-5455-55', 'Sample Address', 2, '1601271300_sample.pdf', 0, '2020-09-28 13:35:38');


CREATE TABLE `applicantreg` (
  `id` int(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `applicantreg` (`id`, `username`, `email`, `password`) VALUES
(1, 'mosh','jsmith@aol.com', 'manolo');

CREATE TABLE `employerreg` (
  `id` int(30) NOT NULL,
  `companyname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `applicantreg` (`id`, `companyname`, `email`, `password`) VALUES
(1, 'amazon','jsmith@amazon.com', 'john');