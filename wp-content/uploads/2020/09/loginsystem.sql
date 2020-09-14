-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2020 at 10:03 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `skills` varchar(300) NOT NULL,
  `c_name` varchar(300) NOT NULL,
  `c_add` varchar(300) NOT NULL,
  `profession` varchar(300) NOT NULL,
  `mob` varchar(50) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `pan` varchar(10) NOT NULL,
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `clogo` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `email`, `qualification`, `location`, `skills`, `c_name`, `c_add`, `profession`, `mob`, `gst`, `pan`, `picture`, `clogo`) VALUES
(1, 'admin@gmail.com', 'admin', 'Tejas Chavda', 'codetech32@gmail.com', 'B.E in Computer Engineering from Gandhinagar Institute of Technology ', 'Ahmedabad, Gujarat', '[\"test ,from\"]', 'CodeTech Engineers', 'A 4/1 Suryanagar Soc., Jawahar Chowk, Maninagar, Ahmedabad- 380008', 'Web Developer', '+91-9737693302 / +91-7600158240', '24AVVPC8158M1ZV', 'AVVPC8158M', '1593866983_IMG_20180115_101644_1.jpg', '1593611988_Best-Waterfall-HD-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

CREATE TABLE `bankdetails` (
  `bid` int(50) NOT NULL,
  `bname` varchar(300) NOT NULL,
  `ac` varchar(300) NOT NULL,
  `ifsc` varchar(300) NOT NULL,
  `branch` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bankdetails`
--

INSERT INTO `bankdetails` (`bid`, `bname`, `ac`, `ifsc`, `branch`) VALUES
(1, 'Yes Bank', ' 021561900001144', 'YESB0000215', 'Maninagar');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `cid` int(10) NOT NULL,
  `c_name` varchar(80) NOT NULL,
  `c_add` varchar(200) NOT NULL,
  `mob` bigint(10) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `c_type` varchar(4) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`cid`, `c_name`, `c_add`, `mob`, `gst`, `c_type`, `created`) VALUES
(3, 'Tatva Health and Wellness', 'No. 621, Sire Manson, 5th Floor,  Model School Road, Anna Salai, Chennai - 600006 (tamil Nadu)', 8939181369, '33AADCK2858E1ZQ', 'IGST', '2020-07-04'),
(4, 'Shri Venkata Krishna Food Products', 'Plot No. 86A, 87, Pattabhi Seetha Ramaih Nagar, 3rd Lane, Amravati Road, Guntur - 522002 (A.P)', 9703825281, '37BCLPK1934P1Z0', 'IGST', '2020-05-19'),
(5, 'Classic Packaging ', '1214C, Vidhur Nagar, Nr. Hawa Bunglow, Indore - 452009 (M.P)', 8819999779, '23AAUPY2416N1Z0', 'IGST', '2020-05-14'),
(6, 'Shree Krishna Enterprises', 'C/o Karuna Nidhan Singh, Kapoorpur, Mishra Bazaar, Ghazipur - 233001 (U.P)', 8081828113, '09DAOPS2497J1ZQ', 'IGST', '2020-05-19'),
(7, 'Sri Guru Venkateswara Food Products', '46/802/4 Budhawarapeta, Kurnool - 518002 (A.P)', 9966645867, '37AQQPN9652B1ZE', 'IGST', '2020-05-19'),
(8, 'Motive Industries', 'Chakundi, D.c.c. Dankuni, Hooghly -  7123310', 8100205266, '19ABLFM9215F1ZZ', 'IGST', '2020-05-19'),
(9, 'Nrun Cosmetics India Pvt Ltd', 'B-8, Opp. Sagar Industrial Estate, D-block, Ocean Ind. Estate, Dhumal Nagar Waliv, Vasai East, Palghar - 401208 (mh.)', 9987396602, '27AAGCN1844G1ZH', 'IGST', '2020-05-19'),
(10, 'Sree Masani Foods', '7th Cross Street, Gandhinagar, Sundrapuram, Coimbatore - 641024 (tamil Nadu)', 9842211148, '33ACEPJ0354N1ZP', 'IGST', '2020-05-19'),
(13, 'Unnati Stationary & Offset', 'Raipur Road, Dhamtari - 493773 Chattisgarh', 7999716211, '22BYPPS9145E1Z2', 'IGST', '2020-05-19'),
(15, 'Patel Masala Mill', '920 Mahapoli Vill. Tal. Bhiwandi, Dist. Thane - 421302 (mh)', 9209977180, '27CMRPP3283R1ZU', 'IGST', '2020-05-28'),
(16, 'Rahul Ice Factory', 'Hari Sabha Road, Ward No. 1, Po/ps- Rangapara, Dist Sonitpur - 784505 (assam)', 9706836549, '18AMVPD9860G1ZF', 'IGST', '2020-05-28'),
(17, 'Parmeshwari Ice-cream Pvt Ltd', 'G1 Ankur Palace, Opp. Hotel Pind Balluchi , Vijaynagar, Indore - 452010 (m.p)', 7746012345, '23AAECP7612G1ZN', 'IGST', '2020-05-28'),
(18, 'Airsonbendito Industries Pvt Ltd', 'Chak - 16 Ml, Nathan Wali, Sri Ganganagar - 335001 (raj.) ', 9414630885, '08AARCA0800C1Z5', 'IGST', '2020-06-02'),
(19, 'Seema Dhanania', '1 Lord Sinha Road, Dhanania House, Kolkata - 700071', 9830995515, '965270272627', 'IGST', '2020-06-05'),
(20, 'Bharat Beez Bhandar', 'Gatakodha Jila Sagar, Mp - 470229', 9300145039, '23BXDPK6212M1ZJ', 'IGST', '2020-06-06'),
(21, 'Kalyani Provision', 'Shani Gali Tadoda, Dist. Nadarbar - 425413 (m.h)', 9850244331, 'AXSPP1921A', 'IGST', '2020-06-08'),
(22, 'KP Tech Machine (india) Pvt. Ltd', 'K/209, Vishala Land Mark, Above Mery Gold Restaurant, Nr. Palm Hotel, S.p Ring Road Nikol, Ahmedabad - 24', 8980001001, '24AAECK4993M2ZY', 'Loc', '2020-06-08'),
(23, 'Tasty Dairy Products', '#6 - 5- 35/ 36, Behind Samatha Nursing Home, Karimnagar - 505001 ', 9704507571, '36ALUPM7969B1ZF', 'IGST', '2020-06-10'),
(24, 'Minerva Ice Cream', 'Opp. 2 Town Police Station, Collector Chowk, Adilabad - 504001 (telangana)', 9848458764, '36APXPP2039Q1ZV', 'IGST', '2020-06-10'),
(56, 'Lab Chem', '6, Shanti Nagar, Jhalwa, Alld.', 9450608752, '09ACUPG1158P1ZV', 'IGST', '2020-06-26'),
(60, 'Grow Up Trading Company', '228, Jawhar Colony, Sec- 22, Nit Faridabad, Haryana - 121005', 9718961144, '06AAPFG3090B1ZL', 'IGST', '2020-07-01'),
(62, 'S.K.V Food Products', '1214C, Vidhur Nagar, Nr. Hawa Bunglow, Indore - 452009 ', 9737693302, '23AAUPY2416N1Z0', 'IGST', '2020-07-02'),
(73, 'Kp India', '342 Maninagar Ahmedabad - 380008', 8735003590, '24AVVPC8158M1ZV', 'IGST', '2020-07-04'),
(74, 'Sujanil Chemo Industries', 'Bhartati 425/27 TMV colony, Opp. Kataria High School, Pune - 411037', 9822022262, '27AAEFS2499B1Z5', 'IGST', '2020-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `clienttype`
--

CREATE TABLE `clienttype` (
  `id` int(30) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clienttype`
--

INSERT INTO `clienttype` (`id`, `type`) VALUES
(1, 'IGST'),
(2, 'Loc');

-- --------------------------------------------------------

--
-- Table structure for table `invtest`
--

CREATE TABLE `invtest` (
  `orderno` int(100) NOT NULL,
  `orderid` varchar(300) NOT NULL,
  `item_name` varchar(300) NOT NULL,
  `item_desc` varchar(300) NOT NULL,
  `hsn` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invtest`
--

INSERT INTO `invtest` (`orderno`, `orderid`, `item_name`, `item_desc`, `hsn`, `quantity`, `price`, `total`) VALUES
(1, '5ef59449ec825', 'Font Kit 3 mm', '', 8443, 1, 300, 300),
(2, '5ef594c190961', 'Font Kit 3 mm', '', 8443, 1, 300, 300),
(3, '5ef597a64f3d7', 'Font Kit 3 mm', '', 8443, 1, 300, 300),
(4, '5ef5d6377a895', 'CT- 01 HandHeld Manual Coder', '', 8443, 1, 3500, 3500),
(5, '5ef5da9dec044', 'High Speed Carton Stracker', '', 8443, 1, 140000, 140000),
(6, '5ef5dadcb1640', 'CT- 02 Handy Marker for Currogated Cartons', '', 8443, 1, 4000, 4000),
(8, '5ef5db220b517', 'CT-05 Standard Multipurpose Coder', '', 8443, 1, 70000, 70000),
(9, '5ef5db4488745', 'CT- 01 HandHeld Manual Coder', '', 8443, 1, 3000, 3000),
(10, '5ef5dc7be2718', '2in1 coder', '', 8443, 2, 3000, 6000),
(11, '5ef5dcd68ba91', 'CT- 01 HandHeld Manual Coder', '', 8443, 1, 30, 30),
(12, '5ef753f01976b', 'CT- 02 Handy Marker for Currogated Cartons', '', 8443, 1, 200, 200),
(13, '5efb178751897', 'CT- 01 HandHeld Manual Coder', 'Font kit 3 mm', 8443, 1, 3000, 3000),
(14, '5efd7b9608d8f', 'CT- 01 HandHeld Manual Coder', '', 8443, 1, 300, 300),
(15, '5efd7c348817c', 'CT- 01 HandHeld Manual Coder', '', 8443, 1, 300, 300),
(16, '5efd7c5e7813d', 'CT- 01 HandHeld Manual Coder', '', 8443, 1, 20, 20),
(17, '5efd7c8e1a15c', 'CT- 01 HandHeld Manual Coder', '', 8443, 1, 200, 200),
(23, '5efdc431e4208', 'CT- 01 HandHeld Manual Coder', 'Font kit 3mm', 8443, 1, 3000, 3000),
(24, '5efdc431e4208', 'CT- 02 Handy Marker for Currogated Cartons', 'font kit 10mm', 8443, 1, 4240, 4240),
(25, '5efdc431e4208', 'Inkpad', '', 8443, 10, 30, 300),
(26, '5efdc431e4208', 'Font Kit 3 mm', '', 8443, 1, 420, 420),
(27, '5efdc431e4208', 'Anti-Freeze Fast Dry Ink', '', 8443, 1, 700, 700),
(42, '5eff3fd690f76', 'CT- 01 HandHeld Manual Coder', '', 8443, 1, 3000, 3000),
(43, '5eff3fd690f76', 'Inkpad', '', 8443, 30, 30, 900),
(44, '5f007a518677c', 'CT- 01 HandHeld Manual Coder', '', 8443, 1, 3000, 3000),
(48, '5efdc2fa71c73', 'CT- 01 HandHeld Manual Coder', 'Font kit 3mm', 8443, 1, 3000, 3000),
(49, '5efdc2fa71c73', 'CT- 02 Handy Marker for Currogated Cartons', 'font kit 10mm', 8443, 1, 4240, 4240),
(50, '5efdc2fa71c73', 'Inkpad', '', 8443, 30, 30, 900),
(51, '5efdc2fa71c73', 'Courier', '', 8443, 1, 300, 300),
(58, '5ef5dafc54f30', 'CT-04 Table Top Coder ', '', 8443, 1, 14000, 14000),
(59, '5ef5dafc54f30', 'Wooden Packing', '', 8443, 1, 3000, 3000),
(60, '5ef5dafc54f30', 'Freight Charges Via VRL Logistics', '', 8443, 1, 3500, 3500),
(61, '5f017c131c50b', 'High Speed Carton Stracker', '', 8443, 1, 120000, 120000),
(62, '5f017c131c50b', 'Wooden Packing', '', 8443, 1, 4000, 4000),
(63, '5f029d2f92763', 'Select Unit', '', 8443, 1, 300, 300),
(64, '5f029e9350daf', 'Select Unit', '', 8443, 1, 300, 300),
(65, '5f02a0e093e30', 'CT- 01 HandHeld Manual Coder', '', 8443, 1, 20, 20),
(66, '5f02a0e093e30', 'Wooden Packing', '', 8443, 1, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `invtest2`
--

CREATE TABLE `invtest2` (
  `invid` varchar(300) NOT NULL,
  `cid` int(10) NOT NULL,
  `orderid` varchar(300) NOT NULL,
  `totalitems` int(10) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `taxrate` int(10) NOT NULL,
  `taxamount` int(100) NOT NULL,
  `totalamount` int(100) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invtest2`
--

INSERT INTO `invtest2` (`invid`, `cid`, `orderid`, `totalitems`, `subtotal`, `taxrate`, `taxamount`, `totalamount`, `created`) VALUES
(' INV/20-21/0001', 56, '5ef594c190961', 1, 300, 18, 54, 354, '2020-06-26'),
(' INV/20-21/0002', 9, '5ef5d6377a895', 1, 3500, 18, 630, 4130, '2020-06-26'),
(' INV/20-21/0003', 3, '5ef5da9dec044', 1, 140000, 18, 25200, 165200, '2020-06-26'),
(' INV/20-21/0004', 4, '5ef5dadcb1640', 1, 4000, 18, 720, 4720, '2020-06-26'),
(' INV/20-21/0005', 7, '5ef5dafc54f30', 3, 20500, 18, 3690, 24190, '2020-06-26'),
(' INV/20-21/0006', 17, '5ef5db220b517', 1, 70000, 18, 12600, 82600, '2020-06-26'),
(' INV/20-21/0007', 16, '5ef5db4488745', 1, 3000, 18, 540, 3540, '2020-06-26'),
(' INV/20-21/0008', 23, '5ef5dc7be2718', 1, 6000, 18, 1080, 7080, '2020-06-26'),
(' INV/20-21/0009', 22, '5ef5dcd68ba91', 1, 30, 18, 6, 36, '2020-06-26'),
(' INV/20-21/0010', 6, '5ef753f01976b', 1, 200, 18, 36, 236, '2020-06-27'),
(' INV/20-21/0011', 60, '5efb178751897', 1, 3000, 18, 540, 3540, '2020-06-30'),
(' INV/20-21/0012', 5, '5efd7b9608d8f', 1, 300, 18, 54, 354, '2020-07-02'),
(' INV/20-21/0013', 17, '5efdc2fa71c73', 4, 8440, 18, 1520, 9960, '2020-07-02'),
(' INV/20-21/0014', 74, '5f017c131c50b', 2, 124000, 18, 22320, 146320, '2020-07-05'),
(' INV/20-21/0015', 4, '5f029d2f92763', 1, 300, 18, 54, 354, '2020-07-06'),
(' INV/20-21/0016', 4, '5f02a0e093e30', 2, 30, 18, 6, 36, '2020-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `paidhistory`
--

CREATE TABLE `paidhistory` (
  `pay_id` int(50) NOT NULL,
  `p_m` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `mode` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `purpose` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paidhistory`
--

INSERT INTO `paidhistory` (`pay_id`, `p_m`, `amount`, `mode`, `date`, `purpose`) VALUES
(4, 'Jay Engineering', 25000, 'Google Pay', '2020-06-09', 'Machine '),
(6, 'daksh enterprise', 3500, 'Paytm', '2020-07-04', 'redfg'),
(8, 'Yogesh CA', 3500, 'Paytm', '2020-06-06', 'gdl'),
(9, 'Akshay Engineering', 2000, 'Neft from yesbank', '2020-06-08', 'tea');

-- --------------------------------------------------------

--
-- Table structure for table `paymode`
--

CREATE TABLE `paymode` (
  `mid` int(30) NOT NULL,
  `mode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymode`
--

INSERT INTO `paymode` (`mid`, `mode`) VALUES
(1, 'Paytm'),
(2, 'Neft from yesbank'),
(3, 'Neft from Sbi'),
(4, 'Cash'),
(5, 'Google Pay');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hsn` int(10) NOT NULL,
  `created` date NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `name`, `hsn`, `created`, `description`) VALUES
(1, 'CT- 01 HandHeld Manual Coder', 8443, '2020-07-02', 'Font Kit 2.5 mm'),
(2, 'CT- 02 Handy Marker for Currogated Cartons', 8443, '2020-05-10', 'Font kit 10 mm'),
(3, 'CT-03 Handy Marker for HDPE Bags', 8443, '2020-05-10', 'Font kit 12mm'),
(4, 'CT-04 Table Top Coder ', 8443, '2020-03-26', 'Complete set'),
(5, 'CT-05 Standard Multipurpose Coder', 8443, '2020-05-10', 'Wooden Packing'),
(6, 'CT-05 Ice Cream Multipurpose Coder', 8443, '2020-05-10', 'Includes Wooden Packing'),
(7, '2in1 coder', 8443, '2020-05-05', 'includes wooden packing'),
(8, 'Standard Carton Coder', 8443, '2020-05-14', 'With Counting Sensor and Delta'),
(14, 'Inkpad', 8443, '2020-06-04', 'white font pad'),
(15, 'Inkpad Holder', 8443, '2020-06-04', 'Black plastic form pad holder'),
(17, 'High Speed Carton Stracker', 8443, '2020-06-07', 'Standard'),
(18, 'SpgInk', 8443, '2020-06-08', 'Antifreeze'),
(19, 'C - Feeding Rubber', 8443, '2020-06-08', 'Carton Feeding Rubber '),
(20, 'L - Feeding Rubber', 8443, '2020-06-08', 'Label Feeding Rubber'),
(21, 'Paste Ink', 8443, '2020-06-08', 'Paste Ink'),
(25, 'Black Rubber strip Plain', 8443, '2020-06-10', 'Rubber strip'),
(26, 'Anti-Freeze Fast Dry Ink', 8443, '2020-06-19', 'antifreeze'),
(27, 'Font Kit 3 mm', 8443, '2020-06-26', 'Normal by sunita'),
(28, 'Font Kit 4 mm', 8443, '2020-06-26', 'font kit orange '),
(29, 'Groove Sheet', 8443, '2020-06-26', 'Black '),
(31, 'Courier', 8443, '2020-07-05', 'trackon, mahaveer'),
(32, 'Wooden Packing', 8443, '2020-07-05', 'wooden'),
(33, 'Freight Charges Via VRL Logistics', 8443, '2020-07-05', 'freight');

-- --------------------------------------------------------

--
-- Table structure for table `proforma`
--

CREATE TABLE `proforma` (
  `pro_id` int(10) NOT NULL,
  `cid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `quantity` int(30) NOT NULL,
  `pvalue` int(50) NOT NULL,
  `overval` int(30) NOT NULL,
  `taxvalue` int(50) NOT NULL,
  `totalvalue` int(50) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proforma`
--

INSERT INTO `proforma` (`pro_id`, `cid`, `pid`, `quantity`, `pvalue`, `overval`, `taxvalue`, `totalvalue`, `created`) VALUES
(1, 15, 1, 1, 3000, 3000, 540, 3540, '2020-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `protest`
--

CREATE TABLE `protest` (
  `orderno` int(100) NOT NULL,
  `orderid` varchar(300) NOT NULL,
  `item_name` varchar(300) NOT NULL,
  `item_desc` varchar(300) NOT NULL,
  `hsn` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `protest`
--

INSERT INTO `protest` (`orderno`, `orderid`, `item_name`, `item_desc`, `hsn`, `quantity`, `price`, `total`) VALUES
(1, '5ef5dd0634561', 'CT- 01 HandHeld Manual Coder', '', 8443, 1, 30, 30),
(9, '5efdbd0f6f126', 'CT- 01 HandHeld Manual Coder', '', 8443, 1, 3000, 3000),
(12, '5eff35bc0bb70', 'CT-04 Table Top Coder ', '', 8443, 1, 13000, 13000),
(13, '5eff35c004f20', 'CT-04 Table Top Coder ', '', 8443, 1, 13000, 13000),
(14, '5eff35ff8c56e', 'CT-04 Table Top Coder ', '', 8443, 1, 13000, 13000),
(15, '5eff31cf4d759', 'CT-04 Table Top Coder ', '', 8443, 1, 13000, 13000),
(16, '5eff31cf4d759', 'Paste Ink', '', 8443, 1, 700, 700),
(20, '5eff2fdfc112c', 'CT- 01 HandHeld Manual Coder', 'kit 3 mm', 8443, 1, 800, 800),
(21, '5eff2fdfc112c', 'Courier', '', 8443, 1, 400, 400),
(22, '5eff2fdfc112c', 'Wooden Packing', '', 8443, 1, 300, 300),
(23, '5eff2fdfc112c', 'Freight Charges Via VRL Logistics', '', 8443, 1, 3000, 3000),
(24, '5f017c3816af8', 'High Speed Carton Stracker', '', 8443, 1, 120000, 120000),
(25, '5f017c3816af8', 'Wooden Packing', '', 8443, 1, 4000, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `protest2`
--

CREATE TABLE `protest2` (
  `invid` varchar(300) NOT NULL,
  `cid` int(10) NOT NULL,
  `orderid` varchar(300) NOT NULL,
  `totalitems` int(10) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `taxrate` int(10) NOT NULL,
  `taxamount` int(100) NOT NULL,
  `totalamount` int(100) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `protest2`
--

INSERT INTO `protest2` (`invid`, `cid`, `orderid`, `totalitems`, `subtotal`, `taxrate`, `taxamount`, `totalamount`, `created`) VALUES
(' PI/20-21/0001', 5, '5efdbd0f6f126', 1, 3000, 18, 540, 3540, '2020-07-02'),
(' PI/20-21/0002', 10, '5eff2fdfc112c', 4, 4500, 18, 810, 5310, '2020-07-03'),
(' PI/20-21/0003', 74, '5f017c3816af8', 2, 124000, 18, 22320, 146320, '2020-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `purchasecom`
--

CREATE TABLE `purchasecom` (
  `pcid` int(50) NOT NULL,
  `pcname` varchar(100) NOT NULL,
  `pcadd` varchar(100) NOT NULL,
  `pcmob` bigint(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gst` varchar(30) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchasecom`
--

INSERT INTO `purchasecom` (`pcid`, `pcname`, `pcadd`, `pcmob`, `email`, `gst`, `created`) VALUES
(1, 'Jay Engineering', 'haridarshan estate ctm - 380005', 9737693302, 'jayeng2014@gmail.com', '24AVVPC8158M1ZV', '2020-05-17'),
(4, 'daksh enterprise', 'ctm', 7600158240, 'daksh123@gmail.com', '24AVVPC8158M1BN', '2020-05-11'),
(5, 'Yogesh CA', 'Rambaug maninagar', 9825578255, 'heet.parikh6275@gmail.com', '', '2020-05-11'),
(13, 'Printing and Coding Solution', 'himachal pradesh', 8735003590, 'tc4220@gmail.com', '24AVVPC8158M1ZV', '2020-07-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankdetails`
--
ALTER TABLE `bankdetails`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `clienttype`
--
ALTER TABLE `clienttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invtest`
--
ALTER TABLE `invtest`
  ADD PRIMARY KEY (`orderno`);

--
-- Indexes for table `invtest2`
--
ALTER TABLE `invtest2`
  ADD PRIMARY KEY (`invid`);

--
-- Indexes for table `paidhistory`
--
ALTER TABLE `paidhistory`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `paymode`
--
ALTER TABLE `paymode`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `proforma`
--
ALTER TABLE `proforma`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `fkl` (`cid`),
  ADD KEY `fpk` (`pid`);

--
-- Indexes for table `protest`
--
ALTER TABLE `protest`
  ADD PRIMARY KEY (`orderno`);

--
-- Indexes for table `protest2`
--
ALTER TABLE `protest2`
  ADD PRIMARY KEY (`invid`);

--
-- Indexes for table `purchasecom`
--
ALTER TABLE `purchasecom`
  ADD PRIMARY KEY (`pcid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `clienttype`
--
ALTER TABLE `clienttype`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `invtest`
--
ALTER TABLE `invtest`
  MODIFY `orderno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `paidhistory`
--
ALTER TABLE `paidhistory`
  MODIFY `pay_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `paymode`
--
ALTER TABLE `paymode`
  MODIFY `mid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `proforma`
--
ALTER TABLE `proforma`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `protest`
--
ALTER TABLE `protest`
  MODIFY `orderno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `purchasecom`
--
ALTER TABLE `purchasecom`
  MODIFY `pcid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `proforma`
--
ALTER TABLE `proforma`
  ADD CONSTRAINT `fkl` FOREIGN KEY (`cid`) REFERENCES `client` (`cid`),
  ADD CONSTRAINT `fpk` FOREIGN KEY (`pid`) REFERENCES `products` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
