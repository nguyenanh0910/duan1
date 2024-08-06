<?php

class TaiKhoan
{
	public $conn;

	public function __construct()
	{
		$this->conn = connectDB();
	}

	public function checkLogin($email, $mat_khau)
	{
		try {
			$sql = "SELECT * FROM tb_taikhoan WHERE email = :email";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':email' => $email]);
			$user = $stmt->fetch();

			if ($user && password_verify($mat_khau, $user['mat_khau'])) {
				if ($user['chuc_vu_id'] == 2) {
					if ($user['trang_thai'] == 1) {
						$_SESSION['user'] = $user; // Lưu thông tin người dùng vào session
						return $user['email']; // trường hợp đăng nhập thành công
					} else {
						return "Tài khoản bị cấm";
					}
				} else {
					return "Tài khoản không có quyền đăng nhập";
				}
			} else {
				return "Bạn nhập sai thông tin mật khẩu hoặc tài khoản";
			}
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function getTaiKhoanFromEmail($email)
	{
		try {
			$sql = "SELECT * FROM tb_taikhoan WHERE email = :email";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':email' => $email]);
			return $stmt->fetch();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function resetPassword($id, $mat_khau)
	{
		try {
			$sql = "UPDATE tb_taikhoan
								SET
									mat_khau = :mat_khau
								WHERE id = :id ";
			$stmt = $this->conn->prepare($sql);
			// var_dump($stmt); die;
			$stmt->execute([
				':id' => $id,
				':mat_khau' => $mat_khau
			]);
			return true;
		} catch (PDOException $e) {
			echo "Lỗi SQL: " . $e->getMessage();
			return false;
		}
	}
	public function updateCaNhanKhachHang($id, $ho_ten, $so_dien_thoai, $email, $ngay_sinh, $gioi_tinh, $dia_chi, $anh_dai_dien)
	{
		try {
			$sql = "UPDATE tb_taikhoan
								SET
									ho_ten = :ho_ten,
									so_dien_thoai = :so_dien_thoai, 
									email = :email, 
									ngay_sinh = :ngay_sinh,
									gioi_tinh = :gioi_tinh,
									dia_chi = :dia_chi,
									anh_dai_dien = :anh_dai_dien
								WHERE id = :id ";
			$stmt = $this->conn->prepare($sql);
			// var_dump($stmt); die;
			$stmt->execute([
				':id' => $id,
				':ho_ten' => $ho_ten,
				':so_dien_thoai' => $so_dien_thoai,
				':email' => $email,
				':ngay_sinh' => $ngay_sinh,
				':gioi_tinh' => $gioi_tinh,
				':dia_chi' => $dia_chi,
				':anh_dai_dien' => $anh_dai_dien
			]);
			return true;
		} catch (PDOException $e) {
			echo "Lỗi SQL: " . $e->getMessage();
			return false;
		}
	}
	public function insertClient($ho_ten, $so_dien_thoai, $email, $mat_khau, $trang_thai, $chuc_vu_id){
		try {
			$sql = "INSERT INTO tb_taikhoan (ho_ten, so_dien_thoai, email, mat_khau, trang_thai, chuc_vu_id) VALUES (:ho_ten, :so_dien_thoai, :email, :mat_khau, :trang_thai, :chuc_vu_id)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(
				[
					':ho_ten' => $ho_ten,
					':so_dien_thoai' => $so_dien_thoai,
					':email' => $email,
					':mat_khau' => $mat_khau,
					':trang_thai' => $trang_thai,
					':chuc_vu_id' => $chuc_vu_id
				]
			);
			return true;
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
}