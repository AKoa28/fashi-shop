<?php
    include_once("controller/cNguoiDung.php");
    $p = new cNguoiDung();
    $con = $p -> getallnguoidung();
    if(isset($_SESSION["dangnhap"]) && $_SESSION["dangnhap"] =='3'){
        echo "<script> alert('Bạn chỉ là nhân viên không đủ quyền truy cập vào đây'); </script>";
        header("refresh:0; url='admin.php?admin'");
    }
    if(!$con){
        echo "error";
    }else{
        echo "
            <form method='post'>
                <table class='table table-striped'  border='1' width='100%'>
                    <thead>
                        <tr align='center'>
                            <th>Mã Người Dùng</th>
                            <th>Tên Đăng Nhập</th>
                            <th>Họ và Tên</th>
                            <th>Phân Quyền</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
        ";

        while($r = mysqli_fetch_assoc($con)){
            echo "
                <tr>
                    <td align='center'>".$r["idnguoidung"]."</td>
                    <td>".$r["tennguoidung"]."</td>
                    <td>".$r["hovaten"]."</td>
                    ";
                    
            if($r["phanquyen"]==1){
                echo "<td style='color:red'>".$r["tenpq"]."</td>";
            }else{
                echo "<td>".$r["tenpq"]."</td>";
            }
            if($r["phanquyen"]==1){
                echo "<td></td>";
            }else{
                echo "
                    <td align='center'>
                        <button class='btnsua' type='button'><a href='?admin=updatend&id=".$r["idnguoidung"]."' style='color: white'><i class='fa fa-pencil-square-o'></i>Sửa</a></button> | ";
            }
            
            if($r["phanquyen"]==1){
                echo "
                        
                ";
            }else{
                echo "
                        <button class='btnxoa' type='button'><a href='?admin=deletend&id=".$r["idnguoidung"]."' style='color: white' onclick = 'return confirm("."\"Bạn Chắc Chắn Muốn Xoá Dữ Liệu\"".");'><i class='fa fa-trash'></i>Xóa</a></button> 
                ";
            }
            echo"        </td>
                </tr>
            ";
        }
        echo "</tbody></table></form>";
    }

?>