<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
	
	$login_check = Session::get('customer_login'); 
	if($login_check==false){
		header('Location:login.php');
	}
		
?>

<style>
	h3.payment {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    text-decoration: underline;
	}
	.wrapper_method {
	text-align: center;
    width: 550px;
    margin: 0 auto;
    border: 1px solid #666;
    padding: 20px;
    /* margin: 20px; */
    background: cornsilk;
	}
	.wrapper_method a {
    padding: 10px;
  
    background: red;
    color: #fff;
    
	}
	.wrapper_method h3 {
   	 margin-bottom: 20px;
	}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
	    		<div class="heading">
	    		<h3>Phương thức thanh toán</h3>
	    		</div>
	    		
	    		<div class="clear"></div>
	    		<div class="wrapper_method">
		    		<h3 class="payment">Chọn phương thức thanh toán:</h3>
					<div class="m-2 d-flex">
				
   <fieldset class="border p-3 mr-2 col-6">    
      <legend class="small text-primary fw-bold">Phương thức thanh toán</legend>
      <div class="form-group row">
        <p><input type="radio" name="phuongthuctt" value="ck"> Chuyển khoản</p>
        <p><input type="radio" name="phuongthuctt" value="khinhan" > Khi nhận hàng</p>
        <p><input type="radio" name="phuongthuctt" value="onepay"> Onepay</p>
        
      </div>
    </fieldset>
	
	
    <fieldset class="border p-3 ml-3 col-6">    
       <legend class="small text-primary fw-bold">Phương thức giao hàng</legend>
       <div class="form-group row">
          <p><input type="checkbox" name="phuongthuctt" value="ghnhanh"> Giao hàng nhanh</p>
         <p><input type="checkbox" name="phuongthuctt" value="ghtietkiem"> Giao hàng tiết kiệm</p>
         <p><input type="checkbox" name="phuongthuctt" value="vnpost"> VN Post</p>
         <p><input type="checkbox" name="phuongthuctt" value="viettel"> Viettel</p>
       </div>
    </fieldset>    

</div>
		    		<a href="offlinepayment.php">Thanh toán</a>
		    	<!-- 	<a href="onlinepayment.php"Thanh toán Online</a><br><br><br> -->
		    		<a style="background:grey" href="cart.php"> << Quay về</a>
		    	</div>
    		</div>
		
 		</div>
 	</div>
<?php 
	include 'inc/footer.php';
	
 ?>
