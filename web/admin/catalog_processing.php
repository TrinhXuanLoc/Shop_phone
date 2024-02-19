<?php
    include('../db/connectdb.php');
?>
<?php
    if(isset($_POST['addcatalog'])){
        $catalog_name = $_POST['catalog'];
        $sql_insert = mysqli_query($con,"INSERT INTO tbl_cartegory(cartegory_name) values ('$catalog_name')");
    }elseif(isset($_POST['updatecatalog'])){
        $id_rename = $_POST['id_catalog'];
        $catalog_name = $_POST['catalog'];
        $sql_update_catalog = mysqli_query($con,"UPDATE tbl_cartegory SET cartegory_name='$catalog_name' WHERE cartegory_id='$id_rename'");
        header('Location:catalog_processing.php');
    }
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $sql_delete = mysqli_query($con,"DELETE FROM tbl_cartegory WHERE cartegory_id='$id'");
    }

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
    <title>Catalog Processing</title>
</head>
<body>
    <h2 style="color:red; text-align:center;margin:20px;">Catalog Processing</h2>
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
    </nav><br>
    <div class="contaiver">
        <div class="row" style="margin-left:100px">
            <?php
                if(isset($_GET['manager'])=='update'){
                    $id_update = $_GET['id'];
                    $sql_update = mysqli_query($con,"SELECT * FROM tbl_cartegory WHERE cartegory_id='$id_update'");
                    $row_update = mysqli_fetch_array($sql_update);
                    ?>
                    <div class="col-md-3">
                        <h4>Cập nhật danh mục</h4>
                        <label> Tên danh mục </label>
                        <form action="" method="post">
                            <input type="text" class="form-control" name="catalog" value="<?php echo $row_update['cartegory_name']?>"></br>
                            <input type="hidden" class="form-control" name="id_catalog" value="<?php echo $row_update['cartegory_id']?>">
                            <input type="submit" name="updatecatalog" value="Cập nhật danh mục" class="btn btn-danger">
                        </form>
                    </div>
                    <?php       
                    }else{
                        ?>
                    <div class="col-md-3">
                        <h4>Thêm danh mục</h4>
                        <label for=""> Tên danh mục </label>
                        <form action="" method="post">
                            <input type="text" class="form-control" name="catalog" placeholder="Nhập tên danh mục"></br>
                            <input type="submit" name="addcatalog" value="Thêm danh mục" class="btn btn-danger">
                        </form>
                    </div>
                    <?php
                    }
                    ?>
            <div class="col-md-7">
                <h4>Liệt kê danh mục</h4>
                <?php
                    $sql_select = mysqli_query($con,"SELECT * FROM tbl_cartegory ORDER BY cartegory_id ASC");
                ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Tên danh mục </th>
                        <th>Quản lý thao tác</th>
                    </tr>
                    <?php
                        $i = 0;
                        while($row_cartegory = mysqli_fetch_array($sql_select)){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row_cartegory['cartegory_name'] ?></td>
                        <td><a href="?delete=<?php echo $row_cartegory['cartegory_id'] ?>">Delete</a> or <a href="?manager=update&id=<?php echo $row_cartegory['cartegory_id'] ?>">Update</a></td>
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