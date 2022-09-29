
<html>
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
	<div class="registration-form">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="form" enctype="multipart/form-data">
        <form>
            
            <div class="form-group">
                <input type="text" class="form-control item" name="SID" placeholder="Nhập tên đăng nhập">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="pass" placeholder="Nhập mật khẩu">
            </div>
			<div class="form-group">
                <input type="password" class="form-control item" name="repass" placeholder="Nhập lại mật khẩu">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="mail" placeholder=" Nhập Email">
            </div>
            <div class="form-group">
                <input type="file" class="form-control item" name="image" >
            </div>
            
            <div class="form-group">
                <button type="submit" name="sm" class="btn btn-block create-account" >Đăng ký</button>
            </div>
			<tr>
					<td colspan="2" align="center"><a href='login.php'>Quay lại trang đăng nhập</a><br /></td>
				</tr>
        </form>

		<?php
		if (isset($_POST['SID']) && isset($_POST['pass']) && isset($_POST['repass']) && isset($_POST['mail'])) {
			//lấy dữ liệu từ form lên server
			$tendn = $_POST['SID'];
			$matkhau = $_POST['pass'];
			$rematkhau = $_POST['repass'];
			$email = $_POST['mail'];
			$tenfile=$_FILES['image']['name'];
                        $thumuc="image"."/".$tenfile;
			$kn = $kn = mysqli_connect("localhost", "root", "", "thoitrang") or die("Lỗi kết nối");
			mysqli_query($kn, "set names 'utf8'");
			$tb = "";
			
			$cl = "insert into dangnhap(TaiKhoan,Matkhau,Hoten,Email,SDT,Diachi,Anh,Ghichu) values('" . $tendn . "','" . $matkhau . "','" . null . "','" . $email . "','" . null . "','" . null . "','".$thumuc."','" . null . "')";
			if ($matkhau != $rematkhau) {
				$tb = "Nhập mật khẩu không trùng nhau";
			} else {
				//kiểm tra mã sinh viên đã có chưa
				$clkt = "select * from dangnhap where TaiKhoan='" . $tendn . "'";
				$kq = mysqli_query($kn, $clkt);
				if ($dong = mysqli_fetch_array($kq)) {
					$tb = "Trùng tên đăng nhập vui lòng chọn tên khác!.";
				} else {
					//thêm dữ liệu đăng ký vào bảng
					$ketqua = mysqli_query($kn, $cl) or die("Không được để trống");
					move_uploaded_file($_FILES['image']['tmp_name'],$thumuc);
					if ($ketqua) {
						header('location:login.php');
					} else {
						$tb = "Đăng ký không thành công";
					}
				}
			}
			echo "<b><i>" . $tb . "</i></b>";
			//mysqli_free_result($ketqua);
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