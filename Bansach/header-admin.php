<html>
    <head>
        <style>
            body{
    font-family: arial;
    
    padding: 0;
    margin: 0 auto;
    font-size: 14px;
    width: 1450px;
}
.container{
    width: 1200px;
    margin: 0 auto;
    border: 3px ;
}
h1{
    text-align: center;
}


.clear-both{
    clear: both;
}

a{
    text-decoration: none;
}
.admin-heading-panel{
    margin: 0px auto;
    width: 1460px;
    background: #21244d;
    height: 50px;
    line-height: 50px;
    color: #b8e7ea;
    
}
.admin-heading-panel a{
    color: #b8e7ea;
}
.left-panel{
    float: left;
	color: #b8e7ea;
}
.left-panel span{
    color: white;
    font-weight: bold;
}
.right-panel{
	margin-top: 10px;
    float: right;
	color: #b8e7ea;
	
}
.right-panel img{
    vertical-align: middle;
}
.right-panel a{
    margin-right: 10px;
	
}
.left-menu{
	
	 background: #21244d;
  width: 250px;
  padding: 0;
  list-style-type: none;
  text-align: left;
 
  margin-top: 60px;
    float: left;
    width: 280px;
}
.content-wrapper .container .left-menu{
    border: 1px solid #b8e7ea;
}
.content-wrapper .container{
    padding: 15px 0;
    
}
.menu-heading{
	border: 3px solid #b8e7ea;
    background: #21244d;
    line-height: 20px;
    padding: 10px;
    color: #b8e7ea;
   
    font-size: 18px;
}
.menu-items ul{
    margin: 0;
    padding: 0;
}

.menu-items ul li{

    list-style: none;
    line-height: 30px;
  
    padding-left: 15px;
}
.menu-items ul li a{
    
	color: #b8e7ea;
}


        </style>
    </head>
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <body>
    <div class="admin-heading-panel">
        <?php
        session_start();
        if(!empty($_SESSION['txtTK'])&& $_SESSION['txtTK']=="admin"){
            
            
            ?>
        
                    <div class="container">
                        <div class="left-panel">
                             <span><?=$_SESSION['txtTK']?></span>
                        </div>
                       
                    </div>
    </div>
                <div class="content-wrapper">
                    <div class="container">
                        <div class="left-menu">
                            <div class="menu-heading">Menu</div>
							
                            <div class="menu-items">
                                <ul>
                                    <li><a href="product_listing.php">Sản phẩm</a></li>
                                     <li><a href="logout.php">Đăng xuất</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
				
				
                <?php 
            }
            else {
                header('location:login.php');
            }

                ?>
    </body>
</html>