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
					<h1>Quản lý tài khoản khách hàng</h1>
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
							<h3 class="card-title" style="font-size: 1.5rem;">Danh sách tài khoản khách hàng</h3>
							<div class="card-tools">
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>STT</th>
										<th>Họ tên</th>
										<th>Ảnh đại diện</th>
										<th>Email</th>
										<th>Số điện thoại</th>
										<th>Trạng thái</th>
										<th>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($listKhachHang as $key => $khachHang): ?>
										<tr>
											<td><?= $key + 1 ?></td>
											<td><?= $khachHang['ho_ten'] ?></td>
											<td class="text-center"><img src="<?= BASE_URL . $khachHang['anh_dai_dien'] ?>" style="width:80px;" alt="" 
											onerror="this.onerror = null; this.src='https://cdn.icon-icons.com/icons2/589/PNG/256/icontexto-user-web20-delicious_icon-icons.com_55375.png'"></td>
											<td><?= $khachHang['email'] ?></td>
											<td><?= $khachHang['so_dien_thoai'] ?></td>
											<td><?= $khachHang['trang_thai'] == 1 ? 'Kích hoạt' : 'Hủy kích hoạt' ?></td>
											<td>
												<div class="btn-group">
													<a href="<?= ADMIN_BASE_URL . '?act=detail-khach-hang&id=' . $khachHang['id'] ?>">
														<button class="btn btn-primary"><i class="far fa-eye"></i></button>
													</a>
													<a href="<?= ADMIN_BASE_URL . '?act=form-edit-khach-hang&id=' . $khachHang['id'] ?>">
														<button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
													</a>
													<a href="<?= ADMIN_BASE_URL . '?act=reset-password&id=' . $khachHang['id'] ?>"
														onclick="return confirm('Bạn có muốn reset password của tài khoản này không?')">
														<button class="btn btn-danger"><i class="fas fa-redo"></i></button>
													</a>
												</div>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
								<tfoot>
									<tr>
										<th>STT</th>
										<th>Họ tên</th>
										<th>Ảnh đại diện</th>
										<th>Email</th>
										<th>Số điện thoại</th>
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
			"buttons": [
				{ extend: 'copy', text: 'Sao chép' },
				{ extend: 'csv', text: 'Xuất CSV' },
				{ extend: 'excel', text: 'Xuất Excel' },
				{ extend: 'pdf', text: 'Xuất PDF' },
				{ extend: 'print', text: 'In' },
				{ extend: 'colvis', text: 'Hiển thị cột' }
			],
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