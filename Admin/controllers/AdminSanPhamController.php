<?php
require_once '../commons/function.php';
class AdminSanPhamController
{
	
	public $modelSanPham;
	public $modelDanhMuc;
	public function __construct()
	{
		$this->modelSanPham = new AdminSanPham();
		require_once './models/AdminDanhMuc.php';
		$this->modelDanhMuc = new AdminDanhMuc();
	}
	public function listSanPham()
	{
		$listSanPham = $this->modelSanPham->getAllSanPham();
		require_once './views/sanpham/listSanPham.php';
	}
	public function formaddSanPham()
	{
		$listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
		require_once './views/SanPham/addSanPham.php';
	}
	// thêm sản phẩm
	public function addSanPham()
	{
		$listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$ten_san_pham = $_POST['ten_san_pham'];
			$gia_san_pham = $_POST['gia_san_pham'];
			$gia_khuyen_mai = $_POST['gia_khuyen_mai'];
			$so_luong = $_POST['so_luong'];
			$ngay_nhap = $_POST['ngay_nhap'];
			$mo_ta = $_POST['mo_ta'];
			$id_danh_muc = $_POST['id_danh_muc'];

			// hình ảnh
			$target_dir = "../uploads/";
			$fileName = 'hinh_anh';
			$hinh_anh = uploadFile($fileName, $target_dir);
			// Validate dữ liệu
			$errors = [];

			// Kiểm tra rỗng
			if (empty($ten_san_pham)) {
				$errors[] = "Tên sản phẩm không được để trống.";
			}
			if (empty($gia_san_pham)) {
				$errors[] = "Giá sản phẩm không được để trống.";
			}
			if (empty($gia_khuyen_mai)) {
				$errors[] = "Giá khuyến mãi không được để trống.";
			}
			if (empty($so_luong)) {
				$errors[] = "Số lượng sản phẩm không được để trống.";
			}
			if (empty($ngay_nhap)) {
				$errors[] = "Ngày nhập sản phẩm không được để trống.";
			}
			if (empty($id_danh_muc)) {
				$errors[] = "Danh mục sản phẩm không được để trống.";
			}
			if (empty($hinh_anh)) {
				$errors[] = "Bạn phải chọn một file ảnh.";
			}
			if (empty($errors)) {
				// Gọi phương thức trong model để thêm sản phẩm vào cơ sở dữ liệu
				$result = $this->modelSanPham->addSanPham($ten_san_pham, $hinh_anh, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $id_danh_muc, $mo_ta);

				if ($result) {
					$thongbao = "Thêm thành công";
				} else {
					$thongbao = "Thêm không thành công";
				}
			}
		}
		require_once './views/SanPham/addSanPham.php';
	}

	// xóa sản phẩm 
	public function deleteSanPham()
	{
		if (isset($_GET['id_san_pham'])) {
			$id_san_pham = $_GET['id_san_pham'];
			$this->modelSanPham->deleteSanPham($id_san_pham);
			header("Location: ?act=list-san-pham");
		} else {
			echo "Xóa sản phẩm không thành công.";
		}
	}

	// // Sửa sản phẩm
	// public function formEditSanPham()
	// {
	// 	if (isset($_GET['id_danh_muc'])) {
	// 		$id_danh_muc = $_GET['id_danh_muc'];
	// 		// Gọi phương thức trong model để lấy chi tiết sản phẩm từ CSDL
	// 		$editSanPham = $this->modelSanPham->formEditSanPham($id_danh_muc);
	// 		require_once './views/SanPham/editSanPham.php';
	// 	}
	// }
	// public function updateSanPham()
	// {
	// 	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_edit'])) {
	// 		$id_danh_muc = $_POST['id_danh_muc'];
	// 		$ten_danh_muc = $_POST['ten_danh_muc'];
	// 		$mo_ta = $_POST['mo_ta'];
	// 		$errors = [];

	// 		// Kiểm tra rỗng
	// 		if (empty($ten_danh_muc)) {
	// 			$errors[] = "Tên sản phẩm không được để trống.";
	// 		}
	// 		if (empty($errors)) {
	// 			// Gọi phương thức trong model để cập nhật sản phẩm vào cơ sở dữ liệu
	// 			$result = $this->modelSanPham->updateSanPham($id_danh_muc, $ten_danh_muc, $mo_ta);
	// 			if ($result) {
	// 				$thongbao = "Sửa thành công";
	// 			} else {
	// 				$thongbao = "Sửa không thành công";
	// 			}
	// 		}
	// 	}
	// 	header("Location: ?act=list-danh-muc");
	// }
}
?>