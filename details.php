<?php
include 'inc/header.php';
// include 'inc/slider.php';
?>
<?php

if (!isset($_GET['proid']) || $_GET['proid'] == NULL) {
	echo "<script>window.location ='404.php'</script>";
} else {
	$id = $_GET['proid'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

	$quantity = $_POST['quantity'];
	$insertCart = $ct->add_to_cart($quantity, $id);
}
if (isset($_POST['cmt_submit'])) {
	$cmt_insert = $cs->insert_cmt();
}
?>
<div class="main">
	<div class="content">
		<div class="section group">
			<?php
			$get_product_details = $product->get_details($id);
			if ($get_product_details) {
				while ($result_details = $get_product_details->fetch_assoc()) {
			?>
					<div class="cont-desc span_1_of_2">
						<div class="grid images_3_of_2">
							<img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="Photo" style="height: 100%" />
							<br/>
							<br/>
							
						</div>
						<style type="text/css">
						h2.font {
							  font-size: 30px;
							  font-family: Arial;
						div.fontt{
							font-family: Arial;
							}
						</style>
						<div class="desc span_3_of_2">
							<h2 class = "font"><strong><?php echo $result_details['productName'] ?></strong></h2>
							<p><?php echo $fm->textShorten($result_details['product_desc'], 150) ?></p>
							<div class="price">
								
								<p>Giá: <span><?php echo $fm->format_currency($result_details['price']) . " " . "VNĐ" ?></span></p>
								<p>Tác giả: <span><?php echo $result_details['tacgia'] ?></span></p>
								<p>NXB: <span><?php echo $result_details['nxb'] ?></span> &emsp;&emsp; Năm xuất bản: <span><?php echo $result_details['namxb'] ?></span></p>
								
								<p>Trọng lượng: <span><?php echo $result_details['trongluong'] ?></span>&emsp;&emsp;&emsp; Kích thước: <span><?php echo $result_details['kichthuoc'] ?></span></p>
								
								<p>Số trang: <span><?php echo $result_details['trang'] ?></span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Danh mục: <span><?php echo $result_details['catName'] ?></span></p>
								
								<p>Ngôn ngữ:<span><?php echo $result_details['brandName'] ?></span></p>
							</div>
							<div class="add-cart">
								<form action="" method="post">
									<input type="number" class="buyfield" name="quantity" value="1" min="1" />
									<input type="submit" class="buysubmit" name="submit" value="Mua ngay" style="background: black" />
								</form>
								<?php
								if (isset($insertCart)) {
									echo $insertCart;
								}
								?>
							</div>
						</div>
						
						
						<div class="product-desc">
							
							<p><h2 style="background: Black">Nội dung sản phẩm</h2> Sản phẩm tương tự</p>
							
							<?php echo $result_details['product_desc'] ?>
							
						</div>
						

					</div>
			<?php
				}
			}
			?>
			<div class="rightsidebar span_3_of_1">
				<h2>Danh mục</h2>
				<ul>
					<?php
					$getall_category = $cat->show_category_fontend();
					if ($getall_category) {
						while ($result_allcat = $getall_category->fetch_assoc()) {
					?>
							<li><a href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName'] ?></a></li>
					<?php
						}
					}
					?>
				</ul>

			</div>
		</div>
		<div class="cmt">
			<div class="row">

				<div class="col-md-8" style="color: FireBrick">
					<h5><strong>&emsp;Bình luận sản phẩm</strong></h5>
					<?php
					if (isset($cmt_insert)) {
						echo $cmt_insert;
					}
					?>
					<form action="" method="POST">
						<p><input type="hidden" value="<?php echo $id ?>" name="product_id_cmt"></p>
						<p><input type="text"  placeholder="Điền tên" class="form-control" name="cmtName"></p>
						<p><textarea rows="5" style="resize: none;" placeholder="Bình luận...." class="form-control" name="cmt"></textarea></p>
						<p>&emsp;<input type="submit" name="cmt_submit" class="btn btn-success" style="background: Black" value="Gửi bình luận"></p>
					</form>
				</div>
			</div>
			</textarea>
		</div>
	</div>
</div>

<?php
include 'inc/footer.php';

?>