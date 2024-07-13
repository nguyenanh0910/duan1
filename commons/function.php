<?php

// Kết nối CSDL qua PDO
function connectDB()
{
	// Kết nối CSDL
	$host = DB_HOST;
	$port = DB_PORT;
	$dbname = DB_NAME;

	try {
		$conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", DB_USERNAME, DB_PASSWORD);

		// cài đặt chế độ báo lỗi là xử lý ngoại lệ
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// cài đặt chế độ trả dữ liệu
		$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

		return $conn;
	} catch (PDOException $e) {
		echo ("Connection failed: " . $e->getMessage());
	}
}
// thêm file
function uploadFile($fileName, $target_dir) {
	// Kiểm tra xem file có tồn tại trong request không
	if (!isset($_FILES[$fileName])) {
			return false; // Không có file trong request
	}

	$file = $_FILES[$fileName];
	$originalName = basename($file['name']);
	$fileName = time() . '_' . $originalName; // Thêm timestamp vào tên file
	$target_file = $target_dir . $fileName;

	// Di chuyển file vào thư mục lưu trữ
	if (move_uploaded_file($file['tmp_name'], $target_file)) {
			return $target_file; // Trả về đường dẫn file đã lưu
	} else {
			return false; // Không thể di chuyển file
	}
}



	/**
	 * Hàm xóa file ảnh từ thư mục và trả về true nếu thành công, false nếu thất bại
	 *
	 * @param string $filePath Đường dẫn đến file ảnh cần xóa
	 * @return bool Trả về true nếu xóa thành công, false nếu thất bại
	 */

	 // xóa file
	function deleteFile($filePath)
	{
		if (file_exists($filePath)) {
			return unlink($filePath); // Xóa file nếu tồn tại
		}
		return false; // File không tồn tại
	}

