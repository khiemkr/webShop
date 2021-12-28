<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/baseweb.css">
    <link rel="stylesheet" href="./css/gridweb.css">
    <link rel="stylesheet" href="./css/mainweb.css">
    <link rel="stylesheet" href="./font/fontawesome-free-5.15.3-web/css/all.min.css">  
    <title>ShopKhiem</title>
</head>
<body>
    <div class="app">
    <?php 
        session_start();
        include("admin/config/connect.php");
        include("page/header.php");
        include("page/container.php");
        include("page/footer.php");
    ?>
    </div>
</body>
</html>