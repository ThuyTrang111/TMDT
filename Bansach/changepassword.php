<html>
    <head>
    <meta charset="utf8">
	<title>Đổi mật khẩu</title>
	<script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
	<style>
			body{
				font-family: arial;
			}
			
			.container{
			width: 900px;
            margin: 0 auto;
            border: 5px solid #21244d;
			vertical-align: middle;
			padding-top: 80px;
			padding-bottom: 80px;
			}
			.h1{
			text-align: center;
			}
			.container input{
				border-radius: 5px;
				border: 1px solid #21244d;
				width:210px ;
    			height: 25px
			}

			
		</style>
    </head>
    <body>
        <?php
        session_start();
        ?>
        <div class="container">
            <table align="center">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <tr>
                <tr><td colspan="2" align="center"><h1>Đổi mật khẩu</h1></td></tr>
                </tr>
                <tr>
                <td><label>Username: </label></td><td><input type="text" value="<?=$_SESSION['txtTK']?>" readonly="true"/></td>
                </tr>
                <tr>
                <td><label>Password: </label></td><td><input type="password" name="pass" placeholder="Nhập mật khẩu cũ"/></td>
                </tr>
                <tr>
                <td><label>New Password: </label></td><td><input type="password" name="newpass" placeholder="Nhập mật khẩu mới"/></td>
                </tr>
                <tr>
                <td><label>New Password again: </label></td><td><input type="password" name="renewpass" placeholder="Nhập lại mật khẩu mới"/></td>
                </tr>
                <tr><td></td><td><input type="submit" value="Thay đổi"></td</tr>
                <tr><td colspan="2" align="right"><a href='index.php'>Quay lại trang chủ</a><br/></td></tr>
                </form>
            </table>
            <?php
                
                if(!empty($_SESSION['txtTK'])){
                    if(isset($_POST['pass'])&&isset($_POST['newpass'])&&isset($_POST['renewpass'])){
                        $kn=$kn=mysqli_connect("localhost","root","","ThoiTrang") or die("Lỗi kết nối");
		mysqli_query($kn,"set names 'utf8'");
        $sql1="select *  from dangnhap where TaiKhoan='".$_SESSION['txtTK']."'";
        $kq=mysqli_query($kn,$sql1);
        $dong= mysqli_fetch_array($kq);
        if($dong['Matkhau']==$_POST['pass']){
            if($_POST['newpass']==$_POST['renewpass'])
            {
                $sql2="update dangnhap set MatKhau='".$_POST['newpass']."' where TaiKhoan='".$_SESSION['txtTK']."'";
                $kq2=mysqli_query($kn,$sql2);
               
                    header('Location: index.php');
                
            }
            else{
                echo "Mật khẩu không trùng nhau";
            }
        }
        else{
            echo "Mật khẩu cũ không đúng";
        }
                    }
                }
                else{
                    header('Location: login.php');
                }
            ?>
        </div>
    </body>
</html>