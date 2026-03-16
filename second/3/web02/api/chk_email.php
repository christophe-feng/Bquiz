<?php
include_once "db.php";

// 還不熟悉
// 要用$_GET
$chk=$Mem->find(['email'=>$_GET['email']]);

// $chk傳出來的是陣列，不是數字
if(!empty($chk)){
    echo "您的密碼為：" . $chk['pw'];
    // $msg= "您的密碼為：" . $chk['pw'];
}else{
    echo "查無此資料";
    // $msg= "查無此資料";
}

// 用form表單要將結果傳回前台
// to("../index.php?do=forgot&res=" . urlencode($msg));
// exit();