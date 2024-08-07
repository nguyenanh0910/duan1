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
			<li style="margin-left: 0.5rem;">Thanh toán</li>
		</ol>
	</nav>
	<form action="<?= BASE_URL . '?act=xac-nhan-thanh-toan' ?>" method="POST">
		<div class="row mb-5">
			<div class="col-12 col-xl-8">
				<h5 class="font-weight-bold">Thông tin thanh toán</h5>
				<div class="form-group mb-3">
					<label><input type="checkbox" id="default_address" name="default_address" checked> Địa chỉ mặc định</label>
					<label style="margin-left:10px"><input type="checkbox" id="new_address" name="new_address"> Địa chỉ mới</label>
				</div>
				<div class="row">
					<div class="col-md-12 mb-3">
						<div class="form-group">
							<label>Họ tên người nhận</label>
							<input type="text" class="form-control" id="ten_nguoi_nhan" name="ten_nguoi_nhan" placeholder="Họ tên">
							<?php if (isset($_SESSION['error']['ten_nguoi_nhan'])) { ?>
								<p class="text-danger"><?= $_SESSION['error']['ten_nguoi_nhan'] ?></p>
							<?php } ?>
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<div class="form-group">
							<label>Số điện thoại nhận hàng</label>
							<input type="text" class="form-control" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan"
								placeholder="Số điện thoại">
							<?php if (isset($_SESSION['error']['sdt_nguoi_nhan'])) { ?>
								<p class="text-danger"><?= $_SESSION['error']['sdt_nguoi_nhan'] ?></p>
							<?php } ?>
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<div class="form-group">
							<label>Email người nhận</label>
							<input type="email" class="form-control" id="email_nguoi_nhan" name="email_nguoi_nhan"
								placeholder="Email">
							<?php if (isset($_SESSION['error']['email_nguoi_nhan'])) { ?>
								<p class="text-danger"><?= $_SESSION['error']['email_nguoi_nhan'] ?></p>
							<?php } ?>
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<div class="form-group">
							<label>Địa chỉ nhận hàng</label>
							<input type="text" class="form-control" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan"
								placeholder="Địa chỉ">
							<?php if (isset($_SESSION['error']['dia_chi_nguoi_nhan'])) { ?>
								<p class="text-danger"><?= $_SESSION['error']['dia_chi_nguoi_nhan'] ?></p>
							<?php } ?>
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<div class="form-group">
							<label>Phương thức thanh toán</label>
							<select class="form-control form-select" name="phuong_thuc_tt_id">
								<option disabled selected>Chọn phương thức thanh toán</option>
								<?php foreach ($phuongThucThanhToan as $thanhToan): ?>
									<option value="<?= $thanhToan['id'] ?>"><?= $thanhToan['ten_phuong_thuc'] ?></option>
								<?php endforeach; ?>
							</select>
							<?php if (isset($_SESSION['error']['phuong_thuc_tt_id'])) { ?>
								<p class="text-danger"><?= $_SESSION['error']['phuong_thuc_tt_id'] ?></p>
							<?php } ?>
						</div>
					</div>
					<div class="col-md-12 mb-3">
						<div class="form-group">
							<label>Ghi chú đơn hàng</label>
							<textarea class="form-control" id="order_comments" name="ghi_chu" placeholder="Ghi chú"
								rows="5"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-xl-4">
				<div class="cart_totals">
					<div class="table-responsive">
						<table class="table table-borderless mb-0">
							<h4 class="text-center" style="font-weight:bold">Hóa đơn</h4>
							<tbody>
								<tr>
									<th>Sản phẩm</th>
									<th class="text-end">Giá tiền</th>
								</tr>
								<?php
								$price = 0;
								$tong = 0;
								?>
								<?php foreach ($cartItems as $item): ?>
									<tr class="product-boder">
										<td class="flat-rate"><?= $item['ten_san_pham'] ?> x <?= $item['so_luong'] ?></td>
										<td class="text-end "><?= fomartPrice($price = ($item['gia_khuyen_mai'] * $item['so_luong'])) ?></td>
									</tr>
									<?php $tong += $price; ?>
								<?php endforeach ?>
								<tr class="product-boder">
									<td><strong>Tổng</strong></td>
									<td class="text-end "><?= fomartPrice($tong) ?></td>
								</tr>
								<tr class="product-boder">
									<td><strong>Ship</strong> </td>
									<td class="text-end "><?= fomartPrice(20000) ?></td>
								</tr>
								<tr>
									<td><strong>Thành tiền:</strong></td>
									<td class="text-end amount"><?= fomartPrice($tong + 20000) ?></td>
								</tr>
							</tbody>
						</table>
						<input type="hidden" name="tong_tien" value="<?= $tong + 20000 ?>">
						<div class="mt-2">
							<button type="submit" class="btn cart w-100"> Xác nhận thanh toán </button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
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
    document.addEventListener('DOMContentLoaded', function() {
        const defaultAddressCheckbox = document.getElementById('default_address');
        const newAddressCheckbox = document.getElementById('new_address');
        
        const tenNguoiNhanInput = document.getElementById('ten_nguoi_nhan');
        const sdtNguoiNhanInput = document.getElementById('sdt_nguoi_nhan');
        const emailNguoiNhanInput = document.getElementById('email_nguoi_nhan');
        const diaChiNguoiNhanInput = document.getElementById('dia_chi_nguoi_nhan');

        // Auto-fill default address if checkbox is checked by default
        if (defaultAddressCheckbox.checked) {
            tenNguoiNhanInput.value = "<?= $_SESSION['user']['ho_ten'] ?>";
            sdtNguoiNhanInput.value = "<?= $_SESSION['user']['so_dien_thoai'] ?>";
            emailNguoiNhanInput.value = "<?= $_SESSION['user']['email'] ?>";
            diaChiNguoiNhanInput.value = "<?= $_SESSION['user']['dia_chi'] ?>";
        }

        defaultAddressCheckbox.addEventListener('change', function() {
            if (this.checked) {
                // Fill in default address data
                tenNguoiNhanInput.value = "<?= $_SESSION['user']['ho_ten'] ?>";
                sdtNguoiNhanInput.value = "<?= $_SESSION['user']['so_dien_thoai'] ?>";
                emailNguoiNhanInput.value = "<?= $_SESSION['user']['email'] ?>";
                diaChiNguoiNhanInput.value = "<?= $_SESSION['user']['dia_chi'] ?>";
                
                newAddressCheckbox.checked = false; // Uncheck new address
            }
        });

        newAddressCheckbox.addEventListener('change', function() {
            if (this.checked) {
                // Clear the inputs for new address
                tenNguoiNhanInput.value = '';
                sdtNguoiNhanInput.value = '';
                emailNguoiNhanInput.value = '';
                diaChiNguoiNhanInput.value = '';
                
                defaultAddressCheckbox.checked = false; // Uncheck default address
            }
        });
    });
</script>


</html>