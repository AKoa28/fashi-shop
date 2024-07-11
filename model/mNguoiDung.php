<?php
    include_once("ketnoi.php");
    class mNguoiDung{
        public function nguoidung($name,$pass){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "select * from nguoidung where tennguoidung = '$name' and matkhau = '$pass'";
            $th = $con->query($sql);
            $p->dongketnoi($con);
            return $th;      
        }
        public function selectallnguoidung(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "select n.*, r.phanquyen as tenpq from nguoidung n join role r on n.phanquyen = r.idrole";
            $th = $con->query($sql);
            $p->dongketnoi($con);
            return $th;      
        }
        public function countallquantri(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "select COUNT(phanquyen) as countpq from nguoidung WHERE phanquyen = 1";
            $th = $con->query($sql);
            $p->dongketnoi($con);
            return $th;      
        }
        public function s1nguoidung($idnguoidung){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "select n.*, r.phanquyen as tenpq from nguoidung n join role r on n.phanquyen = r.idrole where idnguoidung = '$idnguoidung'";
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }
        public function registernguoidung($name,$pass,$phanquyen,$hovaten){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            // $sql = "insert into nguoidung (tennguoidung, matkhau, phanquyen, sdt) values (N'$name', md5('$pass'), '$phanquyen', '$sdt')";
            $sql = "insert into nguoidung (tennguoidung, hovaten, matkhau, phanquyen) values (N'$name',N'$hovaten', md5('$pass'), '$phanquyen')";

            $th = $con->query($sql);
            $p->dongketnoi($con);
            return $th;      
        }
        public function updatenguoidung($idnguoidung, $tennguoidung, $hovaten, $phanquyen){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            // $sql = "update nguoidung set tennguoidung = N'$tennguoidung', phanquyen = $phanquyen, sdt = $sdt where idnguoidung = '$idnguoidung'";
            $sql = "update nguoidung set tennguoidung = N'$tennguoidung',hovaten = N'$hovaten', phanquyen = $phanquyen where idnguoidung = '$idnguoidung'";
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }
        public function insertnguoidung($tennd, $pass,$phanquyen, $hovaten){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            // $sql = "insert into nguoidung (tennguoidung, matkhau, phanquyen, sdt) values (N'$tennd', md5('$pass'), $phanquyen, $sdt)";
            $sql = "insert into nguoidung (tennguoidung, hovaten, matkhau, phanquyen) values (N'$tennd',N'$hovaten', md5('$pass'), '$phanquyen')";
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            if($kq){
                return true;
            }else{
                return false;
            }
            
        }
    
        public function xoadulieu($id)
        {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $con->set_charset('utf8');
            $sql="delete from nguoidung where idnguoidung ='$id'";
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
            
            
        }
    }

?>