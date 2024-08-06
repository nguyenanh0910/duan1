<?php
require_once '../commons/function.php';
class AdminSanPhamController
{

	public $modelSanPham;
	public $modelDanhMuc;
	public function __construct()
	{
		$this->modelSanPham = new AdminSanPham();
		require_once './models/AdminDanhMuc.php';
		$this->modelDanhMuc = new AdminDanhMuc();
	}
	public function listSanPham()
	{
		$listSanPham = $this->modelSanPham->getAllSanPham();
		require_once './views/sanpham/listSanPham.php';
	}
	public function formaddSanPham()
	{
		$listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
		require_once './views/SanPham/addSanPham.php';
		deleteSessionError();
	}
	// thêm sản phẩm
	public function addSanPham()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$ten_san_pham = $_POST['ten_san_pham'] ?? '';
			$gia_san_pham = $_POST['gia_san_pham'] ?? '';
			$gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
			$so_luong = $_POST['so_luong'] ?? '';
			$ngay_nhap = $_POST['ngay_nhap'] ?? '';
			$mo_ta = $_POST['mo_ta'] ?? '';
			$danh_muc_id = $_POST['danh_muc_id'] ?? '';
			$trang_thai = $_POST['trang_thai'] ?? '';

			// hình ảnh
			$hinh_anh = $_FILES['hinh_anh'] ?? null;
			$file_thumb = uploadFile($hinh_anh, './uploads/');

			// album ảnh
			$img_array = $_FILES['img_array'];
			// Validate dữ liệu
			$errors = [];

