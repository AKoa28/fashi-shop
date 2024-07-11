<?php
    include("controller/cSanPham.php");
    $p = new clscsanpham();
    $con = $p -> getallsanpham();
    if(!$con){
        echo "error";
    }else{
        echo "
            <form method='post'>
                <table  border='1' width='100%' >
                    <thead>
                        <tr align='center'>
                            <th>Mã Sản Phẩm</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Gía Gốc</th>
                            <th>Gía Bán</th>
                            <th>Hình Ảnh</th>
                            <th>Thương Hiệu</th>
                            <th>Kích Thước</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
        ";
        while($r = mysqli_fetch_assoc($con)){
            echo "
                <tr>
                    <td align='center'>".$r["idsp"]."</td>
                    <td>".$r["tensp"]."</td>
                      
            ";
            echo "  <td align='end'>".number_format($r["giagoc"],0,',','.')."$</td>
                    <td align='end'>".number_format($r["giaban"],0,',','.')."$</td>";
            
            echo "
                    <td align='center' >"."<img  src='img/products/".$r['hinhanh']."' width='100px'>"."</td>
                    <td>".$r["tenth"]."</td>
                    <td>".$r["kichthuoc"]."</td>
                    <td align='center'><button class='btnsua' type='button'><a href='?admin=updatesp&id=".$r["idsp"]."' style='color: white'><i class='fa fa-pencil-square-o'></i>Sửa</a></button> | <button class='btnxoa' type='button'><a href='?admin=deletesp&id=".$r["idsp"]."' style='color: white' onclick = 'return confirm("."\"Bạn Chắc Chắn Muốn Xoá Dữ Liệu\"".");'><i class='fa fa-trash'></i>Xóa</a></button> </td>
                </tr>
            ";
        }
        echo "</tbody></table></form>";
    }

    // if(isset($_REQUEST["action"]) && $_REQUEST["action"] == "delete")
    // {
    //     $idsp = $_POST["id"];
    //     if($p->xoasanpham($idsp))
    //         echo "<script> alert('xoá Thành Công') </script>";
    //     else
    //         echo "<script> alert('xoá Không thành công') </script>";
    // }
?>

