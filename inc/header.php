<!DOCTYPE html>

<?php
include 'lib/session.php';
Session::init();
?>
<?php

include 'lib/database.php';
include 'helpers/format.php';

spl_autoload_register(function ($class) {
	include_once "classes/" . $class . ".php";
});


$db = new Database();
$fm = new Format();
$ct = new cart();
$br = new brand();
$cat = new category();
$cs = new customer();
$product = new product();


?>
<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>

<head>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
	<link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/jquerymain.js"></script>
	<script src="js/script.js" type="text/javascript"></script>

	<script type="text/javascript" src="js/nav.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript" src="js/nav-hover.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>



	<!-- Latest compiled and minified JavaScript -->
	<script type="text/javascript">
		$(document).ready(function($) {
			$('#dc_mega-menu-orange').dcMegaMenu({
				rowItems: '4',
				speed: 'fast',
				effect: 'fade'
			});
		});
	</script>
	
	</style>

</head>
	
<body>
<img src="/admin/uploads/brandd.png" width="1263" height="60" />
	<div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php">
					<img src="/admin/uploads/log.png" alt=""/>
				</a>
			</div>
			<br/>
			
			<div class="header_top_right">
				<div class="search_box">
					<form action="search.php" method="post">
						<input type="text" placeholder="T??m ki???m s???n ph???m" name="tukhoa">&emsp;&ensp;
						<button type="submit" class="btn btn-dark">T??m</button>
					</form>
					

				</div>
				

				<div class="shopping_cart">
					
						<a href="cart.php" title="View my shopping cart" rel="nofollow">
							
                        <button class="btn btn-outline-dark" >
                            <i class="bi-cart-fill me-1"></i>
                           Gi??? h??ng
							<span class="badge bg-dark text-white ms-1 rounded-pill">
							
								<?php
								$check_cart = $ct->check_cart();
								if ($check_cart) {
									// $sum = Session::get("sum"); $fm->format_currency($sum).' '.'??'.
									$qty = Session::get("qty");
									echo ' ' . $qty;
								} else {
									echo '0';
								}
								?>
							</span>
							 </button>
						</a>
					</div>
					&emsp;
				
						<?php
				if (isset($_GET['customer_id'])) {
					$customer_id = $_GET['customer_id'];
					$delCart = $ct->del_all_data_cart();
					Session::destroy();
				}
				?>
				

				<div class="btn btn-dark">
					<?php
					$login_check = Session::get('customer_login');
					if ($login_check == false) {
						echo '<a class="badge bg-dark text-white ms-1 rounded-pill" href="login.php">????ng nh???p</a></div>';
					} else {
						echo '<a class="badge bg-dark text-white ms-1 rounded-pill" href="?customer_id=' . Session::get('customer_id') . '">????ng xu???t</a></div>';
					}
					?>
				</div>

					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
			
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<div class="container px-4 px-lg-5">
						<!--  <div class="navbar-header">
	      <a class="navbar-brand" href="#">WebSiteName</a>
	    </div> -->
		<a class="navbar-brand" href="#!">Books</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
							<li class="nav-item"><a class="navbar-brand" aria-current="page" href="index.php">Trang ch???</a></li>
							<li class="nav-item dropdown">
								<a class="navbar-brand" data-toggle="dropdown" href="#">
									Danh m???c s???n ph???m
									<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<?php
									$cate = $cat->show_category();
									if ($cate) {
										while ($result_new = $cate->fetch_assoc()) {
									?>
											<li>
												<a href="productbycat.php?catid=<?php echo $result_new['catId'] ?>"><?php echo $result_new['catName'] ?></a>
											</li>
									<?php
										}
									}
									?>
								</ul>
							</li>
							<li class="nav-item dropdown">
								<a class="navbar-brand" data-toggle="dropdown" href="#">
									Ng??n Ng???
									<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<?php
									$brand = $br->show_brand_home();
									if ($brand) {
										while ($result_new = $brand->fetch_assoc()) {

									?>
											<li>
												<a href="topbrands.php?brandid=<?php echo $result_new['brandId'] ?>"><?php echo $result_new['brandName'] ?></a>
											</li>
									<?php
										}
									}
									?>
								</ul>
							</li>
							<li class="nav-item"><a class="navbar-brand" href="sale.php">S??ch gi???m gi??</a></li>
							

							<?php
							$login_check = Session::get('customer_login');
							if ($login_check == false) {
								echo '';
							} else {
								echo '<li><a class="navbar-brand" href="profile.php">T??i kho???n</a> </li>
								<li><a class="navbar-brand" href="orderdetails.php">H??a ????n</a> </li>';
							}
							?>
							<li class="nav-item"><a class="navbar-brand" href="contact.php">Li??n h???</a></li>
							
						</ul>
					</div>
			</div>
			</nav>