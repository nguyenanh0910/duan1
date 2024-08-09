<?php

class SanPham
{
	public $conn;

	public function __construct()
	{
		$this->conn = connectDB();
	}

	// get sản phẩm mới
	public function getNewSanPham()
	{
		try {
			$sql = "SELECT * FROM tb_sanpham ORDER BY ngay_nhap DESC";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}

	// get sản phẩm bán chạy

	public function getBestSellingSanPham()
	{
		try {
			$sql = "SELECT tb_sanpham.*, SUM(tb_chitietdonhang.so_luong) AS total_sales
							FROM tb_sanpham 
							INNER JOIN tb_chitietdonhang ON tb_sanpham.id = tb_chitietdonhang.san_pham_id
							GROUP BY tb_sanpham.id
        			ORDER BY total_sales DESC LIMIT 5";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function getDetailSanPham($id)
	{
		try {
			$sql = "SELECT tb_sanpham.*, tb_danhmuc.ten_danh_muc 
							FROM tb_sanpham 
							INNER JOIN tb_danhmuc ON tb_sanpham.danh_muc_id = tb_danhmuc.id 
							WHERE tb_sanpham.id = :id ";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':id' => $id]);
			// var_dump($stmt); die;
			return $stmt->fetch();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function getListAnhSanPham($san_pham_id)
	{
		try {
			$sql = "SELECT * FROM tb_anhsanpham WHERE san_pham_id = :san_pham_id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':san_pham_id' => $san_pham_id]);
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function getBinhLuanFromSanPham($id)
	{
		try {
			$sql = "SELECT tb_binhluan.*, tb_taikhoan.ho_ten, tb_taikhoan.anh_dai_dien
			FROM tb_binhluan  
			INNER JOIN tb_taikhoan ON tb_binhluan.tai_khoan_id = tb_taikhoan.id
			WHERE tb_binhluan.san_pham_id = :id
			";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':id' => $id]);
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function getRelatedSanPham($id)
	{
		try {
			$sql = "SELECT * FROM tb_sanpham 
									WHERE danh_muc_id = (
											SELECT danh_muc_id
											FROM tb_sanpham
											WHERE id = :id
									) AND id <> :id
									LIMIT 5;";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['id' => $id]);
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function getSanPhamFromDanhMuc($danh_muc_id, $start, $limit = 9)
	{
		try {
			$sql = "SELECT * FROM tb_sanpham WHERE danh_muc_id = $danh_muc_id LIMIT $start, $limit";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi: " . $e->getMessage();
			return false;
		}
	}

	public function getTotalSanPhamFromDanhMuc($danh_muc_id)
	{
		try {
			$sql = "SELECT COUNT(*) FROM tb_sanpham WHERE danh_muc_id = $danh_muc_id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchColumn();
		} catch (Exception $e) {
			echo "Lỗi: " . $e->getMessage();
			return false;
		}
	}

	public function getAllSanPham($start, $limit = 9)
	{
		try {
			$sql = "SELECT * FROM tb_sanpham LIMIT $start, $limit";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi: " . $e->getMessage();
			return false;
		}
	}

	public function getTotalSanPham()
	{
		try {
			$sql = "SELECT COUNT(*) FROM tb_sanpham";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchColumn();
		} catch (Exception $e) {
			echo "Lỗi: " . $e->getMessage();
			return false;
		}
	}
	public function giamSoLuongSanPham($id, $so_luong)
	{
		try {
			$sql = "UPDATE tb_sanpham SET so_luong = so_luong - :so_luong WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([
				':so_luong' => $so_luong,
				':id' => $id
			]);
		} catch (Exception $e) {
			echo "Lỗi: " . $e->getMessage();
		}
	}
	public function hoanSoLuongSanPham($id, $so_luong)
	{
		try {
			$sql = "UPDATE tb_sanpham SET so_luong = so_luong + :so_luong WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([
				':so_luong' => $so_luong,
				':id' => $id
			]);
		} catch (Exception $e) {
			echo "Lỗi: " . $e->getMessage();
		}
	}
	public function insertBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung)
	{
		try {
			$sql = "INSERT INTO tb_binhluan (san_pham_id, tai_khoan_id, noi_dung, ngay_dang, trang_thai) VALUES (:san_pham_id, :tai_khoan_id, :noi_dung, NOW(), 1)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(
				[
					':san_pham_id' => $san_pham_id,
					':tai_khoan_id' => $tai_khoan_id,
					':noi_dung' => $noi_dung
				]
			);
			return true;
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function updateLuotXem($id){
		try {
			$sql = "UPDATE tb_sanpham SET luot_xem = luot_xem + 1 WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(
				[
					':id' => $id
				]
			);
			return true;
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
}