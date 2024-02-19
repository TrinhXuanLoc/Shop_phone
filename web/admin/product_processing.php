<!-- Kết nối database -->
<?php
    include('../db/connectdb.php'); 
?>
<!-- Upload sản phẩm -->
<?php
    if(isset($_POST['addproduct'])){
        $product_name = $_POST['product_name'];
        $product_image = $_FILES['product_image']['name'];
        $product_price = $_POST['product_price'];
        $product_sales = $_POST['product_sales'];
        $product_quantity = $_POST['product_amount'];
        $catalog_product = $_POST['catalog_product'];
        $product_decribe = $_POST['product_decribe'];
        $product_detail = $_POST['product_detail'];
        $path = '../uploads/';
        $product_image_tmp = $_FILES['product_image']['tmp_name'];
        $sql_insert_product = mysqli_query($con,"INSERT INTO tbl_product(product_name,product_image,product_price,product_sales,product_amount,product_decribe,product_detail,cartegory_id) 
        values ('$product_name','$product_image','$product_price','$product_sales','$product_quantity','$product_decribe','$product_detail','$catalog_product')");
        move_uploaded_file($product_image_tmp,$path.$product_image);
    }
    elseif(isset($_POST['update_product'])){
        $id_upload = $_POST['update_id'];
        $product_name = $_POST['product_name'];
        $product_image = $_FILES['product_image']['name'];
        $product_price = $_POST['product_price'];
        $product_sales = $_POST['product_sales'];
        $product_quantity = $_POST['product_amount'];
        $catalog_product = $_POST['catalog_product'];
        $product_decribe = $_POST['product_decribe'];
        $product_detail = $_POST['product_detail'];
        $path = '../uploads/';
        $product_image_tmp = $_FILES['product_image']['tmp_name'];
        if($product_image ==''){
            $sql_update_image = "UPDATE tbl_product SET product_name='$product_name',product_price='$product_price',product_sales='$product_sales',product_amount='$product_quantity',product_decribe='$product_decribe',product_detail='$product_detail',cartegory_id='$catalog_product' WHERE product_id='$id_upload' ";
        }else{
            move_uploaded_file($product_image_tmp,$path.$product_image);
            $sql_update_image = "UPDATE tbl_product SET product_name='$product_name',product_image='$product_image',product_price='$product_price',product_sales='$product_sales',product_amount='$product_quantity',product_decribe='$product_decribe',product_detail='$product_detail',cartegory_id='$catalog_product' WHERE product_id='$id_upload'";   
        }
        mysqli_query($con,$sql_update_image);
    }
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql_delete = mysqli_query($con,"DELETE FROM tbl_cartegory WHERE cartegory_id='$id'");
    }

?>

<!-- Login and logout admin -->
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
    <title>Product Processing</title>
