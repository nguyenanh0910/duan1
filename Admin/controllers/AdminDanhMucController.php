<?php
	class AdminDanhMucController{
		public $modelDanhMuc;
		public function __construct()
		{
			$this->modelDanhMuc = new AdminDanhMuc();
		}
		public function danhsachDanhMuc(){
			$listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
			require_once './views/danhmuc/DanhMuc.php';
		}

		public function themDanhMuc()
    {
        if (isset($_POST['btn_add']) && ($_POST['btn_add'])) {
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            // Validate dữ liệu
            $errors = [];

            // Kiểm tra rỗng
            if (empty($ten_danh_muc)) {
                $errors[] = "Tên danh mục không được để trống.";
            }

            // Kiểm tra rỗng
            if (empty($mo_ta)) {
                $errors[] = "Mô tả không được để trống.";
            }

            if (empty($errors)) {
                // Gọi phương thức trong model để thêm danh mục vào cơ sở dữ liệu
                $result = $this->modelDanhMuc->themDanhMuc($ten_danh_muc, $mo_ta);

                if ($result) {
                    // Chuyển hướng hoặc hiển thị thông báo thành công
                    echo "Thêm thành công";
                    exit();
                } else {
                    $errorMessage = "Thêm danh mục không thành công.";
                }
            } else {
                // Hiển thị các thông báo lỗi nếu có
                foreach ($errors as $error) {
                    echo "<p>$error</p>";
                }
            }
        }

        // Nếu là GET request hoặc xử lý POST nhưng không thành công, hiển thị form thêm mới
        require_once './views/danhmuc/ThemDanhMuc.php';
    }
}
?>