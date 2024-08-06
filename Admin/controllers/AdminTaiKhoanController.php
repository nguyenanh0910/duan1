<?php
class AdminTaiKhoanController
{
	public $modelTaiKhoan;
	public $modelDonHang;
	public $modelSanPham;
	public function __construct()
	{
		$this->modelTaiKhoan = new AdminTaiKhoan();
		$this->modelDonHang = new AdminDonHang();
		$this->modelSanPham = new AdminSanPham();
	}
	public function listQuanTri()
	{
		$listQuanTri = $this->modelTaiKhoan->getAllTaiKhoan(1);
		require_once './views/taikhoan/quantri/listQuanTri.php';
	}
	public function formAddQuanTri()
	{
		require_once './views/taikhoan/quantri/addQuanTri.php';
		deleteSessionError();
	}

	public function addQuanTri()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$ho_ten = $_POST['ho_ten'] ?? '';
			$email = $_POST['email'] ?? '';

			// Validate dữ liệu
			$errors = [];

			// Kiểm tra rỗng
			if (empty($ho_ten)) {
				$errors['ho_ten'] = "Họ tên không được để trống";
			}
			if (empty($email)) {
				$errors['email'] = "Email không được để trống";
			}
			$_SESSION['error'] = $errors;
			if (empty($errors)) {
				// đặt password mặc định - 123456
				$password = password_hash('123456', PASSWORD_BCRYPT);

				// khai báo trạng thái
				$trang_thai = 1;

				// Khai báo chức vụ
				$chuc_vu_id = 1;

				$this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $trang_thai, $chuc_vu_id);
				// var_dump($test); die;
				header("Location: " . ADMIN_BASE_URL . '?act=list-tai-khoan-quan-tri');
				exit();
			} else {
				$_SESSION['flash'] = true;
				header("Location: " . ADMIN_BASE_URL . '?act=form-add-quan-tri');
				exit();
			}
		}
	}
	public function formEditQuanTri()
	{
		$id = $_GET['id'];
		$editQuanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id);
		if ($editQuanTri) {
			require_once './views/taikhoan/quantri/editQuanTri.php';
			// xóa session sau khi load trang
			deleteSessionError();
		} else {
			header("Location: " . ADMIN_BASE_URL . '?act=list-tai-khoan-quan-tri');
			exit();
		}
	}
	public function updateQuanTri()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$id = $_POST['id'] ?? '';
			$ho_ten = $_POST['ho_ten'] ?? '';
			$so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
			$email = $_POST['email'] ?? '';
			$trang_thai = $_POST['trang_thai'] ?? '';
			// Validate dữ liệu
			$errors = [];

			// Kiểm tra rỗng
			if (empty($ho_ten)) {
				$errors['ho_ten'] = "Họ tên không được để trống.";
			}
			if (empty($email)) {
				$errors['email'] = "Email không được để trống.";
			}
			if (empty($trang_thai)) {
				$errors['trang_thai'] = "Trạng thái tài khoản phải chọn.";
			}
			$_SESSION['error'] = $errors;
			if (empty($errors)) {
				// Gọi phương thức trong model để thêm sản phẩm vào cơ sở dữ liệu
				$this->modelTaiKhoan->updateQuanTri($id, $ho_ten, $so_dien_thoai, $email, $trang_thai);
				header("Location: " . ADMIN_BASE_URL . '?act=list-tai-khoan-quan-tri');
				exit();
			} else {
				$_SESSION['flash'] = true;
				header("Location: " . ADMIN_BASE_URL . '?act=form-edit-quan-tri&id=' . $id);
				exit();
			}
		}
	}
	public function resetPassword()
	{
		$id = $_GET['id'];
		$tai_khoan = $this->modelTaiKhoan->getDetailTaiKhoan($id);
		// đặt password mặc định - 123456
		$password = password_hash('123456', PASSWORD_BCRYPT);
		$status = $this->modelTaiKhoan->resetPassword($id, $password);
		if ($status && $tai_khoan['chuc_vu_id'] == 1) {
			header("Location: " . ADMIN_BASE_URL . '?act=list-tai-khoan-quan-tri');
			exit();
		} elseif ($status && $tai_khoan['chuc_vu_id'] == 2) {
			header("Location: " . ADMIN_BASE_URL . '?act=list-tai-khoan-khach-hang');
			exit();
		} else {
			var_dump('Lỗi khi reset tài khoản');
			die;
		}
	}
	public function listKhachHang()
	{
		$listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
		require_once './views/taikhoan/khachhang/listKhachHang.php';
	}
	public function formEditKhachHang()
	{
		$id = $_GET['id'];
		$editKhachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id);
		if ($editKhachHang) {
			require_once './views/taikhoan/khachhang/editKhachHang.php';
			// xóa session sau khi load trang
			deleteSessionError();
		} else {
			header("Location: " . ADMIN_BASE_URL . '?act=list-tai-khoan-khach-hang');
			exit();
		}
	}
	public function updateKhachHang()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$id = $_POST['id'] ?? '';
			$ho_ten = $_POST['ho_ten'] ?? '';
			$so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
			$email = $_POST['email'] ?? '';
			$ngay_sinh = $_POST['ngay_sinh'] ?? '';
			$gioi_tinh = $_POST['gioi_tinh'] ?? '';
			$dia_chi = $_POST['dia_chi'] ?? '';
			$trang_thai = $_POST['trang_thai'] ?? '';
			// Validate dữ liệu
			$errors = [];

			// Kiểm tra rỗng
			if (empty($ho_ten)) {
				$errors['ho_ten'] = "Họ tên không được để trống.";
			}
			if (empty($email)) {
				$errors['email'] = "Email không được để trống.";
			}
			if (empty($ngay_sinh)) {
				$errors['ngay_sinh'] = "Ngày sinh không được để trống.";
			}
			if (empty($gioi_tinh)) {
				$errors['gioi_tinh'] = "Giới tính không được để trống.";
			}
			if (empty($trang_thai)) {
				$errors['trang_thai'] = "Trạng thái tài khoản phải chọn.";
			}
			$_SESSION['error'] = $errors;
			if (empty($errors)) {
				// Gọi phương thức trong model để thêm sản phẩm vào cơ sở dữ liệu
				$this->modelTaiKhoan->updateKhachHang($id, $ho_ten, $so_dien_thoai, $email, $ngay_sinh, $gioi_tinh, $dia_chi, $trang_thai);
				header("Location: " . ADMIN_BASE_URL . '?act=list-tai-khoan-khach-hang');
				exit();
			} else {
				$_SESSION['flash'] = true;
				header("Location: " . ADMIN_BASE_URL . '?act=form-edit-khach-hang&id=' . $id);
				exit();
			}
		}
	}
	public function detailKhachHang()
	{
		$id = $_GET['id'];
		$khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id);
		$listDonHang = $this->modelDonHang->getDonHangFromKhachHang($id);
		$listBinhLuan = $this->modelSanPham->getBinhLuanFromKhachHang($id);
		require_once './views/taikhoan/khachhang/detailKhachHang.php';
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
			$password = $_POST['password'];

			// xử lý kiểm tra thông tin đăng nhập
			$user = $this->modelTaiKhoan->checkLogin($email, $password);

			if ($user == $email) { // trường hợp đăng nhập thành công
				// Lưu thông tin vào session
				$_SESSION['user_admin'] = $user;
				$_SESSION['thongTin'] = $this->modelTaiKhoan->getTaiKhoanFromEmail($email);
				header("Location: " . ADMIN_BASE_URL);
				exit();
			} else {
				// Lỗi thì lưu lỗi vào session
				$_SESSION['error'] = $user;
				$_SESSION['flash'] = true;
				header("Location: " . ADMIN_BASE_URL . '?act=login-admin');
				exit();
			}
		}
	}

	public function logout()
	{
		if (isset($_SESSION['user_admin'])) {
			unset($_SESSION['user_admin']);
			header("Location: " . ADMIN_BASE_URL . '?act=login-admin');
			exit();
		}
	}

	public function formEditCaNhanQuanTri()
	{
		$email = $_SESSION['user_admin'];
		$thongTin = $this->modelTaiKhoan->getTaiKhoanFromEmail($email);
		$_SESSION['thongTin'] = $thongTin;
		require_once './views/taikhoan/canhan/editCaNhan.php';
		deleteSessionError();
	}
	public function updateMatKhauCaNhan()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$old_pass = $_POST['old_pass'];
			$new_pass = $_POST['new_pass'];
			$confirm_pass = $_POST['confirm_pass'];

			// Lấy thông tin người dùng từ session
			$user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
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
					$_SESSION['success'] = "Đã đổi mật khẩu thành công";
					$_SESSION['flash'] = true;
					header("Location: " . ADMIN_BASE_URL . '?act=form-edit-thong-tin-ca-nhan-quan-tri');
					exit();
				}
			} else {
				// Đặt chỉ thị xóa session
				$_SESSION['flash'] = true;
				header("Location: " . ADMIN_BASE_URL . '?act=form-edit-thong-tin-ca-nhan-quan-tri');
				exit();
			}
		}
	}
	public function updateCaNhanQuanTri()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$id = $_POST['id'] ?? '';
			$userOld = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_admin']);
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
				$status = $this->modelTaiKhoan->updateCaNhanQuanTri($id, $ho_ten, $so_dien_thoai, $email, $ngay_sinh, $gioi_tinh, $dia_chi, $new_file);
				if ($status) {
					$_SESSION['success'] = "Đã lưu thông tin thành công";
					$_SESSION['flash'] = true;
					$_SESSION['user_admin'] = $email;
					header("Location: " . ADMIN_BASE_URL . '?act=form-edit-thong-tin-ca-nhan-quan-tri');
					exit();
				}
			} else {
				$_SESSION['flash'] = true;
				header("Location: " . ADMIN_BASE_URL . '?act=form-edit-thong-tin-ca-nhan-quan-tri');
				exit();
			}
		}
	}

}