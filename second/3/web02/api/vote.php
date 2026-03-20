<?php
include_once "db.php";

// $option=$Que->find($_POST['id']);
// $option['vote']++;
// $Que->save($option);

// 計算各題的總票數
// $subject=$Que->find($option['main_id']);
// $subject['vote']++;
// $Que->save($subject);

// foreach 就是「逐一處理」的意思
// [$_POST['id'], $_POST['main_id']] 是一個陣列，裡面放了兩個值：
//   - $_POST['id']      → 使用者投票的「選項」的 ID（從表單送過來的）
//   - $_POST['main_id'] → 那個選項所屬的「題目」的 ID（也是從表單送過來的）
// as $id 表示每次迴圈執行時，把當前的值放進 $id 這個變數
foreach ([$_POST['id'], $_POST['main_id']] as $id) {
    // 用 $id 去資料庫查詢，把找到的那筆資料存進 $row
    $row = $Que->find($id);
    // 把這筆資料的 vote 欄位（票數）加 1
    // ++ 就是「在原本的數字上 +1」的簡寫    
    $row['vote']++;
    // 把剛才修改過（票數 +1）的資料存回資料庫    
    $Que->save($row);
}

// 路徑要寫正確
// header("location: ../index.php?do=result&id=" . $_POST['main_id']);
to("../index.php?do=result&id=" . $_POST['main_id']);
