<div id="newsletter">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<h4>Đăng ký Nhận Bản Tin Ngay</h4>
				<p class="m-0">Nhận cập nhật qua Email về cửa hàng mới và các ưu đãi đặc biệt của chúng tôi.</p>
			</div>
			<div class="col-md-5">
				<form action="https://www.creativethemes.co.in/" method="post" id="subsForm"
					onSubmit="return ajaxmailsubscribe();">
					<div class="input-group">
						<input type="email" name="subsemail" id="subsemail" class="form-control newsletter"
							placeholder="Nhập email">
						<span class="input-group-btn">
							<button class="btn btn-theme" type="button" onClick="return ajaxmailsubscribe();">Đăng ký</button>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- view product -->
<!-- <div id="popup-1" class="popup-fcy" style="display: none;">
		<div class="row">
				<div class="col-md-6 text-center"> 
						<img id="popup-img" src="./assets/images/product-img/product-big-1.jpg" alt="" title="" class="img-fluid"> 
				</div>
				<div class="col-md-6">
						<div class="product-dis">
								<h3 id="popup-name"></h3>
								<hr>
								<p id="popup-description"></p>
								<h4 id="popup-price"></h4>
								<div class="col-md-12 mt-2 mb-2 p-0">
										<hr class="m-0 p-0">
								</div>
								<p class="m-0"><strong>Tình trạng</strong> : <span><strong id="popup-availability" class="pe-3 ps-3 pt-1 pb-1"></strong></span></p>
								<p class="mb-3"><strong>Danh mục</strong> : <span id="popup-category"></span></p>
								<div class="row">
										<div class="col-2 pr-0">
												<div class="form-outline">
														<input type="number" class="form-control px-1" step="1" value="1">
												</div>
										</div>
										<div class="col-3 pr-0"> <strong class="mt-3">Số lượng</strong> </div>
								</div>
								<div class="row mt-3">
										<div class="col-8">
												<div class="add_to_cart"><a href="#" class="">Thêm vào giỏ hàng</a></div>
												<div class="fw-bold mt-2"><a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Thêm vào yêu thích</a></div>
										</div>
										<div class="col-md-12 mt-4 p-0">
												<hr class="m-0 p-0">
										</div>
										<div class="col-12 mt-2 mb-2"><a href="#" id="popup-detail-link" class="fs-5">Xem chi tiết sản phẩm <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
										<div class="col-md-12 mb-4 p-0">
												<hr class="m-0 p-0">
										</div>
								</div>
						</div>
				</div>
		</div>
</div> -->
<!-- end product -->


<div class="container py-5">
	<div class="row">
		<div class="col-lg-4 col-md-6 col-sm-6 address wow fadeInLeft">
			<div class="footer-logo"><img src="./assets/images/logo.png" alt="" title="" class="img-fluid"></div>
			<p>Địa chỉ: 123-45 Đường 11378 Manchester</p>
			<p>Điện thoại: +12 3456 78901</p>
			<p>Email: <a href="mailto:info.organicstore@gmail.com">info.organicstore@gmail.com</a></p>
			<ul class="social-2">
				<li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#" title="instagram"><i class="fa fa-instagram"></i></a></li>
				<li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
			</ul>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 footer-link wow fadeInLeft">
			<h3>Thông tin</h3>
			<ul>
				<li><a href="about-us.html">Về Chúng Tôi</a></li>
				<li><a href="faq.html">Câu Hỏi Thường Gặp</a></li>
				<li><a href="contact.html">Liên Hệ</a></li>
				<li><a href="shop.html">Cửa Hàng</a></li>
			</ul>
		</div>
		<div class="col-lg-3 col-md-6 col-sm-6 footer-link wow fadeInLeft">
			<h3>Tài Khoản Của Tôi</h3>
			<ul>
				<?php if (isset($_SESSION['user'])): ?>
					<li><a href="<?= BASE_URL . '?act=form-edit-thong-tin-ca-nhan-khach-hang' ?>">Tài Khoản Của Tôi</a></li>
				<?php else: ?>
					<li><a href="<?= BASE_URL . '?act=login-client' ?>">Đăng Nhập</a></li>
					<li><a href="<?=BASE_URL . '?act=form-dang-ky-client'?>">Đăng Ký</a></li>
				<?php endif; ?>
				<li><a href="wishlist.html">Danh Sách Yêu Thích</a></li>

			</ul>
		</div>
		<div class="col-lg-2 col-md-6 col-sm-6 footer-link wow fadeInLeft">
			<h3>Liên Kết Nhanh</h3>
			<ul>
				<li><a href="cart.html">Giỏ Hàng</a></li>
				<li><a href="wishlist.html">Danh Sách Yêu Thích</a></li>
				<li><a href="comingsoon.html">Sắp Ra Mắt</a></li>
				<li><a href="404.html">404</a></li>
			</ul>
		</div>
	</div>
