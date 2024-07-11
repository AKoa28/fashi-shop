<?php
    include_once("ketnoi.php");    
    class clsmrole{
        public function selectallrole(){
            $p = new clsketnoi();
            $con = $p->moketnoi();
            $sql = "Select * from role";
            $kq = mysqli_query($con,$sql);
            $p -> dongketnoi($con);
            return $kq;
        }
    }
?>