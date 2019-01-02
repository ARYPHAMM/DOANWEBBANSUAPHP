-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 16, 2018 lúc 04:38 PM
-- Phiên bản máy phục vụ: 5.7.21
-- Phiên bản PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cua_hang_ban_sua_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

DROP TABLE IF EXISTS `cthoadon`;
CREATE TABLE IF NOT EXISTS `cthoadon` (
  `ma_hd` int(100) DEFAULT NULL,
  `ma_sua` char(254) DEFAULT NULL,
  `ten_sua` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `gia` double DEFAULT NULL,
  `thanh_tien` double DEFAULT NULL,
  `khuyen_mai` int(11) DEFAULT NULL,
  KEY `fk_masua` (`ma_sua`),
  KEY `fk_khuyenmaicthoadon` (`khuyen_mai`),
  KEY `ma_hd` (`ma_hd`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`ma_hd`, `ma_sua`, `ten_sua`, `so_luong`, `gia`, `thanh_tien`, `khuyen_mai`) VALUES
(1, 'S01', 'SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% ÍT ĐƯỜNG - LỐC 4...', 1, 181, 162.9, 10),
(1, 'S01', 'SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% ÍT ĐƯỜNG - LỐC 4...', 1, 181, 162.9, 10),
(2, 'S01', 'SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% ÍT ĐƯỜNG - LỐC 4...', 1, 181, 162.9, 10),
(3, 'S01', 'SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% ÍT ĐƯỜNG - LỐC 4...', 1, 181, 162.9, 10),
(4, 'S01', 'SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% ÍT ĐƯỜNG - LỐC 4...', 1, 181, 162.9, 10),
(7, 'S11', 'Sữa Bột Dutch Lady Khám Phá (1500g)', 1, 298, 298, 0),
(9, 'S12', 'Sữa Bột Dutch Lady Mama (900g)', 22, 196, 4312, 0),
(11, 'S12', 'Sữa Bột Dutch Lady Mama (900g)', 1, 196, 196, 0),
(13, 'S12', 'Sữa Bột Dutch Lady Mama (900g)', 1, 196, 196, 0),
(15, 'S12', 'Sữa Bột Dutch Lady Mama (900g)', 1, 196, 196, 0),
(17, 'S12', 'Sữa Bột Dutch Lady Mama (900g)', 1, 196, 196, 0),
(27, 'S01', 'SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% ÍT ĐƯỜNG - LỐC 4...', 1, 181, 162.9, 10),
(27, 'S12', 'Sữa Bột Dutch Lady Mama (900g)', 1, 196, 196, 0),
(28, 'S01', 'SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% ÍT ĐƯỜNG - LỐC 4...', 1, 181, 162.9, 10),
(29, 'S01', 'SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% ÍT ĐƯỜNG - LỐC 4...', 1, 181, 162.9, 10),
(29, 'S03', 'SỮA DINH DƯỠNG VINAMILK ÍT ĐƯỜNG - BỊCH 220ML', 1, 6, 6, 0),
(30, 'S12', 'Sữa Bột Dutch Lady Mama (900g)', 1, 196, 196, 0),
(31, 'S12', 'Sữa Bột Dutch Lady Mama (900g)', 1, 196, 196, 0),
(32, 'S01', 'SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% ÍT ĐƯỜNG - LỐC 4...', 1, 181, 162.9, 10),
(33, 'S01', 'SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% ÍT ĐƯỜNG - LỐC 4...', 1, 181, 162.9, 10),
(34, 'S12', 'Sữa Bột Dutch Lady Mama (900g)', 1, 196, 196, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_anh`
--

DROP TABLE IF EXISTS `hinh_anh`;
CREATE TABLE IF NOT EXISTS `hinh_anh` (
  `ma_sua` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh1` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh2` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh3` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `ma_sua` (`ma_sua`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_anh`
--

INSERT INTO `hinh_anh` (`ma_sua`, `hinh_anh1`, `hinh_anh2`, `hinh_anh3`) VALUES
('S01', 'hinh/213491639876d24a0181c5be1d2f17fb.S01(1).png', 'hinh/213491639876d24a0181c5be1d2f17fb.S01(3).jpg', 'hinh/213491639876d24a0181c5be1d2f17fb.S01.png'),
('S02', 'hinh/69c4fbd30916d854d113db23a550dec3.S02(1).jpg', 'hinh/69c4fbd30916d854d113db23a550dec3.S02(2).jpg', 'hinh/69c4fbd30916d854d113db23a550dec3.S02(3).jpg'),
('S02', 'hinh/b99f2a97c92febe5ac973da322b57914.S02(1).jpg', 'hinh/b99f2a97c92febe5ac973da322b57914.S02(2).jpg', 'hinh/b99f2a97c92febe5ac973da322b57914.S02(3).jpg'),
('S02', 'hinh/b1031e9b1a3eb0ca904df6d764ded736.S02(1).jpg', 'hinh/b1031e9b1a3eb0ca904df6d764ded736.S02(2).jpg', 'hinh/b1031e9b1a3eb0ca904df6d764ded736.S02(3).jpg'),
('S02', 'hinh/b184d468da5e0029dc8ea42dc0aa2541.S02(1).jpg', 'hinh/b184d468da5e0029dc8ea42dc0aa2541.S02(2).jpg', 'hinh/b184d468da5e0029dc8ea42dc0aa2541.S02(3).jpg'),
('S03', 'hinh/cb147905512b9374654410b6cbf9c7b5.S03(1).jpg', 'hinh/cb147905512b9374654410b6cbf9c7b5.S03(2).jpg', 'hinh/cb147905512b9374654410b6cbf9c7b5.S03(3).png'),
('S04', 'hinh/f5af23d78725720f5997856039e65a8c.S04(1).png', 'hinh/f5af23d78725720f5997856039e65a8c.S04(2).jpg', 'hinh/f5af23d78725720f5997856039e65a8c.S04(3).jpg'),
('S05', 'hinh/e0b7782a0c54dbbd1e70d423bb154bd5.S05(1).jpg', 'hinh/e0b7782a0c54dbbd1e70d423bb154bd5.S05(3).jpg', 'hinh/e0b7782a0c54dbbd1e70d423bb154bd5.S05.png'),
('S06', 'hinh/88513fb74e717f5cd173fd7dd6d80d1e.S06(1).jpg', 'hinh/88513fb74e717f5cd173fd7dd6d80d1e.S06(2).jpg', 'hinh/88513fb74e717f5cd173fd7dd6d80d1e.S06.png'),
('S07', 'hinh/e22d6d71fb4dbfd2c7fa9254fcb06758.S07(1).jpg', 'hinh/e22d6d71fb4dbfd2c7fa9254fcb06758.S07(3).jpg', 'hinh/e22d6d71fb4dbfd2c7fa9254fcb06758.S07.png'),
('S08', 'hinh/a71f9da380d8088e0027b4a0bb098f6d.S08(1).jpg', 'hinh/a71f9da380d8088e0027b4a0bb098f6d.S08(2).jpg', 'hinh/a71f9da380d8088e0027b4a0bb098f6d.S08(3).jpg'),
('S09', 'hinh/03147e34e1ef34cb78906217dd2eb26b.S09(1).jpg', 'hinh/03147e34e1ef34cb78906217dd2eb26b.S09(3).jpg', 'hinh/03147e34e1ef34cb78906217dd2eb26b.S09.jpg'),
('S10', 'hinh/bcfb49848325a3e74f69a971ec1237aa.S10(1).jpg', 'hinh/bcfb49848325a3e74f69a971ec1237aa.S10(3).jpg', 'hinh/bcfb49848325a3e74f69a971ec1237aa.S10.jpg'),
('S10', 'hinh/6a59d1f64448958fad1ea29d66dba68d.S10(2).jpg', 'hinh/6a59d1f64448958fad1ea29d66dba68d.S10(3).jpg', 'hinh/6a59d1f64448958fad1ea29d66dba68d.S10.jpg'),
('S11', 'hinh/32301220e6f64f5634fab2b01502eb9e.S11(1).jpg', 'hinh/32301220e6f64f5634fab2b01502eb9e.S11(2).jpg', 'hinh/32301220e6f64f5634fab2b01502eb9e.S11.jpg'),
('S12', 'hinh/24697f8a8b500eb992cdb8974c0fc023.S12(1).jpg', 'hinh/24697f8a8b500eb992cdb8974c0fc023.S12(2).jpg', 'hinh/24697f8a8b500eb992cdb8974c0fc023.S12(3).jpg'),
('S13', 'hinh/263098f3be3bf6a68b50ea97ce588cb9.S14(2).jpg', 'hinh/263098f3be3bf6a68b50ea97ce588cb9.S14(3).jpg', 'hinh/263098f3be3bf6a68b50ea97ce588cb9.S14.jpg'),
('S14', 'hinh/c85b75532364d96da5f72ea8614e0f75.S14(2).jpg', 'hinh/c85b75532364d96da5f72ea8614e0f75.S14(3).jpg', 'hinh/c85b75532364d96da5f72ea8614e0f75.S14.jpg'),
('S15', 'hinh/4cee1cfedb313a1a7d7badc2a617741f.S15(2).jpg', 'hinh/4cee1cfedb313a1a7d7badc2a617741f.S15(3).jpg', 'hinh/4cee1cfedb313a1a7d7badc2a617741f.S15.jpg'),
('S16', 'hinh/cc7e16f15206f3ea07718dab2d0c436d.S16(2).jpg', 'hinh/cc7e16f15206f3ea07718dab2d0c436d.S16(3).jpg', 'hinh/cc7e16f15206f3ea07718dab2d0c436d.S16.jpg'),
('S17', 'hinh/f32062b780d6e0d040c40342d904882e.S17(2).jpg', 'hinh/f32062b780d6e0d040c40342d904882e.S17(3).jpg', 'hinh/f32062b780d6e0d040c40342d904882e.S17.jpg'),
('S18', 'hinh/493b3baa5701b5ddae52f57265f2114d.S18(1).jpg', 'hinh/493b3baa5701b5ddae52f57265f2114d.S18(2).jpg', 'hinh/493b3baa5701b5ddae52f57265f2114d.S18(3).jpg'),
('S19', 'hinh/85a620f854d4e6e20582f6aad65260b6.S19(2).jpg', 'hinh/85a620f854d4e6e20582f6aad65260b6.S19(3).jpg', 'hinh/85a620f854d4e6e20582f6aad65260b6.S19.jpg'),
('S20', 'hinh/24d81b62dd16e5142884b1b47dc64513.S20(2).jpg', 'hinh/24d81b62dd16e5142884b1b47dc64513.S20(3).jpg', 'hinh/24d81b62dd16e5142884b1b47dc64513.S20.jpg'),
('S21', 'hinh/b8ab81e3a8d205e1997585eb3db759ee.S03(2).jpg', 'hinh/b8ab81e3a8d205e1997585eb3db759ee.S03(3).png', 'hinh/b8ab81e3a8d205e1997585eb3db759ee.S03.png'),
('S21', 'hinh/b8ab81e3a8d205e1997585eb3db759ee.S03(2).jpg', 'hinh/b8ab81e3a8d205e1997585eb3db759ee.S03(3).png', 'hinh/b8ab81e3a8d205e1997585eb3db759ee.S03.png'),
('S21', 'hinh/b8ab81e3a8d205e1997585eb3db759ee.S03(2).jpg', 'hinh/b8ab81e3a8d205e1997585eb3db759ee.S03(3).png', 'hinh/b8ab81e3a8d205e1997585eb3db759ee.S03.png'),
('S21', 'hinh/b8ab81e3a8d205e1997585eb3db759ee.S03(2).jpg', 'hinh/b8ab81e3a8d205e1997585eb3db759ee.S03(3).png', 'hinh/b8ab81e3a8d205e1997585eb3db759ee.S03.png'),
('S21', 'hinh/6f7283050d021658243a9f19a2d206cb.aplavinamilfix.jpg', 'hinh/6f7283050d021658243a9f19a2d206cb.dielacpedia.jpg', 'hinh/6f7283050d021658243a9f19a2d206cb.ensuremilk.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

DROP TABLE IF EXISTS `hoa_don`;
CREATE TABLE IF NOT EXISTS `hoa_don` (
  `ma_hd` int(100) NOT NULL,
  `tai_khoan` char(100) DEFAULT NULL,
  `ho_ten_nguoi_mua` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` varchar(11) NOT NULL,
  `ngay_mua` datetime DEFAULT NULL,
  `tong_thanh_toan` double DEFAULT NULL,
  `dia_chi` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `phi_van_chuyen` double NOT NULL,
  `tinh_trang` int(11) NOT NULL,
  PRIMARY KEY (`ma_hd`),
  KEY `fk_taikhoan` (`tai_khoan`),
  KEY `fk_tinh_trang` (`tinh_trang`)
) ENGINE=MyISAM AUTO_INCREMENT=523 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`ma_hd`, `tai_khoan`, `ho_ten_nguoi_mua`, `sdt`, `ngay_mua`, `tong_thanh_toan`, `dia_chi`, `phi_van_chuyen`, `tinh_trang`) VALUES
(1, '0306161496', '1', '1', '2018-12-16 20:47:33', 177.9, '1', 15, 0),
(2, '0306161496', '1', '1', '2018-12-16 20:55:45', 177.9, '1', 15, 0),
(3, '0306161496', '1', '1', '2018-12-16 20:55:45', 177.9, '1', 15, 0),
(4, '0306161496', '1', '1', '2018-12-16 20:55:54', 177.9, '1', 15, 0),
(5, '0306161496', '1', '1', '2018-12-16 20:56:04', 15, '1', 15, 0),
(6, '0306161496', '1', '1', '2018-12-16 20:56:04', 15, '1', 15, 0),
(7, '0306161496', '1', '1', '2018-12-16 20:58:27', 313, '1', 15, 0),
(8, '0306161496', '1', '1', '2018-12-16 20:58:27', 15, '1', 15, 0),
(9, '0306161496', '1', '1', '2018-12-16 20:58:50', 4327, '1', 15, 0),
(10, '0306161496', '1', '1', '2018-12-16 20:58:50', 15, '1', 15, 0),
(11, '0306161496', '1', '1', '2018-12-16 20:59:44', 211, '1', 15, 0),
(12, '0306161496', '1', '1', '2018-12-16 20:59:44', 15, '1', 15, 0),
(13, '0306161496', '1', '1', '2018-12-16 21:00:09', 211, '1', 15, 0),
(14, '0306161496', '1', '1', '2018-12-16 21:00:09', 15, '1', 15, 0),
(15, '0306161496', '1', '1', '2018-12-16 21:01:54', 211, '1', 15, 0),
(16, '0306161496', '1', '1', '2018-12-16 21:01:54', 15, '1', 15, 0),
(17, '0306161496', '1', '1', '2018-12-16 21:03:44', 211, '1', 15, 0),
(18, '0306161496', '1', '1', '2018-12-16 21:03:44', 15, '1', 15, 0),
(19, '0306161496', '1', '1', '2018-12-16 21:05:39', 313, '1', 15, 0),
(20, '0306161496', '1', '1', '2018-12-16 21:05:39', 15, '1', 15, 0),
(21, '0306161496', '1', '1', '2018-12-16 21:08:31', 15, '1', 15, 0),
(22, '0306161496', '1', '1', '2018-12-16 21:08:31', 15, '1', 15, 0),
(23, '0306161496', '1', '1', '2018-12-16 21:08:47', 211, '1', 15, 0),
(24, '0306161496', '1', '1', '2018-12-16 21:10:07', 177.9, '1', 15, 0),
(25, '0306161496', '1', '1', '2018-12-16 21:13:49', 15, '1', 15, 0),
(26, '0306161496', '1', '1', '2018-12-16 21:14:33', 177.9, '1', 15, 0),
(27, '0306161496', '1', '1', '2018-12-16 21:17:51', 373.9, '1', 15, 0),
(28, '0306161496', '1', '1', '2018-12-16 21:20:17', 177.9, '1', 15, 0),
(29, '0306161496', '1', '1', '2018-12-16 21:23:30', 183.9, '1', 15, 0),
(30, 'tigertocdono1', '1', '1', '2018-12-16 22:42:34', 211, '1', 15, 0),
(31, 'tigertocdono1', '1', '1', '2018-12-16 22:43:54', 211, '1', 15, 0),
(32, 'tigertocdono1', '1', '1', '2018-12-16 22:44:25', 177.9, '1', 15, 0),
(33, 'tigertocdono1', '1', '1', '2018-12-16 22:45:28', 177.9, '1', 15, 0),
(34, 'tigertocdono1', '1', '1', '2018-12-16 22:47:34', 211, '1', 15, 1);

--
-- Bẫy `hoa_don`
--
DROP TRIGGER IF EXISTS `XOATONGTTRONG`;
DELIMITER $$
CREATE TRIGGER `XOATONGTTRONG` BEFORE INSERT ON `hoa_don` FOR EACH ROW BEGIN
 if NEW.tong_thanh_toan = 0 then
  DELETE FROM hoa_don
  where hoa_don.ma_hd = NEW.ma_hd;
  end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyen_mai`
--

DROP TABLE IF EXISTS `khuyen_mai`;
CREATE TABLE IF NOT EXISTS `khuyen_mai` (
  `phan_tram` int(11) NOT NULL,
  PRIMARY KEY (`phan_tram`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `khuyen_mai`
--

INSERT INTO `khuyen_mai` (`phan_tram`) VALUES
(0),
(3),
(5),
(10),
(15),
(20),
(30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_nguoi_dung`
--

DROP TABLE IF EXISTS `loai_nguoi_dung`;
CREATE TABLE IF NOT EXISTS `loai_nguoi_dung` (
  `ma_loai_nd` int(11) NOT NULL,
  `ten_loai_nd` char(30) CHARACTER SET utf8 DEFAULT NULL,
  `tinh_trang` int(1) NOT NULL,
  PRIMARY KEY (`ma_loai_nd`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loai_nguoi_dung`
--

INSERT INTO `loai_nguoi_dung` (`ma_loai_nd`, `ten_loai_nd`, `tinh_trang`) VALUES
(1, 'admin', 1),
(2, 'thanhvien', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sua`
--

DROP TABLE IF EXISTS `loai_sua`;
CREATE TABLE IF NOT EXISTS `loai_sua` (
  `ma_loai_sua` int(11) NOT NULL AUTO_INCREMENT,
  `ten_loai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinh_trang` bit(1) NOT NULL,
  PRIMARY KEY (`ma_loai_sua`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loai_sua`
--

INSERT INTO `loai_sua` (`ma_loai_sua`, `ten_loai`, `tinh_trang`) VALUES
(1, 'Sữa Bột', b'1'),
(2, 'Sữa Đặc', b'1'),
(3, 'Sữa Nước', b'1');

--
-- Bẫy `loai_sua`
--
DROP TRIGGER IF EXISTS `loaisuakhongkinhdoanh`;
DELIMITER $$
CREATE TRIGGER `loaisuakhongkinhdoanh` BEFORE UPDATE ON `loai_sua` FOR EACH ROW BEGIN
 if NEW.tinh_trang = 0 then
  update sua 
  set sua.tinh_trang = 4
  where sua.loai_sua = NEW.ma_loai_sua;
  ELSE
    update sua 
  set sua.tinh_trang = 1
  where sua.loai_sua = NEW.ma_loai_sua;
  end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_tin_tuc`
--

DROP TABLE IF EXISTS `loai_tin_tuc`;
CREATE TABLE IF NOT EXISTS `loai_tin_tuc` (
  `ma_loai_tt` int(11) NOT NULL,
  `ten_loai_tt` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinh_trang` int(1) NOT NULL,
  PRIMARY KEY (`ma_loai_tt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_tin_tuc`
--

INSERT INTO `loai_tin_tuc` (`ma_loai_tt`, `ten_loai_tt`, `tinh_trang`) VALUES
(1, 'Khuyến mãi', 1),
(2, 'Kinh nghiệm', 1),
(3, 'Sản phẩm', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lua_tuoi`
--

DROP TABLE IF EXISTS `lua_tuoi`;
CREATE TABLE IF NOT EXISTS `lua_tuoi` (
  `loai_tuoi` int(11) NOT NULL AUTO_INCREMENT,
  `tuoi` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`loai_tuoi`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `lua_tuoi`
--

INSERT INTO `lua_tuoi` (`loai_tuoi`, `tuoi`) VALUES
(1, '1 den 3'),
(2, '3 den 6'),
(3, '3 den 6'),
(4, '6 tuổi trở lên'),
(5, 'Người già'),
(6, 'Phụ nữ có thai / cho con bú'),
(7, 'Trẻ biến ăn từ 3 tuổi trở lên'),
(8, 'Trên 1 tuổi'),
(9, 'Trên 6 tháng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

DROP TABLE IF EXISTS `nguoi_dung`;
CREATE TABLE IF NOT EXISTS `nguoi_dung` (
  `tai_khoan` char(100) NOT NULL,
  `mat_khau` char(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ho_ten` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nam_sinh` datetime DEFAULT NULL,
  `email` char(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loai_nguoi_dung` int(11) DEFAULT NULL,
  `dia_chi` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`tai_khoan`),
  KEY `fk_loainguoidung` (`loai_nguoi_dung`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`tai_khoan`, `mat_khau`, `ho_ten`, `nam_sinh`, `email`, `sdt`, `loai_nguoi_dung`, `dia_chi`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'abc', '1998-01-01 00:00:00', 'quoctienphamm@gmail.com', '1234567', 1, '1234567'),
('tigertocdo', 'e10adc3949ba59abbe56e057f20f883e', 'tien', '1998-01-01 00:00:00', 'tigertocdo@gmail.com', '0939432055', 1, 'abc'),
('tigertocdono1', 'e10adc3949ba59abbe56e057f20f883e', '123456', '1998-01-01 00:00:00', 'tigertocdo@gmail.com', '0939432055', 2, 'abc'),
('abc', 'c4ca4238a0b923820dcc509a6f75849b', '1', '0001-01-01 00:00:00', '1@gmail.com', '1', 1, '1'),
('asdasd', '0aa1ea9a5a04b78d4581dd6d17742627', 'dasdasd', '1998-01-01 00:00:00', '1@gmail.com', '1', 1, '1'),
('123asda', '3fa858b65003387d38e5392b1743cce9', 'sdasd', '0001-01-01 00:00:00', '1@gmail.com', '1', 1, '1'),
('sdasdasd1', 'c4ca4238a0b923820dcc509a6f75849b', '1', '1998-01-01 00:00:00', '1@gmail.com', '1', 1, '1'),
('lupym2016', 'e10adc3949ba59abbe56e057f20f883e', 'Nguyễn Minh Huy', '1998-08-16 00:00:00', 'lupym1998@gmail.com', '1234551212', 2, 'TP HCM'),
('0306161496', 'e10adc3949ba59abbe56e057f20f883e', '1', '1998-01-01 00:00:00', '1@gmail.com', '1123123123', 2, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quoc_gia`
--

DROP TABLE IF EXISTS `quoc_gia`;
CREATE TABLE IF NOT EXISTS `quoc_gia` (
  `ma_qc` int(11) NOT NULL AUTO_INCREMENT,
  `ten_qc` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`ma_qc`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `quoc_gia`
--

INSERT INTO `quoc_gia` (`ma_qc`, `ten_qc`) VALUES
(1, 'viet nam'),
(3, 'thái lan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sua`
--

DROP TABLE IF EXISTS `sua`;
CREATE TABLE IF NOT EXISTS `sua` (
  `ma_sua` char(100) NOT NULL,
  `ten_sua` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `loai_sua` int(11) DEFAULT NULL,
  `thuong_hieu` int(11) DEFAULT NULL,
  `xuat_su` int(11) DEFAULT NULL,
  `mo_ta` varchar(20000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `gia` decimal(30,15) DEFAULT NULL,
  `lua_tuoi` int(11) DEFAULT NULL,
  `tinh_trang` int(11) DEFAULT NULL,
  `nam_sx` int(11) DEFAULT NULL,
  `khuyen_mai` int(11) DEFAULT NULL,
  `trang_chu` int(1) NOT NULL,
  PRIMARY KEY (`ma_sua`),
  KEY `loai_sua` (`loai_sua`),
  KEY `thuong_hieu` (`thuong_hieu`),
  KEY `xuat_su` (`xuat_su`),
  KEY `lua_tuoi` (`lua_tuoi`),
  KEY `tinh_trang` (`tinh_trang`),
  KEY `khuyen_mai` (`khuyen_mai`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sua`
--

INSERT INTO `sua` (`ma_sua`, `ten_sua`, `loai_sua`, `thuong_hieu`, `xuat_su`, `mo_ta`, `so_luong`, `gia`, `lua_tuoi`, `tinh_trang`, `nam_sx`, `khuyen_mai`, `trang_chu`) VALUES
('S01', 'SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% ÍT ĐƯỜNG - LỐC 4...', 2, 1, 1, 'Optimum Gold mới, chất lượng được công nhận bởi UKAS - Anh Quốc, với công thức để hấp thu này được bổ sung thêm 20% DHA từ tảo tinh khiết, kết hợp cùng Lutein giúp trẻ phát triển não bộ vượt trội, tăng khả năng nhận thức và học hỏi. Ngoài ra nguồn đạm whey từ sữa giàu Alpha Lactalbumin dễ hấp thu, cùng chất xơ hòa tan FOS và lợi khuẩn Probiotic hỗ trợ sức khỏe hệ tiêu hóa , giúp trẻ hấp thu tốt hơn nguồn dưỡng chất cho sự phát triển trí não và thể chất. 1. DHA từ tảo tinh khiết: Bổ sung thêm 20% DHA từ tảo tinh khiết, giúp đáp ứng hàm lượng theo khuyến nghị hàng ngày của các chuyên gia Y tế thế giới FAO/WHO. 2. Lutein: là chất chống oxy hóa, đóng vai trò quan trọng giúp bảo vệ và phát triển võng mạc mắt. Sự kết hợp độc đáo của DHA, Lutein cùng các dưỡng chất khác như DRA, Omega 3, Omega 6, Taurin và CHolin giúp phát triển não bộ, thị giác tốt hơn, tăng khả năng nhận thức và học hỏi của trẻ. 3. Đạm whey giàu Alpha - Lactalbumin: là loại đạm dễ hấp thu, cung cấp lượng axit amin thiết yếu cao, cân đối cùng tỷ lệ đạm whey casein phù hợp giúp trẻ dễ tiêu hóa hấp thu, hõ trợ hoạt động hệ tiêu hóa của trẻ. Chất xơ hòa tan FOS và hệ men vi sinh Bifidobacterium, BB-12 và Lactobaclllus, rhamnosus GG, LGG giúp tăng vi khuẩn có lợi, ức chế vi khuẩn có hại, hỗ trợ hệ tiêu hóa của trẻ khỏe mạnh, giúp nhuận trường, tăng khả năng hấp thụ các dưỡng chất thiết yếu. 4. Dưỡng chất thiết yếu giúp tăng sức đề kháng và chiều cao: - Các vitamin và khoáng chất thiết yếu như A, D3, C, kẽm, Selen và hỗn hợp Nucleotid giúp tăng cường sức đề kháng, hỗ trợ hệ miễn dịch của trẻ, bảo vệ khỏi các bệnh nhiễm khuẩn thông thường. - Giàu Vitamin D và Canxi với tỷ lệ Canxi:Phốt pho thích hợp giúp trẻ phát triển tốt hệ xương và chiều cao. Sữa cho trẻ sơ sinh từ 0 6 tháng tuổi Optimum Gold 1 có bổ sung thêm 20% DHA từ tảo tinh khiết, giúp đáp ứng hàm lượng theo khuyến nghị hằng ngày của các chuyên gia y tế Thế giới FAO/WHO.', 100, '181.000000000000000', 1, 3, 2018, 10, 1),
('S02', 'SỮA TƯƠI TIỆT TRÙNG VINAMILK 100% ÍT ĐƯỜNG - LỐC 4 HỘP X 180ML', 3, 1, 1, '• Được làm từ 100% sữa bò tươi nguyên chất từ những nông trại rộng lớn trải dài khắp Việt Nam, giàu các dưỡng chất tự nhiên, tươi ngon & bổ dưỡng. • Bổ sung Vitamin D3 theo chuẩn EFSA Châu Âu giúp hỗ trợ miễn dịch, cho cả gia đình thêm khỏe mạnh để luôn sẵn sàng làm tốt những công việc quan trọng mỗi ngày. Lưu ý: Không dành cho trẻ dưới 1 tuổi ________________________________________ Cho bé uống sữa hằng ngày tưởng như là chuyện đơn giản, nhưng lại có bao vấn đề nảy sinh cần tháo gỡ. Trong vô vàn “tâm sự” của các bà mẹ như loại sữa nào tốt, mua sữa bột hay sữa tươi, mua sữa ở đâu rẻ lại đảm bảo uy tín, an toàn.....5 câu hỏi sau đây được xem là thường gặp nhất. Cùng giúp các mẹ gỡ rối nhé. Độ tuổi nào thì nên cho bé uống sữa bò? Các chuyên gia dinh dưỡng khuyên rằng trẻ dưới 6 tháng tuổi nên được bú hoàn toàn bằng sữa mẹ. Tuy nhiên, có một số trường hợp mẹ không đủ sữa cho bé bú thì có thể lựa chọn các loại sữa dành riêng cho trẻ sơ sinh. Từ 6 tháng tuổi trở lên, mẹ có thể kết hợp vừa cho bé ăn dặm và uống thêm các loại sữa bột phù hợp với độ tuổi này như Dielac Alpha, Dielac Alpha Gold, Dielac Optimun,… để bổ sung đầy đủ dưỡng chất cho trẻ. Khi bé yêu tròn 1 tuổi, mẹ có thể đổi khẩu vị cho bé bằng các loại sữa tươi. Thời điểm nào trong ngày thích hợp cho bé uống sữa? Bé có thể uống sữa bất cứ thời điểm nào trong ngày. Mẹ chỉ cần lưu ý một chút là không nên cho bé uống sữa khi bé quá no hoặc quá đói, còn lại đều tốt. Trong đó, 3 thời điểm được nhiều bà mẹ lựa chọn nhất, đó là bữa sáng, bữa chiều và bữa tối – trước khi đi ngủ.', 10000, '28.000000000000000', 1, 1, 2018, 5, 1),
('S03', 'SỮA DINH DƯỠNG VINAMILK ÍT ĐƯỜNG - BỊCH 220ML', 3, 1, 1, 'Sữa bịch Vinamilk không chỉ là nguồn dưỡng chất thiết yếu mà còn thật tiết kiệm, giúp bạn và gia đình thưởng thức cuộc sống tươi đẹp trọn vẹn.', 10000, '6.000000000000000', 1, 1, 2018, 0, 1),
('S04', 'CREAMER ĐẶC NGÔI SAO PHƯƠNG NAM XANH LÁ - HỘP GIẤY 1284G', 2, 1, 1, 'Ngôi Sao Phương Nam là “Thương hiệu được chọn mua nhiều nhất” (*), được người tiêu dùng tin tưởng và sử dụng phổ biến trong các công thức chế biến như bánh flan, sinh tố, yogurt… Đặc biệt, Ngôi Sao Phương Nam là bí quyết không thể thiếu để pha ly cà phê sữa thơm ngon, đúng điệu nhờ vào độ sánh đặc, thơm béo. Sản phẩm được sử dụng phù hợp cho cả gia đình. (*) Trong Ngành hàng Sữa đặc có đường – theo nghiên cứu của Kantar Worldpanel Brand Footprint 2015 – 4 thành phố chính Việt Nam. Giấy chứng nhận được cấp ngày 11 tháng 01 năm 2016.', 10000, '55.000000000000000', 4, 1, 2018, 0, 0),
('S05', 'SỮA ĐẶC CÓ ĐƯỜNG ÔNG THỌ CHỮ XANH - HỘP THIẾC 380G', 2, 1, 1, 'Sữa đặc có đường Ông Thọ có mặt trên thị trường gần 40 năm qua, sản phẩm Sữa đặc Ông Thọ luôn được người tiêu dùng tin tưởng và chọn lựa nhờ vào chất lượng sản phẩm ổn định, hình ảnh quen thuộc. Sữa đặc Ông Thọ với độ đạm cao, vị thơm ngon đậm đà, sánh đặc, là bí quyết không thể thiếu giúp mẹ chăm sóc cả nhà bằng những món ngon tinh tế, hấp dẫn: từ ly sữa nóng thơm ngon bổ dưỡng cho ông bà, mẻ sữa chua sánh mịn cho con gái, ly sinh tố béo ngậy cho con trai, ly cà phê sữa đậm đà khiến bố mê mẩn hay mẻ bánh flan cho cả gia đình vào ngày cuối tuần. Sữa đặc có đường Ông Thọ - Với độ đạm cao, cung cấp nguồn dinh dưỡng cần thiết mỗi ngày cho cả gia đình - Là bí quyết giúp các món ăn thêm ngon miệng, hấp dẫn nhờ vào độ sánh đặc, ngọt thanh, béo ngậy', 100000, '20.000000000000000', 4, 1, 2018, 0, 1),
('S06', 'SỮA ĐẶC CÓ ĐƯỜNG </br>ÔNG THỌ ĐỎ - HỘP GIẤY 1284G', 2, 1, 1, 'Sữa đặc có đường Ông Thọ có mặt trên thị trường gần 40 năm qua, sản phẩm Sữa đặc Ông Thọ luôn được người tiêu dùng tin tưởng và chọn lựa nhờ vào chất lượng sản phẩm ổn định, hình ảnh quen thuộc. Sữa đặc Ông Thọ với độ đạm cao, vị thơm ngon đậm đà, sánh đặc, là bí quyết không thể thiếu giúp mẹ chăm sóc cả nhà bằng những món ngon tinh tế, hấp dẫn: từ ly sữa nóng thơm ngon bổ dưỡng cho ông bà, mẻ sữa chua sánh mịn cho con gái, ly sinh tố béo ngậy cho con trai, ly cà phê sữa đậm đà khiến bố mê mẩn hay mẻ bánh flan cho cả gia đình vào ngày cuối tuần. Sữa đặc có đường Ông Thọ - Với độ đạm cao, cung cấp nguồn dinh dưỡng cần thiết mỗi ngày cho cả gia đình - Là bí quyết giúp các món ăn thêm ngon miệng, hấp dẫn nhờ vào độ sánh đặc, ngọt thanh, béo ngậy', 10000, '62.000000000000000', 1, 1, 2018, 0, 0),
('S07', 'CREAMER ĐẶC NGÔI SAO PHƯƠNG NAM XANH LÁ - HỘP THIẾC 380G', 2, 1, 1, 'Ngôi Sao Phương Nam là “Thương hiệu được chọn mua nhiều nhất” (*), được người tiêu dùng tin tưởng và sử dụng phổ biến trong các công thức chế biến như bánh flan, sinh tố, yogurt… Đặc biệt, Ngôi Sao Phương Nam là bí quyết không thể thiếu để pha ly cà phê sữa thơm ngon, đúng điệu nhờ vào độ sánh đặc, thơm béo. Sản phẩm được sử dụng phù hợp cho cả gia đình. (*) Trong Ngành hàng Sữa đặc có đường – theo nghiên cứu của Kantar Worldpanel Brand Footprint 2015 – 4 thành phố chính Việt Nam. Giấy chứng nhận được cấp ngày 11 tháng 01 năm 2016.', 10000, '17.000000000000000', 1, 2, 2018, 0, 1),
('S08', 'SỮA BỘT VINAMILK DIELAC ALPHA 4 - HỘP THIẾC 900G', 1, 1, 1, 'Từ 1 - 6 tuổi là giai đoạn trẻ tăng trưởng bứt phá về chiều cao cũng như cấu trúc não bộ cũng dần hoàn thiện. Trong giai đoạn này, cơ thể trẻ cần được cung cấp đầy đủ các dưỡng chất thiết yếu giúp tăng chiều cao, mau lớn, khỏe mạnh và hoàn thiện não bộ. Dielac Alpha 4 với công thức 3 trong 1 cung cấp đầy đủ các dưỡng chất thiết yếu hỗ trợ phát triển não bộ, giúp tăng cân, chiều cao và tăng sức đề kháng. Sản phẩm được nghiên cứu đáp ứng Nhu cầu dinh dưỡng khuyến nghị RNI của Bộ Y Tế Việt Nam Sữa bột trẻ em Dielac Alpha 4 với công thức IQ là sản phẩm ứng dụng thành công Lutein từ nghiên cứu của tập đoàn dinh dưỡng DSM - Thụy Sĩ, đáp ứng nhu cầu dinh dưỡng đặc thù cho trẻ em Việt Nam, giúp thúc đẩy phát triển não bộ, và thể chất toàn diện HỖ TRỢ PHÁT TRIỂN NÃO BỘ VÀ THỊ GIÁC DHA(1), ARA, Cholin, Taurin và các axít béo thiết yếu Linoleic, Alpha-linolenic là những dưỡng chất quan trọng cho sự hình thành, phát triển và hoàn thiện não bộ, đặc biệt bổ sung thêm Lutein là một trong những carotenoid chống oxy hóa giúp bảo vệ và hỗ trợ phát triển thị giác, tăng khả năng học hỏi, tiếp thu, ghi nhớ của trẻ. HỖ TRỢ TĂNG CÂN, TĂNG CHIỀU CAO Giàu năng lượng, các vitamin và khoáng chất thiết yếu, bổ sung chất xơ hòa tan Inulin & Oligofructose được chiết xuất từ thực vật hỗ trợ hệ tiêu hóa khoẻ mạnh, giúp hấp thu các dưỡng chất để trẻ tăng cân tốt hơn. Ngoài ra, bổ sung Vitamin D3 cao(*), Canxi & Phốt pho, Magie, vitamin K giúp hệ xương vững chắc và phát triển tốt chiều cao của trẻ. HỖ TRỢ TĂNG CƯỜNG SỨC ĐỀ KHÁNG Sữa non Colostrum là sữa bò được vắt ra trong 48 giờ đầu sau khi sinh chứa rất nhiều kháng thể và các vi chất Kẽm, Selen, vitamin A, D, C giúp tăng cường sức đề kháng, hỗ trợ miễn dịch, bảo vệ trẻ luôn khỏe mạnh, chống lại các bệnh nhiễm khuẩn khi tiếp xúc nhiều hơn với môi trường Cùng với bữa ăn hàng ngày , sử dụng Dielac Apha 4 có bổ sung DHA giúp đáp ứng theo khuyến nghị của FAO/WHO (2010) Đáp ứng nhu cầu dinh dưỡng khuyến nghị (DR) mới nhất của tổ chức IOM- Mỹ.', 100, '168.000000000000000', 1, 1, 2018, 0, 0),
('S09', ': SỮA BỘT VINAMILK DIELAC ALPHA GOLD IQ STEP 3 - HỘP THIẾC 1500G', 1, 1, 1, 'Giai đoạn từ 1 - 2 tuổi diễn ra những chuyển biến quan trọng trong sự phát triển não bộ. Tại cột mốc 2 tuổi, bộ não của trẻ đã phát triển bằng 80% bộ não của một người trưởng thành và cần những dưỡng chất đặc biệt giúp hoàn chỉnh hệ thống não bộ tạo tiền đề cho sự phát triển trí tuệ, khả năng ngôn ngữ và khả năng tư duy. Dielac Alpha Gold IQ 3 với công thức IQ là sản phẩm ứng dụng thành công Lutein từ nghiên cứu của tập đoàn dinh dưỡng DSM - Thụy Sĩ, đáp ứng nhu cầu dinh dưỡng đặc thù cho trẻ em Việt Nam, giúp thúc đẩy phát triển não bộ và thể chất toàn diện. Công dụng sản phẩm: Phát triển não bộ (DHA, ARA, Lutein) Hỗ trợ trí nhớ (Cholin) Phát triển chiều cao (Canxi, Vitamin D3) Hỗ trợ phát triển trí não Bổ sung gấp 3 lần DHA(*), kết hợp với ARA , axit Alpha – linoleic, axit Linoleic, Taurin và Lutein tạo thành hệ thống dưỡng chất thiết yếu cho sự phát triển của não bộ, võng mạc mắt, giúp tăng cường khả năng nhận thức của trẻ. Cholin được bổ sung gấp đôi(*), là tiền tố tổng hợp Phosphatidylcholin và Acetylcholin , đóng vai trò quan trọng trong việc tạo cấu trúc màng tế vào thần kinh, hỗ trợ dẫn truyền xung thần kinh, giúp ghi nhớ và tăng cường khả năng học hỏi của trẻ. (*) So với sản phẩm Dielac Alpha. Cùng với bữa ăn hằng ngày, sử dụng Dielac Alpha Gold IQ giúp cung cấp lượng DHA theo khuyến nghị của FAO/WHO (2010) Phát triển thể chất, chiều cao Tỉ lệ Canxi và Phốt pho thích hợp, cùng với hàm lượng Vitamin D3(**), Vitamin K, Magiê giúp phát triển hệ xương và răng của trẻ chắc khỏe, phát triển tốt về chiều cao Giàu các dưỡng chất và vitamin, khoáng chất cần thiết cho nhu cầu phát triển thể chất cho trẻ trong giai đoạn này. (**) Bổ sung theo nhu cầu dinh dưỡng khuyến nghị (DRI) mới nhất của tổ chức IOM-Hoa Kỳ. Tăng sức đề kháng và sức khỏe hệ tiêu hóa Các vi chất Kẽm, Selen, Vitamin A, D3, C giúp tăng cường sức đề kháng, bảo vệ trẻ luôn khoẻ mạnh, chống lại các bệnh nhiểm khuẩn khi tiếp xúc nhiều hơn với môi trường xung quanh. Chất xơ hoà tan Oligofructose(FOS) cùng hệ men vi sinh Bifidobacterium, BB-12TM và Lactobacillus rhamnosus GG, LGGTM giúp tăng cường hệ vi khuẩn có lợi cho đường ruột, hỗ trợ hệ tiêu hoá của trẻ khoẻ mạnh, giúp nhuận tràng từ đó hấp thu các chất dinh dưỡng tốt hơn. BB-12TM là thương hiệu của Chr. Hansen A/S & LGGTM là thương hiệu của Valio Ltd. Đối tượng sử dụng: dành cho trẻ từ 1-2 tuổi', 1000, '369.000000000000000', 1, 1, 2018, 0, 1),
('S10', 'Sữa Tươi Tiệt Trùng TH True Milk Nguyên Chất Hộp 1 L', 3, 2, 1, 'Sữa Tươi Tiệt Trùng TH True Milk Nguyên Chất Hộp 1 L có xuất xứ nguyên liệu đầu vào sử dụng hoàn toàn sữa tươi sạch nguyên chất của trang trại TH. Đạt tiêu chuẩn về hệ thống quản lý vệ sinh an toàn thực phẩm ISO 22000:2005 do tổ chức quốc tế BUREAU- VERITAS cấp.Đạt Chứng Nhận Sản Phẩm Phù Hợp Quy Chuẩn Kỹ Thuật của cục an toàn thực phẩm theo số 21295/2014/ATTP-TNCB Sữa Tươi Tiệt Trùng TH True Milk Nguyên Chất Hộp 1 L được áp dụng Công nghệ ESL hiện đại của CHLB Đức – Công nghệ xử lý kết hợp nhiệt độ và thời gian phù hợp cho phép loại bỏ gần như tuyệt đối các loại vi khuẩn. Sữa được rót ở điều kiện vô trùng trong bao bì đặc biệt 6 lớp giúp sản phẩm an toàn và giữ vẹn nguyên giá trị dinh dưỡng và hương vị thơm ngon tự nhiên trong 30 ngày. Hướng dẫn bảo quản và sử dụng : Luôn vận chuyển và bảo quản nghiêm ngặt ở 2- 6 °C trong suốt thời hạn sử dụng. Sau khi mở hộp, bảo quản lạnh ở 4-10 độ C và sử dụng hết trong vòng 3 ngày. Ngon hơn khi uống lạnh. Thông tin thương hiệu: Công ty cổ phần Sữa TH đã giới thiệu ra thị trường sản phẩm sữa sạch TH true Milk tại xã Nghĩa Sơn, huyện Nghĩa Đàn, tỉnh Nghệ An. Đây là thành quả của dự án Chăn nuôi bò sữa và chế biến sữa sạch quy mô lớn của Đông Nam Á với số vốn đầu tư lên đến 1,2 tỷ USD. Bằng sự ra đời của các sản phẩm TH true Milk, Công ty cổ phần Sữa TH đang từng bước khẳng định mục tiêu trở thành nhà sản xuất hàng đầu trong ngành hàng thực phẩm sạch có nguồn gốc từ thiên nhiên. Với quy trình sản xuất sữa sạch, TH True Milk có đội ngũ chuyên gia từ Israel tư vấn và theo dõi cách chăm sóc bò đúng chuẩn, công nhân tham gia quản lý quy trình được đào tạo nghiêm ngặt trước khi vào lao động trong trang trại. Mô hình và dây truyền sản xuất của TH True Milk được xây dựng theo một chuỗi mắt xích hoàn hảo mang lại những sản phẩm chất lượng vượt trội, đáp ứng được nhu cầu của đông đảo người tiêu', 1000, '32.000000000000000', 8, 1, 2018, 0, 0),
('S11', 'Sữa Bột Dutch Lady Khám Phá (1500g)', 1, 4, 1, 'Sữa Bột Dutch Lady Khám Phá (1500g) chứa các hệ dưỡng chất cần thiết cho nhu cầu của cơ thể bé những năm đầu đời như DHA, Đạm, Sắt, Canxi, Vitamin và các khoáng chất thiết yếu khác. DHA (DocosaHexaenoicAacid) là axít béo không no cần thiết, thuộc nhóm axít béo Omega-3, được chứng minh có vai trò thiết yếu trong việc hỗ trợ phát triển cấu trúc não bộ và võng mạc ở trẻ em. Selen và Kẽm có vai trò rất quan trọng đối với sức khỏe và sự tăng trưởng của trẻ nhỏ, đặc biệt với hệ miễn dịch. Bổ sung Selenium sẽ tăng cường và phục hồi khả năng miễn dịch, ngoài ra còn có vai trò trong phục hồi cấu trúc di truyền, giải độc một số kim loại nặng. Kẽm làm tăng khả năng hấp thụ dinh dưỡng ở trẻ và giúp trẻ có cảm giác ngon miệng hơn khi ăn. FOS (Fructo-oligosaccharides) là một thành phần chất xơ có nguồn gốc tự nhiên, rất tốt cho sự phát triển thể chất và trí não, đồng thời FOS cũng kích thích vi khuẩn có lợi ở ruột già và ức chế vi khuẩn có hại gây bệnh đường ruột. Vitamin (E, C, nhóm B) và các khoáng chất như Sắt, Photpho, Magie... được bổ sung trong sữa bột Dutch Lady – Khám phá đóng một vai trò quan trọng trong việc hoàn thiện hệ miễn dịch và tăng sức đề kháng. Sản phẩm đáp ứng đầy đủ nhu cầu dinh dưỡng của bé trong giai đoạn 2 - 4 tuổi.', 1000, '298.000000000000000', 1, 1, 2018, 0, 0),
('S12', 'Sữa Bột Dutch Lady Mama (900g)', 1, 4, 1, 'Sữa Bột Dutch Lady Mama (900g) là nguồn dinh dưỡng bổ sung hoàn hảo cho các bà mẹ đang trong thời kỳ mang thai giúp mẹ có một cơ thể khỏe mạnh đầy đủ dưỡng chất. Với công thức đặc biệt được bổ sung Axit Folic, sẽ giúp thai nhi phát triển khỏe mạnh, tránh được các biến cố hay bệnh tật bẩm sinh nguy hiểm cho thai nhi, trong đó có bệnh khuyết tật ống thần kinh – một căn bệnh có thể gây ra sự hở xương sống, hở hộp sọ và thậm chí là vô não cho bào thai. Để hỗ trợ phát triển não bộ ở thai nhi sữa bột còn bổ sung thêm DHA có vai trò quan trọng trong việc hoàn thiện, phát triển não bộ và thị giác trong suốt quá trình mang thai và giai đoạn đầu đời của trẻ. Bổ sung đầy đủ DHA có thể làm tăng chỉ số thông minh (IQ) và hỗ trợ phát triển võng mạc, hệ thần kinh. Sữa bột Dutch Lady Mama còn bổ sung các khoáng chất cần thiết tăng cường Canxi và Sắt cho các mẹ trong thời kỳ mang thai, phòng ngừa bệnh thiếu máu, giúp phát triển hệ xương cứng cáp cho bé yêu, đây là những khoáng chất rất cần thiết cho các bà mẹ đang trong thời kỳ mang thai.', 10000, '196.000000000000000', 1, 1, 2018, 0, 0),
('S13', 'MiLo', 1, 6, 1, 'Nên sử dụng cho trẻ từ 6 tuổi trở lên với 2-3 khẩu phầnNestlé MILO® (22 g) mỗi ngày. Cách bảo quản: Sau khi mở gói, trút MILO vào hũ khô và sạch. Dùng muỗng khô để xúc và vặn chặt nắp sau mỗi lần sử dụng. Nên sử dụng trong vòng 1 tháng kể từ ngày mở hũ. Tránh ánh nắng trực tiếp, bảo quản sản phẩm nơi khô ráo và thoáng mát. Chọn cách pha yêu thích: (nên uống ngay sau khi pha chế): Uống nóng: pha 4 muỗng MILO (22g) với 2 muỗng sữa bột (10g) vào 120ml nước nóng, khuấy đều và dùng ngay để thưởng thức một ly MILO nóng thơm và tuyệt ngon. Uống lạnh: pha 4 muỗng MILO (22gr) với 2 muỗng sữa bột (10gr) vào 60ml nước nóng, khuấy đều, thêm đá và dùng ngay để thường thức 1 ly MILO thơm ngon và mát lạnh. Hotline tư vấn: 1800-6699', 10000, '43.000000000000000', 1, 1, 2018, 0, 0),
('S14', 'Nuti IQ Step 4 900 gr : sữa tăng cường DHA cho trẻ 2-6 tuổi phát triển trí não, thị giác', 1, 5, 1, '- DHA, ARA, ALA, LA là thành phần cần thiết cho sự phát triển của não bộ, hoàn thiện tế bào thần kinh\r\n\r\n- Cholin, taurin là thành phần quan trọng trong quá trình dẫn truyền thần kinh. Hỗ trợ cho sự phát triển trí não, giúp phát triển khả năng nhận thức và trí nhớ\r\n\r\n- Lutein Là carotenoid được tìm thấy  trong thủy tinh thể và tế bào võng mạc mắt và là thành phần quan trọng cấu tạo nên điểm vàng trên võng mạc mắt, tăng cường sức khỏe cho mắt.\r\n\r\n- Sắt, Iot: những dưỡng chất thiết yếu giúp phát triển các chức năng của não bộ.\r\n\r\nHỗ trợ sức khỏe tiêu hóa và tăng cường sức đề kháng\r\n\r\n- Prebiotics (FOS/Inulin) là thành phần chất xơ cần thiết giúp kích thích phát triển vi khuẩn có lợi cho đường ruột từ đó giúp hệ tiêu hóa của trẻ khỏe mạnh, hấp thu hiệu quả các chất dinh dưỡng cho trẻ một cơ thể khỏe mạnh và đồng thời chất xơ giúp ngăn ngừa táo bón.\r\n\r\n- Vitamin nhóm B: hỗ trợ quá trình chuyển hóa các chất trong cơ thể, giúp bảo vệ cơ thể khỏe mạnh\r\n\r\n- Selen: hỗ trợ hoạt động của tế bào miễn dịch giúp cơ thể khỏe mạnh.\r\n\r\nPhát triển chiều cao, tăng cường thể chất\r\n\r\n- Canxi, Magie, Phốt pho: giúp xương và răng chắc khỏe, cùng với vitamin D3, K1, C hỗ trợ thúc đẩy quá trình hấp thu canxi của cơ thể từ đó giúp trẻ phát triển và tăng trưởng chiều cao.\r\n\r\n- Kẽm: thúc đẩy quá trình hoạt động của hormon tăng trưởng giúp trẻ phát triển chiều cao.  \r\n', 1000, '144.000000000000000', 1, 1, 2018, 0, 0),
('S15', 'Sữa bột Abbott Grow 4 900g', 1, 3, 1, 'Abbott Grow 4 CÔNG THỨC DINH DƯỠNG ĐẶC CHẾ CHO TRẺ EM 3-6 TUỔI Để đáp ứng nhu cầu tăng trưởng cao của trẻ trong suốt giai đoạn phát triển quan trọng 3-6 tuổi, hàng ngày con bạn can được bổ sung đầy đủ và cân đối các dưỡng chất cần thiết. ABBOTT GROW 4 với công thức giàu dưỡng chất, hương vị thơm ngon, được thiết kế một cách khoa học hỗ trợ sự phát triển tốt của trẻ trong suốt giai đoạn quan trọng này. GIÚP TRẺ PHÁT TRIỂN XƯƠNG VÀ CHIỀU CAO ABBOTT GROW 4 là nguồn dinh dưỡng tốt cung cấp đầy đủ với hàm lượng cao canxi, phospho, vitamin D – đây là các nguyên liệu cần thiết để xây dựng và phát triển hệ xương chắc khỏe. GIÚP TRẺ PHÁT TRIỂN TỐT Bổ sung taurin hỗ trợ phát triển trí não và thị giác. 28 vitamin và khoáng chất có trong ABBOTT GROW 4 cùng với chế độ ăn hợp lý và cân đối hàng ngày, giúp đáp ứng các nhu cầu dinh dưỡng cần thiết cho sự phát triển tốt của trẻ. Các nguyên tố siêu vi lượng selen, crôm, molybden duy nhất có trong công thức ABBOTT GROW 4 ngoài việc hỗ trợ nâng cao sức đề kháng của cơ thể, còn tham gia điều hòa chức năng chuyển hóa năng lượng của cơ thể, giúp trẻ lớn nhanh và khỏe mạnh. Các chất chống oxi hóa giúp bảo vệ các tế bào của cơ thể chống lại tác động có hại của các gốc tự do. CHÚ Ý: Sữa mẹ là thức ăn tốt nhất cho sức khỏe và sự phát triển toàn diện của trẻ nhỏ. Các yếu tố chống nhiễm khuẩn, đặc biệt là kháng thể chỉ có trong sữa mẹ có tác dụng giúp trẻ phòng, chống bệnh tiêu chảy, nhiễm khuẩn đường hô hấp và một số bệnh nhiễm khuẩn khác. Chỉ sử dụng sản phẩm này theo chỉ dẫn của bác sĩ. Pha chế theo đúng hướng dẫn. Cho trẻ ăn bằng cốc, thìa hợp vệ sinh. Vitamin: [+] Khoáng chất: [+] HƯỚNG DẪN CÁCH PHA CHẾ VÀ SỬ DỤNG: Rửa sạch tay trước khi pha. Để có 200 ml ABBOTT GROW 4, cho 175 ml nước chín để nguội (khoảng 37ºC) vào ly, từ từ cho vào ly 3 muỗng gạt ngang (hay 36g) bột ABBOTT GROW 4 (muỗng có sẵn trong hộp) vừa khuấy cho tan đều. Uống ngay sau khi pha. Nếu không uống ngay, nên đậy kín cho vào tủ lạnh và dùng trong vòng 24 giờ. Khi pha đúng theo hướng dẫn, hộp 400g bột có thể pha được khoảng 11 ly, mỗi ly 200ml. *Cách pha chuẩn: cho 3 muỗng gạt ngang hay (36 gram) bột ABBOTT GROW 4 pha trong 175ml nước.', 10000, '264.000000000000000', 2, 1, 2018, 0, 0),
('S16', 'Sữa Bột Abbott Ensure Gold 850g', 1, 3, 1, 'Sữa Bột Abbott Ensure Gold ESLA Dinh Dưỡng Đầy Đủ Và Cân Đối (850g)sẽ cung cấp các acid béo thiết yếu như Linoleic và Linolenic, hàm lượng Acid béo no và Cholesterol thấp để mang đến cho bạn và gia đình chế độ ăn uống lành mạnh, khoa học. Sản phẩm được chứng minh tốt cho hệ tim mạch nhờ đặc chế từ hỗn hợp chất béo giàu PUFA và MUFA.', 1000, '695.000000000000000', 7, 1, 2018, 0, 0),
('S17', 'Sữa tiệt trùng Dutch Lady không đường lốc 4 hộp x 180ml', 3, 4, 1, 'Sữa tiệt trùng Dutch Lady không đường 180ml là sự kết hợp tuyệt vời giữa sữa bò tươi nguyên chất và hương liệu tự nhiên, cung cấp một nguồn dinh dưỡng dồi dào cho cơ thể.', 1000, '30.000000000000000', 8, 1, 2018, 0, 0),
('S18', 'Sữa bột Friso Gold 4 1500g', 1, 1, 1, 'Friso Gold 4 Mới được thiết kế đặc biệt để đáp ứng nhu cầu dinh dưỡng của trẻ đang trong giai đoạn phát triển. Với công thức cải tiến mới gồm sự kết hợp tối ưu giữa Synbiotics (Probiotics BB-12® & L.casei 431® và Prebiotics GOS & FOS) và các dưỡng chất khác như Kẽm, Nucleotides và Selen giúp hỗ trợ hệ miễn dịch và giúp bảo vệ bé từ bên trong. Ngoài ra, Friso Gold 4 còn cung cấp các dưỡng chất quan trọng sau,hỗ trợ sự phát triển của trẻ: - DHA, AA, SA & Taurin. DINH DƯỠNG Thực phẩm bổ sung cho trẻ Friso Gold 4 - Nhà khám phá tài ba Thực phẩm bổ sung cho trẻ Friso Gold 4 Mới được thiết kế đặc biệt để đáp ứng nhu cầu dinh dưỡng của trẻ đang trong giai đoạn phát triển. Với công thức cải tiến mới gồm sự kết hợp tối ưu giữa Synbiotics (Probiotics BB-12® & L.casei 431® và Prebiotics GOS & FOS) và các dưỡng chất khác như Kẽm, Nucleotides và Selen giúp hỗ trợ hệ miễn dịch và giúp bảo vệ bé từ bên trong. Ngoài ra, Friso Gold 4 còn cung cấp các dưỡng chất quan trọng sau,hỗ trợ sự phát triển của trẻ: - DHA, AA, SA & Taurin. CHÚ Ý: SỮA MẸ LÀ THỨC ĂN TỐT NHẤT CHO SỨC KHỎE VÀ SỰ PHÁT TRIỂN TOÀN DIỆN CỦA TRẺ NHỎ. Các yếu tố chống nhiễm khuẩn, đặc biệt là kháng thể chỉ có trong sữa mẹ có tác dụng giúp trẻ nhỏ phòng, chống bệnh tiêu chảy, nhiễm khuẩn đường hô hấp và một số bệnh nhiễm khuẩn khác. Chỉ sử dụng sản phẩm này theo chỉ dẫn của bác sĩ. Pha chế theo đúng hướng dẫn. Cho trẻ ăn bằng cốc, thìa hợp vệ sinh. Friso giúp bé luôn khỏe mạnh ngay từ bên trong để khám phá thế giới rộng lớn bên ngoài. Mỗi ngày bé đều háo hức tìm hiểu những điều mới lạ. Cùng với sự hỗ trợ từ người mẹ - như một người bạn và chế độ dinh dưỡng phù hợp sẽ giúp bé phát triển khỏe mạnh để cùng bạn khám phá thế giới mỗi ngày. Thực phẩm bổ sung cho trẻ Friso Gold 4 Mới ra đời nhằm hỗ trợ các nhu cầu phát triển của bé, giúp bạn có thể cho bé những gì tốt nhất và tận hưởng trọn vẹn niềm vui làm mẹ. • Synbiotics: Probiotics(BB-12® & L.casei 431®) và Prebiotics (GOS & FOS theo tỷ lệ 9/1): tăng cường hệ vi khuẩn có ích trong đường ruột, hỗ trợ hệ miễn dịch. • Kẽm: có khả năng chống oxy hóa, rất quan trọng cho hệ miễn dịch • Selen: hỗ trợ các chức năng của hệ miễn dịch • Nucleotides: giúp hệ miễn dịch khỏe mạnh hơn', 10000, '544.000000000000000', 1, 1, 2018, 0, 0),
('S19', 'Sữa chua uống Yomost vị Dâu hộp 170ml (thùng 48 hộp)', 1, 11, 1, 'Sữa tiệt trùng Dutch Lady không đường 180ml là sự kết hợp tuyệt vời giữa sữa bò tươi nguyên chất và hương liệu tự nhiên, cung cấp một nguồn dinh dưỡng dồi dào cho cơ thể.', 1000, '32.000000000000000', 1, 1, 2018, 0, 0),
('S20', 'Sữa Bột Nestle NAN Optipro 3 (900g)', 1, 6, 1, 'Mang đến nguồn dinh dưỡng khởi đầu khỏe mạnhCông thức tiên tiến từ Thụy SĩCho bé hệ tiêu hóa khỏe mạnh hơnKích thích phát triển trí não và thị giác ', 1000, '330.000000000000000', 1, 1, 2018, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuong_hieu`
--

DROP TABLE IF EXISTS `thuong_hieu`;
CREATE TABLE IF NOT EXISTS `thuong_hieu` (
  `ma_th` int(11) NOT NULL AUTO_INCREMENT,
  `ten_thuong_hieu` char(100) DEFAULT NULL,
  `tinh_trang` bit(1) NOT NULL,
  PRIMARY KEY (`ma_th`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `thuong_hieu`
--

INSERT INTO `thuong_hieu` (`ma_th`, `ten_thuong_hieu`, `tinh_trang`) VALUES
(1, 'VINAMILK', b'1'),
(2, 'TH TRUE MILK', b'1'),
(3, 'ABBOTT', b'1'),
(4, 'DUTCH LADY', b'1'),
(5, 'NUTIFOOD', b'1'),
(6, 'NESTLE', b'1'),
(7, 'IDP', b'1'),
(8, 'Moc Chau', b'1'),
(11, 'yomost', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuong_hieu_loai_sua`
--

DROP TABLE IF EXISTS `thuong_hieu_loai_sua`;
CREATE TABLE IF NOT EXISTS `thuong_hieu_loai_sua` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten_thuong_hieu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_th` int(11) DEFAULT NULL,
  `ma_loai_sua` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ma_loai_sua` (`ma_loai_sua`),
  KEY `FK_ma_th` (`ma_th`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thuong_hieu_loai_sua`
--

INSERT INTO `thuong_hieu_loai_sua` (`id`, `ten_thuong_hieu`, `ma_th`, `ma_loai_sua`) VALUES
(2, 'VINAMILK', 1, 2),
(3, 'DUTCH LADY', 4, 1),
(5, 'ABBOTT', 3, 2),
(6, 'VINAMILK', 1, 3),
(7, 'IDP', 7, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh_trang`
--

DROP TABLE IF EXISTS `tinh_trang`;
CREATE TABLE IF NOT EXISTS `tinh_trang` (
  `ma_tt` int(11) NOT NULL AUTO_INCREMENT,
  `ten_tinh_trang` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ma_tt`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinh_trang`
--

INSERT INTO `tinh_trang` (`ma_tt`, `ten_tinh_trang`) VALUES
(1, 'Bán chạy'),
(2, 'Mới'),
(3, 'Hot'),
(4, 'Tạm hết hàng'),
(5, 'Không kinh doanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh_trang_hd`
--

DROP TABLE IF EXISTS `tinh_trang_hd`;
CREATE TABLE IF NOT EXISTS `tinh_trang_hd` (
  `ma_tinh_trang` int(11) NOT NULL,
  `ten_tinh_trang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ma_tinh_trang`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinh_trang_hd`
--

INSERT INTO `tinh_trang_hd` (`ma_tinh_trang`, `ten_tinh_trang`) VALUES
(0, 'Chờ duyệt'),
(1, 'Đã duyệt'),
(2, 'Hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tin_tuc`
--

DROP TABLE IF EXISTS `tin_tuc`;
CREATE TABLE IF NOT EXISTS `tin_tuc` (
  `ma_tin` int(11) NOT NULL AUTO_INCREMENT,
  `loai_tin_tuc` int(11) NOT NULL,
  `tieu_de` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `hinh_anh` longtext COLLATE utf8mb4_unicode_ci,
  `tom_tat` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `noi_dung` longtext CHARACTER SET utf8,
  `ngay_viet` datetime NOT NULL,
  `luot_xem` int(11) DEFAULT NULL,
  PRIMARY KEY (`ma_tin`),
  KEY `fk_loai_tin_tuc` (`loai_tin_tuc`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tin_tuc`
--

INSERT INTO `tin_tuc` (`ma_tin`, `loai_tin_tuc`, `tieu_de`, `hinh_anh`, `tom_tat`, `noi_dung`, `ngay_viet`, `luot_xem`) VALUES
(1, 2, 'Hội thảo chuyên đề: Giúp trẻ thoát nhanh suy dinh dưỡng thấp còi – tăng cân sau 3 tháng', 'hinh/231bf2879f38f739eaa888b102f1b493.Picture1 - Copy.png<br>hinh/231bf2879f38f739eaa888b102f1b493.Picture1.png<br>hinh/231bf2879f38f739eaa888b102f1b493.Picture2.png<br>hinh/231bf2879f38f739eaa888b102f1b493.Picturebosung1.png<br>', 'Vừa qua tại Hà Nội, ngày 27/08/2017, Hội Nhi Khoa Việt Nam với sự đồng hành của nhãn hàng Vinamilk Dielac Grow Plus đã tổ chức hội thảo chuyên đề “Giúp trẻ thoát nhanh suy dinh dưỡng thấp còi, tăng cân sau 3 tháng” với sự tham gia ', 'Phát biểu tại hội thảo, Phó Giáo sư – Tiến Sĩ Khu Thị Khánh Dung, Phó Chủ tịch Hội Nhi Khoa Việt Nam chia sẻ: “Theo số liệu thống kê của Viện Dinh Dưỡng quốc gia, tỷ lệ suy dinh dưỡng thể thấp còi ở trẻ em dưới 5 tuổi là 25%, đồng nghĩa cứ 4 trẻ dưới 5 tuổi, có 1 trẻ bị suy dinh dưỡng thấp còi – 1 con số đáng báo động. Nguyên nhân chính dẫn đến tình trạng này là do:\r\n Chế độ dinh dưỡng không hợp lý trong 5 năm đầu đời, thiếu quá nhiều vi chất cần thiết.\r\nTổ chức Y Tế Thế giới xếp Việt Nam vào danh sách 19 nước có tình trạng thiếu vitamin A ở mức độ nặng với tỉ lệ 37,5% ở trẻ dưới 5 tuổi. Điều tra mới nhất của Viện Dinh Dưỡng Quốc Gia cũng cho thấy 24% trẻ bị thiếu máu, 41,5% bị thiếu kẽm dẫn đến trẻ bị dối loạn tiêu hóa kéo dài, nhiễm khuẩn đường hô hấp và còi xương.\r\n Khẩu phần của trẻ chỉ đáp ứng 60,3% nhu cầu Canxi và 10,6% nhu cầu vitamin D khuyến nghị.\r\nNgoài ra, suy dinh dưỡng thấp còi cũng bị ảnh hưởng từ hệ tiêu hóa yếu kém, nhiễm ký sinh trùng, dị tật bẩm sinh, cũng như do thiếu kiến thức nuôi con <img> Phó Giáo sư – Tiến sĩ Khu Thị Khánh Dung – Phó Chủ tịch Hội Nhi Khoa Việt Nam phát biểu tại hội thảo\r\nTại hội thảo, Tiến sĩ – Bác sỹ Lưu Thị Mỹ Thục – Trưởng khoa Dinh dưỡng lâm sàng và tiết chế, Bệnh viện Nhi Trung ương chia sẻ, chế độ dinh dưỡng là yếu tố quan trọng hàng đầu giúp trẻ thoát nhanh suy dinh dưỡng thấp còi, bắt kịp đà tăng trưởng, từ đó tăng cân nhanh chóng. Trẻ cần ăn nhiều các thực phẩm giàu năng lượng và dưỡng chất để bổ sung kịp thời các vi chất thiếu hụt; Sử dụng sản phẩm dinh dưỡng dễ hấp thu, dễ tiêu hóa. Bên cạnh đó, không thể thiếu việc bổ sung các vi chất hỗ trợ tăng cường sức đề kháng cho trẻ. <img>Tiến sĩ – Bác sĩ Lưu Thị Mỹ Thục – Trưởng khoa Dinh dưỡng lâm sàng và tiết chế, Bệnh viện Nhi Trung ương \r\nchia sẻ Giải pháp giúp trẻ thoát nhanh suy dinh dưỡng thấp còi, tăng cân sau 3 tháng.\r\nĐể giúp cải thiện tình trạng suy dinh dưỡng thấp còi ở trẻ, Công tya Vinamilk và 4 tập đoàn dinh dưỡng nh dưỡng – Trung tâm dinh dưỡng Vinamilk \r\nchia sẻ về sản phẩm Dielac Grow Plus\r\nĐể làm rõ hơn hiệu quả giải pháp dinh dưỡng này, Tiến sĩ – Bác sỹ Nguyễn Trọng Hưng – Dinh Dưỡng Lâm Sàng – Viện Dinh Dưỡng cũng đã chia sẻ về Hiệu quả lâm sàng bổ sung dinh dưỡng cho trẻ suy dinh dưỡng, thấp còi thông qua Nghiên cứu lâm sàng trên 196 trẻ 2-5 tuổi bị suy dinh dưỡng thấp còi tại tỉnh Tuyên', '2018-12-16 14:49:40', 3),
(2, 1, 'Năm thứ 4 liên tiếp Công ty cổ phần Sữa Việt Nam (Vinamilk) nằm trong top đầu các doanh nghiệp được vinh danh', 'hinh/4b28e71fcb0d057f8bc91a378bf88928.Picture5 - Copy.png<br>hinh/4b28e71fcb0d057f8bc91a378bf88928.Picture5.png<br>hinh/4b28e71fcb0d057f8bc91a378bf88928.Picture6.png<br>hinh/4b28e71fcb0d057f8bc91a378bf88928.Picture7.png<br>', 'Giải thưởng “Thương hiệu mạnh Việt Nam” nhằm ghi nhận các doanh nghiệp có thành tích xuất sắc trong hoạt động sản xuất kinh doanh và nỗ lực vươn lên trong khó khăn. Năm nay,', 'Năm thứ 4 liên tiếp Công ty cổ phần Sữa Việt Nam (Vinamilk) nằm trong top đầu các doanh nghiệp được vinh danh tại giải thưởng do Thời báo Kinh tế Việt Nam phối hợp với Cục Xúc tiến Thương mại (Bộ Công Thương) trao tặng.\r\nGiải thưởng “Thương hiệu mạnh Việt Nam” nhằm ghi nhận các doanh nghiệp có thành tích xuất sắc trong hoạt động sản xuất kinh doanh và nỗ lực vươn lên trong khó khăn.\r\nNăm nay, giải thưởng được bình chọn dựa trên 7 tiêu chí đánh giá gồm bảo vệ thương hiệu, chất lượng sản phẩm – dịch vụ, kết quả kinh doanh, năng lực lãnh đạo, nguồn nhân lực, năng lực đổi mới và tính bền vững, ổn định của doanh nghiệp. Trong đó, Vinamilk được đánh giá là một trong những đơn vị có tiềm lực nhất về quản trị doanh nghiệp, chất lượng sản phẩm, nhân sự cũng như sức mạnh về thương hiệu. <img> Bà Nguyễn Minh Tâm, Giám đốc Chi nhánh Vinamilk tại Hà Nội đại diện công ty nhận giải thưởng Thương hiệu mạnh Việt Nam\r\n \r\nVới vị thế của một thương hiệu lớn, những năm qua, Vinamilk luôn khẳng định vị trí và vai trò dẫn đầu trong ngành sữa Việt Nam. Chất lượng sản phẩm, dịch vụ luôn cải tiến để đáp ứng tốt hơn nhu cầu của người tiêu dùng, với hàng loạt sản phẩm đang chiếm lĩnh thị trường như sữa tươi Vinamilk 100%, sữa chua, sữa bột trẻ em Dielac Alpha…\r\nTheo số liệu công bố mới nhất của Công ty nghiên cứu thị trường Nielsen, sữa tươi Vinamilk 100% đứng đầu về cả sản lượng lẫn doanh số bán ra trong phân khúc nhóm các nhãn hiệu sữa tươi (với khoảng 55%) tại Việt Nam.\r\nTrước đó, tại hội nghị khoa học và công nghệ thực phẩm thế giới tổ chức ở Montreal (Canada), Vinamilk cũng nhận giải thưởng công nghiệp thực phẩm toàn cầu IUFoST 2014 cho sản phẩm sữa nước ADM của Vinamilk. Đạt giải thưởng này, sản phẩm sữa nước ADM của Vinamilk đã vượt qua hơn 100 sản phẩm được đề cử đến từ 70 quốc gia. Vinamilk cũng là đại diện duy nhất thuộc ngành sữa Việt Nam nhận giải thưởng. <img> Quỹ sữa Vươn cao Việt Namcủa Vinamilk đã đem đến cho hơn 333.000 trẻ em khó khăn tại Việt Nam trong gần 8 năm hoạt động gần 26 triệu ly sữa (tương đương khoảng 94 tỷ đồng).\r\n \r\nKhông chỉ được cộng đồng ghi nhận, kết quả kinh doanh của Vinamilk cũng cho thấy những bước tăng trưởng ổn định. Trong 5 năm trở lại đây, công ty luôn duy trì tốc độ tăng trưởng năm sau cao hơn năm trước.\r\nDoanh thu năm 2015 của Vinamilk gần 40.222 tỷ đồng, tăng khoảng 15% so với 2014 và nộp ngân sách nhà nước gần 4.000 tỷ đồng. Năm qua, Vinamilk đã sản xuất và đưa ra thị trường gần 6 tỷ sản phẩm sữa các loại phục vụ cho người tiêu dùng cả nước. Hãng đặt ra mục tiêu sẽ đạt doanh số khoảng 3 tỷ USD và đứng vào top 50 công ty sữa lớn nhất thế giới.\r\nGần đây, công ty cũng vừa được bình chọn vào top 300 công ty năng động nhất của Châu Á do Tạp chí Nikkei Asian Review (Nhật Bản) công bố. Với vốn hóa đạt gần 7,3 tỷ USD, Vinamilk là công ty có giá trị vốn hóa lớn nhất tại thị trường Việt Nam.\r\nThành lập vào năm 1976, sau gần 4 thập kỷ đến nay, Vinamilk đã trở thành một doanh nghiệp hàng đầu trong ngành sữa tại Việt Nam. Hãng hiện có khoảng 25 đơn vị trực thuộc với 13 nhà máy sản xuất tại Việt Nam với hơn 6.000 nhân viên trên toàn quốc. </p> <img>> Quỹ 1 triệu cây xanh cho Việt Nam – một chương trình xã hội của Vinamilk mang ý nghĩa nhân văn đóng góp rất lớn cho cộng đồng trồng cây tại đường Hồ Chí Minh trên biển ở Bến Tre\r\nVinamilk đầu tư 22,8% cổ phần tại nhà máy Miraka (New Zealand), 70% cổ phần vào nhà máy Driftwood (Mỹ), nắm giữ 51% cổ phần nhà máy Angkor Milk tại Campuchia và đầu tư công ty con tại Ba Lan làm cửa ngõ giao thương các hoạt động thương mại của Vinamilk tại châu Âu. Sản phẩm của đơn vị này hiện cũng có mặt ở hơn 40 nước trên thế giới, như Campuchia, Thái Lan, Hàn Quốc, Nhật Bản, Trung Quốc, Thổ Nhĩ Kỳ, Nga, Canada, Mỹ…\r\nKhông chỉ quan tâm đến sản xuất kinh doanh, Vinamilk tham gia tích cực vào các hoạt động cộng đồng. Trong những hoạt động gần 40 năm qua, có nhiều chương trình mang ý nghĩa nhân văn như Sữa học đường, Quỹ sữa Vươn cao Việt Nam, Một triệu cây xanh cho Việt Nam…\r\nThanh Thư\r\n(Theo Vnexpress)', '2018-12-16 15:01:32', 1),
(3, 3, 'Sữa bột trẻ em đua tăng giá?', 'hinh/a60e276076cb243a0659656f4ee16fba.Picture8 - Copy.png<br>hinh/a60e276076cb243a0659656f4ee16fba.Picture8.png<br>', 'Sau 2- 3 năm khá bình ổn, gần đây các hãng sửa lớn đồng loạt thông báo tăng giá bán sữa bột dành cho trẻ em. Đây là mặt hàng khá nhạy cảm và được chuyển việc quản lý giá từ Bộ Tài chính sang Bộ Công Thương. Dư luận đang lo ngại một đợt tăng giá ồ ạt của các hãng sữa.', '<img> Trẻ em là đối tượng chịu ảnh hưởng đầu tiên khi giá sữa bột đồng loạt tăng cao\r\n\"Nổ\" phát súng tăng giá đầu tiên là Công ty TNHH FrieslandCampina Việt Nam tiến hành điều chỉnh 26 dòng sản phẩm công ty đang sản xuất từ ngày 15/3/2018. Mức điều chỉnh trong phạm vi 5% so với mức giá đã kê khai liền kề trước đó. Tiếp đến là Công ty TNHH Nestle Việt Nam thông báo tăng giá đồng loạt với 11 sản phẩm sữa bột từ 1/5/2018. Một số sản phẩm của công ty được định giá rất cao, như một hộp Nan optipro HA 2 loại 800 gam giá tới 530 nghìn đồng; Nan optipro HA 3 giá 448 nghìn đồng/hộp 800 gam.\r\nMột số hãng sữa thay vì tăng giá thì thay đổi tên và độ tuổi sử dụng các sản phẩm như Công ty TNHH Dinh dưỡng 3A Việt Nam. Ngoài ra, đơn vị phân phối sản phẩm sữa Abbott này cũng đồng loạt tăng giá 10 loại sản phẩm. Ví như mức giá mới của Similac IQ 2 (HMO) hộp 900 gam hộp thiếc lên tới 572 nghìn đồng; sữa Similac IQ 4 (HMO) hộp thiếc 1,7 kg giá tới 805 nghìn đồng. Mức giá mới này được áp dụng từ ngày 24/5/2018. \r\nĐể tránh phải kê khai giá, một số công ty khác lại lách bằng cách bỏ mẫu cũ và ra sản phẩm mới. Ví như Công ty Nestle Việt Nam vừa công bố ra mắt hai sản phẩm mới là Nan Supreme 1,2 từ ngày 1/6/2018 với mức giá khá cao so với mặt bằng chung thị trường cùng phân khúc. \r\nCông ty Cổ phần thực phẩm dinh dưỡng Nutifood từ 1/7/2018 cũng liên tiếp cho ra mắt 2 dòng sản phẩm mới là Riso Opti Gold 3 và Riso Opti Gold 4 với mức giá cao ngất ngưởng, lần lượt là 392 nghìn đồng và 355 nghìn đồng/hộp 900 gam.\r\nCũng theo cách này, Công ty TNHH Mead Johnson Nutrition (Việt Nam) vừa thông báo giá đối với sản phẩm mới là Enfamil Premium Infant Formula (dành cho trẻ từ 0 đến 12 tháng tuổi) và Enfagrow Premium Toddler Next Step (dành cho trẻ từ 1- 3 tuổi), áp dụng từ ngày 21/7/2018. Mức giá công bố lần lượt là 585 nghìn đồng và 555 nghìn đồng/hộp. \r\nMới đây nhất là thông báo điều chỉnh giá của \"ông lớn\" Vinamilk. Theo đó, kể từ ngày 20/7 bốn dòng sản phẩm sữa bột trẻ em Optimum Gold 1, Optimum Gold 2, Optimum Gold 3, Optimum Gold 4 của Vinamilk tăng giá mỗi sản phẩm từ 10.000 đồng đến khoảng 20.000 đồng/hộp thiếc, mức tăng giá sữa trong phạm vi 5%. \r\nNguyên nhân tăng giá được các doanh nghiệp giải thích là do chi phí sản xuất đầu vào tăng, như giá nguyên liệu thế giới tăng từ 12- 20%, tỷ giá ngoại tệ, chi phí nhân công tăng,....\r\nViệc quản lý giá sữa được cho là khá lúng túng bởi trước đây Bộ Tài chính từng áp giá trần đối với sữa bột dành cho trẻ em dưới 6 tuổi sau đó phải hủy bỏ quy định này. Việc quản lý giá sữa được chuyển từ Cục Quản lý giá (Bộ Tài chính) sang Bộ Công Thương từ đầu năm 2017. Tuy nhiên, nếu không có sự kiểm tra, giám sát việc kê khai cấu thành giá thì dư luận lo ngại một cuộc đua tăng giá sữa bắt đầu mà người tiêu dùng, nhất là trẻ em phải gánh chịu. </p> <br>\r\nTheo Tiền Phong', '2018-12-16 15:05:23', 8),
(4, 1, 'Vinamilk tiên phong giới thiệu sữa tươi 100% A2 đầu tiên tại Việt Nam', 'hinh/b043341b836de37bcc80e1a1ca6f5941.Picture9 - Copy.png<br>hinh/b043341b836de37bcc80e1a1ca6f5941.Picture9.png<br>hinh/b043341b836de37bcc80e1a1ca6f5941.Picture10.png<br>', 'BizLIVE - Từ 28/6/2018, đàn bò A2 của Vinamilk đã cho ra đời lô sữa tươi 100% A2 đầu tiên tại Việt Nam. Hiện sản phẩm sữa tươi thanh trùng Vinamilk 100% A2 đã được bày bán ở các cửa hàng giới thiệu sản phẩm Vinamilk Giấc mơ Sữa Việt. Chia sẻ', '<img> Trang trại Thanh Hóa vừa khánh thành vào tháng 3/2018 sẽ là nơi chăm sóc và nuôi dưỡng những cô bò A2 thuần chủng. Với hệ thống cửa hàng giới thiệu sản phẩm trải đều trên toàn quốc, người tiêu dùng có cơ hội mua và thưởng thức sản phẩm sữa tươi thanh trùng Vinamilk 100% A2, một trong những công nghệ mới nhất hiện nay của ngành sữa và mới chỉ xuất hiện tại các thị trường phát triển như Úc, New Zealand, Mỹ,….từ đầu những năm 2000, nay đã được Vinamilk tiên phong mang đến cho người tiêu dùng Việt Nam, nhằm đáp ứng đa dạng hơn nhu cầu về thực phẩm chăm sóc sức khỏe cao cấp của gia đình Việt. Bò A2 và sữa A2 có lịch sử khá lâu đời. Sữa A2 có nguồn gốc từ bò A2 thuần chủng , chứa 100% đạm Beta-Casein A2, còn các loại sữa hiện nay thường chứa song song 2 loại đạm Beta-Casein A1 và Beta-Casein A2 bởi quá trình tiến hóa tự nhiên của loài bò. Đạm Beta-Casein A2 được các nghiên cứu trên thế giới cho là dễ hấp thụ, đặc biệt đối với người nhạy cảm với đạm sữa bò, từ đó tối đa hóa các lợi ích từ những dưỡng chất có trong sữa. Để có được nguồn sữa A2 tự nhiên với chất lượng tốt nhất, điểm mấu chốt chính là đàn bò thuần chủng A2 – những cô bò được chọn lựa từ các cá thể đã được xác định mang gen A2/A2 qua kiểm tra gene bằng DNA từ các mô mềm. <img> Những sản phẩm sữa tươi A2 100% đầu tiên tại Việt Nam đã tới tay người tiêu dùng Vào những ngày đầu tháng 06/2018, Vinamilk là công ty sữa đầu tiên tại Việt Nam đã đầu tư nhập gần 200 cô bò sữa thuần chủng A2 từ New Zealand, đất nước có nền chăn nuôi và công nghiệp sản xuất sữa hàng đầu thế giới, đồng thời là nơi nghiên cứu ra dòng sữa A2 nổi tiếng. Các cá thể bò mẹ đến từ các trang trại được tuyển chọn kỹ lưỡng và các cá thể bê con A2 sẽ được lựa chọn lại lần 2, cách ly và chăm sóc theo tiêu chuẩn đặc biệt tại New Zealand trước khi nhập về Việt Nam. Theo chị Mỹ Duyên (Hà Nội), khách hàng của Vinamilk cho biết: “Sữa tươi 100% A2 là sản phẩm mà tôi đã tìm hiểu nhiều từ những trang thông tin dinh dưỡng trên thế giới, nhưng ở Việt Nam vẫn chưa có nguồn cung cấp chính thống, đáng tin cậy. Việc Vinamilk cho ra đời sản phẩm sữa A2 đã giải quyết được vấn đề này của tôi. Sau khi uống thử loại sữa, các bé nhà tôi rất thích hương vị của sản phẩm này. Đây là một sự lựa chọn mới cho gia đình tôi”. Từ sau khi lô sữa A2 đầu tiên từ đàn bò A2 New Zealand được ra đời tại trang trại bò sữa Thống Nhất, Thanh Hoá vào ngày 28/6 năm 2018, sản phẩm sữa thanh trùng 100% A2 đã đến tay người tiêu dùng, mang đến thêm một sự lựa chọn về thực phẩm tự nhiên cao cấp . Sữa tươi thanh trùng Vinamilk 100% A2 từ giống bò A2 thuần chủng nhập khẩu từ New Zealand một lần nữa khẳng định cam kết của Vinamilk - luôn tiên phong đem đến những sản phẩm chất lượng quốc tế vượt trội, đáp ứng nhu cầu dinh dưỡng ngày một cao cấp và đa dạng của người dân Việt Nam. </p> VĂN CAO', '2018-12-16 15:24:13', 1),
(5, 1, 'Sự thật về sữa bột ở Việt Nam mà các mẹ chưa biết', 'hinh/a68726b7c6f9af5f909c8a50aabce54e.Picture11 - Copy.png<br>hinh/a68726b7c6f9af5f909c8a50aabce54e.Picture11.png<br>', 'Theo nhiều chuyên gia, đây hoàn toàn là tâm lý sính ngoại, vì dù mang nhiều nhãn hiệu khác nhau thì sữa công thức nhìn chung vẫn có thành phần giống hệt nhau', 'Lâu nay, các ông bố, bà mẹ ở Việt Nam thường bị choáng ngợp trước sự xuất hiện của quá nhiều loại sữa bột công thức trên thị trường, đắt có, rẻ có, nội có, ngoại có. Điều khiến các bậc phụ huynh băn khoăn nhất có lẽ là tìm được loại sữa nào tốt nhất, thích hợp nhất để con có được sự phát triển toàn diện, khỏe mạnh, thậm chí \"thông minh, cao lớn vượt trội\" như quảng cáo.\r\n\r\nNhiều gia đình đã không ngại móc hầu bao, chi rất nhiều tiền mua sữa công thức của các hãng nước ngoài (được nhập khẩu hoặc \"xách tay\"), dù đắt đỏ hơn nhiều so với giá của các loại sữa công thức được sản xuất trong nước và đôi khi chi phí vượt quá khả năng tài chính của họ, với niềm tin rằng \"sữa ngoại dù đắt nhưng vẫn tốt hơn sữa nội giá rẻ\".\r\n\r\nTuy nhiên, theo nhiều chuyên gia, đây hoàn toàn là \"tâm lý sính ngoại\", vì dù mang nhiều nhãn hiệu khác nhau thì sữa công thức nhìn chung vẫn có thành phần giống hệt nhau. Nhiều bậc cha mẹ có lẽ sẽ thở phào khi biết rằng, tất cả các loại sữa bột công thức được phép lưu hành trên thị trường đều phải tuân thủ các tiêu chuẩn và quy định về sữa bột do Tổ chức Y tế thế giới (WHO), Tổ chức Nông lương quốc tế (FAO) cũng như các cơ quan quản lý và kiểm định chất lượng thực phẩm của mỗi nước đề ra.\r\n\r\nNhững quy định này đòi hỏi các nhà sản xuất sữa bột phải đảm bảo cung cấp một lượng các chất dinh dưỡng quan trọng nhất bằng nhau, dù tung ra sản phẩm có nhãn hiệu, tên gọi, bao bì và giá cả khác nhau như thế nào. Để hiểu hơn, chúng ta cần biết rõ thành phần và quy trình sản xuất chung nhất của các loại sữa bột công thức.<img> Trong sữa công thức có gì? \r\n\r\nHầu hết sữa công thức cho trẻ sơ sinh đều làm từ sữa bò. Trong quá trình làm sữa tươi bay hơi để thành sữa bột, các nhà sản xuất đã bớt đi một số thành phần không phù hợp với trẻ em, một số thành phần dinh dưỡng mất đi hoặc do chất lượng sữa không tốt, đồng thời bổ sung các thành phần khác.\r\n\r\nChẳng hạn như, sữa bò có hàm lượng chất béo bão hoà rất cao (saturated fat) và rất khó tiêu hóa cho trẻ, trong khi hàm lượng chất béo không bão hoà (monosaturated fat) - thành phần chất béo chính trong sữa mẹ, dễ tiêu hóa - lại rất thấp. Vì vậy, bước đầu tiên, các nhà sản xuất sẽ loại bỏ hết chất béo. Sữa tách béo sau đó được đun nóng và sấy khô để tạo thành bột. Tiếp theo, loại chất béo mới, dưới dạng dầu thực vật, được pha trộn vào cùng với các protein, đường (lactose) và một danh sách dài các chất dinh dưỡng, vitamin và khoáng chất theo quy định để ngang bằng với sữa mẹ.\r\n\r\nSữa bò có hàm lượng protein cao gấp 3 lần sữa mẹ. Các con bê cần lượng protein này để lớn nhanh, nhưng đối với trẻ em thì lượng protein đó là quá tải cho gan và thận. Sữa bò cũng có tỷ lệ đạm casein trên đạm whey – hai loại đạm có trong sữa của động vật có vú – cao hơn trong sữa mẹ. Do đó, các hãng sữa phải giảm lượng protein xuống và tăng hàm lượng đạm whey để đạt sự cân bằng như sữa mẹ.\r\n\r\nCác thành phần còn lại trong sữa bột công thức nhằm tạo sự kết dính cho hỗn hợp và ngăn sữa không bị hỏng. Một số sữa công thức được đặc chế cho những trường hợp cụ thể. Ví dụ như, sữa công thức cho trẻ sinh non và trẻ suy dinh dưỡng chứa nhiều calo hơn các loại sữa tiêu chuẩn. Sữa công thức dành cho trẻ hay bị nôn trớ có thêm gạo hoặc được thêm các một số chất làm đặc khác. Ngoài ra còn có các loại sữa công thức từ đậu nành hoặc đạm thủy phân cho trẻ có khả năng bị dị ứng hoặc không hấp thu được đạm sữa.\r\n\r\nTuy nhiên, bất kỳ loại sữa bột mới nào cũng phải đáp ứng một loạt tiêu chuẩn an toàn và dinh dưỡng, kể cả các bằng chứng lâm sàng cho thấy nó đủ dinh dưỡng để giúp trẻ phát triển bình thường.\r\n\r\nSự ưu việt của sữa mẹ so với sữa bột công thức\r\nGiới khoa học và nghiên cứu đều đi đến thống nhất rằng: Sữa mẹ là nguồn dinh dưỡng tốt nhất cho sức khỏe và sự phát triển của trẻ sơ sinh và trẻ nhỏ. So với sữa mẹ, sữa bột công thức còn thiếu rất nhiều loại men tiêu hoá, hormone, các chất tăng trưởng và kháng thể tự nhiên giúp trẻ chống lại viêm nhiễm và phát triển hệ miễn dịch khỏe mạnh.\r\nNói như James Friel - giáo sư dinh dưỡng tại Đại học Manitoba: \"Sữa mẹ là một chất phức tạp và cho tới nay vẫn chưa được hiểu hết. Một số thành phần trong sữa mẹ có hoạt tính sinh học. Chúng không chỉ đóng vai trò là chất dinh dưỡng mà còn lớn hơn thế. Ví dụ, nếu bạn cho một chất gây mất cân bằng oxy hoá, chẳng hạn như khói thuốc lá, vào sữa mẹ, thì sữa mẹ sẽ chống lại chất đó. Sữa mẹ làm được điều này tốt hơn sữa công thức, mặc dù sữa công thức có nhiều chất chống oxy hóa hơn\". Giáo sư Friel nhận định, trong tương lai xa, người ta có thể bổ sung các chất có hoạt tính sinh học vào sữa bột.\r\n\r\nMột thành phần có hoạt tính sinh học khá quan trọng trong sữa mẹ là protein secretory immunoglobulinA (sIgA), có khả năng gom các chất lạ (bao gồm cả vi khuẩn gây hại) và đào thải chúng ra khỏi cơ thể. Nó bao phủ thành ruột, một trong những cửa ngõ đầu tiên ngăn chặn vi khuẩn. Sữa non, loại sữa đặc sánh mà cơ thể mẹ tiết ra trong một vài ngày đầu sau sinh nở, chứa hàm lượng sIgA rất cao.\r\n\r\nSữa công thức cũng có các \"chiến binh tí hon\" này, nhưng chúng không nhiều và lại là kháng thể của bò, vốn được lập trình để tìm ra các vi khuẩn gây bệnh ở bò chứ không phải ở người, và hoạt động trong máu chứ không phải trong ruột. Trẻ bú sữa bột dĩ nhiên vẫn phát triển hệ miễn dịch, nhưng chúng bị thiếu một phần sức đề kháng sớm và lâu dài do sIgA mang lại. Mối nguy hiểm lớn nhất khi thiếu sIgA là trong những tuần đầu tiên sau sinh, khi hệ tiêu hoá của trẻ rất dễ bị vi khuẩn tấn công.\r\n\r\nMột hoạt tính sinh học nữa chỉ tồn tại trong sữa mẹ là khả năng tự thay đổi. Sữa mẹ thay đổi khi đứa trẻ lớn dần và thay đổi qua từng cữ bú. Sữa đầu, nguồn sữa tiết ra khi bé bắt đầu bú, thì có lượng chất béo thấp. Khi bé tiếp tục bú, lượng chất béo tăng dần, khiến cho em bé dần dần rơi vào trạng thái thỏa mãn. Lượng chất béo trong sữa mẹ cũng thay đổi khi em bé qua 6 tháng đầu tiên, khi tốc độ tăng trưởng chậm dần. Trong một vài năm gần đây thì một loại sữa công thức dành cho 6 tháng phát triển thứ hai đã được pha trộn để các thành phần phù hợp hơn với những đứa trẻ lớn hơn.\r\n\r\nTóm lại, sữa mẹ và sữa công thức giống nhau ở điểm đều giúp duy trì sự sống và nuôi dưỡng sự phát triển của trẻ. Tuy nhiên, các thành phần dinh dưỡng trong chất được con người chế tạo ra (sữa bột) không có tính năng giống như chất sinh ra trong tự nhiên. Nhà dinh dưỡng Cristine Bradley, quản lý cấp cao của hãng sữa Mead Johnson giải thích: “Xét về thành phần, tôi có thể nói chúng giống nhau như hai quả táo, nhưng về cách hoạt động thì giống như so sánh quả táo với quả cam”.\r\n\r\nMột ví dụ cụ thể là: Sắt đã được bổ sung vào sữa công thức ở thập niên 80. Tuy nhiên, chất sắt trong sữa công thức không dễ hấp thu như trong sữa mẹ, do vậy mà người ta phải cho thêm rất nhiều sắt vào sữa công thức để trẻ có thể hấp thụ đủ lượng cần thiết.\r\n\r\nMặc dù sữa bột công thức về cơ bản khác với sữa mẹ, nhưng chúng ta đã đạt được một số cải thiện rõ rệt trong vòng 30 năm trở lại đây, bao gồm cả sự điều chỉnh để cải thiện mức cân bằng protein và hỗn hợp pha trộn chất béo. Nhưng cũng chưa có bằng chứng cụ thể cho thấy các loại sữa công thức tiên tiến thực sự hiệu quả trong việc tăng cường khả năng phát triển ở trẻ sơ sinh, và chắc chắn không thể tốt bằng sữa mẹ tự nhiên.\r\n\r\nCác hãng sữa cũng bổ sung thêm một số dòng sữa mới, bao gồm cả loại sữa không có đường (lactose), sữa đặc biệt cho trẻ sinh non và trẻ ốm yếu, còi cọc, sữa công thức thủy phân với protein dễ tiêu hoá cho những bé có vấn đề về hệ tiêu hoá. Nhiều hãng sản xuất gần đây tung ra thị trường các nhãn hàng và dòng sữa được quảng bá là có khả năng \"tạo sự khác biệt\" bằng việc ứng dụng những công nghệ tiên tiến nhất. Và đây cũng là một trong những lý do đẩy giá thành sản phẩm của họ lên cao.\r\n\r\nTuy nhiên, liệu các ứng dụng công nghệ như vậy vào sữa bột công thức có mang lại hiệu quả vượt trội như quảng cáo và xứng đáng với chi phí phát sinh mà người tiêu dùng phải trả thêm cho những sản phẩm này, so với sữa công thức thông thường?\r\n\r\nSự thực về việc bổ sung DHA, ARA và các chất khác \r\n\r\nMột phát minh gần đây là sự bổ sung vào sữa công thức hai chuỗi axit béo không bão hoà đa nguyên (polyunsaturated fat) là DHA (docosahexaenoic) và ARA (arachidonic acid). Cả hai axit này đều đóng một vai trò chủ chốt trong quá trình phát triển trí não và theo lý thuyết, sự có mặt của DHA và ARA trong sữa mẹ có thể lý giải tại sao trẻ bú mẹ thường ghi điểm cao hơn trẻ bú sữa công thức trong các bài kiểm tra về phát triển trí não.\r\n\r\nTheo tiết lộ của một số hãng sản xuất, DHA đưa vào sữa bột được chiết xuất từ tảo, còn ARA được tinh chế từ nấm. Câu hỏi đặt ra ở đây là, liệu những chất phụ gia này có khiến trẻ uống sữa bột thông minh hơn như quảng cáo hay không.\r\n\r\nSheila Innis, giáo sư chuyên ngành dinh dưỡng nhi khoa tại Đại học British Columbia (Canada), cho biết, các nghiên cứu đã cho kết quả lẫn lộn.\r\n\r\nChuyên gia này khẳng định: “Tôi sẽ rất thận trọng khi đưa ra một phát ngôn như vậy đối với một em bé khoẻ mạnh, sinh đủ ngày, đủ tháng. Ở một nghiên cứu nhỏ, các em bé 18 tháng tuổi uống sữa công thức có bổ sung DHA và ARA đã ghi điểm cao hơn các bé sử dụng sữa công thức bình thường. Tuy nhiên, 4 nghiên cứu lớn hơn khác lại không cho thấy bất kỳ sự khác biệt nào. Bằng chứng rõ ràng hơn nhiều ở trẻ sinh non, những đứa bé vốn sinh ra không có những chất này và một số chất dinh dưỡng khác dự trữ trong cơ thể”.\r\n\r\nMột cải tiến quan trọng nữa đối với sữa công thức chính là việc bổ sung thêm chất xơ, giúp cung cấp “lương thực” cho hệ vi khuẩn có lợi nằm trong ruột già và ức chế những vi khuẩn có hại nhằm hỗ trợ hệ tiêu hóa của bé phát triển toàn diện.\r\n\r\nChất xơ dưới dạng thức ăn rất dễ nhận biết như các loại rau, củ, quả, … Tuy nhiên, chất xơ trong sữa công thức (hay còn gọi là Prebiotics) chính là hai chất Fructooligosaccharides (gọi tắt là FOS), có nguồn gốc từ thực vật và Galactooligosaccharides (GOS), có nguồn gốc từ động vật. Hai chất này được cho có khả năng giúp hoạt hóa hệ tiêu hóa, đồng thời ức chế các vi khuẩn có hại, không cho chúng “sinh sôi nảy nở”.\r\n\r\nHiện nay, chỉ có một số ít sữa công thức bổ sung những chất trên và các hãng sản xuất coi đây là thế mạnh của họ. Tuy nhiên, việc bổ sung chất xơ vào sữa công thức cũng tiềm ẩn nguy cơ do các hãng sản xuất phải nhập nguồn nguyên liệu, vốn là sản phẩm của công ty khác.\r\n\r\nNăm 2012, thị trường từng rúng động trước thông tin sữa bột có thể bị nhiễm khuẩn tiêu chảy từ chất xơ bổ sung. Cụ thể là, ngày 19.7, Trung tâm An toàn thực phẩm của Hong Kong nhận được cảnh báo của Ủy ban Châu Âu về việc một loại sữa bột cho trẻ nhỏ trên 12 tháng tuổi, được sản xuất tại Hà Lan và xuất khẩu sang Hong Kong, nghi bị nhiễm vi khuẩn Salmonella từ chất xơ GOS. Cơ quan thẩm quyền của Hà Lan đã phát hiện nguồn chất xơ do Hàn Quốc sản xuất và cung cấp cho nhiều hãng sữa bột trẻ em tại nước này bị nhiễm loại khuẩn gây tiêu chảy.\r\n\r\nMột sáng chế gần đây nhất và được ngày càng nhiều nhà sản xuất sữa công thức đưa vào sản phẩm của họ là bổ sung một trong hai chủng lợi khuẩn Probiotics và Synbiotics.\r\n\r\nProbiotics là các vi khuẩn sống đã được chứng minh là tốt cho sức khỏe, do chúng giúp cải thiện sự cân bằng của hệ vi khuẩn đường ruột. Probiotics chính là những vi khuẩn tốt, có vai trò tăng cường hệ miễn dịch của cơ thể, giúp cơ thể nâng cao khả năng phòng chống bệnh tật. Trong khi đó, Synbiotics được tạo thành dựa trên sự kết hợp giữa Probiotics và chất xơ (Prebiotics). Việc bổ sung Synbiotics, do đó, sẽ giúp cơ thể hình thành một hệ thống vi khuẩn tốt hùng hậu, khỏe mạnh và hoạt động hiệu quả.\r\n\r\nTuy nhiên, theo tiết lộ của các chuyên gia, điều khó nhất là làm thế nào để “đóng gói” nhưng vi khuẩn sống có lợi cho hệ miễn dịch trên vào hộp sữa và có thể bảo quản chúng trong thời gian 3 năm – như hạn sử dụng thông thường của sữa bột công thức. Các Probiotics và Synbiotics sẽ phải “ngủ yên” trong một thời gian dài, sau đó sẽ được đánh thức và thực hiện nhiệm vụ bảo vệ sức khỏe cho trẻ từ bên trong.\r\n\r\nĐể thực hiện điều đó, người ta đã phải sử dụng kỹ thuật “làm lạnh khô” (dry freezing). Các chuyên gia hạ thấp nhiệt độ tới một mức hợp lý để vi khuẩn sống rơi vào trạng thái “ngủ”. Ở trạng thái này, vi khuẩn có thể chịu được những thay đổi vật lý như áp suất, nhiệt độ, độ ẩm … đồng thời vẫn duy trì sự sống. Tiếp đó, các nhà sản xuất đưa vi khuẩn sống có lợi ở trạng thái \"ngủ\" theo tỷ lệ nhất định vào bột sữa.\r\n\r\nToàn bộ quá trình trên, nếu thực hiện thành công, sẽ giúp nâng cao chất lượng sữa công thức. Tuy nhiên, hiệu quả của từng loại sản phẩm sữa bột ứng dụng công nghệ này hiện thường do chính các nhà sản xuất thuê nghiên cứu đánh giá. Hiếm khi có các cơ quan kiểm định chất lượng độc lập tiến hành nghiên cứu và đánh giá về tác dụng thực sự của chúng.\r\n\r\nTrong một nghiên cứu độc lập hiếm hoi của các chuyên gia tiêu hóa, dinh dưỡng và nhi khoa Pháp năm 2010, nhóm tác giả phát hiện, trẻ được nuôi bằng sữa bột có bổ sung Probiotics hoặc Synbiotics có tốc độ tăng cân tương tự như những bạn cùng trang lứa uống sữa công thức thông thường. Điều này có nghĩa là, không có sự khác biệt nào về khả năng giúp phát triển cân nặng giữa sữa bột bổ sung lợi khuẩn và sữa bột thông thường.\r\n\r\nMột nghiên cứu độc lập nữa của các chuyên gia y tế Nam Phi, được công bố trên tạp chí Nutrition Journal năm 2012, cũng kết luận rằng, hiện không đủ bằng chứng lâm sàng để khẳng định sữa bột bổ sung lợi khuẩn giúp tăng cường sự phát triển ở trẻ sinh non và nhẹ cân được \"nuôi bộ\" hoàn toàn (tức là chỉ uống sữa công thức, không bú mẹ). Theo Vietnamnet.vn', '2018-12-16 15:40:26', 5),
(6, 2, 'Vinamilk phối hợp với Hội Nhi Khoa Việt Nam tổ chức hội thảo khoa học', 'hinh/510a047a62f07e5ecf49d87f5696e0db.Picture14.png<br>hinh/03e7e3f8f1b83d041b9cf22242232cf0.Picture15 - Copy.png<br>hinh/03e7e3f8f1b83d041b9cf22242232cf0.Picture15.png<br>hinh/03e7e3f8f1b83d041b9cf22242232cf0.Picture16.png<br>hinh/03e7e3f8f1b83d041b9cf22242232cf0.Picture17.png<br>hinh/03e7e3f8f1b83d041b9cf22242232cf0.Picture18.png<br>hinh/03e7e3f8f1b83d041b9cf22242232cf0.Picture19.png<br>', 'Vinamilk phối hợp với Hội Nhi Khoa Việt Nam tổ chức hội thảo khoa học “TĂNG CƯỜNG TRÍ NHỚ VÀ PHÁT TRIỂN TRÍ NÃO CHO BÉ', 'Hội thảo khoa học với chuyên đề “Tăng cường trí nhớ và phát triển trí não cho bé” quy tụ hơn 300 bác sĩ và nhân viên y tế của các bệnh viện lớn tại thành phố Hồ Chí Minh. Đặc biệt chương trình có sự tham dự của Giáo Sư Tiến Sĩ Nguyễn Gia Khánh – Chủ Tịch Hội Nhi Khoa Việt Nam; Tiến sĩ Femke Hannes – Giám Đốc Khoa Học Dinh Dưỡng Khu Vực Châu Á Thái Bình Dương của DSM – Thụy Sĩ; Bác sĩ chuyên khoa 2 Thái Thanh Thủy – Trưởng khoa tâm lý và phòng khám chất lượng cao bệnh viện Nhi Đồng 2 thành phố Hồ Chí Minh và bác sĩ Mai Thanh Việt – Giám Đốc Marketing Ngành Hàng Sữa Bột của Vinamilk. Với vai trò là chủ tọa hội đàm, GS.TS Nguyễn Gia Khánh, Chủ Tịch Hội Nhi Khoa Việt Nam chia sẻ “Khoa học dinh dưỡng nhi khoa đã chỉ ra 1000 ngày đầu đời là lúc não bộ của bé phát triển nhanh nhất về cấu trúc và hoàn thiện các chức năng quan trọng. Do đó, trong giai đoạn này việc tập trung dinh dưỡng cho sự phát triển trí não đóng vai trò cực kỳ quan trọng giúp trẻ phát huy tối ưu tiềm năng trí tuệ. Với mục tiêu giúp trẻ em phát triển toàn diện về thể chất và tinh thần, trẻ em cần phải được nuôi dạy và cung cấp chế độ dinh dưỡng để phát triển khỏe mạnh, thông minh, nhớ tốt, tiếp thu giỏi các kiến thức để đáp ứng nhu cầu phát triển của xã hội”.<img> Giáo Sư Tiến Sĩ Nguyễn Gia Khánh – Chủ Tịch Hội Nhi Khoa Việt Nam Trong hội thảo khoa học, Bác Sĩ Chuyên Khoa 2 Thái Thanh Thủy – Trưởng khoa tâm lý và phòng khám chất lượng cao, Bệnh viện Nhi đồng 2 chia sẻ về “Các phương pháp tăng cường trí nhớ cho bé” và nhấn mạnh vai trò của các bác sĩ nhi khoa trong việc tư vấn cho mẹ các dưỡng chất và phương pháp kích thích trí nhớ cho bé, đặc biệt trong 1000 ngày đầu đời.<img> Bác sĩ chuyên khoa 2 Thái Thanh Thủy Trưởng khoa tâm lý và phòng khám chất lượng cao, Bệnh Viện Nhi Đồng 2 Tại hội thảo, tiến sĩ Femke Hannes – Giám Đốc Khoa Học Dinh Dưỡng Khu Vực Châu Á Thái Bình Dương của DSM – Thụy Sĩ đã nêu bật vai trò của các dưỡng chất tăng cường trí nhớ và phát triển trí não trong những năm đầu đời của trẻ, nhấn mạnh vai trò của DHA và ARA, đặc biệt là hàm lượng Cholin cần bổ sung cho từng độ tuổi của bé, giúp tăng cường trí nhớ. <img> Tiến sĩ Femke Hannes Giám Đốc Khoa Học Dinh Dưỡng Khu Vực Châu Á Thái Bình Dương của DSM – Thụy Sĩ <img> Bác sĩ Mai Thanh Việt – Giám Đốc Marketing Ngành Hàng Sữa Bột Vinamilk Tiếp theo sự thành công của hội thảo khoa học tại thành phố Hồ Chí Minh, trong tháng 11/2016 Hội Nhi Khoa Việt Nam tiếp tục phối hợp với Vinamilk triển khai Hội Thảo Khoa Học “Tăng cường trí nhớ và phát triển trí não cho bé” tại các thành phố lớn khác. Vinamilk cam kết tiếp tục đồng hành với với Hội Nhi Khoa nói riêng và các tổ chức y tế, các tập đoàn dinh dưỡng trong và ngoài nước, nghiên cứu và phát triển các sản phẩm dinh dưỡng đạt chuẩn quốc tế, giá cả hợp lý, giúp tối ưu tiềm năng phát triển cả thể chất và trí tuệ của trẻ em Việt Nam, hiện thực hóa mục tiêu “Vươn Cao Việt Nam, Vươn Tầm Thế Giới” Box sản phẩm: Vinamilk luôn nỗ lực không ngừng trong việc ứng dụng những thành tựu khoa học tiên tiến vào sản phẩm sữa bột dành cho trẻ em. Dielac Alpha Gold ứng dụng thành công Lutein từ tập đoàn DSM Thụy Sĩ, tăng gấp ba DHA (*), gấp đôi Cholin (*), đươc chứng nhận lâm sàng giúp tăng cường trí nhớ và cải thiện chỉ số tâm vận động của trẻ, cải thiện tình trạng dinh dưỡng, tăng cân và chiều cao, hỗ trợ giảm mắc nhiễm khuẩn hô hấp và tiêu chảy. Dielac Alpha Gold được sản xuất tại Nhà Máy Sữa Bột Việt Nam với công nghệ hàng đầu thế giới và được chứng nhận bởi FDA – Hoa Kỳ, đáp ứng tiêu chuẩn thực phẩm để xuất khẩu sang Mỹ. (* ) So với sản phẩm Dielac Alpha 4<img> CÔNG TY CỔ PHẦN SỮA VIỆT NAM Số 10 Tân Trào, P. Tân Phú, Q.7, TP. HCM. Thực phẩm bổ sung: Sản phẩm dinh dưỡng nhãn hiệu Dielac Alpha Gold', '2018-12-16 16:10:18', 1),
(8, 3, 'Dielac Alpha Gold hỗ trợ phát triển trí não trẻ', 'hinh/db04d8aa23ba43d0cd75d6a987a1644e.Picture19.png<br>hinh/db04d8aa23ba43d0cd75d6a987a1644e.Picture20.png<br>hinh/db04d8aa23ba43d0cd75d6a987a1644e.Picture21.png<br>hinh/db04d8aa23ba43d0cd75d6a987a1644e.Picture22.png<br>', 'Vinamilk đã ứng dụng nghiên cứu mới của DSM Thụy Sĩ cho sữa bột trẻ em, giúp hỗ trợ phát triển cả thể chất và trí não', 'Vinamilk đã ứng dụng nghiên cứu mới của DSM Thụy Sĩ cho sữa bột trẻ em, giúp hỗ trợ phát triển cả thể chất và trí não.\r\nHội Nhi khoa Việt Nam đã tổ chức chương trình “Dinh dưỡng cho sự phát triển não bộ của trẻ” với sự tài trợ của Công ty cổ phần sữa Việt Nam (Vinamilk). 800 bác sĩ và nhân viên y tế tại Hà Nội và TP HCM đã tham dự hội nghị, trong đó có: Giáo sư, Tiến sĩ Nguyễn Gia Khánh, Phó chủ tịch hội Nhi khoa Việt Nam; Tiến sĩ Rob Schmidt Haeri, Giám đốc Khoa học và cải tiến khu vực châu Á -Thái Bình Dương; Tiến sĩ James Bauly, Giám đốc marketing khu vực châu Á Thái Bình Dương của DSM, Thụy Sĩ – tập đoàn toàn cầu chuyên nghiên cứu khoa học trong lĩnh vực sức khỏe, dinh dưỡng và sản xuất vật liệu dinh dưỡng; ông Mai Thanh Việt, Giám đốc marketing ngành hàng Vinamilk. <img> GS. TS Nguyễn Gia Khánh, Phó chủ tịch hội Nhi khoa Việt Nam phát biểu khai mạc hội nghị.\r\nGiáo sư, tiến sĩ Nguyễn Gia Khánh, Phó chủ tịch hội Nhi khoa Việt Nam trình bày báo cáo khoa học với chủ đề: “Tối ưu sự phát triển trí não của trẻ trong giai đoạn sớm”. Ông cho biết: “Khoa học chỉ ra rằng 0-3 tuổi là giai đoạn đặc biệt quan trọng giúp trẻ phát huy tối ưu tiềm năng trí tuệ. Đây là lúc não bộ của bé phát triển nhanh nhất về cấu trúc và hoàn thiện các chức năng”. Để bé có cơ hội phát huy tối đa tiềm năng của trí não, các bậc cha mẹ cần chú ý bổ sung dinh dưỡng phù hợp. Bên cạnh các dưỡng chất quan trọng cho não như DHA, AA, Omega 3-6, khoa học dinh dưỡng đã cho thấy dưỡng chất Lutein là một sắc tố chiếm đến 67% carotenoid có trong não”.\r\nTheo nghiên cứu của DSM, Lutein là một carotenoid có nhiều trong sữa mẹ và tìm thấy trong não của trẻ sơ sinh tại 4 khu vực chính quan trọng cho việc học hỏi và phát triển của trẻ: vỏ não vùng thính giác liên quan đến phát triển ngôn ngữ; vỏ não trán được xem như chịu trách nhiệm về các chức năng vận động và giải quyết vấn đề; đôi hải mã liên quan đến chức năng ghi nhớ; vỏ não chẩm chịu trách nhiệm về thị giác. Lutein và Zeaxanthin là 2 loại carotenoid giúp bảo vệ võng mạc khỏi sự nguy hại do oxy hóa và quan trọng cho sự duy trì sức khỏe mắt. Như vậy, khi Lutien kết hợp với các dưỡng chất phát triển trí não như DHA sẽ tạo hiệu quả tương tác giữa não bộ – thị giác và trực tiếp tác động giúp phát triển tối đa cấu trúc và chức năng não bộ. <img> Ông Mai Thanh Việt, Giám đốc Marketing ngành hàng trong phần trình bày về chủ đề “Dielac Alpha gold – đặc chế hỗ trợ phát triển trí não”.\r\nCũng tại hội nghị, đại diện công ty Vinamilk đã giới thiệu sản phẩm sữa bột trẻ em Diealac Alpha Gold mới. Đây là dòng sản phẩm hỗ trợ phát triển trí não, phát triển bởi trung tâm Nghiên cứu & Phát triển sản phẩm Vinamilk, với công thức Opti-Grow IQ bổ sung gấp đôi hàm lượng DHA và Lutein từ tập đoàn dinh dưỡng DSM – Thụy Sĩ, cung cấp, cùng các dưỡng chất thiết yếu khác như ARA, Cholin, Omega 3, Omega 6 giúp bé phát triển về trí não và cả về thể chất. Sản phẩm đáp ứng các tiêu chuẩn quốc tế của WHO/FAO, AFSSA Pháp về hàm lượng DHA bổ sung.\r\nDielac Alpha Gold còn được sản xuất tại nhà máy sữa bột có công nghệ hiện đại thế giới và được chứng nhận bởi FDA -Ủy ban an toàn thực phẩm Mỹ, đáp ứng những yêu cầu khắt khe về tiêu chuẩn thực phẩm để xuất khẩu sang Mỹ. <img> Bà Mai Kiều Liên, Chủ tịch Hội đồng quản trị kiêm Tổng giám đốc Vinamilk đã phát biểu: “Mục tiêu của Vinamilk là nâng tầm dinh dưỡng chất lượng quốc tế cho các sản phẩm sữa bột trẻ em, từ đó tạo cơ hội cho trẻ em Việt Nam được sử dụng sản phẩm dinh dưỡng không thua kém sản phẩm nhập khẩu với giá cả hợp lý”. Với việc đáp ứng những tiêu chuẩn quốc tế, cùng năng lực sản xuất hiện đại, Dielac Apha Gold đang thể hiện chiến lược nhất quán của Vinamilk trong những năm vừa qua. Theo vnexpress.net', '2018-12-16 16:19:00', 0),
(9, 2, 'Giải pháp dinh dưỡng quốc tế “Bé hấp thu khỏe, phát triển trí não tốt hơn', 'hinh/a7b7566dea69a61510337c65e1fce5aa.Picture23.ng - Copy.png<br>hinh/a7b7566dea69a61510337c65e1fce5aa.Picture23.ng.png<br>hinh/a7b7566dea69a61510337c65e1fce5aa.Picture24.png<br>hinh/a7b7566dea69a61510337c65e1fce5aa.Picture25.png<br>hinh/a7b7566dea69a61510337c65e1fce5aa.Picture26.png<br>hinh/a7b7566dea69a61510337c65e1fce5aa.Picture27.png<br>hinh/a7b7566dea69a61510337c65e1fce5aa.Picture28.png<br>hinh/a7b7566dea69a61510337c65e1fce5aa.Picture29.png<br>', 'Nuôi con khỏe mạnh, thông minh là mối quan tâm hàng đầu của các bậc phụ huynh. Vì vậy, các bậc cha mẹ luôn cố gắng bổ sung cho con những loại thực phẩm giàu DHA, Lutein, ARA… mà bỏ qua một yếu tố rất quan trọng: Liệu trẻ có hấp thu được tốt các dưỡng chất ấy?', 'Nhằm “gỡ rối” cho các bậc phụ huynh xung quanh vấn đề: “Làm thế nào để trẻ hấp thu tốt”, mới đây Tạp chí Mẹ&Con với sự tài trợ của nhãn hàng Optimum Gold thuộc Công ty CP Sữa Việt Nam (VINAMILK) đã tổ chức “Hội thảo khoa học – Giải pháp dinh dưỡng quốc tế “Bé hấp thu khỏe, phát triển trí não tốt hơn” với sự tham gia của các chuyên gia dinh dưỡng hàng đầu trong nước và quốc tế. Hội thảo đã giới thiệu giải pháp khoa học tiên tiến cho trẻ hiện nay, đồng thời, giúp phụ huynh hiểu hơn về mối quan hệ giữa hai yếu tố “dưỡng chất hỗ trợ phát triển trí não” và “khả năng hấp thu của trẻ” để giúp con thông minh hơn <img>  <img>  BS. CKII Đỗ Thị Ngọc Diệp – Giám đốc Trung tâm Dinh dưỡng TP.HCM trình bày về vai trò của dinh dưỡng trong phát triển não bộ của trẻ em <br>\r\nNền tảng giúp bé hấp thu tốt\r\nĐược đánh giá là bộ não thứ hai của cơ thể, hệ tiêu hóa thực hiện 90% quá trình hấp thu các dưỡng chất từ thức ăn vào cơ thể trẻ. Vì vậy, hệ tiêu hóa khỏe mạnh sẽ giúp trẻ hấp thu các dưỡng chất, tăng sức đề kháng, tạo nền tảng cho cơ thể khỏe mạnh và hấp thu tốt các dưỡng chất phát triển trí não. Từ đó, trẻ sẽ tiếp thu, học hỏi và thông minh hơn. <img> Ông Mai Thanh Việt – Giám đốc Marketing ngành hàng của Vinamilk phát biểu tại hội thảo \r\nPhát biểu tại Hội thảo, Ông Mai Thanh Việt – Giám đốc Marketing ngành hàng Công ty Cổ phần Sữa Việt Nam (VINAMILK) cho biết: “Là một trong những nhà sản xuất sữa hàng đầu tại Việt Nam, chúng tôi luôn nỗ lực hết mình để nghiên cứu và tìm ra những giải pháp dinh dưỡng cho trẻ em Việt Nam nhằm phát triển trọn vẹn cả trí não và thể chất cho trẻ. Chúng tôi hy vọng rằng buổi Hội thảo khoa học – Giải pháp dinh dưỡng quốc tế “Bé hấp thu khỏe, trí não phát triển tốt hơn” đã phần nào giúp các bậc phụ huynh có cái nhìn bao quát hơn về việc bổ sung các dưỡng chất cho trẻ, qua đó lựa chọn cho mình một sản phẩm dinh dưỡng chất lượng và phù hợp với thể chất con em mình”.\r\nThêm một loại sữa giúp trẻ hấp thu tốt\r\nĐối với trẻ nhỏ, bên cạnh sữa mẹ và chế độ ăn uống hợp lý thì nguồn dinh dưỡng từ sữa công thức cũng đóng vai trò quan trọng trong việc giúp trẻ phát triển trí não và hấp thu dưỡng chất một cách tốt nhất. Vì vậy, nhiều bậc phụ huynh phân vân không biết chọn loại sữa nào tốt nhất giúp con phát triển toàn diện.<img> Các bác sĩ và chuyên gia dinh dưỡng giải đáp thắc mắc của khách mời tham gia hội thảo.JPG\r\nGiải đáp bài toán khó này, cũng tại buổi hội thảo, VINAMILK đã giới thiệu đến người tiêu dùng dòng sản phẩm dinh dưỡng cao cấp Optimum Gold với thông điệp “Bé hấp thu khỏe, phát triển trí não tốt hơn”. Đây là thành quả hợp tác quốc tế mới nhất giữa VINAMILK và Tập đoàn DSM Thụy Sỹ nhằm mang đến cho trẻ em Việt Nam một giải pháp dinh dưỡng khoa học giúp tối ưu hóa sự phát triển trí não của trẻ dựa trên nền tảng hấp thu tốt các dưỡng chất như DHA, ARA, Lutein, Taurine… <img>  Ông Wouter Claerhout – Giám đốc Marketing toàn cầu của Tập đoàn dinh dưỡng DSM Thụy Sỹ<img> Tiến sĩ James Bauly – Đại diện Tập đoàn dinh dưỡng DSM Thụy Sỹ  chia sẻ về Giải pháp dinh dưỡng quốc tế giúp bé phát triển trí não tốt hơn <img>  TS. BS. Nguyễn Anh Tuấn – Thư ký Chi Hội Tiêu hóa Nhi Việt Nam trình bày về hấp thu khỏe giúp trẻ phát triển tối ưu não bộ\r\nĐiểm ưu việt của sản phẩm đó là công thức không chỉ được tăng thêm 20% DHA từ tảo tinh khiết cùng các dưỡng chất tốt cho trí não khác như Lutein, ARA, Taurin…mà còn bổ sung nguồn đạm Whey từ sữa giàu Alpha-Lactabumin dễ hấp thu. Ngoài ra, Optimum Gold mới còn có chất xơ hòa tan FOS và lợi khuẩn Probiotics giúp tăng cường vi sinh có lợi, ức chế các vi khuẩn có hại, hỗ trợ tiêu hóa khỏe mạnh, tăng cường hấp thu các dưỡng chất thiết yếu.', '2018-12-16 16:25:50', 1),
(10, 2, 'Huấn luyện tư vấn dinh dưỡng và sản phẩm Vinamilk tại Gia Lai', 'hinh/c2e07db240a7c32f911c63eaf54e3c30.Picture30 - Copy.png<br>hinh/c2e07db240a7c32f911c63eaf54e3c30.Picture30.png<br>', 'Đây là cầu nối rất quan trọng giữa nhà sản xuất và người tiêu dùng. Đến tham dự chương trình, về phía Vinamik có sự tham gia của ông Nguyễn Hồng Sinh – Giám Đốc Kinh Doanh Toàn Quốc, Bác sĩ Mai Thanh Việt – Giám Đốc Marketing Ngành Hàng Sữa Bột, ông Nguyễn Kim Trung – Giám Đốc Kinh Doanh Miền Trung 1.', '<img> Trong suốt 40 năm qua, Vinamilk không ngừng tăng trưởng và phát triển. Sữa bột là một trong những ngành hàng chủ lực, luôn cải tiến, nâng cao chất lượng sản phẩm nhằm nhằm mang lại những sản phẩm tốt và phù hợp nhất cho nhu cầu và sức khỏe người tiêu dùng.\r\nTại buổi huấn luyện, bác sĩ Mai Thanh Việt đã phổ biến kiến thức dinh dưỡng, chăm sóc sức khỏe trẻ em và người cao tuổi, đồng thời giới thiệu các tiêu chuẩn khuyến nghị quốc tế về dinh dưỡng đảm bảo sức khỏe.\r\nVới mục tiêu nâng tầm chất lượng quốc tế cho các sản phẩm sữa bột, Vinamilk không ngừng nghiên cứu và phát triển những sản phẩm chất lượng cao đạt tiêu chuẩn quốc tế, tạo cơ hội cho trẻ em Việt Nam được sử dụng sản phẩm dinh dưỡng tốt, không thua kém sản phẩm nhập khẩu  với giá cả hợp lý.', '2018-12-16 16:28:52', 4),
(11, 1, 'Tặng ngay 2 hộp khi mua 2 lốc Sữa tiệt trùng Dutch Lady không đường lốc 4 hộp x 180ml', 'hinh/4eed9463f40f1c224b156a23291dc09a.TINKM01.jpg<br>hinh/4eed9463f40f1c224b156a23291dc09a.TINKM02.jpg<br>hinh/4eed9463f40f1c224b156a23291dc09a.TINKM03.jpg<br>hinh/4eed9463f40f1c224b156a23291dc09a.TINKM04.jpg<br>', 'TẶNG NGAY 2 HỘP KHI MUA 2 LỐC SỮA TIỆC TRÙNG DUTCH LADY KHÔNG ĐƯỜNG LỐC 4 HỘP X 180ML', '-Hình thức KM: Tặng 2 hộp sữa cho khách hàng không thu tiền, kèm theo việc mua hàng hóa\n-Thời gian khuyến mại: 9/12/2018 đến 30/12/2018 hoặc đến khi hết quà khuyến mại.\n-Phạm vi áp dụng: Toàn quốc.\n<img>\n<img>\n<img>\n<img>\n', '2018-12-16 23:23:52', NULL),
(12, 1, 'Khuyến mãi hấp dẫn trong tháng 8 từ Vinamilk Sure Prevent - Quà tặng sức khỏe, gửi 	trọn yêu thương.', 'hinh/47851cee7a44cb5a853ac1f7b27d6a82.tin2.jpg<br>hinh/47851cee7a44cb5a853ac1f7b27d6a82.tin2 - Copy.jpg<br>', 'Sức khỏe luôn là món quà tuyệt vời nhất giúp bạn thể hiện sự quan tâm đến cha mẹ. Với tinh thần 	lạc, vui vẻ và một sức khỏe dồi dào, cha mẹ sẽ luôn bên cạnh, vui vầy cùng con cháu, kiến tạo nên 	gia đình hạnh phục vẹn tròn.', 'Sức khỏe luôn là món quà tuyệt vời nhất giúp bạn thể hiện sự quan tâm đến cha mẹ. Với tinh thần 	lạc, vui vẻ và một sức khỏe dồi dào, cha mẹ sẽ luôn bên cạnh, vui vầy cùng con cháu, kiến tạo nên 	gia đình hạnh phục vẹn tròn.\nKhuyến mãi hấp dẫn từ Vinamilk Sure Prevent trong tháng 08/2018\nNội dung: Khi Người tiêu dùng mua 1 Lon sữa bột Sure Prevent 900gr tặng ngay 2 chai sữa bột pha sẵn Sure Prevent 200ml (Quy đổi 1 Lon 900gr= 2 Lon 400gr)\nPhạm vi: Chỉ áp dụng tại các cửa hàng bán lẻ trên toàn quốc.\nThời gian: Từ 01/08 - 31/08/2018 (hoặc đến khi hết hàng hóa khuyến mãi).\n<img>\nVinamilk Sure Prevent với giải pháp dinh dưỡng được nghiên cứu lâm sàng, tăng 20% Canxi và Vitamin K2 tạo hệ xương chắc khỏe, đồng thời đáp ứng 100% hàm lượng Plant Sterols theo 	khuyến nghị FDA Hoa Kỳ giúp giảm nguy cơ mắc bệnh tim mạch, giúp tăng cường sức khỏe cho 	Người Cao Tuổi.\nKhuyến mãi hấp dẫn trong tháng 8 từ Vinamilk Sure Prevent - Quà tặng sức khỏe, gửi trọn yêu thương.\n', '2018-12-16 23:25:12', NULL),
(13, 1, 'Tặng ngay 1 hộp khi mua 2 lốc sữa tươi Vinamilk 100% 180ml', 'hinh/1e89c2ead240a6d37234807a37ae1041.spmoi1.jpg<br>hinh/1e89c2ead240a6d37234807a37ae1041.spmoi2.png<br>hinh/1e89c2ead240a6d37234807a37ae1041.spmoi3.png<br>hinh/1e89c2ead240a6d37234807a37ae1041.spmoi4.jpg<br>', 'Trong Thời gian khuyến mại kể từ nay đến 31/08/2018, khi khách hàng mua hai (02) lốc (8 hộp) STTT Vinamilk 100% 180 ml các loại sẽ được tặng một (01) hộp STTT Vinamilk 100% cùng dung tích. Hãy cùng nhanh tay mua ngay Sữa tươi Vinamilk 100% và trao tặng món quà sức khỏe đầy ý nghĩa này đến những người thân yêu nhé! Chương trình có thể kết thúc trước thời hạn khi hết hàng hóa khuyến mại.', 'Trong Thời gian khuyến mại kể từ nay đến 31/08/2018, khi khách hàng mua hai (02) lốc (8 hộp) STTT Vinamilk 100% 180 ml các loại sẽ được tặng một (01) hộp STTT Vinamilk 100% cùng dung tích. Hãy cùng nhanh tay mua ngay Sữa tươi Vinamilk 100% và trao tặng món quà sức khỏe đầy ý nghĩa này đến những người thân yêu nhé! Chương trình có thể kết thúc trước thời hạn khi hết hàng hóa khuyến mại. Tươi ngon thuần khiết từ trang trại Organic tiêu chuẩn Châu Âu đầu tiên tại Việt Nam Với nguồn sữa được lấy từ những cô bò organic chăn thả tự nhiên trên đồi cỏ rộng lớn của vùng đất Đà Lạt, cùng quy trình tuân thủ nghiêm ngặt theo chế độ “3 không” của tiêu chuẩn organic Châu Âu, Sữa tươi Vinamilk 100% Organic hoàn toàn thuần khiết và giàu các dưỡng chất tự nhiên tốt sức khỏe. Chứng nhận tiêu chuẩn hữu cơ Châu Âu :<img> Chứng nhận “Trang trại bò sữa organic tiêu chuẩn đầu tiên tại Việt Nam” <img> Sữa tươi 100% Organic tiêu chuẩn 3 không -Không sử dụng hoóc-môn tăng trưởng. -Không dư lượng thuốc kháng sinh. -Không sử dụng thuốc trừ sâu. Giá trị dinh dưỡng trung bình trong 100ml Các vitamin và khoáng chất có sẵn trong sữa tươi - Vitamins and minerals are prensent in fresh milk. <img> -59,7 kcal năng lượng -3,3g chất béo -3,1g chất đạm -4,4g Hydrat carbon Chủng loại sản phẩm: -Sữa tươi 100% Organic tiêu chuẩn Châu Âu KHÔNG ĐƯỜNG - 1 LÍT -Sữa tươi 100% Organic tiêu chuẩn Châu Âu KHÔNG ĐƯỜNG - 180ML', '2018-12-16 23:27:18', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