			// Kiểm tra rỗng
			if (empty($ten_san_pham)) {
				$errors['ten_san_pham'] = "Tên sản phẩm không được để trống.";
			}
			if (empty($gia_san_pham)) {
				$errors['gia_san_pham'] = "Giá sản phẩm không được để trống.";
			}
			if (empty($gia_khuyen_mai)) {
				$errors['gia_khuyen_mai'] = "Giá khuyến mãi không được để trống.";
			}
			if (empty($so_luong)) {
				$errors['so_luong'] = "Số lượng sản phẩm không được để trống.";
			}
			if (empty($ngay_nhap)) {
				$errors['ngay_nhap'] = "Ngày nhập sản phẩm không được để trống.";
			}
			if (empty($danh_muc_id)) {
				$errors['danh_muc_id'] = "Danh mục sản phẩm không được để trống.";
			}
			if (empty($trang_thai)) {
				$errors['trang_thai'] = "Trạng thái sản phẩm không được để trống.";
			}
			if ($hinh_anh['error'] !== 0) {
				$errors['hinh_anh'] = "Phải chọn ảnh sản phẩm";
			}
			$_SESSION['error'] = $errors;
			if (empty($errors)) {
				// Gọi phương thức trong model để thêm sản phẩm vào cơ sở dữ liệu
				$id = $this->modelSanPham->insertSanPham($ten_san_pham, $file_thumb, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $mo_ta, $trang_thai);
				// xử lý thêm album ảnh sản phẩm img_array
				if (!empty($img_array['name'])) {
					foreach ($img_array['name'] as $key => $value) {
						$file = [
							'name' => $img_array['name'][$key],
							'type' => $img_array['type'][$key],
							'tmp_name' => $img_array['tmp_name'][$key],
							'error' => $img_array['error'][$key],
							'size' => $img_array['size'][$key],
						];
						$link_anh = uploadFile($file, './uploads/');
						$this->modelSanPham->insertAlbumAnhSanPham($id, $link_anh);
					}
				}
				header("Location: " . ADMIN_BASE_URL . '?act=list-san-pham');
				exit();
			} else {
				$_SESSION['flash'] = true;
				header("Location: " . ADMIN_BASE_URL . '?act=form-add-san-pham');
				exit();
			}
		}
	}

	// xóa sản phẩm 
	public function deleteSanPham()
	{
		$id = $_GET['id'];
		$sanPham = $this->modelSanPham->getDetailSanPham($id);
		$listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
		if ($sanPham) {
			deleteFile($sanPham['hinh_anh']);
			if ($listAnhSanPham) {
				foreach ($listAnhSanPham as $key => $anhSP) {
					deleteFile($anhSP['link_anh']);
					$this->modelSanPham->destroyAnhSanPham($anhSP['id']);
				}
			}
			$this->modelSanPham->deleteSanPham($id);
		}
		header("Location: " . ADMIN_BASE_URL . '?act=list-san-pham');
		exit();
	}

	// // Sửa sản phẩm
	public function formEditSanPham()
	{
		$id = $_GET['id'];
		$editSanPham = $this->modelSanPham->getDetailSanPham($id);
		// var_dump($editSanPham);die;
		$listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
		$listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
		if ($editSanPham) {
			require_once './views/sanpham/editSanPham.php';
			// xóa session sau khi load trang
			deleteSessionError();
		} else {
			header("Location: " . ADMIN_BASE_URL . '?act=list-san-pham');
			exit();
		}
	}

	public function updateSanPham()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Lấy dữ liệu
			// Lấy dữ liệu cũ của sản phẩm
			$id = $_POST['id'] ?? '';
			$sanPhamOld = $this->modelSanPham->getDetailSanPham($id);
			$old_file = $sanPhamOld['hinh_anh'] ?? ''; // lấy ảnh cũ để phục vụ cho sửa ảnh

			$ten_san_pham = $_POST['ten_san_pham'] ?? '';
			$gia_san_pham = $_POST['gia_san_pham'] ?? '';
			$gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
			$so_luong = $_POST['so_luong'] ?? '';
			$ngay_nhap = $_POST['ngay_nhap'] ?? '';
			$mo_ta = $_POST['mo_ta'] ?? '';
			$danh_muc_id = $_POST['danh_muc_id'] ?? '';
			$trang_thai = $_POST['trang_thai'] ?? '';
			// hình ảnh
			$hinh_anh = $_FILES['hinh_anh'] ?? null;

			// Validate dữ liệu
			$errors = [];

			// Kiểm tra rỗng
			if (empty($ten_san_pham)) {
				$errors['ten_san_pham'] = "Tên sản phẩm không được để trống.";
			}
			if (empty($gia_san_pham)) {
				$errors['gia_san_pham'] = "Giá sản phẩm không được để trống.";
			}
			if (empty($gia_khuyen_mai)) {
				$errors['gia_khuyen_mai'] = "Giá khuyến mãi không được để trống.";
			}
			if (empty($so_luong)) {
				$errors['so_luong'] = "Số lượng sản phẩm không được để trống.";
			}
			if (empty($ngay_nhap)) {
				$errors['ngay_nhap'] = "Ngày nhập sản phẩm không được để trống.";
			}
			if (empty($danh_muc_id)) {
				$errors['danh_muc_id'] = "Danh mục sản phẩm không được để trống.";
			}
			if (empty($trang_thai)) {
				$errors['trang_thai'] = "Trạng thái sản phẩm không được để trống.";
			}
			$_SESSION['error'] = $errors;

			// logic sửa ảnh
			if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
				// upload ảnh mới lên
				$new_file = uploadFile($hinh_anh, './uploads/');
				if (!empty($old_file)) { // nếu có ảnh cũ thì xóa đi
					deleteFile($old_file);
				}
			} else {
				$new_file = $old_file;
			}
			if (empty($errors)) {
				// Gọi phương thức trong model để thêm sản phẩm vào cơ sở dữ liệu
				$test = $this->modelSanPham->updateSanPham($id, $ten_san_pham, $new_file, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $mo_ta, $trang_thai);
				// var_dump($test); die;
				header("Location: " . ADMIN_BASE_URL . '?act=list-san-pham');
				exit();
			} else {
				$_SESSION['flash'] = true;
				header("Location: " . ADMIN_BASE_URL . '?act=form-edit-san-pham&id=' . $id);
				exit();
			}
		}
	}

	// Sửa album ảnh

	public function editAlbumAnhSanPham()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$san_pham_id = $_POST['san_pham_id'] ?? '';

			// lấy danh sách ảnh hiện tại của sản phẩm
			$listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);

			// xử lý các ảnh được gửi từ form
			$img_array = $_FILES['img_array'];
			$img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
			$current_img_ids = $_POST['current_img_ids'] ?? [];

			// khai báo mảng để lưu ảnh thêm mới hoặc thay thế cũ
			$upload_file = [];

			// Upload ảnh mới hoặc thay thế ảnh cũ
			foreach ($img_array['name'] as $key => $value) {
				if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
					$new_file = uploadFileAlbum($img_array, './uploads/', $key);
					if ($new_file) {
						$upload_file[] = [
							'id' => $current_img_ids[$key] ?? null,
							'file' => $new_file
						];
					}
				}
			}
			// lưu ảnh mới vào db và xóa ảnh cũ nếu có
			foreach ($upload_file as $file_info) {
				if ($file_info['id']) {
					$old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_anh'];


					// Cập nhật ảnh cũ
					$this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);

					// xóa ảnh cũ
					deleteFile($old_file);
				} else {
					$this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
				}
			}

			// xử lý xóa ảnh
			foreach ($listAnhSanPhamCurrent as $anhSP) {
				$id = $anhSP['id'];
				if (in_array($id, $img_delete)) {
					// xóa ảnh trong db
					$this->modelSanPham->destroyAnhSanPham($id);

					// xóa file
					deleteFile($anhSP['link_anh']);
				}
			}
			header("Location: " . ADMIN_BASE_URL . '?act=form-edit-san-pham&id=' . $san_pham_id);
			exit();
		}
	}
	public function detailSanPham()
	{
		$id = $_GET['id'];
		$sanPham = $this->modelSanPham->getDetailSanPham($id);
		$listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
		$listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
		if ($sanPham) {
			$id = $_GET['id'];
			// Gọi phương thức trong model để lấy chi tiết danh mục từ CSDL
			require_once './views/sanpham/detailSanPham.php';
		} else {
			header("Location: " . ADMIN_BASE_URL . '?act=list-san-pham');
			exit();
		}
	}
	public function updateTrangThaiBinhLuan()
	{
		$id = $_POST['id'];
		$name_view = $_POST['name_view'];
		$binhLuan = $this->modelSanPham->getDetailBinhLuan($id);
		if ($binhLuan) {
			$trang_thai_update = '';
			if ($binhLuan['trang_thai'] == 1) {
				$trang_thai_update = 2;
			} else {
				$trang_thai_update = 1;
			}
			$status = $this->modelSanPham->updateTrangThaiBinhLuan($id, $trang_thai_update);
			if ($status) {
				if ($name_view == 'detail_khach') {
					header("Location: " . ADMIN_BASE_URL . '?act=detail-khach-hang&id=' . $binhLuan['tai_khoan_id']);
					exit();
				}else{
					header("Location: " . ADMIN_BASE_URL . '?act=detail-san-pham&id=' . $binhLuan['san_pham_id']);
					exit();
				}
			}
		}
	}
}
?>