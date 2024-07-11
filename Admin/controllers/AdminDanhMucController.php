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
					// Hiển thị thông báo thành công bằng SweetAlert và quay lại trang thêm danh mục
					echo "<script>
									document.addEventListener('DOMContentLoaded', function() {
											Swal.fire({
													icon: 'success',
													title: 'Thêm thành công',
													showConfirmButton: false,
													timer: 1500
											}).then(() => {
													window.location.href = '?act=them-danh-muc';
											});
									});
								</script>";
				} else {
					// Hiển thị thông báo lỗi bằng SweetAlert
					echo "<script>
									document.addEventListener('DOMContentLoaded', function() {
											Swal.fire({
													icon: 'error',
													title: 'Thêm danh mục không thành công',
											});
									});
								</script>";
				}
			}
		}

		require_once './views/danhmuc/ThemDanhMuc.php';
	}
}
?>