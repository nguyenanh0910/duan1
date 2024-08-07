<?php

class GioHang
{
	public $conn;

	public function __construct()
	{
		$this->conn = connectDB();
	}
	public function addToCart($san_pham_id, $so_luong, $tai_khoan_id)
	{
			try {
					// Kiểm tra xem số lượng sản phẩm trong kho có đủ không
					$sql = "SELECT so_luong FROM tb_sanpham WHERE id = :san_pham_id";
					$stmt = $this->conn->prepare($sql);
					$stmt->execute([':san_pham_id' => $san_pham_id]);
					$san_pham = $stmt->fetch();
	
					if (!$san_pham || $san_pham['so_luong'] < $so_luong) {
							throw new Exception("Số lượng sản phẩm không đủ");
					}
	
					// Kiểm tra xem người dùng đã có giỏ hàng chưa
					$sql = "SELECT * FROM tb_giohang WHERE tai_khoan_id = :tai_khoan_id";
					$stmt = $this->conn->prepare($sql);
					$stmt->execute([':tai_khoan_id' => $tai_khoan_id]);
	
					if ($stmt->rowCount() > 0) {
							// Lấy ID giỏ hàng
							$gio_hang = $stmt->fetch();
							$gio_hang_id = $gio_hang['id'];
					} else {
							// Tạo giỏ hàng mới
							$sql = "INSERT INTO tb_giohang (tai_khoan_id) VALUES (:tai_khoan_id)";
							$stmt = $this->conn->prepare($sql);
							$stmt->execute([':tai_khoan_id' => $tai_khoan_id]);
							$gio_hang_id = $this->conn->lastInsertId(); // Lấy ID giỏ hàng mới tạo
					}
	
					// Kiểm tra sản phẩm đã có trong giỏ hàng chưa
					$sql = "SELECT * FROM tb_chitietgiohang WHERE gio_hang_id = :gio_hang_id AND san_pham_id = :san_pham_id";
					$stmt = $this->conn->prepare($sql);
					$stmt->execute([
							':gio_hang_id' => $gio_hang_id,
							':san_pham_id' => $san_pham_id
					]);
	
					if ($stmt->rowCount() > 0) {
							// Lấy số lượng hiện tại trong giỏ hàng
							$chi_tiet_gio_hang = $stmt->fetch();
							$so_luong_hien_tai = $chi_tiet_gio_hang['so_luong'];
	
							// Kiểm tra số lượng tổng sau khi thêm
							if ($so_luong_hien_tai + $so_luong > $san_pham['so_luong']) {
									throw new Exception("Số lượng sản phẩm không đủ");
							}
	
							// Cập nhật số lượng sản phẩm nếu đã có
							$sql = "UPDATE tb_chitietgiohang SET so_luong = so_luong + :so_luong WHERE gio_hang_id = :gio_hang_id AND san_pham_id = :san_pham_id";
					} else {
							// Kiểm tra số lượng tổng sau khi thêm
							if ($so_luong > $san_pham['so_luong']) {
									throw new Exception("Số lượng sản phẩm không đủ");
							}
	
							// Thêm sản phẩm mới vào giỏ hàng
							$sql = "INSERT INTO tb_chitietgiohang (gio_hang_id, san_pham_id, so_luong) VALUES (:gio_hang_id, :san_pham_id, :so_luong)";
					}
	
					$stmt = $this->conn->prepare($sql);
					$result = $stmt->execute([
							':gio_hang_id' => $gio_hang_id,
							':san_pham_id' => $san_pham_id,
							':so_luong' => $so_luong
					]);
	
					return $result;
			} catch (Exception $e) {
					echo "Lỗi: " . $e->getMessage();
					return false;
			}
	}
	
	public function getCartItems($tai_khoan_id){
		try {
			$sql = "SELECT tb_chitietgiohang.* , tb_sanpham.gia_khuyen_mai, tb_sanpham.ten_san_pham, tb_sanpham.hinh_anh
							FROM tb_chitietgiohang
							JOIN tb_sanpham ON tb_chitietgiohang.san_pham_id = tb_sanpham.id
							JOIN tb_giohang ON tb_chitietgiohang.gio_hang_id = tb_giohang.id
							WHERE tb_giohang.tai_khoan_id = :tai_khoan_id ";
			// var_dump($sql); die;
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':tai_khoan_id'=>$tai_khoan_id]);
			return $stmt->fetchAll();
		} catch (Exception $e) {
			echo "Lỗi: " . $e->getMessage();
			return false;
		}
	}
	public function updateSoLuongSP($san_pham_id, $so_luong, $tai_khoan_id) {
    try {
        // Câu lệnh SQL để cập nhật số lượng sản phẩm trong giỏ hàng
        $sql = "UPDATE tb_chitietgiohang
                SET so_luong = :so_luong
                WHERE san_pham_id = :san_pham_id AND gio_hang_id = (
                    SELECT id FROM tb_giohang WHERE tai_khoan_id = :tai_khoan_id
                )";
                
        // Chuẩn bị câu lệnh
        $stmt = $this->conn->prepare($sql);
        
        // Thực thi câu lệnh với tham số
        $stmt->execute([
            ':san_pham_id' => $san_pham_id,
            ':so_luong' => $so_luong,
            ':tai_khoan_id' => $tai_khoan_id
        ]);

        // Kiểm tra số lượng hàng bị ảnh hưởng
        $rowsAffected = $stmt->rowCount();
        if ($rowsAffected > 0) {
            return true; // Cập nhật thành công
        } else {
            // Không có hàng nào bị ảnh hưởng, có thể là do không tìm thấy giỏ hàng hoặc sản phẩm
            return false;
        }
    } catch (Exception $e) {
        // Hiển thị thông báo lỗi
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}
public function getDetailGioHang($id)
{
	try {
		$sql = "SELECT * FROM tb_chitietgiohang WHERE id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute([':id' => $id]);
		return $stmt->fetch();
	} catch (Exception $e) {
		echo "Lỗi" . $e->getMessage();
		return false;
	}
}
public function deleteCart($id)
	{
		try {
			$sql = "DELETE FROM tb_chitietgiohang WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute([':id' => $id]);
			return true;
		} catch (Exception $e) {
			echo "Lỗi" . $e->getMessage();
			return false;
		}
	}
	public function clearCart($tai_khoan_id)
{
    try {
        // Xóa tất cả sản phẩm trong giỏ hàng của người dùng
        $sql = "DELETE FROM tb_chitietgiohang WHERE gio_hang_id IN (
                    SELECT id FROM tb_giohang WHERE tai_khoan_id = :tai_khoan_id
                )";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':tai_khoan_id' => $tai_khoan_id]);

        // Xóa giỏ hàng chính
        $sql = "DELETE FROM tb_giohang WHERE tai_khoan_id = :tai_khoan_id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':tai_khoan_id' => $tai_khoan_id]);

        return true;
    } catch (Exception $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}

}