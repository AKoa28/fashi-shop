<?php
    $masp = $_REQUEST["id"];
    include_once("controller/cSanPham.php");
    $p = new clscsanpham();
    $sp = $p->get1sanpham($masp);
    if($sp){
        while($r=mysqli_fetch_assoc($sp)){
            $tensp = $r["tensp"];
            $giagoc = $r["giagoc"];
            $giaban = $r["giaban"];
            $hinhanh = $r["hinhanh"];
            $thuonghieu = $r["tenth"];
            $kichthuoc = $r["kichthuoc"];
        }
        
        $arraykt = explode(",", $kichthuoc);
    }else{
        echo "<script> alert('Ma san pham khong hop le'); </script>";
        header("refresh:0; url='admin.php?admin'");
    
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
                        <p class="title-form">Sửa Sản Phẩm</p>
                        <input placeholder="Tên Sản Phẩm" class="text-form input-form" type="text" value="<?php if(isset($tensp)) echo $tensp ?>" name="txttensp" requied>
                        <input placeholder="Giá Gốc" class="text-form input-form" type="text" value="<?php if(isset($giagoc)) echo $giagoc ?>" name="txtgiagoc" requied>
                        <input placeholder="Giá Bán" class="text-form input-form" type="text" value="<?php if(isset($giaban)) echo $giaban ?>" name="txtgiaban" requied>
                        <input placeholder="Hình Ảnh" class="text-form input-form" type="file" name="txthinhanh">
                        <?php
                                include_once("controller/cThuongHieu.php");
                                $p = new clscthuonghieu();
                                $con = $p -> getallthuonghieu();
                                $arrkt = array("S","M","L");
                                
                                if(!$con){
                                    echo "error";
                                }else{
                                    echo '<select class="text-form input-form" name="cboThuongHieu">';
                                    while($ro = mysqli_fetch_assoc($con)){
                                        if($ro["tenth"]==$thuonghieu){
                                            echo "<option value='".$ro["idth"]."' selected>".$ro["tenth"]."</option>";
                                        }else{
                                            echo '<option value="'.$ro["idth"].'">'.$ro["tenth"].'</option>';
                                        }
                                        
                                    }
                                    echo"</select>";
                                }
                                echo '<div class="checkb" >';
                        
                                foreach ($arrkt as $value) {
                                    if (in_array($value, $arraykt)) {
                                        echo '<input class="item" type="checkbox" name="size[]" id="size" value="'.$value[0].'" checked><p class="p-formcheckbox">size '.$value[0].'</p>';
                                    } else {
                                        echo '<input class="item" type="checkbox" name="size[]" id="size" value="'.$value[0].'" ><p class="p-formcheckbox">size '.$value[0].'</p>';
                                    }
                                }

                                echo '</div>';
                        ?>  
                        <button class="btn-form" type="submit" name="subcapnhat">Cập nhật</button>
                    </form>
                </div>
            </td>
            <td>
                <div class="imgsp">
                    <img src="img/products/<?php echo $hinhanh ?>" width="100%" >
                </div>
            </td>
        </tr>
    </table>

    
</body>
</html>
<?php
    if(isset($_REQUEST["subcapnhat"])){
        $pu = new clscsanpham();
        if (!empty($_POST['size'])) {
            // Chuyển đổi mảng thành chuỗi
            $sizes = implode(",", $_REQUEST['size']);
        }
        $kq = $pu->updatesp($masp, $_REQUEST["txttensp"], $_REQUEST["txtgiagoc"], $_REQUEST["txtgiaban"], $_FILES["txthinhanh"], $hinhanh, $_REQUEST["cboThuongHieu"],$sizes);
        if($kq){
            echo "<script>alert('Cập nhật thành công');</script>";
            header("refresh: 0;");
        }else{
            echo "<script>alert('Cập nhật thất bại');</script>";
        }
        
    }

?>