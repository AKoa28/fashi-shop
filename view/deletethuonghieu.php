<?php
    include_once("controller/cThuongHieu.php");
    $p = new clscthuonghieu();
    if(isset($_SESSION["dangnhap"]) && isset($_REQUEST["id"]) && !$_REQUEST["id"]==""){
        if(isset($_REQUEST["admin"]) && $_REQUEST["admin"] == "deleteth")
        {
            $idth = $_REQUEST["id"];
                if($p->xoathuonghieu($idth)){
                    echo "<script> alert('Xoá Thành Công') </script>";
                    header("refresh: 0; url='admin.php?admin&type=quanlythuonghieu'");
                }
                else{
                    echo "<script> alert('Xoá Không thành công') </script>";
                    header("refresh: 0; url='admin.php?admin&type=quanlythuonghieu'");
                }
        }
    }else{
        header("refresh:0; url='index.php'");
    }
    

            
?>