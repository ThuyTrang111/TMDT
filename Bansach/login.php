<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<div class="registration-form">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="form" enctype="multipart/form-data">
        <form>
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="txtTK" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="txtMK" placeholder="Password">
            </div>
			<div class="form-group">
                <button type="submit" class="btn btn-block create-account">Đăng Nhập</button>
            </div>
			<a href="signin.php" class="txt3">
							Bạn chưa có tài khoản? Đăng ký ngay
						</a>
        </form>

					
						</form>
					
				
		<div class="clear-both"></div>
		<?php
		session_start();
		if(isset($_POST['txtTK'])&&isset($_POST['txtMK']))
		{
$tendn=$_POST['txtTK'];
$matkhaudn=$_POST['txtMK'];
$kn=mysqli_connect("localhost", "root", "", "thoitrang") or die("Lỗi kết nối");
mysqli_query($kn,"set names 'utf8'");
$caulenh="select * from dangnhap where TaiKhoan='".$tendn."'";
$ketqua=mysqli_query($kn,$caulenh) or die("Không được để trống");
$tb="";
if ($dong=mysqli_fetch_array($ketqua))//có kết quả trả về
{
	$gt=$dong['Matkhau'];
	if($gt==$matkhaudn)
	{
		//$tb="Đăng nhập thành công";
		$_SESSION['txtTK']=$tendn;
		
			 header('location:index.php') ;
		
	}
	else
		$tb="Mật khẩu không đúng!";
}
else
	$tb="Tên đăng nhập không tồn tại!";
echo "<b><i>".$tb."</i></b>";
mysqli_free_result($ketqua);
//đóng kết nối
mysqli_close($kn);
		}
?>
	</div>
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>


</body>
</html>
	