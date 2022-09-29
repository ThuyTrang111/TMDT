<!DOCTYPE html>

<html>
    <head>
	
        <title>SACH</title>
        <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
        <meta charset="utf-8" />
        
    </head>
    
  <body >
  <?php
        if(!isset($_SESSION)) { 
            session_start(); 
          }
        $kn=mysqli_connect("localhost","root","","thoitrang") or die("Lỗi kết nối");
        mysqli_query($kn,"set names 'utf8'");
        if(!empty($_SESSION['txtTK']) &&  $_SESSION['txtTK']=="admin"){
			
		header('location:product_listing.php');
        ?>
    <div class="trang">
        <a href="header-admin.php"></a>
        
    </div>
    <?php }
    else if (!empty($_SESSION['txtTK']) &&  $_SESSION['txtTK']!="admin")
    {
		require 'site.php';
        
		load_menu();
		load_header();
       
        
		
        load_product();
        load_footer();
	
        ?>
		<?php }?>

       

    </body>
</html>