<html>
    <head>
        <style>
            body{
                width: 100%;
    height: auto;
            }
            .marquee{
                width: 1460px;
                height: 30px;
                
                margin: 0px auto;
                vertical-align: middle;
                font-size: 20px;
                margin-top:5px
            }
        </style>

    </head>
    <?php
    session_start();
        if(!empty($_SESSION['txtTK'])){
            ?>
<div class="marquee">
        <marquee class="marquee">
           <b> <i>Chào mừng <?=$_SESSION['txtTK']?> đến với trang web BÁN SÁCH </i></b>
        </marquee>
</div>
<?php
}
else
{
    header('location:login.php');
}
?>
</html>