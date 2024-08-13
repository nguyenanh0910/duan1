<?php
require_once './commons/function.php';
class TaiKhoanController
{
	public $modelTaiKhoan;
	public $modelDonHang;
	public function __construct()
	{
		$this->modelTaiKhoan = new TaiKhoan();
		$this->modelDonHang = new DonHang();
	}
	public function formLogin()
	{
		require_once './views/auth/formLogin.php';
		deleteSessionError();
	}

	public function login()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// lấy email và pass gửi lên từ form
			$email = $_POST['email'];
			$password = $_POST['mat_khau'];

			// xử lý kiểm tra thông tin đăng nhập
			$user = $this->modelTaiKhoan->checkLogin($email, $password);
			// var_dump($user); die;

			if ($user == $email) { // trường hợp đăng nhập thành công
				// Lưu thông tin vào session
				$_SESSION['user_client'] = $user;
				$_SESSION['client'] = $this->modelTaiKhoan->getTaiKhoanFromEmail($email);
				// var_dump($_SESSION['thongTin']); die;
				// var_dump($_SESSION['user_client']); die;
				header("Location: " . BASE_URL);
				exit();
			} else {
				// Lỗi thì lưu lỗi vào session
				$_SESSION['error'] = $user;
				$_SESSION['flash'] = true;
				header("Location: " . BASE_URL . '?act=login-client');
				exit();
			}
		}
	}

	public function logout()
	{
		if (isset($_SESSION['user_client'])) {
			session_unset();

			// Hủy phiên
			session_destroy();
			header("Location: " . BASE_URL);
			exit();
		}
	}
	public function formEditCaNhanKhachHang()
	{
		$email = $_SESSION['user_client'];
		$tai_khoan_id = $_SESSION['client']['id'];
		$thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($email);
		$listDonHang = $this->modelDonHang->getDonHangByUser($tai_khoan_id);
		require_once './views/taikhoan/editCaNhan.php';
		deleteSessionError();
	}
	public function updateMatKhauCaNhan()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$old_pass = $_POST['old_pass'];
			$new_pass = $_POST['new_pass'];
			$confirm_pass = $_POST['confirm_pass'];

			// Lấy thông tin người dùng từ session
			$user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
			$checkPass = password_verify($old_pass, $user['mat_khau']);

			$errors = [];

			if (!$checkPass) {
				$errors['old_pass'] = "Mật khẩu cũ không đúng";
			}

			if ($new_pass !== $confirm_pass) {
				$errors['confirm_pass'] = "Mật khẩu xác nhận không trùng với mật khẩu mới";
			}

			if (empty($old_pass)) {
				$errors['old_pass'] = "Vui lòng điền thông tin vào đây";
			}

			if (empty($new_pass)) {
				$errors['new_pass'] = "Vui lòng điền thông tin vào đây";
			}

			if (empty($confirm_pass)) {
				$errors['confirm_pass'] = "Vui lòng điền thông tin vào đây";
			}

			$_SESSION['error'] = $errors;

			if (!$errors) {
				// Thực hiện đổi mật khẩu
				$hashPass = password_hash($new_pass, PASSWORD_BCRYPT);
				$status = $this->modelTaiKhoan->resetPassword($user['id'], $hashPass);

				if ($status) {
					$_SESSION['success2'] = "Đã đổi mật khẩu thành công";
					$_SESSION['flash'] = true;
					header("Location: " . BASE_URL . '?act=form-edit-thong-tin-ca-nhan-khach-hang');
					exit();
				}
			} else {
				// Đặt chỉ thị xóa session
				$_SESSION['flash'] = true;
				header("Location: " . BASE_URL . '?act=form-edit-thong-tin-ca-nhan-khach-hang');
				exit();
			}
		}
	}
	public function updateCaNhanKhachHang()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$id = $_POST['id'] ?? '';
			$userOld = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']);
			$old_file = $userOld['anh_dai_dien'] ?? ''; // lấy ảnh cũ để phục vụ cho sửa ảnh
			$ho_ten = $_POST['ho_ten'] ?? '';
			$so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
			$email = $_POST['email'] ?? '';
			$ngay_sinh = $_POST['ngay_sinh'] ?? '';
			$gioi_tinh = $_POST['gioi_tinh'] ?? '';
			$dia_chi = $_POST['dia_chi'] ?? '';

			// hình ảnh đại diện
			$anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;
			// Validate dữ liệu
			$errors = [];

			// Kiểm tra rỗng
			if (empty($ho_ten)) {
				$errors['ho_ten'] = "Họ tên không được để trống.";
			}
			if (empty($email)) {
				$errors['email'] = "Email không được để trống.";
			}
			if (empty($so_dien_thoai)) {
				$errors['so_dien_thoai'] = "Số điện thoại không được để trống.";
			}
			if (empty($ngay_sinh)) {
				$errors['ngay_sinh'] = "Ngày sinh không được để trống.";
			}
			if (empty($gioi_tinh)) {
				$errors['gioi_tinh'] = "Giới tính không được để trống.";
			}
			if (empty($dia_chi)) {
				$errors['dia_chi'] = "Địa chỉ không được để trống.";
			}
			$_SESSION['error'] = $errors;
			// logic sửa ảnh
			if (isset($anh_dai_dien) && $anh_dai_dien['error'] == UPLOAD_ERR_OK) {
				// upload ảnh mới lên
				$new_file = uploadFile($anh_dai_dien, './uploads/');
				if (!empty($old_file)) { // nếu có ảnh cũ thì xóa đi
					deleteFile($old_file);
				}
			} else {
				$new_file = $old_file;
			}
			// var_dump($new_file); die;
			if (empty($errors)) {
				// Gọi phương thức trong model để thêm sản phẩm vào cơ sở dữ liệu
				$status = $this->modelTaiKhoan->updateCaNhanKhachHang($id, $ho_ten, $so_dien_thoai, $email, $ngay_sinh, $gioi_tinh, $dia_chi, $new_file);
				if ($status) {
					$_SESSION['success'] = "Đã lưu thông tin thành công";
					$_SESSION['flash'] = true;
					$_SESSION['user_client'] = $email;
					header("Location: " . BASE_URL . '?act=form-edit-thong-tin-ca-nhan-khach-hang');
					exit();
				}
			} else {
				$_SESSION['flash'] = false;
				header("Location: " . BASE_URL . '?act=form-edit-thong-tin-ca-nhan-khach-hang');
				exit();
			}
		}
	}
	public function formRegister()
	{
		require_once './views/auth/formRegister.php';
		deleteSessionError();
	}
	public function addClient()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$ho_ten = $_POST['ho_ten'] ?? '';
			$so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
			$email = $_POST['email'] ?? '';
			$pass = $_POST['pass'] ?? '';
			$confirm_pass = $_POST['confirm_pass'] ?? '';

			// Validate dữ liệu
			$errors = [];

			// Kiểm tra rỗng
			if (empty($ho_ten)) {
				$errors['ho_ten'] = "Họ tên không được để trống.";
			}
			if (empty($email)) {
				$errors['email'] = "Email không được để trống.";
			}
			if (empty($so_dien_thoai)) {
				$errors['so_dien_thoai'] = "Số điện thoại không được để trống.";
			}
			if (empty($pass) || empty($confirm_pass)) {
				$errors['pass'] = "Mật khẩu không được để trống.";
			}
			if ($pass !== $confirm_pass) {
				$errors['confirm_pass'] = "Mật khẩu xác nhận không trùng với mật khẩu mới.";
			}

			$_SESSION['error'] = $errors;

			if (empty($errors)) {
				$hashPass = password_hash($pass, PASSWORD_BCRYPT);
				// khai báo trạng thái
				$trang_thai = 1;

				// Khai báo chức vụ
				$chuc_vu_id = 2;
				// Gọi phương thức trong model để thêm khách hàng vào cơ sở dữ liệu
				$status = $this->modelTaiKhoan->insertClient($ho_ten, $so_dien_thoai, $email, $hashPass, $trang_thai, $chuc_vu_id);
				if ($status) {
					$_SESSION['message'] = 'Đăng ký thông tin thành công. <a href="' . BASE_URL . '?act=login-client">Vui lòng đăng nhập</a>';
					$_SESSION['flash'] = true;
					header("Location: " . BASE_URL . '?act=form-dang-ky-client');
					exit();
				}

			} else {
				$_SESSION['flash'] = false;
				$_SESSION['message'] = "Đăng ký thất bại" ; 
				header("Location: " . BASE_URL . '?act=form-dang-ky-client');
				exit();
			}
		}
	}
public function formForgot(){
	require_once './views/auth/formForgot.php';
		deleteSessionError();
}
}