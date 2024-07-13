<?php

class AdminDanhMuc
{
	public $conn;

	public function __construct()
	{
		$this->conn = connectDB();
	}
	public function getAllDanhMuc()
	{
		try {
			$sql = "SELECT * FROM tb_danhmuc ";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function addDanhMuc($ten_danh_muc, $mo_ta)
	{
		try {
			$sql = "INSERT INTO tb_danhmuc (ten_danh_muc, mo_ta) VALUES (:ten_danh_muc, :mo_ta)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(
				[
					':ten_danh_muc' => $ten_danh_muc,
					':mo_ta' => $mo_ta,
				]
			);
			return true;
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function deleteDanhMuc($id_danh_muc)
	{
		try {
			$sql = "DELETE FROM tb_danhmuc WHERE id_danh_muc = :id_danh_muc";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':id_danh_muc' => $id_danh_muc]);
			return true;
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function formEditDanhMuc($id_danh_muc)
	{
		try {
			$sql = "SELECT * FROM tb_danhmuc WHERE id_danh_muc = :id_danh_muc";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':id_danh_muc' => $id_danh_muc]);
			return $stmt->fetch();
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function updateDanhMuc($id_danh_muc, $ten_danh_muc, $mo_ta)
	{
		try {
			$sql = "UPDATE tb_danhmuc SET ten_danh_muc = :ten_danh_muc, mo_ta = :mo_ta WHERE id_danh_muc = :id_danh_muc";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(
				[
					':id_danh_muc' => $id_danh_muc,
					':ten_danh_muc' => $ten_danh_muc,
					':mo_ta' => $mo_ta,
				]
			);
			return true;
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
}

?>