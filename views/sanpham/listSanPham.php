<!-- header  -->
<?php include './views/layout/header.php'; ?>
<!-- end header -->

<!-- navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- end navbar -->

<!-- content  -->
<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb2 breadcrumb">
			<li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a>
				/
			</li>
			<li style="margin-left: 0.5rem;"><a href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>"> Sản phẩm</a></li>
		</ol>
	</nav>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-lg-3 col-md-12">
			<div class="inner-left-menu">
				<h3>Danh mục sản phẩm</h3>
				<div class="list-css">
					<ul>
						<li><a href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>">Tất cả sản phẩm</a></li>
						<?php foreach ($danhMuc as $dm): ?>
							<li><a
									href="<?= BASE_URL . '?act=danh-sach-san-pham&danh_muc_id=' . $dm['id'] ?>"><?= $dm['ten_danh_muc'] ?></a>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-lg-9 col-md-12">
			<div class="row">
				<div class="col-12">
					<div class="right-heading">
						<div class="row">
							<div class="col-lg-12">
								<h3>
									<?php
									if (isset($_GET['danh_muc_id']) && intval($_GET['danh_muc_id']) > 0) {
										// Nếu danh mục được chọn, lấy tên danh mục để hiển thị
										$danhMucId = intval($_GET['danh_muc_id']);
										$tenDanhMuc = '';
										foreach ($danhMuc as $dm) {
											if ($dm['id'] == $danhMucId) {
												$tenDanhMuc = $dm['ten_danh_muc'];
												break;
											}
										}
										echo "Danh sách sản phẩm - " . htmlspecialchars($tenDanhMuc);
									} else {
										// Nếu không có danh mục được chọn, hiển thị "Tất cả sản phẩm"
										echo "Tất cả sản phẩm";
									}
									?>
								</h3>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<?php foreach ($sanPham as $sp): ?>
							<?php if ($sp['trang_thai'] == 1): ?>
								<div class="col-md-4 col-sm-6 mb-4">
									<div class="item">
										<div class="product">
											<div class='badge'>
												<?php if ($sp['so_luong'] == 0): ?>
													<div class="text">Hết hàng</div>
												<?php endif; ?>
												<a class="product-img" href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sp['id'] ?>">
													<img src="<?= BASE_URL . $sp['hinh_anh'] ?>" alt="ảnh sản phẩm"
														style="height: 250px; width:250px">
												</a>
											</div>
											<h3 class="product-name">
												<a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sp['id'] ?>"><?= $sp['ten_san_pham'] ?></a>
											</h3>
											<div class="row m-0 list-n">
												<div class="col-lg-12 p-0">
													<h3 class="product-price">
														<del><?= fomartPrice($sp['gia_san_pham']) ?></del>
													</h3>
													<h3 class="product-price"><?= fomartPrice($sp['gia_khuyen_mai']) ?></h3>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php endforeach ?>
						<div class="clearfix"></div>
						<div class="col text-center">
							<nav aria-label="Page navigation example">
								<ul class="pagination pagination-template d-flex justify-content-center float-none">
									<!-- Previous Page Link -->
									<li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
										<a class="page-link" href="?act=danh-sach-san-pham&page=<?= $page - 1 ?>">
											<i class="fa fa-angle-left"></i>
										</a>
									</li>
									<!-- Page Numbers -->
									<?php foreach (range(1, $totalPages) as $i): ?>
										<li class="page-item <?= $page == $i ? 'active' : '' ?>">
											<a class="page-link" href="?act=danh-sach-san-pham&page=<?= $i ?>"><?= $i ?></a>
										</li>
									<?php endforeach; ?>
									<!-- Next Page Link -->
									<li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
										<a class="page-link" href="?act=danh-sach-san-pham&page=<?= $page + 1 ?>">
											<i class="fa fa-angle-right"></i>
										</a>
									</li>
								</ul>
							</nav>
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