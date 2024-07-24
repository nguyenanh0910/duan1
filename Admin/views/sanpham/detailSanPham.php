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
					<h1>Chi tiết sản phẩm</h1>
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

		<!-- Default box -->
		<div class="card card-solid">
			<div class="card-body">
				<div class="row">
					<div class="col-12 col-sm-6">
						<div class="col-12">
							<img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" class="product-image" alt="Product Image">
						</div>
						<div class="col-12 product-image-thumbs">
							<?php foreach ($listAnhSanPham as $key => $anhSP): ?>
								<div class="product-image-thumb <?= $anhSP[$key] == 0 ? 'active' : '' ?>"><img
										src="<?= BASE_URL . $anhSP['link_anh'] ?>" alt="Product Image"></div>
							<?php endforeach ?>
						</div>
					</div>
					<div class="col-12 col-sm-6">
						<h3 class="my-3">Tên sản phẩm: <span style="color: red"><?= $sanPham['ten_san_pham'] ?></span></h3>
						<hr>
						<h4 class="mt-3">Giá tiền: <small><?=number_format($sanPham['gia_san_pham'], 0, ',' , '.'). ' VNĐ' ?></small></h4>
						<h4 class="mt-3">Giá khuyến mãi: <small><?=number_format($sanPham['gia_khuyen_mai'], 0, ',' , '.'). ' VNĐ' ?></small></h4>
						<h4 class="mt-3">Số lượng: <small><?= $sanPham['so_luong'] ?></small></h4>
						<h4 class="mt-3">Lượt xem: <small><?= $sanPham['luot_xem'] ?></small></h4>
						<h4 class="mt-3">Ngày nhập: <small><?= formatDate($sanPham['ngay_nhap'])?></small></h4>
						<h4 class="mt-3">Danh mục: <small><?= $sanPham['ten_danh_muc'] ?></small></h4>
						<h4 class="mt-3">Trạng thái: <small><?= $sanPham['trang_thai'] == 1 ? 'Còn bán' : 'Dừng bán' ?></small></h4>
						<h4 class="mt-3">Mô tả: <small><?= $sanPham['mo_ta'] ?></small></h4>
					</div>
				</div>
				<ul class="nav nav-tabs row mt-4" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#binh-luan" role="tab" aria-controls="home"
							aria-selected="true">Bình luận của sản phẩm</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="binh-luan" role="tabpanel" aria-labelledby="home-tab">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Tên người bình luận</th>
									<th>Nội dung</th>
									<th>Ngày đăng</th>
									<th>Thao tác</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Nguyễn Anh</td>
									<td>Sản phẩm xịn</td>
									<td>20/7/2024</td>
									<td>
										<div class="btn-group">
											<a href="#">
												<button class="btn-warning">
													<i class="far fa-eye"></i>
												</button>
											</a>
											<a href="#" onclick="return confirm('Bạn có muốn xóa không?')">
												<button class="btn-danger"><i class="fas fa-trash-alt"></i></button>
											</a>
										</div>
									</td>
								</tr>
								<tr>
									<td>1</td>
									<td>Nguyễn Anh</td>
									<td>Sản phẩm xịn</td>
									<td>20/7/2024</td>
									<td>
										<div class="btn-group">
											<a href="#">
												<button class="btn-warning">
													<i class="far fa-eye"></i>
												</button>
											</a>
											<a href="#" onclick="return confirm('Bạn có muốn xóa không?')">
												<button class="btn-danger"><i class="fas fa-trash-alt"></i></button>
											</a>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->

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
	$(document).ready(function () {
		$('.product-image-thumb').on('click', function () {
			var $image_element = $(this).find('img')
			$('.product-image').prop('src', $image_element.attr('src'))
			$('.product-image-thumb.active').removeClass('active')
			$(this).addClass('active')
		})
	})
</script>

</html>