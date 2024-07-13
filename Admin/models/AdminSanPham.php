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
			$sql = "SELECT * FROM tb_sanpham INNER JOIN tb_danhmuc ON tb_sanpham.id_danh_muc = tb_danhmuc.id_danh_muc";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function addSanPham($ten_san_pham, $hinh_anh, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $id_danh_muc, $mo_ta) {
    try {
        $sql = "INSERT INTO tb_sanpham 
                (ten_san_pham, hinh_anh, gia_san_pham, gia_khuyen_mai, so_luong, ngay_nhap, id_danh_muc, mo_ta)
                VALUES (:ten_san_pham, :hinh_anh, :gia_san_pham, :gia_khuyen_mai, :so_luong, :ngay_nhap, :id_danh_muc, :mo_ta)";
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
        ]);
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
				array(
					':id_san_pham' => $id_san_pham,
				)
			);
			return true;
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	// public function formEditDanhMuc($id_danh_muc)
	// {
	// 	try {
	// 		$sql = "SELECT * FROM tb_danhmuc WHERE id_danh_muc = :id_danh_muc";
	// 		$stmt = $this->conn->prepare($sql);
	// 		$stmt->execute(
	// 			array(
	// 				':id_danh_muc' => $id_danh_muc,
	// 			)
	// 		);
	// 		return $stmt->fetch();
	// 	} catch (Exception $e) {
	// 		echo "Lỗi" . $e->getMessage();
	// 		return false;
	// 	}
	// }
	// public function updateDanhMuc($id_danh_muc, $ten_danh_muc, $mo_ta)
	// {
	// 	try {
	// 		$sql = "UPDATE tb_danhmuc SET ten_danh_muc = :ten_danh_muc, mo_ta = :mo_ta WHERE id_danh_muc = :id_danh_muc";
	// 		$stmt = $this->conn->prepare($sql);
	// 		$stmt->execute(
	// 			array(
	// 				':id_danh_muc' => $id_danh_muc,
	// 				':ten_danh_muc' => $ten_danh_muc,
	// 				':mo_ta' => $mo_ta,
	// 			)
	// 		);
	// 		return true;
	// 	} catch (Exception $e) {
	// 		echo "Lỗi" . $e->getMessage();
	// 		return false;
	// 	}
	// }
}

?>