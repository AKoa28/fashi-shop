<?php

class clsketnoi{
    public function moketnoi(){
        return mysqli_connect("localhost", "root", "", "quanao");
    }
    public function dongketnoi($con){
        mysqli_close($con);
    }
}
?>