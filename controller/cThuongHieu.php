<?php
    include("model/mThuongHieu.php");
    class clscthuonghieu{
        public function getallthuonghieu(){
            $p = new clsmthuonghieu();
            $con = $p->selectallthuonghieu();
            if(mysqli_num_rows($con)>0){
                return $con;
            }else{
                return false;
            }
        }
        public function get1thuonghieu($idth){
            $p = new clsmthuonghieu();
            $con = $p->select1thuonghieu($idth);
            if(mysqli_num_rows($con)>0){
                return $con;
            }else{
                return false;
            }
        }
        public function updateth($math, $tenth, $diachi){
            $p = new clsmthuonghieu();
            $kq = $p->updatethuonghieu($math, $tenth, $diachi);
            return $kq;

        }
        public function insertth($tenth, $diachi){
            $p = new clsmthuonghieu();
            $kq = $p->insertthuonghieu($tenth, $diachi);
            return $kq;

        }
        public function xoathuonghieu($id){
            $p = new clsmthuonghieu();
            $con = $p->xoadulieu($id);
            return $con;
        }
    }

?>