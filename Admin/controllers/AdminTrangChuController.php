<?php
class AdminTrangChuController
{
	public $modelDonHang;
	public $modelSanPham;
	public $modelTaiKhoan;
	public function __construct()
	{
		$this->modelSanPham = new AdminSanPham();
		$this->modelDonHang = new AdminDonHang();
		$this->modelTaiKhoan = new AdminTaiKhoan();
	}
	public function home()
	{
		// tổng doanh thu
		$doanhThu = $this->modelDonHang->getDoanhThu();
		// tổng đơn hàng
		$soDonHang = $this->modelDonHang->getTongDonHang();
		// tổng đơn hàng hoàn
		$soDonHangHoan = $this->modelDonHang->getTongDonHangHoan();
		// tổng sản phẩm
		$soSanPham = $this->modelSanPham->getTongSanPham();
		// Sản phẩm bán chạy
		$sanPhamBanChay = $this->modelSanPham->getBestSellingSanPham();

		// tổng khách hàng
		$soKhachHang = $this->modelTaiKhoan->getTongKhachHang();
		require_once './views/home.php';
		deleteSessionError();
	}
}
?>