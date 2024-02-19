<?php
    if(isset($_GET['order_cancle'])&& isset($_GET['transaction_code'])){
        $order_cancle = $_GET['order_cancle'];
        $order_code = $_GET['transaction_code'];
    }else{
        $order_cancle = '';
        $order_code = '';
    }
    $sql_update_order = mysqli_query($con,"UPDATE tbl_order SET order_cancle='$order_cancle' WHERE order_code='$order_code'" );
    $sql_update_transaction = mysqli_query($con,"UPDATE tbl_transaction SET transaction_cancle='$order_cancle' WHERE transaction_code='$order_code'" );
?>
<!-- pages -->
<div class="agile_inner_breadcrumb">
	<div class="container">
		<div class="product-sec1 border border-danger" style="margin-top:10px; border-radius:10px">
			<ul class="w3_short">
				<li>
					<a href="index.php" style="padding:0 0 0 12px" class="font-weight-bold"> <i class="fas fa-home mr-2"></i> Trang chủ </a>
					<i>></i>
				</li>
				<li class="font-weight-bold">Đơn hàng đã đặt</li>
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
<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3 font-weight-bold" style=" text-align:center;margin-top:-60px;">Đơn hàng đã đặt</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-12">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4" style="border-radius:15px">
							<div class="row">
                                <div class="font-weight-bold">
                                    <?php
                                        if(isset($_SESSION['login_home'])){
                                            echo 'Đơn hàng khách hàng: '.'<p style="color: red">'.$_SESSION['login_home'].'</p>';   
                                        }
                                    ?>  
                                </div>
                                <div class="col-md-12">
                                    <h5 style="margin:10px 0" class="font-weight-bold">Lịch sử đơn hàng</h5>
                                    <?php
                                        if(isset($_GET['customer'])){
                                            $id_customer = $_GET['customer'];
                                        }else{
                                            $id_customer = '';
                                        }
                                        $sql_select = mysqli_query($con,"SELECT * FROM tbl_transaction WHERE tbl_transaction.customer_id='$id_customer' GROUP BY tbl_transaction.transaction_code");
                                    ?>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Số thứ tự</th>
                                            <th>Mã giao dịch</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Đơn hàng</th>
                                            <th>Tình trạng </th>
                                            <th>Yêu cầu</th>
                                        </tr>
                                    <?php
                                        $i = 0;
                                        while($row_order = mysqli_fetch_array($sql_select)){
                                            $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row_order['transaction_code'] ?></td>
                                        <td><?php echo $row_order['transaction_date'] ?></td>
                                        <td><a href="index.php?manager=order_product&customer=<?php echo $_SESSION['customer_id']?>&transaction_code=<?php echo $row_order['transaction_code'] ?>">Chi tiết đơn hàng</a></td>  
                                        <td>
                                            <?php
                                                if($row_order['transaction_located'] == 0){
                                                    echo 'Đang xử lý';
                                                }else{
                                                    echo 'Đã xử lý';
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if($row_order['transaction_cancle'] == 0){
                                            ?>
                                            <a href="index.php?manager=order_product&customer=<?php echo $_SESSION['customer_id']?>&transaction_code=<?php echo $row_order['transaction_code'] ?>&order_cancle=1">Yêu cầu hủy đơn</a>
                                            <?php
                                            }elseif($row_order['transaction_cancle'] == 1){
                                            ?>
                                            <p>Đang chờ xác nhận hủy đơn</p>
                                            <?php
                                            }else{
                                                echo 'Yêu cầu hủy thành công.';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                    </table> 
                                </div>
                                <div class="col-md-12">
                                    <h5 style="margin:10px 0" class="font-weight-bold">Chi tiết đơn hàng</h5>
                                    <?php
                                        if(isset($_GET['transaction_code'])){
                                            $transaction_code = $_GET['transaction_code'];
                                        }else{
                                            $transaction_code = '';
                                        }
                                        $sql_select = mysqli_query($con,"SELECT * FROM tbl_transaction,tbl_customer,tbl_product WHERE tbl_transaction.product_id = tbl_product.product_id AND tbl_customer.customer_id = tbl_transaction.customer_id AND tbl_transaction.transaction_code='$transaction_code'  ORDER BY tbl_transaction.transaction_id ASC");
                                    ?>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Số thứ tự</th>
                                            <th>Mã giao dịch</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng </th>
                                            <th>Giá tiền</th>
                                            <th>Ngày đặt hàng</th>
                                            <th>Hình thức thanh toán</th>
                                            
                                        </tr>
                                    <?php
                                        $i = 0;
                                        while($row_order = mysqli_fetch_array($sql_select)){
                                        $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row_order['transaction_code'] ?></td>
                                        <td><?php echo $row_order['product_name'] ?></td>
                                        <td><?php echo $row_order['order_quantity'] ?></td>
                                        <td><?php echo number_format($row_order['order_quantity'] * $row_order['product_sales']).'VNĐ' ?></td>
                                        <td><?php echo $row_order['transaction_date'] ?></td> 
                                        <td><?php echo $row_order['customer_delivery'] ?></td>   
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                    </table> 
                                </div>
                            </div>
						</div>
						<!-- //first section -->
					</div>
				</div>
				<!-- //product left -->

			</div>
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
		</div>
	</div>
	<!-- //top products -->