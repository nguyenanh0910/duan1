<?php
require_once './commons/function.php';
class GioHangController
{
	public $modelGioHang;
	public function __construct()
	{
		$this->modelGioHang = new GioHang();
	}
	public function showGioHang()
	{
		$tai_khoan_id = $_SESSION['client']['id'];
		$cartItems = $this->modelGioHang->getCartItems($tai_khoan_id);
		// var_dump($cartItems); die;
		require_once './views/giohang/gioHang.php';
		deleteSessionError();
	}
	public function addGioHang()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && isset($_POST['so_luong'])) {
			$san_pham_id = $_POST['id'];
			$so_luong = $_POST['so_luong'];
			if (!isset($_SESSION['client']['id'])) {
				$_SESSION['message'] = 'Vui lòng <a href="' . BASE_URL . '?act=login-client">đăng nhập</a> để thêm sản phẩm vào giỏ hàng.';
				header("Location: " . BASE_URL . '?act=chi-tiet-san-pham&id=' . $san_pham_id);
				exit();
		}
			$tai_khoan_id = $_SESSION['client']['id'];
			$status = $this->modelGioHang->addToCart($san_pham_id, $so_luong, $tai_khoan_id);
			if ($status) {
				$_SESSION['message'] = 'Sản phẩm đã được thêm thành công. <a href="' . BASE_URL . '?act=gio-hang">Truy cập giỏ hàng</a>';
				header("Location: " . BASE_URL . '?act=chi-tiet-san-pham&id=' . $san_pham_id);
				exit();
			} else {
				$_SESSION['message'] = "Thêm sản phẩm vào giỏ hàng thất bại.";
				header("Location: " . BASE_URL . '?act=chi-tiet-san-pham&id=' . $san_pham_id);
				exit();
			}
		}
	}
	public function updateCart()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id']) && isset($_POST['quantity'])) {
			$productId = $_POST['product_id'];
			$quantity = $_POST['quantity'];
			$taiKhoanId = $_SESSION['client']['id'];
			$status = $this->modelGioHang->updateSoLuongSP($productId, $quantity, $taiKhoanId);

			if ($status) {
				echo 'Số lượng sản phẩm đã được cập nhật.';
			} else {
				echo 'Lỗi khi cập nhật số lượng sản phẩm.';
			}
		}
	}
	public function deleteCart()
	{
		$id = $_GET['id'];
		$sanPham = $this->modelGioHang->getDetailGioHang($id);
		if ($sanPham) {
			$this->modelGioHang->deleteCart($id);
		}
		header("Location: " . BASE_URL . '?act=gio-hang');
		exit();
	}
}