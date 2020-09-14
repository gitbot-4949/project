SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
--
-- Database: `test`
--




CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


INSERT INTO admin VALUES
("1","admin","test");




CREATE TABLE `client` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(80) NOT NULL,
  `c_add` varchar(200) NOT NULL,
  `mob` bigint(10) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `c_type` varchar(4) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;


INSERT INTO client VALUES
("1","Tatva Health and Wellness","No. 621, Sire Manson, 5th Floor,  Model School Road, Anna Salai, Chennai - 600006 (Tamil Nadu)","8939181369","33AADCK2858E1ZQ","IGST","2020-05-18"),
("4","Shri Venkata Krishna Food Products","Plot No. 86A, 87, Pattabhi Seetha Ramaih Nagar, 3rd Lane, Amravati Road, Guntur - 522002 (A.P)","9703825281","37BCLPK1934P1Z0","IGST","2020-05-19"),
("5","Classic Packaging ","1214C, Vidhur Nagar, Nr. Hawa Bunglow, Indore - 452009 (M.P)","8819999779","23AAUPY2416N1Z0","IGST","2020-05-14"),
("6","Shree Krishna Enterprises","C/o Karuna Nidhan Singh, Kapoorpur, Mishra Bazaar, Ghazipur - 233001 (U.P)","8081828113","09DAOPS2497J1ZQ","IGST","2020-05-19"),
("7","Sri Guru Venkateswara Food Products","46/802/4 Budhawarapeta, Kurnool - 518002 (A.P)","9966645867","37AQQPN9652B1ZE","IGST","2020-05-19"),
("8","Motive Industries","Chakundi, D.c.c. Dankuni, Hooghly -  7123310","8100205266","19ABLFM9215F1ZZ","IGST","2020-05-19"),
("9","Nrun Cosmetics India Pvt Ltd","B-8, Opp. Sagar Industrial Estate, D-block, Ocean Ind. Estate, Dhumal Nagar Waliv, Vasai East, Palghar - 401208 (mh.)","9987396602","27AAGCN1844G1ZH","IGST","2020-05-19"),
("10","Sree Masani Foods","7th Cross Street, Gandhinagar, Sundrapuram, Coimbatore - 641024 (tamil Nadu)","9842211148","33ACEPJ0354N1ZP","IGST","2020-05-19"),
("11","Burrito Icecream","18-12-418/d/3, Nr Omerhotel Babanagar, Chandrayanagutt, Hyderabad - 500005 (Telangana)","9885115522","36AAFPZ6510K1ZA","IGST","2020-05-19"),
("13","Unnati Stationary & Offset","Raipur Road, Dhamtari - 493773 Chattisgarh","7999716211","22BYPPS9145E1Z2","IGST","2020-05-19"),
("14","Rbm Enterprise","Pk Bose Plaza Madhyamgram, Kolkata  - 700129","9007896471","19ABAFR1204J1ZF","IGST","2020-05-19"),
("15","Patel Masala Mill","920 Mahapoli Vill. Tal. Bhiwandi, Dist. Thane - 421302 (mh)","9209977180","27CMRPP3283R1ZU","IGST","2020-05-28"),
("16","Rahul Ice Factory","Hari Sabha Road, Ward No. 1, Po/ps- Rangapara, Dist Sonitpur - 784505 (assam)","9706836549","18AMVPD9860G1ZF","IGST","2020-05-28"),
("17","Parmeshwari Ice-cream Pvt Ltd","G1 Ankur Palace, Opp. Hotel Pind Balluchi , Vijaynagar, Indore - 452010 (m.p)","7746012345","23AAECP7612G1ZN","IGST","2020-05-28"),
("18","Airsonbendito Industries Pvt Ltd","Chak - 16 Ml, Nathan Wali, Sri Ganganagar - 335001 (raj.) ","9414630885","08AARCA0800C1Z5","IGST","2020-06-02"),
("19","Seema Dhanania","1 Lord Sinha Road, Dhanania House, Kolkata - 700071","9830995515","965270272627","IGST","2020-06-05"),
("20","Bharat Beez Bhandar","Gatakodha Jila Sagar, Mp - 470229","9300145039","23BXDPK6212M1ZJ","IGST","2020-06-06"),
("21","Kalyani Provision","Shani Gali Tadoda, Dist. Nadarbar - 425413 (m.h)","9850244331","AXSPP1921A","IGST","2020-06-08"),
("22","KP Tech Machine (india) Pvt. Ltd","K/209, Vishala Land Mark, Above Mery Gold Restaurant, Nr. Palm Hotel, S.p Ring Road Nikol, Ahmedabad - 24","8980001001","24AAECK4993M2ZY","Loc","2020-06-08"),
("23","Tasty Dairy Products","#6 - 5- 35/ 36, Behind Samatha Nursing Home, Karimnagar - 505001 ","9704507571","36ALUPM7969B1ZF","IGST","2020-06-10"),
("24","Minerva Ice Cream","Opp. 2 Town Police Station, Collector Chowk, Adilabad - 504001 (telangana)","9848458764","36APXPP2039Q1ZV","IGST","2020-06-10"),
("25","Ice Burg\'s Ice Cream","Try ing resulr","7600158240","24AVVPC8158M1ZV","IGST","2020-06-14"),
("26","Zippy Edible Products Pvt Ltd","At Talabpur, Thakurdwara Road, Jaspur, Uttrakhand - 244712","9837039445","05AAACZ6936B1ZG","IGST","2020-06-15"),
("27","Roseate Medicare","Vill. Anji Solan - 173212 (h.p)","8894218703","02AAKFR5216P1ZY","IGST","2020-06-19");




