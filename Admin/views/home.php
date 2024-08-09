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
					<h1>Báo cáo thống kê</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?= $soDonHang['so_don_hang'] ?></h3>

							<p>Tổng số đơn hàng</p>
						</div>
						<div class="icon">
							<i class="fas fa-shopping-bag"></i>
						</div>
						<a href="<?= ADMIN_BASE_URL . '?act=list-don-hang' ?>" class="small-box-footer">Xem chi tiết <i
								class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-danger">
						<div class="inner">
							<h3><?= number_format(($soDonHangHoan['so_don_hang_hoan'] / ($soDonHang['so_don_hang'] == 0 ? '1' : $soDonHang['so_don_hang'])) * 100, 2) ?><sup
									style="font-size: 20px">%</sup></h3>

							<p>Tỉ lệ hoàn hàng </p>
						</div>
						<div class="icon">
							<i class="far fa-chart-bar"></i>
						</div>
						<a href="<?= ADMIN_BASE_URL . '?act=list-don-hang' ?>" class="small-box-footer">Xem chi tiết <i
								class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?= $soSanPham['so_san_pham'] ?></h3>

							<p>Tổng số sản phẩm</p>
						</div>
						<div class="icon">
							<i class="fas fa-mobile-alt fa-lg"></i>
						</div>
						<a href="<?= ADMIN_BASE_URL . '?act=list-san-pham' ?>" class="small-box-footer">Xem chi tiết <i
								class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-6">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3><?= $soKhachHang['so_khach_hang'] ?></h3>

							<p>Tổng số khách hàng</p>
						</div>
						<div class="icon">
							<i class="far fa-user"></i>
						</div>
						<a href="<?= ADMIN_BASE_URL . '?act=list-tai-khoan-khach-hang' ?>" class="small-box-footer">Xem chi tiết <i
								class="fas fa-arrow-circle-right"></i></a>
					</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->
			<!-- Main row -->
			<div class="row">
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas fa-chart-pie mr-1"></i>
								Doanh thu
							</h3>
						</div><!-- /.card-header -->

						<div class="card-body">
							<div class="tab-content p-0">
								<!-- Morris chart - Sales -->
								<div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
									<canvas id="revenue-chart-canvas" height="300"></canvas>
								</div>
							</div>
						</div><!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col-md-6 -->
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
							<i class="fas fa-mobile-alt fa-lg  mr-1"></i>
								Sản phẩm bán chạy
							</h3>
						</div>
						<div class="card-body table-responsive p-0">
							<table class="table table-striped table-valign-middle">
								<thead>
									<tr>
										<th colspan="2">Sản phẩm</th>
										<th>Giá bán</th>
										<th>Số lượng bán</th>
										<th>Xem</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($sanPhamBanChay as $sanPham): ?>
										<tr>
											<td colspan="2">
												<img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="ảnh sản phẩm" class=" img-size-32 mr-2">
												<?= $sanPham['ten_san_pham'] ?>
											</td>
											<td><?= fomartPrice($sanPham['gia_khuyen_mai'])  ?></td>
											<td><?= $sanPham['total_sales'] ?></td>
											<td>
												<a href="<?=ADMIN_BASE_URL . '?act=detail-san-pham&id=' .$sanPham['id']?>" class="text-muted">
													<i class="fas fa-search"></i>
												</a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col-md-6 -->
			</div>
			<!-- /.content-wrapper -->
		</div>
		<!-- end content  -->
	</section>
</div>
<!-- Footer  -->
<?php include './views/layout/footer.php'; ?>
<!-- End footer  -->
<!-- Page specific script -->
</body>
<?php

// Tạo mảng chứa tất cả các ngày trong tháng hiện tại
$labels = [];
$data = [];

// Xác định ngày bắt đầu và kết thúc của tháng
$start = new DateTime('first day of this month');
$end = new DateTime('last day of this month');

// Lặp qua từng ngày trong tháng
while ($start <= $end) {
	$date = $start->format('Y-m-d');
	$labels[] = $date;
	$data[$date] = 0; // Mặc định là 0

	$start->modify('+1 day');
}

// Cập nhật dữ liệu từ doanh thu
foreach ($doanhThu as $row) {
	$data[$row['day']] = $row['doanh_thu'];
}

// Chuyển mảng dữ liệu thành các mảng riêng biệt cho Chart.js
$dataValues = array_values($data);
?>
<script>
	document.addEventListener("DOMContentLoaded", function () {
		// Lấy dữ liệu JSON từ PHP
		var labels = <?= json_encode($labels); ?>; // Ngày trong tháng, ví dụ ['2024-08-01', '2024-08-02', ...]

		var data = <?= json_encode($dataValues); ?>;

		// Chuyển đổi labels thành số ngày trong tháng
		var daysInMonth = labels.map(function (date) {
			return new Date(date).getDate(); // Lấy ngày trong tháng từ định dạng 'Y-m-d'
		});

		// Tạo tiêu đề trục Y dựa trên tháng và năm hiện tại
		var month = new Date().getMonth() + 1; // Tháng hiện tại (0-11, cộng thêm 1)
		var year = new Date().getFullYear(); // Năm hiện tại
		var titleText = `Tháng ${month}/${year}`;

		var ctx = document.getElementById('revenue-chart-canvas').getContext('2d');
		var revenueChart = new Chart(ctx, {
			type: 'line', // Sử dụng biểu đồ đường
			data: {
				labels: daysInMonth,
				datasets: [{
					label: 'Doanh thu theo tháng',
					data: data,
					backgroundColor: 'rgba(60,141,188,0.4)', // Màu nền của đường
					borderColor: 'rgba(60,141,188,1)', // Màu của đường
					borderWidth: 2, // Độ dày của đường
					pointBackgroundColor: '#3b8bba', // Màu của điểm dữ liệu
					pointBorderColor: '#3b8bba', // Màu viền điểm dữ liệu
					pointHoverBackgroundColor: '#3b8bba', // Màu nền của điểm khi hover
					pointHoverBorderColor: '#3b8bba', // Màu viền của điểm khi hover
					fill: false // Không đổ màu dưới đường biểu đồ
				}]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				scales: {
					x: {
						display: true,
						title: {
							display: true,
							text: titleText // Tiêu đề trục x là "Tháng/Năm"
						},
						ticks: {
							autoSkip: false, // Không tự động bỏ qua nhãn
							maxRotation: 0, // Không xoay nhãn
							minRotation: 0, // Không xoay nhãn
							// Hiển thị số ngày trong tháng
							callback: function (value, index, values) {
								return value + 1; // Chỉ hiển thị số ngày
							}
						}
					},
					y: {
						display: true,
						ticks: {
							callback: function (value, index, values) {
								// Định dạng giá trị Y
								return new Intl.NumberFormat().format(value) + 'VNĐ';
							}
						}
					}
				}
			}
		});
	});
</script>


</html>