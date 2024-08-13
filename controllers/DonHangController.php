<?php
require_once './commons/function.php';

class DonHangController
{

	public $modelDonHang;
	public $modelGioHang;
	public $modelTaiKhoan;
	public $modelSanPham;
	public function __construct()
	{
		$this->modelDonHang = new DonHang();
		$this->modelGioHang = new GioHang();
		$this->modelSanPham = new SanPham();
		$this->modelTaiKhoan = new TaiKhoan();
	}
	public function formCheckOut()
	{
		$tai_khoan_id = $_SESSION['client']['id'];
		$cartItems = $this->modelGioHang->getCartItems($tai_khoan_id);
		$phuongThucThanhToan = $this->modelDonHang->getAllPhuongThucThanhToan();

		// Kiểm tra số lượng sản phẩm trong kho
		$outOfStockItems = [];
		$updatedQuantities = []; // Mảng lưu số lượng sản phẩm được cập nhật

		foreach ($cartItems as $item) {
			$productId = $item['san_pham_id'];
			$quantityInCart = $item['so_luong'];
			$cartItemId = $item['id'];

			// Lấy số lượng còn trong kho
			$product = $this->modelSanPham->getDetailSanPham($productId);
			$quantityInStock = $product['so_luong'];

			if ($quantityInStock < $quantityInCart) {
				$outOfStockItems[] = $productId;
				$updatedQuantities[$productId] = $quantityInStock; // Cập nhật số lượng còn
			}
			if ($quantityInStock == 0) {
				$this->modelGioHang->deleteCart($cartItemId);
		}
		}

		if (!empty($outOfStockItems)) {
			// Cập nhật số lượng cho các sản phẩm hết hàng
			foreach ($updatedQuantities as $productId => $quantityInStock) {
				$this->modelGioHang->updateSoLuongSP($productId, $quantityInStock, $tai_khoan_id);
			}

			// Thiết lập thông báo lỗi và quay lại trang giỏ hàng
			$_SESSION['error_message'] = 'Có sản phẩm hết hàng trong giỏ. Số lượng sản phẩm đã được cập nhật lại. Vui lòng kiểm tra lại.';
			header('Location: ' . BASE_URL . '?act=gio-hang');
			exit();
		}

		// Nếu tất cả sản phẩm còn trong kho, tiếp tục yêu cầu trang thanh toán
		require_once './views/donhang/formThanhToan.php';
		deleteSessionError();
	}

	public function checkOut()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$tai_khoan_id = $_SESSION['client']['id'];
			$cartItems = $this->modelGioHang->getCartItems($tai_khoan_id);
			$ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
			$email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
			$sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
			$dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
			$ghi_chu = $_POST['ghi_chu'] ?? '';
			$phuong_thuc_tt_id = $_POST['phuong_thuc_tt_id'] ?? '';
			$tong_tien = $_POST['tong_tien'] ?? '';

			// Xác thực dữ liệu
			$errors = [];
			if (empty($ten_nguoi_nhan)) {
				$errors['ten_nguoi_nhan'] = "Tên người nhận không được để trống.";
			}
			if (empty($email_nguoi_nhan)) {
				$errors['email_nguoi_nhan'] = "Email không được để trống.";
			}
			if (empty($sdt_nguoi_nhan)) {
				$errors['sdt_nguoi_nhan'] = "Số điện thoại không được để trống.";
			}
			if (empty($dia_chi_nguoi_nhan)) {
				$errors['dia_chi_nguoi_nhan'] = "Địa chỉ không được để trống.";
			}
			if (empty($phuong_thuc_tt_id)) {
				$errors['phuong_thuc_tt_id'] = "Vui lòng chọn phương thức thanh toán.";
			}

			$_SESSION['error'] = $errors;

