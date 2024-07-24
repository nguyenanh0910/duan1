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
		deleteSessionError();
	}
	// thêm danh mục
	public function addDanhMuc()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$ten_danh_muc = $_POST['ten_danh_muc'] ?? '';
			$mo_ta = $_POST['mo_ta'] ?? '';

			// Validate dữ liệu
			$errors = [];

			// Kiểm tra rỗng
			if (empty($ten_danh_muc)) {
				$errors['ten_danh_muc'] = "Tên danh mục không được để trống.";
			}
			$_SESSION['error'] = $errors;
			if (empty($errors)) {
				// Gọi phương thức trong model để thêm danh mục vào cơ sở dữ liệu
				$this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
				header("Location: " . ADMIN_BASE_URL . '?act=list-danh-muc');
				exit();
			} else {
				$_SESSION['flash'] = true;
				header("Location: " . ADMIN_BASE_URL . '?act=form-add-danh-muc');
				exit();
			}
		}
	}

	// xóa danh mục 
	public function deleteDanhMuc()
	{
		$id_danh_muc = $_GET['id_danh_muc'];
		$danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id_danh_muc);
		if ($danhMuc) {
			$this->modelDanhMuc->deleteDanhMuc($id_danh_muc);
		} 
		header("Location: " . ADMIN_BASE_URL . '?act=list-danh-muc');
		exit();
	}

	// Sửa danh mục
	public function formEditDanhMuc()
	{
		$id_danh_muc = $_GET['id_danh_muc'];
		$editDanhMuc = $this->modelDanhMuc->getDetailDanhMuc($id_danh_muc);
		if ($editDanhMuc) {
			$id_danh_muc = $_GET['id_danh_muc'];
			// Gọi phương thức trong model để lấy chi tiết danh mục từ CSDL
			require_once './views/danhmuc/editDanhMuc.php';
			// xóa session sau khi load trang
			deleteSessionError();
		} else {
			header("Location: " . ADMIN_BASE_URL . '?act=list-danh-muc');
			exit();
		}
	}
	public function updateDanhMuc()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_edit'])) {
			$id_danh_muc = $_POST['id_danh_muc'] ?? '';
			$ten_danh_muc = $_POST['ten_danh_muc'] ?? '';
			$mo_ta = $_POST['mo_ta'] ?? '';
			$errors = [];

			// Kiểm tra rỗng
			if (empty($ten_danh_muc)) {
				$errors['ten_danh_muc'] = "Tên danh mục không được để trống.";
			}
			// var_dump($errors); die;
			$_SESSION['error'] = $errors;
			if (empty($errors)) {
				// Gọi phương thức trong model để cập nhật danh mục vào cơ sở dữ liệu
				$this->modelDanhMuc->updateDanhMuc($id_danh_muc, $ten_danh_muc, $mo_ta);
				header("Location: " . ADMIN_BASE_URL . '?act=list-danh-muc');
				exit();
			} else {
				// đặt chỉ thị xóa session
				$_SESSION['flash'] = true;
				header("Location: " . ADMIN_BASE_URL . '?act=form-edit-danh-muc&id_danh_muc=' . $id_danh_muc);
				exit();
			}
		}

	}
}
?>