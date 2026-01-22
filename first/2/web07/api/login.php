<?php
include_once "db.php";

if($chk){
    $_SESSION['admin']=$_POST['acc'];
    to("../back.php");
}
?>
<script>
    alert("帳號或密碼錯誤");
    location.href="../login.php";
</script>