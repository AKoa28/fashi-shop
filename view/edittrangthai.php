<?php

    $idhd = $_REQUEST["id"];
    include_once("controller/cHoaDon.php");
    $p = new cHoaDon();
    $sp = $p->get1hoadon($idhd);
    if(isset($_SESSION["idnguoidung"]) && isset($_REQUEST["id"])){
        if($sp){
            while($r=mysqli_fetch_assoc($sp)){
                $trangthai = $r["trangthai"];
            }
        }else{
            echo "<script> alert('Ma hoa don khong hop le'); </script>";
            header("refresh:0; url='?admin&type=quanlyhoadon'");
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
                        <p class="title-form">Cập Nhật Trạng Thái</p>
                        
                            <?php
                                if($trangthai=="Chuẩn bị hàng"){
                                    echo"
                                            <select class='text-form input-form-select' name='cbotrangthai'>
                                                <option value='".$trangthai."' selected>".$trangthai."</option>
                                                <option value='Đang gửi hàng'>Đang gửi hàng</option>
                                                <option value='Giao hàng thành công'>Giao hàng thành công</option>
                                                <option value='Huỷ đơn do hết hàng'>Huỷ đơn do hết hàng</option>
                                            </select>
                                        ";
                                }elseif($trangthai=="Đang gửi hàng"){
                                    echo"
                                            <select class='text-form input-form-select' name='cbotrangthai'>
                                                <option value='".$trangthai."' selected>".$trangthai."</option>
                                                <option value='Chuẩn bị hàng'>Chuẩn bị hàng</option>
                                                <option value='Giao hàng thành công'>Giao hàng thành công</option>
                                                <option value='Huỷ đơn do hết hàng'>Huỷ đơn do hết hàng</option>
                                            </select>";
                                }elseif($trangthai=="Huỷ đơn do hết hàng"){
                                    echo"
                                            <select class='text-form input-form-thatbai' name='cbotrangthai'>
                                                <option value='".$trangthai."' selected>".$trangthai."</option>
                                                <option value='Chuẩn bị hàng'>Chuẩn bị hàng</option>
                                                <option value='Đang gửi hàng'>Đang gửi hàng</option>
                                                <option value='Giao hàng thành công'>Giao hàng thành công</option>
                                            </select>";
                                }else{
                                    echo "
                                            <select class='text-form input-form-thanhcong' name='cbotrangthai'>
                                                <option value='Chuẩn bị hàng'>Chuẩn bị hàng</option>
                                                <option value='Đang gửi hàng'>Đang gửi hàng</option>
                                                <option value='Giao hàng thành công' selected>Giao hàng thành công</option>
                                                <option value='Huỷ đơn do hết hàng'>Huỷ đơn do hết hàng</option>
                                            </select>";
                                }       

                            ?>
                        
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
        $kq = $pu->updatecthd($idhd,$_REQUEST["cbotrangthai"]);
        if($kq){
            echo "<script>alert('Cập nhật thành công');</script>";
            header("refresh: 0;");
        }else{
            echo "<script>alert('Cập nhật thất bại');</script>";
        }
        
    }

?>