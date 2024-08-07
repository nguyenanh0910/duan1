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
			<li style="margin-left: 0.5rem;"><a href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>"> Sản phẩm</a> /</li>
			<li style="margin-left: 0.5rem;">Chi tiết sản phẩm</li>
		</ol>
	</nav>
	<div class="clearfix"></div>
</div>
<div class="inner-header2">
	<h3>Orange</h3>
</div>
<div class="inner-page">
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-lg-6"> <a href="wishlist.html" class="wish-list"><i class="fa fa-heart"
						aria-hidden="true"></i></a>
				<div id="sync1" class="owl-carousel owl-theme">
					<?php foreach ($listAnhSanPham as $anh): ?>
						<div class="item">
							<div class="item easyzoom easyzoom--overlay"> <a href="<?= BASE_URL . $anh['link_anh'] ?>"> <img
										src="<?= BASE_URL . $anh['link_anh'] ?>" alt="" title="" style="height:360px; width:360px;"> </a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div id="sync2" class="owl-carousel owl-theme">
					<?php foreach ($listAnhSanPham as $anh): ?>
						<div class="item"><img src="<?= BASE_URL . $anh['link_anh'] ?>" alt="" title=""
								style="height:54px; width:78.67px;"></div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col-lg-6  product-text d-flex flex-column">
				<div class="row flex-grow-1">
					<div class="col-md-6 col-sm-6 col-6">
						<h3><?= $sanPham['ten_san_pham'] ?></h3>
					</div>
					<div class="col-md-6 col-sm-6  col-6">
						<div class="price-css"> <span><del><?= fomartPrice($sanPham['gia_san_pham']) ?></del></span>
							<div class="clearfix"></div>
							<?= fomartPrice($sanPham['gia_khuyen_mai']) ?>
						</div>
					</div>
					<div class="col-md-12">
						<div class="mt-3">
							<div class="mt-3 text-2">
								<p><strong>Tình trạng</strong>: &nbsp;&nbsp;
									<?= $sanPham['so_luong'] > 0 ? '<i class="fa fa-check-circle" aria-hidden="true" style="color: green;"></i> Còn hàng' : '<i class="fa fa-times-circle" aria-hidden="true" style="color: red;"></i> Hết hàng' ?>
								</p>
								<p><strong>Danh mục</strong>: &nbsp;&nbsp;<?= $sanPham['ten_danh_muc'] ?> </p>
							</div>
							<div class="quality">
								<form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="POST">
									<?php if (isset($_SESSION['message'])) {
										$alertClass = strpos($_SESSION['message'], 'thành công') !== false ? 'alert-success' : 'alert-danger';
										?>
										<div class="alert <?= $alertClass ?> alert-dismissable">
											<i
												class="fa fa-<?= $alertClass == 'alert-success' ? 'check-circle' : 'exclamation-circle' ?> mr-2"></i>
											<?= $_SESSION['message'] ?>
										</div>
										<?php unset($_SESSION['message']); // Xóa thông báo khỏi session ?>
									<?php } ?>
									<input type="hidden" name="id" value="<?= $sanPham['id'] ?>">
									<div class="row align-items-center">
										<div class="col-md-6 col-sm-6">
											<div class="d-flex" style="text-align:center; align-items:center">
												<h4>Số lượng :</h4>
												<span class="input-group-btn pl-1" style="width:50%">
													<input type="number" name="so_luong" min="1" step="1" value="1"
														style="width:50%; text-align:center">
												</span>
											</div>
										</div>
										<div class="col-md-6 col-sm-6"> <button type="submit" class="btn add-to-cart2">Thêm vào giỏ
												hàng</button></div>
								</form>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="align-self-end">
							<div class="share">
								<h3 class="pull-left">Chia sẻ : &nbsp; &nbsp;</h3>
								<div class="pull-left">
									<ul class="social-network3">
										<li><a href="#" class="facebook-icon" title=""><i class="fa fa-facebook"></i></a></li>
										<li><a href="#" class="twitter-icon" title=""><i class="fa fa-twitter"></i></a></li>
										<li><a href="#" class="google-icon" title=""><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#" class="linkedin-icon" title=""><i class="fa fa-linkedin"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="container">
								<div class="list-3 row mb-3">
									<div class="col-lg-4"><img src="./assets/images/shield.png" alt=""> Đổi trả trong 10 ngày</div>
									<div class="col-lg-4"><img src="./assets/images/shipping.png" alt=""> Giao hàng toàn quốc</div>
									<div class="col-lg-4"><img src="./assets/images/transfer.png" alt=""> Hoàn tiền lên đến 35%</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
		<div class="col-md-12">
			<div id="tabs" class="description">
				<div>
					<nav>
						<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist"> <a class="active" id="nav-home-tab"
								data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Thông
								tin sản phẩm</a>&nbsp;|&nbsp;<a class="" id="nav-contact-tab" data-bs-toggle="tab" href="#nav-contact"
								role="tab" aria-controls="nav-contact" aria-selected="false">Bình luận sản phẩm</a> </div>
					</nav>
					<div class="tab-content" id="nav-tabContent">
						<div class="tab-pane fade show active text-1" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
							<p class="p1"><?= $sanPham['mo_ta'] ?></p>
						</div>
						<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
							<div class="row">
								<div class="col-md-6">
									<div class="row m-0 text-center-m">
										<?php $totalBinhLuan = count($listBinhLuan); ?>
										<?php foreach ($listBinhLuan as $index => $binhLuan): ?>
											<?php if ($binhLuan['trang_thai'] != 2): ?>
												<div class="col-lg-2 col-md-3 col-sm-2 text-center mb-3"><img style="width:60px"
														src="<?= BASE_URL . $binhLuan['anh_dai_dien'] ?>" alt="ảnh đại diện" title=""
														class="radius image-boder img-fluid"
														onerror="this.onerror = null; this.src='https://cdn.icon-icons.com/icons2/589/PNG/256/icontexto-user-web20-delicious_icon-icons.com_55375.png'">
												</div>
												<div class="col-lg-10 col-md-9 col-sm-10">
													<h2 style="font-weight:bold" class="font-15 mt-10"><?= $binhLuan['ho_ten'] ?></h2>
													<span class="red"><?= formatDate($binhLuan['ngay_dang']) ?></span>
													<div class="mt-1">
														<p><?= $binhLuan['noi_dung'] ?></p>
													</div>
												</div>
												<div class="clearfix"></div>
												<?php if ($index < $totalBinhLuan - 1): ?>
													<div class="col-12">
														<hr>
													</div>
												<?php endif; ?>
											<?php endif; ?>
										<?php endforeach ?>
									</div>
								</div>
								<?php if (isset($_SESSION['user'])): ?>
									<div class="col-md-6">
										<?php if (isset($_SESSION['message2'])) {
											$alertClass = strpos($_SESSION['message2'], 'thành công') !== false ? 'alert-success' : 'alert-danger';
											?>
											<div class="alert <?= $alertClass ?> alert-dismissable">
												<i
													class="fa fa-<?= $alertClass == 'alert-success' ? 'check-circle' : 'exclamation-circle' ?> mr-2"></i>
												<?= $_SESSION['message2'] ?>
											</div>
											<?php unset($_SESSION['message2']); // Xóa thông báo khỏi session ?>
										<?php } ?>
										<h4>Viết đánh giá của bạn</h4>
										<form action="<?= BASE_URL . '?act=gui-binh-luan' ?>" class="review-form" method="POST">
											<input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
											<div class="form-group mb-3">
												<textarea class="form-control" name="noi_dung" rows="5"
													placeholder="Nhập nội dung đánh giá vào đây"></textarea>
												<?php if (isset($_SESSION['error']['noi_dung'])) { ?>
													<p class="text-danger"><?= $_SESSION['error']['noi_dung'] ?></p>
												<?php } ?>
											</div>
											<button type="submit" class="btn add-to-cart3">Đăng</button>
									</div>
									</form>
								<?php else: ?>
									<div class="col-md-6">
										<h5 class="text-danger">Vui lòng đăng nhập để có thể bình luận</h5>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="related">
		<div class="col-md-12">
			<h2 class="wow fadeInDown">Sản Phẩm Liên Quan</h2>
			<div class="owl-carousel latest-products owl-theme wow fadeIn">
				<?php foreach ($sanPhamCungLoai as $sanPham): ?>
					<div class="item">
						<div class="product">
							<!-- <div class="item-product"> -->
							<div class="carousel slide" data-ride="carousel">
								<div class="carousel-inner">
									<div class="carousel-item active">
										<div class='badge'>
											<a class="product-img" href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>"><img
													src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="ảnh sản phẩm"
													style="height: 250px; width:250px"></a>
										</div>
									</div>
								</div>
							</div>
							<a class="name" href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>">
								<h3 class="product-name text-capitalize"><?= $sanPham['ten_san_pham'] ?></h3>
							</a>
							<h3 class="product-price"><del><?= fomartPrice($sanPham['gia_san_pham']) ?></del></h3>
							<h3 class="product-price"><?= fomartPrice($sanPham['gia_khuyen_mai']) ?></h3>
							<!-- </div> -->
							<!-- <div class="product-select">
							<button data-bs-toggle="tooltip" data-bs-placement="top" title="" class="add-to-compare round-icon-btn"
								data-id="< $sanPham['id'] >" data-src="#popup-1"><i class="fa fa-eye" aria-hidden="true"></i></button>
							<button data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist"
								class="add-to-wishlist round-icon-btn" onClick="window.location.href='wishlist.html'"><i
									class="fa fa-heart-o" aria-hidden="true"></i></button>
							<button data-bs-toggle="tooltip" data-bs-placement="top" title="Add To Cart"
								onClick="window.location.href='cart.html'" class="add-to-cart round-icon-btn"><i
									class="fa fa-shopping-bag" aria-hidden="true"></i></button>
						</div> -->
						</div>
					</div>
				<?php endforeach ?>
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
<script>
	document.addEventListener('DOMContentLoaded', function () {
		// Function to get URL parameter
		function getUrlParameter(name) {
			name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
			var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
			var results = regex.exec(location.search);
			return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
		}

		// Get the value of the 'tab' parameter
		var activeTab = getUrlParameter('tab');

		// If a tab is specified in the URL, activate it
		if (activeTab) {
			var tabElement = document.querySelector('.nav a[href="#' + activeTab + '"]');
			if (tabElement) {
				var tab = new bootstrap.Tab(tabElement);
				tab.show();
			}
		}
	});
</script>

</html>