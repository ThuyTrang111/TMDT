<?php
if(isset($_GET['id']))
{
    $ma=$_GET['id'];
    session_start();
    $tendn=$_SESSION['txtTK'];
    $sql="Delete from ctgh where TaiKhoan='".$tendn."' and MaSP='".$ma."'";
    $connect=mysqli_connect("localhost","root","","thoitrang") or die("Lỗi kết nối");
    mysqli_query($connect,"set names 'utf8'");
    $result = mysqli_query($connect, $sql) or die ("không thực hiện được câu lệnh 2");
    header('location:cart.php');
}
?>