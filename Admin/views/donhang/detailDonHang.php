<!-- Header -->
<?php include './views/layout/header.php'; ?>
<!-- End header  -->

<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- End navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>
<!-- End sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-11">
					<h1>Chi tiết đơn hàng: <?= $donHang['ma_don_hang'] ?></h1>
				</div>
				<div class="col-sm-1">
					<a href="<?= ADMIN_BASE_URL . '?act=list-don-hang' ?>" class="btn btn-secondary"><i
							class="fas fa-arrow-right	"></i></a>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<?php
						if ($donHang['trang_thai_dh_id'] == 1) {
							$colorAlerts = 'primary';
						}elseif($donHang['trang_thai_dh_id'] >=2 && $donHang['trang_thai_dh_id'] <= 6){
							$colorAlerts = 'warning';
						}elseif($donHang['trang_thai_dh_id'] == 7){
							$colorAlerts = 'success';
						}else {
							$colorAlerts = 'danger';
						}
					?>
						<div class="alert alert-<?=$colorAlerts?>" role="alert">
							<strong>Đơn hàng: <?=$donHang['ten_trang_thai']?></strong>
						</div>



					<!-- Main content -->
					<div class="invoice p-3 mb-3">
						<!-- title row -->
						<div class="row">
							<div class="col-12 mb-2">
								<h4 style="font-weight:bold;">
									<i class="fas fa-mobile-alt mr-2"></i>Shop điện thoại BHA
									<small class="float-right">Ngày đặt: <?= formatDate($donHang['ngay_dat']) ?></small>
								</h4>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info">
							<div class="col-sm-4 invoice-col">
								<strong style="color:red; font-size: large;">Thông tin người đặt</strong>
								<address>
									<strong>Họ tên:</strong> <?=$donHang['ho_ten']?><br>
									<strong>Email:</strong> <?=$donHang['email']?><br>
									<strong>Số điện thoại:</strong> <?=$donHang['so_dien_thoai']?><br>
								</address>
							</div>
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<strong style="color:red; font-size: large;">Người nhận</strong>
								<address>
									<strong>Họ tên:</strong> <?=$donHang['ten_nguoi_nhan']?><br>
									<strong>Email:</strong> <?=$donHang['email_nguoi_nhan']?><br>
									<strong>Số điện thoại:</strong> <?=$donHang['sdt_nguoi_nhan']?><br>
									<strong>Địa chỉ:</strong> <?=$donHang['dia_chi_nguoi_nhan']?><br>
								</address>
							</div>
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<strong style="color:red; font-size: large;">Thông tin</strong>
								<address>
									<strong>Mã đơn hàng:</strong> <?=$donHang['ma_don_hang']?><br>
									<strong>Tổng tiền:</strong> <?= fomartPrice($donHang['tong_tien'])?><br>
									<strong>Ghi chú:</strong> <?=$donHang['ghi_chu']?><br>
									<strong>Phương thức thanh toán:</strong> <?=$donHang['ten_phuong_thuc']?><br>
								</address>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- Table row -->
						<div class="row">
							<div class="col-12 table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>#</th>
											<th>Tên sản phẩm</th>
											<th>Đơn giá</th>
											<th>Số lượng</th>
											<th>Thành tiền</th>
										</tr>
									</thead>
									<tbody>
										<?php $tong_tien = 0;?>
										<?php foreach ($sanPhamDonHang as $key => $sanPham): ?>
											<tr>
											<td><?=$key+1?></td>
											<td><?=$sanPham['ten_san_pham']?></td>
											<td><?=fomartPrice($sanPham['don_gia']) ?></td>
											<td><?=$sanPham['so_luong']?></td>
											<td><?=fomartPrice($sanPham['thanh_tien']) ?></td>
										</tr>
										<?php $tong_tien += $sanPham['thanh_tien'];?>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<div class="row">
							<!-- accepted payments column -->
							<!-- /.col -->
							<div class="col-12">
								<p class="lead">Ngày đặt hàng: <?=formatDate($donHang['ngay_dat'])?></p>

								<div class="table-responsive">
									<table class="table">
										<tr>
											<th style="width:50%">Tổng tiền:</th>
											<td>
												<?= fomartPrice($tong_tien) ?>
											</td>
										</tr>
										<tr>
											<th>Phí ship:</th>
											<td><?=fomartPrice(20000) ?></td>
										</tr>
										<tr>
											<th>Thành tiền:</th>
											<td><?=fomartPrice($tong_tien + 20000) ?></td>
										</tr>
									</table>
								</div>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- this row will not appear when printing -->
					</div>
					<!-- /.invoice -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Footer  -->
<?php include './views/layout/footer.php'; ?>
<!-- End footer  -->
<!-- Page specific script -->
</body>

</html>