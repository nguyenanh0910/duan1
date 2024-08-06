<?php
session_start();
// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/TrangChuController.php';
require_once './controllers/SanPhamController.php';
require_once './controllers/TaiKhoanController.php';
require_once './controllers/GioHangController.php';

// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/DanhMuc.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';

// Route
$act = $_GET['act'] ?? '/';

// if ($act !=='login-client' && $act !=='check-login-client' && $act !=='logout-client' ) {
// 	checkLoginClient();
// }


// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
	// Trang chủ
	'/' => (new TrangChuController())->home(),
	// Xử lý yêu cầu Ajax
	// 'detailAjax' => (new SanPhamController())->getDetailSanPhamAjax(),

	// sản phẩm
	'danh-sach-san-pham' => (new SanPhamController())->showSanPham(),
	'chi-tiet-san-pham' => (new SanPhamController())->detailSanPham(),

	// auth đăng nhập
	'login-client' => (new TaiKhoanController())->formLogin(),
	'check-login-client' => (new TaiKhoanController())->login(),
	'logout-client' => (new TaiKhoanController())->logout(),
	// auth đăng ký
	'form-dang-ky-client' => (new TaiKhoanController())->formRegister(),
	'dang-ky-client' => (new TaiKhoanController())->addClient(),
	
	// thông tin cá nhân
	'form-edit-thong-tin-ca-nhan-khach-hang' => (new TaiKhoanController())->formEditCaNhanKhachHang(),
	'update-thong-tin-ca-nhan-khach-hang' => (new TaiKhoanController())->updateCaNhanKhachHang(),
	'update-mat-khau-ca-nhan-khach-hang' => (new TaiKhoanController())->updateMatKhauCaNhan(),

	// giỏ hàng
	'gio-hang' =>  (new GioHangController())->showGioHang(),

};