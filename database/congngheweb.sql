-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2016 at 07:39 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `congngheweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE IF NOT EXISTS `billing_details` (
  `billing_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `Street_Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `P_O_Box_No` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `City` text COLLATE utf8_unicode_ci NOT NULL,
  `Mobile_No` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Landline_No` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`billing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`billing_id`, `member_id`, `Street_Address`, `P_O_Box_No`, `City`, `Mobile_No`, `Landline_No`) VALUES
(1, 3, '647 Nguyễn Lương Bằng', '1254', 'Không có', '123456', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE IF NOT EXISTS `cart_details` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`cart_id`, `member_id`, `food_id`, `quantity_id`, `total`, `flag`) VALUES
(1, 3, 15, 1, 350000, 1),
(2, 3, 13, 1, 300000, 1),
(3, 3, 1, 1, 150000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(8, 'Khai Vị'),
(9, 'Món Chay'),
(10, 'Món Khô'),
(11, 'Món Chính');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_symbol` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`currency_id`, `currency_symbol`, `flag`) VALUES
(1, 'VNĐ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_details`
--

CREATE TABLE IF NOT EXISTS `food_details` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `food_description` text COLLATE utf8_unicode_ci NOT NULL,
  `food_price` float NOT NULL,
  `food_photo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `food_category` int(11) NOT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `food_details`
--

INSERT INTO `food_details` (`food_id`, `food_name`, `food_description`, `food_price`, `food_photo`, `food_category`) VALUES
(1, 'Bánh Huế thập cẩm', 'Vì bánh bèo được đổ theo kiểu khác, cũng kiểu Huế nhưng dày hơn, có xoáy nhẹ và đặc biệt dùng tôm tươi giã nhuyễn', 150000, 'banhhue.jpg', 8),
(2, 'Bánh Nam Bộ thập cẩm', 'Gồm bánh it tran, bánh bột lọc và bánh đúc nước cốt dừa mặn', 150000, 'nam-bo-640x480.jpg', 8),
(3, 'Chả giò chuối hải sản', 'Set 5 cuốn sốt mayonaise bên trong và chấm tí sốt pha tương ớt bên ngoài', 125000, 'cha-gio-chuoi-640x480.jpg', 8),
(4, 'Chả giò tôm cua', 'Set 10 cuốn chả giò ăn kèm dưa leo và tương ớt', 120000, 'cha-gio-tom-cua-684x480.jpg', 8),
(5, 'Cà ri chay', 'Cà ri chay, kèo kẹo, sốt hơi sệt nhẹ nhờ chất bột tứa ra từ khoai laing& khoai môn thêm cà tím, ba rô, nấm rơm, tàu hủ ki, thế thôi mà thành món ngon tuyệt, chấm tí muối ớt thì hóa ra nồng nàn sự đời, chẳng nhớ là đang ăn chay nữa (vì Gánh tin có nhiều người giống Gánh, ăn cà ri gà cũng chỉ ăn tuyền nước với rau củ, mê đắm nhất là khoai lang thôi, chẳng thiết đến gà, thì đây, cà ri chay nhà Gánh đây, chấm bánh mì cũng ngon mà ăn kèm bún& giá, húng lủi càng ngon)', 230000, 'ca-ri-chay.jpg', 9),
(6, 'Kiểm chay', 'Chỉ nấu vào các này rằm', 150000, 'kiem-chay.jpg', 9),
(7, 'Lẩu chay', '1 lẩu lớn 4-5 người dùng', 250000, 'lau-nam-chay.jpg', 9),
(8, 'Mắm ruốc chay', 'Khách ghé Nàng Gánh lâu lâu hay ăn chay, đôi khi chỉ là mẻ rau luộc lên, khách đòi làm chút nước tương mằn mặn kiểu nước tương kho để khách chấm rau, thế là đủ', 95000, 'mam-ruoc-chay.jpg', 9),
(9, 'Bún đậu mắm tôm', 'Phần lớn cho 4 người dùng', 220000, 'bun-dau-mam-tom.jpg', 11),
(10, 'Cá bông mú hấp sen và nấm', 'Công phu nhất nằm ở giai đoạn làm nước sốt: nước dùng từ thịt heo, hầm chung ngò rí& hành lá còn nguyên rễ, thêm chút hành tây, hầm lửa riu riu đến khi nước thiệt thơm lừng, sau đó cho dầu hào, nước tương, gia vị vào vừa ăn, tùy theo người nấu mà canh lửa, canh độ sệt và mức thanh tao cho nước sốt.', 980000, 'bong-mu-640x480.jpg', 11),
(11, 'Cá tai tượng chiên xù', 'Cá tai tượng sống làm sạch, bỏ mang ruột, ngâm trong nước muối khoảng 15 phút cho cá bớt nhớt, để ráo nước và chiên vàng đều (chảo nhiều dầu để cá mau chín) và xù đẹp\r\nMón này cuốn ăn kèm với rau sống, bánh ráng và bún. Chấm với mắm nêm.', 380000, 'Caataituong.png', 11),
(12, 'Cánh gà ngào nước mắm', 'Cánh gà ta, chặt miếng vừa ăn, ướp gia vị cho thấm& chiên giòn thật giòn với dầu sôi, vớt ra, để ráo, dùng giấy thấm dầu thấm thiệt kỹ rồi ngào với nước mắm pha chút tiêu đường…', 320000, 'CanhGangao.png', 11),
(13, 'Bún bò xào Nam Bộ', 'Bún bò khô thơm ngon đặc biệt của vùng sông nước Nam Bộ', 300000, 'bun-thit-nuong-cha-gio-nem-lui-280x180.jpg', 10),
(14, 'Bún thịt nướng chả giò', 'Nem truyền thống kết hợp với một chút đặc biệt của nhà hàng sẽ đem đến một khẩu vị tuyệt vời', 250000, 'bun-thit-nuong-cha-gio-nem-lui-280x180.jpg', 10),
(15, 'Cơm chiên cá mặn gà xé', 'Đầy đủ dưỡng chất, âm dương hội tụ', 350000, 'com-chien-ca-man-280x180.jpg', 10),
(16, 'Cơm chiên Dương Châu', 'Dương Châu tàu khựa', 250000, 'com-chien-duong-chau-280x180.jpg', 10),
(17, 'Chè khúc bạch thập cẩm', 'Giải nhiệt cơ thể một cách nhanh chóng đông thời đây cũng là món ăn bổ dưỡng', 35000, 'khuc-bach-tc.jpg', 8),
(18, 'Hạt điều ngào mạch nha', 'Hạt điều bùi kết hợp vị ngọt mát của mạch nha sẽ là món ngon sau bữa ăn chính', 200000, 'hat-dieu-ngao-mach-nha-nuoc-mam.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `passwd` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `question_id` int(5) NOT NULL,
  `answer` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `firstname`, `lastname`, `login`, `passwd`, `question_id`, `answer`) VALUES
(2, 'Đỗ Cường', 'Đạt', 'cuongdat@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '7e16036a55664f22e6511e460ee09d4f'),
(3, 'Nguyễn Hoàng', 'Quân', 'hoangquan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '7e16036a55664f22e6511e460ee09d4f'),
(4, 'Nguyễn Nhữ', 'Hoàng', 'nhuhoang@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, '17ef6ccd6d3c5f5d576d99e606c0950e');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_from` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `message_date` date NOT NULL,
  `message_time` time NOT NULL,
  `message_subject` text COLLATE utf8_unicode_ci NOT NULL,
  `message_text` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message_from`, `message_date`, `message_time`, `message_subject`, `message_text`) VALUES
(1, 'administrator', '2016-05-10', '20:07:57', 'Xin chào thành viên mới', 'Xin chào quý khách đã đên với hệ thống website của nhà hàng Food Plaza. Chúc quý khách có những bữa ăn ngon miệng!');

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE IF NOT EXISTS `orders_details` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `billing_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `StaffID` int(11) NOT NULL,
  `flag` int(1) NOT NULL,
  `time_stamp` time NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`order_id`, `member_id`, `billing_id`, `cart_id`, `delivery_date`, `StaffID`, `flag`, `time_stamp`) VALUES
