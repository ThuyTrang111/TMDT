<html>
<script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <head>
   
<style>
    body{
    font-family: arial;
    padding: 0;
    margin: 0;
    font-size: 14px;
}
h1{
    text-align: center;
}
.main-content {
    width: 900px;
    margin-left: 350px;
    margin-top: 150px;
}
.main-content h1 {
    margin: 0;
    text-align: center;
    background: #21244d;
    color:#b8e7ea;
    font-size: 18px;
    line-height: 40px;
    border-radius: 10px 10px 0 0;
}
.content-box{
    border: 1px solid #21244d;
    padding: 20px;
}

.info-form input {
    margin-bottom: 10px;
    line-height: 32px;
    border-radius: 3px;
	border: 1px solid #21244d;
	width:500px ;
    height: 25px
}
.info-form input[type=file] {
border: none;
width: 500px;
height: 40px;
}
.info-form img{
    width: 100px;
    padding: 5px;
    height: 80px;
}
.box-content{
    margin: 0 auto;
    width: 800px;
    border: 1px solid #21244d;
    text-align: center;
    padding: 20px;
}


</style>
    </head>
    <body>
        <?php
        
          session_start(); 
          
       if(!empty($_SESSION['txtTK'])){
        ?>
    <div class="main-content">
        <h1>Chỉnh sửa thông tin </h1>
        <div class="content-box">
            <?php
            $kn=mysqli_connect("localhost","root","","ThoiTrang") or die("Lỗi kết nối");
            mysqli_query($kn,"set names 'utf8'");
            $kq=mysqli_query($kn,"select * from dangnhap where  TaiKhoan= '".$_SESSION['txtTK']."'") or die ("Không thể thực hiện câu lệnh 1");
            $product=mysqli_fetch_assoc($kq);
            if (isset($_POST['submit']))
            {
                $name=$_POST['name'];
                    $email=$_POST['email'];
                    $dc= $_POST['diachi'];
                    $sdt=$_POST['sdt'];
                    $ngaysinh=$_POST['date'] ;
                    $tenfile=$_FILES['image']['name'];
                    $thumuc="image"."/".$tenfile;

                    $sql="update dangnhap set Hoten ='".$name."', Email ='".$email."', SDT ='".$sdt."',Diachi ='".$dc."',Anh ='".$thumuc."',NgaySinh ='".$ngaysinh."' where TaiKhoan ='".$_SESSION['txtTK']."'";
                    $kq2=mysqli_query($kn,$sql) or  die("không thực hiện được câu lệnh");
                    move_uploaded_file($_FILES['image']['tmp_name'],$thumuc);
                    $tb="";
                    if($kq2)
                    {
                        ?>
                        <div class="box-content">
                            <h2><?php $tb="Sửa thông tin thành công"; echo $tb?></h2>
                            <a href="index.php">Quay lại trang chủ</a>
                        </div>
                        
                        <?php }
                    
                    else {
                        ?>
                            <div class="box-content">
                                <h2><?php $tb="Sửa thông tin không thành công" ; echo $tb?></h2>
                                <a class="fa fa-home" href="trangchu.php">Quay lại trang chủ</a>
                            </div>
                        <?php }
            }
            if (empty($tb))
            {
                ?>
                <div class="info-form">
                <table align="center">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" name="form" enctype="multipart/form-data">   
                    
                    <tr><td><div class="clear-both"></div></td></tr>
                    <tr>
                        <td><label>Họ và tên: </label></td>
                        <td><input type="text" name="name" value="<?=$product['Hoten']?>"/></td>
                        
                    </tr>
                    
                    <tr>
                        <td><label>Email: </label></td>
                        <td><input type="text" name="email" value="<?=$product['Email']?>" /></td>
                        
                    </tr>
                    <tr>
                        <td><label>Số điện thoại: </label></td>
                        <td><input type="text" name="sdt" value="<?=$product['SDT']?>" /></td>
                        
                    </tr>
                    <tr>
                        <td><label>Địa chỉ: </label></td>
                        <td><input type="text" name="diachi" value="<?=$product['Diachi']?>" /></td>
                        
                    </tr>
                   <tr>
                        <td><label>Ngày sinh: </label></td>
                        <td><input type="text" name="date" value="<?=$product['NgaySinh']?>" /></td>
                        
                    <tr>
                    <tr>
                        <td><label>Ảnh đại diện: </label></td>
                        <td>
                            <img src="<?=$product['Anh']?>" />
                            <input type="file" name="image" />
                        </td>
                        
                    </tr>
                    
                        
                    </tr>
                    <div class="back">
                    <tr><td></td><td colspan="2" align="left"><input type="submit" name="submit" value="Thay đổi"></td></tr> 
                    <tr><td><?echo $tb?></td></tr>
                    <tr><td colspan="2" align="left"><a class="fas fa-reply-all" href='infor.php'>Quay lại</a><br/></td></tr>
                    </div>
                </form>
                    </table>
                    </div>
                <div class="clear-both"></div>
                
                 
            
    <?php
            }
        }
        else
       {
            header('Location: login.php');
        }
        ?>
       </div>
                   
                   </div>
    </body>
</html>