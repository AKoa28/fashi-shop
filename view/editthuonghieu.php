<?php
    $math = $_REQUEST["id"];
    include_once("controller/cThuongHieu.php");
    $p = new clscthuonghieu();
    $sp = $p->get1thuonghieu($math);
    if($sp){
        while($r=mysqli_fetch_assoc($sp)){
            $tenth = $r["tenth"];
            $diachi = $r["diachi"];
        }
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
    <table width="100%" align="center" style="background-image: url('img/lv5.png');">
        <tr>
            <td>
                <div class="container-form" align="center">
                    <form class="form-form" method="post" enctype="multipart/form-data">
                        <p class="title-form">Sửa Thương Hiệu</p>
                        <p class="p-form">Tên thương hiệu</p>
                        <input placeholder="Tên thương hiệu" class="text-form input-form" type="text" value="<?php if(isset($tenth)) echo $tenth ?>" name="txttenth" requied>
                        <p class="p-form">Địa chỉ</p>
                        <input placeholder="Địa chỉ" class="text-form input-form" type="text" value="<?php if(isset($diachi)) echo $diachi ?>" name="txtdiachi" requied>
        
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
        $pu = new clscthuonghieu();
        $kq = $pu->updateth($math, $_REQUEST["txttenth"], $_REQUEST["txtdiachi"]);
        if($kq){
            echo "<script>alert('Cập nhật thành công');</script>";
            header("refresh: 0;");
        }else{
            echo "<script>alert('Cập nhật thất bại');</script>";
        }
        
    }

?>