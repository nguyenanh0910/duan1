<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="./assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Alexander Pierce</a>
			</div>
		</div>

		<!-- SidebarSearch Form -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Tìm kiếm" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
						<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
							 with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= ADMIN_BASE_URL ?>" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Bảng điều khiển
						</p>
					</a>
				</li>
				<li class="nav-item menu-open">
					<a href="<?= ADMIN_BASE_URL . '?act=list-danh-muc' ?>" class="nav-link active">
						<i class="nav-icon fas fa-th"></i>
						<p>
							Danh mục sản phẩm
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= ADMIN_BASE_URL . '?act=list-san-pham' ?>" class="nav-link">
						<i class="nav-icon fas fa-mobile-alt fa-lg"></i>
						<p>
							Sản Phẩm
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= ADMIN_BASE_URL . '?act=list-don-hang' ?>" class="nav-link">
						<i class="nav-icon fas fa-file-invoice-dollar"></i>
						<p>
							Đơn hàng
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href=".?act=list-tai-khoan" class="nav-link">
						<i class="nav-icon far fa-user"></i>
						<p>
							Quản lý tài khoản
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>