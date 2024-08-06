<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
			<a href="<?= ADMIN_BASE_URL ?>" class="nav-link">Trang chủ</a>
		</li>
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<!-- Navbar Search -->
		<li class="nav-item">
			<a class="nav-link" href="<?=ADMIN_BASE_URL . '?act=logout-admin'?>" onclick="return confirm('Đăng xuất tài khoản?')">
				<i class="fas fa-sign-out-alt fa-lg"></i>
			</a>
		</li>
	</ul>
</nav>