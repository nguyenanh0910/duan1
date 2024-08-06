<!-- header  -->
<?php include './views/layout/header.php'; ?>
<!-- end header -->

<!-- navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- end navbar -->

<!-- content  -->
<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb breadcrumb2">
			<li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
			<li class="breadcrumb-item">Register</li>
		</ol>
	</nav>
	<div class="row justify-content-center">
		<div class="col-lg-8 col-md-12 mb-5">
			<div class="login">
				<h2>Đăng ký </h2>
				<?php if (isset($_SESSION['success'])) { ?>
					<div class="alert alert-info alert-dismissable">
						<i class="fa fa-check-circle mr-2"></i>
						<?= $_SESSION['success'] ?>
					</div>
					<?php unset($_SESSION['success']); // Xóa thông báo khỏi session ?>
				<?php } ?>
				<div class="row">
					<div class="login-form-container">
						<div class="account-login-form">
							<form action="<?= BASE_URL . '?act=dang-ky-client' ?>" method="post">
								<div class="account-input-box">
									<div class="row">
										<div class="col-md-12">
											<label>Họ tên</label>
											<input type="text" name="ho_ten" class="form-control">
											<?php if (isset($_SESSION['error']['ho_ten'])) { ?>
												<p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
											<?php } ?>
										</div>
										<div class="col-md-6">
											<label>Email</label>
											<input type="email" name="email" class="form-control">
											<?php if (isset($_SESSION['error']['email'])) { ?>
												<p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
											<?php } ?>
										</div>
										<div class="col-md-6">
											<label>Số điện thoại</label>
											<input type="text" name="so_dien_thoai" class="form-control">
											<?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
												<p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
											<?php } ?>
										</div>
										<div class="col-md-6">
											<label>Mật khẩu</label>
											<input type="password" name="pass" class="form-control">
											<?php if (isset($_SESSION['error']['pass'])) { ?>
												<p class="text-danger"><?= $_SESSION['error']['pass'] ?></p>
											<?php } ?>
										</div>
										<div class="col-md-6">
											<label>Xác nhận mật khẩu</label>
											<input type="password" name="confirm_pass" class="form-control">
											<?php if (isset($_SESSION['error']['confirm_pass'])) { ?>
												<p class="text-danger"><?= $_SESSION['error']['confirm_pass'] ?></p>
											<?php } ?>
										</div>
									</div>
								</div>
								<div class="button-box">
									<button class="btn default-btn" type="submit">Đăng ký</button>
								</div>
							</form>
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

</html>