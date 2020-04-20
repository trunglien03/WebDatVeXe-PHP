drop database if exists quanlyvexe;
create database quanlyvexe;
use quanlyvexe;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `id_chucvu` int(1) NOT NULL,
  `ten_chucvu` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`id_chucvu`, `ten_chucvu`) VALUES
(1, 'Tài xế'),
(2, 'Phụ xe'),
(3, 'Tài xế trung chuyển');

-- --------------------------------------------------------

--
-- Table structure for table `diemruockhach`
--
-- Error reading structure for table nienluannganh.diemruockhach: #1932 - Table 'nienluannganh.diemruockhach' doesn't exist in engine
-- Error reading data for table nienluannganh.diemruockhach: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `nienluannganh`.`diemruockhach`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `diem_ruockhach`
--

CREATE TABLE `diem_ruockhach` (
  `id_diem` char(9) NOT NULL,
  `id_kh` char(9) NOT NULL,
  `id_phieu` char(9) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `diachiruoc` text NOT NULL,
  `ngaydi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diem_ruockhach`
--

INSERT INTO `diem_ruockhach` (`id_diem`, `id_kh`, `id_phieu`, `hoten`, `sdt`, `diachiruoc`, `ngaydi`) VALUES
('RC0607', 'K00579', 'BK9499', 'Nguyễn Hà Giang', '0792367215', '51, đường số 3, KDC Metro, phường Hưng Lợi, quận Ninh Kiều, Cần Thơ', '2019-12-06'),
('RC0912', 'KH0015', 'BK9499', 'La Quỳnh Như', '0908915009', '192 Nguyễn Viết Xuân, phường Trà An, quận Bình Thủy, Cần Thơ', '2019-12-06'),
('RC2194', 'K20520', 'BK5090', 'Nguyễn Minh Khang', '0396467267', 'Cổng A ĐHCT', '07/12/2019'),
('RC8220', 'K00200', 'BK9499', 'Quách Lê Lộc Thọ', '0922657762', '21D Nguyễn Ngọc Trai, phường Xuân Khánh, quận Ninh Kiều, Cần Thơ', '2019-12-06');
-- --------------------------------------------------------

--
-- Table structure for table `hangxe`
--

CREATE TABLE `hangxe` (
  `id_hangxe` int(1) NOT NULL,
  `ten_hangxe` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hangxe`
--

INSERT INTO `hangxe` (`id_hangxe`, `ten_hangxe`) VALUES
(2, 'Huyndai'),
(3, 'Thaco'),
(4, 'Samco'),
(5, 'Univer');

-- --------------------------------------------------------

--
-- Table structure for table `khachdicung`
--

CREATE TABLE `khachdicung` (
  `STT` int(12) NOT NULL,
  `id_KH` char(9) NOT NULL,
  `id_phieu` char(9) NOT NULL,
  `hoten` text NOT NULL,
  `sdt` varchar(12) NOT NULL,
  `vitrighe` varchar(12) NOT NULL,
  `diemruoc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lich_chay`
--

CREATE TABLE `lich_chay` (
  `id_lich` char(9) NOT NULL,
  `fromLoc` varchar(128) NOT NULL,
  `toLoc` varchar(128) NOT NULL,
  `id_loaixe` char(9) NOT NULL,
  `biensoxe` char(12) NOT NULL,
  `ten_taixe` varchar(128) NOT NULL,
  `ten_phuxe` varchar(128) NOT NULL,
  `ngaydi` text NOT NULL,
  `giokhoihanh` text NOT NULL,
  `thoigiandi` time NOT NULL,
  `gioden` text NOT NULL,
  `diemdi` varchar(128) NOT NULL,
  `diemden` varchar(128) NOT NULL,
  `giave` varchar(12) NOT NULL,
  `daban` int(2) NOT NULL,
  `giucho` int(2) NOT NULL,
  `conlai` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lich_chay`
--

INSERT INTO `lich_chay` (`id_lich`, `fromLoc`, `toLoc`, `id_loaixe`, `biensoxe`, `ten_taixe`, `ten_phuxe`, `ngaydi`, `giokhoihanh`, `thoigiandi`, `gioden`, `diemdi`, `diemden`, `giave`, `daban`, `giucho`, `conlai`) VALUES
('LC004649', 'Cần Thơ', 'Kiên Giang', 'LX956190', '65B-021.10', 'Quách Trọng Nhân', 'Nguyễn Trọng Thoại', '04-12-2019, 05-12-2019, 06-12-2019, 07-12-2019', '06:00 AM', '03:00:00', '09:00 AM', 'Bến xe Cần Thơ', 'Bến xe Kiên Giang', '130000', 0, 0, 28),
('LC019963', 'Cần Thơ', 'Tp Hồ Chí Minh', 'LX527621', '65B-317.83', 'Phạm Thái Bình', 'Nguyễn Văn A', '23-10-2019, 25-10-2019, 28-10-2019', '03:00 AM', '03:00:00', '06:00 AM', 'Bến xe Cần Thơ', 'Bến xe Miền Tây', '220000', 2, 2, 18),
('LC214008', 'Cần Thơ', 'Đà Lạt', 'LX006606', '65B-026.89', 'Hứa Trí Tấn', 'Nguyễn Hữu Nghĩa', '04-12-2019, 05-12-2019, 06-12-2019, 07-12-2019', '20:00 PM', '11:00:00', '06:00 AM', 'Bến xe Cần Thơ', 'Bến xe liên tỉnh Đà Lạt', '150000', 2, 3, -2);
-- --------------------------------------------------------

--
-- Table structure for table `loaighe`
--

CREATE TABLE `loaighe` (
  `id_loaighe` int(1) NOT NULL,
  `ten_loaighe` varchar(128) NOT NULL,
  `soghe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loaighe`
--

INSERT INTO `loaighe` (`id_loaighe`, `ten_loaighe`, `soghe`) VALUES
(1, 'Phòng nằm vip 22', 22),
(2, 'Ghế nằm vip 28', 28),
(3, 'Giường nằm thường 40', 40),
(4, 'Giường nằm vip 34', 34);

-- --------------------------------------------------------

--
-- Table structure for table `loai_xe`
--

CREATE TABLE `loai_xe` (
  `id_loaixe` char(9) NOT NULL,
  `ten_hangxe` varchar(32) NOT NULL,
  `ten_loaixe` varchar(32) NOT NULL,
  `maxseat` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai_xe`
--

INSERT INTO `loai_xe` (`id_loaixe`, `ten_hangxe`, `ten_loaixe`, `maxseat`, `status`) VALUES
('LX006606', 'Huyndai', 'Giường nằm vip', 34, 'Đang hoạt động'),
('LX007717', 'Huyndai', 'Giường nằm thường', 40, 'Đang hoạt động'),
('LX527621', 'Thaco', 'Phòng nằm', 22, 'Đang hoạt động'),
('LX956190', 'Univer', 'Ghế nằm', 28, 'Đang hoạt động');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(2) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `pic` varchar(5000) NOT NULL,
  `position` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `pic`, `position`) VALUES
(1, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', '', 'admin'),
(2, 'nhunhu', '202cb962ac59075b964b07152d234b70', '', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` char(9) NOT NULL,
  `hoten` varchar(64) NOT NULL,
  `soCMND` int(12) NOT NULL,
  `ngaysinh` date NOT NULL,
  `quequan` text NOT NULL,
  `thuongtru` text NOT NULL,
  `sdt` tinytext NOT NULL,
  `ngayvaolam` date NOT NULL,
  `chucvu` varchar(64) NOT NULL,
  `fromLoc` varchar(128) NOT NULL,
  `toLoc` varchar(128) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` char(12) NOT NULL,
  `id_noidi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `hoten`, `soCMND`, `ngaysinh`, `quequan`, `thuongtru`, `sdt`, `ngayvaolam`, `chucvu`, `fromLoc`, `toLoc`, `username`, `password`, `id_noidi`) VALUES
('PX013579', 'Nguyễn Phước Thịnh', 351921698, '1970-12-04', 'Cần Thơ', '51 Nguyễn Trãi, phường Lê Bình, quận Cái Răng', '0922216125', '2019-01-01', 'Phụ xe', 'Cần Thơ', 'Lâm Đồng , Đà Lạt', 'PX013579', 'rNp0*+Eo', 7),
('PX020136', 'Nguyễn Hữu Nghĩa', 362518912, '1992-12-01', 'Bạc Liêu', '104 Tầm Vu, KV2, phường Hưng Lợi, quận Ninh Kiều, Cần Thơ', '0905823166', '2019-01-01', 'Phụ xe', 'Cần Thơ', 'Lâm Đồng , Đà Lạt', 'PX020136', '8$aW`&GO', 7),
('PX144338', 'Trần Phan Tuân', 356187216, '1982-09-11', 'Sóc Trăng', 'Số 82/7, KV Yên Thuận, Phường Lê Bình, Quận Cái Răng, Cần Thơ       ', '0913227615', '2017-01-01', 'Phụ xe', 'Cần Thơ', 'An Giang  , Châu Đốc', 'PX144338', 'UA`1P)J`', 7),
('PX186335', 'Thái Thanh Nhật', 362515112, '1982-05-31', 'Cần Thơ', '132/17/27, đường 3/2, Phường Hưng Lợi, Quận Ninh Kiều, Cần Thơ  ', '0886 126 195', '2018-01-12', 'Phụ xe', 'Cần Thơ', 'Cà Mau , Kiên Giang', 'PX186335', 'JA4zj^2D', 7),
('PX201007', 'Phạm Thanh Phong', 362515567, '1985-08-11', 'Bạc Liêu', '112/54C 30/4 phường Xuân Khánh, quận Ninh Kiều, Cần Thơ ', '0796 121 613', '2018-01-02', 'Phụ xe', 'Cần Thơ', 'An Giang  , Châu Đốc', 'PX201007', 'fQr%lmGs', 7),
('PX202164', 'Nguyễn Văn A', 362617821, '1991-12-06', 'Cần Thơ', '28D/12 đường Trần Hưng Đạo, quận Ninh Kiều, Cần Thơ', '0913 134 193', '2017-01-01', 'Phụ xe', 'Cần Thơ', 'Tp Hồ Chí Minh , Bến Tre', 'PX202164', '08pYxFk6', 7),
('PX257507', 'Nguyễn Trọng Thoại', 366177216, '1982-01-01', 'Rạch Giá', '21 Lê Hồng Phong, phường An Thới, quận Bình Thủy, Cần Thơ', '0939216125', '2017-01-01', 'Phụ xe', 'Cần Thơ', 'Châu Đốc , Kiên Giang', 'PX257507', 'B^U<dKrc', 7);

-- --------------------------------------------------------

--
-- Table structure for table `noiden`
--

CREATE TABLE `noiden` (
  `id_noiden` int(2) NOT NULL,
  `id_noidi` int(2) NOT NULL,
  `ten_noiden` varchar(64) NOT NULL,
  `ngaytao` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `noiden`
--

INSERT INTO `noiden` (`id_noiden`, `id_noidi`, `ten_noiden`, `ngaytao`, `status`) VALUES
(1, 1, 'Cần Thơ', '0000-00-00 00:00:00.000000', 1),
(2, 1, 'Tp Hồ Chí Minh', '0000-00-00 00:00:00.000000', 1),
(3, 2, 'Tp Hồ Chí Minh', '0000-00-00 00:00:00.000000', 1),
(4, 3, 'Tp Hồ Chí Minh', '0000-00-00 00:00:00.000000', 1),
(5, 4, 'Tp Hồ Chí Minh', '0000-00-00 00:00:00.000000', 1),
(6, 5, 'Cần Thơ', '0000-00-00 00:00:00.000000', 1),
(7, 5, 'Tp Hồ Chí Minh', '0000-00-00 00:00:00.000000', 1),
(8, 6, 'Cần Thơ', '0000-00-00 00:00:00.000000', 1),
(9, 6, 'Tp Hồ Chí Minh', '0000-00-00 00:00:00.000000', 1),
(10, 7, 'An Giang ', '0000-00-00 00:00:00.000000', 1),
(11, 7, 'Châu Đốc', '0000-00-00 00:00:00.000000', 1),
(12, 7, 'Cà Mau', '0000-00-00 00:00:00.000000', 1),
(13, 7, 'Kiên Giang', '0000-00-00 00:00:00.000000', 1),
(14, 7, 'Lâm Đồng', '0000-00-00 00:00:00.000000', 1),
(15, 7, 'Rạch Giá', '0000-00-00 00:00:00.000000', 1),
(16, 7, 'Tp Hồ Chí Minh', '0000-00-00 00:00:00.000000', 1),
(17, 7, 'Đà Lạt', '0000-00-00 00:00:00.000000', 1),
(18, 8, 'Rạch Giá', '0000-00-00 00:00:00.000000', 1),
(19, 8, 'Tp Hồ Chí Minh', '0000-00-00 00:00:00.000000', 1),
(20, 9, 'Tp Hồ Chí Minh', '0000-00-00 00:00:00.000000', 1),
(21, 10, 'Cần Thơ', '0000-00-00 00:00:00.000000', 1),
(22, 10, 'Tp Hồ Chí Minh', '0000-00-00 00:00:00.000000', 1),
(24, 11, 'Cần Thơ', '2019-10-06 23:44:27.000000', 1),
(26, 11, 'Đà Lạt', '2019-10-07 00:34:39.000000', 1),
(27, 7, 'Bến Tre', '2019-10-11 10:49:08.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `noidi`
--

CREATE TABLE `noidi` (
  `id_noidi` int(2) NOT NULL,
  `ten_noidi` varchar(64) NOT NULL,
  `ngaytao` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `noidi`
--

INSERT INTO `noidi` (`id_noidi`, `ten_noidi`, `ngaytao`, `status`) VALUES
(1, 'An Giang', '2019-10-18 01:26:26.809022', 1),
(2, 'Bạc Liêu', '0000-00-00 00:00:00.000000', 1),
(3, 'Bến Tre', '0000-00-00 00:00:00.000000', 1),
(4, 'Cao Lãnh', '0000-00-00 00:00:00.000000', 1),
(5, 'Châu Đốc', '0000-00-00 00:00:00.000000', 1),
(6, 'Cà Mau', '0000-00-00 00:00:00.000000', 1),
(7, 'Cần Thơ', '0000-00-00 00:00:00.000000', 1),
(8, 'Hà Tiên', '0000-00-00 00:00:00.000000', 1),
(9, 'Hậu Giang', '0000-00-00 00:00:00.000000', 1),
(10, 'Kiên Giang', '0000-00-00 00:00:00.000000', 1),
(11, 'Tp Hồ Chí Minh', '0000-00-00 00:00:00.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phieu_datve`
--

CREATE TABLE `phieu_datve` (
  `id_phieu` char(9) NOT NULL,
  `ma_kh` char(9) NOT NULL,
  `hoten` varchar(256) NOT NULL,
  `diachi` text NOT NULL,
  `didong` varchar(12) NOT NULL,
  `soCMND` varchar(12) NOT NULL,
  `tuyenduong` text NOT NULL,
  `loaixe` text NOT NULL,
  `biensoxe` varchar(256) NOT NULL,
  `ngaydi` text NOT NULL,
  `giodi` text NOT NULL,
  `diemlenxe` text NOT NULL,
  `diemxuongxe` text NOT NULL,
  `sokhach_dicung` int(11) NOT NULL,
  `sove` int(11) NOT NULL,
  `vitrighe` text NOT NULL,
  `ghichu` text NOT NULL,
  `pttt` varchar(255) NOT NULL,
  `tongtien` varchar(255) NOT NULL,
  `ngaydatve` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phieu_datve`
--

INSERT INTO `phieu_datve` (`id_phieu`, `ma_kh`, `hoten`, `diachi`, `didong`, `soCMND`, `tuyenduong`, `loaixe`, `biensoxe`, `ngaydi`, `giodi`, `diemlenxe`, `diemxuongxe`, `sokhach_dicung`, `sove`, `vitrighe`, `ghichu`, `pttt`, `tongtien`, `ngaydatve`) VALUES
('BK0087', 'KH6047', 'Trần Thanh Phong', '61C/12 đường Nguyễn Truyền Thanh, phường Bình Thủy, quận Bình Thủy, Cần Thơ', '0919277853', '361537285', 'Cần Thơ-Đà Lạt', 'LX006606', '65B-026.89', '2019-12-04', '20:00 PM', 'Bến xe Cần Thơ', 'Tại bến', 2, 3, '21, 22, 23', '', 'Booking', '450.000VNĐ', '2019-12-02'),
('BK0650', 'KH7298', 'La Quỳnh Như', '192 Nguyễn Viết Xuân, phường Trà An, quận Bình Thủy, Cần thơ', '0905833531', '362515365', 'Cần Thơ - Tp Hồ Chí Minh', 'LX527621', '', '04/12/2019', '17:00 PM', '192 Nguyễn Viết Xuân, phường Trà An, quận Bình Thủy, Cần Thơ', 'Tại bến', 0, 1, '4', 'Vali kéo ', 'Booking', '220.000 VNĐ', '2019-12-01'),
('BK4882', 'KH4359', 'Nguyễn Kiều Phương', '192 Nguyễn Viết Xuân, phường Trà An, quận Bình Thủy, Cần Thơ', '0913776125', '361921365', 'Cần Thơ - Tp Hồ Chí Minh', 'LX007717', '65B-015.23', '04/12/2019', '15:00 PM', 'Bến xe Cần Thơ', 'Tại bến', 1, 2, '4,5', '', 'Booking', '240.000 VNĐ', '2019-11-29'),
('BK5090', 'KH0492', 'Nguyễn Minh Khang', '22/15 Trần Văn Hoài, phường Xuân Khánh, quận Ninh Kiều, Cần Thơ', '0396467267', '362515365', 'Cần Thơ - Tp Hồ Chí Minh', 'LX007717', '65B-015.23', '07/12/2019', '15:00 PM', 'Bến xe Cần Thơ', 'Tại bến', 1, 2, '12,13', '', 'Booking', '240.000 VNĐ', '2019-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `rid` char(9) NOT NULL,
  `bid` char(9) NOT NULL,
  `fromLoc` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `toLoc` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `thoigiankhoihanh` text NOT NULL,
  `sochuyen` int(2) NOT NULL,
  `fare` double DEFAULT NULL,
  `maxseats` int(10) DEFAULT NULL,
  `status` varchar(65) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`rid`, `bid`, `fromLoc`, `toLoc`, `thoigiankhoihanh`, `sochuyen`, `fare`, `maxseats`, `status`) VALUES
('TD040506', 'LX007717', 'Cần Thơ', 'Cà Mau', '05:00 AM , 06:00 AM , 07:00 AM , 09:30 AM , 10:00 AM , 13:00 PM , 14:30 PM , 15:00 PM , 20:00 PM , 21:00 PM , 03:00 AM', 5, 140000, 40, 'Đang hoạt động'),
('TD056430', 'LX007717', 'Cần Thơ', 'Châu Đốc', '04:00 AM , 06:00 AM , 08:00 AM , 12:00 PM , 13:00 PM , 14:00 PM , 16:00 PM , 18:00 PM', 5, 100000, 40, 'Đang hoạt động'),
('TD169086', 'LX527621', 'Cần Thơ', 'Tp Hồ Chí Minh', '06:00 AM , 09:00 AM , 12:00 PM , 15:00 PM , 17:00 PM , 19:00 PM , 21:00 PM , 03:00 AM', 10, 150000, 34, 'Đang hoạt động'),
('TD180752', 'LX007717', 'Cần Thơ', 'Kiên Giang', '04:30 AM , 06:00 AM , 10:30 AM , 12:30 PM', 10, 110000, 40, 'Đang hoạt động'),
('TD304060', 'LX956190', 'Cần Thơ', 'Kiên Giang', '08:00 AM , 10:00 AM , 12:00 PM , 14:00 PM , 16:00 PM , 18:00 PM', 10, 130000, 40, 'Đang hoạt động'),
('TD347412', 'LX007717', 'Cần Thơ', 'An Giang ', '03:30 AM , 06:30 AM , 09:30 AM , 15:30 PM , 18:30 PM', 5, 110000, 40, 'Đang hoạt động'),
('TD403274', 'LX006606', 'Cần Thơ', 'Tp Hồ Chí Minh', '02:00 AM , 04:00 AM , 08:00 AM , 10:00 AM , 12:00 PM , 14:00 PM , 16:00 PM , 18:00 PM , 20:00 PM', 10, 160000, 34, 'Đang hoạt động'),
('TD500458', 'LX007717', 'Cần Thơ', 'Rạch Giá', '03:30 AM , 06:00 AM , 08:00 AM , 10:00 AM , 12:00 PM , 13:00 PM , 14:00 PM , 15:00 PM , 17:00 PM , 19:00 PM', 5, 125000, 40, 'Đang hoạt động'),
('TD550607', 'LX527621', 'Cần Thơ', 'Đà Lạt', '06:00 AM , 20:00 PM', 20, 480000, 22, 'Đang hoạt động'),
('TD554468', 'LX956190', 'Cần Thơ', 'Cà Mau', '01:30 AM , 08:00 AM , 12:00 PM , 16:00 PM', 5, 100000, 40, 'Đang hoạt động'),
('TD617360', 'LX006606', 'Cần Thơ', 'Đà Lạt', '06:00 AM , 09:00 AM , 12:00 PM , 15:00 PM , 18:00 PM , 21:00 PM , 23:00 PM , 03:00 AM', 10, 150000, 34, 'Đang hoạt động'),
('TD676553', 'LX007717', 'Cần Thơ', 'Tp Hồ Chí Minh', '05:00 AM , 07:00 AM , 09:00 AM , 11:00 AM , 13:00 PM , 15:00 PM , 17:00 PM , 19:00 PM , 21:00 PM , 03:00 AM', 20, 120000, 40, 'Đang hoạt động'),
('TD860670', 'LX007717', 'Cần Thơ', 'Bến Tre', '00:00 AM , 02:00 AM , 04:00 AM , 06:00 AM , 08:00 AM', 5, 110000, 40, 'Đang hoạt động'),
('TD907348', 'LX956190', 'Cần Thơ', 'An Giang ', '04:00 AM , 05:00 AM , 06:00 AM , 07:00 AM , 08:00 AM , 09:00 AM , 10:00 AM , 15:00 PM , 16:00 PM , 17:00 PM , 18:00 PM , 19:00 PM , 03:00 AM', 8, 100000, 34, 'Đang hoạt động');

-- --------------------------------------------------------

--
-- Table structure for table `thanhpholon`
--

CREATE TABLE `thanhpholon` (
  `id_tp` int(1) NOT NULL,
  `ten_tp` varchar(64) NOT NULL,
  `hinhanh` varchar(5000) NOT NULL,
  `diem_den` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thanhpholon`
--

INSERT INTO `thanhpholon` (`id_tp`, `ten_tp`, `hinhanh`, `diem_den`) VALUES
(0, 'Cà Mau', 'assets/images/photo1536894119896-15368941198961336057411.jpg', 'Cần Thơ , Tp Hồ Chí Minh'),
(1, 'Đà Lạt', 'assets/images/dalat.jpg', 'Cần Thơ , Tp Hồ Chí Minh'),
(2, 'Cần Thơ', 'assets/images/CanTho.jpg', 'Cà Mau , Đà Lạt , Kiên Giang , Tp Hồ Chí Minh'),
(3, 'Tp Hồ Chí Minh', 'assets/images/TpHCM.jpg', 'Cần Thơ , Đà Lạt'),
(5, 'Hà Tiên', 'assets/images/HaTien.jpg', 'Cần Thơ , Tp Hồ Chí Minh'),
(6, 'Châu Đốc', 'assets/images/ChâuĐốc.jpg', 'Cần Thơ , Tp Hồ Chí Minh'),
(12, 'Kiên Giang', 'assets/images/KienGiang.jpg', 'Cần Thơ , Tp Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time`) VALUES
('00:00 AM'),
('00:30 AM'),
('01:00 AM'),
('01:30 AM'),
('02:00 AM'),
('02:30 AM'),
('03:30 AM'),
('04:00 AM'),
('04:30 AM'),
('05:00 AM'),
('05:30 AM'),
('06:00 AM'),
('06:30 AM'),
('07:00 AM'),
('07:30 AM'),
('08:00 AM'),
('08:30 AM'),
('09:00 AM'),
('09:30 AM'),
('10:00 AM'),
('10:30 AM'),
('11:00 AM'),
('11:30 AM'),
('12:00 PM'),
('12:30 PM'),
('13:00 PM'),
('13:30 PM'),
('14:00 PM'),
('14:30 PM'),
('15:00 PM'),
('15:30 PM'),
('16:00 PM'),
('16:30 PM'),
('17:00 PM'),
('17:30 PM'),
('18:00 PM'),
('18:30 PM'),
('19:00 PM'),
('19:30 PM'),
('20:00 PM'),
('20:30 PM'),
('21:00 PM'),
('21:30 PM'),
('22:00 PM'),
('22:30 PM'),
('23:00 PM'),
('23:30 PM'),
('03:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `trangthai`
--

CREATE TABLE `trangthai` (
  `id_trangthai` int(1) NOT NULL,
  `ten_trangthai` varchar(128) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trangthai`
--

INSERT INTO `trangthai` (`id_trangthai`, `ten_trangthai`) VALUES
(1, 'Đang hoạt động'),
(2, 'Tạm ngưng hoạt động'),
(3, 'Đang mở'),
(4, 'Đã khóa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(9) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `sdt` char(12) NOT NULL,
  `cmnd` char(12) NOT NULL,
  `diachi` text NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `repassword` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `hoten`, `sdt`, `cmnd`, `diachi`, `username`, `password`, `repassword`) VALUES
('KH0539', 'Lê Chí Tâm', '0913216713', '361278213', '196 Phan Đình Phùng, quận Ninh Kiều, Cần Thơ', 'chitamle', '595f6d7b4c1cf0a0d78bcea5ede8aeab', '595f6d7b4c1cf0a0d78bcea5ede8aeab');

-- --------------------------------------------------------

--
-- Table structure for table `xeluuhanh`
--

CREATE TABLE `xeluuhanh` (
  `bid` char(9) NOT NULL,
  `id_loaixe` char(9) NOT NULL,
  `ten_xe` varchar(32) NOT NULL,
  `tiennghi` varchar(64) NOT NULL,
  `bienkiemsoat` varchar(16) NOT NULL,
  `soghe` text NOT NULL,
  `ten_noidi` varchar(64) NOT NULL,
  `ten_noiden` varchar(64) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xeluuhanh`
--

INSERT INTO `xeluuhanh` (`bid`, `id_loaixe`, `ten_xe`, `tiennghi`, `bienkiemsoat`, `soghe`, `ten_noidi`, `ten_noiden`, `status`) VALUES
('XLH050278', 'LX007717', 'Thaco Mobihome', 'WIFI, Nước suối', '65B-015.23', '40', 'Cần Thơ', 'Tp Hồ Chí Minh', 'Đang hoạt động'),
('XLH104027', 'LX956190', 'Thaco bus', 'WIFI, Nước suối', '65B-251.83', '40', 'Cần Thơ', 'Cà Mau', 'Đang hoạt động'),
('XLH115406', 'LX527621', 'Limosine', 'WIFI, Nước suối, Chăn đắp, Bánh ngọt, Gối, Tivi cá nhân, Ổ sạc', '65B-317.83', '34', 'Cần Thơ', 'Tp Hồ Chí Minh', 'Đang hoạt động'),
('XLH299929', 'LX006606', 'Thaco Mobihome Super', 'WIFI, Nước suối, Chăn đắp', '65B-026.89', '34', 'Cần Thơ', 'Đà Lạt', 'Đang hoạt động');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id_chucvu`);

--
-- Indexes for table `hangxe`
--
ALTER TABLE `hangxe`
  ADD PRIMARY KEY (`id_hangxe`);

--
-- Indexes for table `khachdicung`
--
ALTER TABLE `khachdicung`
  ADD PRIMARY KEY (`STT`);

--
-- Indexes for table `lich_chay`
--
ALTER TABLE `lich_chay`
  ADD PRIMARY KEY (`id_lich`);

--
-- Indexes for table `loaighe`
--
ALTER TABLE `loaighe`
  ADD PRIMARY KEY (`id_loaighe`);

--
-- Indexes for table `loai_xe`
--
ALTER TABLE `loai_xe`
  ADD PRIMARY KEY (`id_loaixe`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manv`);

--
-- Indexes for table `noiden`
--
ALTER TABLE `noiden`
  ADD PRIMARY KEY (`id_noiden`);

--
-- Indexes for table `noidi`
--
ALTER TABLE `noidi`
  ADD PRIMARY KEY (`id_noidi`);

--
-- Indexes for table `phieu_datve`
--
ALTER TABLE `phieu_datve`
  ADD PRIMARY KEY (`id_phieu`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`rid`) USING BTREE,
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `thanhpholon`
--
ALTER TABLE `thanhpholon`
  ADD PRIMARY KEY (`id_tp`);

--
-- Indexes for table `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`id_trangthai`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `xeluuhanh`
--
ALTER TABLE `xeluuhanh`
  ADD PRIMARY KEY (`bid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id_chucvu` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hangxe`
--
ALTER TABLE `hangxe`
  MODIFY `id_hangxe` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `khachdicung`
--
ALTER TABLE `khachdicung`
  MODIFY `STT` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `loaighe`
--
ALTER TABLE `loaighe`
  MODIFY `id_loaighe` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `noiden`
--
ALTER TABLE `noiden`
  MODIFY `id_noiden` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `noidi`
--
ALTER TABLE `noidi`
  MODIFY `id_noidi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `thanhpholon`
--
ALTER TABLE `thanhpholon`
  MODIFY `id_tp` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `id_trangthai` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
