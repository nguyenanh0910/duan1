<nav class="navbar navbar-expand-lg navbar-dark bg-white">
	<div class="container"> <a class="navbar-brand" href="index.html"> <img src="./assets/images/logo.png" alt="" title=""
				class="img-fluid" style="height:65px"> </a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
			data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
			aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> <span
				class="navbar-toggler-icon"></span> <span class="navbar-toggler-icon"></span> </button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav text-nowrap">
				<li class="nav-item dropdown"> <a class="nav-link" href="<?= BASE_URL ?>"> Trang chủ </a> </li>
				<li class="nav-item dropdown megamenu-li"> <a class="nav-link"
						href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>">Sản phẩm </a> </li>
				<li class="nav-item dropdown megamenu-li"> <a class="nav-link"
						href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>">Giới thiệu </a> </li>
				<li class="nav-item dropdown megamenu-li"> <a class="nav-link" href="<?= BASE_URL . '?act=lien-he' ?>">Liên
						hệ</a> </li>
				<?php if (isset($_SESSION['user'])): ?>
					<!-- <li class="nav-item dropdown megamenu-li">
						<a class="nav-link" href="<?= BASE_URL . '?act=form-edit-thong-tin-ca-nhan-khach-hang' ?>">Xin chào <?= $_SESSION['user']['ho_ten'] ?></a>
					</li> -->
					<li class="nav-item dropdown megamenu-li"><a class="nav-link" href="<?= BASE_URL . '?act=logout-client' ?>"
							onclick="return confirm('Đăng xuất tài khoản?')">Đăng xuất</a></li>
				<?php else: ?>
					<li class="nav-item dropdown megamenu-li">
						<a class="nav-link" href="<?= BASE_URL . '?act=login-client' ?>">Đăng nhập</a>
					</li>
					<li class="nav-item dropdown megamenu-li">
						<a class="nav-link" href="<?= BASE_URL . '?act=form-dang-ky-client' ?>">Đăng ký</a>
					</li>
				<?php endif; ?>
			</ul>
			<div class="rate-price nav-1">

				<ul>
					<?php if (isset($_SESSION['user'])): ?>
						<li class="dropdown"> <a href="<?= BASE_URL . '?act=form-edit-thong-tin-ca-nhan-khach-hang' ?>"> <i
									class="fa fa-user-circle-o"></i></a>
						</li>
						<li><a href="wishlist.html"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
						<li class="dropdown"> <a href="<?= BASE_URL . '?act=gio-hang' ?>"><i class="fa fa-shopping-bag"
									aria-hidden="true"></i></a>
						<?php else: ?>
						<li class="dropdown"> <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown"> <i
									class="fa fa-user-circle-o" aria-hidden="true"></i></a>
							<div class="dropdown-menu dropdown-menu-right animate slideIn">
								<a class="dropdown-item" href="<?= BASE_URL . '?act=login-client' ?>">Đăng nhập</a>
								<a class="dropdown-item" href="<?= BASE_URL . '?act=form-dang-ky-client' ?>">Đăng ký</a>
								<a class="dropdown-item" href="<?= BASE_URL . '?act=form-quen-mat-khau' ?>">Quên mật khẩu</a>
							</div>
						</li>
						<li><a href="wishlist.html"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
						<li class="dropdown"> <a class="dropdown-toggle link" href="#" data-bs-toggle="dropdown"><i
									class="fa fa-shopping-bag" aria-hidden="true"></i></a>
						<?php endif; ?>
					</li>
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
</nav>
<!-- Navigation -->
<div class="container search-div">
	<div class="row align-items-center">
		<!-- <div class="col-lg-3 col-md-4 top-dropdown">
			<div class="all-cate custom-select2">
				<form method="get" action="<?= BASE_URL . '?act=danh-sach-san-pham' ?>" id="filterForm">
					<select name="danh_muc_id" onchange="document.getElementById('filterForm').submit()">
						<option value="">Danh Mục Sản Phẩm</option>
						<?php foreach ($danhMuc as $dm): ?>
							<option value="<?= $dm['id'] ?>" <?= isset($_GET['danh_muc_id']) && $_GET['danh_muc_id'] == $dm['id'] ? 'selected' : '' ?>>
								<?= $dm['ten_danh_muc'] ?>
							</option>
						<?php endforeach ?>
					</select>
				</form>


			</div>
		</div> -->
	</div>
</div>
<!--end Navigation -->