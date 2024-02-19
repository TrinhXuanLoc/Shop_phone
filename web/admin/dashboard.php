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
    <link rel="stylesheet" href="../css/fontawesome-all.css">
    <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <title>Welcome to ADMIN</title>
</head>
<body>
    <a href="">
        <h2 style="color:red; text-align:center;margin:20px;" class="font-weight-bold">Home ADMIN</h2>
    </a>
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
                <li class="nav-item" style="margin-top: -4px">
                    <p class="nav-link disabled text-dark">Xin chào <?php echo $_SESSION['login'] ?>, <a href="?login=logout" class="text-warning">Đăng xuất</a></p>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
        
    <div class="container">
        <div class="row">
            <div class="product-sec1" style="width:1300px;">
                <h4 class="heading-tittle font-weight-bold px-sm-4 px-3 mb-4" style="padding-top:20px">Chương trình ưu đãi</h4>	
                <div class="container">    
                    <div class="row">
                        <div class="col-sm-3 px-sm-2 px-4 mb-4">
                            <a href=""><img src="../images/sales1.webp" class="img-responsive" style="width:100%; border-radius:10px " alt="Image"></a>
                        </div>
                        <div class="col-sm-3 px-sm-2 px-4 mb-4">
                            <a href=""><img src="../images/sales2.webp" class="img-responsive" style="width:100%; border-radius:10px" alt="Image"></a>
                        </div>	
                        <div class="col-sm-3 px-sm-2 px-3 mb-4">
                            <a href=""><img src="../images/sales3.webp" class="img-responsive" style="width:100%; border-radius:10px" alt="Image"></a>
                        </div>	
                        <div class="col-sm-3 px-sm-2 px-3 mb-4">
                            <a href=""><img src="../images/sales4.webp" class="img-responsive" style="width:100%; border-radius:10px" alt="Image"></a>
                        </div>		
                        <div class="col-sm-3 px-sm-2 px-3 mb-4">
                            <a href=""><img src="../images/sales5.webp" class="img-responsive" style="width:100%; border-radius:10px" alt="Image"></a>
                        </div>	
                        <div class="col-sm-3 px-sm-2 px-3 mb-4">
                            <a href=""><img src="../images/sales6.webp" class="img-responsive" style="width:100%; border-radius:10px" alt="Image"></a>
                        </div>
                        <div class="col-sm-3 px-sm-2 px-3 mb-4">
                            <a href=""><img src="../images/sales7.webp" class="img-responsive" style="width:100%; border-radius:10px" alt="Image"></a>
                        </div>
                        <div class="col-sm-3 px-sm-2 px-3 mb-4">
                            <a href=""><img src="../images/sales8.webp" class="img-responsive" style="width:100%; border-radius:10px" alt="Image"></a>
                        </div>		
                    </div>
                </div>
            </div>
        </div>    
    </div>

    <!-- End content -->
    <!--Google map-->
    <div class="container">
        <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 800px; margin-top:20px">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2569711425117!2d106.71611711462262!3d10.791620092311156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528ab9000acc5%3A0xde0231b1d596805d!2zMTMyIMSQLiBOZ3V54buFbiBI4buvdSBD4bqjbmgsIFBoxrDhu51uZyAyMiwgQsOsbmggVGjhuqFuaCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1655838474003!5m2!1svi!2s" class="w-100 h-50" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <!--Google Maps-->
    <footer>
    <div class="footer-top-first">
                <div class="container py-md-5 py-sm-4 py-3">
                    <!-- footer first section -->
                    <div class="product-sec1 px-sm-4 px-3 mb-4" style="width:1300px; margin-left:-100px; margin-top:-400px">
                        <h2 class="footer-top-head-w3l font-weight-bold mb-2" style="margin-top:-100px; padding-top:20px">Giới thiệu về chúng tôi:</h2>
                        <p class="footer-main mb-4" style="margin-bottom:20px; line-height:1.8;">
                        <li style="margin-bottom:20px; line-height:1.8; list-style-type:demical"><strong>Trung thực</strong> - với cửa hàng và khách hàng trong mọi mối quan hệ. Đây là điều kiện tiên quyết để tạo dựng niềm tin.</li>
                        <li style="margin-bottom:20px; line-height:1.8; list-style-type:demical"><strong>Trách nhiệm</strong> - với cửa hàng và xã hội. Chúng tôi luôn thực hiện đúng cam kết uy tín, chất lượng tuyệt đối với từng sản phẩm.</li>
                        <li style="margin-bottom:20px; line-height:1.8; list-style-type:demical;  padding-bottom:20px"><strong>Chất lượng</strong> - đảm bảo hàng chính hãng 100%, hoàn tiền khi máy bị lỗi.</li></p>
                    </div>
                    <!-- //footer first section -->
                    <!-- footer second section -->
                    <div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
                        <div class="col-md-4 offer-footer">
                            <div class="row">
                                <div class="col-4 icon-fot">
                                    <i class="fas fa-dolly" style="color:red"></i>
                                </div>
                                <div class="col-8 text-form-footer">
                                    <h3>Miễn phí giao hàng</h3>
                                    <p>với đơn hàng trên 10.000.000 <sup>đ</sup></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 offer-footer my-md-0 my-4">
                            <div class="row">
                                <div class="col-4 icon-fot">
                                    <i class="fas fa-shipping-fast" style="color:red"></i>
                                </div>
                                <div class="col-8 text-form-footer">
                                    <h3>Dịch vụ chuyển phát nhanh</h3>
                                    <p>Toàn quốc.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 offer-footer">
                            <div class="row">
                                <div class="col-4 icon-fot">
                                    <i class="far fa-thumbs-up" style="color:red"></i>
                                </div>
                                <div class="col-8 text-form-footer">
                                    <h3>Sự lựa chọn</h3>
                                    <p>Uy tín, chất lượng, đáng tin cậy.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- //footer second section -->
                </div>
            </div>
    </footer>
</body>
</html>