<?php
require_once './commons/function.php';
class SanPhamController
{

	public $modelSanPham;
	public $modelDanhMuc;
	public function __construct()
	{
		$this->modelSanPham = new SanPham();
		require_once './models/DanhMuc.php';
		$this->modelDanhMuc = new DanhMuc();
	}
	// public function getDetailSanPhamAjax()
	// {
	// 		if (isset($_GET['id'])) {
	// 				$id = $_GET['id'];
	// 				$sanPham = $this->modelSanPham->getDetailSanPham($id);
	// 				if ($sanPham) {
	// 						echo json_encode([
	// 								'image' => $sanPham['hinh_anh'],
	// 								'name' => $sanPham['ten_san_pham'],
	// 								'description' => $sanPham['mo_ta'],
	// 								'price' => fomartPrice($sanPham['gia_khuyen_mai']),
	// 								'availability' => $sanPham['so_luong'] > 0 ? 'Còn Hàng' : 'Hết hàng',
	// 								'category' => $sanPham['ten_danh_muc']
	// 						]);
	// 				} else {
	// 						echo json_encode(['error' => 'Không tìm thấy sản phẩm.']);
	// 				}
	// 		} else {
	// 				echo json_encode(['error' => 'ID sản phẩm không hợp lệ.']);
	// 		}
	// }
	public function detailSanPham()
	{
		$id = $_GET['id'];
		$sanPham = $this->modelSanPham->getDetailSanPham($id);
		$listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
		$listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
		$danhMuc = $this->modelDanhMuc->getAllDanhMuc();
		$sanPhamCungLoai = $this->modelSanPham->getRelatedSanPham($id);
		if ($sanPham) {
			$this->modelSanPham->updateLuotXem($id);
			// Gọi phương thức trong model để lấy chi tiết danh mục từ CSDL
			require_once './views/sanpham/detailSanPham.php';
		} else {
			header("Location: " . BASE_URL);
			exit();
		}
	}
	public function showSanPham()
	{
		// var_dump($_GET);die;
		// Lấy tất cả các danh mục
		$danhMuc = $this->modelDanhMuc->getAllDanhMuc();

		// Xác định số trang và phần tử bắt đầu
		$limit = 9;
		$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
		$page = ($page < 1) ? 1 : $page; // Đảm bảo số trang không nhỏ hơn 1
		$start = ($page - 1) * $limit;

		// Xác định danh mục ID
		$danh_muc_id = isset($_GET['danh_muc_id']) ? intval($_GET['danh_muc_id']) : 0;

		// Lấy sản phẩm dựa trên danh mục ID hoặc tất cả sản phẩm
		if ($danh_muc_id > 0) {
			$sanPham = $this->modelSanPham->getSanPhamFromDanhMuc($danh_muc_id, $start, $limit);
			$totalSanPham = $this->modelSanPham->getTotalSanPhamFromDanhMuc($danh_muc_id);
		} else {
			$sanPham = $this->modelSanPham->getAllSanPham($start, $limit);
			$totalSanPham = $this->modelSanPham->getTotalSanPham();
		}

		// Tính số trang tổng cộng
		$totalPages = ceil($totalSanPham / $limit);

		// Bao gồm view để hiển thị sản phẩm
		require_once './views/sanpham/listSanPham.php';
	}
	public function cmtSanPham()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$san_pham_id = $_POST['san_pham_id'];
			$tai_khoan_id = $_SESSION['client']['id']; // Giả sử người dùng đã đăng nhập và thông tin tài khoản nằm trong session
			$noi_dung = $_POST['noi_dung'];

			$errors = [];
			if (empty($noi_dung)) {
				$errors['noi_dung'] = "Nội dung không được để trống.";
			}
			$_SESSION['error'] = $errors;
			if (empty($errors)) {
				$status = $this->modelSanPham->insertBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung);
				if ($status) {
					$_SESSION['message2'] = 'Đăng bình luận thành công';
					header("Location: " . BASE_URL . '?act=chi-tiet-san-pham&id=' . $san_pham_id . '&tab=nav-contact');
					exit();
				} else {
					$_SESSION['message2'] = "Thất bại";
					header("Location: " . BASE_URL . '?act=chi-tiet-san-pham&id=' . $san_pham_id . '&tab=nav-contact');
					exit();
				}
			}else {
				$_SESSION['flash'] = false;
				header("Location: " . BASE_URL . '?act=chi-tiet-san-pham&id=' . $san_pham_id . '&tab=nav-contact');
				exit();
			}
		}
	}
}