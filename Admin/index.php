<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminTrangChuController.php';
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminDonHangController.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDonHang.php';
// Route
$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
	'/' => (new AdminTrangChuController())->home(),
	// danh mục
	'list-danh-muc' => (new AdminDanhMucController())->listDanhMuc(),
	'form-add-danh-muc' => (new AdminDanhMucController())->formaddDanhMuc(),
	'add-danh-muc' => (new AdminDanhMucController())->addDanhMuc(),
	'delete-danh-muc' => (new AdminDanhMucController())->deleteDanhMuc(),
	'form-edit-danh-muc' => (new AdminDanhMucController())->formEditDanhMuc(),
	'update-danh-muc' => (new AdminDanhMucController())->updateDanhMuc(),
	// sản phẩm
	'list-san-pham' => (new AdminSanPhamController())->listSanPham(),
	'form-add-san-pham' => (new AdminSanPhamController())->formAddSanPham(),
	'add-san-pham' => (new AdminSanPhamController())->addSanPham(),
	'delete-san-pham' => (new AdminSanPhamController())->deleteSanPham(),
	'form-edit-san-pham' => (new AdminSanPhamController())->formEditSanPham(),
	'update-san-pham' => (new AdminSanPhamController())->updateSanPham(),
	'edit-album-anh-san-pham' => (new AdminSanPhamController())->editAlbumAnhSanPham(),
	'detail-san-pham' => (new AdminSanPhamController())->detailSanPham(),

	// đơn hàng
	'list-don-hang' => (new AdminDonHangController())->listDonHang(),
	// 'delete-don-hang' => (new AdminDonHangController())->deleteDonHang(),
	'form-edit-don-hang' => (new AdminDonHangController())->formEditDonHang(),
	'update-don-hang' => (new AdminDonHangController())->updateDonHang(),
	'detail-don-hang' => (new AdminDonHangController())->detailDonHang(),

};