CREATE TABLE `detail` (
  `did` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `age` int(20) NOT NULL,
  `job` varchar(50) NOT NULL,
  PRIMARY KEY (`did`),
  KEY `fk` (`id`),
  CONSTRAINT `fk` FOREIGN KEY (`id`) REFERENCES `student` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO detail VALUES
("1","2","22","CEO"),
("2","3","24","CEO");




CREATE TABLE `invtest` (
  `orderno` int(100) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(300) NOT NULL,
  `item_name` varchar(300) NOT NULL,
  `item_desc` varchar(300) NOT NULL,
  `hsn` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `total` int(100) NOT NULL,
  PRIMARY KEY (`orderno`),
  KEY `fks` (`orderid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;


INSERT INTO invtest VALUES
("1","5ef338850fbec","2in1 coder","","8443","1","70000","70000"),
("2","5ef338acf33b9","Inkpad","","8443","20","30","600"),
("3","5ef338acf33b9","Paste Ink","","8443","1","650","650"),
("4","5ef33936c9f9a","CT- 01 HandHeld Manual Coder","","8443","1","90","90"),
("5","5ef33a1d5f516","CT- 01 HandHeld Manual Coder","","8443","2","3000","6000"),
("6","5ef33a1d5f516","Inkpad","","8443","30","30","900");




CREATE TABLE `invtest2` (
  `invid` varchar(100) NOT NULL,
  `cid` int(10) NOT NULL,
  `orderid` varchar(300) NOT NULL,
  `totalitems` int(10) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `taxrate` int(10) NOT NULL,
  `taxamount` int(100) NOT NULL,
  `totalamount` int(100) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`invid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO invtest2 VALUES
(" INV/20-21/0001","8","5ef33a1d5f516","2","6900","18","1242","8142","2020-06-24");




CREATE TABLE `paidhistory` (
  `pay_id` int(50) NOT NULL AUTO_INCREMENT,
  `p_m` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `mode` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `purpose` varchar(100) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;


INSERT INTO paidhistory VALUES
("1","Yogesh CA","300","Google Pay","2020-06-07","gst"),
("4","Jay Engineering","25000","Google Pay","2020-06-09","Machine "),
("5","Akshay Engineering","5000","Paytm","2020-06-09","resc"),
("6","daksh enterprise","3000","Neft from yesbank","2020-06-09","redfg"),
("7","printing and coding solutions","30000","Neft from yesbank","2020-06-05","test"),
("8","Yogesh CA","3500","Paytm","2020-06-06","gdl"),
("9","Akshay Engineering","2000","Neft from yesbank","2020-06-08","tea");




CREATE TABLE `paymode` (
  `mid` int(10) NOT NULL,
  `mode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO paymode VALUES
("1","Google Pay"),
("2","Paytm"),
("3","Neft from yesbank"),
("4","Neft from Sbi"),
("5","Cash"),
("1","Google Pay"),
("2","Paytm"),
("3","Neft from yesbank"),
("4","Neft from Sbi"),
("5","Cash");




CREATE TABLE `products` (
  `p_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `hsn` int(10) NOT NULL,
  `created` date NOT NULL,
  `description` varchar(30) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;


INSERT INTO products VALUES
("1","CT- 01 HandHeld Manual Coder","8443","2020-06-05","Font Kit 2.5 mm"),
("2","CT- 02 Handy Marker for Currogated Cartons","8443","2020-05-10","Font kit 10 mm"),
("3","CT-03 Handy Marker for HDPE Bags","8443","2020-05-10","Font kit 12mm"),
("4","CT-04 Table Top Coder ","8443","2020-03-26","Complete set"),
("5","CT-05 Standard Multipurpose Coder","8443","2020-05-10","Wooden Packing"),
("6","CT-05 Ice Cream Multipurpose Coder","8443","2020-05-10","Includes Wooden Packing"),
("7","2in1 coder","8443","2020-05-05","includes wooden packing"),
("8","Standard Carton Coder","8443","2020-05-14","With Counting Sensor and Delta"),
("14","Inkpad","8443","2020-06-04","white font pad"),
("15","Inkpad Holder","8443","2020-06-04","Black plastic form pad holder"),
("17","High Speed Carton Stracker","8443","2020-06-07","Standard"),
("18","SpgInk","8443","2020-06-08","Antifreeze"),
("19","C - Feeding Rubber","8443","2020-06-08","Carton Feeding Rubber "),
("20","L - Feeding Rubber","8443","2020-06-08","Label Feeding Rubber"),
("21","Paste Ink","8443","2020-06-08","Paste Ink"),
("22","Currogated Carton Ink","8443","2020-06-09","Porous ink"),
("23","HDPE Ink","8443","2020-06-09","Non Porous ink"),
("24","Courier","8443","2020-06-10","courier"),
("25","Black Rubber strip Plain","8443","2020-06-10","Rubber strip"),
("26","Anti-Freeze Fast Dry Ink","8443","2020-06-19","antifreeze");




CREATE TABLE `proforma` (
  `pro_id` int(10) NOT NULL AUTO_INCREMENT,
  `cid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `quantity` int(30) NOT NULL,
  `pvalue` int(50) NOT NULL,
  `overval` int(30) NOT NULL,
  `taxvalue` int(50) NOT NULL,
  `totalvalue` int(50) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `fkl` (`cid`),
  KEY `fpk` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;


INSERT INTO proforma VALUES
("1","15","1","1","3000","3000","540","3540","2020-05-07");




CREATE TABLE `protest` (
  `orderno` int(100) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(300) NOT NULL,
  `item_name` varchar(300) NOT NULL,
  `item_desc` varchar(300) NOT NULL,
  `hsn` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `total` int(100) NOT NULL,
  PRIMARY KEY (`orderno`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;


INSERT INTO protest VALUES
("4","5ef32b8bab487","CT-03 Handy Marker for HDPE Bags","","8443","2","3000","6000"),
("6","5ef32d6af0277","CT-05 Standard Multipurpose Coder","","8443","1","90000","90000");




CREATE TABLE `protest2` (
  `invid` varchar(300) NOT NULL,
  `cid` int(10) NOT NULL,
  `orderid` varchar(300) NOT NULL,
  `totalitems` int(10) NOT NULL,
  `subtotal` int(100) NOT NULL,
  `taxrate` int(10) NOT NULL,
  `taxamount` int(100) NOT NULL,
  `totalamount` int(100) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`invid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO protest2 VALUES
(" PI/20-21/0001","6","5ef32b8bab487","1","6000","18","1080","7080","2020-06-24"),
(" PI/20-21/0002","5","5ef32d6af0277","1","90000","18","16200","106200","2020-06-24");




CREATE TABLE `purchasecom` (
  `pcid` int(50) NOT NULL,
  `pcname` varchar(100) NOT NULL,
  `pcadd` varchar(100) NOT NULL,
  `pcmob` bigint(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gst` varchar(30) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`pcid`),
  UNIQUE KEY `pcname` (`pcname`),
  UNIQUE KEY `pcmob` (`pcmob`),
  UNIQUE KEY `gst` (`gst`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO purchasecom VALUES
("1","Jay Engineering","haridarshan estate ctm - 380005","9737693302","jayeng2014@gmail.com","24AVVPC8158M1ZV","2020-05-17"),
("2","printing and coding solutions","himachal pradesh ","8866077367","9737693302","24avvpc8158m1xy","2020-05-11"),
("3","Akshay Engineering","ctm","8511369124","8511369124","24AVVPC8158CV","2020-05-11"),
("4","daksh enterprise","ctm","7600158240","7600158240","24AVVPC8158M1BN","2020-05-11"),
("5","Yogesh CA","Rambaug maninagar","9825578255","heet.parikh6275@gmail.com","","2020-05-11");




CREATE TABLE `sales_invoice` (
  `invoice_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(50) NOT NULL,
  `date_invoiced` date NOT NULL,
  PRIMARY KEY (`invoice_id`),
  UNIQUE KEY `invoice_no` (`invoice_no`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;


INSERT INTO sales_invoice VALUES
("4","20-21/0001","2020-06-21"),
("5","20-21/0002","2020-06-21"),
("6","20-21/0003","2020-06-21"),
("7","20-21/0004","2020-06-21"),
("8","20-21/0005","2021-01-30"),
("9","20-21/0006","2021-03-30"),
("11","21-22/0001","2021-04-01");




CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mob` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO student VALUES
("2","jay","7600158240"),
("3","vimal","7878787890"),
("4","niraj","8989898990"),
("5","SIMON","8080808088"),
("6","JACOB","7070707077");




CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


INSERT INTO users VALUES
("1","Codex World","codex@gmail.com","1593249475_IMG_20180114_090234_1.jpg","2017-05-09 10:29:29","2017-05-09 10:29:29");




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;