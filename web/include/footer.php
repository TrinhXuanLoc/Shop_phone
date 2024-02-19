<!-- footer -->
<footer>
		<div class="footer-top-first">
			<div class="container py-md-5 py-sm-4 py-3">
				<!-- footer first section -->
				<div class="product-sec1 px-sm-4 px-3 mb-4" style="width:1300px; margin-left:-100px;border-radius:10px">
				<h2 class="footer-top-head-w3l font-weight-bold mb-2" style="margin-top:-100px; padding-top:20px">Giới thiệu về chúng tôi:</h2>
				<p class="footer-main mb-4" style="margin-bottom:20px; line-height:1.8;">
				<li style="margin-bottom:20px; line-height:1.8; list-style-type:demical"><strong>Trung thực</strong> - với cửa hàng và khách hàng trong mọi mối quan hệ. Đây là điều kiện tiên quyết để tạo dựng niềm tin.</li>
                <li style="margin-bottom:20px; line-height:1.8; list-style-type:demical"><strong>Trách nhiệm</strong> - với cửa hàng và xã hội. Chúng tôi luôn thực hiện đúng cam kết uy tín, chất lượng tuyệt đối với từng sản phẩm.</li>
                <li style="margin-bottom:20px; line-height:1.8; list-style-type:demical;  padding-bottom:20px"><strong>Chất lượng</strong> - đảm bảo hàng chính hãng 100%, hoàn tiền khi máy bị lỗi.</li></p>
				</div>
				<!-- //footer first section -->
				<!-- footer second section -->
				<div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-dolly" style="color:red"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Miễn phí giao hàng</h3>
								<p>với đơn hàng trên 10.000.000 <sup>đ</sup></p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer my-md-0 my-4">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-shipping-fast" style="color:red"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Dịch vụ chuyển phát nhanh</h3>
								<p>Toàn quốc.</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="far fa-thumbs-up" style="color:red"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Sự lựa chọn</h3>
								<p>Uy tín, chất lượng, đáng tin cậy.</p>
							</div>
						</div>
					</div>
				</div>
				<!-- //footer second section -->
			</div>
		</div>
		<!-- footer third section -->
		<div class="w3l-middlefooter-sec">
			<div class="container py-3">
				<div class="row footer-info w3-agileits-info">
					<!-- footer categories -->
					<div class="col-md-3 col-sm-6 footer-grids">
						<h3 class="text-white font-weight-bold mb-3">Danh mục sản phẩm</h3>
						<ul>
							<?php
    							$sql_cartegory_sidebar = mysqli_query($con,'SELECT * FROM tbl_cartegory ORDER BY cartegory_id ASC');
								while($row_cartegory_sidebar = mysqli_fetch_array($sql_cartegory_sidebar)){
							?>
							<li class="mb-3">
							<a href="listproduct.php?id=<?php echo $row_cartegory_sidebar['cartegory_id'] ?>"><?php echo $row_cartegory_sidebar['cartegory_name'] ?></a>
							</li>
							<?php
								}
							?>
						</ul>
					</div>
					<!-- //footer categories -->
					<!-- quick links -->
					<div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Truy cập nhanh</h3>
						<ul>
							<li class="mb-3">
								<a href="index.php?manager=contact">Contact Us</a>
							</li>
							<li class="mb-3">
								<a href="help.html">Trợ giúp</a>
							</li>
							<li class="mb-3">
								<a href="faqs.html">Câu hỏi thường gặp</a>
							</li>
							<li class="mb-3">
								<a href="index.php?manager=terms">Điều khoản sử dụng</a>
							</li>
							<li class="mb-3">
								<a href="index.php?manager=privacy_policy">Nội quy cửa hàng</a>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Liên lạc</h3>
						<ul>
							<li class="mb-3">
								<i class="fas fa-map-marker"></i><a href="https://goo.gl/maps/GSEJLViTUn1wN7N99" target="_blank">132 Nguyễn Hữu Cảnh, phường 22, quận Bình Thạnh, HCM City.</a> </li>
							<li class="mb-3">
								<i class="fas fa-phone"></i> +84 915 210 719. </li>
							<li class="mb-3">
								<i class="fas fa-envelope-open"></i>
								<a href="mailto:example@mail.com"> txl.2601.ld@gmail.com</a>
							</li>>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
						<!-- newsletter -->
						<h3 class="text-white font-weight-bold mb-3">Ưu đãi - hot</h3>
						<p class="mb-3">Miễn phí giao hàng đơn đầu tiên với khách hàng mới!</p>
						<form action="#" method="post">
							<div class="form-group " >
								<input type="email" class="form-control border border-danger" placeholder="Email" name="email" required="" style="border-radius:10px; width:200px;">
								<input type="submit" value="Go" style="border-radius:10px;">
							</div>
						</form>
						<!-- //newsletter -->
						<!-- social icons -->
						<div class="footer-grids  w3l-socialmk mt-3">
							<h3 class="text-white font-weight-bold mb-3">Follow Us on</h3>
							<div class="social">
								<ul>
									<li>
										<a class="icon fb" href="#">
											<i class="fab fa-facebook-f"></i>
										</a>
									</li>
									<li>
										<a class="icon tw" href="#">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									<li>
										<a class="icon gp" href="#">
											<i class="fab fa-google-plus-g"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //social icons -->
					</div>
				</div>
				<!-- //quick links -->
			</div>
		</div>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right py-2 bg-danger">
		<div class="container">
			<p class="text-center text-white">© 2022 Mito Store. All rights reserved | Design by
				<a href="https://facebook.com/gau.dalat.49" target="_blank"> XL DEV UTC2.</a>
			</p>
		</div>
	</div>
	<!-- //copyright -->