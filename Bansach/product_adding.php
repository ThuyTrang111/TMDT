<html>
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
.main-content{
    float: left;
    width: 900px;
    margin-left: 20px;
}
.main-content h1{
    margin: 0;
    text-align: left;
    background: #21244d
    color: #b8e7ea;
    font-size: 18px;
    font-weight: normal;
    line-height: 40px;
    border-radius: 10px 10px 0 0;
    padding: 0 10px;
}
.content-box{
    border: 3px solid #21244d;
    padding: 20px;
}

.product-form input {
    margin-bottom: 10px;
    line-height: 32px;
    border-radius: 5px;
	border: 1px solid #21244d;
	width:500px ;
    height: 25px
}
.product-form select{
    margin-bottom: 10px;
    line-height: 32px;
    border-radius: 5px;
	border: 1px solid #21244d;
	width:500px ;
    height: 25px
} 

.product-form textarea {
    width: 500px;
    border: 1px solid #21244d;
    height: 200px;
}
.product-form input[type=file] {
border: none;
width: 500px;
height: 40px;
}
.product-form input[type=submit] {
    float: right;
   
    background-size: 40px 40px;
    height: 40px;
    width: 200px;
        border: 3px solid #21244d;
    cursor: pointer;
	color: #21244d;
	background-color:#b8e7ea;
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
        include 'header-admin.php'; 
        ?>
        <div class="main-content">
            <h1>Thêm sản phẩm</h1>
            <div class="content-box">
                <?php
                    if (isset($_POST['name'])&&isset($_POST['type'])&&isset($_POST['price'])&&isset($_POST['number'])&&isset($_POST['content'])) {
                        //$id=$_POST['id'];
                        $name=$_POST['name'];
                        $type=$_POST['type'];
                        $price= $_POST['price'];
                        $number=$_POST['number'];
                        $content=$_POST['content'] ;
                        $tenfile=$_FILES['image']['name'];
                        $thumuc="image"."/".$tenfile;
                        
                        $kn=mysqli_connect("localhost","root","","thoitrang") or die("Lỗi kết nối");
                        mysqli_query($kn,"set names 'utf8'");
                        //$lenhkt="select * from sanpham where MaSP='".$id."'";
                        //$kqkt=mysqli_query($kn,$lenhkt) or die ("Không thực hiện được câu lệnh");
                        //if($dong=mysqli_fetch_array($kqkt))
                        //{
                           // echo "Mã sản phẩm đã có. vui lòng nhập lại";
                        //}
                        //else{
                            $sql="insert into sanpham (TenSP,MaHang,DonGia,SoLuong,Anh,ThongTin) values ('".$name."','".$type."','".$price."','".$number."','".$thumuc."','".$content."')";
                            $result = mysqli_query($kn, $sql) or die ("không được để trống");
                            
                            move_uploaded_file($_FILES['image']['tmp_name'],$thumuc);
                            $tb="";
                            if($result){
                                ?>
                                <div class="box-content">
                                    <h2> <?php $tb="Thêm sản phẩm thành công"; echo $tb; ?></h2>
                                    <a href="product_listing.php">Danh sách sản phẩm</a>
                                </div>
                            <?php }
                            else{
                                ?>
                                <div class="box-content">
                                    <h2><?php $tb="Thêm sản phẩm không thành công"; echo $tb; ?></h2>
                                    <a href="product_listing.php">Danh sách sản phẩm</a>
                                </div>
                            <?php } ?>
                        <?php    } 
                        if(empty($tb)){
                        ?>               
                
                <div class="product-form">
                <table align="center">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" name="form" enctype="multipart/form-data">
                    <tr><td colspan="2" align="right"><input type="submit" title="Lưu sản phẩm" value="Thêm sản phẩm" name="btnADD" /></td></tr>
                    <tr><td><div class="clear-both"></div></td></tr>
                    
                    <tr>
                        <td><label>Tên sản phẩm: </label></td>
                        <td><input type="text" name="name" value="" /></td>
                        
                    </tr>
                    <tr>
                        <td><label>Tác giả:</label></td>
                        <td><select name="type">
                                <option value="1">Vụ Trọng Phụng</option>
                                <option value="2">Hồ Chí Minh</option>
                                <option value="3">Nguyễn Tuân</option>
                                <option value="4">Xuân Diệu</option>
                                <option value="5">Arthur Conan Doyle</option>
                                <option value="6">Nguyễn Nhật Ánh</option>
                        </select></td>
                        
                    </tr>
                    <tr>
                        <td><label>Giá: </label></td>
                        <td><input type="text" name="price" value="" /></td>
                        
                    </tr>
                   <tr>
                        <td><label>Số lượng: </label></td>
                        <td><input type="text" name="number" value="" /></td>
                        
                    <tr>
                    <tr>
                        <td><label>Ảnh: </label></td>
                        <td>
                            <input type="file" name="image" />
                        </td>
                        
                    </tr>

                    
                    <tr>
                        <td><label>Nội dung: </label></td>
                        <td><textarea name="content" id="product-content"></textarea></td>
                        
                    </tr>
                    
                </form>
                    </table>
                    </div>
                <div class="clear-both"></div>
                
                <?php } ?>
            </div>
        </div>
    </body>
</html>