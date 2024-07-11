<?php
    include_once("ketnoi.php");
    class clsmsanpham{
        public function selectallsanpham(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "Select * from sanpham s join thuonghieu t on s.idth = t.idth ORDER BY s.idsp asc";
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }

        public function select1sanpham($idsp){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "Select * from sanpham s join thuonghieu t on s.idth = t.idth where idsp = '$idsp'";
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }

        public function selectallsanphambytype($type){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "Select * from sanpham s join thuonghieu t on s.idth = t.idth where t.idth = '$type'";
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }

        public function selectallsanphambyname($name){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "Select * from sanpham s join thuonghieu t on s.idth = t.idth where s.tensp like N'%$name%'";
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }

        public function updatesanpham($idsp, $tensp, $giagoc, $giaban, $hinhanh, $thuonghieu, $sizes){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($giaban == null){
                $sql = "update sanpham set tensp = N'$tensp', giagoc = $giagoc, giaban = null, hinhanh = '$hinhanh', idth = '$thuonghieu', kichthuoc ='$sizes' where idsp = '$idsp'";
            }else{
                $sql = "update sanpham set tensp = N'$tensp', giagoc = $giagoc, giaban = $giaban, hinhanh = '$hinhanh', idth = '$thuonghieu', kichthuoc ='$sizes' where idsp = '$idsp'";
            }
            
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }

        public function insertsanpham($tensp, $giagoc, $giaban, $hinhanh, $thuonghieu, $sizes){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            if($giaban == null){
                $sql = "insert into sanpham (tensp, giagoc, giaban, hinhanh, idth, kichthuoc) values (N'$tensp', $giagoc, 'NULL', '$hinhanh', '$thuonghieu', '$sizes')";
            }else{
                $sql = "insert into sanpham (tensp, giagoc, giaban, hinhanh, idth, kichthuoc) values (N'$tensp', $giagoc, $giaban, '$hinhanh', '$thuonghieu', '$sizes')";
            }
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }
        public function xoadulieu($id)
        {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $con->set_charset('utf8');
            $sql="delete from sanpham where idsp='$id'";

            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
            
            
        }
        // public function updateSanPham($idsp, $tensp, $giagoc, $giaban, $hinhanh, $thuongHieu){
        //     $p = new clsketnoi();
        //     if($giaban == null){
        //         $sql = "update sanpham set tensp = N'$tensp', giagoc = $giagoc, giaban = null, hinhanh = '$hinhanh', idth = $thuongHieu where idsp = $idsp";
        //     }else{
        //         $sql = "update sanpham set tensp = N'$tensp', giagoc = $giagoc, giaban = $giaban, hinhanh = '$hinhanh', idth = $thuongHieu where idsp = $idsp";
        //     }
        //     $con = $p->moketnoi();
        //     $kq = $con->query($sql);
        //     $p->dongKetNoi($con);
        //     return $kq;
        // }
    }

?>
