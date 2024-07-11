<?php
    include_once("controller/cThuongHieu.php");
    $p = new clscthuonghieu();
    $con = $p -> getallthuonghieu();
    if(!$con){
        echo "error";
    }else{
        echo "
            <form method='post'>
                <table class='table table-striped'  border='1' width='100%'>
                    <thead>
                        <tr align='center'>
                            <th>Mã thương hiệu</th>
                            <th>Tên thương hiệu</th>
                            <th>Địa chỉ</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
        ";
        while($r = mysqli_fetch_assoc($con)){
            echo "
                <tr>
                    <td align='center'>".$r["idth"]."</td>
                    <td>".$r["tenth"]."</td>
                    <td>".$r["diachi"]."</td>
                    <td align='center'><button class='btnsua' type='button'><a href='?admin=updateth&id=".$r["idth"]."' style='color: white'><i class='fa fa-pencil-square-o'></i>Sửa</a></button> | <button class='btnxoa' type='button'><a href='?admin=deleteth&id=".$r["idth"]."' style='color: white' onclick = 'return confirm("."\"Bạn Chắc Chắn Muốn Xoá Dữ Liệu\"".");'><i class='fa fa-trash'></i>Xóa</a></button> </td>
                </tr>
            ";
        }
        echo "</tbody></table></form>";
    }

?>



<?php
    include_once("controller/cSanPham.php");
    $ps = new clscsanpham();
    $conn = $ps -> getallsanpham();
    if(isset($_REQUEST["subinsert"])){
        $array = [];
        if (!empty($_POST['size'])) {
            // Chuyển đổi mảng thành chuỗi
            $sizes = implode(",", $_REQUEST['size']);
        }
        if($conn){
            while($r = mysqli_fetch_assoc($conn)){
                $array[] = $r["tensp"];
            }
        }
        if(in_array($_REQUEST["txttensp"],$array)){
            echo "<script>alert('Tên sản phẩm tồn tại');</script>";
        }else{
            
            $pu = new clscsanpham();
            $kq = $pu->insertsp($_REQUEST["txttensp"], $_REQUEST["txtgiagoc"], $_REQUEST["txtgiaban"], $_FILES["txthinhanh"], $_REQUEST["cboThuongHieu"], $sizes);
            if($kq){
                echo "<script>alert('Thêm sản phẩm thành công');</script>";
            }else{
                echo "<script>alert('Thêm sản phẩm thất bại');</script>";
            }
            
        }
    }
    $name = $_POST["txtten"];
    if($con){
        if($ten != $name){
            while($r = mysqli_fetch_assoc($conn)){
                if($r["tennguoidung"]==$name){
                    $xacnhan = $r["tennguoidung"];
                    break;
                }
            }
        }
        
    }else{
        echo "error1";
    }
    if($xacnhan){
        echo "<script>alert('Tên tài khoản đã được sử dụng')</script>";
    }else{}
?>