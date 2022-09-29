<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TNLs Boutique</title>
    <style>
        body{
				font-family: arial;
			}
            .thongtin {
    width: 800px;
    border: 3px solid #4a26ab;
    vertical-align: middle;
    padding-top: 80px;
    padding-bottom: 80px;
    margin-left: 350px;
    margin-top: 131px;
	background-color: #21244d;
	
}
            .chinhsua {
            margin-top: -76px;
            margin-left: 670px;
            margin-bottom: 25px;
			color: #b8e7ea;
        }
a{
    font-size: 17px;
}
.ht{    font-size: 40px;    margin-left: 220px;  color: #b8e7ea;}

.tt {
    margin-left: 230px;
    margin-bottom: 16px;
	color: #b8e7ea;
}
.tt1 {
    display: flex;
    padding: 10px;
}
.dmk {
    display: flex;
    justify-content: space-between;
    margin-left: 250px;
    margin-right: 10px;
   
    margin-bottom: -52px;
}

.product-img {
    width: 350px;
    margin-left: 220px;
    margin-top: 8px;
    margin-bottom: 10px;
    
}
.tt2 {
    margin-left: 41px;
}
.tt3 {
    margin-left: 16px;
}
img{
    max-width: 100%;
}
    </style>
</head>
<body>
    <?php
    if(!isset($_SESSION)) { 
        session_start(); 
      }
    $kn=mysqli_connect("localhost","root","","thoitrang") or die("Lỗi kết nối");
    mysqli_query($kn,"set names 'utf8'");
    $sql="select * from dangnhap where  TaiKhoan= '".$_SESSION['txtTK']."'";
    $kq=mysqli_query($kn,$sql) or die ("không thể thực hiện câu lệnh");
    $product=mysqli_fetch_array($kq) ;
    ?>
    <div class="thongtin">
       
      <div class="chinhsua">
          <button><a href="changepassword.php">Đổi mật khẩu</a></button>
		   </div>
        <div>
            <label for="" class="ht">Thông tin cá nhân</label>
            <div class="product-img">
                    <img src="<?=$product['Anh']?>"/>
                </div>
            <div class="tt">
                <div class="tt1"><div><label >Họ tên :</label></div><div class="tt2"><?=$product['Hoten']?></div></div>
                <div class="tt1"><div><label >Email :</label></div><div class="tt2"><?=$product['Email']?></div></div>
                <div class="tt1"><div><label >Ngày sinh :</label></div><div class="tt3"><?=$product['NgaySinh']?></div></div>
            </div>
        </div>
        <div class="dmk">
           
     <button>  <a  href="edit_info.php" class="chinh1">Chỉnh sửa thông tin cá nhân</a></button></div>
        <div>
        </div>
        </div>
        
     
</body>
</html>