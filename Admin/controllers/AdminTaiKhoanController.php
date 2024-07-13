<?php
class AdminTaiKhoanController
{
	public $modelTaiKhoan;
	public function __construct()
	{
		$this->modelTaiKhoan = new AdminTaiKhoan();
	}
	public function listTaiKhoan()
	{
		$listTaiKhoan = $this->modelTaiKhoan->getAllTaiKhoan();
		require_once './views/taikhoan/listTaiKhoan.php';
	}
	public function formaddTaiKhoan()
	{
		require_once './views/TaiKhoan/addTaiKhoan.php';
	}
// thêm sản phẩm
public function addTaiKhoan()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ho_ten = $_POST['ho_ten'];
        $ten_dang_nhap = $_POST['ten_dang_nhap'];
        $mat_khau = $_POST['mat_khau'];
        $email = $_POST['email'];
        $so_dien_thoai = $_POST['so_dien_thoai'];
        $dia_chi = $_POST['dia_chi'];
        $vai_tro = $_POST['vai_tro'];

        // hình ảnh
        $target_dir = "../uploads/";
        $fileName = 'anh_dai_dien';
        $anh_dai_dien = uploadFile($fileName, $target_dir); // Đổi tên biến thành $anh_dai_dien

        // Validate dữ liệu
        $errors = [];

        // Kiểm tra rỗng
        if (empty($ho_ten)) {
            $errors[] = "Họ tên không được để trống.";
        }
        if (empty($ten_dang_nhap)) {
            $errors[] = "Tên đăng nhập không được để trống.";
        }
        if (empty($mat_khau)) {
            $errors[] = "Mật khẩu không được để trống.";
        }
        if (empty($email)) {
            $errors[] = "Email không được để trống.";
        }
        if (empty($so_dien_thoai)) {
            $errors[] = "Số điện thoại không được để trống.";
        }
        if (empty($dia_chi)) {
            $errors[] = "Địa chỉ không được để trống.";
        }
        if (empty($vai_tro)) {
            $errors[] = "Vai trò không được để trống.";
        }
        if (empty($anh_dai_dien)) {
            $errors[] = "Bạn phải chọn một file ảnh đại diện.";
        }

        if (empty($errors)) {
            // Gọi phương thức trong model để thêm tài khoản vào cơ sở dữ liệu
            $result = $this->modelTaiKhoan->addTaiKhoan($ho_ten, $ten_dang_nhap, $mat_khau, $email, $so_dien_thoai, $dia_chi, $anh_dai_dien, $vai_tro);

						if ($result) {
							$thongbao = "Thêm thành công";
						} else {
							$thongbao = "Thêm không thành công";
						}
        }
    }
    require_once './views/TaiKhoan/addTaiKhoan.php';
}


// xóa tài khoản
public function deleteTaiKhoan()
{
	if (isset($_GET['id_tai_khoan'])) {
		$id_tai_khoan = $_GET['id_tai_khoan'];
		$this->modelTaiKhoan->deleteTaiKhoan($id_tai_khoan);
		header("Location: ?act=list-tai-khoan");
	} else {
		echo "Xóa sản phẩm không thành công.";
	}
}

}
?>