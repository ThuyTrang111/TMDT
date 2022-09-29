<html>
    <head>
        <style>
            .user-logout{
                margin: 0 auto;
                width: 800px;
               
                text-align: center;
                padding: 20px; 
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        unset($_SESSION['txtTK']);
        ?>
        <div class="user-logout">
            <h1>Đăng xuất thành công</h1>
            <button><strong><a href="login.php">Đăng nhập lại</a></strong></button>
        </div>
    </body>
</html>