			if (empty($errors)) {
				// Thêm đơn hàng trước khi thanh toán qua MoMo
				$result = $this->modelDonHang->addDonHang($tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $tong_tien, $ghi_chu, $phuong_thuc_tt_id);

				if ($result) {
					$don_hang_id = $result['id'];
					$ma_don_hang = $result['ma_don_hang'];

					// Thêm chi tiết đơn hàng từ giỏ hàng
					foreach ($cartItems as $item) {
						$don_gia = $item['gia_khuyen_mai'];
						$so_luong = $item['so_luong'];
						$thanh_tien = $don_gia * $so_luong;
						$this->modelDonHang->addChiTietDonHang($don_hang_id, $item['san_pham_id'], $don_gia, $so_luong, $thanh_tien);
						// Giảm số lượng sản phẩm trong kho
						$this->modelSanPham->giamSoLuongSanPham($item['san_pham_id'], $so_luong);
					}
					// Xóa giỏ hàng sau khi đặt hàng
					$this->modelGioHang->clearCart($tai_khoan_id);

					// Kiểm tra phương thức thanh toán
					if ($phuong_thuc_tt_id == 2) {
						// Tích hợp MoMo cho thanh toán
						$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
						$partnerCode = 'MOMOBKUN20180529';
						$accessKey = 'klm05TvNBzhg7h7j';
						$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
						$orderInfo = "Thanh toán qua MoMo";
						$amount = $tong_tien;
						$orderId = time();
						$redirectUrl = BASE_URL . "?act=thanh-toan-thanh-cong&ma_don_hang=" . urlencode($ma_don_hang); // URL sẽ redirect về sau khi thanh toán thành công
						$ipnUrl = BASE_URL . "?act=ipn-momo"; // URL MoMo sẽ gọi đến khi có thay đổi trạng thái thanh toán
						$extraData = "";

						$requestId = time();
						$requestType = "payWithATM";
						$rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
						$signature = hash_hmac("sha256", $rawHash, $secretKey);

						$data = array(
							'partnerCode' => $partnerCode,
							'partnerName' => "Test",
							"storeId" => "MomoTestStore",
							'requestId' => $requestId,
							'amount' => $amount,
							'orderId' => $orderId,
							'orderInfo' => $orderInfo,
							'redirectUrl' => $redirectUrl,
							'ipnUrl' => $ipnUrl,
							'lang' => 'vi',
							'extraData' => $extraData,
							'requestType' => $requestType,
							'signature' => $signature
						);

						$result = $this->execPostRequest($endpoint, json_encode($data));
						$jsonResult = json_decode($result, true);

						// Redirect đến trang thanh toán của MoMo
						header('Location: ' . $jsonResult['payUrl']);
						exit();
					} else {
						// Chuyển hướng đến trang cảm ơn
						header("Location: " . BASE_URL . "?act=thanh-toan-thanh-cong&ma_don_hang=" . urlencode($ma_don_hang));
						exit();
					}
				}
			} else {
				$_SESSION['flash'] = true;
				header("Location: " . BASE_URL . "?act=form-thanh-toan");
				exit();
			}
		}
	}

	private function execPostRequest($url, $data)
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt(
			$ch,
			CURLOPT_HTTPHEADER,
			array(
				'Content-Type: application/json',
				'Content-Length: ' . strlen($data)
			)
		);

		$result = curl_exec($ch);
		curl_close($ch);

		return $result;
	}

	public function thankYou()
	{
		$ma_don_hang = isset($_GET['ma_don_hang']) ? $_GET['ma_don_hang'] : '';
		require_once './views/donhang/thanhToanThanhCong.php';
		deleteSessionError();
	}
	public function detailDonHang()
	{
		$id = $_GET['id'];
		// lấy thông tin đơn hàng ở bảng tb_donhang
		$donHang = $this->modelDonHang->getDetailDonHang($id);

		// lấy danh sách sản phẩm đã đặt của đơn hàng ở bảng tb_chitietdonhang
		$sanPhamDonHang = $this->modelDonHang->getListSpDonHang($id);
		// var_dump($sanPhamDonHang); die;
		// var_dump($sanPhamDonHang); die;
		$listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

		require_once './views/donhang/detailDonHang.php';

	}
	public function handleOrderAct($act)
	{
		$id = $_GET['id'];
		$status = $this->modelDonHang->handleOrderAct($id, $act);

		// lấy thông tin đơn hàng 
		$donHang = $this->modelDonHang->getDetailDonHang($id);
		//
		$messageSuccess = '';
		$messageFailure = '';

		if ($act == 'cancel') {
			$messageSuccess = 'Hủy đơn hàng thành công';
			$messageFailure = "Không thể hủy đơn hàng khi đơn hàng đã được xác nhận";
			$this->modelSanPham->hoanSoLuongSanPham($donHang['san_pham_id'], $donHang['so_luong']);
		} elseif ($act == 'confirm') {
			$messageSuccess = 'Nhận hàng thành công!';
			$messageFailure = "Không thể xác nhận đơn hàng khi đơn hàng chưa được giao thành công";
		} elseif ($act == 'refund') {
			$messageSuccess = 'Yêu cầu hoàn hàng thành công! Nhân viên tư vấn sẽ liên hệ tới bạn để hướng dẫn tiếp theo.';
			$messageFailure = "Không thể hoàn hàng khi đơn hàng chưa được giao thành công";
			$this->modelSanPham->hoanSoLuongSanPham($donHang['san_pham_id'], $donHang['so_luong']);
		} else {
			$_SESSION['flash'] = false;
			$_SESSION['message'] = "Hành động không hợp lệ";
			header("Location: " . BASE_URL . '?act=form-edit-thong-tin-ca-nhan-khach-hang&tab=orders');
			exit();
		}

		if ($status) {
			$_SESSION['flash'] = true;
			$_SESSION['message'] = $messageSuccess;
		} else {
			$_SESSION['flash'] = false;
			$_SESSION['message'] = $messageFailure;
		}

		header("Location: " . BASE_URL . '?act=form-edit-thong-tin-ca-nhan-khach-hang&tab=orders');
		exit();
	}


}