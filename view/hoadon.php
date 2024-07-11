<?php
    include_once("controller/cHoaDon.php");
    $p = new cHoaDon();
    if(isset($_SESSION["idnguoidung"])){
        $idnd = $_SESSION["idnguoidung"];
        $con = $p -> getallhoadonbynd($idnd);
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
                <h4 style = 'padding:50px; text-align:center;'><b>HOÁ ĐƠN CỦA BẠN</b></h4>
                <form method='post'>
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
                                <th>Trạng Thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
            ";
            while($r = mysqli_fetch_assoc($con)){
                echo "
                        <tr>
                            <td align='center'>".$r["idhoadon"]."</td>
                            <td>".$r["hovaten"]."</td>
                            <td>".$r["diachi"]."</td>
                            <td>".$r["sdt"]."</td>
                            <td>$".number_format($r["tonggia"],0,",",".")."</td>
                            <td>".$r["ngaylap"]."</td>
                            <td>".$r["pttt"]."</td>";
                if($r["trangthai"]=="Giao hàng thành công"){
                    echo"
                            <td style='color: rgb(16, 150, 33)'> ".$r["trangthai"]."</td>
                        ";
                }elseif($r["trangthai"]=="Huỷ đơn do hết hàng"){
                    echo"
                            <td style='color:red'> ".$r["trangthai"]."</td>";
                }else{
                    echo "
                            <td> ".$r["trangthai"]."</td>";
                }  
                
                echo"       <td align='center' width=95px>
                                <button class='btnxem' type='button'><a href='?chitiethoadon&id=".$r["idhoadon"]."' style='color: white'><i class='fa fa-eye'></i>Xem</a></button> 
                        ";
                if($r["trangthai"]=="Chuẩn bị hàng"){
                    echo "                
                                <button class='btnsua' type='button'><a href='?action=updatehd&id=".$r["idhoadon"]."' style='color: white'><i class='fa fa-pencil-square-o'></i> Sửa</a></button>
                                <button class='btnxoa' type='button'><a href='?action=deletehd&id=".$r["idhoadon"]."&idnd=".$idnd."' style='color: white' onclick = 'return confirm("."\"Bạn Chắc Chắn Muốn Xoá Dữ Liệu\"".");'><i class='fa fa-trash'></i>&nbsp; Huỷ </a></button>  
                    ";
                }elseif($r["trangthai"]=="Huỷ đơn do hết hàng"){
                    echo " 
                                <button class='btnxoa' type='button'><a href='?action=deletehd&id=".$r["idhoadon"]."' style='color: white' onclick = 'return confirm("."\"Bạn Chắc Chắn Muốn Xoá Dữ Liệu\"".");'><i class='fa fa-trash'></i>&nbsp; Huỷ </a></button>  
                    ";
                }else{
                    echo "";
                }
                echo "            
                            </td>
                        </tr>
                    ";
                }
                echo "</tbody></table></form>";
            }
    }else{
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
    }

?>

