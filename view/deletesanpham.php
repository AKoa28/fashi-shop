<?php
    include_once("controller/cSanPham.php");
    $p = new clscsanpham();
    if(isset($_SESSION["dangnhap"]) && isset($_REQUEST["id"]) && !$_REQUEST["id"]==""){
        if(isset($_REQUEST["admin"]) && $_REQUEST["admin"] == "deletesp")
        {
            $idsp = $_REQUEST["id"];
                if($p->xoasanpham($idsp)){
                    echo "<script> alert('Xoá Thành Công') </script>";
                    header("refresh: 0; url='admin.php?admin&type=quanlysanpham'");
                }
                    
                else{
                    echo "<script> alert('Xoá Không thành công') </script>";
                    header("refresh: 0; url='admin.php?admin&type=quanlysanpham'");
                }
                    
        }
    }else{
        header("refresh:0; url='index.php'");
    }
   

            
?>