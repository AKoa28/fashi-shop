<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table width="100%" align="center" style="background-image: url('img/lv2.png'); margin-bottom: -70px;">
        <tr>
            <td>
                <div class="container-form" align="center">
                    <form class="form-form" method="post" enctype="multipart/form-data">
                        <p class="title-form">Thêm Sản Phẩm</p>
                        <input placeholder="Tên Sản phẩm" class="text-form input-form" type="text" name="txttensp" placeholder="Tên sản phẩm" required>
                        <input placeholder="Giá Gốc" class="text-form input-form" type="number" name="txtgiagoc" placeholder="Giá gốc" required>
                        <input placeholder="Giá bán" class="text-form input-form" type="number" name="txtgiaban" placeholder="Giá bán" >
                        <input placeholder="Hình Ảnh" class="text-form input-form" type="file" name="txthinhanh" required>
                        <?php
                                include_once("controller/cThuongHieu.php");
                                $p = new clscthuonghieu();
                                $con = $p -> getallthuonghieu();
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
                            ?>
                        <div class="checkb" >
                            <input class="item" type="checkbox" name="size[]" id="size"  value="S"><p class="p-formcheckbox">size S</p></input>
                            <input class="item" type="checkbox" name="size[]" id="size"  value="M"><p class="p-formcheckbox">size M</p></input>
                            <input class="item" type="checkbox" name="size[]" id="size"  value="L"><p class="p-formcheckbox">size L</p></input>
                        </div>
                        
                        <button class="btn-form" type="submit" name="subinsert">Thêm sản phẩm</button>
                    </form>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>

<?php
    include_once("controller/cSanPham.php");
    if(isset($_REQUEST["subinsert"])){
        
        if (!empty($_POST['size'])) {
            // Chuyển đổi mảng thành chuỗi
            $sizes = implode(",", $_REQUEST['size']);
        }
        
        $pu = new clscsanpham();
        $kq = $pu->insertsp($_REQUEST["txttensp"], $_REQUEST["txtgiagoc"], $_REQUEST["txtgiaban"], $_FILES["txthinhanh"], $_REQUEST["cboThuongHieu"], $sizes);
        if($kq){
            echo "<script>alert('Thêm sản phẩm thành công');</script>";
        }else{
            echo "<script>alert('Thêm sản phẩm thất bại');</script>";
        }
    }

?>