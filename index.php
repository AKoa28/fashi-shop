<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    
</head>

<body>
    <!-- Header End -->
    <?php
        include_once("view/giaodien/header.php");
        
        if(isset($_GET['login'])) {
            include_once ("view/login.php");
        }elseif (isset($_GET['register'])) {
            include_once ("view/register.php");
        }elseif(isset($_REQUEST["chitietsanpham"])){
            include_once("view/chitietsanpham.php");
        }elseif(isset($_REQUEST["shop"])){
            include_once("view/shop.php");
        }elseif(isset($_REQUEST["subsearch"])){
            include_once("view/shop.php");
        }elseif(isset($_REQUEST["th"])){
            include_once("view/shop.php");
        }elseif(isset($_REQUEST["giohang"])){
            include_once("view/giohang.php");
        }elseif(isset($_REQUEST["thutucthanhtoan"])){
            include_once("view/thutucthanhtoan.php");
        }elseif(isset($_REQUEST["thutucthanhtoann"])){
            header("refresh:0; url='?giohangg'");
        }elseif(isset($_REQUEST["giohangg"])){
            include_once("view/giohang.php");
            header("refresh:0; url='?thutucthanhtoan'");
        }elseif(isset($_REQUEST["deletegiohang"])){
            include_once("view/deletesanphamgiohang.php");
        }elseif(isset($_REQUEST["delete1sanphamgiohang"])){
            include_once("view/deletesanphamgiohang.php");
        }elseif(isset($_REQUEST["hoadon"])){
            include_once("view/hoadon.php");
        }elseif(isset($_REQUEST["chitiethoadon"])){
            include_once("view/chitiethoadon.php");
        }elseif(isset($_REQUEST["action"]) && $_REQUEST["action"] == "updatehd"){
            include_once("view/edithoadon.php");
        }elseif(isset($_REQUEST["action"]) && $_REQUEST["action"] == "deletehd"){
            include_once("view/deletehoadon.php");
        }else {
            include_once("view/sp.php");
        }
        include_once("view/giaodien/footer.php");
    ?>                      
    

    
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>