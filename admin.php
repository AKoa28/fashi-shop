<?php
session_start();
ob_start();
    if(!isset($_SESSION["dangnhap"])){
        echo "<script>alert('Chưa Đăng Nhập Mà Đòi Vô');</script>";
        header("refresh:0; url='./index.php'");
    }elseif(isset($_SESSION["dangnhap"]) && $_SESSION["dangnhap"]==2){
        echo "<script>alert('Bạn không phải Là Quản Trị Viên vui lòng không đột nhập')</script>";
        header("refresh:0; url='index.php'");
    }

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang Quản Trị</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

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
        if(isset($_REQUEST["type"]) && $_REQUEST["type"] == "quanlythuonghieu"){
            include_once("view/athuonghieu.php");
        }elseif(isset($_REQUEST["type"]) && $_REQUEST["type"] == "quanlysanpham"){
            include_once("view/asanpham.php");
        }elseif(isset($_REQUEST["type"]) && $_REQUEST["type"] == "quanlynguoidung"){
            include_once("view/anguoidung.php");
        }elseif(isset($_REQUEST["type"]) && $_REQUEST["type"] == "quanlyhoadon"){
            include_once("view/ahoadon.php");
        }elseif(isset($_REQUEST["type"]) && $_REQUEST["type"] == "quanlyvaitro"){
            include_once("view/arole.php");
        }elseif(isset($_REQUEST["admin"] ) && $_REQUEST["admin"] == "updatesp"){
            include_once("view/editsanpham.php");
        }elseif(isset($_REQUEST["admin"]) && $_REQUEST["admin"] == "deletesp"){
            include_once("view/deletesanpham.php");
        }elseif(isset($_REQUEST["admin"]) && $_REQUEST["admin"] == "insertsp"){
            include_once("view/insertsanpham.php");
        }elseif(isset($_REQUEST["admin"] ) && $_REQUEST["admin"] == "updateth"){
            include_once("view/editthuonghieu.php");
        }elseif(isset($_REQUEST["admin"]) && $_REQUEST["admin"] == "deleteth"){
            include_once("view/deletethuonghieu.php");
        }elseif(isset($_REQUEST["admin"]) && $_REQUEST["admin"] == "insertth"){
            include_once("view/insertthuonghieu.php");
        }elseif(isset($_REQUEST["admin"] ) && $_REQUEST["admin"] == "updatend"){
            include_once("view/editnguoidung.php");
        }elseif(isset($_REQUEST["admin"]) && $_REQUEST["admin"] == "deletend"){
            include_once("view/deletenguoidung.php");
        }elseif(isset($_REQUEST["admin"]) && $_REQUEST["admin"] == "insertnd"){
            include_once("view/insertnguoidung.php");
        }elseif(isset($_REQUEST["admin"]) && $_REQUEST["admin"] == "chitiethoadon"){
            include_once("view/chitiethoadon.php");
        }elseif(isset($_REQUEST["admin"]) && $_REQUEST["admin"] == "updatetthd"){
            include_once("view/edittrangthai.php");
        }elseif(isset($_REQUEST["admin"]) && $_REQUEST["admin"] == "deletehd"){
            include_once("view/deletehoadon.php");
        }elseif(isset($_REQUEST["th"])){
            include_once("view/sanpham.php");
        }else{
            echo "<img src='https://r4.wallpaperflare.com/wallpaper/817/87/825/programmer-coder-admin-administrator-wallpaper-d900d8fd219a9d9b3617386fb0c176bd.jpg' width='100%'>";
        }
        include_once("view/giaodien/footer.php");
    ?>                      
    

    
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></>
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