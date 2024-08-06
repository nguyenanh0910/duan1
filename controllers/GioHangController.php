<?php
class GioHangController
{
	public $modelGioHang;
	public function __construct()
	{
		$this->modelGioHang = new GioHang();
	}
	public function showGioHang()
	{
		require_once './views/giohang/gioHang.php';
		deleteSessionError();
	}
}