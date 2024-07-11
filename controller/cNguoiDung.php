<?php


include_once("model/mNguoiDung.php");
class cNguoiDung{
    public function getnguoidung($name,$pass){
        $pass = md5($pass);
        $p = new mNguoiDung();
        $con = $p->nguoidung($name,$pass);
        if (mysqli_num_rows($con) > 0) {
            while ($r = mysqli_fetch_assoc($con)) {
                $_SESSION["dangnhap"] = $r["phanquyen"];
                $_SESSION["idnguoidung"] = $r["idnguoidung"];
                $_SESSION["tennguoidung"] = $r["tennguoidung"];
            }
            if($_SESSION["dangnhap"] == 1){
                echo "<script> alert('Chào mừng Quản Trị Viên'); </script>";
                header("refresh:0; url= 'admin.php?admin'");
            }elseif($_SESSION["dangnhap"] == 3){
                echo "<script> alert('Anh/Chị đã đăng nhập thành công'); </script>";
                header("refresh:0; url= 'admin.php?admin'");
            }elseif($_SESSION["dangnhapthanhtoan"] != 0){
                echo "<script> alert('Anh/Chị đã đăng nhập thành công'); </script>";
                header("refresh:0; url= '?thutucthanhtoan'");
            }else{
                echo "<script> alert('Quý khách đã đăng nhập thành công'); </script>";
                header("refresh:0; url= 'index.php'");
            }
            ob_end_flush();
            exit();
        } else {
            echo "<script> alert('Đăng nhập thất bại'); </script>";
            header("refresh:0; url= '?login'");
            ob_end_flush();
            exit();
        }
    }
    public function get1nguoidung($id){
        $p = new mNguoiDung();
        $con = $p -> s1nguoidung($id);
        if(mysqli_num_rows($con)>0){
            return $con;
        }else{
            return false;
        }
    }

    public function getallnguoidung(){
        $p = new mNguoiDung();
        $con = $p -> selectallnguoidung();
        if(mysqli_num_rows($con)>0){
            return $con;
        }else{
            return false;
        }
    }

    public function getcountallquantri(){
        $p = new mNguoiDung();
        $con = $p -> countallquantri();
        if(mysqli_num_rows($con)>0){
            return $con;
        }else{
            return false;
        }
    }
    public function getregisternguoidung($name,$pass,$hovaten){
        $phanquyen = '2';
        $p = new mNguoiDung();
        $con = $p->registernguoidung($name,$pass,$phanquyen,$hovaten);
        if ($con) {
            echo "<script>alert('Đăng ký thành công');</script>";
            header("refresh:0; url= '?login'");
            ob_end_flush();
            exit();
        } else {
            echo "<script>alert('Đăng ký thất bại');</script>";
            header("refresh:0; url= '?register'");
            ob_end_flush();
            exit();
        }
    }
    public function updatend($mand, $tennd, $hovaten, $phanquyen){
        $p = new mNguoiDung();
        $kq = $p->updatenguoidung($mand, $tennd, $hovaten, $phanquyen);
        return $kq;

    }

    public function insertnd($tennd, $pass ,$phanquyen, $hovaten){
        $p = new mNguoiDung();
        $kq = $p->insertnguoidung($tennd, $pass, $phanquyen, $hovaten);
        return $kq;
        
       
    }
    public function xoanguoidung($id){
        $p = new mNguoiDung();
        $con = $p->xoadulieu($id);
        return $con;
    }
}
?>