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
					<h1>Sửa thông tin tài khoản</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>


	<!-- Main content -->
	<section class="content">
		<hr>
		<div class="row">
			<!-- edit form column -->
			<div class="col-md-12 personal-info">
				<h3 class="text-center pb-3">Thông tin cá nhân</h3>
				<?php if (isset($_SESSION['success'])) { ?>
					<div class="alert alert-info alert-dismissable">
						<a class="panel-close close" data-dismiss="alert">×</a>
						<i class="fas fa-check-circle mr-2"></i>
						<?= $_SESSION['success'] ?>
					</div>
					<?php unset($_SESSION['success']); // Xóa thông báo khỏi session ?>
				<?php } ?>
				<!-- Form chỉnh sửa thông tin cá nhân và upload ảnh -->
				<form action="<?= ADMIN_BASE_URL . '?act=update-thong-tin-ca-nhan-quan-tri' ?>" method="post"
					enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?= $thongTin['id'] ?>" style=" opacity: 0; width: 0px;">
					<div class="row">
						<!-- left column (upload ảnh) -->
						<div class="col-md-3">
							<div class="text-center">
								<label for="file-input">
									<input id="file-input" type="file" name="anh_dai_dien" style=" opacity: 0; width: 0px;">
									<img class="avatar" id="img-preview" onload="showToast()"
										src="<?= BASE_URL . $thongTin['anh_dai_dien'] ?>"
										onerror="this.onerror = null; this.src='https://cdn.icon-icons.com/icons2/589/PNG/256/icontexto-user-web20-delicious_icon-icons.com_55375.png'">
									<p>Ảnh đại diện</p>
								</label>
							</div>
						</div>
						<!-- edit form column -->
						<div class="col-md-9">
							<div class="form-group">
								<label class="col-lg-3 control-label">Họ tên:</label>
								<div class="col-lg-12">
									<input class="form-control" type="text" name="ho_ten" value="<?= $thongTin['ho_ten'] ?>">
									<?php if (isset($_SESSION['error']['ho_ten'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
									<?php } ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Email:</label>
								<div class="col-lg-12">
									<input class="form-control" type="email" name="email" value="<?= $thongTin['email'] ?>">
									<?php if (isset($_SESSION['error']['email'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
									<?php } ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Số điện thoại:</label>
								<div class="col-lg-12">
									<input class="form-control" type="text" name="so_dien_thoai"
										value="<?= $thongTin['so_dien_thoai'] ?>">
									<?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
									<?php } ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Ngày sinh</label>
								<div class="col-lg-12">
									<input type="date" class="form-control" name="ngay_sinh" placeholder="Nhập ngày sinh"
										value="<?= $thongTin['ngay_sinh'] ?>">
									<?php if (isset($_SESSION['error']['ngay_sinh'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></p>
									<?php } ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Giới tính</label>
								<div class="col-lg-12">
									<select class="form-control form-select" name="gioi_tinh">
										<option value="1" <?= $thongTin['gioi_tinh'] == 1 ? 'selected' : '' ?>>Nam</option>
										<option value="2" <?= $thongTin['gioi_tinh'] == 2 ? 'selected' : '' ?>>Nữ</option>
									</select>
									<?php if (isset($_SESSION['error']['gioi_tinh'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['gioi_tinh'] ?></p>
									<?php } ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Địa chỉ:</label>
								<div class="col-lg-12">
									<input class="form-control" type="text" name="dia_chi" value="<?= $thongTin['dia_chi'] ?>">
									<?php if (isset($_SESSION['error']['dia_chi'])) { ?>
										<p class="text-danger"><?= $_SESSION['error']['dia_chi'] ?></p>
									<?php } ?>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label"></label>
								<div class="col-md-12">
									<input type="submit" class="btn btn-primary" value="Cập nhật">
								</div>
							</div>
						</div>
					</div>
				</form>
				<hr>
				<h3 class="pb-3">Đổi mật khẩu</h3>
				<?php if (isset($_SESSION['success'])) { ?>
					<div class="alert alert-info alert-dismissable">
						<a class="panel-close close" data-dismiss="alert">×</a>
						<i class="fas fa-lock mr-2"></i>
						<?= $_SESSION['success'] ?>
					</div>
					<?php unset($_SESSION['success']); // Xóa thông báo khỏi session ?>
				<?php } ?>
				<form action="<?= ADMIN_BASE_URL . '?act=update-mat-khau-ca-nhan-quan-tri' ?>" method="post">
					<div class="form-group">
						<label class="col-md-3 control-label">Mật khẩu cũ:</label>
						<div class="col-md-12">
							<input class="form-control" type="password" name="old_pass">
							<?php if (isset($_SESSION['error']['old_pass'])) { ?>
								<p class="text-danger"><?= $_SESSION['error']['old_pass'] ?></p>
							<?php } ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Mật khẩu mới:</label>
						<div class="col-md-12">
							<input class="form-control" type="password" name="new_pass">
							<?php if (isset($_SESSION['error']['new_pass'])) { ?>
								<p class="text-danger"><?= $_SESSION['error']['new_pass'] ?></p>
							<?php } ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">Xác nhận mật khẩu mới:</label>
						<div class="col-md-12">
							<input class="form-control" type="password" name="confirm_pass">
							<?php if (isset($_SESSION['error']['confirm_pass'])) { ?>
								<p class="text-danger"><?= $_SESSION['error']['confirm_pass'] ?></p>
							<?php } ?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"></label>
						<div class="col-md-12">
							<input type="submit" class="btn btn-primary" value="Lưu mật khẩu">
						</div>
					</div>
				</form>
			</div>
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
<style>
	.avatar {
		width: 200px;
		border-radius: 999px;
		outline: 2px solid var(--primary);
		cursor: pointer;
		transition: 200ms ease-in-out;

		/* prevents uploaded image from distortion: */
		aspect-ratio: 1;
		object-fit: cover;
	}

	.avatar:hover {
		outline: 5px solid var(--primary);
	}
</style>
<script>
	const fileInput = document.getElementById("file-input");
	const imagePreview = document.getElementById("img-preview");
	const toast = document.getElementById("toast");

	fileInput.addEventListener("change", (e) => {
		if (e.target.files.length) {
			const src = URL.createObjectURL(e.target.files[0]);
			imagePreview.src = src;
			showToast();
		}
	});

	function showToast() {
		toast.classList.add("show");
		setTimeout(() => toast.classList.remove("show"), 3000);
	}
</script>

</html>