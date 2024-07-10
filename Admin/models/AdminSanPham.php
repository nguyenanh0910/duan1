<?php

class AdminSanPham {
	public $conn;

	public function __construct()
	{
		$this->conn = connectDB();
	}
	public function getAllSanPham(){
		try {
			$sql = "SELECT * FROM `tb_sanpham` INNER JOIN `tb_danhmuc` ON `tb_sanpham`.`id_danh_muc` = `tb_danhmuc`.`id_danh_muc`";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" .$e->getMessage();
		}
	}
}

?>