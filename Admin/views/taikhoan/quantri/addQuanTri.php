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
					<h1>Thêm mới tài khoản quản trị</h1>
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
							<h3 class="card-title">Form thêm tài khoản</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="<?= ADMIN_BASE_URL . '?act=add-quan-tri' ?>" method="POST">
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputEmail1">Họ tên</label>
									<input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ tên">
									<?php if (isset($_SESSION['error']['ho_ten'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
									<?php } ?>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Email</label>
									<input type="email" class="form-control" name="email" placeholder="Nhập email">
									<?php if (isset($_SESSION['error']['email'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
									<?php } ?>
								</div>

							</div>
							<!-- /.card-body -->

							<div class="card-footer">
								<button type="submit" class="btn btn-primary mr-2">Thêm mới</button>
								<a href="<?= ADMIN_BASE_URL . '?act=list-tai-khoan-quan-tri' ?>" class="btn btn-primary">Danh sách tài khoản</a>
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