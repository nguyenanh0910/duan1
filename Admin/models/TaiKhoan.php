<?php

class TaiKhoan {
	public $conn;

	public function __construct()
	{
		$this->conn = connectDB();
	}
	public function getAllTaiKhoanAdmin(){
		try {
			$sql = "SELECT * FROM `tb_taikhoan` INNER JOIN `tb_chucvu` ON `tb_taikhoan`.`id_chuc_vu` = `tb_chucvu`.`id_chuc_vu`  WHERE `tb_taikhoan`.`vai_tro` = 1";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" .$e->getMessage();
		}
	}
	public function getAllTaiKhoanUser(){
		try {
			$sql = "SELECT * FROM `tb_taikhoan` WHERE `tb_taikhoan`.`vai_tro` = 0";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" .$e->getMessage();
		}
	}
}

?>