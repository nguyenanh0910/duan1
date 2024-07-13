<?php

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/AdminDanhMucController.php';
require_once './controllers/AdminSanPhamController.php';
require_once './controllers/AdminTaiKhoanController.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminTaiKhoan.php';
// Route
$act = $_GET['act'] ?? '/';


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
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
	// 'form-edit-san-pham' => (new AdminSanPhamController())->formEditSanPham(),
	// 'update-san-pham' => (new AdminSanPhamController())->updateSanPham(),


	// tài khoản
	'list-tai-khoan' => (new AdminTaiKhoanController())->listTaiKhoan(),
	'form-add-tai-khoan' => (new AdminTaiKhoanController())->formAddTaiKhoan(),
	'add-tai-khoan' => (new AdminTaiKhoanController())->addTaiKhoan(),
	'delete-tai-khoan' => (new AdminTaiKhoanController())->deleteTaiKhoan(),
	// 'form-edit-tai-khoan' => (new AdminTaiKhoanController())->formEditTaiKhoan(),
	// 'update-tai-khoan' => (new AdminTaiKhoanController())->updateTaiKhoan(),

};