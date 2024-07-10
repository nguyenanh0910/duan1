<?php
	class TaiKhoanAdmin{
		public $modelTaiKhoanAdmin;
		public function __construct()
		{
			$this->modelTaiKhoanAdmin = new TaiKhoan();
		}
		public function danhsachTaiKhoanAdmin(){
			$listTaiKhoanAdmin = $this->modelTaiKhoanAdmin->getAllTaiKhoanAdmin();
			require_once './views/taikhoan/TaiKhoan_Admin.php';
		}
	}
	class TaiKhoanUser{
		public $modelTaiKhoanUser;
		public function __construct()
		{
			$this->modelTaiKhoanUser = new TaiKhoan();
		}
		public function danhsachTaiKhoanUser(){
			$listTaiKhoanUser = $this->modelTaiKhoanUser->getAllTaiKhoanUser();
			require_once './views/taikhoan/TaiKhoan_User.php';
		}
	}
?>