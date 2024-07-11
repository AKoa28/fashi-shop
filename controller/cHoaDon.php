<?php


include_once("model/mHoaDon.php");
class cHoaDon{
    public function gettaohoadon($iduser,$dcdh,$sdtdh,$total,$date,$ptttdh,$trangthai){
        if($ptttdh==1){
            $ptttdh = "Thanh toán khi nhận hàng";
        }else{
            $ptttdh = "Thanh toán chuyển khoản";
        }
        $p = new mHoaDon();
        $con = $p->taohoadon($iduser,$dcdh,$sdtdh,$total,$date,$ptttdh,$trangthai);
        if($con){
            $conn = $p->selecthoadonmoilap();
            if (mysqli_num_rows($conn) > 0) {
                while ($r = mysqli_fetch_assoc($conn)) {
                    $_SESSION["idhoadon"] = $r["idhoadon"];
                }
                for($i = 0; $i < sizeof($_SESSION["idspgiohang"]); $i++){
                    $taochitiethoadon = $this ->gettaochitiethoadon($_SESSION["idhoadon"],$_SESSION["idspgiohang"][$i][0],$_SESSION["idspgiohang"][$i][1],$_SESSION["idspgiohang"][$i][2],$_SESSION["idspgiohang"][$i][3]);
                    if(!$taochitiethoadon){
                        return false;
                    }
                }

                echo "<script>alert('Bạn Đã Đặt Hàng Thành Công')</script>";
                header("refresh:0; url='?deletegiohang'");
                ob_end_flush();
                exit();
            } else {
                echo "<script> alert('Bạn Đã Đặt Hàng thất bại'); </script>";
                header("refresh:0; url= '?thutucthanhtoan'");
                ob_end_flush();
                exit();
            }
            
        }
    }

    public function gettaochitiethoadon($idhoadon,$idsp,$soluong,$thanhtien,$kichthuoc){
        $p = new mHoaDon();
        $con = $p -> taochitiethoadon($idhoadon,$idsp,$soluong,$thanhtien,$kichthuoc);
        if($con){
            return $con;
        }else{
            return false;
        }
    }
    public function getallhoadon(){
        $p = new mHoaDon();
        $con = $p -> selectallhoadon();
        if(mysqli_num_rows($con)>0){
            return $con;
        }else{
            return false;
        }
    }
    public function getallhoadonbynd($id){
        $p = new mHoaDon();
        $con = $p -> selectallhoadonbynd($id);
        if(mysqli_num_rows($con)>0){
            return $con;
        }else{
            return false;
        }
    }
    public function getallcthoadonbynd($idhd,$idnd){
        $p = new mHoaDon();
        $con = $p -> selectallcthoadonbynd($idhd,$idnd);
        if(mysqli_num_rows($con)>0){
            return $con;
        }else{
            return false;
        }
    }

    public function get1hoadon($idhd){
        $p = new mHoaDon();
        $con = $p->select1hoadon($idhd);
        if(mysqli_num_rows($con)>0){
            return $con;
        }else{
            return false;
        }
    }
    // public function getcountallquantri(){
    //     $p = new mHoaDon();
    //     $con = $p -> countallquantri();
    //     if(mysqli_num_rows($con)>0){
    //         return $con;
    //     }else{
    //         return false;
    //     }
    // }
    // public function getregisterHoaDon($name,$pass,$sdt){
    //     $phanquyen = '2';
    //     $p = new mHoaDon();
    //     $con = $p->registerHoaDon($name,$pass,$phanquyen,$sdt);
    //     if ($con) {
    //         echo "<script>alert('Đăng ký thành công');</script>";
    //         header("refresh:0; url= '?login'");
    //         ob_end_flush();
    //         exit();
    //     } else {
    //         echo "<script>alert('Đăng ký thất bại');</script>";
    //         header("refresh:0; url= '?register'");
    //         ob_end_flush();
    //         exit();
    //     }
    // }
    public function updatehd($mahd, $diachi, $sdt, $pttt){
        if($pttt==1){
            $pttt = "Thanh toán khi nhận hàng";
        }else{
            $pttt = "Thanh toán chuyển khoản";
        }
        $p = new mHoaDon();
        $kq = $p->updatehoadon($mahd, $diachi, $sdt, $pttt);
        return $kq;

    }
    public function updatecthd($mahd,$tt){
        $p = new mHoaDon();
        $kq = $p->updatechitiethoadon($mahd,$tt);
        return $kq;

    }
    // public function insertnd($tennd, $pass ,$phanquyen, $sdt){
    //     $p = new mHoaDon();
    //     $kq = $p->insertHoaDon($tennd, $pass, $phanquyen, $sdt);
    //     return $kq;

    // }
    public function xoahoadon($id){
        $p = new mHoaDon();
        $con = $p->xoadulieu($id);
        return $con;
    }
}
?>