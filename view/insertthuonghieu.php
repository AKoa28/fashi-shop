<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table width="100%" align="center" style="background-image: url('img/lv3.png'); margin-bottom: -70px;">
        <tr>
            <td>
                <div class="container-form" align="center">
                    <form class="form-form" method="post" enctype="multipart/form-data">
                        <p class="title-form">Thêm Thương Hiệu</p>
                        <input placeholder="Tên Thương Hiệu" class="text-form input-form" type="text" name="txttenth" placeholder="Tên thương hiệu" required>
                        <input placeholder="Địa Chỉ" class="text-form input-form" type="text" name="txtdiachi" placeholder="Địa chỉ" required>
                        
                        <button class="btn-form" type="submit" name="subinsert">Thêm thương hiệu</button>
                    </form>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>

<?php
    include_once("controller/cThuongHieu.php");
    if(isset($_REQUEST["subinsert"])){
        $pu = new clscthuonghieu();
        $kq = $pu->insertth($_REQUEST["txttenth"], $_REQUEST["txtdiachi"]);
        if($kq){
            echo "<script>alert('Thêm thương hiệu thành công');</script>";
        }else{
            echo "<script>alert('Thêm thương hiệu thất bại');</script>";
        }
    }

?>