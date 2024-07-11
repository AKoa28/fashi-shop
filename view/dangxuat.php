<?php
    session_start();
    // session_destroy();
    unset($_SESSION["dangnhap"]);
    unset($_SESSION["dangnhapthanhtoan"]);
    unset($_SESSION["idnguoidung"]);
    header("refresh:0;url='../index.php'");
?>