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
					<h1>Thêm mới tài khoản</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
						<li class="breadcrumb-item active">Thêm tài khoản</li>
					</ol>
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
							<h3 class="card-title">Form thêm tài khoản</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="?act=add-tai-khoan" method="POST" enctype="multipart/form-data">
							<div class="card-body">
								<div class="row">
								<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Họ và tên</label>
										<input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ tên">
									</div>
									<div class="form-group col-md-6">
										<label for="form-group">Ảnh đại diện</label>
										<input type="file" class="form-control" name="anh_dai_dien">
									</div>
								</div>
								<div class="row">
								<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Số điện thoại</label>
										<input type="tel" class="form-control" name="so_dien_thoai" placeholder="Nhập số điện thoại">
									</div>
									<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Email</label>
										<input type="email" class="form-control" name="email" placeholder="Nhập email">
									</div>
								</div>
								<div class="row">
								<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Tên đăng nhập</label>
										<input type="text" class="form-control" name="ten_dang_nhap" placeholder="Nhập tên đăng nhập">
									</div>
									<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Mật khẩu</label>
										<input type="password" class="form-control" name="mat_khau">
									</div>
								</div>
								<div class="row">
								<div class="form-group col-md-6">
										<label for="exampleInputEmail1">Địa chỉ</label>
										<input type="text" class="form-control" name="dia_chi" placeholder="Nhập địa chỉ">
									</div>
									<div class="form-group col-md-6">
									<label >Vai trò</label>
									<select class="form-control form-select" name="vai_tro">
											<option disabled selected>Chọn vai trò tài khoản</option>
												<option value="1">Khách hàng</option>
												<option value="2">Admin</option>
										</select>
									</div>
								</div>
							</div>
							<!-- /.card-body -->

							<div class="card-footer ">
								<button type="submit" class="btn btn-primary mr-2" name="btn_add">Thêm mới</button>
								<a href="<?= ADMIN_BASE_URL . '?act=list-tai-khoan' ?>" class="btn btn-primary">Danh sách tài khoản</a>
							</div>
							<?php
							if (isset($thongbao) && ($thongbao != ""))
								echo $thongbao;
							?>
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