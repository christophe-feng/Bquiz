<?php
include_once "db.php";

// 【判斷使用者有沒有送出刪除請求】
if(!empty($_POST['del'])){
    // 【逐一處理每個要刪除的項目】
    foreach($_POST['del'] as $id){
        // 【執行刪除動作】
        $Mem->del($id);
    }
}

// 【刪除完畢，跳轉回管理頁面】
to("../back.php?do=admin");