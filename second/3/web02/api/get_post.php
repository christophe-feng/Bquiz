<?php
include_once "db.php";

// 還不熟悉
$post=$Post->find($_GET['id']);
echo nl2br($post['text']);