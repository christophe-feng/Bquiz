<?php
include_once "db.php";

// 去資料庫查詢符合條件的資料
// 要用$_GET
$chk=$Mem->find(['email'=>$_GET['email']]);

// 判斷 $chk 是不是「有內容的」
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