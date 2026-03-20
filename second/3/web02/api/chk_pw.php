<?php
include_once "db.php";

// 這裡用$_GET
echo $chk=$Mem->count(['acc'=>$_GET['acc'],'pw'=>$_GET['pw']]);

if($chk>0){
    $_SESSION['login']=$_GET['acc'];
}