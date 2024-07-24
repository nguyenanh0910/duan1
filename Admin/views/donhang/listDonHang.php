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
					<h1>Quản lý danh sách đơn hàng</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title" style="font-size: 1.5rem;">Danh sách đơn hàng</h3>
							<div class="card-tools">
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
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
											<td><?= $donHang['ngay_dat'] ?></td>
											<td><?=number_format($donHang['tong_tien'], 0, ',' , '.'). ' VNĐ' ?></td>
											<td><?= $donHang['ten_trang_thai'] ?></td>
											<td>
												<div class="btn-group">
													<a
														href="<?= ADMIN_BASE_URL . '?act=detail-don-hang&id=' . $donHang['id'] ?>">
														<button class="btn btn-primary"><i class="far fa-eye"></i></button>
													</a>
													<a
														href="<?= ADMIN_BASE_URL . '?act=form-edit-don-hang&id=' . $donHang['id'] ?>">
														<button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
													</a>
												</div>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
								<tfoot>
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
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
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
<script>
	$(function () {
		$("#example1").DataTable({
			"responsive": true, "lengthChange": false, "autoWidth": false,
			"buttons": ["copy", "csv", "excel", "pdf", "print", { extend: 'colvis', text: 'Hiển thị' }],
			"language": {
				"search": "Tìm kiếm:"
			}
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>

</html>