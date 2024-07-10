<?php

class AdminDanhMuc {
	public $conn;

	public function __construct()
	{
		$this->conn = connectDB();
	}
	public function getAllDanhMuc(){
		try {
			$sql = "SELECT * FROM `tb_danhmuc` ";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi" .$e->getMessage();
		}
	}
}

?>