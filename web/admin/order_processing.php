<?php
    include('../db/connectdb.php');
?>
<?php
    if(isset($_POST['update_order'])){
        $handle = $_POST['handle'];
        $order = $_POST['handle_order'];
        $sql_update_order = mysqli_query($con,"UPDATE tbl_order SET order_status='$handle' WHERE order_code='$order'" );
        $sql_update_transaction = mysqli_query($con,"UPDATE tbl_transaction SET transaction_located='$handle' WHERE transaction_code='$order'" );
    }
?>
<?php
    if(isset($_GET['delete_order'])){
        $delete_order = $_GET['delete_order'];
        $sql_delete_order = mysqli_query($con, "DELETE FROM tbl_order WHERE order_code='$delete_order'");
        header('Location: order_processing.php');
    }
    if(isset($_GET['agree'])&& isset($_GET['order_code'])){
        $order_cancle = $_GET['agree'];
        $order_code = $_GET['order_code'];
    }else{
        $order_cancle = '';
        $order_code = '';
    }
    $sql_update_order = mysqli_query($con,"UPDATE tbl_order SET order_cancle='$order_cancle' WHERE order_code='$order_code'" );
    $sql_update_transaction = mysqli_query($con,"UPDATE tbl_transaction SET transaction_cancle='$order_cancle' WHERE transaction_code='$order_code'" );
?>
<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header('Location: index.php');
    }
    if(isset($_GET['login'])){
        $logout = $_GET['login'];
        }else{
            $logout= '';
        }
        if($logout=='logout'){
            session_destroy();
            header('Location: index.php');
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <title>Order Processing</title>
</head>
<body>
    <h2 style="color:red; text-align:center;margin:20px;" align = "center">Order Processing</h2>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary font-weight-bold">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link text-white" href="../index.php"><i class="fas fa-home mr-2"></i>Trang chủ</a></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-white" href="catalog_processing.php">Danh mục sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="catalog_post.php">Danh mục bài viết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="product_processing.php">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="order_processing.php">Đơn hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="customer_processing.php">Khách hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="post_processing.php">Bài viết</a>
                </li>
                <li class="nav-item">
                    <p class="nav-link disabled text-dark">Xin chào <?php echo $_SESSION['login'] ?>, <a href="?login=logout" class="text-warning">Đăng xuất</a></p>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
                <?php
                if(isset($_GET['manager'])=='order_view'){
                    $order_code = $_GET['order_code'];
                    $sql_detail_order = mysqli_query($con,"SELECT * FROM tbl_order,tbl_product WHERE tbl_order.product_id = tbl_product.product_id AND tbl_order.order_code='$order_code'");
                ?>
                    <div class="col-md-4">
                        <h4>Xem chi tiết đơn hàng</h4>
                    </div>
                    <div class="col-md-9">
                    <form action="" method="post">   
                    <table class="table table-bordered">
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên sản phẩm </th>
                        <th>Số lượng</th>
                        <th>Giá tiền sản phẩm</th>
                        <th>Tổng tiền đơn hàng</th>
                        <th>Ngày đặt hàng</th>
     
                    </tr>
                    <?php
                        $i = 0;
                        while($row_order = mysqli_fetch_array($sql_detail_order)){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row_order['order_code'] ?></td>
                        <td><?php echo $row_order['product_name'] ?></td>
                        <td><?php echo $row_order['order_quantity'] ?></td>
                        <td><?php echo number_format($row_order['product_sales']).'VNĐ' ?></td>
                        <td><?php echo number_format($row_order['order_quantity'] * $row_order['product_sales']).'VNĐ' ?></td>
                        <td><?php echo $row_order['order_date'] ?></td>
                        <input type="hidden" name="handle_order" value="<?php echo $row_order['order_code'] ?>">
                        
                    </tr>
                    <?php
                        }
                    ?>
                    </table>
                        <select class="form-control" name="handle">
                            <option value="0">Chưa xử lý đơn hàng</option>
                            <option value="1">Đã xử lý đơn hàng </option>
                        </select></br>
                        <input type="submit" value="Cập nhật đơn hàng" name="update_order" class="btn btn-danger">
                    </form>     
                    </div>
                    <?php       
                    }else{
                        ?>
                    <div class="col-md-2">                       
                        <h4>Đơn hàng</h4>
                    </div>
                    <?php
                    }
                    ?>
                <div class="col-md-12">
                        <h4 style="margin-top:10px;">Danh sách đơn hàng</h4>
                    <?php
                        $sql_select = mysqli_query($con,"SELECT * FROM tbl_product,tbl_customer,tbl_order WHERE tbl_order.product_id = tbl_product.product_id AND tbl_order.customer_id = tbl_customer.customer_id  GROUP BY order_code   ");
                    ?>
                    <form action="" method="post">
                        <table class="table table-bordered">
                            <tr>
                                <th>Số thứ tự</th>
                                <th>Tên khách hàng</th>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt hàng</th>
                                <th>Ghi chú đơn hàng</th>
                                <th>Tình trạng đơn hàng</th>    
                                <th>Hủy đơn</th>    
                                <th>Quản lý thao tác</th>
                            </tr>
                        <?php
                            $i = 0;
                            while($row_order = mysqli_fetch_array($sql_select)){
                                $i++;
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row_order['customer_name'] ?></td>
                            <td><?php echo $row_order['order_code'] ?></td>
                            <td><?php echo $row_order['order_date'] ?></td> 
                            <td><?php echo $row_order['customer_note'] ?></td>
                            <td>
                                <?php
                                    if($row_order['order_status']==0){
                                        echo 'Chưa xử lý đơn hàng';
                                    }else{
                                        echo 'Đã xử lý đơn hàng';
                                    }
                                ?>
                            </td>    
                            <td><?php if($row_order['order_cancle'] == 0){
                                echo '';
                            }elseif($row_order['order_cancle']== 1){
                                echo '<a href="order_processing.php?manager=order_view&order_code='.$row_order['order_code'].'&agree=2" >Xác nhận hủy đơn</a>';
                            }else{
                                echo 'Đã hủy đơn';
                            } 
                            ?>
                            </td>
                            <td><a href="?delete_order=<?php echo $row_order['order_code'] ?>">Delete</a> or <a href="?manager=order_view&order_code=<?php echo $row_order['order_code'] ?>">View Order</a></td>
                        </tr>
                        <?php
                            }
                        ?> 
                        </table>
                       
                    </form>        
                </div>
        </div>
    </div>
</body>
</html>