<?php
include_once "db.php";

// $option=$Que->find($_POST['id']);
// $option['vote']++;
// $Que->save($option);

// 計算各題的總票數
// $subject=$Que->find($option['main_id']);
// $subject['vote']++;
// $Que->save($subject);

foreach([$_POST['id'],$_POST['main_id']] as $id){
    $row=$Que->find($id);
    $row['vote']++;
    $Que->save($row);
}

// 路徑要寫正確
// header("location: ../index.php?do=result&id=" . $_POST['main_id']);
to("../index.php?do=result&id=" . $_POST['main_id']);