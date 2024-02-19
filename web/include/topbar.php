<?php
    if(isset($_POST['login_home'])){
        $username = $_POST['email_login'];
        $password = md5($_POST['password_login']);
        if($username== '' || $password==''){
            echo '<script> alert("Xin vui lòng không để trống !!!") </script>';
        }else{
            $sql_seclect_admin = mysqli_query($con,"SELECT * FROM tbl_customer WHERE customer_email='$username' AND customer_password='$password' LIMIT 1");
            $count = mysqli_num_rows($sql_seclect_admin);
            $row_login = mysqli_fetch_array($sql_seclect_admin);
            if($count>0){
                $_SESSION['login_home'] = $row_login['customer_name']; 
                $_SESSION['customer_id'] = $row_login['customer_id']; 
                header('Location: index.php');
            }else{
				echo '<script> alert("Sai tài khoản hoặc mật khẩu!!!") </script>';
            }
        }
    }
?>
<!-- top-header -->
<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2 bg-danger">
				<div class="col-lg-4 header-most-top">
					<p class="text-white text-lg-left text-center">Value of trust accumulation - Giá trị tích lũy niềm tin
						<i class="fas fa-rss ml-1"></i>
					</p>
				</div>
				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>
						
						<li class="text-center border-right text-white "style=" margin-left:30px">
							<a href="index.php" class="text-white">
								<i class="fas fa-home mr-2"></i>Trang chủ</a>
						</li>
						<?php
							if(isset($_SESSION['login_home'])){
						?>
						<li class="text-center border-right text-white ">
							<a class="nav-link text-white" href="index.php?manager=cart">Kiểm tra giỏ hàng <i class="fas fa-cart-arrow-down"></i></a>
						</li>
						<?php
						}
						?>
						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i> 0915 210 719
						</li>
						<li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#login" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập </a>
						</li>
						<li class="text-center text-white">
							<a href="#" data-toggle="modal" data-target="#register" class="text-white">
								<i class="fas fa-sign-out-alt mr-2"></i>Đăng ký </a>
						</li>
					</ul>
					<!-- //header lists -->
				</div>
			</div>
		</div>
	</div>

<!-- modals -->
	<!-- log in -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center text-dark">Đăng nhập</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-group">
							<label class="col-form-label">Email</label>
							<input type="email" class="form-control" placeholder=" " name="email_login" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder=" " name="password_login" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control bg-danger" name="login_home" value="Đăng nhập" >
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
								<label class="custom-control-label" for="customControlAutosizing">Ghi nhớ tài khoản?</label>
							</div>
						</div>
						<p class="text-center dont-do mt-3">Bạn chưa có tài khoản?
							<a href="#" data-toggle="modal" data-target="#register">
								Đăng ký ngay</a>
						</p>
					</form>
				</div>
			</div>
		</div>
	</div>
    <!-- register -->
	<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-dark">Đăng ký</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" method="post">
						<div class="form-group">
							<label class="col-form-label">Họ và tên khách hàng <span style="color:red;">*</span></label>
							<input type="text" class="form-control" placeholder=" " name="name" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Email đăng ký <span style="color:red;">*</span></label>
							<input type="email" class="form-control" placeholder=" " name="email" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Số điện thoại đăng ký <span style="color:red;">*</span></label>
							<input type="email" class="form-control" placeholder=" " name="phone" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Địa chỉ <span style="color:red;">*</span></label>
							<input type="email" class="form-control" placeholder=" " name="address" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Mật khẩu đăng nhập <span style="color:red;">*</span></label>
							<input type="password" class="form-control" placeholder=" " name="password" id="password1" required="">
						</div>
						<div class="form-group">
							<label class="col-form-label">Xác nhận mật khẩu đăng nhập <span style="color:red;">*</span></label>
							<input type="password" class="form-control" placeholder=" " name="password" id="password2" required="">
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control bg-danger" name="register" value="Đăng ký thành viên">
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing2">
								<label class="custom-control-label" for="customControlAutosizing2">Tôi đồng ý với các Điều khoản & Điều kiện</label>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //modal -->
	<!-- //top-header -->
    	<!-- header-bottom-->
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid" >
				<!-- logo -->
				<div class="col-md-3 logo_agile" style="margin-top:50px">
					<h1 class="text-center">
						<a href="index.php" class="font-weight-bold font-italic">
							<img src="images/loogoo.png" alt="" class="" style="padding-top:20px; margin-left:-175px; margin-bottom:30px">
						</a>
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->
						<div class="col-10 agileits_search "style="margin-top:50px">
							<form class="form-inline" action="index.php?manager=search_product" method="post" style=" padding-left:10px;margin-bottom:30px; height: 50px; width:100%;">
								<input class="border border-danger rounded form-control mr-sm-2" name="search_product" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search" required>
								<button class="btn my-2 my-sm-0 border-danger rounded font-weight-bold" name="search_button" type="submit">Tìm kiếm</button>
							</form>
						</div>
						<!-- //search -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- //header-bottom -->
	<!-- navigation -->