<?php
    include('../db/connectdb.php');
?>
<!-- <?php
    if(isset($_POST['update_order'])){
        $handle = $_POST['handle'];
        $order = $_POST['handle_order'];
        $sql_update_order = mysqli_query($con,"UPDATE tbl_order SET order_status='$handle' WHERE order_code='$order'" );
    }
?>
<?php
    if(isset($_GET['delete_order'])){
        $delete_order = $_GET['delete_order'];
        $sql_delete_order = mysqli_query($con, "DELETE FROM tbl_order WHERE order_code='$delete_order'");
        header('Location: order_processing.php');
    }
?> -->
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
    <title>Customer</title>
</head>
<body>
    <h2 style="color:red; text-align:center;margin:20px; " align = "center">Customer</h2>
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
    <div class="contaiver">
        <div class="row">
                    <div class="col-md-12">
                        <h4 style="margin-top:10px;">Danh sách khách hàng</h4>
                    <?php
                        $sql_select_customer = mysqli_query($con,"SELECT * FROM tbl_customer,tbl_transaction WHERE tbl_customer.customer_id = tbl_transaction.customer_id GROUP BY tbl_transaction.transaction_code ORDER BY tbl_customer.customer_id ASC");
                    ?>
                    <form action="" method="post">
                        <table class="table table-bordered">
                            <tr>
                                <th>Số thứ tự</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại đặt hàng</th>
                                <th>Email liên hệ</th>
                                <th>Địa chỉ giao hàng</th>
                                <th>Hình thức thanh toán </th>
                                <th>Ngày đặt hàng</th>
                                <th>Quản lý thao tác</th>
                            </tr>
                        <?php
                            $i = 0;
                            while($row_customer = mysqli_fetch_array($sql_select_customer)){
                                $i++;
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row_customer['customer_name'] ?></td>
                            <td><?php echo $row_customer['customer_phone'] ?></td>
                            <td><?php echo $row_customer['customer_email'] ?></td> 
                            <td><?php echo $row_customer['customer_address'] ?></td>
                            <td><?php echo $row_customer['customer_delivery'] ?></td>
                            <td><?php echo $row_customer['transaction_date'] ?></td>
                            <td><a href="?manager=history_view&customer=<?php echo $row_customer['transaction_code'] ?>">Lịch sử giao dịch</a></td>
                        </tr>
                        <?php
                            }
                        ?>
                        </table>
                       
                    </form>        
                </div>

                <div class="col-md-12">
                        <h4 style="margin-top:10px;">Lịch sử đơn hàng</h4>
                    <?php
                        if(isset($_GET['customer'])){
                            $transaction_code = $_GET['customer'];
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
</body>
</html>