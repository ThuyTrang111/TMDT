<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BanSach</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
	<style>
        body {
            font-family: arial;
        }

        .container {
            width: 1450px;
            margin: 0 auto;
            
        }

        h1 {
            text-align: center;
        }

        .product-items {
            padding: 30px;
        }

        .product-item {
            float: left;
            width: 23%;
            margin: 1%;
            padding: 10px;
            box-sizing: border-box;
            border: 4px solid #fff2ec;
            line-height: 26px;
        }

        .product-price {
            color: red;
            font-weight: bold;
        }

        .product-img {
            padding: 5px;
            border: 4px solid #fff2ec;
            margin-bottom: 5px;
        }

        .product-item img {
            max-width: 100%;
        }

        .clear-both {
            clear: both;
        }

        a {
            text-decoration: none;
        }

        .buy-button {
            text-align: right;
            margin-top: 10px;
        }

        .buy-button a {
            background: #444;
            padding: 5px;
            color: #fff;
        }

        .page-item {
            border: 1px solid #fff2ec;
            padding: 10px;
            margin-right: 5px;
            margin-left: 5px;
            color: black;
        }
    </style>
</head>

<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
   
    
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
       
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="bansach.php">Trang chủ</a></li>
                            <li><a href="">Danh mục</a>
							<div class="header__menu__dropdown">
							<ul>
                            <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <li>
                                    <a href="index.php?MaHang=<?= $row['MaLoai'] ?>"><?= $row['TenLoai'] ?></a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
							</div>
                            <li><a href="#">Sắp xếp<a>
                                <ul class="header__menu__dropdown">
                                    <li><a href=".index.php?ID=asc">Giá thấp đến cao</a></li>
                                    <li><a href="index.php?ID=desc">Giá cao đến thấp</a></li>
                                    
                                </ul>
                            </li>
                            <li><a href="cart.php">Giỏ hàng</a></li>
                            
                        </ul>
                    </nav>
                </div>
                
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Trang chủ</span>
                        </div>
                        <ul>
                            <li><a href="infor.php">Thông tin tài khoản</a></li>
                            <li><a href="logout.php">Đăng xuất</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="form" enctype="multipart/form-data">
                              <input type="text" placeholder="Tìm kiếm..." name="search">  
                                
                                <button type="submit" name="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0397502523</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="img/hero/6.jpg">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>SẢN PHẨM</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>

                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
			<?php

    $sodong = 8;
    if (isset($_GET['trang'])) {
        $trangchon = $_GET['trang'];
    } else {
        $trangchon = 0;
    }
    $connect = mysqli_connect("localhost", "root", "", "thoitrang") or die("Lỗi kết nối");
    mysqli_query($connect, "set names 'utf8'");
    if (isset($_POST['submit']) && isset($_POST['search'])) {
        $sqlconnect = "select * from sanpham where TenSP like '%" . $_POST['search'] . "%'";
        $kq = mysqli_query($connect, $sqlconnect);
        $sodongdl = mysqli_num_rows($kq);
        $sotrangdl = $sodongdl / $sodong;
        $vtbd = $trangchon * $sodong;
        $ltvtrang = "select * from sanpham where TenSP like '%" . $_POST['search'] . "%' limit {$vtbd},{$sodong} ";
        $kqpt = mysqli_query($connect, $ltvtrang);
    } else if (isset($_GET['ID'])) {
        if ($_GET['ID'] == "asc") {
            $sqlconnect = "select * from sanpham order by DonGia ASC";
            $kq = mysqli_query($connect, $sqlconnect);
            $sodongdl = mysqli_num_rows($kq);
            $sotrangdl = $sodongdl / $sodong;
            $vtbd = $trangchon * $sodong;
            $ltvtrang = "select * from sanpham order by DonGia ASC  limit {$vtbd},{$sodong}";
            $kqpt = mysqli_query($connect, $ltvtrang);
        } else {
            $sqlconnect = "select * from sanpham order by DonGia DESC";
            $kq = mysqli_query($connect, $sqlconnect);
            $sodongdl = mysqli_num_rows($kq);
            $sotrangdl = $sodongdl / $sodong;
            $vtbd = $trangchon * $sodong;
            $ltvtrang = "select * from sanpham order by DonGia DESC  limit {$vtbd},{$sodong}";
            $kqpt = mysqli_query($connect, $ltvtrang);
        }
    } else if (isset($_GET['MaHang'])) {
        $sqlconnect = "select * from sanpham where MaLoai='" . $_GET['MaHang'] . "'";
        $kq = mysqli_query($connect, $sqlconnect);
        $sodongdl = mysqli_num_rows($kq);
        $sotrangdl = $sodongdl / $sodong;
        $vtbd = $trangchon * $sodong;
        $ltvtrang = "select * from sanpham where MaLoai='" . $_GET['MaHang'] . "' limit {$vtbd},{$sodong} ";
        $kqpt = mysqli_query($connect, $ltvtrang);
    } else {
        $sqlconnect = "select * from sanpham";
        $kq = mysqli_query($connect, $sqlconnect);
        $sodongdl = mysqli_num_rows($kq);
        $sotrangdl = $sodongdl / $sodong;
        $vtbd = $trangchon * $sodong;
        $ltvtrang = "select * from sanpham limit {$vtbd},{$sodong}";
        $kqpt = mysqli_query($connect, $ltvtrang);
    }

    ?>
    <div class="container">
        <div class="product-items">
            <?php
            while ($row = mysqli_fetch_array($kqpt)) {
            ?>
                <div class="product-item">
                    <div class="product-img">

                        <img src="<?= $row['Anh'] ?>" title="<?= $row['TenSP'] ?>" />
                    </div>
                    <div class="product-name"><a href="detail.php?MaSP=<?= $row['MaSP'] ?>"><?= $row['TenSP'] ?></a></div>
                    <div class="product-price">Giá: <?= number_format($row['DonGia'], 0, ",", ".") ?> VNĐ</div>
                    <div class="buy-button">
                        <a href="detail.php?MaSP=<?= $row['MaSP'] ?>">Xem chi tiết</a>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="clear-both"></div>
        </div>
        <?php
        for ($page = 0; $page <= $sotrangdl; $page++) {
            echo "<a class='page-item' href='index.php?trang=$page'>$page</a>";
        }
        echo "</p>";
        ?>
    </div>



              
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
   
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>