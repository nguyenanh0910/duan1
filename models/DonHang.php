<?php

class DonHang
{
	public $conn;

	public function __construct()
	{
		$this->conn = connectDB();
	}
	public function getAllPhuongThucThanhToan()
	{
		try {
			$sql = "SELECT * FROM tb_phuongthucthanhtoan ";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function getLastOrderCode()
	{
		try {
			$sql = "SELECT ma_don_hang FROM tb_donhang ORDER BY id DESC LIMIT 1";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetch();

			return $result ? $result['ma_don_hang'] : null;
		} catch (Exception $e) {
			echo "Lỗi: " . $e->getMessage();
			return null;
		}
	}
	public function generateOrderCode()
	{
		$lastOrderCode = $this->getLastOrderCode();

		if ($lastOrderCode) {
			// Trích xuất số thứ tự từ mã đơn hàng cuối cùng
			$lastNumber = (int) substr($lastOrderCode, 3);
			$newNumber = $lastNumber + 1;
		} else {
			// Nếu chưa có đơn hàng nào, bắt đầu từ 1
			$newNumber = 1;
		}

		// Định dạng mã đơn hàng mới
		$newOrderCode = 'DH-' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

		return $newOrderCode;
	}

	// Thêm đơn hàng vào cơ sở dữ liệu
	public function addDonHang($tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $tong_tien, $ghi_chu, $phuong_thuc_tt_id)
	{
		try {
			$ma_don_hang = $this->generateOrderCode();
			$sql = "INSERT INTO tb_donhang (ma_don_hang, tai_khoan_id, ten_nguoi_nhan, email_nguoi_nhan, sdt_nguoi_nhan, dia_chi_nguoi_nhan, ngay_dat, tong_tien, ghi_chu, phuong_thuc_tt_id, trang_thai_dh_id)
									 VALUES (:ma_don_hang, :tai_khoan_id, :ten_nguoi_nhan, :email_nguoi_nhan, :sdt_nguoi_nhan, :dia_chi_nguoi_nhan, NOW(), :tong_tien, :ghi_chu, :phuong_thuc_tt_id, 1)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([
				':ma_don_hang' => $ma_don_hang,
				':tai_khoan_id' => $tai_khoan_id,
				':ten_nguoi_nhan' => $ten_nguoi_nhan,
				':email_nguoi_nhan' => $email_nguoi_nhan,
				':sdt_nguoi_nhan' => $sdt_nguoi_nhan,
				':dia_chi_nguoi_nhan' => $dia_chi_nguoi_nhan,
				':tong_tien' => $tong_tien,
				':ghi_chu' => $ghi_chu,
				':phuong_thuc_tt_id' => $phuong_thuc_tt_id
			]);

			// Lấy ID của đơn hàng vừa thêm
			$don_hang_id = $this->conn->lastInsertId();
			return ['id' => $don_hang_id, 'ma_don_hang' => $ma_don_hang];
		} catch (Exception $e) {
			echo "Lỗi: " . $e->getMessage();
			return false;
		}
	}

	// Thêm chi tiết đơn hàng vào cơ sở dữ liệu
	public function addChiTietDonHang($don_hang_id, $san_pham_id, $don_gia, $so_luong, $thanh_tien)
	{
		try {
			$sql = "INSERT INTO tb_chitietdonhang (don_hang_id, san_pham_id, don_gia, so_luong, thanh_tien)
									 VALUES (:don_hang_id, :san_pham_id, :don_gia, :so_luong, :thanh_tien)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([
				':don_hang_id' => $don_hang_id,
				':san_pham_id' => $san_pham_id,
				':don_gia' => $don_gia,
				':so_luong' => $so_luong,
				':thanh_tien' => $thanh_tien,
			]);

			return true;
		} catch (Exception $e) {
			echo "Lỗi: " . $e->getMessage();
			return false;
		}
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
	public function getDonHangByUser($tai_khoan_id){
		try {
			$sql = "SELECT tb_donhang.*, tb_trangthaidonhang.ten_trang_thai 
			FROM tb_donhang  
			INNER JOIN tb_trangthaidonhang ON tb_donhang.trang_thai_dh_id = tb_trangthaidonhang.id
			WHERE tai_khoan_id = :tai_khoan_id ORDER BY ngay_dat DESC";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':tai_khoan_id'=>$tai_khoan_id]);
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function getDetailDonHang($id)
	{
		try {
			$sql = "SELECT tb_donhang.*, tb_trangthaidonhang.ten_trang_thai, tb_chitietdonhang.san_pham_id, tb_chitietdonhang.so_luong,
							tb_taikhoan.ho_ten, tb_taikhoan.email, tb_taikhoan.so_dien_thoai, tb_phuongthucthanhtoan.ten_phuong_thuc
							FROM tb_donhang 
							INNER JOIN tb_trangthaidonhang ON tb_donhang.trang_thai_dh_id = tb_trangthaidonhang.id
							INNER JOIN tb_taikhoan ON tb_donhang.tai_khoan_id = tb_taikhoan.id 
							INNER JOIN tb_phuongthucthanhtoan ON tb_donhang.phuong_thuc_tt_id = tb_phuongthucthanhtoan.id
							INNER JOIN tb_chitietdonhang ON tb_donhang.id = tb_chitietdonhang.don_hang_id
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
			$sql = "SELECT tb_chitietdonhang.*, tb_sanpham.ten_san_pham, tb_sanpham.hinh_anh 
			FROM tb_chitietdonhang 
			INNER JOIN tb_sanpham ON tb_chitietdonhang.san_pham_id = tb_sanpham.id
			WHERE tb_chitietdonhang.don_hang_id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':id' => $id]);
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
	public function handleOrderAct($id, $act)
	{
		try {
			// Bước 1: Kiểm tra trạng thái đơn hàng hiện tại
			$sqlCheck = "SELECT trang_thai_dh_id FROM tb_donhang WHERE id = :id";
			$stmtCheck = $this->conn->prepare($sqlCheck);
			$stmtCheck->execute([':id' => $id]);
			$order = $stmtCheck->fetch(PDO::FETCH_ASSOC);

			if ($order) {
				$trang_thai_dh_id = $order['trang_thai_dh_id'];
				$sqlUpdate = "";
				$newStatus = null;

				// Bước 2: Xác định hành động và trạng thái mới
				if ($act == 'cancel' && $trang_thai_dh_id <= 1) {
					$sqlUpdate = "UPDATE tb_donhang SET trang_thai_dh_id = 9 WHERE id = :id";
				} elseif ($act == 'confirm' && $trang_thai_dh_id == 6) {
					$sqlUpdate = "UPDATE tb_donhang SET trang_thai_dh_id = 7 WHERE id = :id";
				} elseif ($act == 'refund' && $trang_thai_dh_id == 6) {
					$sqlUpdate = "UPDATE tb_donhang SET trang_thai_dh_id = 8 WHERE id = :id";
				} else {
					return false; // Trạng thái không cho phép hành động
				}

				if ($sqlUpdate) {
					// Cập nhật trạng thái đơn hàng
					$stmtUpdate = $this->conn->prepare($sqlUpdate);
					$stmtUpdate->execute([':id' => $id]);
					return true;
				} else {
					return false; // Không thực hiện hành động
				}
			} else {
				return false; // Đơn hàng không tồn tại
			}
		} catch (Exception $e) {
			echo "Lỗi: " . $e->getMessage();
			return false;
		}
	}



}