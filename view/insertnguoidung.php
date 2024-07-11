<?php
    if(isset($_SESSION["dangnhap"]) && $_SESSION["dangnhap"] =='3'){
        echo "<script> alert('Bạn chỉ là nhân viên không đủ quyền truy cập vào đây'); </script>";
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
    <table width="100%" align="center" style="background-image: url('img/lv5.png'); margin-bottom: -70px;">
        <tr>
            <td>
                <div class="container-form" align="center">
                    <form class="form-form" method="post" enctype="multipart/form-data">
                        <p class="title-form">Thêm Tài Khoản</p>
                        <input placeholder="Tên Tài Khoản" class="text-form input-form" type="text" name="txtten" required>
                        <input placeholder="Họ và Tên" class="text-form input-form" type="text" name="txthovaten" required>
                        <input placeholder="Mật Khẩu" class="text-form input-form" type="password" name="txtpass" required>
                        <?php
                            include_once("controller/cRole.php");
                            $p = new clscrole();
                            $con = $p -> getallrole();
                            if(!$con){
                                echo "error";
                            }else{
                                echo '<select class="text-form input-form" name="cborole">';
                                while($ro = mysqli_fetch_assoc($con)){
                                    if($ro["idrole"]==1){
                                        echo "";
                                    }else{
                                        echo '<option value="'.$ro["idrole"].'">'.$ro["phanquyen"].'</option>';
                                    }
                                    
                                }
                                echo"</select>";
                            }
                        ?>
                        <!-- <input placeholder="Số điện thoại" class="text-form input-form" type="number" name="txtsdt" required> -->
                        <button class="btn-form" type="submit" name="subinsert">Thêm tài khoản</button>
                    </form>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>

<?php
    include_once("controller/cNguoiDung.php");
    if(isset($_REQUEST["subinsert"])){
        $pu = new cNguoiDung();
        $conn = $pu->getallnguoidung();
        $name = $_POST["txtten"];
        if($con){
            while($r = mysqli_fetch_assoc($conn)){
                if($r["tennguoidung"]==$name){
                    $xacnhan = $r["tennguoidung"];
                    break;
                }
            }
        }else{
            echo "error1";
        }
        if($xacnhan){
            echo "<script>alert('Tên tài khoản đã được sử dụng')</script>";
        }else{
            $kq = $pu->insertnd($_REQUEST["txtten"], $_REQUEST["txtpass"], $_REQUEST["cborole"], $_REQUEST["txthovaten"]);
            if($kq){
                echo "<script>alert('Thêm tài khoản thành công');</script>";
            }else{
                echo "<script>alert('Thêm tài khoản thất bại');</script>";
            }
        }
        
        
    }

?>