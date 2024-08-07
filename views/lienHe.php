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
			<li style="margin-left: 0.5rem;">Liên hệ</li>
		</ol>
	</nav>
</div>
<div class="clearfix"></div>
<div class="contact-page contact-us">
	<div class="feature map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8679632343833!2d105.74435187519812!3d21.0379684874624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455305afd834b%3A0x17268e09af37081e!2sT%C3%B2a%20nh%C3%A0%20FPT%20Polytechnic.!5e0!3m2!1svi!2s!4v1723006932922!5m2!1svi!2s"></iframe>
	</div>
	<div class="container">
		<div class="row justify-content-center mb-4">
			<div class="col-md-10">
				<div class="contact-method">
					<div class="row">
						<div class="col-12 col-md-4">
							<div class="method-block"> <i class="fa fa-map-marker"></i>
								<div class="method-block_text">
									<p>Trịnh Văn Bô, Nam Từ Liêm</p>
									<p>Hà Nội</p>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-4">
							<div class="method-block"><i class="fa fa-envelope"></i>
								<div class="method-block_text">
									<p> <span>Hotline : </span>180096688</p>
									<p><span>Mail : </span><a href="mailto:contact@srgit.com">contact@contact.com</a></p>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-4">
							<div class="method-block"><i class="fa fa-clock-o"></i>
								<div class="method-block_text">
									<p> <span>Thời gian hoạt động : </span>08:30 AM – 17:30 PM</p>
									<p><span>Chủ nhật : </span> <span class="text-danger">Nghỉ</span> </p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="leave-message">
					<h1 class="title">Để lại lời nhắn</h1>
					<p>Nhân viên của chúng tôi sẽ gọi lại sau và trả lời câu hỏi của bạn.</p>
					<form action="#" method="post">
						<div class="row">
							<div class="col-12 col-md-6 mb-3">
								<div class="form-group">
									<input name="name" id="name" class="form-control" type="text" placeholder="Tên">
								</div>
							</div>
							<div class="col-12 col-md-6 mb-3">
								<div class="form-group">
									<input name="email" id="email" class="form-control" type="email" placeholder="Email">
								</div>
							</div>
							<div class="col-12 mb-3">
								<div class="form-group">
									<textarea name="message" id="message" class="form-control" cols="30" rows="10"
										placeholder="Nội dung"></textarea>
								</div>
							</div>
							<div class="col-12 text-center">
								<div class="form-group">
									<input type="button" onClick="return ajaxmailcontact();" class="btn add-to-cart2" value="Gửi">
								</div>
							</div>
						</div>
					</form>
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