(1, 3, 1, 1, '2016-05-10', 1, 1, '21:01:01'),
(2, 3, 1, 2, '2016-05-10', 1, 1, '21:01:16'),
(3, 3, 1, 3, '2016-05-10', 0, 0, '21:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `partyhalls`
--

CREATE TABLE IF NOT EXISTS `partyhalls` (
  `partyhall_id` int(11) NOT NULL AUTO_INCREMENT,
  `partyhall_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`partyhall_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `partyhalls`
--

INSERT INTO `partyhalls` (`partyhall_id`, `partyhall_name`) VALUES
(1, 'Hội trường A'),
(2, 'Hội trường B'),
(3, 'Hội trường C'),
(4, 'Hội trường D'),
(5, 'Hội trường E'),
(6, 'Hội trường F'),
(7, 'Hội trường G'),
(8, 'Hội trường H'),
(9, 'Hội trường I');

-- --------------------------------------------------------

--
-- Table structure for table `pizza_admin`
--

CREATE TABLE IF NOT EXISTS `pizza_admin` (
  `Admin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Admin_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pizza_admin`
--

INSERT INTO `pizza_admin` (`Admin_ID`, `Username`, `Password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `polls_details`
--

CREATE TABLE IF NOT EXISTS `polls_details` (
  `poll_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `rate_id` int(11) NOT NULL,
  PRIMARY KEY (`poll_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `quantities`
--

CREATE TABLE IF NOT EXISTS `quantities` (
  `quantity_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity_value` int(5) NOT NULL,
  PRIMARY KEY (`quantity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `quantities`
--

INSERT INTO `quantities` (`quantity_id`, `quantity_value`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_text` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question_text`) VALUES
(1, 'Ngày sinh âm lịch của bạn là gi?'),
(2, 'Màu sắc bạn yêu thích là gì?'),
(3, 'Bạn thích con vật nào?'),
(4, 'Bạn học lại mấy môn trong thời sinh viên?');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `rate_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`rate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rate_id`, `rate_name`) VALUES
(2, 'Rất ngon'),
(3, 'Ngon'),
(4, 'Bình thường'),
(5, 'Tệ'),
(6, 'Quá tệ');

-- --------------------------------------------------------

--
-- Table structure for table `reservations_details`
--

CREATE TABLE IF NOT EXISTS `reservations_details` (
  `ReservationID` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `partyhall_id` int(11) NOT NULL,
  `Reserve_Date` date NOT NULL,
  `Reserve_Time` time NOT NULL,
  `StaffID` int(11) NOT NULL,
  `flag` int(1) NOT NULL,
  `table_flag` int(1) NOT NULL,
  `partyhall_flag` int(1) NOT NULL,
  PRIMARY KEY (`ReservationID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reservations_details`
--

INSERT INTO `reservations_details` (`ReservationID`, `member_id`, `table_id`, `partyhall_id`, `Reserve_Date`, `Reserve_Time`, `StaffID`, `flag`, `table_flag`, `partyhall_flag`) VALUES
(2, 3, 0, 2, '2016-05-25', '20:01:00', 2, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `specials`
--

CREATE TABLE IF NOT EXISTS `specials` (
  `special_id` int(11) NOT NULL AUTO_INCREMENT,
  `special_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `special_description` text COLLATE utf8_unicode_ci NOT NULL,
  `special_price` float NOT NULL,
  `special_start_date` date NOT NULL,
  `special_end_date` date NOT NULL,
  `special_photo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`special_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `specials`
--

INSERT INTO `specials` (`special_id`, `special_name`, `special_description`, `special_price`, `special_start_date`, `special_end_date`, `special_photo`) VALUES
(1, 'Chè khúc bạch thập cẩm', 'Giải nhiệt cơ thể một cách nhanh chóng đông thời đây cũng là món ăn bổ dưỡng', 35000, '2016-05-10', '2016-05-31', 'khuc-bach-tc.jpg'),
(2, 'Hạt điều ngào mạch nha', 'Hạt điều bùi kết hợp vị ngọt mát của mạch nha sẽ là món ngon sau bữa ăn chính', 200000, '2016-05-20', '2016-05-30', 'hat-dieu-ngao-mach-nha-nuoc-mam.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `StaffID` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Street_Address` text COLLATE utf8_unicode_ci NOT NULL,
  `Mobile_Tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`StaffID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `firstname`, `lastname`, `Street_Address`, `Mobile_Tel`) VALUES
(1, 'Nguyễn Nhật', 'Anh', 'Quảng Ngãi', '123458785'),
(2, 'Hoàng Huy', 'Hùng', 'Quảng Nam', '454697466');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE IF NOT EXISTS `tables` (
  `table_id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`table_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `table_name`) VALUES
(1, 'Bàn số 1'),
(2, 'Bàn số 2'),
(3, 'Bàn số 3'),
(4, 'Bàn số 4'),
(5, 'Bàn số 5'),
(6, 'Bàn số 6'),
(7, 'Bàn số 7'),
(8, 'Bàn số 8'),
(9, 'Bàn số 9'),
(10, 'Bàn số 10'),
(11, 'Bàn số 11'),
(12, 'Bàn số 12'),
(13, 'Bàn số 13'),
(14, 'Bàn số 14'),
(15, 'Bàn số 15'),
(16, 'Bàn số 16'),
(17, 'Bàn số 17'),
(18, 'Bàn số 18'),
(19, 'Bàn số 19'),
(20, 'Bàn số 20'),
(21, 'Bàn số 21');

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE IF NOT EXISTS `timezones` (
  `timezone_id` int(11) NOT NULL AUTO_INCREMENT,
  `timezone_reference` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `flag` int(1) NOT NULL,
  PRIMARY KEY (`timezone_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `timezones`
--

INSERT INTO `timezones` (`timezone_id`, `timezone_reference`, `flag`) VALUES
(1, 'GMT +7', 1),
(2, 'GMT +8', 0),
(3, 'GMT +6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
