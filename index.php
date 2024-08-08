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
require_once './controllers/DonHangController.php';
require_once './controllers/LienHeController.php';
require_once './controllers/GioiThieuController.php';

// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once './models/DanhMuc.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';

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
	'gui-binh-luan' => (new SanPhamController())->cmtSanPham(),

	// auth đăng nhập
	'login-client' => (new TaiKhoanController())->formLogin(),
	'check-login-client' => (new TaiKhoanController())->login(),
	'logout-client' => (new TaiKhoanController())->logout(),
	// auth đăng ký
	'form-dang-ky-client' => (new TaiKhoanController())->formRegister(),
	'dang-ky-client' => (new TaiKhoanController())->addClient(),

	// auth quên mật khẩu
	'form-quen-mat-khau' => (new TaiKhoanController())->formForgot(),

	// thông tin cá nhân
	'form-edit-thong-tin-ca-nhan-khach-hang' => (new TaiKhoanController())->formEditCaNhanKhachHang(),
	'update-thong-tin-ca-nhan-khach-hang' => (new TaiKhoanController())->updateCaNhanKhachHang(),
	'update-mat-khau-ca-nhan-khach-hang' => (new TaiKhoanController())->updateMatKhauCaNhan(),

	// giỏ hàng
	'gio-hang' => (new GioHangController())->showGioHang(),
	'them-gio-hang' => (new GioHangController())->addGioHang(),
	'cap-nhat-gio-hang' => (new GioHangController())->updateCart(),
	'xoa-san-pham-gio-hang' => (new GioHangController())->deleteCart(),
	//đơn hàng
	'form-thanh-toan' => (new DonHangController())->formCheckOut(),
	'xac-nhan-thanh-toan' => (new DonHangController())->checkOut(),
	'thanh-toan-thanh-cong' => (new DonHangController())->thankYou(),
	'chi-tiet-don-hang' => (new DonHangController())->detailDonHang(),
	'huy-don-hang' => (new DonHangController())->handleOrderAct('cancel'),
	'xac-nhan-don-hang' => (new DonHangController())->handleOrderAct('confirm'),
	'hoan-don-hang' => (new DonHangController())->handleOrderAct('refund'),

	// liên hệ
	'lien-he' => (new LienHeController())->formLienHe(),

	// Giới thiệu
	'gioi-thieu' => (new GioiThieuController())->formGioiThieu(),
};