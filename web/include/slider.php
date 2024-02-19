
	<!-- banner-2 -->
	<div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
		<ol class="carousel-indicators">
		  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
		<?php
		$sql_slider = mysqli_query($con,"SELECT * FROM tbl_slider WHERE slider_active ='1' ORDER BY slider_id");
		while($row_slider = mysqli_fetch_array($sql_slider)){	
	?>
		  <div class="carousel-item active">
			<img class="rounded float-left d-block  mx-auto" src="./images/slider1.png" alt="First slide" style="width:63%;height:250px;">
			<img class="rounded float-right d-block mx-auto" src="./images/Right1.png" alt="First slide" style="width:35%;height:250px;">
		  </div>
		  <div class="carousel-item ">
			<img class="float-left d-block rounded mx-auto" src="./images/slider2.png" alt="Second slide" style="width:63%;height:250px;">
			<img class="rounded float-right d-block mx-auto" src="./images/Right2.png" alt="First slide" style="width:35%;height:250px;">
		  </div>
		  <div class="carousel-item ">
			<img class="float-left d-block rounded mx-auto" src="./images/slider3.png" alt="Third slide" style="width:63%;height:250px;">
			<img class="rounded float-right d-block mx-auto" src="./images/slider4.png" alt="First slide" style="width:35%;height:250px;">
		  </div>
		</div>
		<?php
		}
	?>
		<a class="carousel-control-prev " href="#carouselExampleIndicators" role="button" data-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next  " href="#carouselExampleIndicators" role="button" data-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
	  </div>
	<!-- //banner-2 -->