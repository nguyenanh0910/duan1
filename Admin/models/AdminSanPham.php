<?php

class AdminSanPham
{
	public $conn;

	public function __construct()
	{
		$this->conn = connectDB();
	}
	public function getAllSanPham()
	{
		try {
			$sql = "SELECT tb_sanpham.*, tb_danhmuc.ten_danh_muc FROM tb_sanpham  INNER JOIN tb_danhmuc ON tb_sanpham.danh_muc_id = tb_danhmuc.id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function insertSanPham($ten_san_pham, $hinh_anh, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $mo_ta, $trang_thai)
	{
		try {
			$sql = "INSERT INTO tb_sanpham 
                (ten_san_pham, hinh_anh, gia_san_pham, gia_khuyen_mai, so_luong, ngay_nhap, danh_muc_id, mo_ta, trang_thai)
                VALUES (:ten_san_pham, :hinh_anh, :gia_san_pham, :gia_khuyen_mai, :so_luong, :ngay_nhap, :danh_muc_id, :mo_ta, :trang_thai)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([
				':ten_san_pham' => $ten_san_pham,
				':hinh_anh' => $hinh_anh,
				':gia_san_pham' => $gia_san_pham,
				':gia_khuyen_mai' => $gia_khuyen_mai,
				':so_luong' => $so_luong,
				':ngay_nhap' => $ngay_nhap,
				':danh_muc_id' => $danh_muc_id,
				':mo_ta' => $mo_ta,
				':trang_thai' => $trang_thai,
			]);
			// lấy id sản phẩm vừa thêm
			return $this->conn->lastInsertId();
		} catch (PDOException $e) {
			echo "Lỗi SQL: " . $e->getMessage();
			return false;
		}
	}

	public function insertAlbumAnhSanPham($san_pham_id, $link_anh)
	{
		try {
			$sql = "INSERT INTO tb_anhsanpham
							(san_pham_id, link_anh)
							VALUES (:san_pham_id, :link_anh)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([
				':san_pham_id' => $san_pham_id,
				':link_anh' => $link_anh,
			]);
			// lấy id sản phẩm vừa thêm
			return true;
		} catch (PDOException $e) {
			echo "Lỗi SQL: " . $e->getMessage();
			return false;
		}
	}

	public function deleteSanPham($id)
	{
		try {
			$sql = "DELETE FROM tb_sanpham WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(
				[
					':id' => $id,
				]
			);
			return true;
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

	public function getDetailAnhSanPham($id)
	{
		try {
			$sql = "SELECT * FROM tb_anhsanpham WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':id' => $id]);
			return $stmt->fetch();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}

	public function updateAnhSanPham($id, $new_file)
	{
		try {
			$sql = "UPDATE tb_anhsanpham 
								SET
									link_anh = :new_file
								WHERE id = :id ";

			$stmt = $this->conn->prepare($sql);
			$stmt->execute([
				':id' => $id,
				':new_file' => $new_file
			]);
			// lấy id sản phẩm vừa thêm
			return true;
		} catch (PDOException $e) {
			echo "Lỗi SQL: " . $e->getMessage();
			return false;
		}
	}

	public function destroyAnhSanPham($id)
	{
		try {
			$sql = "DELETE FROM tb_anhsanpham WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':id' => $id]);
			return true;
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}

	public function updateSanPham($id, $ten_san_pham, $hinh_anh, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $mo_ta, $trang_thai)
	{
		try {
			$sql = "UPDATE tb_sanpham 
								SET
									ten_san_pham = :ten_san_pham,
									hinh_anh = :hinh_anh, 
									gia_san_pham = :gia_san_pham, 
									gia_khuyen_mai = :gia_khuyen_mai, 
									so_luong = :so_luong, 
									ngay_nhap = :ngay_nhap, 
									danh_muc_id = :danh_muc_id, 
									mo_ta = :mo_ta, 
									trang_thai = :trang_thai
								WHERE id = :id ";

			$stmt = $this->conn->prepare($sql);
			$stmt->execute([
				':id' => $id,
				':ten_san_pham' => $ten_san_pham,
				':hinh_anh' => $hinh_anh,
				':gia_san_pham' => $gia_san_pham,
				':gia_khuyen_mai' => $gia_khuyen_mai,
				':so_luong' => $so_luong,
				':ngay_nhap' => $ngay_nhap,
				':danh_muc_id' => $danh_muc_id,
				':mo_ta' => $mo_ta,
				':trang_thai' => $trang_thai,
			]);
			// lấy id sản phẩm vừa thêm
			return true;
		} catch (PDOException $e) {
			echo "Lỗi SQL: " . $e->getMessage();
			return false;
		}
	}
}

?>