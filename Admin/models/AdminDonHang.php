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
			INNER JOIN tb_trangthaidonhang ON tb_donhang.id_trang_thai_dh = tb_trangthaidonhang.id_trang_thai_dh";
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
	public function getDetailDonHang($id_don_hang)
	{
		try {
			$sql = "SELECT tb_donhang.*, tb_trangthaidonhang.ten_trang_thai, 
							tb_taikhoan.ho_ten, tb_taikhoan.email, tb_taikhoan.so_dien_thoai, tb_phuongthucthanhtoan.ten_phuong_thuc
							FROM tb_donhang 
							INNER JOIN tb_trangthaidonhang ON tb_donhang.id_trang_thai_dh = tb_trangthaidonhang.id_trang_thai_dh
							INNER JOIN tb_taikhoan ON tb_donhang.id_tai_khoan = tb_taikhoan.id_tai_khoan 
							INNER JOIN tb_phuongthucthanhtoan ON tb_donhang.id_phuong_thuc_tt = tb_phuongthucthanhtoan.id_phuong_thuc_tt
							WHERE tb_donhang.id_don_hang = :id_don_hang ";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':id_don_hang' => $id_don_hang]);
			// var_dump($stmt); die;
			return $stmt->fetch();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function getListSpDonHang($id_don_hang)
	{
		try {
			$sql = "SELECT tb_chitietdonhang.*, tb_sanpham.ten_san_pham 
			FROM tb_chitietdonhang 
			INNER JOIN tb_sanpham ON tb_chitietdonhang.id_san_pham = tb_sanpham.id_san_pham
			WHERE tb_chitietdonhang.id_don_hang = :id_don_hang";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':id_don_hang' => $id_don_hang]);
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}

	// Sửa đơn hàng
	public function updateDonHang($id_don_hang, $ten_nguoi_nhan, $sdt_nguoi_nhan, $email_nguoi_nhan,  $dia_chi_nguoi_nhan, $ghi_chu, $id_trang_thai_dh)
	{
		try {
			$sql = "UPDATE tb_donhang 
								SET
									ten_nguoi_nhan = :ten_nguoi_nhan,
									sdt_nguoi_nhan = :sdt_nguoi_nhan, 
									email_nguoi_nhan = :email_nguoi_nhan, 
									dia_chi_nguoi_nhan = :dia_chi_nguoi_nhan, 
									ghi_chu = :ghi_chu, 
									id_trang_thai_dh = :id_trang_thai_dh
								WHERE id_don_hang = :id_don_hang ";
			$stmt = $this->conn->prepare($sql);
			// var_dump($stmt); die;
			$stmt->execute([
				':id_don_hang' => $id_don_hang,
				':ten_nguoi_nhan' => $ten_nguoi_nhan,
				':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
				':email_nguoi_nhan' => $email_nguoi_nhan,
				':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
				':ghi_chu' => $ghi_chu,
				':id_trang_thai_dh' => $id_trang_thai_dh
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