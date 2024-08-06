<!-- header  -->
<?php include './views/layout/header.php'; ?>
<!-- end header -->

<!-- navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- end navbar -->

<!-- content  -->
<div class="container mb-5">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb2">
			<li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a> /
			</li>
			<li style="margin-left: 0.5rem;">Thông tin tài khoản</li>
		</ol>
	</nav>
	<div>
		<div class="account-dashboard">
			<div class="row">
				<div class="col-md-12 col-lg-2">
					<!-- Nav tabs -->
					<ul role="tablist" class="nav flex-column dashboard-list">
						<li><a href="#account-details" data-bs-toggle="tab" class="active">Thông tin tài khoản</a></li>
						<li> <a href="#orders" data-bs-toggle="tab">Đơn hàng</a></li>

						<li><a href="<?= BASE_URL . '?act=logout-client' ?>" onclick="return confirm('Đăng xuất tài khoản?')">Đăng
								xuất</a></li>
					</ul>
				</div>
				<div class="col-md-12 col-lg-10">
					<!-- Tab panes -->
					<div class="tab-content dashboard-content">
						<div class="tab-pane active" id="account-details">
							<h3>Thông tin tài khoản </h3>
							<div class="login m-0">
								<div class="login-form-container">
									<div class="account-login-form">
										<form action="<?= BASE_URL . '?act=update-thong-tin-ca-nhan-khach-hang' ?>" method="post"
											enctype="multipart/form-data">
											<input type="hidden" name="id" value="<?= $thongTin['id'] ?>" style=" opacity: 0; width: 0px;">
											<h3>Thông tin cá nhân</h3>
											<?php if (isset($_SESSION['success'])) { ?>
												<div class="alert alert-info alert-dismissable">
													<i class="fa fa-check-circle mr-2"></i>
													<?= $_SESSION['success'] ?>
												</div>
												<?php unset($_SESSION['success']); // Xóa thông báo khỏi session ?>
											<?php } ?>
											<div class="account-input-box">
												<div class="row">
													<div class="text-center">
														<label for="file-input">
															<input id="file-input" type="file" name="anh_dai_dien" style=" opacity: 0; width: 0px;">
															<img class="avatar" id="img-preview" onload="showToast()"
																src="<?= BASE_URL . $thongTin['anh_dai_dien'] ?>"
																onerror="this.onerror = null; this.src='https://cdn.icon-icons.com/icons2/589/PNG/256/icontexto-user-web20-delicious_icon-icons.com_55375.png'">
															<p>Ảnh đại diện</p>
														</label>
													</div>
													<div class="col-md-12">
														<label>Họ tên</label>
														<input type="text" name="ho_ten" class="form-control" value="<?= $thongTin['ho_ten'] ?>">
														<?php if (isset($_SESSION['error']['ho_ten'])) { ?>
															<p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
														<?php } ?>
													</div>
													<div class="col-md-6">
														<label>Email</label>
														<input type="email" name="email" class="form-control" value="<?= $thongTin['email'] ?>">
														<?php if (isset($_SESSION['error']['email'])) { ?>
															<p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
														<?php } ?>
													</div>
													<div class="col-md-6">
														<label>Số điện thoại</label>
														<input type="text" name="so_dien_thoai" class="form-control"
															value="<?= $thongTin['so_dien_thoai'] ?>">
														<?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
															<p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
														<?php } ?>
													</div>
													<div class="col-md-6">
														<label>Ngày sinh</label>
														<input type="date" name="ngay_sinh" class="form-control"
															value="<?= $thongTin['ngay_sinh'] ?>">
														<?php if (isset($_SESSION['error']['ngay_sinh'])) { ?>
															<p class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></p>
														<?php } ?>
													</div>
													<div class="col-md-6">
														<label>Giới tính</label>
														<select class="form-control form-select" name="gioi_tinh">
															<option value="1" <?= $thongTin['gioi_tinh'] == 1 ? 'selected' : '' ?>>Nam</option>
															<option value="2" <?= $thongTin['gioi_tinh'] == 2 ? 'selected' : '' ?>>Nữ</option>
														</select>
														<?php if (isset($_SESSION['error']['gioi_tinh'])) { ?>
															<p class="text-danger"><?= $_SESSION['error']['gioi_tinh'] ?></p>
														<?php } ?>
													</div>
													<div class="col-md-12">
														<label>Địa chỉ</label>
														<input type="text" name="dia_chi" class="form-control" value="<?= $thongTin['dia_chi'] ?>">
														<?php if (isset($_SESSION['error']['dia_chi'])) { ?>
															<p class="text-danger"><?= $_SESSION['error']['dia_chi'] ?></p>
														<?php } ?>
													</div>
												</div>
											</div>
											<div class="button-box">
												<button class="btn default-btn" type="submit">Cập nhật</button>
											</div>
										</form>
										<hr>
										<form action="<?= BASE_URL . '?act=update-mat-khau-ca-nhan-khach-hang' ?>" method="post">
											<h3>Thay đổi mật khẩu</h3>
											<?php if (isset($_SESSION['success'])) { ?>
												<div class="alert alert-info alert-dismissable">
													<i class="fa fa-lock mr-2"></i>
													<?= $_SESSION['success'] ?>
												</div>
												<?php unset($_SESSION['success']); // Xóa thông báo khỏi session ?>
											<?php } ?>
											<div class="account-input-box">
												<div class="row">
													<div class="col-md-12">
														<label>Mật khẩu cũ</label>
														<input type="password" name="old_pass" class="form-control">
														<?php if (isset($_SESSION['error']['old_pass'])) { ?>
															<p class="text-danger"><?= $_SESSION['error']['old_pass'] ?></p>
														<?php } ?>
													</div>
													<div class="col-md-12">
														<label>Mật khẩu mới</label>
														<input type="password" name="new_pass" class="form-control">
														<?php if (isset($_SESSION['error']['new_pass'])) { ?>
															<p class="text-danger"><?= $_SESSION['error']['new_pass'] ?></p>
														<?php } ?>
													</div>
													<div class="col-md-12">
														<label>Xác nhận mật khẩu</label>
														<input type="password" name="confirm_pass" class="form-control">
														<?php if (isset($_SESSION['error']['confirm_pass'])) { ?>
															<p class="text-danger"><?= $_SESSION['error']['confirm_pass'] ?></p>
														<?php } ?>
													</div>
												</div>
											</div>
											<div class="button-box">
												<button class="btn default-btn" type="submit">Lưu mật khẩu</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="orders">
							<h3>Danh sách đơn hàng</h3>
							<div class="table-responsive">
								<table class="table boder-b">
									<thead>
										<tr>
											<th>Order</th>
											<th>Date</th>
											<th>Status</th>
											<th>Total</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>May 10, 2018</td>
											<td>Processing</td>
											<td>$25.00 for 1 item </td>
											<td><a href="cart.html" class="view">view</a></td>
										</tr>
										<tr>
											<td>2</td>
											<td>May 10, 2018</td>
											<td>Processing</td>
											<td>$17.00 for 1 item </td>
											<td><a href="cart.html" class="view">view</a></td>
										</tr>
										<tr>
											<td>3</td>
											<td>May 10, 2018</td>
											<td>Processing</td>
											<td>$17.00 for 1 item </td>
											<td><a href="cart.html" class="view">view</a></td>
										</tr>
										<tr>
											<td>4</td>
											<td>May 10, 2018</td>
											<td>Processing</td>
											<td>$17.00 for 1 item </td>
											<td><a href="cart.html" class="view">view</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<!-- end content  -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- end footer  -->
<!--mega-menu-->
<script src="./assets/vendor/jquery/mega-menu.js"></script>
<!--mega-menu-->
<!--price_range-->
<link rel="stylesheet" href="./assets/vendor/price_range/jquery-ui.css" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="./assets/vendor/price_range/price_range_style.css">
<!--price_range-->
<!--stepper-->
<script src="./assets/vendor/stepper/jquery.min.js"></script>
<script src="./assets/vendor/stepper/jquery-ui.min.js"></script>
<script src="./assets/vendor/jquery/stepper.widget.js"></script>
<!--stepper-->
<!--grid-list-->
<script src="./assets/vendor/jquery/grid-list.js"></script>
<!--grid-list-->
</body>

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
<style>
	:root {
		--primary: #f46f23;
	}

	.avatar {
		width: 145px;
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