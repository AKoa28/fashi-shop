<?php
    include_once("controller/cNguoiDung.php");
    $p = new cNguoiDung();
    if(isset($_SESSION["dangnhap"]) && isset($_REQUEST["id"]) && !$_REQUEST["id"]==""){
        if(isset($_REQUEST["admin"]) && $_REQUEST["admin"] == "deletend")
        {
            $idth = $_REQUEST["id"];
                if($p->xoanguoidung($idth)){
                    echo "<script> alert('Xoá Thành Công') </script>";
                    header("refresh: 0; url='admin.php?admin&type=quanlynguoidung'");
                }
                    
                else{
                    echo "<script> alert('Xoá Không thành công') </script>";
                    header("refresh: 0; url='admin.php?admin&type=quanlynguoidung'");
                }
                    
        }
        
    }else{
        header("refresh:0; url='index.php'");
    }

            
?>