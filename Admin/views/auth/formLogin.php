<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đăng nhập Admin</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<!-- /.login-logo -->
		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<h1 style="font-weight:bold">ADMIN BHA</h1>
			</div>
			<div class="card-body">
				<?php if (isset($_SESSION['error'])) { ?>
					<p class="text-danger login-box-msg"><?= $_SESSION['error'] ?></p>
				<?php } else { ?>
					<p class="login-box-msg">Vui lòng đăng nhập</p>
				<?php } ?>
				<form action="<?= ADMIN_BASE_URL . '?act=check-login-admin' ?>" method="post">
					<div class="input-group mb-3">
						<input type="email" class="form-control" name="email" placeholder="Email">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button type="submit" class="btn btn-primary btn-block">Đăng Nhập</button>
						</div>
						<!-- /.col -->
					</div>
				</form>

				<p class="mb-1">
					<a href="forgot-password.html">Quên mật khẩu</a>
				</p>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="./assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="./assets/dist/js/adminlte.min.js"></script>
</body>

</html>