<?php
    include_once("ketnoi.php");
    class clsmthuonghieu{
        public function selectallthuonghieu(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "Select * from thuonghieu";
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }

        public function select1thuonghieu($idth){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "Select * from thuonghieu where idth = '$idth'";
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }

        public function updatethuonghieu($idth, $tenth, $diachi){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "update thuonghieu set tenth = N'$tenth', diachi = N'$diachi' where idth = '$idth'";
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }

        public function insertthuonghieu($tenth, $diachi){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "insert into thuonghieu (tenth, diachi) values (N'$tenth', N'$diachi')";
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }

        public function xoadulieu($id)
        {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $con->set_charset('utf8');
            $sql="delete from thuonghieu where idth='$id'";

            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
            
            
        }
    }

?>