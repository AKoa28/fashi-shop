<?php
    include_once("controller/cSanPham.php");
    $p = new clscsanpham();
    if(isset($_GET["th"])){
        $con = $p->getallsanphambytype($_GET["th"]);
    }elseif(isset($_GET["subsearch"])){
        $con = $p->getallsanphambyname($_GET["txttimkiem"]);
    }else{
        $con = $p->getallsanpham();
    }
    
    if(!$con){
        echo "error";
    }else{
        $dem = 0;
        echo "
            <table border='1' width='100%' style='text-align: center;' bgcolor='aaa'>
            <tr>
        ";
        while($r = mysqli_fetch_assoc($con)){
            echo "
                <td ><a href='?admin=updatesp&id=".$r["idsp"]."'><img align='center' src='img/products/".$r['hinhanh']."' width='100px'><br>
                ".$r["tensp"]." <br>";
            if($r["giaban"]==0){
                echo 
                    number_format($r["giagoc"],0,',','.')." $<br>";
            }else{
                echo "
                    <s>".number_format($r["giagoc"],0,',','.')." $</s><br>
                        ".number_format($r["giaban"],0,',','.')." $</a></td>
                ";
            }
            $dem++;
            if($dem % 4==0){
                echo "</tr><tr>";
            }
        }
        echo "
            </table>
        ";
    }


?>

