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
					<h1>Thêm mới sản phẩm</h1>
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
							<h3 class="card-title">Form thêm sản phẩm</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="?act=add-san-pham" method="POST" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputEmail1">Tên sản phẩm</label>
									<input type="text" class="form-control" name="ten_san_pham" placeholder="Nhập tên sản phẩm">
									<?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
									<?php } ?>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Danh mục sản phẩm</label>
										<select class="form-control form-select" name="danh_muc_id">
											<option disabled selected>Chọn danh mục sản phẩm</option>
											<?php foreach ($listDanhMuc as $danhMuc): ?>
												<option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
											<?php endforeach; ?>
										</select>
										<?php if (isset($_SESSION['error']['danh_muc_id'])) { ?>
											<p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
										<?php } ?>
									</div>
									<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Số lượng</label>
										<input type="text" class="form-control" name="so_luong" placeholder="Nhập số lượng sản phẩm">
										<?php if (isset($_SESSION['error']['so_luong'])) { ?>
											<p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
										<?php } ?>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label for="form-group">Ảnh sản phẩm</label>
										<input type="file" class="form-control" name="hinh_anh">
										<?php if (isset($_SESSION['error']['hinh_anh'])) { ?>
											<p class="text-danger"><?= $_SESSION['error']['hinh_anh'] ?></p>
										<?php } ?>
									</div>
									<div class="form-group col-md-6">
										<label for="form-group">Album ảnh sản phẩm</label>
										<input type="file" class="form-control" name="img_array[]" multiple>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Giá sản phẩm</label>
										<input type="text" class="form-control" name="gia_san_pham" placeholder="Nhập giá sản phẩm">
										<?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>
											<p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
										<?php } ?>
									</div>
									<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Giá khuyến mãi</label>
										<input type="text" class="form-control" name="gia_khuyen_mai" placeholder="Nhập giá khuyến mãi">
										<?php if (isset($_SESSION['error']['gia_khuyen_mai'])) { ?>
											<p class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></p>
										<?php } ?>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Ngày nhập</label>
										<input type="date" class="form-control" name="ngay_nhap">
										<?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>
											<p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
										<?php } ?>
									</div>
									<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Trạng thái sản phẩm</label>
										<select class="form-control form-select" name="trang_thai">
											<option disabled selected>Chọn trạng thái sản phẩm</option>
											<option value="1">Còn bán</option>
											<option value="2">Dừng bán</option>
										</select>
										<?php if (isset($_SESSION['error']['trang_thai'])) { ?>
											<p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
										<?php } ?>
									</div>
								</div>
								<div class="form-group">
									<label for="exampleDescription">Mô tả</label>
									<textarea class="form-control" name="mo_ta" rows="5" placeholder="Nhập mô tả ở đây"></textarea>
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer ">
								<button type="submit" class="btn btn-primary mr-2">Thêm mới</button>
								<a href="<?= ADMIN_BASE_URL . '?act=list-san-pham' ?>" class="btn btn-primary">Danh sách sản phẩm</a>
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