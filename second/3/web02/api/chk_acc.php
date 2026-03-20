<?php
include_once "db.php";

// 查詢資料庫，看看某個帳號存不存在，然後把結果印出來。
echo $Mem->count(['acc'=>$_GET['acc']]);