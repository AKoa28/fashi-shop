<?php
    include_once("model/mSanPham.php");
    include_once("upload.php");
    class clscsanpham{
        public function getallsanpham(){
            $p = new clsmsanpham();
            $con = $p->selectallsanpham();
            if(mysqli_num_rows($con)>0){
                return $con;
            }else{
                return false;
            }
        }
        public function get1sanpham($masp){
            $p = new clsmsanpham();
            $con = $p->select1sanpham($masp);
            if(mysqli_num_rows($con)>0){
                return $con;
            }else{
                return false;
            }
        }
        public function getallsanphambytype($type){
            $p = new clsmsanpham();
            $con = $p->selectallsanphambytype($type);
            if(mysqli_num_rows($con)>0){
                return $con;
            }else{
                return false;
            }
        }
        public function getallsanphambyname($name){
            $p = new clsmsanpham();
            $con = $p->selectallsanphambyname($name);
            if(mysqli_num_rows($con)>0){
                return $con;
            }else{
                return false;
            }
        }
        // public function uploadhinhanh($file){
        //     $p = new clskiemtraupload();
        //     $kq = $p->uploadhinh($file);
            
        //     if($kq){
        //         return true;
        //     }else{
        //         return false;
        //     }
        // }
        public function updatesp($masp, $tensp, $giagoc, $giaban, $filehinh, $hinh, $thuonghieu, $sizes){
            if($filehinh["tmp_name"]!=""){
                $p = new clskiemtraupload();
                $kq = $p->uploadhinh($filehinh, $tensp, $hinh);
                if(!$kq){
                    return false;
                }
            }
            $p = new clsmsanpham();
            $kq = $p->updatesanpham($masp, $tensp, $giagoc, $giaban, $hinh, $thuonghieu, $sizes);
            return $kq;

        }
        public function insertsp($tensp, $giagoc, $giaban, $filehinh, $thuonghieu, $sizes){
            if($filehinh["tmp_name"]!=""){
                $p = new clskiemtraupload();
                $kq = $p->uploadhinh($filehinh, $tensp,$filehinh);
                if(!$kq){
                    return false;
                }
            }
            
            $p = new clsmsanpham();
            $kq = $p->insertsanpham($tensp, $giagoc, $giaban,$filehinh, $thuonghieu, $sizes);
            return $kq;

        }
        public function xoasanpham($id){
            $p = new clsmsanpham();
            $con = $p->xoadulieu($id);
            return $con;
        }
    }

?>