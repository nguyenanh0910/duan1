<?php
class AdminDanhMucController
{
	public $modelDanhMuc;
	public function __construct()
	{
		$this->modelDanhMuc = new AdminDanhMuc();
	}
	public function listDanhMuc()
	{
		$listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
		require_once './views/danhmuc/listDanhMuc.php';
	}
	public function formaddDanhMuc()
	{
		require_once './views/danhmuc/addDanhMuc.php';
	}
	// thêm danh mục
	public function addDanhMuc()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$ten_danh_muc = $_POST['ten_danh_muc'];
			$mo_ta = $_POST['mo_ta'];

			// Validate dữ liệu
			$errors = [];

			// Kiểm tra rỗng
			if (empty($ten_danh_muc)) {
				$errors[] = "Tên danh mục không được để trống.";
			}

			if (empty($errors)) {
				// Gọi phương thức trong model để thêm danh mục vào cơ sở dữ liệu
				$result = $this->modelDanhMuc->addDanhMuc($ten_danh_muc, $mo_ta);

				if ($result) {
					$thongbao = "Thêm thành công";
				} else {
					$thongbao = "Thêm không thành công";
				}
			}
		}

		require_once './views/danhmuc/addDanhMuc.php';
	}

	// xóa danh mục 
	public function deleteDanhMuc()
	{
		if (isset($_GET['id_danh_muc'])) {
			$id_danh_muc = $_GET['id_danh_muc'];
			$this->modelDanhMuc->deleteDanhMuc($id_danh_muc);
			header("Location: ?act=list-danh-muc");
		} else {
			echo "Xóa danh mục không thành công.";
		}
	}

	// Sửa danh mục
	public function formEditDanhMuc()
	{
		if (isset($_GET['id_danh_muc'])) {
			$id_danh_muc = $_GET['id_danh_muc'];
			// Gọi phương thức trong model để lấy chi tiết danh mục từ CSDL
			$editDanhMuc = $this->modelDanhMuc->formEditDanhMuc($id_danh_muc);
			require_once './views/danhmuc/editDanhMuc.php';
		}
	}
	public function updateDanhMuc()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_edit'])) {
			$id_danh_muc = $_POST['id_danh_muc'];
			$ten_danh_muc = $_POST['ten_danh_muc'];
			$mo_ta = $_POST['mo_ta'];
			$errors = [];

			// Kiểm tra rỗng
			if (empty($ten_danh_muc)) {
				$errors[] = "Tên danh mục không được để trống.";
			}
			if (empty($errors)) {
				// Gọi phương thức trong model để cập nhật danh mục vào cơ sở dữ liệu
				$result = $this->modelDanhMuc->updateDanhMuc($id_danh_muc, $ten_danh_muc, $mo_ta);
				if ($result) {
					$thongbao = "Sửa thành công";
				} else {
					$thongbao = "Sửa không thành công";
				}
			}
		}
		header("Location: ?act=list-danh-muc");
	}
}
?>