</div>
<footer class="py-4 bg-dark">
	<div class="container copy-right">
		<div class="row">
			<div class="col-md-6 text-white"> Bản quyền © 2024 </div>
		</div>
	</div>
</footer>

<!--easyzoom-->
<script src="./assets/js/ajax.js"></script>
<script src="./assets/js/formValidation.js"></script>
<script src="./assets/vendor/detail-page/jquery-3.1.1.min.js"></script>
<script src="./assets/vendor/jquery/easyzoom.js"></script>
<script src="./assets/vendor/jquery/easyzoom-script.js"></script>
<!--easyzoom-->
<!-- import jquery -->
<!--bootstrap-->
<script src="./assets/vendor/jquery/jquery.min.js"></script>
<script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--bootstrap-->
<!--wow-->
<script src="./assets/vendor/wow/wow.js"></script>
<script src="./assets/vendor/wow/page.js"></script>
<!--wow-->
<!--owlcarousel-->
<script src="./assets/owlcarousel/owl.carousel.js"></script>
<!--owlcarousel-->
<!--related-products-->
<script src="./assets/vendor/detail-page/related-products.js"></script>
<script src="./assets/vendor/detail-page/index.js"></script>
<script src="./assets/vendor/jquery/quality.js"></script>
<script src="./assets/vendor/jquery/product.js"></script>
<!--related-products-->
<!--fancybox files -->
<link rel="stylesheet" href="./assets/css/product-hover.css">
<link rel="stylesheet" href="./assets/vendor/fancy-box/fancybox.min.css">
<script src="./assets/vendor/fancy-box/jquery.fancybox.min.js"></script>
<!--fancybox files -->
<!--script-->
<script src="./assets/vendor/jquery/home-1.js"></script>
<!--script-->
<!-- animation-->
<script src="./assets/vendor/wow/wow.js"></script>
<script src="./assets/vendor/wow/page.js"></script>
<!-- animation-->
<!--select-dropdown-->
<script src="./assets/vendor/jquery/custom-select.js"></script>
<!--select-dropdown-->
<!--fancybox files -->
<link rel="stylesheet" href="./assets/css/product-hover.css">
<link rel="stylesheet" href="./assets/vendor/fancy-box/fancybox.min.css">
<script src="./assets/vendor/fancy-box/jquery.fancybox.min.js"></script>
<!--fancybox files -->
<!--banner js-->
<script src="./assets/vendor/revolution/vendor/revslider/js/jquery.themepunch.tools.min.js"></script>
<script src="./assets/vendor/revolution/vendor/revslider/js/jquery.themepunch.revolution.min.js"></script>
<script src="./assets/vendor/revolution/vendor/revslider/js/extensions/revolution.extension.actions.min.js"></script>
<script
	src="./assets/vendor/revolution/vendor/revslider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="./assets/vendor/revolution/vendor/revslider/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="./assets/vendor/revolution/vendor/revslider/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="./assets/vendor/revolution/vendor/revslider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="./assets/js/banner.js"></script>
<!--banner js-->
<!--scrolltop-->
<!-- <script src="./assets/vendor/jquery/scrolltopcontrol.js"></script>
<script src="./assets/vendor/revolution/responsiveslides.min.js"></script> -->
<!--scrolltop-->
<p data-bs-toggle="modal" class="no-margin" data-bs-target="#myModal" id="model2"></p>
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-dialog2">
		<div class="modal-content text-center">
			<div class="modal-body modal-body2">
				<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				<p><img src="./assets/images/success.svg" width="50" alt="" title=""></p>
				<h3 class="modal-title">Thank you</h3>
				<h4 class="thanks mt-2">Your submission is recevied and we will contact you soon.</h4>
				<a href="https://themeforest.net/item/organic-store-multipurpose-ecommerce-bootstrap-html5-template/23986984"
					target="_blank" class="btn add-to-cart2 d-inline-block font-15 rounded">BUY THIS TEMPLATE NOW</a> <a
					href="index.html" class="back-to-home d-block small mt-2"><i class="fa fa-long-arrow-left"></i> BACK TO
					HOME</a>
			</div>
		</div>
	</div>
</div>