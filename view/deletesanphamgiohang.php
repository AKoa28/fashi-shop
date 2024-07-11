<?php
    if(isset($_SESSION["giohang"])){
        if(isset($_REQUEST["delete1sanphamgiohang"])){
            $u = $_REQUEST["id"];
            array_splice($_SESSION["giohang"], $u, 1);
            $_SESSION["soluongchon"] -= 1;
            header("refresh:0; url='?giohang'");
            // foreach($_SESSION["giohang"] as $i){
            //     print_r($_SESSION["giohang"]);
            // }
            // var_dump($_SESSION["giohang"]);
        }elseif(isset($_REQUEST["deletegiohang"])){
            unset($_SESSION["giohang"]);
            unset($_SESSION["soluongchon"]);
            unset($_SESSION["idspgiohang"]);
            header("refresh:0; url='?shop'");
        }else{
            header("refresh:0; url='index.php'");
        }
    }else{
        header("refresh:0; url='index.php'");
    }

?>