<!-- Header -->
<?php include './views/layout/header.php'; ?>
<!-- End header  -->

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- End navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>
<!-- End sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-12">
					<h1>Chỉnh sửa thông tin đơn hàng: <span style="color: red"><?= $donHang['ma_don_hang'] ?></h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-12">
					<!-- general form elements -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Form sửa đơn hàng</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="<?= ADMIN_BASE_URL . '?act=update-don-hang' ?>" method="POST">
							<input type="hidden" name="id_don_hang" value="<?= $donHang['id_don_hang'] ?>">
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputEmail1">Tên người nhận</label>
									<input type="text" class="form-control" name="ten_nguoi_nhan" placeholder="Nhập tên người nhận"
										value="<?= $donHang['ten_nguoi_nhan'] ?>">
									<?php if (isset($_SESSION['error']['ten_nguoi_nhan'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['ten_nguoi_nhan'] ?></p>
									<?php } ?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Số điện thoại người nhận</label>
									<input type="text" class="form-control" name="sdt_nguoi_nhan"
										placeholder="Nhập số điện thoại người nhận" value="<?= $donHang['sdt_nguoi_nhan'] ?>">
									<?php if (isset($_SESSION['error']['sdt_nguoi_nhan'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['sdt_nguoi_nhan'] ?></p>
									<?php } ?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Email người nhận</label>
									<input type="text" class="form-control" name="email_nguoi_nhan" placeholder="Nhập email người nhận"
										value="<?= $donHang['email_nguoi_nhan'] ?>">
									<?php if (isset($_SESSION['error']['email_nguoi_nhan'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['email_nguoi_nhan'] ?></p>
									<?php } ?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Địa chỉ người nhận</label>
									<input type="text" class="form-control" name="dia_chi_nguoi_nhan"
										placeholder="Nhập địa chỉ người nhận" value="<?= $donHang['dia_chi_nguoi_nhan'] ?>">
									<?php if (isset($_SESSION['error']['dia_chi_nguoi_nhan'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['dia_chi_nguoi_nhan'] ?></p>
									<?php } ?>
								</div>
								<div class="form-group">
									<label for="exampleDescription">Ghi chú</label>
									<textarea class="form-control" name="ghi_chu" rows="5"
										placeholder="Nhập ghi chú ở đây"><?= $donHang['ghi_chu'] ?></textarea>
								</div>
								<hr>
								<div class="form-group">
									<label for="">Trạng thái đơn hàng</label>
									<select class="form-control form-select" name="id_trang_thai_dh">
										<?php foreach ($listTrangThaiDonHang as $trangThai): ?>
											<option 
											<?php
												if ($donHang['id_trang_thai_dh'] > $trangThai['id_trang_thai_dh']
														|| $donHang['id_trang_thai_dh'] == 9
														|| $donHang['id_trang_thai_dh'] == 10
														|| $donHang['id_trang_thai_dh'] == 11)
												 {
													echo 'disabled';
												}
											?>
											<?= $trangThai['id_trang_thai_dh'] == $donHang['id_trang_thai_dh'] ? 'selected' : '' ?>
												value="<?= $trangThai['id_trang_thai_dh'] ?>">
												<?= $trangThai['ten_trang_thai'] ?>
											</option>
										<?php endforeach; ?>
									</select>
									<?php if (isset($_SESSION['error']['id_trang_thai_dh'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['id_trang_thai_dh'] ?></p>
									<?php } ?>
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer ">
								<button type="submit" class="btn btn-primary mr-2" name="btn_edit">Cập nhật</button>
								<a href="<?= ADMIN_BASE_URL . '?act=list-don-hang' ?>" class="btn btn-primary">Danh sách đơn hàng</a>
							</div>
						</form>
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Footer  -->
<?php include './views/layout/footer.php'; ?>
<!-- End footer  -->
<!-- Page specific script -->
</body>

</html>