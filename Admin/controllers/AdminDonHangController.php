<?php
require_once '../commons/function.php';
class AdminDonHangController
{

	public $modelDonHang;
	public function __construct()
	{
		$this->modelDonHang = new AdminDonHang();
		require_once './models/AdminDanhMuc.php';
		$this->modelDanhMuc = new AdminDanhMuc();
	}
	public function listDonHang()
	{
		$listDonHang = $this->modelDonHang->getAllDonHang();
		require_once './views/donhang/listDonHang.php';
	}

	public function detailDonHang(){
		$id = $_GET['id'];
		// lấy thông tin đơn hàng ở bảng tb_donhang
		$donHang = $this->modelDonHang->getDetailDonHang($id);
		
		// lấy danh sách sản phẩm đã đặt của đơn hàng ở bảng tb_chitietdonhang
		$sanPhamDonHang = $this->modelDonHang->getListSpDonHang($id);
		// var_dump($sanPhamDonHang); die;
		$listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

		require_once './views/donhang/detailDonHang.php';

	}

	// Sửa đơn hàng
	public function formEditDonHang()
	{
		$id = $_GET['id'];
		$donHang = $this->modelDonHang->getDetailDonHang($id);
		$listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
		if ($donHang) {
			require_once './views/donhang/editDonHang.php';
			// xóa session sau khi load trang
			deleteSessionError();
		} else {
			header("Location: " . ADMIN_BASE_URL . '?act=list-don-hang');
			exit();
		}
	}

	public function updateDonHang()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Lấy dữ liệu
			// Lấy dữ liệu cũ của sản phẩm
			$id = $_POST['id'] ?? '';
			$oldOrder = $this->modelDonHang->getDetailDonHang($id);
			$trang_thai_old = $oldOrder['trang_thai_dh_id'];
			$ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
			$sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
			$email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
			$dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
			$ghi_chu = $_POST['ghi_chu'] ?? '';
			$trang_thai_dh_id = $_POST['trang_thai_dh_id'] ?? $trang_thai_old;
			// Validate dữ liệu
			$errors = [];

			// Kiểm tra rỗng
			if (empty($ten_nguoi_nhan)) {
				$errors['ten_nguoi_nhan'] = "Tên người nhận không được để trống.";
			}
			if (empty($sdt_nguoi_nhan)) {
				$errors['sdt_nguoi_nhan'] = "Số điện thoại người nhận không được để trống.";
			}
			if (empty($email_nguoi_nhan)) {
				$errors['email_nguoi_nhan'] = "Email người nhận không được để trống.";
			}
			if (empty($dia_chi_nguoi_nhan)) {
				$errors['dia_chi_nguoi_nhan'] = "Địa chỉ người nhận không được để trống.";
			}
			if (empty($trang_thai_dh_id)) {
				$errors['trang_thai_dh_id'] = "Trạng thái đơn hàng phải chọn.";
			}
			$_SESSION['error'] = $errors;
			if (empty($errors)) {
				// Gọi phương thức trong model để thêm sản phẩm vào cơ sở dữ liệu
				$this->modelDonHang->updateDonHang($id, $ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan,  $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_dh_id);
				header("Location: " . ADMIN_BASE_URL . '?act=list-don-hang');
				exit();
			} else {
				$_SESSION['flash'] = true;
				header("Location: " . ADMIN_BASE_URL . '?act=form-edit-don-hang&id=' . $id);
				exit();
			}
		}
	}
}
?>