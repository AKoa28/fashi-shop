<?php
    include_once("controller/cHoaDon.php");
    $p = new cHoaDon();
    $con = $p -> getallhoadon();
    if(!$con){
        echo "Không có dữ liệu";
    }else{
        echo "
            <form method='post' action='?action=updatetthd'>
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
        $trangthaimoi = "";
        while($r = mysqli_fetch_assoc($con)){
            echo "
                    <tr>
                        <td align='center'>".$r["idhoadon"]."</td>
                        <td>".$r["hovaten"]."</td>
                        <td>".$r["diachi"]."</td>
                        <td>".$r["sdt"]."</td>
                        <td>$".number_format($r["tonggia"],0,",",".")."</td>
                        <td>".$r["ngaylap"]."</td>
                        <td>".$r["pttt"]."</td>
                        
                ";
            if($r["trangthai"]=="Giao hàng thành công"){
                echo"
                        <td width=100px ><b> ".$r["trangthai"]."</b></td>
                    ";
            }elseif($r["trangthai"]=="Huỷ đơn do hết hàng"){
                echo"
                        <td width=100px style='color:red'> ".$r["trangthai"]."</td>";
            }elseif($r["trangthai"]=="Chuẩn bị hàng"){
                echo"
                        <td width=100px style='color: rgb(16, 150, 33)'>".$r["trangthai"]."</td>";
            }else{
                echo "
                        <td width=100px> ".$r["trangthai"]."</td>";
            }       
                    
            echo"           
                        <td align='center' width=110px>
                            <button class='btnxem' type='button'><a href='?admin=chitiethoadon&idhd=".$r["idhoadon"]."&idnd=".$r["idnguoidung"]."' style='color: white'><i class='fa fa-eye'></i>Xem</a></button> 
                    ";
           
                echo "                
                            <button class='btnsua' type='submit' name='subtt'><a href='?admin=updatetthd&id=".$r["idhoadon"]."' style='color: white'>Cập nhật</a></button>
                             
                ";
            if($r["trangthai"]=="Huỷ đơn do hết hàng"){
                
                echo "                
                    <button class='btnxoa' type='button'><a href='?admin=deletehd&id=".$r["idhoadon"]."' style='color: white' onclick = 'return confirm("."\"Bạn Chắc Chắn Muốn Xoá Dữ Liệu\"".");'><i class='fa fa-trash'></i>&nbsp; Xoá </a></button>
                ";
            }
            echo "            
                        </td>
                    </tr>
                ";
            }
            echo "</tbody></table></form>";
    }

    

?>


