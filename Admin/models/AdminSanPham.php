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
			$sql = "SELECT tb_sanpham.*, tb_danhmuc.ten_danh_muc FROM tb_sanpham  INNER JOIN tb_danhmuc ON tb_sanpham.id_danh_muc = tb_danhmuc.id_danh_muc";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function insertSanPham($ten_san_pham, $hinh_anh, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $id_danh_muc, $mo_ta, $trang_thai)
	{
		try {
			$sql = "INSERT INTO tb_sanpham 
                (ten_san_pham, hinh_anh, gia_san_pham, gia_khuyen_mai, so_luong, ngay_nhap, id_danh_muc, mo_ta, trang_thai)
                VALUES (:ten_san_pham, :hinh_anh, :gia_san_pham, :gia_khuyen_mai, :so_luong, :ngay_nhap, :id_danh_muc, :mo_ta, :trang_thai)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([
				':ten_san_pham' => $ten_san_pham,
				':hinh_anh' => $hinh_anh,
				':gia_san_pham' => $gia_san_pham,
				':gia_khuyen_mai' => $gia_khuyen_mai,
				':so_luong' => $so_luong,
				':ngay_nhap' => $ngay_nhap,
				':id_danh_muc' => $id_danh_muc,
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

	public function insertAlbumAnhSanPham($id_san_pham, $link_anh)
	{
		try {
			$sql = "INSERT INTO tb_anhsanpham
							(id_san_pham, link_anh)
							VALUES (:id_san_pham, :link_anh)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([
				':id_san_pham' => $id_san_pham,
				':link_anh' => $link_anh,
			]);
			// lấy id sản phẩm vừa thêm
			return true;
		} catch (PDOException $e) {
			echo "Lỗi SQL: " . $e->getMessage();
			return false;
		}
	}

	public function deleteSanPham($id_san_pham)
	{
		try {
			$sql = "DELETE FROM tb_sanpham WHERE id_san_pham = :id_san_pham";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(
				[
					':id_san_pham' => $id_san_pham,
				]
			);
			return true;
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function getDetailSanPham($id_san_pham)
	{
		try {
			$sql = "SELECT tb_sanpham.*, tb_danhmuc.ten_danh_muc 
							FROM tb_sanpham 
							INNER JOIN tb_danhmuc ON tb_sanpham.id_danh_muc = tb_danhmuc.id_danh_muc 
							WHERE tb_sanpham.id_san_pham = :id_san_pham ";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':id_san_pham' => $id_san_pham]);
			// var_dump($stmt); die;
			return $stmt->fetch();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function getListAnhSanPham($id_san_pham)
	{
		try {
			$sql = "SELECT * FROM tb_anhsanpham WHERE id_san_pham = :id_san_pham";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':id_san_pham' => $id_san_pham]);
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}

	public function getDetailAnhSanPham($id_anh_san_pham)
	{
		try {
			$sql = "SELECT * FROM tb_anhsanpham WHERE id_anh_san_pham = :id_anh_san_pham";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':id_anh_san_pham' => $id_anh_san_pham]);
			return $stmt->fetch();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}

	public function updateAnhSanPham($id_anh_san_pham, $new_file)
	{
		try {
			$sql = "UPDATE tb_anhsanpham 
								SET
									link_anh = :new_file
								WHERE id_anh_san_pham = :id_anh_san_pham ";

			$stmt = $this->conn->prepare($sql);
			$stmt->execute([
				':id_anh_san_pham' => $id_anh_san_pham,
				':new_file' => $new_file
			]);
			// lấy id sản phẩm vừa thêm
			return true;
		} catch (PDOException $e) {
			echo "Lỗi SQL: " . $e->getMessage();
			return false;
		}
	}

	public function destroyAnhSanPham($id_anh_san_pham)
	{
		try {
			$sql = "DELETE FROM tb_anhsanpham WHERE id_anh_san_pham = :id_anh_san_pham";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':id_anh_san_pham' => $id_anh_san_pham]);
			return true;
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}

	public function updateSanPham($id_san_pham, $ten_san_pham, $hinh_anh, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $id_danh_muc, $mo_ta, $trang_thai)
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
									id_danh_muc = :id_danh_muc, 
									mo_ta = :mo_ta, 
									trang_thai = :trang_thai
								WHERE id_san_pham = :id_san_pham ";

			$stmt = $this->conn->prepare($sql);
			$stmt->execute([
				':id_san_pham' => $id_san_pham,
				':ten_san_pham' => $ten_san_pham,
				':hinh_anh' => $hinh_anh,
				':gia_san_pham' => $gia_san_pham,
				':gia_khuyen_mai' => $gia_khuyen_mai,
				':so_luong' => $so_luong,
				':ngay_nhap' => $ngay_nhap,
				':id_danh_muc' => $id_danh_muc,
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