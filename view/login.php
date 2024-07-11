<?php
    if(isset($_SESSION["dangnhap"])){
        echo "<script>alert('Bạn Đã Đăng Nhập Rồi')</script>";
        header("refresh:0; url='index.php'");
    }
?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Đăng Nhập</span>
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
                    <div class="login-form">
                        <h2>Đăng Nhập</h2>
                        <form action="#" method="post">
                            <div class="group-input">
                                <label for="username">Tên đăng nhập *</label>
                                <input type="text" id="username" name="name">
                            </div>
                            <div class="group-input">
                                <label for="pass">Mật khẩu *</label>
                                <input type="password" id="pass" name="pass">
                            </div>
                            <!-- <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Forget your Password</a>
                                </div>
                            </div> -->
                            <button type="submit" name="sublogin" class="site-btn login-btn">Sign In</button>
                        </form>
                        <div class="switch-login">
                            <a href="?register" class="or-login">Đăng ký</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
<?php
    if(isset($_POST['sublogin'])){
        include_once("controller/cNguoiDung.php");
        $p = new cNguoiDung();
        $name = $_POST["name"];
        $pass = $_POST["pass"];
        $con  = $p->getnguoidung($name,$pass);
        
    }
?>