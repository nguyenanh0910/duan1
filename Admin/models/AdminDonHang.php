<?php

class AdminDonHang
{
	public $conn;

	public function __construct()
	{
		$this->conn = connectDB();
	}
	public function getAllDonHang()
	{
		try {
			$sql = "SELECT tb_donhang.*, tb_trangthaidonhang.ten_trang_thai 
			FROM tb_donhang  
			INNER JOIN tb_trangthaidonhang ON tb_donhang.trang_thai_dh_id = tb_trangthaidonhang.id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function getAllTrangThaiDonHang()
	{
		try {
			$sql = "SELECT* FROM tb_trangthaidonhang ";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function getDetailDonHang($id)
	{
		try {
			$sql = "SELECT tb_donhang.*, tb_trangthaidonhang.ten_trang_thai, 
							tb_taikhoan.ho_ten, tb_taikhoan.email, tb_taikhoan.so_dien_thoai, tb_phuongthucthanhtoan.ten_phuong_thuc
							FROM tb_donhang 
							INNER JOIN tb_trangthaidonhang ON tb_donhang.trang_thai_dh_id = tb_trangthaidonhang.id
							INNER JOIN tb_taikhoan ON tb_donhang.tai_khoan_id = tb_taikhoan.id 
							INNER JOIN tb_phuongthucthanhtoan ON tb_donhang.phuong_thuc_tt_id = tb_phuongthucthanhtoan.id
							WHERE tb_donhang.id = :id ";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':id' => $id]);
			// var_dump($stmt); die;
			return $stmt->fetch();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function getListSpDonHang($id)
	{
		try {
			$sql = "SELECT tb_chitietdonhang.*, tb_sanpham.ten_san_pham 
			FROM tb_chitietdonhang 
			INNER JOIN tb_sanpham ON tb_chitietdonhang.san_pham_id = tb_sanpham.id
			WHERE tb_chitietdonhang.don_dang_id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':id' => $id]);
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}

	// Sửa đơn hàng
	public function updateDonHang($id, $ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan,  $dia_chi_nguoi_nhan, $ghi_chu, $trang_thai_dh_id)
	{
		try {
			$sql = "UPDATE tb_donhang 
								SET
									ten_nguoi_nhan = :ten_nguoi_nhan,
									sdt_nguoi_nhan = :sdt_nguoi_nhan, 
									email_nguoi_nhan = :email_nguoi_nhan, 
									dia_chi_nguoi_nhan = :dia_chi_nguoi_nhan, 
									ghi_chu = :ghi_chu, 
									trang_thai_dh_id = :trang_thai_dh_id
								WHERE id = :id ";
			$stmt = $this->conn->prepare($sql);
			// var_dump($stmt); die;
			$stmt->execute([
				':id' => $id,
				':ten_nguoi_nhan' => $ten_nguoi_nhan,
				':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
				':email_nguoi_nhan' => $email_nguoi_nhan,
				':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
				':ghi_chu' => $ghi_chu,
				':trang_thai_dh_id' => $trang_thai_dh_id
			]);
			return true;
		} catch (PDOException $e) {
			echo "Lỗi SQL: " . $e->getMessage();
			return false;
		}
	}

	// public function deleteSanPham($id_san_pham)
	// {
	// 	try {
	// 		$sql = "DELETE FROM tb_sanpham WHERE id_san_pham = :id_san_pham";
	// 		$stmt = $this->conn->prepare($sql);
	// 		$stmt->execute(
	// 			[
	// 				':id_san_pham' => $id_san_pham,
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