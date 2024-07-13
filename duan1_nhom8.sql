-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2024 at 02:33 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1_nhom8`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anhsanpham`
--

CREATE TABLE `tb_anhsanpham` (
  `id_anh_san_pham` int NOT NULL,
  `link_anh` varchar(255) NOT NULL,
  `id_san_pham` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_danhmuc`
--

CREATE TABLE `tb_danhmuc` (
  `id_danh_muc` int NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `mo_ta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_danhmuc`
--

INSERT INTO `tb_danhmuc` (`id_danh_muc`, `ten_danh_muc`, `mo_ta`) VALUES
(1, 'Điện thoại', 'Điện thoại các hãng '),
(16, 'giày', 'khó'),
(17, 'giày', '12234565'),
(20, 'Máy tính bảng', ''),
(21, 'Máy tính bảng', 'ok'),
(22, 'giày', ''),
(23, 'okokok', ''),
(24, 'samsung', ''),
(25, 'hi', ''),
(26, 'Máy tính bảng', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sanpham`
--

CREATE TABLE `tb_sanpham` (
  `id_san_pham` int NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `gia_san_pham` float(10,2) NOT NULL,
  `gia_khuyen_mai` float(10,2) NOT NULL,
  `hinh_anh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `so_luong` int NOT NULL,
  `ngay_nhap` date NOT NULL,
  `mo_ta` text NOT NULL,
  `id_danh_muc` int NOT NULL,
  `trang_thai` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Còn hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_sanpham`
--

INSERT INTO `tb_sanpham` (`id_san_pham`, `ten_san_pham`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `ngay_nhap`, `mo_ta`, `id_danh_muc`, `trang_thai`) VALUES
(6, 'máy tính bảng', 1000000.00, 10000.00, '../uploads/1720832647_macbook.webp', 1000, '2024-10-10', 'ok', 16, 'Còn hàng'),
(7, 'máy tính bảng', 1000000.00, 10000.00, '../uploads/1720832674_macbook.webp', 1000, '2024-10-10', 'ok', 16, 'Còn hàng'),
(8, 'máy tính bảng', 1000000.00, 10000.00, '../uploads/1720837691_macbook.webp', 1000, '2024-10-10', 'ok', 16, 'Còn hàng');

-- --------------------------------------------------------

--
-- Table structure for table `tb_taikhoan`
--

CREATE TABLE `tb_taikhoan` (
  `id_tai_khoan` int NOT NULL,
  `ho_ten` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `anh_dai_dien` varchar(255) NOT NULL,
  `ten_dang_nhap` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(15) NOT NULL,
  `dia_chi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `vai_tro` tinyint NOT NULL DEFAULT '0' COMMENT '0: client / 1: admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_taikhoan`
--

INSERT INTO `tb_taikhoan` (`id_tai_khoan`, `ho_ten`, `anh_dai_dien`, `ten_dang_nhap`, `mat_khau`, `email`, `so_dien_thoai`, `dia_chi`, `vai_tro`) VALUES
(10, 'nguyen anh', '../uploads/1720836592_winning-product-la-gi-1.jpg', 'nguyễn anh', '12122', 'kunkunkunplay@gmail.com', '09476434343', 'bứa city', 1),
(11, 'nguyen anh', '../uploads/1720837542_macbook.webp', 'nguyễn anh', '12313', 'kunkunkunplay@gmail.com', '09476434343', 'bứa city', 1),
(13, 'nguyen anh', '../uploads/1720837752_msi.webp', '12312', '13123', 'kunkunkunplay@gmail.com', '09476434343', 'bứa city', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anhsanpham`
--
ALTER TABLE `tb_anhsanpham`
  ADD PRIMARY KEY (`id_anh_san_pham`);

--
-- Indexes for table `tb_danhmuc`
--
ALTER TABLE `tb_danhmuc`
  ADD PRIMARY KEY (`id_danh_muc`);

--
-- Indexes for table `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  ADD PRIMARY KEY (`id_san_pham`),
  ADD KEY `lk_dm` (`id_danh_muc`);

--
-- Indexes for table `tb_taikhoan`
--
ALTER TABLE `tb_taikhoan`
  ADD PRIMARY KEY (`id_tai_khoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anhsanpham`
--
ALTER TABLE `tb_anhsanpham`
  MODIFY `id_anh_san_pham` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_danhmuc`
--
ALTER TABLE `tb_danhmuc`
  MODIFY `id_danh_muc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  MODIFY `id_san_pham` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_taikhoan`
--
ALTER TABLE `tb_taikhoan`
  MODIFY `id_tai_khoan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  ADD CONSTRAINT `lk_dm` FOREIGN KEY (`id_danh_muc`) REFERENCES `tb_danhmuc` (`id_danh_muc`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
