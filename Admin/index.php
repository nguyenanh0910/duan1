<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminTaiKhoanControllers.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/TaiKhoan.php';
// Route
$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
	// danh mục
    'danh-muc' => (new AdminDanhMucController()) ->danhsachDanhMuc(),
		'them-danh-muc' => (new AdminDanhMucController())->themDanhMuc(),

		// sản phẩm
		'san-pham' => (new AdminSanPhamController()) ->danhsachSanPham(),

		// tài khoản khách hàng
		'tai-khoan-user' => (new TaiKhoanUser()) ->danhsachTaiKhoanUser(),

		// tài khoản admin
		'tai-khoan-admin' => (new TaiKhoanAdmin()) ->danhsachTaiKhoanAdmin(),
};