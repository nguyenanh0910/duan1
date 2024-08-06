<?php
// Lấy tham số 'act' từ URL
$activePage = isset($_GET['act']) ? $_GET['act'] : '';

// Xác định menu chính và menu con dựa trên tham số 'act'
function getActiveMenu($activePage)
{
	$activeMenu = '';
	$activeSubMenu = '';

	// Xác định menu chính
	if (strpos($activePage, 'list-danh-muc') !== false || strpos($activePage, 'form-add-danh-muc') !== false || strpos($activePage, 'form-edit-danh-muc') !== false) {
		$activeMenu = 'list-danh-muc';
	} elseif (
		strpos($activePage, 'list-san-pham') !== false || strpos($activePage, 'form-add-san-pham') !== false || strpos($activePage, 'form-edit-san-pham') !== false ||
		strpos($activePage, 'detail-san-pham') !== false
	) {
		$activeMenu = 'list-san-pham';
	} elseif (strpos($activePage, 'list-don-hang') !== false || strpos($activePage, 'form-edit-don-hang') !== false || strpos($activePage, 'detail-don-hang') !== false) {
		$activeMenu = 'list-don-hang';
	} elseif (
		strpos($activePage, 'list-tai-khoan-quan-tri') !== false || strpos($activePage, 'form-add-quan-tri') !== false || strpos($activePage, 'form-edit-quan-tri') !== false
	) {
		$activeMenu = 'list-tai-khoan';
		$activeSubMenu = 'list-tai-khoan-quan-tri';
	} elseif (strpos($activePage, 'list-tai-khoan-khach-hang') !== false || strpos($activePage, 'form-edit-khach-hang') !== false || strpos($activePage, 'detail-khach-hang') !== false) {
		$activeMenu = 'list-tai-khoan';
		$activeSubMenu = 'list-tai-khoan-khach-hang';
	} elseif (strpos($activePage, 'form-edit-thong-tin-ca-nhan-quan-tri') !== false) {
		$activeMenu = 'list-tai-khoan';
		$activeSubMenu = 'form-edit-thong-tin-ca-nhan-quan-tri';
	}

	return [$activeMenu, $activeSubMenu];
}

list($activeMainMenu, $activeSubMenu) = getActiveMenu($activePage);
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<?php if (isset($_SESSION['thongTin'])): ?>
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="<?= BASE_URL . $_SESSION['thongTin']['anh_dai_dien'] ?>" class="img-circle elevation-2"
						alt="User Image" style="width:34px; height:34px;"
						onerror="this.onerror = null; this.src='https://cdn.icon-icons.com/icons2/589/PNG/256/icontexto-user-web20-delicious_icon-icons.com_55375.png'">
				</div>
				<div class="info">
					<a href="<?= ADMIN_BASE_URL . '?act=form-edit-thong-tin-ca-nhan-quan-tri' ?>"
						class="d-block"><?= $_SESSION['thongTin']['ho_ten'] ?></a>
				</div>
			</div>
		<?php endif ?>

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
				<!-- Dashboard -->
				<li class="nav-item">
					<a href="<?= ADMIN_BASE_URL ?>" class="nav-link <?= ($activeMainMenu === '') ? 'active' : ''; ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Bảng điều khiển</p>
					</a>
				</li>
				<!-- Danh mục sản phẩm -->
				<li class="nav-item <?= ($activeMainMenu === 'list-danh-muc') ? 'menu-open' : ''; ?>">
					<a href="<?= ADMIN_BASE_URL . '?act=list-danh-muc' ?>"
						class="nav-link <?= ($activeMainMenu === 'list-danh-muc') ? 'active' : ''; ?>">
						<i class="nav-icon fas fa-th"></i>
						<p>Danh mục sản phẩm</p>
					</a>
				</li>
				<!-- Sản phẩm -->
				<li class="nav-item <?= ($activeMainMenu === 'list-san-pham') ? 'menu-open' : ''; ?>">
					<a href="<?= ADMIN_BASE_URL . '?act=list-san-pham' ?>"
						class="nav-link <?= ($activeMainMenu === 'list-san-pham') ? 'active' : ''; ?>">
						<i class="nav-icon fas fa-mobile-alt fa-lg"></i>
						<p>Sản Phẩm</p>
					</a>
				</li>
				<!-- Đơn hàng -->
				<li class="nav-item <?= ($activeMainMenu === 'list-don-hang') ? 'menu-open' : ''; ?>">
					<a href="<?= ADMIN_BASE_URL . '?act=list-don-hang' ?>"
						class="nav-link <?= ($activeMainMenu === 'list-don-hang') ? 'active' : ''; ?>">
						<i class="nav-icon fas fa-file-invoice-dollar"></i>
						<p>Đơn hàng</p>
					</a>
				</li>
				<!-- Quản lý tài khoản -->
				<li class="nav-item <?= ($activeMainMenu === 'list-tai-khoan') ? 'menu-open' : ''; ?>">
					<a href="#" class="nav-link <?= ($activeMainMenu === 'list-tai-khoan') ? 'active' : ''; ?>">
						<i class="nav-icon fas fa-user"></i>
						<p>Quản lý tài khoản</p>
						<i class="fas fa-angle-left right"></i>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= ADMIN_BASE_URL . '?act=list-tai-khoan-quan-tri' ?>"
								class="nav-link <?= ($activeSubMenu === 'list-tai-khoan-quan-tri') ? 'active' : ''; ?>">
								<i class="nav-icon far fa-user"></i>
								<p>Tài khoản quản trị</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= ADMIN_BASE_URL . '?act=list-tai-khoan-khach-hang' ?>"
								class="nav-link <?= ($activeSubMenu === 'list-tai-khoan-khach-hang') ? 'active' : ''; ?>">
								<i class="nav-icon far fa-user"></i>
								<p>Tài khoản khách hàng</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= ADMIN_BASE_URL . '?act=form-edit-thong-tin-ca-nhan-quan-tri' ?>"
								class="nav-link <?= ($activeSubMenu === 'form-edit-thong-tin-ca-nhan-quan-tri') ? 'active' : ''; ?>">
								<i class="nav-icon far fa-user"></i>
								<p>Tài khoản cá nhân</p>
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>