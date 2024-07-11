<?php
    include_once("controller/cRole.php");
    $p = new clscrole();
    $con = $p -> getallrole();
    if(!$con){
        echo "error";
    }else{
        echo "
            <form method='post'>
                <table class='table table-striped'  border='1' width='100%'>
                    <thead>
                        <tr align='center'>
                            <th>Mã Role</th>
                            <th>Vai trò</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
        ";
        while($r = mysqli_fetch_assoc($con)){
            echo "
                <tr>
                    <td align='center'>".$r["idrole"]."</td>
                    <td>".$r["phanquyen"]."</td>
                    <td align='center'><button class='btnsua' type='button'><a href='?admin=updaterole&id=".$r["idrole"]."' style='color: white'><i class='fa fa-pencil-square-o'></i>Sửa</a></button> | <button class='btnxoa' type='button'><a href='?admin=deleterole&id=".$r["idrole"]."' style='color: white' onclick = 'return confirm("."\"Bạn Chắc Chắn Muốn Xoá Dữ Liệu\"".");'><i class='fa fa-trash'></i>Xóa</a></button> </td>
                </tr>
            ";
        }
        echo "</tbody></table></form>";
    }

?>

