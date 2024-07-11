<?php
?>
<!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        lyanhkhoa789@gmail.com    
                    </div>
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        luongngocthat@gmail.com   
                    </div>
                    <!-- <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +84 0382034043
                    </div> -->
                </div>
                <div class="ht-right">
                    <form action="" method='get'>
                        <?php
                            
                            if (isset($_SESSION["dangnhap"])) {
                                if(isset($_GET["admin"])){
                                    echo '<a href="view/dangxuat.php" class="login-panel" ><i class="fa fa-times"></i>Đăng xuất</a> ';
                                    echo '<a href="index.php" class="login-panel" ><i class="fa fa-home"></i>Trang Chủ</a> ';
                                }elseif(isset($_SESSION["dangnhap"]) && $_SESSION["dangnhap"] == '2'){
                                    echo '<a href="view/dangxuat.php" class="login-panel" ><i class="fa fa-times"></i>Đăng xuất</a> ';
                                    include_once("controller/cNguoiDung.php");
                                    $p = new cNguoiDung();
                                    $id = $_SESSION["idnguoidung"];
                                    $con  = $p->get1nguoidung($id);
                                    if($con){
                                        while($rn=mysqli_fetch_assoc($con)){
                                            $tennguoidung = $rn["tennguoidung"];
                                        }
                                        echo '<a href="?hoadon" class="login-panel" style=""><i class="fa fa-user-circle-o"></i>'.$tennguoidung.'</a> ';
                                        
                                    }
                                    
                                }else{
                                    echo '<a href="view/dangxuat.php" class="login-panel" ><i class="fa fa-times"></i>Đăng xuất</a> ';
                                    echo '<a href="admin.php?admin" class="login-panel" style=""><i class="fa fa-key"></i>Quản lý</a> ';
                                }
                                
                            } else {
                                echo '<a href="?login" class="login-panel"><i class="fa fa-user"></i>Đăng Nhập</a>';
                            }
                        ?>
                    </form>
                    <!-- <a href="#" class="login-panel"><i class="fa fa-user"></i>Đăng Nhập</a> -->
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yt' data-image="img/flag-3.jpg" data-imagecss="flag yt"
                                data-title="English">VietNam</option>
                            <option value='yu' data-image="img/flag-2.jpg" data-imagecss="flag yu"
                                data-title="Bangladesh">German </option>
                        </select>
                    </div>
                    <?php
                        if(isset($_GET["admin"])){
                            echo " ";
                        }else{
                            
                            echo '
                                <div class="top-social">
                                    <a href="#"><i class="ti-facebook"></i></a>
                                    <a href="#"><i class="ti-twitter-alt"></i></a>
                                    <a href="#"><i class="ti-linkedin"></i></a>
                                    <a href="#"><i class="ti-pinterest"></i></a>
                                </div>
                            ';
                        }
                    ?>
                    
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="index.php">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <?php
                        if(isset($_GET["admin"])){
                            echo "";
                        }else{
                            
                            echo '
                                <div class="col-lg-7 col-md-7">
                                    <div class="advanced-search">
                                        <button type="button" class="category-btn">Tìm Kiếm</button>
                                        <div class="input-group">
                                            <form method="get">
                                                <input type="text" name="txttimkiem" style="color: #c9831b;" placeholder="Bạn Cần Gì?">
                                                <button type="submit" name="subsearch"><i class="ti-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            ';
                            echo '
                            ';
                        }
                    ?>
                        <!-- Giỏ Hàng -->
                         <?php
                         if(isset($_REQUEST["admin"])){
                            echo "";
                        }else{

                            if(!isset($_SESSION["giohang"]) || count($_SESSION["giohang"]) == 0){
                                echo '
                                    <div class="col-lg-3 text-right col-md-3">
                                        <ul class="nav-right">
                                            <li class="cart-icon">
                                                <a href="?giohang">
                                                    <i class="fa fa-shopping-basket"></i>
                                                    <span>0</span>
                                                </a>
                                            </li>
                                            <li class="cart-price">$0</li>
                                        </ul>
                                    </div>
                                ';
                                echo '
                                
                                ';
                            }else{
                                if(is_array($_SESSION["giohang"])){
                                    $slc = $_SESSION["soluongchon"];
                                    $total = 0;
                                    $stt = 0;
                                    echo '
                                        <div class="col-lg-3 text-right col-md-3">
                                                <ul class="nav-right">
                                                    <li class="cart-icon">
                                                        <a href="?giohang">
                                                            <i class="fa fa-shopping-basket"></i>
                                                            <span>'.$slc.'</span>
                                                        </a>
                                                        <div class="cart-hover">
                                                            <div class="select-items">
                                                                <table>
                                                                    <tbody>
                                    ';
                                    for($i = 0; $i < sizeof($_SESSION["giohang"]); $i++){
                                        echo '
                                                        
                                                                        <tr>
                                                                            <td class="si-pic"><img src="img/products/'.$_SESSION["giohang"][$i][3].'" alt="" width="50px"></td>
                                                                            <td class="si-text">
                                                                                <div class="product-selected">
                                            ';
                                        if ($_SESSION["giohang"][$i][2] == 0 ){
                                            echo '                                        
                                                                                    <p>$'.number_format($_SESSION["giohang"][$i][1],0,",",".").' x '.$_SESSION["giohang"][$i][4].' ('.$_SESSION["giohang"][$i][5].')</p>
                                            ';
                                            $tt = $_SESSION["giohang"][$i][1] * $_SESSION["giohang"][$i][4];
                                        }else{
                                            echo '                                        
                                                                                    <p>$'.number_format($_SESSION["giohang"][$i][2],0,",",".").' x '.$_SESSION["giohang"][$i][4].' ('.$_SESSION["giohang"][$i][5].')</p>
                                            ';
                                            $tt = $_SESSION["giohang"][$i][2] * $_SESSION["giohang"][$i][4];
                                        }
                                        
                                        echo '
                                                                                    <h6>'.$_SESSION["giohang"][$i][0].'</h6>
                                                                                </div>
                                                                            </td>
                                                                            <td class="si-close">
                                                                                <a href="?delete1sanphamgiohang&id='.$stt.'"><i class="ti-close"></i></a>
                                                                            </td>
                                                                        </tr>   
                                        ';
                                        $total +=  $tt;
                                        $stt++;
                                    }
                                    echo '
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="select-total">
                                                            <span>total:</span>
                                                            <h5>$'.number_format($total,0,",",".").'</h5>
                                                        </div>
                                                        <div class="select-button">
                                                            <a href="?deletegiohang" class="primary-btn view-card">Xoá Giỏ Hàng</a>
                                                            <a href="?thutucthanhtoann" class="primary-btn checkout-btn">THỦ TỤC THANH TOÁN</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="cart-price">$'.number_format($total,0,",",".").'</li>
                                            </ul>
                                        </div>
                                    ';
                                }
                               
                            }
                        }
                    ?> 
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>Danh Mục</span>
                        <?php
                            include_once("view/thuonghieu.php");

                        ?>
                        
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <?php
// menu của admin
                            if(isset($_GET["admin"]) && $_SESSION["dangnhap"]== '1' ){
                                if(isset($_REQUEST["type"]) && $_REQUEST["type"] == "quanlythuonghieu"){
                                    echo'
                                        <li><a href="admin.php?admin">Trang Quản Trị</a></li>
                                        <li style="background-color: #e7ab3c"><a href="#">Quản lý dữ liệu</a>
                                            <ul class="dropdown">
                                                <li class="active"><a href="?admin&type=quanlythuonghieu">Quản Lý Thương Hiệu</a></li>
                                                <li><a href="?admin&type=quanlysanpham">Quản Lý Sản Phẩm</a></li>
                                                <li><a href="?admin&type=quanlynguoidung">Quản Lý Người Dùng</a></li>
                                                <li><a href="?admin&type=quanlyhoadon">Quản Lý Đơn Hàng</a></li>
                                                <li><a href="?admin&type=quanlyvaitro">Quản Lý Vai Trò</a></li>
                                            </ul>
                                            <li><a href="#">Thao Tác</a>
                                                <ul class="dropdown">
                                                    <li><a href="?admin=insertsp">Thêm Sản Phẩm</a></li>
                                                    <li><a href="?admin=insertth">Thêm Thương Hiệu</a></li>
                                                    <li><a href="?admin=insertnd">Thêm Người Dùng</a></li>
                                                </ul>
                                            </li>
                                    ';
                                }elseif(isset($_REQUEST["type"]) && $_REQUEST["type"] == "quanlysanpham"){
                                    echo'
                                        <li><a href="admin.php?admin">Trang Quản Trị</a></li>
                                        <li style="background-color: #e7ab3c"><a href="#">Quản lý dữ liệu</a>
                                            <ul class="dropdown">
                                                <li ><a href="?admin&type=quanlythuonghieu">Quản Lý Thương Hiệu</a></li>
                                                <li class="active"><a href="?admin&type=quanlysanpham">Quản Lý Sản Phẩm</a></li>
                                                <li><a href="?admin&type=quanlynguoidung">Quản Lý Người Dùng</a></li>
                                                <li><a href="?admin&type=quanlyhoadon">Quản Lý Đơn Hàng</a></li>
                                                <li><a href="?admin&type=quanlyvaitro">Quản Lý Vai Trò</a></li>

                                            </ul>
                                            <li><a href="#">Thao Tác</a>
                                                <ul class="dropdown">
                                                    <li><a href="?admin=insertsp">Thêm Sản Phẩm</a></li>
                                                    <li><a href="?admin=insertth">Thêm Thương Hiệu</a></li>
                                                    <li><a href="?admin=insertnd">Thêm Người Dùng</a></li>
                                                </ul>
                                            </li>
                                    ';
                                }elseif(isset($_REQUEST["type"]) && $_REQUEST["type"] == "quanlynguoidung"){
                                    echo'
                                        <li><a href="admin.php?admin">Trang Quản Trị</a></li>
                                        <li style="background-color: #e7ab3c"><a href="#">Quản lý dữ liệu</a>
                                            <ul class="dropdown">
                                                <li ><a href="?admin&type=quanlythuonghieu">Quản Lý Thương Hiệu</a></li>
                                                <li ><a href="?admin&type=quanlysanpham">Quản Lý Sản Phẩm</a></li>
                                                <li class="active"><a href="?admin&type=quanlynguoidung">Quản Lý Người Dùng</a></li>
                                                <li><a href="?admin&type=quanlyhoadon">Quản Lý Đơn Hàng</a></li>
                                                <li><a href="?admin&type=quanlyvaitro">Quản Lý Vai Trò</a></li>
                                            </ul>
                                            <li><a href="#">Thao Tác</a>
                                                <ul class="dropdown">
                                                    <li><a href="?admin=insertsp">Thêm Sản Phẩm</a></li>
                                                    <li><a href="?admin=insertth">Thêm Thương Hiệu</a></li>
                                                    <li><a href="?admin=insertnd">Thêm Người Dùng</a></li>
                                                </ul>
                                            </li>
                                    ';
                                }elseif(isset($_REQUEST["type"]) && $_REQUEST["type"] == "quanlyvaitro"){
                                    echo'
                                        <li><a href="admin.php?admin">Trang Quản Trị</a></li>
                                        <li style="background-color: #e7ab3c"><a href="#">Quản lý dữ liệu</a>
                                            <ul class="dropdown">
                                                <li ><a href="?admin&type=quanlythuonghieu">Quản Lý Thương Hiệu</a></li>
                                                <li ><a href="?admin&type=quanlysanpham">Quản Lý Sản Phẩm</a></li>
                                                <li ><a href="?admin&type=quanlynguoidung">Quản Lý Người Dùng</a></li>
                                                <li><a href="?admin&type=quanlyhoadon">Quản Lý Đơn Hàng</a></li>
                                                <li class="active"><a href="?admin&type=quanlyvaitro">Quản Lý Vai Trò</a></li>
                                            </ul>
                                            <li><a href="#">Thao Tác</a>
                                                <ul class="dropdown">
                                                    <li><a href="?admin=insertsp">Thêm Sản Phẩm</a></li>
                                                    <li><a href="?admin=insertth">Thêm Thương Hiệu</a></li>
                                                    <li><a href="?admin=insertnd">Thêm Người Dùng</a></li>
                                                </ul>
                                            </li>
                                    ';
                                }elseif(isset($_REQUEST["type"]) && $_REQUEST["type"] == "quanlyhoadon"){
                                    echo'
                                        <li><a href="admin.php?admin">Trang Quản Trị</a></li>
                                        <li style="background-color: #e7ab3c"><a href="#">Quản lý dữ liệu</a>
                                            <ul class="dropdown">
                                                <li ><a href="?admin&type=quanlythuonghieu">Quản Lý Thương Hiệu</a></li>
                                                <li ><a href="?admin&type=quanlysanpham">Quản Lý Sản Phẩm</a></li>
                                                <li ><a href="?admin&type=quanlynguoidung">Quản Lý Người Dùng</a></li>
                                                <li class="active"><a href="?admin&type=quanlyhoadon">Quản Lý Đơn Hàng</a></li>
                                                <li ><a href="?admin&type=quanlyvaitro">Quản Lý Vai Trò</a></li>
                                            </ul>
                                            <li><a href="#">Thao Tác</a>
                                                <ul class="dropdown">
                                                    <li><a href="?admin=insertsp">Thêm Sản Phẩm</a></li>
                                                    <li><a href="?admin=insertth">Thêm Thương Hiệu</a></li>
                                                    <li><a href="?admin=insertnd">Thêm Người Dùng</a></li>
                                                </ul>
                                            </li>
                                    ';
                                }elseif(isset($_REQUEST["admin"]) && $_REQUEST["admin"] == "insertsp"){
                                    echo'
                                        <li><a href="admin.php?admin">Trang Quản Trị</a></li>
                                        <li><a href="#">Quản lý dữ liệu</a>
                                            <ul class="dropdown">
                                                <li><a href="?admin&type=quanlythuonghieu">Quản Lý Thương Hiệu</a></li>
                                                <li><a href="?admin&type=quanlysanpham">Quản Lý Sản Phẩm</a></li>
                                                <li><a href="?admin&type=quanlynguoidung">Quản Lý Người Dùng</a></li>
                                                <li><a href="?admin&type=quanlyhoadon">Quản Lý Đơn Hàng</a></li>
                                                
                                                <li ><a href="?admin&type=quanlyvaitro">Quản Lý Vai Trò</a></li>
                                            </ul>
                                            <li style="background-color: #e7ab3c"><a href="#">Thao Tác</a>
                                                <ul class="dropdown">
                                                    <li class="active"><a href="?admin=insertsp">Thêm Sản Phẩm</a></li>
                                                    <li><a href="?admin=insertth">Thêm Thương Hiệu</a></li>
                                                    <li><a href="?admin=insertnd">Thêm Người Dùng</a></li>
                                                </ul>
                                            </li>
                                    ';
                                }elseif(isset($_REQUEST["admin"]) && $_REQUEST["admin"] == "insertth"){
                                    echo'
                                        <li><a href="admin.php?admin">Trang Quản Trị</a></li>
                                        <li><a href="#">Quản lý dữ liệu</a>
                                            <ul class="dropdown">
                                                <li><a href="?admin&type=quanlythuonghieu">Quản Lý Thương Hiệu</a></li>
                                                <li><a href="?admin&type=quanlysanpham">Quản Lý Sản Phẩm</a></li>
                                                <li><a href="?admin&type=quanlynguoidung">Quản Lý Người Dùng</a></li>
                                                <li><a href="?admin&type=quanlyhoadon">Quản Lý Đơn Hàng</a></li>
                                                
                                                <li ><a href="?admin&type=quanlyvaitro">Quản Lý Vai Trò</a></li>
                                            </ul>
                                            <li style="background-color: #e7ab3c"><a href="#">Thao Tác</a>
                                                <ul class="dropdown">
                                                    <li><a href="?admin=insertsp">Thêm Sản Phẩm</a></li>
                                                    <li class="active"><a href="?admin=insertth">Thêm Thương Hiệu</a></li>
                                                    <li><a href="?admin=insertnd">Thêm Người Dùng</a></li>
                                                </ul>
                                            </li>
                                    ';
                                }elseif(isset($_REQUEST["admin"]) && $_REQUEST["admin"] == "insertnd"){
                                    echo'
                                        <li><a href="admin.php?admin">Trang Quản Trị</a></li>
                                        <li><a href="#">Quản lý dữ liệu</a>
                                            <ul class="dropdown">
                                                <li><a href="?admin&type=quanlythuonghieu">Quản Lý Thương Hiệu</a></li>
                                                <li><a href="?admin&type=quanlysanpham">Quản Lý Sản Phẩm</a></li>
                                                <li><a href="?admin&type=quanlynguoidung">Quản Lý Người Dùng</a></li>
                                                <li><a href="?admin&type=quanlyhoadon">Quản Lý Đơn Hàng</a></li>
                                                
                                                <li><a href="?admin&type=quanlyvaitro">Quản Lý Vai Trò</a></li>
                                            </ul>
                                            <li style="background-color: #e7ab3c"><a href="#">Thao Tác</a>
                                                <ul class="dropdown">
                                                    <li><a href="?admin=insertsp">Thêm Sản Phẩm</a></li>
                                                    <li><a href="?admin=insertth">Thêm Thương Hiệu</a></li>
                                                    <li class="active"><a href="?admin=insertnd">Thêm Người Dùng</a></li>
                                                </ul>
                                            </li>
                                    ';
                                }else{
                                    echo'
                                        <li class="active"><a href="admin.php?admin">Trang Quản Trị</a></li>
                                        <li><a href="#">Quản lý dữ liệu</a>
                                            <ul class="dropdown">
                                                <li><a href="?admin&type=quanlythuonghieu">Quản Lý Thương Hiệu</a></li>
                                                <li><a href="?admin&type=quanlysanpham">Quản Lý Sản Phẩm</a></li>
                                                <li><a href="?admin&type=quanlynguoidung">Quản Lý Người Dùng</a></li>
                                                <li><a href="?admin&type=quanlyhoadon">Quản Lý Đơn Hàng</a></li>
                                                <li><a href="?admin&type=quanlyvaitro">Quản Lý Vai Trò</a></li>
                                            </ul>
                                            <li><a href="#">Thao Tác</a>
                                                <ul class="dropdown">
                                                    <li><a href="?admin=insertsp">Thêm Sản Phẩm</a></li>
                                                    <li><a href="?admin=insertth">Thêm Thương Hiệu</a></li>
                                                    <li><a href="?admin=insertnd">Thêm Người Dùng</a></li>
                                                </ul>
                                            </li>
                                    ';
                                }
                                echo'   
                                    </li>
                                   
                                ';
// menu của Nhân Viên   
                            }elseif(isset($_GET["admin"]) && $_SESSION["dangnhap"]== '3' ){
                                if(isset($_REQUEST["type"]) && $_REQUEST["type"] == "quanlythuonghieu"){
                                    echo'
                                        <li><a href="admin.php?admin">Trang Quản Trị</a></li>
                                        <li style="background-color: #e7ab3c"><a href="#">Quản lý dữ liệu</a>
                                            <ul class="dropdown">
                                                <li class="active"><a href="?admin&type=quanlythuonghieu">Quản Lý Thương Hiệu</a></li>
                                                <li><a href="?admin&type=quanlysanpham">Quản Lý Sản Phẩm</a></li>
                                                <li><a href="?admin&type=quanlyhoadon">Quản Lý Đơn Hàng</a></li>
                                            </ul>
                                            <li><a href="#">Thao Tác</a>
                                                <ul class="dropdown">
                                                    <li><a href="?admin=insertsp">Thêm Sản Phẩm</a></li>
                                                    <li><a href="?admin=insertth">Thêm Thương Hiệu</a></li>
                                                </ul>
                                            </li>
                                    ';
                                }elseif(isset($_REQUEST["type"]) && $_REQUEST["type"] == "quanlysanpham"){
                                    echo'
                                        <li><a href="admin.php?admin">Trang Quản Trị</a></li>
                                        <li style="background-color: #e7ab3c"><a href="#">Quản lý dữ liệu</a>
                                            <ul class="dropdown">
                                                <li ><a href="?admin&type=quanlythuonghieu">Quản Lý Thương Hiệu</a></li>
                                                <li class="active"><a href="?admin&type=quanlysanpham">Quản Lý Sản Phẩm</a></li>
                                                <li><a href="?admin&type=quanlyhoadon">Quản Lý Đơn Hàng</a></li>
                                    
                                            </ul>
                                            <li><a href="#">Thao Tác</a>
                                                <ul class="dropdown">
                                                    <li><a href="?admin=insertsp">Thêm Sản Phẩm</a></li>
                                                    <li><a href="?admin=insertth">Thêm Thương Hiệu</a></li>
                                                </ul>
                                            </li>
                                    ';
                                }elseif(isset($_REQUEST["type"]) && $_REQUEST["type"] == "quanlyhoadon"){
                                    echo'
                                        <li><a href="admin.php?admin">Trang Quản Trị</a></li>
                                        <li style="background-color: #e7ab3c"><a href="#">Quản lý dữ liệu</a>
                                            <ul class="dropdown">
                                                <li ><a href="?admin&type=quanlythuonghieu">Quản Lý Thương Hiệu</a></li>
                                                <li><a href="?admin&type=quanlysanpham">Quản Lý Sản Phẩm</a></li>
                                                <li  class="active"><a href="?admin&type=quanlyhoadon">Quản Lý Đơn Hàng</a></li>
                                    
                                            </ul>
                                            <li><a href="#">Thao Tác</a>
                                                <ul class="dropdown">
                                                    <li><a href="?admin=insertsp">Thêm Sản Phẩm</a></li>
                                                    <li><a href="?admin=insertth">Thêm Thương Hiệu</a></li>
                                                </ul>
                                            </li>
                                    ';
                                }elseif(isset($_REQUEST["admin"]) && $_REQUEST["admin"] == "insertsp"){
                                    echo'
                                        <li><a href="admin.php?admin">Trang Quản Trị</a></li>
                                        <li><a href="#">Quản lý dữ liệu</a>
                                            <ul class="dropdown">
                                                <li><a href="?admin&type=quanlythuonghieu">Quản Lý Thương Hiệu</a></li>
                                                <li><a href="?admin&type=quanlysanpham">Quản Lý Sản Phẩm</a></li>
                                                <li><a href="?admin&type=quanlyhoadon">Quản Lý Đơn Hàng</a></li>
                                            </ul>
                                            <li style="background-color: #e7ab3c"><a href="#">Thao Tác</a>
                                                <ul class="dropdown">
                                                    <li class="active"><a href="?admin=insertsp">Thêm Sản Phẩm</a></li>
                                                    <li><a href="?admin=insertth">Thêm Thương Hiệu</a></li>
                                                </ul>
                                            </li>
                                    ';
                                }elseif(isset($_REQUEST["admin"]) && $_REQUEST["admin"] == "insertth"){
                                    echo'
                                        <li><a href="admin.php?admin">Trang Quản Trị</a></li>
                                        <li><a href="#">Quản lý dữ liệu</a>
                                            <ul class="dropdown">
                                                <li><a href="?admin&type=quanlythuonghieu">Quản Lý Thương Hiệu</a></li>
                                                <li><a href="?admin&type=quanlysanpham">Quản Lý Sản Phẩm</a></li>
                                                <li><a href="?admin&type=quanlyhoadon">Quản Lý Đơn Hàng</a></li>
                                            </ul>
                                            <li style="background-color: #e7ab3c"><a href="#">Thao Tác</a>
                                                <ul class="dropdown">
                                                    <li><a href="?admin=insertsp">Thêm Sản Phẩm</a></li>
                                                    <li class="active"><a href="?admin=insertth">Thêm Thương Hiệu</a></li>
                                                </ul>
                                            </li>
                                    ';
                                }else{
                                    echo'
                                        <li class="active"><a href="admin.php?admin">Trang Quản Trị</a></li>
                                        <li><a href="#">Quản lý dữ liệu</a>
                                            <ul class="dropdown">
                                                <li><a href="?admin&type=quanlythuonghieu">Quản Lý Thương Hiệu</a></li>
                                                <li><a href="?admin&type=quanlysanpham">Quản Lý Sản Phẩm</a></li>
                                                <li><a href="?admin&type=quanlyhoadon">Quản Lý Đơn Hàng</a></li>
                                            </ul>
                                            <li><a href="#">Thao Tác</a>
                                                <ul class="dropdown">
                                                    <li><a href="?admin=insertsp">Thêm Sản Phẩm</a></li>
                                                    <li><a href="?admin=insertth">Thêm Thương Hiệu</a></li>
                                                </ul>
                                            </li>
                                    ';
                                }
                                echo'   
                                    </li>
                                   
                                ';
// menu của trang chủ Khách Hàng   
                            }elseif(isset($_REQUEST["login"])){
                                echo '
                                    <li ><a href="index.php">Trang Chủ</a></li>
                                    <li><a href="?shop">Shop</a></li>
                                    <li style="background-color: #e7ab3c"><a href="#">Thao Tác</a>
                                         <ul class="dropdown">
                                             <li class="active"><a href="?login">Đăng nhập</a></li>
                                             <li><a href="?register">Đăng Ký</a></li>
                                         </ul>
                                    </li>
                                    <li><a href="#">Trang</a>
                                         <ul class="dropdown">
                                             <li><a href="?giohang">Giỏ Hàng</a></li>
                                             <li><a href="?hoadon">Hoá Đơn</a></li>
                                         </ul>
                                    </li>
                                ';
                                    
                            }elseif(isset($_REQUEST["register"])){
                                echo '
                                    <li><a href="index.php">Trang Chủ</a></li>
                                    <li><a href="?shop">Shop</a></li>
                                    <li style="background-color: #e7ab3c"><a href="#">Thao Tác</a>
                                         <ul class="dropdown">
                                             <li><a href="?login">Đăng nhập</a></li>
                                             <li class="active"><a href="?register">Đăng Ký</a></li>
                                         </ul>
                                    </li>
                                    <li><a href="#">Trang</a>
                                         <ul class="dropdown">
                                             <li><a href="?giohang">Giỏ Hàng</a></li>
                                             <li><a href="?hoadon">Hoá Đơn</a></li>
                                         </ul>
                                    </li>
                                ';
                                    
                            }elseif(isset($_REQUEST["shop"])){
                                if(isset($_SESSION["dangnhap"])){
                                    echo '
                                        <li><a href="index.php">Trang Chủ</a></li>
                                        <li class="active"><a href="?shop">Shop</a></li>
                                        <li><a href="#">Trang</a>
                                            <ul class="dropdown">
                                                <li><a href="?giohang">Giỏ Hàng</a></li>
                                                <li><a href="?hoadon">Hoá Đơn</a></li>
                                            </ul>
                                        </li>
                                    ';
                                }else{
                                    echo '
                                        <li><a href="index.php">Trang Chủ</a></li>
                                        <li class="active"><a href="?shop">Shop</a></li>
                                        <li><a href="#">Thao Tác</a>
                                            <ul class="dropdown">
                                                <li><a href="?login">Đăng nhập</a></li>
                                                <li ><a href="?register">Đăng Ký</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Trang</a>
                                            <ul class="dropdown">
                                                <li><a href="?giohang">Giỏ Hàng</a></li>
                                                <li><a href="?hoadon">Hoá Đơn</a></li>
                                            </ul>
                                        </li>
                                    ';
                                } 
                                
                                    
                            }elseif(isset($_REQUEST["chitietsanpham"])){
                                if(isset($_SESSION["dangnhap"])){
                                    echo '
                                        <li ><a href="index.php">Trang Chủ</a></li>
                                        <li class="active"><a href="?shop">Shop</a></li>
                                        <li><a href="#">Trang</a>
                                            <ul class="dropdown">
                                                <li><a href="?giohang">Giỏ Hàng</a></li>
                                                <li><a href="?hoadon">Hoá Đơn</a></li>
                                            </ul>
                                        </li>
                                    ';
                                }else{
                                    echo '
                                        <li ><a href="index.php">Trang Chủ</a></li>
                                        <li class="active"><a href="?shop">Shop</a></li>
                                        <li ><a href="#">Thao Tác</a>
                                             <ul class="dropdown">
                                                 <li><a href="?login">Đăng nhập</a></li>
                                                 <li><a href="?register">Đăng Ký</a></li>
                                             </ul>
                                        </li>
                                        <li><a href="#">Trang</a>
                                            <ul class="dropdown">
                                                <li><a href="?giohang">Giỏ Hàng</a></li>
                                                <li><a href="?hoadon">Hoá Đơn</a></li>
                                            </ul>
                                        </li>
                                    ';
                                } 
                                // echo '
                                //     <li><a href="index.php">Trang Chủ</a></li>
                                //     <li class="active"><a href="?shop">Shop</a></li>
                                //     <li><a href="#">Thao Tác</a>
                                //          <ul class="dropdown">
                                //              <li><a href="?login">Đăng nhập</a></li>
                                //              <li ><a href="?register">Đăng Ký</a></li>
                                //          </ul>
                                //     </li>
                                // ';
                                    
                            }elseif(isset($_REQUEST["subsearch"])){
                                if(isset($_SESSION["dangnhap"])){
                                    echo '
                                        <li><a href="index.php">Trang Chủ</a></li>
                                        <li class="active"><a href="?shop">Shop</a></li>
                                        <li><a href="#">Trang</a>
                                            <ul class="dropdown">
                                                <li><a href="?giohang">Giỏ Hàng</a></li>
                                                <li><a href="?hoadon">Hoá Đơn</a></li>
                                            </ul>
                                        </li>
                                    ';
                                }else{
                                    echo '
                                        <li><a href="index.php">Trang Chủ</a></li>
                                        <li class="active"><a href="?shop">Shop</a></li>
                                        <li ><a href="#">Thao Tác</a>
                                             <ul class="dropdown">
                                                 <li><a href="?login">Đăng nhập</a></li>
                                                 <li><a href="?register">Đăng Ký</a></li>
                                             </ul>
                                        </li>
                                        <li><a href="#">Trang</a>
                                            <ul class="dropdown">
                                                <li><a href="?giohang">Giỏ Hàng</a></li>
                                                <li><a href="?hoadon">Hoá Đơn</a></li>
                                            </ul>
                                        </li>
                                    ';
                                } 
                                // echo '
                                //     <li><a href="index.php">Trang Chủ</a></li>
                                //     <li class="active"><a href="?shop">Shop</a></li>
                                //     <li><a href="#">Thao Tác</a>
                                //          <ul class="dropdown">
                                //              <li><a href="?login">Đăng nhập</a></li>
                                //              <li ><a href="?register">Đăng Ký</a></li>
                                //          </ul>
                                //     </li>
                                // ';
                                    
                            }elseif(isset($_REQUEST["hoadon"])){
                                if(isset($_SESSION["dangnhap"])){
                                    echo '
                                        <li><a href="index.php">Trang Chủ</a></li>
                                        <li><a href="?shop">Shop</a></li>
                                        <li style="background-color: #e7ab3c"><a href="#">Trang</a>
                                            <ul class="dropdown">
                                                <li><a href="?giohang">Giỏ Hàng</a></li>
                                                <li class="active"><a href="?hoadon">Hoá Đơn</a></li>
                                            </ul>
                                        </li>
                                    ';
                                }else{
                                    echo '
                                        <li><a href="index.php">Trang Chủ</a></li>
                                        <li ><a href="?shop">Shop</a></li>
                                        <li ><a href="#">Thao Tác</a>
                                             <ul class="dropdown">
                                                 <li><a href="?login">Đăng nhập</a></li>
                                                 <li><a href="?register">Đăng Ký</a></li>
                                             </ul>
                                        </li>
                                        <li style="background-color: #e7ab3c"><a href="#">Trang</a>
                                            <ul class="dropdown">
                                                <li><a href="?giohang">Giỏ Hàng</a></li>
                                                <li class="active"><a href="?hoadon">Hoá Đơn</a></li>
                                            </ul>
                                        </li>
                                    ';
                                } 
                                
                                    
                            }elseif(isset($_REQUEST["giohang"])){
                                if(isset($_SESSION["dangnhap"])){
                                    echo '
                                        <li><a href="index.php">Trang Chủ</a></li>
                                        <li><a href="?shop">Shop</a></li>
                                        <li style="background-color: #e7ab3c"><a href="#">Trang</a>
                                            <ul class="dropdown">
                                                <li class="active"><a href="?giohang">Giỏ Hàng</a></li>
                                                <li><a href="?hoadon">Hoá Đơn</a></li>
                                            </ul>
                                        </li>
                                    ';
                                }else{
                                    echo '
                                        <li><a href="index.php">Trang Chủ</a></li>
                                        <li ><a href="?shop">Shop</a></li>
                                        <li ><a href="#">Thao Tác</a>
                                             <ul class="dropdown">
                                                 <li><a href="?login">Đăng nhập</a></li>
                                                 <li><a href="?register">Đăng Ký</a></li>
                                             </ul>
                                        </li>
                                        <li style="background-color: #e7ab3c"><a href="#">Trang</a>
                                            <ul class="dropdown">
                                                <li class="active"><a href="?giohang">Giỏ Hàng</a></li>
                                                <li><a href="?hoadon">Hoá Đơn</a></li>
                                            </ul>
                                        </li>
                                    ';
                                } 
                                
                                    
                            }else{
                                if(isset($_SESSION["dangnhap"])){
                                    echo '
                                        <li class="active"><a href="index.php">Trang Chủ</a></li>
                                        <li><a href="?shop">Shop</a></li>
                                        <li><a href="#">Trang</a>
                                            <ul class="dropdown">
                                                <li><a href="?giohang">Giỏ Hàng</a></li>
                                                <li><a href="?hoadon">Hoá Đơn</a></li>
                                            </ul>
                                        </li>
                                    ';
                                }else{
                                    echo '
                                        <li class="active"><a href="index.php">Trang Chủ</a></li>
                                        <li><a href="?shop">Shop</a></li>
                                        <li ><a href="#">Thao Tác</a>
                                             <ul class="dropdown">
                                                 <li><a href="?login">Đăng nhập</a></li>
                                                 <li><a href="?register">Đăng Ký</a></li>
                                             </ul>
                                        </li>
                                        <li><a href="#">Trang</a>
                                            <ul class="dropdown">
                                                <li><a href="?giohang">Giỏ Hàng</a></li>
                                                <li><a href="?hoadon">Hoá Đơn</a></li>
                                            </ul>
                                        </li>
                                    ';
                                     
                                    // echo'
                                    //     <li><a href="./shop.html">Shop</a></li>
                                    //     <li><a href="#">Bộ Sưu Tập</a>
                                    //         <ul class="dropdown">
                                    //             <li><a href="#">Mùa Đông</a></li>
                                    //             <li><a href="#">Mùa Xuân</a></li>
                                    //             <li><a href="#">Mùa Hè</a></li>
                                    //         </ul>
                                    //     </li>
                                    //     <li><a href="./blog.html">Blog</a></li>
                                    //     <li><a href="#">Trang</a>
                                    //         <ul class="dropdown">
                                    //             <li><a href="./blog-details.html">Chi tiết blog</a></li>
                                    //             <li><a href="./shopping-cart.html">Giỏ hàng</a></li>
                                    //             <li><a href="./check-out.html">Thủ tục thanh toán</a></li>
                                    //             <li><a href="./register.html">Đăng Ký</a></li>
                                    //             <li><a href="./login.html">Đăng Nhập</a></li>
                                    //         </ul>
                                    //     </li>
                                    // ';
                                }
                            }
                        ?>
                        
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>