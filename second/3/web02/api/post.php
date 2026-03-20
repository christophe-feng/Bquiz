<?php
include_once "db.php";

// 用迴圈逐一處理表單送來的每一個 id
// $_POST['id'] 是一個陣列，裡面裝著所有被勾選項目的 id 編號
foreach ($_POST['id'] as $id) {
    // 【判斷這筆資料是否要「刪除」】
    // 條件一：$_POST['del'] 不能是空的（代表使用者有勾選要刪除的項目）
    // 條件二：目前這個 $id 有在「刪除清單」$_POST['del'] 裡面    
    // 要記得是$_POST['del']，不是$_POST['id']
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
        // 兩個條件都成立 → 呼叫刪除方法，把這筆資料從資料庫刪掉    
        $Post->del($id);
    } else {
        // 不在刪除清單裡 → 代表這筆資料要「更新」而不是刪除
        // 先從資料庫把這筆資料完整撈出來，存到 $post 變數
        $post = $Post->find($id);
        // 【判斷這筆資料是否要「顯示」（show）】
        // 條件一：$_POST['sh'] 不能是空的（代表有勾選要顯示的項目）
        // 條件二：目前這個 $id 有在「顯示清單」$_POST['sh'] 裡面
        // 兩個條件都成立 → sh 設為 1（顯示）
        // 任一條件不成立 → sh 設為 0（隱藏）
        $post['sh'] = (!empty($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
        // 把剛才修改好的資料（含新的 sh 值）存回資料庫
        $Post->save($post);
    }
}

to("../back.php?do=news");
