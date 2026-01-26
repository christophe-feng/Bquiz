<?php
include_once "db.php";

$_POST['movie']=$Movie->find($_POST['movie'])['name'];
$_POST['session']=$duration[$_POST['session']];
$_POST['no']=date("Ymd").sprintf("%04d",$Order->max('id')+1);
$_POST['qt']=count($_POST['seats']);
sort($_POST['seats']);
$_POST['seat']=serialize($_POST['seats']);

// dd($_POST);

$Order->save($_POST);

?>