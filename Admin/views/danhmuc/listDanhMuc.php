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
					<h1>Quản lý danh mục sản phẩm</h1>
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
							<h3 class="card-title" style="font-size: 1.5rem;">Danh sách danh mục</h3>
							<div class="card-tools">
								<a href="<?= ADMIN_BASE_URL . '?act=form-add-danh-muc' ?>"><button class="btn btn-success">Thêm mới danh
										mục</button></a>
							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>STT</th>
										<th>Tên danh mục</th>
										<th>Mô tả</th>
										<th>Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($listDanhMuc as $key => $danhMuc): ?>
										<tr>
											<td><?= $key + 1 ?></td>
											<td><?= $danhMuc['ten_danh_muc'] ?></td>
											<td><?= $danhMuc['mo_ta'] ?></td>
											<td>
												<a href="<?= ADMIN_BASE_URL . '?act=form-edit-danh-muc&id=' . $danhMuc['id'] ?>">
													<button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
												</a>
												<a href="<?= ADMIN_BASE_URL . '?act=delete-danh-muc&id=' . $danhMuc['id'] ?>"
													onclick="return confirm('Bạn có muốn xóa không?')">
													<button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
												</a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
								<tfoot>
									<tr>
										<th>STT</th>
										<th>Tên danh mục</th>
										<th>Mô tả</th>
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