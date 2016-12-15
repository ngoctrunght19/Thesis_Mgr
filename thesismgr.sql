-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2016 at 06:47 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesismgr`
--

-- --------------------------------------------------------

--
-- Table structure for table `canbokhoa`
--

CREATE TABLE `canbokhoa` (
  `id` varchar(12) CHARACTER SET utf8 NOT NULL,
  `hoten` varchar(45) CHARACTER SET utf8 NOT NULL,
  `mataikhoan` int(11) NOT NULL,
  `makhoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `canbokhoa`
--

INSERT INTO `canbokhoa` (`id`, `hoten`, `mataikhoan`, `makhoa`) VALUES
('khoa', 'Trần Văn Khoa', 721, 2);

-- --------------------------------------------------------

--
-- Table structure for table `chudenghiencuu`
--

CREATE TABLE `chudenghiencuu` (
  `id` int(11) NOT NULL,
  `tenchude` varchar(45) CHARACTER SET utf8 NOT NULL,
  `magiangvien` varchar(12) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chudenghiencuu`
--

INSERT INTO `chudenghiencuu` (`id`, `tenchude`, `magiangvien`) VALUES
(5, 'tin hoc co so', 'gv03');

-- --------------------------------------------------------

--
-- Table structure for table `detai`
--

CREATE TABLE `detai` (
  `id` int(11) NOT NULL,
  `tendetai` varchar(200) CHARACTER SET utf8 NOT NULL,
  `mahocvien` varchar(12) CHARACTER SET utf8 NOT NULL,
  `giangvienhuongdan` varchar(12) CHARACTER SET utf8 NOT NULL,
  `trangthai` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `thaydoi` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detai`
--

INSERT INTO `detai` (`id`, `tendetai`, `mahocvien`, `giangvienhuongdan`, `trangthai`, `updated_at`, `created_at`, `thaydoi`) VALUES
(2, 'mang may tính', '14020789', 'gv01', 'chapnhan', '2016-12-15 01:50:26', NULL, 'rut');

-- --------------------------------------------------------

--
-- Table structure for table `donvi`
--

CREATE TABLE `donvi` (
  `id` int(11) NOT NULL,
  `tendonvi` varchar(255) CHARACTER SET utf8 NOT NULL,
  `makhoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donvi`
--

INSERT INTO `donvi` (`id`, `tendonvi`, `makhoa`) VALUES
(1, 'bo mon cntt', 2);

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `magiangvien` varchar(12) CHARACTER SET utf8 NOT NULL,
  `hoten` varchar(45) CHARACTER SET utf8 NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 NOT NULL,
  `makhoa` int(11) NOT NULL,
  `mataikhoan` int(11) NOT NULL,
  `donvi` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`magiangvien`, `hoten`, `email`, `makhoa`, `mataikhoan`, `donvi`, `updated_at`, `created_at`) VALUES
('12345', 'giang viên', 'ngoctrunght19@gmail.com', 2, 825, 'bo mon cntt', NULL, NULL),
('gv01', 'giảng viên 1', 'ngoctrunght19@gmail.com', 2, 826, 'Bộ môn công nghệ phần mềm', NULL, NULL),
('gv02', 'giảng viên 2', 'ngoctrunght19@gmail.com', 2, 827, 'Bộ môn công nghệ phần mềm', NULL, NULL),
('gv03', 'giảng viên 3', 'ngoctrunght19@gmail.com', 2, 828, 'Bộ môn công nghệ phần mềm', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hocvien`
--

CREATE TABLE `hocvien` (
  `mahocvien` varchar(12) CHARACTER SET utf8 NOT NULL,
  `hoten` varchar(45) CHARACTER SET utf8 NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 NOT NULL,
  `mataikhoan` int(11) NOT NULL,
  `makhoa` int(11) NOT NULL,
  `nganhhoc` varchar(255) CHARACTER SET utf8 NOT NULL,
  `khoahoc` varchar(255) CHARACTER SET utf8 NOT NULL,
  `duocdangky` varchar(45) COLLATE utf8_unicode_ci DEFAULT '0',
  `danophoso` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocvien`
--

INSERT INTO `hocvien` (`mahocvien`, `hoten`, `email`, `mataikhoan`, `makhoa`, `nganhhoc`, `khoahoc`, `duocdangky`, `danophoso`) VALUES
('14020633', 'Đỗ Văn Quang', 'ngoctrunght19@gmail.com', 829, 2, 'Công nghệ thông tin', '2014', '1', 0),
('14020678', 'Nguyễn Quang Hiếu', 'ngoctrunght19@gmail.com', 830, 2, 'Công nghệ thông tin', '2014', '1', 0),
('14020789', 'Nguyễn Đức Thuần', 'ngoctrunght19@gmail.com', 831, 2, 'Công nghệ thông tin', '2014', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `makhoa` int(11) NOT NULL,
  `tenkhoa` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`makhoa`, `tenkhoa`) VALUES
(2, 'Công nghệ thông tin'),
(3, 'công nghệ thông tin'),
(4, 'Công nghệ thông tin'),
(5, 'Điện tử viễn thông'),
(6, 'Vật lý kỹ thuật');

-- --------------------------------------------------------

--
-- Table structure for table `khoahoc`
--

CREATE TABLE `khoahoc` (
  `id` int(11) NOT NULL,
  `tenkhoahoc` varchar(45) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoahoc`
--

INSERT INTO `khoahoc` (`id`, `tenkhoahoc`) VALUES
(4, '2012');

-- --------------------------------------------------------

--
-- Table structure for table `linhvuc`
--

CREATE TABLE `linhvuc` (
  `id` int(11) NOT NULL,
  `tenlinhvuc` varchar(45) CHARACTER SET utf8 NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `linhvuc`
--

INSERT INTO `linhvuc` (`id`, `tenlinhvuc`, `parent_id`) VALUES
(1, 'Mạng', NULL),
(2, 'Mạng không dây', 1),
(3, 'Mạy có dây', 1),
(4, 'Phần cứng', NULL),
(5, 'Ram', 4),
(6, 'CPU', 4),
(7, 'DDR', 5),
(8, 'DDR1', 5),
(9, 'DDR2', 5),
(11, 'Kỹ nghệ phần mềm', NULL),
(12, 'Kiểm thử', 11),
(13, 'Kiểm chứng', 11),
(14, 'Quản lý dự án', 11),
(15, 'Quản lý nhân sự', 14);

-- --------------------------------------------------------

--
-- Table structure for table `linhvuc_gv`
--

CREATE TABLE `linhvuc_gv` (
  `id` int(11) NOT NULL,
  `magiangvien` varchar(12) CHARACTER SET utf8 NOT NULL,
  `malinhvuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `linhvuc_gv`
--

INSERT INTO `linhvuc_gv` (`id`, `magiangvien`, `malinhvuc`) VALUES
(16, '12345', 1),
(17, '12345', 2),
(18, '12345', 3);

-- --------------------------------------------------------

--
-- Table structure for table `modangky`
--

CREATE TABLE `modangky` (
  `id` int(11) NOT NULL,
  `makhoa` int(11) DEFAULT NULL,
  `trangthai` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modangky`
--

INSERT INTO `modangky` (`id`, `makhoa`, `trangthai`, `updated_at`, `created_at`) VALUES
(1, 2, 'dong', '2016-12-15 01:50:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nganhhoc`
--

CREATE TABLE `nganhhoc` (
  `id` int(11) NOT NULL,
  `tennganh` varchar(45) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nganhhoc`
--

INSERT INTO `nganhhoc` (`id`, `tennganh`) VALUES
(4, 'điện tử');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `username` varchar(45) CHARACTER SET utf8 NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL,
  `quyen` varchar(45) CHARACTER SET utf8 NOT NULL,
  `remember_token` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `TAIKHOANcol` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `actived` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `username`, `password`, `quyen`, `remember_token`, `TAIKHOANcol`, `updated_at`, `created_at`, `actived`) VALUES
(720, 'admin', '$2y$10$KEZ0poI1dQ2O.ggHZ/N33u8uqW3lx4DhKcd6WD3pRfUJnYesmrW/6', 'admin', NULL, NULL, NULL, NULL, 1),
(721, 'khoa', '$2y$10$ewMLm2caRcJDAPctcy4kqurWAKRxsmt0bHRszbl43XqAzzYKPTDE6', 'khoa', 'g8rZR9VPqT8kPQBaAXMPmOb2aQPKsZh7NcjO5ZdmwTFyqOtTEdHwbuA8TPCg', NULL, '2016-12-15 05:16:55', NULL, 1),
(825, '12345', '$2y$10$uM.mcFI3U9/aXySmuwzNAeEFEVV53eNu0alJ7EalGGprQtDq2NYA6', 'giangvien', '0ROv3oF2lFgc4g2FjFFGHRgQ4ujCjPL1LrSR6KRI1KvpiDVujMmufwf33sLQ', NULL, '2016-12-15 00:45:48', NULL, 1),
(826, 'gv01', '$2y$10$sXetSe1kESoTBtn2018qN.zFzp4j2gfa/FYt5T/sjoMPEamfEheUW', 'giangvien', NULL, NULL, '2016-12-15 01:48:17', NULL, 1),
(827, 'gv02', '$2y$10$3Oz3DPAJ6C6UsG3QwfF8Z.coJewpe0hiQRwydjchT/NHReFGCyDP.', 'giangvien', NULL, NULL, NULL, NULL, 0),
(828, 'gv03', '$2y$10$tetx.6Dw3T5V6FCLa7/vtubMOnNAKuTJERKnr8OHbidvrlu2.vdES', 'giangvien', 'zsgvp2jpYDT27WOvbozxMxNGvkOIhkjIkSYv6K609sGIm02r5DgqAvA9cNVw', NULL, '2016-12-15 01:48:26', NULL, 1),
(829, '14020633', '$2y$10$Zch.2eIjC4FKk74VbmAmA.Pd.yjDW.RuaB0U8u4cYjOeqfLWbQSzm', 'hocvien', NULL, NULL, NULL, NULL, 0),
(830, '14020678', '$2y$10$kwe5hpAoO2LzFuzTRCa0NeRb8mbIsYib8hE2CDeR82lRGibbb.kZ6', 'hocvien', NULL, NULL, NULL, NULL, 0),
(831, '14020789', '$2y$10$sUutaTRU4e9cBJ/Lnk6Vi.MNiIvOs4tBOEG/o/UEDlEl.qs.wEuC2', 'hocvien', NULL, NULL, '2016-12-15 01:45:46', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `thongbao`
--

CREATE TABLE `thongbao` (
  `id` int(11) NOT NULL,
  `thongbao` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `makhoa` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thongbao`
--

INSERT INTO `thongbao` (`id`, `thongbao`, `makhoa`) VALUES
(4, 'Nộp hồ sơ bảo vệ ngày 01/01/2017', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `canbokhoa`
--
ALTER TABLE `canbokhoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_CANBOKHOA_TAIKHOAN1_idx` (`mataikhoan`),
  ADD KEY `fk_CANBOKHOA_KHOA1_idx` (`makhoa`);

--
-- Indexes for table `chudenghiencuu`
--
ALTER TABLE `chudenghiencuu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_CHUDENGHIENCUU_GIANGVIEN1_idx` (`magiangvien`);

--
-- Indexes for table `detai`
--
ALTER TABLE `detai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tendetai_UNIQUE` (`tendetai`),
  ADD KEY `fk_DETAI_ HOCVIEN1_idx` (`mahocvien`),
  ADD KEY `fk_DETAI_GIANGVIEN1_idx` (`giangvienhuongdan`);

--
-- Indexes for table `donvi`
--
ALTER TABLE `donvi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tendonvi_UNIQUE` (`tendonvi`),
  ADD KEY `fk_donvi_khoa1_idx` (`makhoa`);

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`magiangvien`),
  ADD KEY `fk_GIANGVIEN_KHOA1_idx` (`makhoa`),
  ADD KEY `fk_GIANGVIEN_TAIKHOAN1_idx` (`mataikhoan`);

--
-- Indexes for table `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`mahocvien`),
  ADD KEY `fk_HOCVIEN_TAIKHOAN_idx` (`mataikhoan`),
  ADD KEY `fk_HOCVIEN_KHOA1_idx` (`makhoa`),
  ADD KEY `fk_HOCVIEN_NGANH` (`nganhhoc`),
  ADD KEY `fk_HOCVIEN_KHOAHOC_idx` (`khoahoc`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`makhoa`);

--
-- Indexes for table `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linhvuc`
--
ALTER TABLE `linhvuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linhvuc_gv`
--
ALTER TABLE `linhvuc_gv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_magv_idx` (`magiangvien`),
  ADD KEY `fk_malinhvuc_idx` (`malinhvuc`);

--
-- Indexes for table `modangky`
--
ALTER TABLE `modangky`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_makhoa_idx` (`makhoa`);

--
-- Indexes for table `nganhhoc`
--
ALTER TABLE `nganhhoc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chudenghiencuu`
--
ALTER TABLE `chudenghiencuu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `detai`
--
ALTER TABLE `detai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `donvi`
--
ALTER TABLE `donvi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `makhoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `linhvuc`
--
ALTER TABLE `linhvuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `linhvuc_gv`
--
ALTER TABLE `linhvuc_gv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `modangky`
--
ALTER TABLE `modangky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nganhhoc`
--
ALTER TABLE `nganhhoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=832;
--
-- AUTO_INCREMENT for table `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `canbokhoa`
--
ALTER TABLE `canbokhoa`
  ADD CONSTRAINT `fk_CANBOKHOA_KHOA1` FOREIGN KEY (`makhoa`) REFERENCES `khoa` (`makhoa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_CANBOKHOA_TAIKHOAN1` FOREIGN KEY (`mataikhoan`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chudenghiencuu`
--
ALTER TABLE `chudenghiencuu`
  ADD CONSTRAINT `fk_CHUDENGHIENCUU_GIANGVIEN1` FOREIGN KEY (`magiangvien`) REFERENCES `giangvien` (`magiangvien`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
