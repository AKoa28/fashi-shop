<?php
    if(!isset($_SESSION['giohang'])){
         $_SESSION['giohang']=[];
    }
   


?>
<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="index.php"><i class="fa fa-home"></i> Home</a>
                        <a href="?shop">Shop</a>
                        <span>Giỏ Hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <form action="thutucthanhtoan.php" method="post">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Hình ảnh</th>
                                        <th class="p-name">Tên sản phẩm</th>
                                        <th class="p-name">Kích Thước</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th><i class="ti-close"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
    <?php
        if(isset($_SESSION["giohang"]) && is_array($_SESSION["giohang"])){
            $total = 0;
            $stt = 0;
            $idspsoluongsp=[];  
            for($i = 0; $i < sizeof($_SESSION["giohang"]); $i++){
            
                echo '
                            <tr>        
                                <td class="cart-pic first-row"><img src="img/products/'.$_SESSION["giohang"][$i][3].'" alt="" width="70px"></td>
                                <td class="cart-title first-row">
                                    <h5>'.$_SESSION["giohang"][$i][0].'</h5>
                                </td>
                                <td class="cart-title first-row">
                                    <h5>'.$_SESSION["giohang"][$i][5].'</h5>
                                </td>
                    ';
                if ($_SESSION["giohang"][$i][2] == 0 ){
                    echo '                                        
                                <td class="p-price first-row" id="inputNumber1" value="'.$_SESSION["giohang"][$i][1].'">$'.number_format($_SESSION["giohang"][$i][1],0,",",".").'</td>
                    ';
                    $tt = $_SESSION["giohang"][$i][1] * $_SESSION["giohang"][$i][4];
                }else{
                    echo '                                        
                                <td class="p-price first-row" id="inputNumber1" value="'.$_SESSION["giohang"][$i][2].'">$'.number_format($_SESSION["giohang"][$i][2],0,",",".").'</td>
                    ';
                    $tt = $_SESSION["giohang"][$i][2] * $_SESSION["giohang"][$i][4];
                }
                                
                echo '
                                <td class="qua-col first-row">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="number" id="inputNumber" oninput="calculate()" min="1" value="'.$_SESSION["giohang"][$i][4].'" name="soluong">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price first-row" id="result">$'.number_format($tt,0,",",".").'</td>
                                <td class="close-td first-row"><a href="?delete1sanphamgiohang&id='.$stt.'" style = "color: red;"><i class="ti-close"></i></a></td>
                             </tr>
                    ';
                $total +=  $tt;
                $stt++;
                $idspsoluongsp[] = [$_SESSION["giohang"][$i][6],$_SESSION["giohang"][$i][4],$tt,$_SESSION["giohang"][$i][5]];
               
                    
            }
            $_SESSION["idspgiohang"] = $idspsoluongsp;
            // print_r($_SESSION["idspgiohang"]); echo "<br>";
            // var_dump($_SESSION["soluongsp"]);

        }else{
            echo '
                <tr>        
                    <td class="cart-pic first-row"><img src="" alt="" width="70px"></td>
                    <td class="cart-title first-row">
                        <h5></h5>
                    </td>
                    <td></td>
                    ';
            echo '
                    <td class="qua-col first-row">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="" min="0" value="0" readonly>
                            </div>
                        </div>
                    </td>
                    <td class="total-price first-row">$0</td>
                </tr>
            ';
        }

    ?>
    <script>
        function calculate() {
            // Lấy giá trị số từ ô input
            var number = document.getElementById("inputNumber").value;
            var number1 = document.getElementById("inputNumber1").value;
            // Thực hiện phép tính
            var result = number1 * number;
            
            // Hiển thị kết quả
            document.getElementById("result").innerText = result;
        }
    </script>
    <!-- Shopping Cart Section Begin -->
                                   
                                </tbody> 
                            </table>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="?deletegiohang" class="primary-btn continue-shop" >Xoá giỏ hàng</a>
                                <a href="?shop" class="primary-btn up-cart">Tiếp tục mua sắm</a>
                                
                            </div>
                            <div class="discount-coupon">
                                <h6>Mã giảm giá</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Áp dụng</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <?php
                                    if(isset($_SESSION["giohang"]) && is_array($_SESSION["giohang"])){
                                        echo '
                                            <li class="subtotal">Tổng phụ thu <span>$'.number_format($total,0,",",".").'</span></li>
                                            <li class="cart-total">Thành tiền <span>$'.number_format($total,0,",",".").'</span></li>
                                        ';
                                    }else{
                                        echo '
                                            <li class="subtotal">Tổng phụ thu <span>$0</span></li>
                                            <li class="cart-total">Thành tiền <span>$0</span></li>
                                        ';
                                    }
                                    ?>
                                </ul>
                                <a href="?thutucthanhtoan" class="proceed-btn"  name="subthanhtoan">Tiến Hành Thanh Toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
