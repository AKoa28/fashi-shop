<?php

    $idhd = $_REQUEST["id"];
    $idnd = $_REQUEST["idnd"];
    include_once("controller/cHoaDon.php");
    $p = new cHoaDon();
    $sp = $p->get1hoadon($idhd);
    if(isset($_SESSION["idnguoidung"]) && isset($_REQUEST["id"]) && $_SESSION["idnguoidung"] == $idnd){
        if($sp){
            while($r=mysqli_fetch_assoc($sp)){
                $trangthai = $r["trangthai"];
            }
            if($trangthai == "Chuẩn bị hàng" || $trangthai == "Huỷ đơn do hết hàng"){
                if($p->xoahoadon($idhd)){
                    
                        echo "<script> alert('Huỷ hoá đơn Thành Công') </script>";
                        header("refresh: 0; url='index.php?hoadon'");
                
                }else{
                    echo "<script> alert('Huỷ hoá đơn không thành công') </script>";
                    header("refresh: 0; url='index.php?hoadon'");
                }
            }else{
                echo "<script> alert('Sản phẩm đã được giao không thể huỷ đơn'); </script>";
                header("refresh:0; url='index.php?hoadon'");
            }
            
        }else{
            echo "<script> alert('Ma hoa don khong hop le'); </script>";
            header("refresh:0; url='index.php?hoadon'");
        
        }
    }

    if(isset($_SESSION["dangnhap"]) && $_SESSION["dangnhap"]!=2){
        if($sp){
            while($r=mysqli_fetch_assoc($sp)){
                $trangthai = $r["trangthai"];
            }
            if($trangthai == "Chuẩn bị hàng" || $trangthai == "Huỷ đơn do hết hàng"){
                if($p->xoahoadon($idhd)){
                    
                        echo "<script> alert('Huỷ hoá đơn Thành Công') </script>";
                        header("refresh: 0; url='?admin&type=quanlyhoadon'");
                    
                }else{
                    echo "<script> alert('Huỷ hoá đơn không thành công') </script>";
                    header("refresh: 0; url='index.php?hoadon'");
                }
            }else{
                echo "<script> alert('Sản phẩm đã được giao không thể huỷ đơn'); </script>";
                header("refresh:0; url='index.php?hoadon'");
            }
            
        }else{
            echo "<script> alert('Ma hoa don khong hop le'); </script>";
            header("refresh:0; url='index.php?hoadon'");
        
        }
    }
    
            
?>