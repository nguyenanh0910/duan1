<?php

class AdminDanhMuc
{
	public $conn;

	public function __construct()
	{
		$this->conn = connectDB();
	}
	public function index()
	{
		try {
			
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
}
	?>