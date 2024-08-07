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
					<h1>Chi tiết khách hàng</h1>
				</div>
				<div class="col-sm-1">
					<a href="<?= ADMIN_BASE_URL . '?act=list-tai-khoan-khach-hang' ?>" class="btn btn-secondary"><i
							class="fas fa-arrow-right	"></i></a>
				</div>

			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-5">
					<img src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" style="width:70%;" alt=""
						onerror="this.onerror = null; this.src='https://cdn.icon-icons.com/icons2/589/PNG/256/icontexto-user-web20-delicious_icon-icons.com_55375.png'">
				</div>
				<div class="col-7">
					<div class="container">
						<table class="table table-borderless">
							<tbody style="font-size: large">
								<tr>
									<th>Họ tên: </th>
									<td><?= $khachHang['ho_ten'] ?? '' ?></td>
								</tr>
								<tr>
									<th>Ngày sinh: </th>
									<td><?= formatDate($khachHang['ngay_sinh']) ?? '' ?></td>
								</tr>
								<tr>
									<th>Email: </th>
									<td><?= $khachHang['email'] ?? '' ?></td>
								</tr>
								<tr>
									<th>Số điện thoại: </th>
									<td><?= $khachHang['so_dien_thoai'] ?? '' ?></td>
								</tr>
								<tr>
									<th>Giới tính: </th>
									<td><?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
								</tr>
								<tr>
									<th>Địa chỉ: </th>
									<td><?= $khachHang['dia_chi'] ?? '' ?></td>
								</tr>
								<tr>
									<th>Trạng thái: </th>
									<td><?= $khachHang['trang_thai'] == 1 ? 'Kích hoạt' : 'Hủy kích hoạt' ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-12">
					<hr>
					<h2>Hoạt động tài khoản</h2>
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#don-hang" role="tab"
								aria-controls="home" aria-selected="true">Lịch sử mua hàng</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="#binh-luan" role="tab"
								aria-controls="profile" aria-selected="false">Lịch sử bình luận</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="don-hang" role="tabpanel" aria-labelledby="home-tab">
							<table id="example1" class="table table-striped table-hover">
								<thead>
									<tr>
										<th>STT</th>
										<th>Mã đơn hàng</th>
										<th>Tên người nhận</th>
										<th>Số điện thoại</th>
										<th>Ngày đặt</th>
										<th>Tổng tiền</th>
										<th>Trạng thái</th>
										<th>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($listDonHang as $key => $donHang): ?>
										<tr>
											<td><?= $key + 1 ?></td>
											<td><?= $donHang['ma_don_hang'] ?></td>
											<td><?= $donHang['ten_nguoi_nhan'] ?></td>
											<td><?= $donHang['sdt_nguoi_nhan'] ?></td>
											<td><?= formatDate($donHang['ngay_dat']) ?></td>
											<td><?= fomartPrice($donHang['tong_tien']) ?></td>
											<td><?= $donHang['ten_trang_thai'] ?></td>
											<td>
												<div class="btn-group">
													<a href="<?= ADMIN_BASE_URL . '?act=detail-don-hang&id=' . $donHang['id'] ?>">
														<button class="btn btn-primary"><i class="far fa-eye"></i></button>
													</a>
													<a href="<?= ADMIN_BASE_URL . '?act=form-edit-don-hang&id=' . $donHang['id'] ?>">
														<button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
													</a>
												</div>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
						<div class="tab-pane fade" id="binh-luan" role="tabpanel" aria-labelledby="profile-tab">
							<table id="example2" class="table table-striped table-hover">
								<thead>
									<tr>
										<th>STT</th>
										<th>Sản phẩm</th>
										<th>Nội dung</th>
										<th>Ngày đăng</th>
										<th>Trạng thái</th>
										<th>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($listBinhLuan as $key => $binhLuan): ?>
										<tr>
											<td><?= $key + 1 ?></td>
											<td>
												<a target="_blank"
													href="<?= ADMIN_BASE_URL . '?act=detail-san-pham&id=' . $binhLuan['san_pham_id'] ?>">
													<?= $binhLuan['ten_san_pham'] ?>
												</a>
											</td>
											<td><?= $binhLuan['noi_dung'] ?></td>
											<td><?= formatDate($binhLuan['ngay_dang']) ?></td>
											<td><?= $binhLuan['trang_thai'] == 1 ? 'Hiển thị' : 'Đã ẩn' ?></td>
											<td>
												<form action="<?= ADMIN_BASE_URL . '?act=update-trang-thai-binh-luan' ?>" method="POST">
													<input type="hidden" name="id" value="<?= $binhLuan['id'] ?>">
													<input type="hidden" name="name_view" value="detail_khach">
													<button
														onclick="return confirm('<?= $binhLuan['trang_thai'] == 1 ? 'Bạn có muốn ẩn bình luận này không?' : 'Bạn có muốn hiển thị bình luận này không?' ?>')"
														class="btn <?= $binhLuan['trang_thai'] == 1 ? 'btn-success' : 'btn-danger' ?>">
														<?= $binhLuan['trang_thai'] == 1 ? '<i class="far fa-eye"></i>' : '<i class="far fa-eye-slash"></i>' ?>
													</button>

												</form>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.col -->
		<!-- /.row -->
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
<script>
	$(function () {
		$("#example1").DataTable({
			"responsive": true,
			"lengthChange": false,
			"autoWidth": false,
			"language": {
				"search": "Tìm kiếm:"
			}
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
			"language": {
				"search": "Tìm kiếm:"
			}
		});
	});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to get URL parameter
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }

        // Get the value of the 'tab' parameter
        var activeTab = getUrlParameter('tab');

        // If a tab is specified in the URL, activate it
        if (activeTab) {
            var tabElement = document.querySelector('.nav a[href="#' + activeTab + '"]');
            if (tabElement) {
                var tab = new bootstrap.Tab(tabElement);
                tab.show();
            }
        }
    });
</script>

</html>