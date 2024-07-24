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
					<h1>Sửa danh mục sản phẩm: <span style="color: red"><?= $editDanhMuc['ten_danh_muc'] ?></h1>
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
							<h3 class="card-title">Form sửa danh mục</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="<?= ADMIN_BASE_URL . '?act=update-danh-muc' ?>" method="POST">
							<input type="hidden" name="id_danh_muc" value="<?= $editDanhMuc['id_danh_muc'] ?>">
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputEmail1">Tên danh mục</label>
									<input type="text" class="form-control" name="ten_danh_muc" placeholder="Nhập tên danh mục"
										value="<?= $editDanhMuc['ten_danh_muc'] ?>">
									<?php if (isset($_SESSION['error']['ten_danh_muc'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['ten_danh_muc'] ?></p>
									<?php } ?>
								</div>
								<div class="form-group">
									<label for="exampleDescription">Mô tả</label>
									<textarea class="form-control" name="mo_ta" rows="5"
										placeholder="Nhập mô tả ở đây"><?= $editDanhMuc['mo_ta'] ?></textarea>
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer ">
								<button type="submit" class="btn btn-primary mr-2" name="btn_edit">Cập nhật</button>
								<a href="<?= ADMIN_BASE_URL . '?act=list-danh-muc' ?>" class="btn btn-primary">Danh sách danh mục</a>
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