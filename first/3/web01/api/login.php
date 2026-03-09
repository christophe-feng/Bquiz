<?php
include_once "db.php";

// 還不熟悉
$chk=$Admin->count($_POST);

if($chk){
    $_SESIION['admin']=$_POST['acc'];
    to("../back.php");
}
?>
<script>
    alert("帳號或密碼輸入錯誤");
    location.href="../index.php?do=login";
</script>