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
				<div class="col-sm-11">
					<h1>Sửa thông tin sản phẩm: <span style="color: red"><?= $editSanPham['ten_san_pham'] ?></span> </h1>
				</div>
				<div class="col-sm-1">
					<a href="<?= ADMIN_BASE_URL . '?act=list-san-pham' ?>" class="btn btn-secondary"><i
							class="fas fa-arrow-right	"></i></a>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-8">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Thông tin sản phẩm</h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
					<form action="<?= ADMIN_BASE_URL . '?act=update-san-pham' ?>" method="post" enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group">
								<input type="hidden" name="id" value="<?= $editSanPham['id'] ?>">
								<label for="">Danh mục sản phẩm</label>
								<select class="form-control form-select" name="danh_muc_id">
									<option disabled selected>Chọn danh mục sản phẩm</option>
									<?php foreach ($listDanhMuc as $danhMuc): ?>
										<option value="<?= $danhMuc['id'] ?>" <?= $danhMuc['id'] == $editSanPham['danh_muc_id'] ? 'selected' : '' ?>><?= $danhMuc['ten_danh_muc'] ?></option>
									<?php endforeach; ?>
								</select>
								<?php if (isset($_SESSION['error']['danh_muc_id'])) { ?>
									<p class="text-danger"><?= $_SESSION['error']['danh_muc_id'] ?></p>
								<?php } ?>
							</div>
							<div class="form-group">
								<label for="">Tên sản phẩm</label>
								<input type="text" name="ten_san_pham" class="form-control" value="<?= $editSanPham['ten_san_pham'] ?>">
								<?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
									<p class="text-danger"><?= $_SESSION['error']['ten_san_pham'] ?></p>
								<?php } ?>
							</div>
							<div class="form-group">
								<label for="">Ảnh sản phẩm</label>
								<input type="file" name="hinh_anh" class="form-control">
							</div>
							<div class="form-group">
								<label for="">Số lượng sản phẩm</label>
								<input type="text" name="so_luong" class="form-control" value="<?= $editSanPham['so_luong'] ?>">
								<?php if (isset($_SESSION['error']['so_luong'])) { ?>
									<p class="text-danger"><?= $_SESSION['error']['so_luong'] ?></p>
								<?php } ?>
							</div>
							<div class="form-group">
								<label for="">Giá sản phẩm</label>
								<input type="text" name="gia_san_pham" class="form-control" value="<?= $editSanPham['gia_san_pham'] ?>">
								<?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>
									<p class="text-danger"><?= $_SESSION['error']['gia_san_pham'] ?></p>
								<?php } ?>
							</div>
							<div class="form-group">
								<label for="">Giá khuyến mãi</label>
								<input type="text" name="gia_khuyen_mai" class="form-control"
									value="<?= $editSanPham['gia_khuyen_mai'] ?>">
								<?php if (isset($_SESSION['error']['gia_khuyen_mai'])) { ?>
									<p class="text-danger"><?= $_SESSION['error']['gia_khuyen_mai'] ?></p>
								<?php } ?>
							</div>
							<div class="form-group">
								<label for="">Ngày nhập</label>
								<input type="date" name="ngay_nhap" class="form-control" value="<?= $editSanPham['ngay_nhap'] ?>">
								<?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>
									<p class="text-danger"><?= $_SESSION['error']['ngay_nhap'] ?></p>
								<?php } ?>
							</div>
							<div class="form-group">
								<label for="">Trạng thái sản phẩm</label>
								<select class="form-control form-select" name="trang_thai">
									<option disabled selected>Chọn trạng thái sản phẩm</option>
									<option value="1" <?= $editSanPham['trang_thai'] == 1 ? 'selected' : '' ?>>Còn bán</option>
									<option value="2" <?= $editSanPham['trang_thai'] == 2 ? 'selected' : '' ?>>Dừng bán</option>
								</select>
								<?php if (isset($_SESSION['error']['trang_thai'])) { ?>
									<p class="text-danger"><?= $_SESSION['error']['trang_thai'] ?></p>
								<?php } ?>
							</div>
							<div class="form-group">
								<label for="">Mô tả</label>
								<textarea class="form-control" name="mo_ta" rows="5"
									placeholder="Nhập mô tả ở đây"><?= $editSanPham['mo_ta'] ?></textarea>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer text-center">
							<button type="submit" class="btn btn-primary">Sửa thông tin</button>
						</div>
				</div>
				</form>
				<!-- /.card -->
			</div>
			<div class="col-md-4">
				<!-- /.card -->
				<div class="card card-info">
					<div class="card-header">
						<h3 class="card-title">Album Ảnh sản phẩm</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="card-body p-0">
						<form action="<?= ADMIN_BASE_URL . '?act=edit-album-anh-san-pham' ?>" method="post"
							enctype="multipart/form-data">
							<div class="table-responsive">
								<table id="faqs" class="table table-hover">
									<thead>
										<tr>
											<th>Ảnh</th>
											<th>File</th>
											<th>
												<div class="text-center"><button type="button" onclick="addfaqs();"
														class="badge badge-success"><i class="fa fa-plus"></i>
														Thêm</button></div>
											</th>
										</tr>
									</thead>
									<tbody>
										<input type="hidden" name="san_pham_id" value="<?= $editSanPham['id'] ?>">
										<input type="hidden" name="img_delete" id="img_delete">
										<?php foreach ($listAnhSanPham as $key => $value): ?>
											<tr id="faqs-row-<?= $key ?>">
												<input type="hidden" name="current_img_ids[]" value="<?= $value['id'] ?>">
												<td><img src="<?= BASE_URL . $value['link_anh'] ?>" style="width:50px; height:50px;" alt=""></td>
												<td><input type="file" class="form-control" name="img_array[]"></td>
												<td class="mt-10"><button type="button" class="badge badge-danger"
														onclick="removeRow(<?= $key ?>, <?= $value['id'] ?>)"><i class="fa fa-trash"></i>
														Xóa</button></td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
							<div class="card-footer text-center">
								<button type="submit" class="btn btn-primary">Sửa thông tin</button>
							</div>
						</form>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Footer  -->
<?php include './views/layout/footer.php'; ?>
<!-- End footer  -->
<!-- Page specific script -->

</body>
<script>
	var faqs_row = <?= count($listAnhSanPham); ?>;
	function addfaqs() {
		html = '<tr id="faqs-row-' + faqs_row + '">';
		html += '<td><img src="https://chungcuhuyndaihillstate.com/wp-content/uploads/2022/10/anh-doremon-cute-27.jpg" style="width:50px; height:50px;" alt=""></td>';
		html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
		html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' + faqs_row + ', null);"><i class="fa fa-trash"></i> Xóa</button></td>';

		html += '</tr>';

		$('#faqs tbody').append(html);

		faqs_row++;
	}

	function removeRow(rowId, imgId) {
		$('#faqs-row-' + rowId).remove();
		if (imgId !== null) {
			var imgDeleteInput = document.getElementById('img_delete');
			var currentValue = imgDeleteInput.value;
			imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
		}
	}
</script>

</html>