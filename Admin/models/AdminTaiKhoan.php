<?php

class AdminTaiKhoan {
	public $conn;

	public function __construct()
	{
		$this->conn = connectDB();
	}
	public function getAllTaiKhoan()
	{
		try {
			$sql = "SELECT * FROM tb_taikhoan ";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
public function addTaiKhoan($ho_ten, $ten_dang_nhap, $mat_khau, $email, $so_dien_thoai, $dia_chi, $anh_dai_dien, $vai_tro)
{
    try {
        $sql = "INSERT INTO tb_taikhoan 
                (ho_ten, ten_dang_nhap, mat_khau, email, so_dien_thoai, dia_chi, anh_dai_dien, vai_tro)
                VALUES (:ho_ten, :ten_dang_nhap, :mat_khau, :email, :so_dien_thoai, :dia_chi, :anh_dai_dien, :vai_tro)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':ho_ten' => $ho_ten,
            ':ten_dang_nhap' => $ten_dang_nhap,
            ':mat_khau' => $mat_khau,
            ':email' => $email,
            ':so_dien_thoai' => $so_dien_thoai,
            ':dia_chi' => $dia_chi,
            ':anh_dai_dien' => $anh_dai_dien,
            ':vai_tro' => $vai_tro,
        ]);
        return true;
    } catch (PDOException $e) {
        echo "Lỗi SQL: " . $e->getMessage();
        return false;
    }
}

	public function deleteTaiKhoan($id_tai_khoan)
	{
		try {
			$sql = "DELETE FROM tb_taikhoan WHERE id_tai_khoan = :id_tai_khoan";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':id_tai_khoan' => $id_tai_khoan]);
			return true;
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	// public function formEditTaiKhoan($id_tai_khoan)
	// {
	// 	try {
	// 		$sql = "SELECT * FROM tb_TaiKhoan WHERE id_tai_khoan = :id_tai_khoan";
	// 		$stmt = $this->conn->prepare($sql);
	// 		$stmt->execute([':id_tai_khoan' => $id_tai_khoan]);
	// 		return $stmt->fetch();
	// 	} catch (Exception $e) {
	// 		echo "Lỗi" . $e->getMessage();
	// 		return false;
	// 	}
	// }
	// public function updateTaiKhoan($id_tai_khoan, $ten_tai_khoan, $mo_ta)
	// {
	// 	try {
	// 		$sql = "UPDATE tb_TaiKhoan SET ten_tai_khoan = :ten_tai_khoan, mo_ta = :mo_ta WHERE id_tai_khoan = :id_tai_khoan";
	// 		$stmt = $this->conn->prepare($sql);
	// 		$stmt->execute(
	// 			[
	// 				':id_tai_khoan' => $id_tai_khoan,
	// 				':ten_tai_khoan' => $ten_tai_khoan,
	// 				':mo_ta' => $mo_ta,
	// 			]
	// 		);
	// 		return true;
	// 	} catch (Exception $e) {
	// 		echo "Lỗi" . $e->getMessage();
	// 		return false;
	// 	}
	// }
}

?>