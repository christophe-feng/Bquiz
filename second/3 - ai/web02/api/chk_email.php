<?php
include_once "db.php";

// 還不熟悉
// 要用$_GET
$chk=$Mem->find(['email'=>$_GET['email']]);

if($chk>0){
    echo "您的密碼為：" . $chk['pw'];
}else{
    echo "查無此資料";
}