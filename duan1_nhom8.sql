-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2024 at 03:04 PM
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
  `id` int NOT NULL,
  `link_anh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `san_pham_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_anhsanpham`
--

INSERT INTO `tb_anhsanpham` (`id`, `link_anh`, `san_pham_id`) VALUES
(71, './uploads/1721790295vi-du-diem-hoa-von-la-gi-03.jpg', 48),
(72, './uploads/1721790295winning-product-la-gi-1.jpg', 48),
(73, './uploads/1721790295tdt1.jpg', 48),
(74, './uploads/1721830393oppo.jpg', 48);

-- --------------------------------------------------------

--
-- Table structure for table `tb_binhluan`
--

CREATE TABLE `tb_binhluan` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_dang` date NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_chitietdonhang`
--

CREATE TABLE `tb_chitietdonhang` (
  `id` int NOT NULL,
  `don_dang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_chitietdonhang`
--

INSERT INTO `tb_chitietdonhang` (`id`, `don_dang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`) VALUES
(15, 5, 48, '12344.00', 1, '10000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_danhmuc`
--

CREATE TABLE `tb_danhmuc` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `mo_ta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_danhmuc`
--

INSERT INTO `tb_danhmuc` (`id`, `ten_danh_muc`, `mo_ta`) VALUES
(27, 'Máy tính bảng', ''),
(34, 'giày', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_donhang`
--

CREATE TABLE `tb_donhang` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) NOT NULL,
  `sdt_nguoi_nhan` varchar(15) NOT NULL,
  `dia_chi_nguoi_nhan` text NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `ghi_chu` text,
  `phuong_thuc_tt_id` int NOT NULL,
  `trang_thai_dh_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_donhang`
--

INSERT INTO `tb_donhang` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`, `ghi_chu`, `phuong_thuc_tt_id`, `trang_thai_dh_id`) VALUES
(5, 'DH-123', 2, 'Nguyễn Anh', 'anhlc@gmail.com', '1234678', 'Hà Nội', '2024-07-24', '900000.00', 'hi', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_phuongthucthanhtoan`
--

CREATE TABLE `tb_phuongthucthanhtoan` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_phuongthucthanhtoan`
--

INSERT INTO `tb_phuongthucthanhtoan` (`id`, `ten_phuong_thuc`) VALUES
(1, 'COD(Thanh toán khi nhận hàng)'),
(2, 'Thanh toán online Vnpay');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sanpham`
--

CREATE TABLE `tb_sanpham` (
  `id` int NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `gia_san_pham` decimal(10,2) NOT NULL,
  `gia_khuyen_mai` decimal(10,2) NOT NULL,
  `hinh_anh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `so_luong` int NOT NULL,
  `ngay_nhap` date NOT NULL,
  `mo_ta` text NOT NULL,
  `luot_xem` int DEFAULT '0',
  `danh_muc_id` int NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_sanpham`
--

INSERT INTO `tb_sanpham` (`id`, `ten_san_pham`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `ngay_nhap`, `mo_ta`, `luot_xem`, `danh_muc_id`, `trang_thai`) VALUES
(48, 'máy tính bảng', '1000000.00', '10000.00', './uploads/1721790295macbook.webp', 1000, '2024-07-11', 'không', 0, 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_taikhoan`
--

CREATE TABLE `tb_taikhoan` (
  `id` int NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `anh_dai_dien` text,
  `ngay_sinh` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(15) NOT NULL,
  `gioi_tinh` tinyint(1) NOT NULL DEFAULT '0',
  `dia_chi` text NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `vai_tro` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_taikhoan`
--

INSERT INTO `tb_taikhoan` (`id`, `ho_ten`, `anh_dai_dien`, `ngay_sinh`, `email`, `so_dien_thoai`, `gioi_tinh`, `dia_chi`, `mat_khau`, `vai_tro`) VALUES
(2, 'Trần Trang', NULL, '2004-07-01', 'trangtran@gmail.com', '0976234567', 1, 'Bắc Từ Liêm, Hà Nội', '123453', 1),
(3, 'Trần Anh', NULL, '2004-07-01', 'anhtran@gmail.com', '48944308', 1, 'Bắc Từ Liêm, Hà Nội', '123453', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_trangthaidonhang`
--

CREATE TABLE `tb_trangthaidonhang` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_trangthaidonhang`
--

INSERT INTO `tb_trangthaidonhang` (`id`, `ten_trang_thai`) VALUES
(1, 'Chưa xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Chưa thanh toán'),
(4, 'Đã thanh toán'),
(5, 'Đang chuẩn bị hàng'),
(6, 'Đang giao'),
(7, 'Đã giao'),
(8, 'Đã nhận'),
(9, 'Thành công'),
(10, 'Hoàn hàng'),
(11, 'Hủy đơn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anhsanpham`
--
ALTER TABLE `tb_anhsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_anh` (`san_pham_id`);

--
-- Indexes for table `tb_binhluan`
--
ALTER TABLE `tb_binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_sp` (`san_pham_id`),
  ADD KEY `lk_tk` (`tai_khoan_id`);

--
-- Indexes for table `tb_chitietdonhang`
--
ALTER TABLE `tb_chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_donhang` (`don_dang_id`),
  ADD KEY `lk_spdh` (`san_pham_id`);

--
-- Indexes for table `tb_danhmuc`
--
ALTER TABLE `tb_danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_donhang`
--
ALTER TABLE `tb_donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_trangthai` (`trang_thai_dh_id`),
  ADD KEY `lk_phuongthuctt` (`phuong_thuc_tt_id`),
  ADD KEY `lk_tkdh` (`tai_khoan_id`);

--
-- Indexes for table `tb_phuongthucthanhtoan`
--
ALTER TABLE `tb_phuongthucthanhtoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_dm` (`danh_muc_id`);

--
-- Indexes for table `tb_taikhoan`
--
ALTER TABLE `tb_taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_trangthaidonhang`
--
ALTER TABLE `tb_trangthaidonhang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anhsanpham`
--
ALTER TABLE `tb_anhsanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tb_binhluan`
--
ALTER TABLE `tb_binhluan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_chitietdonhang`
--
ALTER TABLE `tb_chitietdonhang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_danhmuc`
--
ALTER TABLE `tb_danhmuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_donhang`
--
ALTER TABLE `tb_donhang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_phuongthucthanhtoan`
--
ALTER TABLE `tb_phuongthucthanhtoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_taikhoan`
--
ALTER TABLE `tb_taikhoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_trangthaidonhang`
--
ALTER TABLE `tb_trangthaidonhang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_anhsanpham`
--
ALTER TABLE `tb_anhsanpham`
  ADD CONSTRAINT `lk_anh` FOREIGN KEY (`san_pham_id`) REFERENCES `tb_sanpham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_binhluan`
--
ALTER TABLE `tb_binhluan`
  ADD CONSTRAINT `lk_sp` FOREIGN KEY (`san_pham_id`) REFERENCES `tb_sanpham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_tk` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tb_taikhoan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_chitietdonhang`
--
ALTER TABLE `tb_chitietdonhang`
  ADD CONSTRAINT `lk_donhang` FOREIGN KEY (`don_dang_id`) REFERENCES `tb_donhang` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_spdh` FOREIGN KEY (`san_pham_id`) REFERENCES `tb_sanpham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_donhang`
--
ALTER TABLE `tb_donhang`
  ADD CONSTRAINT `lk_phuongthuctt` FOREIGN KEY (`phuong_thuc_tt_id`) REFERENCES `tb_phuongthucthanhtoan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_tkdh` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tb_taikhoan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_trangthai` FOREIGN KEY (`trang_thai_dh_id`) REFERENCES `tb_trangthaidonhang` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  ADD CONSTRAINT `lk_dm` FOREIGN KEY (`danh_muc_id`) REFERENCES `tb_danhmuc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
