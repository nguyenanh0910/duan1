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
				<div class="col-sm-6">
					<h1>Sửa thông tin tài khoản quản trị: <span style="color: red"><?= $editQuanTri['ho_ten'] ?></h1>
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
							<h3 class="card-title">Form sửa tài khoản</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="<?= ADMIN_BASE_URL . '?act=update-quan-tri' ?>" method="POST">
							<div class="card-body">
								<div class="form-group">
									<input type="hidden" name="id" value="<?= $editQuanTri['id'] ?>">
									<label for="exampleInputEmail1">Họ tên</label>
									<input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ tên"
										value="<?= $editQuanTri['ho_ten'] ?>">
									<?php if (isset($_SESSION['error']['ho_ten'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
									<?php } ?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Email</label>
									<input type="email" class="form-control" name="email" placeholder="Nhập email"
										value="<?= $editQuanTri['email'] ?>">
									<?php if (isset($_SESSION['error']['email'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
									<?php } ?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Số điện thoại</label>
									<input type="text" class="form-control" name="so_dien_thoai" placeholder="Nhập số điện thoại"
										value="<?= $editQuanTri['so_dien_thoai'] ?>">
									<?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
									<?php } ?>
								</div>
								<div class="form-group">
									<label for="">Trạng thái tài khoản</label>
									<select class="form-control form-select" name="trang_thai">
										<option value="1" <?= $editQuanTri['trang_thai'] == 1 ? 'selected' : '' ?>>Kích hoạt</option>
										<option value="2" <?= $editQuanTri['trang_thai'] == 2 ? 'selected' : '' ?>>Hủy kích hoạt</option>
									</select>
									<?php if (isset($_SESSION['error']['trang_thai'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
									<?php } ?>
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="submit" class="btn btn-primary mr-2">Cập nhật</button>
								<a href="<?= ADMIN_BASE_URL . '?act=list-tai-khoan-quan-tri' ?>" class="btn btn-primary">Danh sách tài
									khoản </a>
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