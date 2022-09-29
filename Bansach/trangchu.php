<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php
        if(!isset($_SESSION)) { 
            session_start(); 
          }
        $kn=mysqli_connect("localhost","root","","thoitrang") or die("Lỗi kết nối");
        mysqli_query($kn,"set names 'utf8'");
        if(!empty($_SESSION['txtTK']) &&  $_SESSION['txtTK']=="admin"){
        ?>
    <div class="trang">
        <a href="header-admin.php">Đến trang quản trị</a>
        <a href="changepassword.php">Đổi mật khẩu</a>
        <a href="logout.php">Đăng xuất</a>
    </div>
    <?php }
    else if (!empty($_SESSION['txtTK']) &&  $_SESSION['txtTK']!="admin")
    {
		
	
        ?>
         <div class="registration-form">
		 <form>
		 <div class="form-group">
        <a href="infor.php" class="btn btn-block create-account">Thông tin cá nhân</a>
		</div>
        <a href="index.php" class="btn btn-block create-account">Mua sắm ngay</a>
        <a href="logout.php" class="btn btn-block create-account">Đăng xuất</a>
		</form>
    </div>
    <?php }?>
</body>
</html>