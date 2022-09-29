<<htm>
    <head>
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
        <style>
            body{
    font-family: arial;
}
*{
    box-sizing: border-box;
}
.container{
    width: 1450px;
    margin: 0 auto;
    border: 5px solid #21244d;
    padding: 15px;

    height:auto;
}

#form-button{
    text-align: right;
    margin-top: 15px;
}
.product-price{
    color: red;
    font-weight: bold;
}
.product-img{
    padding: 5px;
    border: 1px solid #21244d;
    margin-bottom: 5px;
}

h1{
    text-align: left;
    margin-top: 0;
}
table.product{
    border-collapse: collapse;
    width: 1400px;
	border: 1px solid #21244d;
}
table.product, th, td {
    border: 1px solid #21244d;
}
table  .product-img img{
    max-width: 100px;
}
table .product-name{
    width: 400px;
    padding-left: 20px;
    text-align: center;
	border: 1px solid #21244d;
	 color: #21244d;
}
table .product-img{
    width: 300px;
    text-align: center;
}
table .product-number{
    width: 50px;
    text-align: center;
	border: 1px solid #21244d;
	 color: #21244d;
}
table .product-price{
    width: 200px;
    text-align: center;
	border: 1px solid #21244d;
}
table .product-quantity input{
    width: 40px;
    text-align: center;
}
table .product-quantity{
    width: 100px;
    text-align: center;
	border: 1px solid #21244d;
}
table .total-money{
    width: 200px;
    text-align: center;
	border: 1px solid #21244d;
	
}
.product-delete{
    width: 100px;
    text-align: center;
	border: 1px solid #21244d;
}
#cart-form label{
    width: 100px;
    display: inline-block;
    margin-top: 15px;
}

#cart-form input{
    line-height: 30px;
    height: 40px;
}
input[name="update_click"]{
    background: white;
    border: 3px solid #21244d;
    font-weight: bold;
    font-size: 15px;
    background-color:#eee ;
}

input[name="dathang"]{
    background: white;
    border: 3px solid #21244d;
    font-size: 15px;
    background-color:#eee ;
	margin-right: 20px;
}
input[type="text"]{
    border:none;
    width: 250px;
}
.row-total{
    background: #eee;
    color: #000;
	text-align: center;
}
hr{
    background: #21244d;
}
table .order,tr,td{
    
	margin-bottom: 10px;
    line-height: 32px;
    border-radius: 3px;
	border: 1px solid #21244d;
	width:500px ;
   
}
.box-content{
    margin: 0 auto;
    width: 800px;
    
    border: 1px solid #21244d;
    text-align: center;
    padding: 20px;
}
.order{
	margin-bottom: 10px;
    line-height: 32px;
    border-radius: 3px;
	border: 3px solid #21244d;
	width:500px ;
    height: 25px
}

        </style>
    </head>
    <body>
        
        <?php
            $tt=0;
            session_start();
            if(!empty($_SESSION['txtTK'])){ 
            $connect=mysqli_connect("localhost","root","","thoitrang") or die("Lỗi kết nối");
            //mysql_set_charset($connect, 'UTF8');
			mysqli_query($connect,"set names 'UTF8'");
            $sql="select * from ctgh where TaiKhoan= '".$_SESSION['txtTK']."'";
            $result = mysqli_query($connect, $sql) or die ("không được để trống");
            
        ?>
                <div class="container">
                
                <a  href="index.php">Trang chủ</a>
                
                
                <form id="cart-form" action="cart.php" method="POST">
                    <table class="product">
                        <tr class="row-total">
                            
                            <th class="product-name">Tên sản phẩm</th>
                            <th class="product-img">Sản phẩm</th>
                            <th class="product-price">Đơn giá</th>
                            <th class="product-quantity">Số lượng</th>
                            <th class="total-money">Thành tiền</th>
                            <th class="product-delete">Xóa</th>
                        </tr>
                        <?php
                        
                            $total = 0;
                            $num = 0;
                            while($row=mysqli_fetch_array($result)) {
								$num+=1;
                                // if(!empty($_POST)){
                                    // //$ma=$row[MaSP];
                                    // $sl=$_POST[$row['MaSP']];
                                    // $sql2="select * from sanpham where MaSP='".$row['MaSP']."'";
                                    // $result2 = mysqli_query($connect, $sql2) or die ("không thực hiện được câu lệnh 1");
									// $row2 = mysqli_fetch_array($result2);
                        
									// $sql3="update ctgh set SoLuong='".$sl."'  where MaSP='".$row['MaSP']."' and TaiKhoan ='".$_SESSION['txtTK']."' and TrangThai='".$tt."'";
									// $result3 = mysqli_query($connect, $sql3) or die ("không thực hiện được câu lệnh 2");
									// header('location:cart.php');
                                // }
                                //$ma =$kq['MaSP'];
								$sql2 = "select * from sanpham where MaSP='".$row['MaSP']."'";
								$result2 = mysqli_query($connect, $sql2) or die ("không thực hiện được câu lệnh 3");
								$row2 = mysqli_fetch_array($result2);
								$ttien= $row2['DonGia']*$row['SoLuong'];
								$total =$total + $ttien;
                   ?>
                                    
                                    <td class="product-name"><?=$row2['TenSP']?></td>
                                    <td class="product-img"><img src="<?=$row2['Anh']?>" /></td>
                                    <td class="product-price"><?= number_format($row2['DonGia'], 0, ",", ".") ?></td>
                                    <td class="product-quantity"><input type="text" value="<?=$row['SoLuong']?>" name="<?=$row2['MaSP']?>" /></td>
                                    <td class="total-money"><?= number_format($ttien, 0, ",", ".") ?></td>
                                    <td class="product-delete"><a href="delete.php?id=<?=$row2['MaSP']?>">Xóa</a></td>
                                </tr>
                                <?php
                                
                                $num++;
                                
                            }
                            ?>
                            <tr class="row-total">
                            <td class="product-name" colspan="5"><strong>Tổng tiền</strong></td>
                        <td class="product-money" colspan="2"><?php echo number_format($total, 0, ",", "."); $_SESSION['tong']=$total;?></td>
                            </tr>
                            </table>
                <div id="form-button">
                        <input type="submit" name="update_click" value="Cập nhật" /> 
                </div>
                </form>
                <hr>
                <div class="order_form">
                <table class="order">
                <form action="order.php" method="POST">
                    
                    <tr><td>Người nhận:</td><td class="a"><input type="text" name="name" ></td></tr>
                   <tr><td>Điện thoại:</td><td class="a"><input type="text" name="phone" ></td></tr>
                   <tr><td>Địa chỉ:</td><td class="a"><input type="text" name="address" ></td></tr>
                   
					<label><big><strong>Thanh toán khi nhận hàng</strong></big></label>
                   <tr><td colspan="2" align="right"><input type="submit" name="dathang" value="Mua ngay" /></td></tr> 
                    </form>
                </table>
                </div>
                
                
                
                
             
        </div>
            <?php }
            else{
                echo header('location:login.php') ;
            } 
            ?>
            </div>
            
    </body>
</htm>