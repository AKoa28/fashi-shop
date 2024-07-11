<?php
    include_once("controller/cHoaDon.php");
    $p = new cHoaDon();
    if(isset($_SESSION["idnguoidung"]) && isset($_REQUEST["id"])){
        $idnd = $_SESSION["idnguoidung"];
        $idhd = $_REQUEST["id"];
        $con = $p -> getallcthoadonbynd($idhd,$idnd);
        if(!$con){
            echo "
                <h4 style = 'padding:50px; text-align:center;'><b>HOÁ ĐƠN CỦA BẠN</b></h4>
                    <table class='table table-striped'  border='1' width='100%'>
                        <thead>
                            <tr align='center'>
                                <th>Mã Hoá Đơn</th>
                                <th>Tên Người Mua</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Tổng Giá</th>
                                <th>Ngày Lập</th>
                                <th>Thanh Toán</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                    </table>
            ";
        }else{
            echo "
                <h4 style = 'padding:50px; text-align:center;'><b>Chi Tiết Hoá Đơn số: ".$idhd."</b></h4>
                <form method='post'>
                    <table class='table table-striped'  border='1' width='100%'>
                        <thead>
                            <tr align='center'>
                                <th>Số Thứ Tự</th>
                                <th>Hình Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Kích Thước</th>
                                <th>Đơn Giá</th>
                                <th>Số Lượng</th>
                                <th>Tổng Giá</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
            ";
            $stt = 1;
            $tt =0;
            while($r = mysqli_fetch_assoc($con)){
                echo "
                    <tr>
                        <td align='center'>".$stt."</td>
                         <td align='center'><img src='img/products/".$r["hinhanh"]."' width='70px'></td>
                        <td>".$r["tensp"]."</td>
                        <td>".$r["kichthuocsp"]."</td>
                    ";
                if($r["giaban"]==0){
                    echo "
                        <td>$".number_format($r["giagoc"],0,",",".")."</td>
                    ";
                }else{
                    echo "
                        <td style='color: red'><s style='color: black'>$".number_format($r["giagoc"],0,",",".")."</s> &nbsp $".number_format($r["giaban"],0,",",".")."</td>
                    ";
                }
                
                echo "
                        <td>".$r["soluong"]."</td>
                        <td>$".number_format($r["thanhtien"],0,",",".")."</td>
                        <td align='center'><button class='btnxem' type='button'><a href='?chitietsanpham&id=".$r["idsp"]."' style='color: white'><i class='fa fa-eye'></i>Xem</a></button></td>
                    </tr>
                ";
                $stt++;
                $tt += $r["thanhtien"];
            }
            echo "</tbody></table></form>";
            echo "<h4 style='text-align: end; margin-right: 40px'>Thành Tiền:  $".number_format($tt,0,",",".")."</h4>";
        }
    }elseif((isset($_SESSION["dangnhap"]) && $_SESSION["dangnhap"] != 2)){
        $idnd = $_REQUEST["idnd"];
        $idhd = $_REQUEST["idhd"];
        $con = $p -> getallcthoadonbynd($idhd,$idnd);
        if(!$con){
            echo "
                <h4 style = 'padding:50px; text-align:center;'><b>HOÁ ĐƠN CỦA BẠN</b></h4>
                    <table class='table table-striped'  border='1' width='100%'>
                        <thead>
                            <tr align='center'>
                                <th>Mã Hoá Đơn</th>
                                <th>Tên Người Mua</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Tổng Giá</th>
                                <th>Ngày Lập</th>
                                <th>Thanh Toán</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                    </table>
            ";
        }else{
            echo "
                <h4 style = 'padding:50px; text-align:center;'><b>Chi Tiết Hoá Đơn số: ".$idhd."</b></h4>
                <form method='post'>
                    <table class='table table-striped'  border='1' width='100%'>
                        <thead>
                            <tr align='center'>
                                <th>Số Thứ Tự</th>
                                <th>Hình Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Kích Thước</th>
                                <th>Đơn Giá</th>
                                <th>Số Lượng</th>
                                <th>Tổng Giá</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
            ";
            $stt = 1;
            $tt =0;
            while($r = mysqli_fetch_assoc($con)){
                echo "
                    <tr>
                        <td align='center'>".$stt."</td>
                         <td align='center'><img src='img/products/".$r["hinhanh"]."' width='70px'></td>
                        <td>".$r["tensp"]."</td>
                        <td>".$r["kichthuocsp"]."</td>
                    ";
                if($r["giaban"]==0){
                    echo "
                        <td>$".number_format($r["giagoc"],0,",",".")."</td>
                    ";
                }else{
                    echo "
                        <td style='color: red'><s style='color: black'>$".number_format($r["giagoc"],0,",",".")."</s> &nbsp $".number_format($r["giaban"],0,",",".")."</td>
                    ";
                }
                
                echo "
                        <td>".$r["soluong"]."</td>
                        <td>$".number_format($r["thanhtien"],0,",",".")."</td>
                        <td align='center'><button class='btnxem' type='button'><a href='?chitietsanpham&id=".$r["idsp"]."' style='color: white'><i class='fa fa-eye'></i>Xem</a></button></td>
                    </tr>
                ";
                $stt++;
                $tt += $r["thanhtien"];
            }
            echo "</tbody></table></form>";
            echo "<h4 style='text-align: end; margin-right: 40px'>Thành Tiền:  $".number_format($tt,0,",",".")."</h4>";
        }
    }else{
        echo "
            <h4 style = 'padding:50px; text-align:center;'><b>HOÁ ĐƠN CỦA BẠN</b></h4>
                <table class='table table-striped'  border='1' width='100%'>
                    <thead>
                            <tr align='center'>
                                <th>Số Thứ Tự</th>
                                <th>Tên Người Mua</th>
                                <th>Kích Thước</th>
                                <th>Đơn Giá</th>
                                <th>Số Lượng</th>
                                <th>Tổng Giá</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                </table>
                
        ";
    }

?>

