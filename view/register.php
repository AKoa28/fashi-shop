<?php
    if(isset($_SESSION["dangnhap"])){
        echo "<script>alert('Bạn cần Đăng Xuất để có thể Đăng Ký')</script>";
        header("refresh:0; url='index.php'");
    }
?>
<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Đăng Ký</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Đăng Ký</h2>
                        <form action="#" method="post">
                            <div class="group-input">
                                <label for="username">Tên đăng nhập *</label>
                                <input type="text" id="username" name="txtname" required>
                            </div>
                            <div class="group-input">
                                <label for="pass">Họ và tên *</label>
                                <input type="text" id="pass"  name="txthovaten" required>
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật khẩu *</label>
                                <input type="password" id="pass"  name="txtpass" required>
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Nhập lại mật khẩu *</label>
                                <input type="password" id="con-pass" name="txtconfirmpass" required>
                            </div>
                            <!-- <div class="group-input">
                                <label for="con-pass">Số điện thoại *</label>
                                <input type="number" id="con-pass" name="txtphone" required>
                            </div> -->
                            <button type="submit" class="site-btn register-btn" name="subregister" >REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="?login" class="or-login">Đăng nhập</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once("controller/cNguoiDung.php");
    if(isset($_POST['subregister'])){
        $pu = new cNguoiDung();
        $conn = $pu->getallnguoidung();
        $name = $_POST["txtname"];
        $pass = $_POST["txtpass"];
        $hovaten = $_POST["txthovaten"];
        $confirmpass = $_POST["txtconfirmpass"];
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

        if($pass == $confirmpass){
            if($xacnhan){
                echo "<script>alert('Tên đăng nhập đã được sử dụng')</script>";
            }else{
                $con  = $pu -> getregisternguoidung($name,$pass,$hovaten);
            }
        }else{
            echo "<script> alert('Xác nhận mật khẩu không đúng'); </script> ";
            // header("Location: ");
        }
        
     
    }
?>