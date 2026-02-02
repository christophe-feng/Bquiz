<?php include_once "db.php";

if($Admin->count($_GET)){
    echo 1;
    $_SESSION['mem']=$_GET['acc'];
}else{
    echo 0;
}

// echo $Mem->count($_GET);