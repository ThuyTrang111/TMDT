<html>

<head>
    <style>
        body {
            width: 100%;
            height: auto;
			background: url(image/123.jpg)top right no-repeat;
			background-size: 250px 250px;
        }

        

        

        .header>div {
            list-style: none;
            margin-bottom: auto;
            margin-left: 70px;
            list-style: none;
            display: inline-block;
            margin-right: 170px;
            vertical-align: middle;

        }

        .hinhne {
			display:inline-block ;
            width: 1000px;
			height: 500px;
            margin: 0 auto;
            background-color: #f0f8ff;
			
			
    margin-left: 400px;
	
}

.hello {
           
            width: 1450px;
            margin: 0 auto;
           margin-top: 10px;


        }
        .hello >.search {
            height: 42px;
            width: 260px;
            
            border: 3px solid #9543a7;
            margin-left: 580px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .hello >.search input[type=text] {
            margin-left: 7px;
            border: none;
            outline: none;
        }

        .hello >.search input[type=submit] {

            background: url(image/22.png) center center no-repeat;
            background-size: 24px 24px;
            height: 24px;
            width: 24px;
            border: none;
            cursor: pointer;
            margin-left: 40px;
            margin-top: 5px;
        }
body {
  font-family: sans-serif;
  font-size: 15px;
  text-align: left;
  
}
#menu ul {
  background: #21244d;
  width: 250px;
  padding: 0;
  list-style-type: none;
  text-align: left;
  margin-left: 80px;
  margin-top: 60px;
}
#menu li {
  width: auto;
  height: 40px;
  line-height: 40px;
  border-bottom: 1px solid #e8e8e8;
  padding: 0 1em;
}
#menu li a {
  text-decoration: none;
  color: #b8e7ea;
  font-weight: bold;
  display: block;
}
#menu li:hover {
  background: #cde2cd;
}
body {
  font-family: sans-serif;
  font-size: 15px;
  text-align: left;
  
}
#menu ul {
  background: #21244d;
  width: 250px;
  padding: 0;
  list-style-type: none;
  text-align: left;
  margin-left: 80px;
  margin-top: 60px;
}
#menu li {
  width: auto;
  height: 40px;
  line-height: 40px;
  border-bottom: 1px solid #e8e8e8;
  padding: 0 1em;
}
#menu li a {
  text-decoration: none;
  color: #b8e7ea;
  font-weight: bold;
  display: block;
}
#menu li:hover {
  background: #cde2cd;
}

    </style>
</head>

<body>

<div id="menu">
  <ul>
    
    <li><a href="infor.php">Thông tin cá nhân</a></li>  
    <li><a href="logout.php">Đăng xuất</a></li>
    
  </ul>
</div>
    
        <div class="logo">
            <a href="index.php">
                <img class="hinhne" src="image/6.jpg">
            </a>
        </div>
		
    
<div class="hello">
    <div class="search">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="form" enctype="multipart/form-data">
            <input type="text" placeholder="Tìm kiếm..." name="search">
            <input type="submit" name="submit" value="" title="Tìm"></a>
        </form>
    </div>
    </div>


</body>

</html>