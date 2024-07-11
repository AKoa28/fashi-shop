<?php
    $mand = $_REQUEST["id"];
    include_once("controller/cNguoiDung.php");
    if(isset($_SESSION["dangnhap"]) && $_SESSION["dangnhap"] =='3'){
        echo "<script> alert('Bạn chỉ là nhân viên không đủ quyền truy cập vào đây'); </script>";
        header("refresh:0; url='admin.php?admin'");
    }
    if($mand==1){
        echo "<script> alert('Không được xâm phạm'); </script>";
        header("refresh:0; url='admin.php?admin'");
    }
    $p = new cNguoiDung();
    $id = $p->get1nguoidung($mand);
    if($id){
        while($r=mysqli_fetch_assoc($id)){
            $ten = $r["tennguoidung"];
            $hovaten = $r["hovaten"];
            $role = $r["phanquyen"];
            $tenpq = $r["tenpq"];
        }
    }else{
        echo "<script> alert('Ma nguoi dung khong hop le'); </script>";
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
                        <p class="title-form">Sửa Thông tin Tài Khoản</p>
                        <p class="p-form">Tên tài khoản</p>
                        <input placeholder="Tên Tài Khoản" class="text-form input-form" type="text" value="<?php if(isset($ten)) echo $ten ?>" name="txtten" requied>
                        <p class="p-form">Họ và Tên</p>
                        <input placeholder="Họ và Tên" class="text-form input-form" type="text" value="<?php if(isset($hovaten)) echo $hovaten ?>" name="txthovaten" requied>
                        <p class="p-form">Vai trò</p>
                        <?php
                            include_once("controller/cRole.php");
                            $p = new clscrole();
                            $pu = new cNguoiDung();
                            $con = $p -> getallrole();
                            $con1 = $pu -> getcountallquantri();
                            if(!$con){
                                echo "error";
                            }else{
                                while($ru = mysqli_fetch_assoc($con1)){
                                    $dem = $ru["countpq"];
                                }
                                if($dem == 1 && $role == 1){
                                    echo '<select class="text-form input-form" name="cborole" onclick = "return alert('."'Chỉ còn có 1 vai trò là Quản Trị Viên nên bạn không thể đổi vai trò của tài khoản này.'".');">';
                                    echo "<option value='".$role."' selected>".$tenpq."</option>";
                                    echo"</select>";
                                }elseif($role == 1 && $_SESSION["idnguoidung"] == $mand){
                                    echo '<select class="text-form input-form" name="cborole" onclick = "return alert('."'Bạn không thể thay đổi vai trò Quản Trị Viên của chính mình.'".');">';
                                    echo "<option value='".$role."' selected>".$tenpq."</option>";
                                    echo"</select>";
                                }else{
                                    
                                    echo '<select class="text-form input-form" name="cborole">';
                                    while($ro = mysqli_fetch_assoc($con)){
                                        if($ro["idrole"]==$role){
                                            echo "<option value='".$ro["idrole"]."' selected>".$ro["phanquyen"]."</option>";
                                        }elseif($ro["idrole"]==1){
                                            echo '';
                                        }else{
                                            echo '<option value="'.$ro["idrole"].'">'.$ro["phanquyen"].'</option>';
                                        }
                                        
                                    }
                                    echo"</select>";
                                }
                                
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
            $kq = $pu->updatend($mand, $_REQUEST["txtten"],$_REQUEST["txthovaten"], $_REQUEST["cborole"]);
            if($kq){
                echo "<script>alert('Cập nhật thành công');</script>";
                header("refresh: 0;");
            }else{
                echo "<script>alert('Cập nhật thất bại');</script>";
            }
        }
        
        
    }

?>