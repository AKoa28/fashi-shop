<?php

    $idhd = $_REQUEST["id"];
    include_once("controller/cHoaDon.php");
    $p = new cHoaDon();
    $sp = $p->get1hoadon($idhd);
    if(isset($_SESSION["idnguoidung"]) && isset($_REQUEST["id"])){
        if($sp){
            while($r=mysqli_fetch_assoc($sp)){
                $diachi = $r["diachi"];
                $sdt = $r["sdt"];
                $ptth = $r["pttt"];
                $trangthai = $r["trangthai"];
            }
            if($trangthai != "Chuẩn bị hàng"){
                echo "<script> alert('Sản phẩm đã được giao không thể sửa thông tin'); </script>";
                header("refresh:0; url='index.php?hoadon'");
            }
        }else{
            echo "<script> alert('Ma san pham khong hop le'); </script>";
            header("refresh:0; url='index.php?hoadon'");
        
        }
    }
    
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table width="100%" align="center" style="background-image: url('img/lv4.png'); margin-bottom: -79px;">
        <tr>
            <td>
                <div class="container-form">
                    <form class="form-form" method="post" enctype="multipart/form-data">
                        <p class="title-form">Sủa Thông tin Hoá đơn</p>
                        <p class="p-form">Địa chỉ</p>
                        <input placeholder="Địa chỉ" class="text-form input-form" type="text" value="<?php if(isset($diachi)) echo $diachi ?>" name="txtdiachi" requied>
                        <p class="p-form">Số điện thoại</p>
                        <input placeholder="Số điện thoại" class="text-form input-form" type="text" value="<?php if(isset($sdt)) echo $sdt ?>" name="txtsdt" requied>
                        <select class="text-form input-form" name="cbopttt">
                            <?php
                                if($ptth=="Thanh toán khi nhận hàng"){
                                    echo "<option value='1' selected>Thanh toán khi nhận hàng</option>";
                                    echo '<option value="2" >Thanh toán chuyển khoản</option>';
                                }else{
                                    echo "<option value='1' >Thanh toán khi nhận hàng</option>";
                                    echo '<option value="2" selected>Thanh toán chuyển khoản</option>';
                                }

                            ?>
                        </select>
                        
                        
                        <button class="btn-form" type="submit" name="subcapnhat">Cập nhật</button>
                    </form>
                </div>
            </td>
        </tr>
    </table>

    
</body>
</html>
<?php
    if(isset($_REQUEST["subcapnhat"])){
        $pu = new cHoaDon();
        $kq = $pu->updatehd($idhd, $_REQUEST["txtdiachi"], $_REQUEST["txtsdt"], $_REQUEST["cbopttt"]);
        if($kq){
            echo "<script>alert('Cập nhật thành công');</script>";
            header("refresh: 0;");
        }else{
            echo "<script>alert('Cập nhật thất bại');</script>";
        }
        
    }

?>