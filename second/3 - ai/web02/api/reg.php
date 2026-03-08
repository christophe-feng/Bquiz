<?php
include_once "db.php";

// 要注意是用$_POST
unset($_POST['pw2']);
echo $Mem->save($_POST);