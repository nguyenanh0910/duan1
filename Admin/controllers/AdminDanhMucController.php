<?php
class AdminDanhMucController
{
	public $modelDanhMuc;
	public function __construct()
	{
		$this->modelDanhMuc = new AdminDanhMuc();
	}
	public function danhsachDanhMuc()
	{
		$listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
		require_once './views/danhmuc/DanhMuc.php';
	}

	// thêm danh mục
	public function themDanhMuc()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_add'])) {
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
				$result = $this->modelDanhMuc->themDanhMuc($ten_danh_muc, $mo_ta);

				if ($result) {
					$thongbao = "Thêm thành công";
				} else {
					$thongbao = "Thêm không thành công";
				}
			}
		}

		require_once './views/danhmuc/ThemDanhMuc.php';
	}

	// xóa danh mục 
	public function xoaDanhMuc()
	{
		if (isset($_GET['id_danh_muc'])) {
			$id_danh_muc = $_GET['id_danh_muc'];
			$result = $this->modelDanhMuc->xoaDanhMuc($id_danh_muc);
			if ($result) {
				header("Location: ?act=danh-muc"); // Điều hướng về trang danh sách danh mục
				exit();
			} else {
				// Xử lý khi xóa không thành công (nếu cần)
				// Ví dụ: hiển thị thông báo lỗi
				echo "Xóa danh mục không thành công.";
			}
		}
	}

	// Sửa danh mục
	public function suaDanhMuc()
	{
		if (isset($_GET['id_danh_muc'])) {
			$id_danh_muc = $_GET['id_danh_muc'];
			// Gọi phương thức trong model để lấy chi tiết danh mục từ CSDL
			$editDanhMuc = $this->modelDanhMuc->suaDanhMuc($id_danh_muc);
			require_once './views/danhmuc/SuaDanhMuc.php';
		}
	}
	public function capNhatDanhMuc()
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
				$result = $this->modelDanhMuc->capNhatDanhMuc($id_danh_muc, $ten_danh_muc, $mo_ta);
				

				if ($result) {
					$thongbao = "Sửa thành công";
				} else {
					$thongbao = "Sửa không thành công";
				}
			}
		}
		header("Location: ?act=danh-muc"); 
	}
}
?>