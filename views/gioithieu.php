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
			<li style="margin-left: 0.5rem;">Giới thiệu</li>
		</ol>
	</nav>
</div>
<div class="clearfix"></div>
<div class="page-section section pt-120 pb-45">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<!-- Blog Item -->
				<div class="blog-item mb-5" >
					<!-- Image -->
					<a href="<?=BASE_URL?>" class="image"><img src="./assets/images/gioi-thieu-1.jpg" alt=""></a>
					<!-- Content -->
					<div class="content fix mt-3">
						<!-- Title -->
						<h4 class="title"><a href="<?=BASE_URL?>">Khám Phá Shop Điện Thoại BHA - Nơi Mua Sắm Điện Thoại Hàng
								Đầu</a></h4>
						<p>Chào mừng bạn đến với <strong>Shop Điện Thoại BHA</strong> Chúng tôi rất vui được chào đón bạn đến với
							thế giới công nghệ tiên tiến và các sản phẩm điện thoại di động chất lượng cao. Tại đây, bạn sẽ tìm thấy
							một bộ sưu tập đa dạng các mẫu điện thoại từ những thương hiệu nổi tiếng nhất như Apple, Samsung, Xiaomi,
							Oppo, và nhiều hơn nữa.</p>

						<p><strong>Shop Điện Thoại BHA</strong> cam kết cung cấp sản phẩm chính hãng và chất lượng tốt nhất. Mỗi sản
							phẩm đều được kiểm tra kỹ lưỡng để đảm bảo rằng bạn nhận được những sản phẩm hoàn hảo nhất. Chúng tôi hiểu
							rằng lựa chọn một chiếc điện thoại phù hợp có thể là một quyết định quan trọng, vì vậy đội ngũ tư vấn của
							chúng tôi luôn sẵn sàng hỗ trợ bạn với những thông tin chi tiết và lời khuyên hữu ích.</p>

						<p>Chúng tôi tự hào mang đến cho bạn không chỉ các sản phẩm chất lượng mà còn các chương trình khuyến mãi và
							ưu đãi hấp dẫn. Dù bạn đang tìm kiếm một chiếc smartphone cao cấp, một mẫu điện thoại tầm trung, hay một
							lựa chọn tiết kiệm chi phí nhưng vẫn đáp ứng đầy đủ các tính năng cần thiết, bạn chắc chắn sẽ tìm thấy sự
							lựa chọn hoàn hảo tại Shop Điện Thoại BHA.</p>

						<p>Bên cạnh đó, dịch vụ khách hàng tại <strong>Shop Điện Thoại BHA</strong> là một trong những điểm mạnh của
							chúng tôi. Chúng tôi luôn đặt sự hài lòng của khách hàng lên hàng đầu và đảm bảo rằng bạn có một trải
							nghiệm mua sắm dễ chịu và thuận tiện nhất. Nếu có bất kỳ câu hỏi nào hoặc cần hỗ trợ thêm, đừng ngần ngại
							liên hệ với chúng tôi để được giúp đỡ kịp thời.</p>

						<p>Hãy đến và khám phá <strong>Shop Điện Thoại BHA</strong> hôm nay để tận hưởng những sản phẩm công nghệ
							mới nhất và dịch vụ khách hàng tuyệt vời. Chúng tôi rất mong được phục vụ bạn và làm hài lòng bạn với
							những lựa chọn tốt nhất trong lĩnh vực điện thoại di động!</p>

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