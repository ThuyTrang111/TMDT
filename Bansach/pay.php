<html>
    <head>
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
        <style>
            .container{
    margin: 0 auto;
    width: 800px;
    border: 5px solid #fff2ec;
    text-align: center;
    padding: 20px;
}

.pay-form input[type=submit]{
    background: white;
    border: 5px solid #fff2ec;
margin-top: 30px;
font-size: 20px;
}

.box-content{
    margin: 0 auto;
    width: 800px;
    border: 1px solid #fff2ec;
    text-align: center;
    padding: 20px;
}
        </style>
    </head>
    <body>
        <?php 
        session_start();
        if(!empty($_SESSION['txtTK'])){
            $kn=mysqli_connect("localhost","root","","thoitrang") or die("Lỗi kết nối");
            mysqli_query($kn,"set names 'utf8'");
            $mahd=$_GET['MaHD'];
            if(isset($_POST['pay']))
            {
                $tb="";
                if($_POST['tt']=="0"){
                    ?>
                    <div class="box-content">
                            <h2><?php $tb="Thanh toán thành công."; echo $tb?></h2>
                            <a href="detail_order.php?MaHD=<?=$mahd?>">Xem chi tiết hóa đơn</a>
                        </div>
                        <?php
                }
                else
                {
                    $sql="update hoadon set TongTien = 0  where MaHD='".$mahd."'";
$kq=mysqli_query($kn,$sql)or die ("Không thể thực hiện được câu lệnh");
if($kq)
{
    ?>
    <div class="box-content">
                            <h2><?php $tb="Thanh toán thành công."; echo $tb?></h2>
                            <a href="detail_order.php?MaHD=<?=$mahd?>">Xem chi tiết hóa đơn</a>
                        </div>
                        <?php
}
else{
    ?>
    <div class="box-content">
                            <h2><?php $tb="Thanh toán không thành công."; echo $tb?></h2>
                            <a class="fas fa-reply-all" href="pay.php?MaHD=<?=$mahd?>">Quay lại</a>
                        </div>
                        <?php
}
                }
            }
            if(empty($tb))
            {
        ?>
        <div class="container">
        <a class="fas fa-reply-all" href="cart.php"><u> Quay lại</u></a>
            <h1>Chọn hình thức thanh toán</h1>
            <div class="pay-form">
            <table align="center">
            <form method="POST" action="" name="form" enctype="multipart/form-data">
            
            <tr><td><input type="radio" name="tt" value="0" checked="checked"></td><td>Thanh toán khi nhận hàng</td></tr>
            <tr><td><input type="radio" name="tt" value="1"></td><td>Thanh toán online (bằng thẻ tín dụng)</td></tr></br>
            <tr><td colspan="2" align="right"><input type="submit" name="pay" value="Thanh toán" /></td></tr>
        </form>
            </table>
            </div>
        </div>
        <?php }
        }
        else{
            header('Location: login.php');
        }
        ?>
    </body>
</html>