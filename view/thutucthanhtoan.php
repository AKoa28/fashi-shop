<?php
    if(count($_SESSION["giohang"])==0){
        header("refresh:0; url='?shop'");
    }
    if(!isset($_SESSION["dangnhap"])){
        echo "<script>alert('Đăng nhập để Thanh toán')</script>";
        $_SESSION["dangnhapthanhtoan"] = 1;
        header("refresh:0; url='?login'");
    }
?>
<style>
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="?shop.php">Shop</a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <form class="checkout-form" method="post" id="phoneForm">
        <section class="checkout-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        
                        <h4>Thông tin đặt hàng</h4>
                        <form action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="cun">Địa chỉ<span> *</span></label>
                                <input type="text" id="cun" name="txtdiachidathang" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Số điện thoại<span> *</span></label>
                                <input type="text" id="phone" name="txtsdtdathang" required>
                                
                                <label id="message" ></label>
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Sản phẩm của bạn</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Sản phẩm <span>Giá</span></li>
                                    <?php
                                        
                                        if(isset($_SESSION["giohang"]) && is_array($_SESSION["giohang"])){
                                            $total = 0;
                                            $stt = 0;
                                            for($i = 0; $i < sizeof($_SESSION["giohang"]); $i++){
                                                
                                                if ($_SESSION["giohang"][$i][2] == 0 ){
                                                    $tt = $_SESSION["giohang"][$i][1] * $_SESSION["giohang"][$i][4];
                                                    echo '
                                                        <li class="fw-normal">'.$_SESSION["giohang"][$i][0].' x '.$_SESSION["giohang"][$i][4].' ('.$_SESSION["giohang"][$i][5].') <span>$'.number_format($tt,0,",",".").'</span></li>
                                                            
                                                    ';
                                                }else{
                                                    $tt = $_SESSION["giohang"][$i][2] * $_SESSION["giohang"][$i][4];
                                                    echo '
                                                        <li class="fw-normal">'.$_SESSION["giohang"][$i][0].' x '.$_SESSION["giohang"][$i][4].' ('.$_SESSION["giohang"][$i][5].') <span>$'.number_format($tt,0,",",".").'</span></li>
                                                            
                                                    ';
                                                }
                                                
                                                $total +=  $tt;
                                                $stt++;   
                                            }
                                            echo '
                                                <li class="fw-normal">Phụ thu <span>$'.number_format($total,0,",",".").'</span></li>
                                                <li class="total-price">Tổng tiền <span><input type="hidden" name="tongtien" value="'.$total.'">$'.number_format($total,0,",",".").'</span></li>
                                            ';
                                        }else{
                                            echo '
                                            ';
                                        }

                                    ?>
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Thanh toán khi nhận hàng
                                            <input type="radio" id="pc-check" name ="pttt" value="1" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Thanh toán chuyển khoản
                                            <input type="radio" id="pc-paypal" name ="pttt" value="2">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn" name="subdathang">Đặt Hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    
    <!-- Shopping Cart Section End -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_REQUEST["subdathang"])){
        include_once("controller/cHoaDon.php");
        include_once("controller/cChiTietHoaDon.php");
        $p = new cHoaDon();
        $pcthd = new cHoaDon();
        $iduser = $_SESSION["idnguoidung"];
        $dcdh = $_REQUEST["txtdiachidathang"];
        $sdtdh = $_REQUEST["txtsdtdathang"];
        $ptttdh = $_REQUEST["pttt"];
        $tongtien = $_REQUEST["tongtien"];
        $date = date('Y-m-d H:i:s');
        $trangthai = "Chuẩn bị hàng";
        $con  = $p->gettaohoadon($iduser,$dcdh,$sdtdh,$tongtien,$date,$ptttdh,$trangthai);
        


    }
}


?>