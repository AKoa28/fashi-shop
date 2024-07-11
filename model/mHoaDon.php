<?php
    include_once("ketnoi.php");
    class mHoaDon{
        public function taohoadon($iduser,$dcdh,$sdtdh,$total,$date,$ptttdh,$trangthai){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "insert into `hoadon`(`idnguoidung`, `diachi`, `sdt`, `tonggia`, `ngaylap`, `pttt`, `trangthai`) VALUES ($iduser,N'$dcdh','$sdtdh',$total,'$date',N'$ptttdh',N'$trangthai')";
            $th = $con->query($sql);
            $p->dongketnoi($con);
            return $th;      
        }
        public function selecthoadonmoilap(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "select * FROM hoadon ORDER BY idhoadon DESC LIMIT 1";
            $th = $con->query($sql);
            $p->dongketnoi($con);
            return $th;      
        }
        public function selectallhoadon(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "select * FROM hoadon h join nguoidung n on h.idnguoidung = n.idnguoidung ORDER BY idhoadon asc";
            $th = $con->query($sql);
            $p->dongketnoi($con);
            return $th;      
        }
        public function taochitiethoadon($idhoadon,$idsp,$soluong,$thanhtien,$kichthuoc){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "insert INTO `chitiethoadon` (`idhoadon`, `idsp`, `kichthuocsp`, `soluong`, `thanhtien`) VALUES ($idhoadon,$idsp,'$kichthuoc',$soluong,$thanhtien)";
            $th = $con->query($sql);
            $p->dongketnoi($con);
            return $th;      
        }
        public function selectallhoadonbynd($id){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            // $sql = "select n.*, d.hovaten from hoadon n join chitiethoadon r on n.idhoadon = r.idhoadon join nguoidung d on n.idnguoidung = d.idnguoidung where n.idnguoidung='$id'";
            $sql = "select n.*, d.hovaten from hoadon n join nguoidung d on n.idnguoidung = d.idnguoidung where n.idnguoidung='$id'";

            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }
        public function selectallcthoadonbynd($idhd,$idnd){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "select r.*, d.hovaten, p.tensp, p.giaban, p.giagoc, p.hinhanh from hoadon n join chitiethoadon r on n.idhoadon = r.idhoadon join nguoidung d on n.idnguoidung = d.idnguoidung join sanpham p on r.idsp = p.idsp where n.idnguoidung='$idnd' and n.idhoadon='$idhd'";

            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }

        public function select1hoadon($idhd){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "Select * from hoadon where idhoadon = '$idhd'";
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }
        // public function registerhoadon($name,$pass,$phanquyen,$sdt){
        //     $p = new clsketnoi();
        //     $con = $p->moketnoi();
        //     $sql = "insert into hoadon (tenhoadon, matkhau, phanquyen, sdt) values (N'$name', md5('$pass'), '$phanquyen', '$sdt')";
        //     $th = $con->query($sql);
        //     $p->dongketnoi($con);
        //     return $th;      
        // }
        public function updatehoadon($mahd, $diachi, $sdt, $pttt){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "update hoadon set diachi = N'$diachi', sdt = '$sdt', pttt = '$pttt' where idhoadon = '$mahd'";
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }
        public function updatechitiethoadon($mahd, $tt){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "update hoadon set trangthai = N'$tt' where idhoadon = '$mahd'";
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }
        // public function inserthoadon($tennd, $pass,$phanquyen, $sdt){
        //     $p = new clsketnoi();
        //     $con = $p->moketnoi();
        //     $sql = "insert into hoadon (tenhoadon, matkhau, phanquyen, sdt) values (N'$tennd', md5('$pass'), $phanquyen, $sdt)";
        //     $kq = mysqli_query($con,$sql);
        //     $p -> dongketnoi($con);
        //     return $kq;
        // }
        public function xoadulieu($id)
        {
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $con->set_charset('utf8');
            $sql="delete from hoadon where idhoadon ='$id'";
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;   
        }
    }

?>