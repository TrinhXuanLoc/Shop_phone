<?php
	if(isset($_POST['search_button'])){
	$keyword = $_POST['search_product'];  
	$sql_product = mysqli_query($con,"SELECT * FROM tbl_product WHERE product_name LIKE '%$keyword%' ORDER BY product_id ASC");
	$title = $keyword;
    }
?>
<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Tên sản phẩm tìm kiếm: <?php echo $title ?></h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">
								<?php
								while($row_product = mysqli_fetch_array($sql_product)){
								?>
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="./uploads/<?php echo $row_product['product_image'] ?>" alt="" style="width: auto;height: 180px;">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?manager=detailproduct&id=<?php echo $row_product['product_id'] ?>" class="link-product-add-cart bg-danger">Thông tin SP</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="?manager=detailproduct&id=<?php echo $row_product['product_id'] ?>"><?php echo $row_product['product_name'] ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price"><?php echo number_format($row_product['product_sales']).'VNĐ'?></span>
												<del><?php echo number_format($row_product['product_price']).'VNĐ' ?></del>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="?manager=cart" method="post">
													<fieldset>
														<input type="hidden" name="product_name" value="<?php echo $row_product['product_name'] ?>" />
														<input type="hidden" name="product_id" value="<?php echo $row_product['product_id'] ?>" />
														<input type="hidden" name="product_price" value="<?php echo $row_product['product_sales'] ?>" />
														<input type="hidden" name="product_image" value="<?php echo $row_product['product_image'] ?>" />
														<input type="hidden" name="product_quantity" value="1" />
														<input type="submit" name="addtocart" value="Thêm vào giỏ hàng" class="button bg-danger" />
												</form>
											</div>
										</div>
									</div>
								</div>
								<?php
								}
								?>
							</div>
						</div>
						<!-- //first section -->
					</div>
				</div>
				<!-- //product left -->
				<!-- product right -->
				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3 font-weight-bold border border-danger" style="border-radius:10px;">
						<div class="search-hotel border-bottom py-2 ">
							<h3 class="agileits-sear-head mb-3">Lọc thông tin</h3>
							<form action="#" method="post">
								<input type="search" placeholder="Tìm kiếm..." name="search" required="">
								<input type="submit" value=" ">
							</form>
							<div class="left-side py-2">
								<ul>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Samsung</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Apple</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Oppo</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Laptop</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Tablet</span>
									</li>
								</ul>
							</div>
						</div>
						<!-- ram -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">RAM</h3>
							<ul>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">64 GB</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">128 GB</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">256 GB</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">512 GB</span>
								</li>
							</ul>
						</div>
						<!-- //ram -->
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
					</div>
					<!-- //product right -->
				</div>
			</div>
		</div>
	</div>
	<!-- //top products -->