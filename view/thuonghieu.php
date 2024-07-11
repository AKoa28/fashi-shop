
<?php
    include_once("controller/cThuongHieu.php");
    if(isset($_REQUEST['th'])){
        $math = $_REQUEST['th'];
    }else{
        $math = 0;
    }
    $p = new clscthuonghieu();
    $con = $p -> getallthuonghieu();
    if(!$con){
        echo "error";
    }else{
        echo '<ul class="depart-hover">';
        while($r = mysqli_fetch_assoc($con)){
            if(isset($_GET["admin"])){
                if($r["idth"] == $math){
                    echo "<li class='active'><a href='?admin&th=".$r["idth"]."'>".$r["tenth"]."</a></li>";
                }else{
                    echo "<li class=><a href='?admin&th=".$r["idth"]."'>".$r["tenth"]."</a></li>";
                }
            }else{
                if($r["idth"] == $math){
                    echo "<li class='active'><a href='?th=".$r["idth"]."'>".$r["tenth"]."</a></li>";
                }else{
                    echo "<li class=><a href='?th=".$r["idth"]."'>".$r["tenth"]."</a></li>";
                }
            }
            
            
        }
        echo "</ul>";
    }

?>