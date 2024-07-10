<?php
	class AdminSanPhamController{
		public $modelSanPham;
		public function __construct()
		{
			$this->modelSanPham = new AdminSanPham();
		}
		public function danhsachSanPham(){
			$listSanPham = $this->modelSanPham->getAllSanPham();
			require_once './views/sanpham/SanPham.php';
		}
	}
?>