<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else {
        $id = '';
    }
    $sql_detail =  mysqli_query($con,"SELECT * FROM tbl_product,tbl_cartegory WHERE product_id='$id' ");
	$row_detail = mysqli_fetch_array($sql_detail);
?>
		<!-- page -->
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<div class="product-sec1 border border-danger" style="margin-top:10px; border-radius:10px">
					<ul class="w3_short">
						<li>
							<a href="index.php" style="padding:0 0 0 12px" class="font-weight-bold"> <i class="fas fa-home mr-2"></i> Trang chủ </a>
							<i>></i>
						</li>
						</li>
						<li class="font-weight-bold"><?php echo $row_detail['product_name'] ?></li>
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

<!-- Single Page -->
<div class="banner-bootom-w3-agileits py-5">
	<div class="container py-xl-4 py-lg-2">
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="./uploads/<?php echo $row_detail['product_image'] ?>">
									<div class="thumb-image">
										<img src="./uploads/<?php echo $row_detail['product_image'] ?>" style="width:auto; height:350px;" data-imagezoom="true" class="img-fluid" alt=""> 
									</div>
								</li>
								<li data-thumb="./uploads/<?php echo $row_detail['product_image'] ?>">
									<div class="thumb-image">
										<img src="./uploads/<?php echo $row_detail['product_image'] ?>" style="width:auto; height:350px;" data-imagezoom="true" class="img-fluid" alt=""> 
									</div>
								</li>
								<li data-thumb="./uploads/<?php echo $row_detail['product_image'] ?>">
									<div class="thumb-image">
										<img src="./uploads/<?php echo $row_detail['product_image'] ?>" style="width:auto; height:350px;" data-imagezoom="true" class="img-fluid" alt=""> 
									</div>
								</li>
															
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3 font-weight-bold"><?php echo $row_detail['product_name'] ?></h3>
					<p class="mb-3">
						<span class="item_price"><?php echo number_format($row_detail['product_sales']).'VNĐ' ?></span>
						<del class="mx-2 font-weight-light"><?php echo number_format($row_detail['product_price']).'VNĐ' ?></del>
						<label>Miễn phí vận chuyển</label>
					</p>
					
					<div class="product-single-w3l">
						<p><?php echo $row_detail['product_decribe'] ?></p></br>
					</div>
                    </br>
                    <div class="product-single-w3l">
						<p><?php echo $row_detail['product_detail'] ?></p>
					</div>
                    </br>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<form action="?manager=cart" method="post">
								<fieldset>
									<input type="hidden" name="product_name" value="<?php echo $row_detail['product_name'] ?>" />
									<input type="hidden" name="product_id" value="<?php echo $row_detail['product_id'] ?>" />
									<input type="hidden" name="product_price" value="<?php echo $row_detail['product_sales'] ?>" />
									<input type="hidden" name="product_image" value="<?php echo $row_detail['product_image'] ?>" />
									<input type="hidden" name="product_quantity" value="1" />
									<input type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="button bg-danger	" />
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
	</br>
			<!-- Sales -->
			<div class="product-sec1" style="width:1300px; margin-left:-100px ;border-radius:10px; margin-top:20px">

				<h4 class="heading-tittle font-weight-bold px-sm-4 px-3 mb-4" style="padding-top:20px">Chương trình ưu đãi</h4>	
				<div class="container">    
					<div class="row">
						<div class="col-sm-3 px-sm-2 px-4 mb-4">
							<a href=""><img src="./images/sales1.webp" class="img-responsive" style="width:100%; border-radius:10px " alt="Image"></a>
						</div>
						<div class="col-sm-3 px-sm-2 px-4 mb-4">
							<a href=""><img src="./images/sales2.webp" class="img-responsive" style="width:100%; border-radius:10px" alt="Image"></a>
						</div>	
						<div class="col-sm-3 px-sm-2 px-3 mb-4">
							<a href=""><img src="./images/sales3.webp" class="img-responsive" style="width:100%; border-radius:10px" alt="Image"></a>
						</div>	
						<div class="col-sm-3 px-sm-2 px-3 mb-4">
							<a href=""><img src="./images/sales4.webp" class="img-responsive" style="width:100%; border-radius:10px" alt="Image"></a>
						</div>		
						<div class="col-sm-3 px-sm-2 px-3 mb-4">
							<a href=""><img src="./images/sales5.webp" class="img-responsive" style="width:100%; border-radius:10px" alt="Image"></a>
						</div>			
					</div>
				</div>
			</div>
			<!-- //Sales -->
		</div>
	</div>
<!-- //Single Page -->
