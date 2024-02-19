    <?php
    	$sql_cartegory = mysqli_query($con,'SELECT * FROM tbl_cartegory ORDER BY cartegory_id ASC');
	?>
	<div class="navbar-inner bg-white" style="border-top: 2px solid red">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-white font-weight-bold" style="margin-bottom:10px;">
				<div class="agileits-navi_search ">
					<form action="#" method="post">
						<select id="agileinfo-nav_search" name="agileinfo_search" class="border font-weight-bold" required="">
							<option value="">Danh mục sản phẩm</option>
							<?php
								while($row_cartegory = mysqli_fetch_array($sql_cartegory)) {
							?>
							<option value="<?php echo $row_cartegory['cartegory_id'] ?>"><?php echo $row_cartegory['cartegory_name'] ?></option>
							<?php
								}
							?>
						</select>
					</form>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="index.php" style="color:red"><i class="fas fa-home mr-2"></i>Trang Chủ
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<?php
    						$sql_cartegory_dm = mysqli_query($con,'SELECT * FROM tbl_cartegory ORDER BY cartegory_id ASC');
							while($row_cartegory_dm = mysqli_fetch_array($sql_cartegory_dm)){
						?>
						<li class="nav-item  mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="?manager=cartegory&id=<?php echo $row_cartegory_dm['cartegory_id']?>" role="button"  aria-haspopup="true" aria-expanded="false">
								<?php echo $row_cartegory_dm['cartegory_name'] ?>
							</a>
						</li>
							<?php
							}
							?>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<?php
								$sql_newsfeed = mysqli_query($con,"SELECT * FROM tbl_newsfeed ORDER BY newsfeed_id ASC");
							?>
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Tin tức <i class="fas fa-newspaper"></i>
							</a>
							<div class="dropdown-menu">
								<?php
									while($row_newsfeed = mysqli_fetch_array($sql_newsfeed)){
								?>
								<a class="dropdown-item" href="?manager=news&id_news=<?php echo $row_newsfeed['newsfeed_id'] ?>"><?php echo $row_newsfeed['newsfeed_name'] ?></a>
								<div class="dropdown-divider"></div>
								<?php
								}
								?>
								
							</div>	
						</li>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Pages
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="index.php?manager=order_product&customer=<?php echo $_SESSION['customer_id']?>">Đơn hàng đã đặt</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="index.php?manager=contact">Contact Us</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="./admin/index.php">Login ADMIN</a>
								
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->