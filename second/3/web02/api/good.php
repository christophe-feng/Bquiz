<?php
include_once "db.php";

// 從前端表單（POST 請求）接收使用者傳來的「文章 ID」
$post_id = $_POST['id'];
// 用剛才拿到的文章 ID，去資料庫查詢這篇文章的完整資料
// 查詢結果存進 $post（包含文章內容、按讚數等欄位）
$post = $Post->find($post_id);
// 從 Session 取出目前登入帳號（$_SESSION['login']）
// 用帳號去會員資料表查詢，取得這位會員的「數字 ID」
// 目的是確認「是哪個會員」在操作
$member_id = $Mem->find(['acc' => $_SESSION['login']])['id'];
// 把「文章 ID」和「會員 ID」組成一個條件陣列
// 代表「這個人對這篇文章的按讚紀錄」，後面會用來查詢或新增/刪除
$filter = ['post_id' => $post_id, 'member_id' => $member_id];

// 去按讚紀錄資料表查詢：這個人是否已經對這篇文章按過讚了？
// count() 回傳筆數，大於 0 表示「已經按過讚了」
if ($Log->count($filter) > 0) {
    // 已經按過讚 → 執行「取消讚」
    // 把這筆按讚紀錄從資料庫刪除    
    $Log->del($filter);
    $post['good']--;
} else {
    // 新增一筆按讚紀錄到資料庫（記錄「誰對哪篇文章按了讚」）    
    $Log->save($filter);
    $post['good']++;
}

// 把更新後的文章資料（包含新的按讚數）存回資料庫
// 這樣按讚數的變動才會真正被儲存下來
$Post->save($post);
