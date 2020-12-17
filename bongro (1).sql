-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 09, 2020 lúc 05:08 PM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bongro`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id_admin` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `fullname`, `email`) VALUES
(1, 'admin', '507f513353702b50c145d5b7d138095c', 'LÆ°u PhÆ°á»›c NhÃ¢n', 'nhozquay7@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cat`
--

DROP TABLE IF EXISTS `tbl_cat`;
CREATE TABLE IF NOT EXISTS `tbl_cat` (
  `id_cat` int(100) NOT NULL AUTO_INCREMENT,
  `name_cat` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cat`
--

INSERT INTO `tbl_cat` (`id_cat`, `name_cat`) VALUES
(1, 'GiÃ y BÃ³ng Rá»•'),
(2, 'Quáº§n Ão BÃ³ng Rá»•'),
(3, 'Phá»¥ Kiá»‡n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id_order` int(100) NOT NULL AUTO_INCREMENT,
  `transaction_code` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `number_product` int(100) NOT NULL,
  `id_product` int(100) NOT NULL,
  `name_product` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `img_product` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `total_product` int(100) NOT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `transaction_code`, `price`, `number_product`, `id_product`, `name_product`, `img_product`, `total_product`) VALUES
(58, 3110376, 400000, 1, 37, 'Bá»™ quáº§n Ã¡o Brooklyn Nets', 'Bá»™ quáº§n Ã¡o Brooklyn Nets', 400000),
(59, 3110376, 420000, 3, 74, 'Balo bÃ³ng rá»• Kyrie Irving Xanh DÆ°Æ¡ng', 'Balo bÃ³ng rá»• Kyrie Irving Xanh DÆ°Æ¡ng', 1260000),
(60, 1497349, 180000, 1, 64, 'TÃºi rÃºt bÃ³ng rá»• Milwaukee Bucks', 'TÃºi rÃºt bÃ³ng rá»• Milwaukee Bucks', 180000),
(61, 1497349, 700000, 1, 45, 'Adidas Originals Men\'s Trefoil T-Shirt', 'Adidas Originals Men\'s Trefoil T-Shirt', 700000),
(62, 1497349, 1950000, 1, 12, 'GiÃ y bÃ³ng rá»• Adidas Pro Bounce Orange', 'Pro Bounce Orange', 1950000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `id_product` int(100) NOT NULL AUTO_INCREMENT,
  `name_product` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `price` int(255) NOT NULL,
  `img_product` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_cat` int(100) NOT NULL,
  `id_trademark` int(100) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`id_product`, `name_product`, `fullname`, `price`, `img_product`, `id_cat`, `id_trademark`) VALUES
(8, 'GiÃ y bÃ³ng rá»• Anta Klay Thompson KT5 Dragon Ball', 'GiÃ y bÃ³ng rá»• Anta Klay Thompson KT5 Dragon Ball', 3490000, 'Giay_Nike1', 1, 1),
(9, 'GiÃ y bÃ³ng rá»• Anta KT4 Klay Thompson Signal', 'GiÃ y bÃ³ng rá»• Anta KT4 Klay Thompson Signal', 3490000, 'Giay_Nike2', 1, 1),
(10, 'GiÃ y bÃ³ng rá»• Anta Klay Thompson KT5 Have Fun in LA	', 'GiÃ y bÃ³ng rá»• Anta Klay Thompson KT5 Have Fun in LA	', 2890000, 'Giay_Nike3', 1, 1),
(12, 'GiÃ y bÃ³ng rá»• Adidas Pro Bounce Orange', 'GiÃ y bÃ³ng rá»• Adidas Pro Bounce Orange', 1950000, 'Giay_Adidas1', 1, 2),
(13, 'GiÃ y bÃ³ng rá»• Adidas Pro Bounce Red', 'GiÃ y bÃ³ng rá»• Adidas Pro Bounce Red', 1950000, 'Giay_Adidas2', 1, 2),
(14, 'GiÃ y bÃ³ng rá»• Adidas Pro Bounce Cloud White Hight', 'GiÃ y bÃ³ng rá»• Adidas Pro Bounce Cloud White Hight', 1950000, 'Giay_Adidas3', 1, 2),
(15, 'GiÃ y bÃ³ng rá»• Adidas Marquee BOOST Hi-Res Coral', 'GiÃ y bÃ³ng rá»• Adidas Marquee BOOST Hi-Res Coral', 1950000, 'Giay_Adidas4', 1, 2),
(16, 'GiÃ y bÃ³ng rá»• Anta KT4 Klay Thompson BHM Shock The Game BlueYellow', 'GiÃ y bÃ³ng rá»• Anta KT4 Klay Thompson BHM Shock The Game BlueYellow', 3490000, 'Giay_Nike4', 1, 1),
(36, 'Bá»™ quáº§n Ã¡o Golden State Warriors', 'Bá»™ quáº§n Ã¡o Golden State Warriors', 400000, 'Ao_Nike1', 2, 3),
(37, 'Bá»™ quáº§n Ã¡o Brooklyn Nets', 'Bá»™ quáº§n Ã¡o Brooklyn Nets', 400000, 'Ao_Nike2', 2, 3),
(38, 'Bá»™ quáº§n Ã¡o Milwaukee Bucks', 'Bá»™ quáº§n Ã¡o Milwaukee Bucks', 400000, 'Ao_Nike3', 2, 3),
(39, 'Bá»™ quáº§n Ã¡o Miami Heat Ä‘en', 'Bá»™ quáº§n Ã¡o Miami Heat Ä‘en', 400000, 'Ao_Nike4', 2, 3),
(40, 'Bá»™ quáº§n Ã¡o Toronto Raptors Ä‘en', 'Bá»™ quáº§n Ã¡o Toronto Raptors Ä‘en', 400000, 'Ao_Nike5', 2, 3),
(41, 'Bá»™ quáº§n Ã¡o Oklahoma City Thunders Xanh', 'Bá»™ quáº§n Ã¡o Oklahoma City Thunders Xanh', 400000, 'Ao_Nike6', 2, 3),
(42, 'Bá»™ quáº§n Ã¡o Los Angeles Lakers Tráº¯ng', 'Bá»™ quáº§n Ã¡o Los Angeles Lakers Tráº¯ng', 400000, 'Ao_Nike7', 2, 3),
(43, 'Adidas Men\'s Harden Swag Art Graphic Tee', 'Adidas Men\'s Harden Swag Art Graphic Tee', 700000, 'Ao_Adidas1', 2, 4),
(44, 'Adidas Ã¡o khoÃ¡c giÃ³ Ä‘en', 'Adidas Ã¡o khoÃ¡c giÃ³ Ä‘en', 750000, 'Ao_Adidas2', 2, 4),
(45, 'Adidas Originals Men\'s Trefoil T-Shirt', 'Adidas Originals Men\'s Trefoil T-Shirt', 700000, 'Ao_Adidas3', 2, 4),
(46, 'Adidas Boys\' Short Sleeve Logo Tee Shirt', 'Adidas Boys\' Short Sleeve Logo Tee Shirt', 700000, 'Ao_Adidas4', 2, 4),
(47, 'Adidas nam Ã¡o khoÃ¡c giÃ³ váº¡ch pháº£n quang', 'Adidas nam Ã¡o khoÃ¡c giÃ³ váº¡ch pháº£n quang', 750000, 'Ao_Adidas5', 2, 4),
(48, 'Adidas nam bá»™ Ä‘Ã´ng mÃ u xÃ¡m', 'Adidas nam bá»™ Ä‘Ã´ng mÃ u xÃ¡m', 750000, 'Ao_Adias6', 2, 4),
(49, 'Adidas nam Ã¡o dÃ i tay khá»§ng long Ä‘en', 'Adidas nam Ã¡o dÃ i tay khá»§ng long Ä‘en', 750000, 'Ao_Adidas7', 2, 4),
(50, 'Adidas nam Ã¡o phÃ´ng M musthaves xanh navy', 'Adidas nam Ã¡o phÃ´ng M musthaves xanh navy', 750000, 'Ao_Adidas8', 2, 4),
(51, 'GiÃ y bÃ³ng rá»• Adidas Dame 6 SPITFIRE', 'GiÃ y bÃ³ng rá»• Adidas Dame 6 SPITFIRE', 2450000, 'Giay_Adidas5', 1, 2),
(52, 'GiÃ y bÃ³ng rá»• Adidas Dame 6 CNY', 'GiÃ y bÃ³ng rá»• Adidas Dame 6 CNY', 2450000, 'Giay_Adidas6', 1, 2),
(53, 'GiÃ y bÃ³ng rá»• ADIDAS Dame 6 Geek Up', 'GiÃ y bÃ³ng rá»• ADIDAS Dame 6 Geek Up', 2450000, 'Giay_Adidas7', 1, 2),
(54, 'GiÃ y bÃ³ng rá»• ADIDAS Dame 5 Asia Tour', 'GiÃ y bÃ³ng rá»• ADIDAS Dame 5 Asia Tour', 2350000, 'Giay_Adidas8', 1, 2),
(56, 'GiÃ y bÃ³ng rá»• Anta Klay Thompson KT5 Low Effect', 'GiÃ y bÃ³ng rá»• Anta Klay Thompson KT5 Low Effect', 2550000, 'Giay_Nike6', 1, 1),
(57, 'GiÃ y bÃ³ng rá»• Anta Klay Thompson KT5 Have Fun', 'GiÃ y bÃ³ng rá»• Anta Klay Thompson KT5 Have Fun', 2550000, 'Giay_Nike5', 1, 1),
(58, 'GiÃ y bÃ³ng rá»• Anta KT5 Bahamas Klay Thompson', 'GiÃ y bÃ³ng rá»• Anta KT5 Bahamas Klay Thompson', 2550000, 'Giay_Nike7', 1, 1),
(59, 'GiÃ y bÃ³ng rá»• Anta KT5 Dragon Fruit Klay Thompson', 'GiÃ y bÃ³ng rá»• Anta KT5 Dragon Fruit Klay Thompson', 2550000, 'Giay_Nike8', 1, 1),
(60, 'Balo bÃ³ng rá»• Lebron', 'Balo bÃ³ng rá»• Lebron', 420000, 'Balo_Nike1', 3, 5),
(61, 'Balo bÃ³ng rá»• Kyrie', 'Balo bÃ³ng rá»• Kyrie', 420000, 'Balo_Nike2', 3, 5),
(62, 'Balo bÃ³ng rá»• Kyrie Äá»	', 'Balo bÃ³ng rá»• Kyrie Äá»', 420000, 'Balo_Nike3', 3, 5),
(64, 'TÃºi rÃºt bÃ³ng rá»• Milwaukee Bucks', 'TÃºi rÃºt bÃ³ng rá»• Milwaukee Bucks', 180000, 'Tui_Adidas1', 3, 6),
(65, 'TÃºi rÃºt bÃ³ng rá»• Golden State Warriors', 'TÃºi rÃºt bÃ³ng rá»• Golden State Warriors', 180000, 'Tui_Adidas2', 3, 6),
(66, 'TÃºi rÃºt bÃ³ng rá»• Los Angeles Lakers', 'TÃºi rÃºt bÃ³ng rá»• Los Angeles Lakers', 180000, 'Tui_Adidas3', 3, 6),
(67, 'TÃºi rÃºt bÃ³ng rá»• Philadelphia 76ers', 'TÃºi rÃºt bÃ³ng rá»• Philadelphia 76ers', 180000, 'Tui_Adidas4', 3, 6),
(68, 'TÃºi rÃºt bÃ³ng rá»• Boston Celtics', 'TÃºi rÃºt bÃ³ng rá»• Boston Celtics', 180000, 'Tui_Adidas5', 3, 6),
(69, 'Balo bÃ³ng rá»• Jordan Äen', 'Balo bÃ³ng rá»• Jordan Äen', 180000, 'Balo_Adidas6', 3, 6),
(70, 'Balo bÃ³ng rá»• Jordan', 'Balo bÃ³ng rá»• Jordan', 180000, 'Balo_Adidas7', 3, 6),
(71, 'Balo bÃ³ng rá»• Jordan Tráº¯ng	', 'Balo bÃ³ng rá»• Jordan Tráº¯ng	', 180000, 'Balo_Adidas8', 3, 6),
(72, 'Balo bÃ³ng rá»• KoBe', 'Balo bÃ³ng rá»• KoBe', 420000, 'Balo_Nike4', 3, 5),
(73, 'Balo bÃ³ng rá»• Kobe TÃ­m', 'Balo bÃ³ng rá»• Kobe TÃ­m', 420000, 'Balo_Nike5', 3, 5),
(74, 'Balo bÃ³ng rá»• Kyrie Irving Xanh DÆ°Æ¡ng', 'Balo bÃ³ng rá»• Kyrie Irving Xanh DÆ°Æ¡ng', 420000, 'Balo_Nike6', 3, 5),
(75, 'Balo bÃ³ng rá»• Jordan Äen Tráº¯ng	', 'Balo bÃ³ng rá»• Jordan Äen Tráº¯ng	', 420000, 'Balo_Nike7', 3, 5),
(76, 'Balo bÃ³ng rá»• Kobe Xanh Blue', 'Balo bÃ³ng rá»• Kobe Xanh Blue', 420000, 'Balo_Nike8', 3, 5),
(78, 'Bá»™ quáº§n Ã¡o Memphis Grizzlies	', 'Bá»™ quáº§n Ã¡o Memphis Grizzlies	', 400000, 'Ao_Nike8', 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_trademark`
--

DROP TABLE IF EXISTS `tbl_trademark`;
CREATE TABLE IF NOT EXISTS `tbl_trademark` (
  `id_trademark` int(100) NOT NULL AUTO_INCREMENT,
  `name_trademark` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_cat` int(100) NOT NULL,
  PRIMARY KEY (`id_trademark`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_trademark`
--

INSERT INTO `tbl_trademark` (`id_trademark`, `name_trademark`, `id_cat`) VALUES
(1, 'GiÃ y Nike', 1),
(2, 'GiÃ y Adidas', 1),
(3, 'Ão Nike', 2),
(4, 'Ão Adidas', 2),
(5, 'Balo Nike', 3),
(6, 'Balo Adidas', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_transaction`
--

DROP TABLE IF EXISTS `tbl_transaction`;
CREATE TABLE IF NOT EXISTS `tbl_transaction` (
  `id_order` int(100) NOT NULL AUTO_INCREMENT,
  `transaction_code` int(100) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_user` int(100) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` int(100) NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `total_number_product` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `date` int(100) NOT NULL,
  `is_active` enum('1') COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT '1',
  `status` enum('0','1','2','') COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`id_order`, `transaction_code`, `fullname`, `id_user`, `username`, `payment`, `phone`, `mail`, `address`, `total_number_product`, `total`, `date`, `is_active`, `status`) VALUES
(18, 3110376, 'LÆ°u PhÆ°á»›c NhÃ¢n', 6, 'kuren9x', 'cod', 893112345, 'nhozquay7@gmail.com', '180 cao lo p4 q8', 4, 1660000, 1607446682, '1', '1'),
(19, 1497349, 'LÆ°u PhÆ°á»›c NhÃ¢n', 6, 'kuren9x', 'cod', 768935514, 'nhozquay7@gmail.com', '180 cao lo p4 q8', 3, 2830000, 1607446945, '1', '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `is_active` enum('0','1') COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `active_token` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `reset_pass_token` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `fullname`, `password`, `email`, `is_active`, `active_token`, `reset_pass_token`) VALUES
(6, 'kuren9x', 'LÆ°u PhÆ°á»›c NhÃ¢n', '31c0cf5e44892f8a6b297ec58a85ba30', 'nhozquay7@gmail.com', NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
