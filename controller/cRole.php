<?php
    include("model/mRole.php");
    class clscrole{
        public function getallrole(){
            $p = new clsmrole();
            $con = $p->selectallrole();
            if(mysqli_num_rows($con)>0){
                return $con;
            }else{
                return false;
            }
        }

        
    }
?>