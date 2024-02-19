<?php
    if(isset($_GET['id_news'])){
        $post_id = $_GET['id_news'];
    }else{
        $post_id = ''; 
    }
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
                <?php
                    $sql_postname = mysqli_query($con,"SELECT * FROM tbl_post WHERE post_id='$post_id'");
                    $row_postname = mysqli_fetch_array($sql_postname);  
                ?>
                <li class="font-weight-bold"><?php echo $row_postname['post_name'] ?></li>
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
<!-- about -->
    <div class="welcome py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
            <?php
                $sql_postnews = mysqli_query($con,"SELECT * FROM tbl_post WHERE post_id='$post_id'");
                $row_postnews = mysqli_fetch_array($sql_postnews);  
            ?>
			<!-- tittle heading -->
			<h4 class=" text-center mb-lg-5 mb-sm-4 mb-3 font-weight-bold" style="margin-top:-40px;"><?php echo $row_postnews['post_name'] ?></h4>
			<!-- //tittle heading -->
            <?php
                $sql_post = mysqli_query($con,"SELECT * FROM tbl_post WHERE tbl_post.post_id = '$post_id'");
                while($row_post = mysqli_fetch_array($sql_post)){
            ?>
            <div class="row border product-sec1" style="border-radius:15px; padding:20px">            
                <div class="col-lg-4 welcome-left">
                    <img src="uploads/post/<?php echo $row_post['post_image'] ?>" class="img-fluid w-50" alt=" ">
                </div>
                <div class="col-lg-8 welcome-right" style="margin-left:-170px">
                    <h4 class="font-weight-bold "><a href="index.php?manager=news_detail&id_news=<?php echo $row_post['post_id'] ?>" style="font-size:20px; color:red"><?php echo $row_post['post_name'] ?></a></h4>
                    <h5 class="my-sm-3 my-2" style="font-size:16px; line-height:1.8"><b><?php echo $row_post['post_summary'] ?></b></h5>
                    <img src="uploads/post/<?php echo $row_post['post_image_detail'] ?>" class="img-fluid w-100" alt=" ">
                    <h5 class="my-sm-3 my-2" style="font-size:16px; line-height:1.8"><?php echo $row_post['post_content'] ?></h5>
                </div>
			</div></br>
            <?php
                }
            ?>
		</div>
	</div>
<!-- //about -->