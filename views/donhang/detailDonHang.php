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
			<li style="margin-left: 0.5rem;">Chi tiết đơn hàng</li>
		</ol>
	</nav>
	<div class="row">
		<?php
		if ($donHang['trang_thai_dh_id'] == 1) {
			$colorAlerts = 'primary';
		} elseif ($donHang['trang_thai_dh_id'] >= 2 && $donHang['trang_thai_dh_id'] <= 6) {
			$colorAlerts = 'warning';
		} elseif ($donHang['trang_thai_dh_id'] == 7) {
			$colorAlerts = 'success';
		} else {
			$colorAlerts = 'danger';
		}
		?>
		<div class="alert alert-<?= $colorAlerts ?> d-flex justify-content-between align-items-center" role="alert">
			<strong>Đơn hàng: <?= $donHang['ten_trang_thai'] ?></strong>
			<a href="<?= BASE_URL . '?act=form-edit-thong-tin-ca-nhan-khach-hang&tab=orders' ?>" class="btn btn-secondary"><i
					class="fa fa-arrow-right"></i></a>
		</div>
		<div class="col-12 mb-2 d-flex justify-content-between">
			<h4 style="font-weight:bold;">
				<i class="fa fa-mobile" style="margin-right:10px"></i>Shop điện thoại BHA
			</h4>
			<h4 class="text-end">Ngày đặt: <?= formatDate($donHang['ngay_dat']) ?></h4>
		</div>
		<!-- /.col -->
	</div>
	<!-- info row -->
	<div class="row invoice-info">
		<div class="col-sm-4 invoice-col">
			<strong style="color:red; font-size: large;">Thông tin người đặt</strong>
			<address>
				<strong>Họ tên:</strong> <?= $donHang['ho_ten'] ?><br>
				<strong>Email:</strong> <?= $donHang['email'] ?><br>
				<strong>Số điện thoại:</strong> <?= $donHang['so_dien_thoai'] ?><br>
			</address>
		</div>
		<!-- /.col -->
		<div class="col-sm-4 invoice-col">
			<strong style="color:red; font-size: large;">Người nhận</strong>
			<address>
				<strong>Họ tên:</strong> <?= $donHang['ten_nguoi_nhan'] ?><br>
				<strong>Email:</strong> <?= $donHang['email_nguoi_nhan'] ?><br>
				<strong>Số điện thoại:</strong> <?= $donHang['sdt_nguoi_nhan'] ?><br>
				<strong>Địa chỉ:</strong> <?= $donHang['dia_chi_nguoi_nhan'] ?><br>
			</address>
		</div>
		<!-- /.col -->
		<div class="col-sm-4 invoice-col">
			<strong style="color:red; font-size: large;">Thông tin</strong>
			<address>
				<strong>Mã đơn hàng:</strong> <?= $donHang['ma_don_hang'] ?><br>
				<strong>Tổng tiền:</strong> <?= fomartPrice($donHang['tong_tien']) ?><br>
				<strong>Ghi chú:</strong> <?= $donHang['ghi_chu'] ?><br>
				<strong>Phương thức thanh toán:</strong> <?= $donHang['ten_phuong_thuc'] ?><br>
			</address>
		</div>
		<!-- /.col -->
	</div>
	<div class="row">
		<div class="col-12 table-responsive">
			<table class="table table-striped text-center">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Ảnh sản phẩm</th>
						<th scope="col">Tên sản phẩm</th>
						<th scope="col">Đơn giá</th>
						<th scope="col">Số lượng</th>
						<th scope="col">Thành tiền</th>
					</tr>
				</thead>
				<tbody>
					<?php $tong_tien = 0; ?>
					<?php foreach ($sanPhamDonHang as $key => $sanPham): ?>
						<tr>
							<td scope="row"><?= $key + 1 ?></td>
							<td><img src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="" style="width:100px"></td>
							<td><?= $sanPham['ten_san_pham'] ?></td>
							<td><?= fomartPrice($sanPham['don_gia']) ?></td>
							<td><?= $sanPham['so_luong'] ?></td>
							<td><?= fomartPrice($sanPham['thanh_tien']) ?></td>
						</tr>
						<?php $tong_tien += $sanPham['thanh_tien']; ?>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
		<!-- /.col -->
	</div>
	<div class="row mb-5">
		<div class="cart_totals">
			<div class="table-responsive">
				<table class="table table-borderless mb-0">
					<tbody>
						<tr class="cart-subtotal">
							<td>Tổng tiền</td>
							<td class="text-end total-price-2">
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
								<?= fomartPrice($tong_tien + 20000) ?>
							</td>
						</tr>
					</tbody>
				</table>
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