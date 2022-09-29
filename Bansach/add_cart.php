<?php
		session_start();
        // if(isset($_POST['quantity']) && isset($_SESSION['txtTK']) && isset($_GET['MaSP']))
		// if(isset($_POST['quantity']) && isset($_SESSION['txtTK']) && isset($_POST['MaSP']))
        // {
            $id = $_POST['masp'];
            $tt = 1;
			
            $sl = $_POST['quantity'];
            $tendn =$_SESSION['txtTK'];
			
            $connect=mysqli_connect("localhost","root","","thoitrang") or die("Lỗi kết nối");
            mysqli_query($connect,"set names 'utf8'");
			
            $sql="select * from sanpham where MaSP='".$id."'";
            $kq=mysqli_query($connect,$sql) or die ("không thể thực hiện câu lệnh 1");
            $product=mysqli_fetch_assoc($kq) ;
			
            $sql1="select count(*) as dem from ctgh where TaiKhoan= '".$tendn."' and MaSP = '".$id."'";
            $kq1=mysqli_query($connect,$sql1) or die ("không thể thực hiện câu lệnh 2");
            $row=mysqli_fetch_array($kq1);
            
            if($row['dem'] <= 0)
            {
                $sql="INSERT INTO ctgh(TaiKhoan, MaHD, SoLuong, MaSP, Trangthai) VALUES ('".$tendn."','0','".$sl."','".$id."','".$tt."')";
                $kq=mysqli_query($connect,$sql) or die ("không thể thực hiện câu lệnh 3");
				
				// Xử lý thêm vào giở hàng thì trừ đi số lượng hiện tại còn lại trong hệ thống
				
                header('location:cart.php');
				// echo "Thành công";
            }
            else
            {
				$sql2="select * from ctgh where TaiKhoan= '".$tendn."' and MaSP = '".$id."'";
				$kq2=mysqli_query($connect,$sql2) or die ("không thể thực hiện câu lệnh 2");
				$row2=mysqli_fetch_array($kq2);
			
                $slmoi=$row2['SoLuong']+$sl;
                
                $sql= "UPDATE ctgh SET SoLuong='".$slmoi."' WHERE TaiKhoan= '".$tendn."' and MaSP = '".$id."'";
                $kq=mysqli_query($connect,$sql) or die ("không thể thực hiện câu lệnh 4");
				
				// Xử lý thêm vào giở hàng thì trừ đi số lượng hiện tại còn lại trong hệ thống-
				
                header('location:cart.php');
				//echo "Thành công";
            }

        // }
        ?>