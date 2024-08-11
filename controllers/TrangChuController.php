<?php
require_once './commons/function.php';

class TrangChuController
{

	public $modelSanPham;
	public $modelDanhMuc;
	public function __construct()
	{
		$this->modelSanPham = new SanPham();
		$this->modelDanhMuc = new DanhMuc();
	}
	public function home()
	{

		$sanPhamNew = $this->modelSanPham->getNewSanPham();
		$sanPhamBanChay = $this->modelSanPham->getBestSellingSanPham();
		$danhMuc = $this->modelDanhMuc->getAllDanhMuc();
		require_once './views/home.php';
	}
	public function formLienHe()
	{
		require_once './views/lienHe.php';
		deleteSessionError();
		
	}
	public function formGioiThieu()
	{
		require_once './views/gioithieu.php';
		deleteSessionError();
		
	}
	
}