</head>
<body>
    <h2 style="color:red; text-align:center;margin:20px;" align = "center">Product Processing</h2>
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
            <!-- Update product -->
            <?php
                if(isset($_GET['manager'])=='update'){
                    $id_update = $_GET['update_id'];
                    $sql_update = mysqli_query($con,"SELECT * FROM tbl_product WHERE product_id='$id_update'");
                    $row_update = mysqli_fetch_array($sql_update);
                    $id_cartegory = $row_update['cartegory_id'];
                    ?>
                    <div class="col-md-4">
                        <h4>Cập nhật sản phẩm </h4>
                        <form action="" method="post" enctype="multipart/form-data">
                            <label for=""> Tên sản phẩm </label>
                            <input type="text" class="form-control" name="product_name" value="<?php echo $row_update['product_name'] ?>"></br>
                            <input type="hidden" class="form-control" name="update_id" value="<?php echo $row_update['product_id'] ?>"></br>
                            <label for=""> Hình ảnh </label>
                            <input type="file" class="form-control" name="product_image">
                            <img src="../uploads/<?php echo $row_update['product_image'] ?>" style="width:auto; height:150px; border:2px solid red; padding:5px 0px; margin:10px 200px;" class="rounded-top" alt=""></br>
                            <label for=""> Giá sản phẩm </label>
                            <input type="text" class="form-control" name="product_price" value="<?php echo $row_update['product_price'] ?>"></br>
                            <label for=""> Giá khuyến mãi </label>
                            <input type="text" class="form-control" name="product_sales" value="<?php echo $row_update['product_sales'] ?>"></br>
                            <label for=""> Số lượng </label>
                            <input type="text" class="form-control" name="product_amount" value="<?php echo $row_update['product_amount'] ?>"></br>
                            <label for=""> Mô  tả sản phẩm </label>
                            <textarea class="form-control" name="product_decribe" cols="20" rows="5" ><?php echo $row_update['product_decribe'] ?></textarea></br>
                            <label for=""> Chi tiết sản phẩm </label>
                            <textarea class="form-control" name="product_detail" cols="20" rows="5" ><?php echo $row_update['product_detail'] ?></textarea></br>
                            <label for=""> Danh mục sản phẩm </label>
                                <?php
                                    $sql_catalog = mysqli_query($con,"SELECT * FROM tbl_cartegory ORDER BY cartegory_id ASC");
                                ?>  
                            <select name="catalog_product" class="form-control">
                                <option value="0"><--------Chọn danh mục--------></option>
                                <?php
                                    while($row_catalog = mysqli_fetch_array($sql_catalog)){
                                        if($id_cartegory == $row_catalog['cartegory_id']){
                                ?>
                                <option selected value="<?php echo $row_catalog['cartegory_id'] ?>"><?php echo $row_catalog['cartegory_name'] ?></option>
                                <?php
                                    }else{
                                ?>
                                <option  value="<?php echo $row_catalog['cartegory_id'] ?>"><?php echo $row_catalog['cartegory_name'] ?></option>
                                <?php  
                                    }      
                                }
                                ?>
                            </select></br>
                            <input type="submit" name="update_product" value="Cập nhật sản phẩm" class="btn btn-danger">
                        </form>
                    </div>    
               
                    <?php       
                    }else{
                        ?>
                    <div class="col-md-4">
                        <h4>Thêm sản phẩm</h4>
                        <form action="" method="post" enctype="multipart/form-data">
                        <label for=""> Tên sản phẩm </label>
                            <input type="text" class="form-control" name="product_name" placeholder="Nhập tên sản phẩm"></br>
                            <label for=""> Hình ảnh </label>
                            <input type="file" class="form-control" name="product_image" ></br>
                            <label for=""> Giá sản phẩm </label>
                            <input type="text" class="form-control" name="product_price" placeholder="Nhập giá sản phẩm"></br>
                            <label for=""> Giá khuyến mãi </label>
                            <input type="text" class="form-control" name="product_sales" placeholder="Nhập giá khuyến mãi"></br>
                            <label for=""> Số lượng </label>
                            <input type="text" class="form-control" name="product_amount" placeholder="Nhập số lượng sản phẩm"></br>
                            <label for=""> Mô  tả sản phẩm </label>
                            <textarea class="form-control" name="product_decribe" cols="20" rows="5"></textarea></br>
                            <label for=""> Chi tiết sản phẩm </label>
                            <textarea class="form-control" name="product_detail" cols="20" rows="5"></textarea></br>
                            <label for=""> Danh mục sản phẩm </label>
                                <?php
                                    $sql_catalog = mysqli_query($con,"SELECT * FROM tbl_cartegory ORDER BY cartegory_id ASC");
                                ?>  
                            <select name="catalog_product" class="form-control">
                                <option value="0"><--------Chọn danh mục--------></option>
                                <?php
                                    while($row_catalog = mysqli_fetch_array($sql_catalog)){
                                ?>
                                <option value="<?php echo $row_catalog['cartegory_id'] ?>"><?php echo $row_catalog['cartegory_name'] ?></option>
                                <?php
                                    }
                                ?>
                            </select></br>
                            <input type="submit" name="addproduct" value="Thêm sản phẩm" class="btn btn-danger">
                        </form>
                    </div>
                    <?php
                    }
                    ?>
            <div class="col-md-8">
                <h4>Danh sách sản phẩm</h4>
                <?php
                    $sql_select_prd = mysqli_query($con,"SELECT * FROM tbl_product,tbl_cartegory WHERE tbl_product.cartegory_id=tbl_cartegory.cartegory_id ORDER BY tbl_product.product_id ASC");
                ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Tên sản phẩm </th>
                        <th>Hình ảnh </th>
                        <th>Giá sản phẩm </th>
                        <th>Giá khuyến mãi</th>
                        <th>Số lượng </th>
                        <th>Danh mục sản phẩm </th>
                        <th>Quản lý thao tác</th>
                    </tr>
                    <?php
                        $i = 0;
                        while($row_product = mysqli_fetch_array($sql_select_prd)){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row_product['product_name'] ?></td>
                        <td><img src="../uploads/<?php echo $row_product['product_image'] ?>" style="width:auto;height:60px;" alt=""></td>
                        <td><?php echo number_format($row_product['product_price']).'VNĐ' ?></td>
                        <td><?php echo number_format($row_product['product_sales']).'VNĐ' ?></td>
                        <td><?php echo $row_product['product_amount'] ?></td>
                        <td><?php echo $row_product['cartegory_name'] ?></td>
                        <td><a href="?delete=<?php echo $row_product['product_id'] ?>">Delete</a> or <a href="product_processing.php?manager=update&update_id=<?php echo $row_product['product_id'] ?>">Update</a></td>
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