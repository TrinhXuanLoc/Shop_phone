
    <!-- page -->
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <div class="product-sec1 border border-danger" style="margin-top:10px; border-radius:10px">
                <ul class="w3_short">
                    <li>
                        <a href="index.php" style="padding:0 0 0 12px" class="font-weight-bold"> <i class="fas fa-home mr-2"></i> Trang chủ </a>
                        <i>></i>
                    </li>
                    <li class="font-weight-bold">Contact us</li>
                </ul>
            </div>
        </div>
    </div>
        <!-- Login user -->
        <?php
            if(isset($_SESSION['login_home'])){
                echo '<p class=" text-capitalize"" style="color:black; font-weight:bold;margin-top:15px; margin-left:1050px">Xin chào:	 '.$_SESSION['login_home'].', '.
                '<a href="index.php?manager=cart&logout=1" class="text-capitalize" style="font-weight:normal">Đăng xuất.</a>'.'</p>';
            }else{
                echo '';
            }
        ?>
        <!-- //Login user -->
	<!-- //page -->

	<!-- contact -->
	<div class="contact py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3 font-weight-bold" style=" text-align:center;margin-top:-60px;">Contact Us</h3>
			<!-- //tittle heading -->
			<!-- form -->
			<form action="#" method="post">
				<div class="contact-grids1 w3agile-6">
					<div class="row">
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">Họ và tên</label>
							<input type="text" class="form-control" style=" border-radius:12px" name="Name" placeholder="Họ và tên khách hàng" required="">
						</div>
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">E-mail liên hệ</label>
							<input type="email" class="form-control" style=" border-radius:12px" name="Email" placeholder="Email liên hệ" required="">
						</div>
					</div>
					<div class="contact-me animated wow slideInUp form-group">
						<label class="col-form-label">Nhập nội dung</label>
						<textarea name="Message" class="form-control" style=" border-radius:12px" placeholder="Nội dung" required=""> </textarea>
					</div>
					<div class="contact-form">
						<input type="submit" value="Gửi yêu cầu" class="bg-danger font-weight-bold" style="width:200px; border-radius:12px">
					</div>
				</div>
			</form>
			<!-- //form -->
            <!-- Contact -->
            <div class="row contact-grids agile-1 mb-5" style="margin-top:30px">
				<div class="col-sm-4 contact-grid agileinfo-6 mt-sm-0 mt-2">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-map-marker-alt rounded-circle text-danger"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3 text-danger">Địa chỉ</h4>
						<p>132 Nguyễn Hữu Cảnh, phường 22, quận Bình Thạnh, HCM City.</p>
					</div>
				</div>
				<div class="col-sm-4 contact-grid agileinfo-6 my-sm-0 my-4">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-phone rounded-circle text-danger"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3 text-danger">Số điện thoại liên hệ</h4>
						<p>+84 915 210 719
							<label>+84 911 210 719</label>
						</p>
					</div>
				</div>
				<div class="col-sm-4 contact-grid agileinfo-6">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-envelope-open rounded-circle text-danger"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3 text-danger ">Email</h4>
						<p>
							<a href="mailto:info@example.com">txl.2601.ld@gmail.com</a>
							<label>
								<a href="mailto:info@example.com">6051071068@st.utc2.edu.vn</a>
							</label>
						</p>
					</div>
				</div>
			</div>
            <!-- //Contact -->
		</div>
	</div>
	<!-- //contact -->

	<!-- map -->
    <div class="container">
        <div class="map mt-sm-0 mt-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2569711425117!2d106.71611711462268!3d10.791620092311156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528ab9000acc5%3A0xde0231b1d596805d!2zMTMyIMSQLiBOZ3V54buFbiBI4buvdSBD4bqjbmgsIFBoxrDhu51uZyAyMiwgQsOsbmggVGjhuqFuaCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1656257497280!5m2!1svi!2s" 
         allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="margin-bottom:150px; margin-top:-50px"></iframe>
        </div>
    </div>
	<!-- //map -->
