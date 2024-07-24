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
		$id_don_hang = $_GET['id_don_hang'];
		// lấy thông tin đơn hàng ở bảng tb_donhang
		$donHang = $this->modelDonHang->getDetailDonHang($id_don_hang);
		
		// lấy danh sách sản phẩm đã đặt của đơn hàng ở bảng tb_chitietdonhang
		$sanPhamDonHang = $this->modelDonHang->getListSpDonHang($id_don_hang);
		$listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

		require_once './views/donhang/detailDonHang.php';

	}

	// Sửa đơn hàng
	public function formEditDonHang()
	{
		$id_don_hang = $_GET['id_don_hang'];
		$donHang = $this->modelDonHang->getDetailDonHang($id_don_hang);
		$listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();
		if ($donHang) {
			$id_don_hang = $_GET['id_don_hang'];
			// Gọi phương thức trong model để lấy chi tiết danh mục từ CSDL
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
			$id_don_hang = $_POST['id_don_hang'] ?? '';
			$ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
			$sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
			$email_nguoi_nhan = $_POST['email_nguoi_nhan'] ?? '';
			$dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'] ?? '';
			$ghi_chu = $_POST['ghi_chu'] ?? '';
			$id_trang_thai_dh = $_POST['id_trang_thai_dh'] ?? '';
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
			if (empty($id_trang_thai_dh)) {
				$errors['id_trang_thai_dh'] = "Trạng thái đơn hàng phải chọn.";
			}
			$_SESSION['error'] = $errors;
			if (empty($errors)) {
				// Gọi phương thức trong model để thêm sản phẩm vào cơ sở dữ liệu
				$this->modelDonHang->updateDonHang($id_don_hang, $ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan,  $dia_chi_nguoi_nhan, $ghi_chu, $id_trang_thai_dh);
				header("Location: " . ADMIN_BASE_URL . '?act=list-don-hang');
				exit();
			} else {
				$_SESSION['flash'] = true;
				header("Location: " . ADMIN_BASE_URL . '?act=form-edit-don-hang&id_don_hang=' . $id_don_hang);
				exit();
			}
		}
	}

	// // xóa sản phẩm 
	// public function deleteSanPham()
	// {
	// 	$id_don_hang = $_GET['id_san_pham'];
	// 	$sanPham = $this->modelSanPham->formEditSanPham($id_san_pham);
	// 	$listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id_san_pham);
	// 	if ($sanPham) {
	// 		deleteFile($sanPham['hinh_anh']);
	// 		$this->modelSanPham->deleteSanPham($id_san_pham);
	// 	}
	// 	if ($listAnhSanPham) {
	// 		foreach ($listAnhSanPham as $key => $anhSP) {
	// 			deleteFile($anhSP['link_anh']);
	// 			$this->modelSanPham->destroyAnhSanPham($anhSP['id_anh_san_pham']);
	// 		}
	// 	}
	// 	header("Location: " . ADMIN_BASE_URL . '?act=list-san-pham');
	// 	exit();
	// }

	// public function detailSanPham()
	// {
	// 	$id_san_pham = $_GET['id_san_pham'];
	// 	$sanPham = $this->modelSanPham->formEditSanPham($id_san_pham);
	// 	$listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id_san_pham);
	// 	if ($sanPham) {
	// 		$id_san_pham = $_GET['id_san_pham'];
	// 		// Gọi phương thức trong model để lấy chi tiết danh mục từ CSDL
	// 		require_once './views/sanpham/detailSanPham.php';
	// 	} else {
	// 		header("Location: " . ADMIN_BASE_URL . '?act=list-san-pham');
	// 		exit();
	// 	}
	// }
}
?>