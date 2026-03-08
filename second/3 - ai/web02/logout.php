<?php
session_start();
unset($_SESSION['login']);
// 這裡使用header("location:'路徑'");
header("location:index.php");