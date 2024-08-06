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
require_once './controllers/AdminTaiKhoanController.php';

// Require toàn bộ file Models
require_once './models/AdminDanhMuc.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDonHang.php';
require_once './models/AdminTaiKhoan.php';

// Route
$act = $_GET['act'] ?? '/';

if ($act !=='login-admin' && $act !=='check-login-admin' && $act !=='logout-admin' ) {
	checkLoginAdmin();
}

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
	'/' => (new AdminTrangChuController())->home(),
	// danh mục
	'list-danh-muc' => (new AdminDanhMucController())->listDanhMuc(),
	'form-add-danh-muc' => (new AdminDanhMucController())->formAddDanhMuc(),
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

	// bình luận
	'update-trang-thai-binh-luan' => (new AdminSanPhamController())->updateTrangThaiBinhLuan(),

	// đơn hàng
	'list-don-hang' => (new AdminDonHangController())->listDonHang(),
	'form-edit-don-hang' => (new AdminDonHangController())->formEditDonHang(),
	'update-don-hang' => (new AdminDonHangController())->updateDonHang(),
	'detail-don-hang' => (new AdminDonHangController())->detailDonHang(),

	// tài khoản
		// tài khoản quản trị
		'list-tai-khoan-quan-tri' => (new AdminTaiKhoanController())->listQuanTri(),
		'form-add-quan-tri' => (new AdminTaiKhoanController())->formAddQuanTri(),
		'add-quan-tri' => (new AdminTaiKhoanController())->addQuanTri(),
		'form-edit-quan-tri' => (new AdminTaiKhoanController())->formEditQuanTri(),
		'update-quan-tri' => (new AdminTaiKhoanController())->updateQuanTri(),

		// reset password tài khoản
		'reset-password' => (new AdminTaiKhoanController())->resetPassword(),

		// tài khoản khách hàng
		'list-tai-khoan-khach-hang' => (new AdminTaiKhoanController())->listKhachHang(),
		'form-edit-khach-hang' => (new AdminTaiKhoanController())->formEditKhachHang(),
		'update-khach-hang' => (new AdminTaiKhoanController())->updateKhachHang(),
		'detail-khach-hang' => (new AdminTaiKhoanController())->detailKhachHang(),

		// tài khoản cá nhân ( quản trị )
		'form-edit-thong-tin-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->formEditCaNhanQuanTri(),
		'update-thong-tin-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->updateCaNhanQuanTri(),
		
		'update-mat-khau-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->updateMatKhauCaNhan(),

	// auth đăng nhập
	'login-admin' => (new AdminTaiKhoanController())->formLogin(),
	'check-login-admin' => (new AdminTaiKhoanController())->login(),
	'logout-admin' => (new AdminTaiKhoanController())->logout(),

};