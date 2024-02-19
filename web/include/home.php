<!-- pages -->
<div class="agile_inner_breadcrumb">
	<div class="container">
		<div class="product-sec1 border border-danger" style="margin-top:10px; border-radius:10px">
			<ul class="w3_short">
				<li>
					<a href="index.php" style="padding:0 12px" class="float-left"> <i class="fas fa-home mr-2"></i> Trang chủ </a>
				</li>
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
<!-- //pages -->
<!-- top Products -->
<div class="ads-grid py-sm-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h4 class="text-center mb-lg-5 mb-sm-4 mb-3">
				<h4 style="padding-bottom:30px; text-align:center;margin-top:-100px;" class="font-weight-bold">Sản Phẩm Có Tại Cửa Hàng</h4>	
			</h4>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-10" style="margin-left:-100px;"> 
					<div class="wrapper">
						<?php
							$sql_carte_home = mysqli_query($con, "SELECT * FROM tbl_cartegory ORDER BY cartegory_id ASC");
							while($row_carte_home = mysqli_fetch_array($sql_carte_home)){
								$id_cartegory = $row_carte_home['cartegory_id'];
						?>
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-3 mb-4"  style="border-radius:10px;">
							<h4 class="heading-tittle font-weight-bold"><?php echo $row_carte_home['cartegory_name'] ?></h4>
							<div class="row">
								<?php
									$sql_product = mysqli_query($con,"SELECT * FROM tbl_product ORDER BY product_id ASC");
									while($row_product = mysqli_fetch_array($sql_product)){
										if($row_product['cartegory_id']==$id_cartegory){

								?>
								<div class="col-md-4 product-men mt-3">
									<div class="men-pro-item simpleCart_shelfItem border border-danger" style="border-radius:10px;">
										<div class="men-thumb-item text-center">
											<img src="./uploads/<?php echo $row_product['product_image'] ?>" alt="" style="width:auto;height: 180px; padding-top:30px;">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?manager=detailproduct&id=<?php echo $row_product['product_id'] ?>" class="link-product-add-cart bg-danger">Thông tin SP</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="?manager=detailproduct&id=<?php echo $row_product['product_id'] ?>" class="font-weight-bold"><?php echo $row_product['product_name'] ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price"><?php echo number_format($row_product['product_sales']).'VNĐ'?></span>
												<del><?php echo number_format($row_product['product_price']).'VNĐ'?></del>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="?manager=cart" method="post" style="padding-bottom:20px;">
													<fieldset>
														<input type="hidden" name="product_name" value="<?php echo $row_product['product_name'] ?>" />
														<input type="hidden" name="product_id" value="<?php echo $row_product['product_id'] ?>" />
														<input type="hidden" name="product_price" value="<?php echo $row_product['product_sales'] ?>" />
														<input type="hidden" name="product_image" value="<?php echo $row_product['product_image'] ?>" />
														<input type="hidden" name="product_quantity" value="1" />
														<input type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="button bg-danger" />
													</fieldset>
												</form>
											</div>
										</div>
									</div>
								</div>
								<?php
									}
								}
								?>
							</div>
						</div>
						<!-- //first section -->
						<?php
							}
						?>
						
					</div>
				</div>
				<!-- //product left -->

				<!-- product right -->
				<div class="col-lg-3 mt-lg-2 mt-4 p-lg-2" >
					<div class="side-bar p-sm-4 p-3 border border-danger" style="border-radius:10px; margin-top:-15px">
						<div class="search-hotel border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Tìm kiếm sản phẩm</h3>
							<form action="#" method="post">
								<input type="search" placeholder="Tên sản phẩm..." name="search" required="" >
								<input type="submit" value=" " class="btn bg-danger">
							</form>
						</div>
						<!-- Category -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Danh mục sản phẩm</h3>
							<ul>
							<?php
								$sql_cartegory_sidebar = mysqli_query($con,'SELECT * FROM tbl_cartegory ORDER BY cartegory_id ASC');
								while($row_cartegory_sidebar = mysqli_fetch_array($sql_cartegory_sidebar)){
							?>
								<li>
									<span class="span" ><a class="text-dark" href="listproduct.php?id=<?php echo $row_cartegory_sidebar['cartegory_id'] ?>"><?php echo $row_cartegory_sidebar['cartegory_name'] ?></a></span>
								</li>
							<?php
								}
							?>
							</ul>
						</div>
						<!-- //category -->
						<!-- price -->
						<div class="range border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Giá tiền</h3>
							<div class="w3l-range">
								<ul>
								<li>
									<input type="checkbox" class="checked">
										<a href="#">Dưới 5.000.000VNĐ</a>
									</li>
									<li class="my-1">
									<input type="checkbox" class="checked">
										<a href="#">5.000.000 - 10.000.000VNĐ</a>
									</li>
									<li>
									<input type="checkbox" class="checked">
										<a href="#">10.000.000 - 20.000.000VNĐ</a>
									</li>
									<li class="mt-1">
									<input type="checkbox" class="checked">
										<a href="#">Trên 20.000.000VNĐ</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //price -->
						<!-- best seller -->
						<div class="f-grid py-2">
							<h3 class="agileits-sear-head mb-3">Sản phẩm bán chạy</h3>
							<div class="box-scroll">
								<div class="scroll">
									<?php
									$sql_cartegory_sidebar = mysqli_query($con,"SELECT * FROM tbl_product WHERE product_hot='0' ORDER BY product_id ASC");
									while($row_cartegory_sidebar = mysqli_fetch_array($sql_cartegory_sidebar)){
									
									?>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img src="images/<?php echo $row_cartegory_sidebar['product_image']?>" alt="" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
											<a href=""><?php echo $row_cartegory_sidebar['product_name']?></a>
											<a href="" class="price-mar mt-2"><?php echo  number_format($row_cartegory_sidebar['product_sales']).'VNĐ'?></a>
											<del><?php echo number_format($row_cartegory_sidebar['product_price']).'VNĐ'?></del>
										</div>
									</div>
									<?php
									}
									?>
								</div>
							</div>
						</div>
						<!-- //best seller -->
						<!-- reviews -->
						<div class="customer-rev border-bottom left-side py-2">
							<h3 class="agileits-sear-head mb-3">Khách hàng đánh giá</h3>
							<ul>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>5.0</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>4.0</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>3.0</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>2.0</span>
									</a>
								</li>
							</ul>
						</div>
						<!-- //reviews -->
					</div>
					<!-- //product right -->
				</div>
			</div>
			<div class="product-sec1" style="width:1300px; margin-left:-100px ;border-radius:10px">

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
		</div>
	</div>
	<!-- //top products -->

