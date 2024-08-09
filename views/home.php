<!-- header  -->
<?php include './views/layout/header.php'; ?>
<!-- end header -->

<!-- navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- end navbar -->

<!-- content  -->

<!-- slider -->
<div class="text-center">
	<img src="./assets/images/rev-banner/img-1.jpg" alt="banner" style="width:100%">
</div>
<!--end slider -->

<!-- icon ship  -->
<div class="clearfix"></div>
<div class="banner-patten mt-4 mb-4">
	<div class="container">
		<div class="banner-div" style="top:0">
			<div class="row m-0">
				<div class="col-lg-4 col-md-4 col-sm-4 boder-left wow fadeInLeft">
					<img src="./assets/images/shipping.png" alt="" title="">
					<h4 class="text-uppercase">Giao Hàng Miễn Phí</h4>
					<p>Cho tất cả đơn hàng trên 4.999.999 VNĐ</p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 boder-left wow fadeInLeft">
					<img src="./assets/images/timing.png" alt="" title="">
					<h4 class="text-uppercase">Giao Hàng Đúng Hẹn</h4>
					<p>Dịch vụ giao hàng đáng tin cậy và nhanh chóng</p>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 wow fadeInLeft">
					<img src="./assets/images/card.png" alt="" title="">
					<h4 class="text-uppercase">Thanh Toán Bảo Mật</h4>
					<p>Thanh toán 100% bảo mật</p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- icon ship  -->

<!-- Page Content -->
<div class="products-section">
	<div class="container">
		<h2 class="wow fadeInDown">Sản Phẩm Mới</h2>
		<div class="owl-carousel latest-products owl-theme wow fadeIn">
			<?php foreach ($sanPhamNew as $sanPham): ?>
				<?php if ($sanPham['trang_thai'] == 1): ?>
					<div class="item">
						<div class="product">
							<div class='badge'>
								<?php if ($sanPham['so_luong'] == 0): ?>
									<div class="text">Hết hàng</div>
								<?php endif; ?>
								<a class="product-img" href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>">
									<img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="ảnh sản phẩm" style="height: 250px; width:250px">
								</a>
							</div>
							<h3 class="product-name">
								<a
									href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
							</h3>
							<div class="row m-0 list-n">
								<div class="col-lg-12 p-0">
									<h3 class="product-price">
										<del><?= fomartPrice($sanPham['gia_san_pham']) ?></del>
									</h3>
									<h3 class="product-price"><?= fomartPrice($sanPham['gia_khuyen_mai']) ?></h3>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach ?>
		</div>
	</div>
</div>
<!--Three-images-->
<div class="three-img">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-4 col-md-6 text-center wow fadeIn mb-3">
				<ul class="ch-grid">
					<li>
						<div class="ch-item"
							style="background:url(./assets/images/product/left-img.jpg) no-repeat center top; background-size:100% 100%">
						</div>
					</li>
				</ul>
			</div>
			<div class="col-lg-4  col-md-6 text-center wow fadeIn mb-3">
				<ul class="ch-grid">
					<li>
						<div class="ch-item"
							style="background:url(./assets/images/product/center-img.jpg) no-repeat center top; background-size:100% 100%">
						</div>
					</li>
				</ul>
			</div>
			<div class="col-lg-4 col-md-6 text-center wow fadeIn mb-3">
				<div class="position-relative">
					<ul class="ch-grid">
						<li>
							<div class="ch-item"
								style="background:url(./assets/images/product/right-img.jpg) no-repeat center top; background-size:100% 100%">
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Three-images-->
<div id="bestsellers">
	<div class="container">
		<h2 class="wow fadeInDown">Sản Phẩm Bán Chạy</h2>
		<div class="owl-carousel latest-products owl-theme wow fadeIn">
			<?php foreach ($sanPhamBanChay as $sanPham): ?>
				<?php if ($sanPham['trang_thai'] == 1): ?>
					<div class="item">
						<div class="product">
							<div class='badge'>
								<?php if ($sanPham['so_luong'] == 0): ?>
									<div class="text">Hết hàng</div>
								<?php endif; ?>
								<a class="product-img" href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>">
									<img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="ảnh sản phẩm" style="height: 250px; width:250px">
								</a>
							</div>
							<h3 class="product-name">
								<a
									href="<?= BASE_URL . '?act=chi-tiet-san-pham&id=' . $sanPham['id'] ?>"><?= $sanPham['ten_san_pham'] ?></a>
							</h3>
							<div class="row m-0 list-n">
								<div class="col-lg-12 p-0">
									<h3 class="product-price">
										<del><?= fomartPrice($sanPham['gia_san_pham']) ?></del>
									</h3>
									<h3 class="product-price"><?= fomartPrice($sanPham['gia_khuyen_mai']) ?></h3>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endforeach ?>
		</div>
	</div>
</div>
<div class="clearfix"></div>

<!-- end content -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- end footer  -->

</body>

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
<!-- <script>
	$(document).ready(function () {
		$('.add-to-compare').on('click', function () {
			var productId = $(this).data('id');

			$.ajax({
				url: ' BASE_URL . '?act=detailAjax' ', // Đảm bảo BASE_URL đã được định nghĩa đúng
				type: 'GET',
				data: { id: productId },
				success: function (response) {
					var data = JSON.parse(response);
					if (data.error) {
						alert(data.error);
					} else {
						$('#popup-img').attr('src', data.image);
						$('#popup-name').text(data.name);
						$('#popup-description').text(data.description);
						$('#popup-price').text(data.price);
						$('#popup-availability').text(data.availability);
						if (data.availability === 'Còn Hàng') {
							$('#popup-availability').removeClass('text-bg-danger').addClass('text-bg-success');
						} else {
							$('#popup-availability').removeClass('text-bg-success').addClass('text-bg-danger');
						}
						$('#popup-category').text(data.category);

						// Cập nhật liên kết chi tiết sản phẩm
						$('#popup-detail-link').attr('href', '< BASE_URL . '?act=detail-san-pham&id=' >' + productId);

						// Hiển thị popup
						$.fancybox.open({
							src: '#popup-1',
							type: 'inline'
						});
					}
				},
				error: function () {
					alert('Có lỗi xảy ra, vui lòng thử lại.');
				}
			});
		});
	});
</script> -->

</html>