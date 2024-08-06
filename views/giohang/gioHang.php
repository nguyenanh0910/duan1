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
			<li class="breadcrumb-item">Cart</li>
		</ol>
	</nav>
	<div class="row">
		<div class="col-12 col-xl-8 mb-4">
			<div class="table-responsive cart-table table-borderless">
				<table class="table">
					<thead>
						<tr>
							<th class="text-center">Sản phẩm</th>
							<th class="text-center">&nbsp;</th>
							<th class="text-center">Giá sản phẩm</th>
							<th class="text-center">Số lượng</th>
							<th>Thành tiền</th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="product-thumbnail text-center"><a href="#"><img
										src="assets/images/product-img/product-img-1.jpg" class="" alt=""></a></td>
							<td>
								<div class="cart-detail">Lorem Ipsum is simply dummy.</div>
							</td>
							<td class="text-center">
								<div style="width:80px">$10.9 </div>
							</td>
							<td class="product-quantity" data-title="Quantity">
								<div class="input-group"> <span class="input-group-btn">
										<button type="button" class="btn btn-default btn-number" data-type="minus"
											data-field="quant[1]"> <i class="fa fa-minus"></i> </button>
									</span>
									<input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">
									<span class="input-group-btn">
										<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]"> <i class="fa fa-plus"></i> </button>
									</span>
								</div>
							</td>
							<td>
								<div style="width:100px">
									$30.9</div>
							</td>
							<td><a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
						</tr>
						<tr>
							<td colspan="6">
								<table class="w-100 coupon">
									<tbody>
										<tr>
											<td class="text-end"><a href="#" class="btn cart mb-1 mt-1">Cập nhật giỏ hàng</a></td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
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
								<td class="text-end">$20.00</td>
							</tr>
							<tr class="shipping">
							<td><strong>Phí ship</strong></td>
							<td class="text-end">$20.00</td>
							</tr>
							<tr class="order-total">
								<td>
									<h5>Thành tiền</h5>
								</td>
								<td class="text-end">$40.00</td>
							</tr>
						</tbody>
					</table>
					<a href="checkout.html" class="btn cart w-100">Tiến hành thanh toán</a>
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