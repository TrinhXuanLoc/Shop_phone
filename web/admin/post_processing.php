<!-- Kết nối database -->
<?php
    include('../db/connectdb.php'); 
?>
<!-- Upload sản phẩm -->
<?php
    if(isset($_POST['addpost'])){
        $post_name = $_POST['post_name'];
        $post_image = $_FILES['post_image']['name'];
        $post_image1 = $_FILES['post_image']['name'];
        $catalog_post = $_POST['catalog_post'];
        $post_summary = $_POST['post_summary'];
        $post_content = $_POST['post_content'];
        $path = '../uploads/post/';
        $post_image_tmp = $_FILES['post_image']['tmp_name'];
        $sql_insert_product = mysqli_query($con,"INSERT INTO tbl_post(post_name,post_image,post_image_detail,post_summary,post_content,newsfeed_id) 
        values ('$post_name','$post_image','$post_image1','$post_summary','$post_content','$catalog_post')");
        move_uploaded_file($post_image_tmp,$path.$post_image);
    }
    elseif(isset($_POST['update_post'])){
        $id_upload = $_POST['update_id'];
        $post_name = $_POST['post_name'];
        $post_image = $_FILES['post_image']['name'];
        $post_image1 = $_FILES['post_image']['name'];
        $catalog_post = $_POST['catalog_post'];
        $post_summary = $_POST['post_summary'];
        $post_content = $_POST['post_content'];
        $path = '../uploads/post/';
        $post_image_tmp = $_FILES['post_image']['tmp_name'];
        if($post_image ==''){
            $sql_update_image = "UPDATE tbl_post SET post_name='$post_name',post_summary='$post_summary',post_content='$post_content',newsfeed_id='$catalog_post' WHERE post_id='$id_upload' ";
        }else{
            move_uploaded_file($post_image_tmp,$path.$post_image);
            $sql_update_image = "UPDATE tbl_post SET post_name='$post_name',post_image='$post_image',post_image='$post_image1',post_summary='$post_summary',post_content='$post_content',newsfeed_id='$catalog_post' WHERE post_id='$id_upload' ";
        }
        mysqli_query($con,$sql_update_image);
    }
    if(isset($_GET['delete'])){
        $id_post = $_GET['delete'];
        $sql_delete_post = mysqli_query($con,"DELETE FROM tbl_post WHERE post_id='$id_post'");
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
    <title>Post Processing</title>
</head>
<body>
    <h2 style="color:red; text-align:center;margin:20px;" align = "center">Post Processing</h2>
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
            <!-- Update post -->
            <?php
                if(isset($_GET['manager'])=='update'){
                    $id_update = $_GET['update_id'];
                    $sql_update = mysqli_query($con,"SELECT * FROM tbl_post WHERE post_id='$id_update'");
                    $row_update = mysqli_fetch_array($sql_update);
                    $id_newsfeed = $row_update['newsfeed_id'];
                    ?>
                    <div class="col-md-4">
                        <h4>Cập nhật bài viết </h4>
                        <form action="" method="post" enctype="multipart/form-data">
                            <label for=""> Tên sản phẩm </label>
                            <input type="text" class="form-control" name="post_name" value="<?php echo $row_update['post_name'] ?>"></br>
                            <input type="hidden" class="form-control" name="update_id" value="<?php echo $row_update['post_id'] ?>"></br>
                            <label for=""> Hình ảnh </label>
                            <input type="file" class="form-control" name="post_image">
                            <img src="../uploads/post/<?php echo $row_update['post_image'] ?>" style="width:auto; height:150px; border:2px solid red; padding:5px 0px; margin:10px;" class="rounded-top" alt=""></br>
                            <label for=""> Hình ảnh </label>
                            <input type="file" class="form-control" name="post_image_detail">
                            <img src="../uploads/post/<?php echo $row_update['post_image_detail'] ?>" style="width:auto; height:150px; border:2px solid red; padding:5px 0px; margin:10px;" class="rounded-top" alt=""></br>
                            <label for=""> Tóm tắt bài viết</label>
                            <textarea class="form-control" name="post_summary" cols="20" rows="5" ><?php echo $row_update['post_summary'] ?></textarea></br>
                            <label for=""> Nội dung bài viết </label>
                            <textarea class="form-control" name="post_content" cols="20" rows="5" ><?php echo $row_update['post_content'] ?></textarea></br>
                            <label for=""> Danh mục sản phẩm </label>
                                <?php
                                    $sql_catalog = mysqli_query($con,"SELECT * FROM tbl_newsfeed ORDER BY newsfeed_id ASC");
                                ?>  
                            <select name="catalog_post" class="form-control">
                                <option value="0"><--------Chọn danh mục--------></option>
                                <?php
                                    while($row_catalog = mysqli_fetch_array($sql_catalog)){
                                        if($id_newsfeed == $row_catalog['newsfeed_id']){
                                ?>
                                <option selected value="<?php echo $row_catalog['newsfeed_id'] ?>"><?php echo $row_catalog['newsfeed_name'] ?></option>
                                <?php
                                    }else{
                                ?>
                                <option  value="<?php echo $row_catalog['newsfeed_id'] ?>"><?php echo $row_catalog['newsfeed_name'] ?></option>
                                <?php  
                                    }      
                                }
                                ?>
                            </select></br>
                            <input type="submit" name="update_post" value="Cập nhật bài viết" class="btn btn-danger">
                        </form>
                    </div>    
               
                    <?php       
                    }else{
                        ?>
                    <div class="col-md-4">
                        <h4>Thêm bài viết</h4>
                        <form action="" method="post" enctype="multipart/form-data">
                        <label for=""> Tên bài viết </label>
                            <input type="text" class="form-control" name="post_name" placeholder="Nhập tên bài viết"></br>
                            <label for=""> Hình ảnh </label>
                            <input type="file" class="form-control" name="post_image" ></br>
                            <label for=""> Hình ảnh trong bài viết </label>
                            <input type="file" class="form-control" name="post_image" ></br>
                            <label for=""> Tóm tắt bài viết </label>
                            <textarea class="form-control" name="post_summary" cols="20" rows="5"></textarea></br>
                            <label for=""> Nội dung bài viết </label>
                            <textarea class="form-control" name="post_content" cols="20" rows="5"></textarea></br>
                            <label for=""> Danh mục bài viết </label>
                                <?php
                                    $sql_catalog = mysqli_query($con,"SELECT * FROM tbl_newsfeed ORDER BY newsfeed_id ASC");
                                ?>  
                            <select name="catalog_post" class="form-control">
                                <option value="0"><--------Chọn danh mục--------></option>
                                <?php
                                    while($row_catalog = mysqli_fetch_array($sql_catalog)){
                                ?>
                                <option value="<?php echo $row_catalog['newsfeed_id'] ?>"><?php echo $row_catalog['newsfeed_name'] ?></option>
                                <?php
                                    }
                                ?>
                            </select></br>
                            <input type="submit" name="addpost" value="Đăng bài viết" class="btn btn-danger">
                        </form>
                    </div>
                    <?php
                    }
                    ?>
            <div class="col-md-8">
                <h4>Danh sách bài viết</h4>
                <?php
                    $sql_select_post= mysqli_query($con,"SELECT * FROM tbl_post,tbl_newsfeed WHERE tbl_post.newsfeed_id=tbl_newsfeed.newsfeed_id ORDER BY tbl_post.newsfeed_id ASC");
                ?>
                <table class="table table-bordered">
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Tên sản phẩm </th>
                        <th>Hình ảnh </th>
                        <th>Hình ảnh bài viết </th>
                        <th>Danh mục bài viết </th>
                        <th>Quản lý thao tác</th>
                    </tr>
                    <?php
                        $i = 0;
                        while($row_post = mysqli_fetch_array($sql_select_post)){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $row_post['post_name'] ?></td>
                        <td><img src="../uploads/post/<?php echo $row_post['post_image'] ?>" style="width:auto;height:60px;padding: 0 12px" alt=""></td>
                        <td><img src="../uploads/post/<?php echo $row_post['post_image_detail'] ?>" style="width:auto;height:60px;padding: 0 12px" alt=""></td>
                        <td><?php echo $row_post['newsfeed_name'] ?></td>
                        <td><a href="?delete=<?php echo $row_post['post_id'] ?>">Delete</a> or <a href="post_processing.php?manager=update&update_id=<?php echo $row_post['post_id'] ?>">Update</a></td>
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