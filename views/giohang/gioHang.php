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
			<li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a>
				/
			</li>
			<li style="margin-left: 0.5rem;">Giỏ hàng</li>
		</ol>
	</nav>
	<?php if (!empty($cartItems)) { ?>
		<div class="row">
			<div class="col-12 col-xl-8 mb-4">
				<div class="table-responsive cart-table table-borderless">
					<?php if (isset($_SESSION['error_message'])): ?>
						<div class="alert alert-danger">
							<?= $_SESSION['error_message'] ?>
						</div>
						<?php unset($_SESSION['error_message']); ?>
					<?php endif; ?>
					<table class="table text-center">
						<thead>
							<tr>
								<th>#</th>
								<th>Sản phẩm</th>
								<th>&nbsp;</th>
								<th>Giá sản phẩm</th>
								<th>Số lượng</th>
								<th>Thành tiền</th>
								<th> </th>
							</tr>
						</thead>
						<?php
						$tong_tien = 0;
						?>
						<tbody>
							<?php foreach ($cartItems as $key => $cart): ?>
								<?php
								// Tính tổng tiền cho sản phẩm này
								$totalPrice = $cart['gia_khuyen_mai'] * $cart['so_luong'];
								$tong_tien += $totalPrice;
								?>
								<tr data-product-id="<?= $cart['id'] ?>">
									<td><?= $key + 1 ?></td>
									<td class="product-thumbnail text-center"><a href="#"><img src="<?= BASE_URL . $cart['hinh_anh'] ?>"
												alt="ảnh sản phẩm"></a></td>
									<td>
										<div class="cart-detail"><?= $cart['ten_san_pham'] ?></div>
									</td>
									<td>
										<?php if($cart['gia_khuyen_mai']) :?>
										<div class="price" data-product-id="<?= $cart['san_pham_id'] ?>">
											<?= fomartPrice($cart['gia_khuyen_mai']) ?>
										</div>
										<?php else: ?>
											<div class="price" data-product-id="<?= $cart['san_pham_id'] ?>">
											<?= fomartPrice($cart['gia_san_pham']) ?>
										</div>
										<?php endif ?>
									</td>
									<td class="product-quantity" style="padding-left:53px">
										<div class="input-group">
											<span class="input-group-btn">
												<button class="btn btn-default btn-number" data-action="minus"
													data-product-id="<?= $cart['san_pham_id'] ?>">
													<i class="fa fa-minus"></i>
												</button>
											</span>
											<input type="text" class="form-control input-number" value="<?= $cart['so_luong'] ?>" min="1"
												data-product-id="<?= $cart['san_pham_id'] ?>" readonly>
											<span class="input-group-btn">
												<button class="btn btn-default btn-number" data-action="plus"
													data-product-id="<?= $cart['san_pham_id'] ?>">
													<i class="fa fa-plus"></i>
												</button>
											</span>
										</div>
									</td>
									<td>
										<div class="total-price" data-product-id="<?= $cart['san_pham_id'] ?>"><?= fomartPrice($totalPrice) ?>
										</div>
									</td>
									<td><a href="<?= BASE_URL . '?act=xoa-san-pham-gio-hang&id=' . $cart['id'] ?>"
											onclick="return confirm('Bạn có muốn xóa không?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-12 col-xl-4 mb-5">
				<div class="cart_totals">
					<div class="table-responsive">
						<table class="table table-borderless mb-0">
							<tbody>
								<tr class="cart-subtotal">
									<td>Tổng tiền</td>
									<td class="text-end total-price-2" data-product-id="<?= $cart['san_pham_id'] ?>">
										<?= fomartPrice($tong_tien) ?>
									</td>
								</tr>
								<tr class="shipping">
									<td><strong>Phí ship</strong></td>
									<td class="text-end price-ship"><?= fomartPrice(20000) ?></td>
								</tr>
								<tr class="order-total">
									<td>
										<h5 style="font-weight:bold">Thành tiền</h5>
									</td>
									<td style="font-weight:bold; font-size:large;" class="text-end total-price-3"
										data-product-id="<?= $cart['san_pham_id'] ?>">
										<?= fomartPrice((20000 + $tong_tien)) ?>
									</td>
								</tr>
							</tbody>
						</table>
						<a href="<?= BASE_URL . '?act=form-thanh-toan' ?>" class="btn cart w-100">Tiến hành thanh toán</a>
					</div>
				</div>
			</div>
		</div>
	<?php } else { ?>
		<p class="text-center text-danger">Không có sản phẩm trong giỏ hàng. Vui lòng truy cập trang <a
				href="<?= BASE_URL . '?act=danh-sach-san-pham' ?>">sản phẩm</a> để mua hàng</p>
	<?php } ?>
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
<script>
	document.addEventListener('DOMContentLoaded', function () {
		// Xử lý các nút cộng/trừ
		const buttons = document.querySelectorAll('.btn-number');

		buttons.forEach(button => {
			button.addEventListener('click', function (event) {
				event.preventDefault();
				const action = this.getAttribute('data-action');
				const productId = this.getAttribute('data-product-id');
				const quantityInput = document.querySelector(`.input-number[data-product-id="${productId}"]`);

				if (quantityInput) {
					let quantity = parseInt(quantityInput.value);
					if (isNaN(quantity)) {
						quantity = 1; // Đặt số lượng mặc định nếu giá trị không hợp lệ
					}

					if (action === 'plus') {
						quantity++;
					} else if (action === 'minus' && quantity > 1) {
						quantity--;
					}

					// Cập nhật số lượng sản phẩm trên trang
					quantityInput.value = quantity;

					// Gửi yêu cầu AJAX để cập nhật số lượng sản phẩm
					const xhr = new XMLHttpRequest();
					xhr.open('POST', '<?= BASE_URL . '?act=cap-nhat-gio-hang' ?>', true);
					xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
					xhr.onload = function () {
						if (xhr.status === 200) {
							// Xử lý phản hồi từ máy chủ nếu cần
							console.log('Số lượng sản phẩm đã được cập nhật.');

							// Cập nhật giá cho sản phẩm cụ thể
							const priceElement = document.querySelector(`.price[data-product-id="${productId}"]`);
							const totalPriceElement = document.querySelector(`.total-price[data-product-id="${productId}"]`);

							if (priceElement && totalPriceElement) {
								const price = parseFloat(priceElement.textContent.replace(/[^0-9]+/g, ""));
								const totalPrice = price * quantity;
								const formattedTotalPrice = totalPrice.toLocaleString('vi-VN', { minimumFractionDigits: 0 }) + ' VNĐ';
								totalPriceElement.textContent = formattedTotalPrice;
							}

							// Cập nhật tổng giá của tất cả các sản phẩm
							const priceElements = document.querySelectorAll('.price[data-product-id]');
							let totalPrice2 = 0;
							const shippingFee = 20000; // Phí vận chuyển

							priceElements.forEach(priceElement => {
								const productId = priceElement.getAttribute('data-product-id');
								const quantityInput = document.querySelector(`.input-number[data-product-id="${productId}"]`);
								if (quantityInput) {
									const quantity = parseInt(quantityInput.value) || 1;
									const price = parseFloat(priceElement.textContent.replace(/[^0-9]+/g, ""));
									totalPrice2 += price * quantity;
								}
							});

							// Định dạng tổng giá sản phẩm
							const formattedTotalPrice2 = totalPrice2.toLocaleString('vi-VN', { minimumFractionDigits: 0 }) + ' VNĐ';

							// Tính tổng tiền bao gồm phí ship
							const totalPrice3 = totalPrice2 + shippingFee;
							const formattedTotalPrice3 = totalPrice3.toLocaleString('vi-VN', { minimumFractionDigits: 0 }) + ' VNĐ';

							// Cập nhật phần tử với giá đã định dạng
							const totalPriceElement2 = document.querySelector('.total-price-2');
							const totalPriceElement3 = document.querySelector('.total-price-3');

							if (totalPriceElement2) {
								totalPriceElement2.textContent = formattedTotalPrice2;
							}
							if (totalPriceElement3) {
								totalPriceElement3.textContent = formattedTotalPrice3;
							}
						} else {
							console.error('Lỗi khi cập nhật số lượng sản phẩm.');
						}
					};
					xhr.send('product_id=' + encodeURIComponent(productId) + '&quantity=' + encodeURIComponent(quantity));
				} else {
					console.error('Không tìm thấy phần tử input-number.');
				}
			});
		});
	});


</script>




</html>