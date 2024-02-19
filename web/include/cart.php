<?php
	if(isset($_POST['addtocart'])){
		$product_name = $_POST['product_name'];
		$product_id = $_POST['product_id'];
		$product_price = $_POST['product_price'];
		$product_image = $_POST['product_image'];
		$product_quantity = $_POST['product_quantity'];
		
		$slq_select_cart = mysqli_query($con,"SELECT * FROM tbl_cart WHERE product_id='$product_id'");
		$count = mysqli_num_rows($slq_select_cart);
		if($count>0){
			$row_product = mysqli_fetch_array($slq_select_cart);
			$product_quantity = $row_product['cart_quantity'] + 1;
			$sql_cart = "UPDATE tbl_cart SET cart_quantity='$product_quantity' WHERE product_id='$product_id'";
		}else {
			$product_quantity = $product_quantity;
			$sql_cart = "INSERT INTO tbl_cart(cart_name,product_id,cart_price,cart_image,cart_quantity) 
			values('$product_name','$product_id','$product_price','$product_image','$product_quantity')";
		}	
		$insert_row = mysqli_query($con,$sql_cart);
		if($insert_row==0){
			header('Location:index.php?manager=detailproduct&id'.$product_id);
		}
	}elseif(isset($_POST['update_quantity'])){
		for($i=0;$i<count($_POST['prd_id']);$i++){
			$product_id = $_POST['prd_id'][$i];
			$cart_quantity = $_POST['cart_quantity'][$i];
			if($cart_quantity==0){
				$sql_delete = mysqli_query($con,"DELETE FROM tbl_cart WHERE product_id='$product_id'");
			}else{

			}
			$sql_update = mysqli_query($con,"UPDATE tbl_cart SET cart_quantity='$cart_quantity' WHERE product_id='$product_id'");
		}
	}elseif(isset($_GET['delete'])){
		$id = $_GET['delete'];
		$sql_delete = mysqli_query($con,"DELETE FROM tbl_cart WHERE cart_id='$id'");
	}elseif(isset($_GET['logout'])){
		$id = $_GET['logout'];
		if($id==1){
			unset($_SESSION['login_home']);
		}
	}elseif(isset($_POST['payment'])){
		$customer_name = $_POST['name'];
		$customer_phone = $_POST['usrtel'];
		$customer_email = $_POST['email'];
		$customer_password = md5($_POST['password']);
		$customer_address = $_POST['city'];
		$customer_note = $_POST['note'];
		$customer_delivery = $_POST['delivery'];
		$sql_customer = mysqli_query($con,"INSERT INTO tbl_customer(customer_name,customer_phone,customer_email,customer_password,customer_address,customer_delivery,customer_note) 
		values('$customer_name','$customer_phone','$customer_email','$customer_password','$customer_address','$customer_delivery','$customer_note')");
		if($sql_customer){
			$slq_select_customer = mysqli_query($con,"SELECT * FROM tbl_customer ORDER BY customer_id DESC LIMIT 1");
			$order_code = rand(0,9999);
			$row_customer = mysqli_fetch_array($slq_select_customer);
			$customer_id = $row_customer['customer_id'];
			$_SESSION['login_home'] = $row_customer['customer_name'];
			$_SESSION['customer_id'] = $customer_id; 
			for($i=0;$i<count($_POST['pay_product_id']);$i++){
				$product_id = $_POST['pay_product_id'][$i];
				$cart_quantity = $_POST['pay_cart_quantity'][$i];
				$sql_order = mysqli_query($con,"INSERT INTO tbl_order(product_id,customer_id,order_quantity,order_code) values('$product_id','$customer_id','$cart_quantity','$order_code')");
				$sql_transaction = mysqli_query($con,"INSERT INTO tbl_transaction(customer_id,product_id,order_quantity,transaction_code) values('$customer_id','$product_id','$cart_quantity','$order_code')");
				
				$sql_delete_payment = mysqli_query($con,"DELETE FROM tbl_cart WHERE product_id='$product_id'");
			}
		}
	
	
	}elseif(isset($_POST['payment_login'])){

		$customer_id = $_SESSION['customer_id'];
		$order_code = rand(0,9999);	
		for($i=0;$i<count($_POST['payment_product_id']);$i++){
				$product_id = $_POST['payment_product_id'][$i];
				$quantity = $_POST['payment_quantity'][$i];
				$sql_order = mysqli_query($con,"INSERT INTO tbl_order(product_id,customer_id,order_quantity,order_code) values ('$product_id','$customer_id','$quantity','$order_code')");
				$sql_transaction = mysqli_query($con,"INSERT INTO tbl_transaction(product_id,order_quantity,transaction_code,customer_id) values ('$product_id','$quantity','$order_code','$customer_id')");
				$sql_delete_payment = mysqli_query($con,"DELETE FROM tbl_cart WHERE product_id='$product_id'");
			}
   
		
	}
?>
<!-- checkout page -->
<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- pages -->
				<div class="agile_inner_breadcrumb">
					<div class="container">
						<div class="product-sec1 border border-danger" style="margin-top:-50px; border-radius:10px">
							<ul class="w3_short">
								<li>
									<a href="index.php" style="padding:0 12px" class="float-left"> <i class="fas fa-home mr-2"></i> Trang chủ </a>
									<i>></i>
								</li>
								<li>
									Giỏ hàng của bạn
								</li>
							</ul>
						</div>
					</div>
				</div>
					<!-- Login user -->
					<?php
						if(isset($_SESSION['login_home'])){
							echo '<p class=" text-capitalize"" style="color:black; font-weight:bold;margin-top:15px; margin-left:835px">Xin chào:	 '.$_SESSION['login_home'].', '.
							'<a href="index.php?manager=cart&logout=1" class="text-capitalize" style="font-weight:normal">Đăng xuất.</a>'.'</p>';
						}else{
							echo '';
						}
					?>
					<!-- //Login user -->
<!-- //pages -->
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				Giỏ hàng của bạn
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<?php
				$slq_pick_cart = mysqli_query($con,"SELECT * FROM tbl_cart ORDER BY cart_id ASC");
				?>
				<div class="table-responsive">
					<form action="" method="post">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>Số thứ tự</th>
								<th>Sản phẩm</th>
								<th>Số lượng</th>
								<th>Tên sản phẩm</th>
								<th>Giá</th>
								<th>Tổng</th>
								<th>Xóa khỏi giỏ hàng</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$total = 0;
							$i = 0;
							while($row_fetch_cart = mysqli_fetch_array($slq_pick_cart)){
								$subtotal = $row_fetch_cart['cart_quantity'] * $row_fetch_cart['cart_price'];
								$i++;
								$total += $subtotal;
							?>
							<tr class="rem1">
								<td class="invert"><?php echo $i ?></td>
								<td class="invert-image">
									<a href="single.html">
										<img style="width:auto; height:110px;" src="images/<?php echo $row_fetch_cart['cart_image'] ?>" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<input type="number" min="0" name="cart_quantity[]" value="<?php echo $row_fetch_cart['cart_quantity'] ?>">
									<input type="hidden" name="prd_id[]" value="<?php echo $row_fetch_cart['product_id'] ?>">
								</td>
								<td class="invert"><?php echo $row_fetch_cart['cart_name'] ?></td>
								<td class="invert"><?php echo number_format($row_fetch_cart['cart_price']).'VNĐ' ?></td>
								<td class="invert"><?php echo number_format($subtotal) .'VNĐ' ?></td>
								<td class="invert">
									<a href="?manager=cart&delete=<?php echo $row_fetch_cart['cart_id'] ?>">Xóa khỏi giỏ hàng</a>
								</td>
							</tr>
							<?php
							}
							?>
							<tr>
								<td colspan="7">Tổng tiền thanh toán = <?php echo number_format($total) .'VNĐ' ?> </td>
							</tr>
							<tr>
								<td colspan="7"><input  class="btn btn-danger" type="submit" value="Cập nhật giỏ hàng" name="update_quantity">
								<?php 
								$sql_cart_select = mysqli_query($con,"SELECT * FROM tbl_cart");
								$count_cart_select = mysqli_num_rows($sql_cart_select);

								if(isset($_SESSION['login_home']) && $count_cart_select>0){
									while($row_1 = mysqli_fetch_array($sql_cart_select)){
								?>
								<input type="hidden" name="payment_product_id[]" value="<?php echo $row_1['product_id'] ?>">
								<input type="hidden" name="payment_quantity[]" value="<?php echo $row_1['cart_quantity'] ?>">
								<?php 
								}
								?>
								<input type="submit" class="btn btn-primary" value="Thanh toán giỏ hàng" name="payment_login">
								<?php
								} 
								?>
								</td>
							</tr>
							

						</tbody>
					</table>
					</form>
				</div>
			</div>
			<?php
			if(!isset($_SESSION['login_home'])){

			?>
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3 text-dark">Thông tin địa chỉ giao hàng</h4>
					<form action="" method="post" class="creditly-card-form agileinfo_form">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">
								<div class="first-row">
									<div class="controls form-group">
										<input class="billing-address-name form-control" type="text" name="name" placeholder="Họ và tên"  required="" >
									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="number" class="form-control" placeholder="Số điện thoại liên hệ" name="usrtel" required="">
											</div>
										</div>
										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="email" class="form-control" placeholder="E-mail liên hệ" name="email" required="">
											</div>
										</div>
									</div>
									<div class="controls form-group">
										<input type="password" class="form-control" placeholder="Password" name="password" required="">
									</div>
									<div class="controls form-group">
										<input type="text" class="form-control" placeholder="Địa chỉ giao hàng" name="city" required="">
									</div>
									<div class="controls form-group">
										<select class="option-w3ls" name="delivery">
											<option>Hình thức thanh toán</option>
											<option value="Home">Thanh toán khi nhận hàng</option>
											<option value="ATM">Thanh toán qua Internet Banking</option>
											<option value="Wallet">Thanh toán qua ví điện tử</option>
										</select>
									</div>
									<div class="controls form-group">
										<textarea class="form-control" placeholder="Ghi chú" name="note" required=""></textarea>
									</div>
								</div>
								<?php
									$sql_take_cart = mysqli_query($con,"SELECT * FROM tbl_cart ORDER BY cart_id ASC");
									while($row_payment = mysqli_fetch_array($sql_take_cart)){
								?>
									<input type="hidden" name="pay_cart_quantity[]" value="<?php echo $row_payment['cart_quantity'] ?>">
									<input type="hidden" name="pay_product_id[]" value="<?php echo $row_payment['product_id'] ?>">
								<?php
									}
								?>
								<input type="submit" name="payment" class="btn btn-danger" style="width:20%" value="Thanh toán ngay">
							</div>
						</div>
					</form>
				</div>
			</div>
			<?php
			}
			?>
		</div>
	</div>
<!-- //checkout page -->