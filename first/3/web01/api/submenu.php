<?php
// 引入資料庫連線檔案，讓我們能使用 $Menu 這個物件來操作資料
include_once "db.php";

// --- 第一部分：處理「現有」次選單的編輯或刪除 ---

if (!empty($_POST['text'])) {                                           // 如果從表單傳過來的「選單名稱(text)」陣列不是空的，代表使用者有點擊儲存
    foreach ($_POST['text'] as $id => $text) {                          // 使用 foreach 迴圈來一筆一筆處理傳過來的資料，$id 是資料 ID，$text 是修改後的名稱
        if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {    // 如果這個 ID 有被勾選「刪除」($_POST['del'] 是一個存有要刪除 ID 的陣列)
            $Menu->del($id);                                            // 執行資料庫刪除動作，把這筆 ID 的資料刪掉
        } else {
            $row = $Menu->find($id);                                    // 如果不刪除，就是「編輯」：先用 ID 去資料庫把這筆資料原封不動找出來
            $row['text'] = $text;                                       // 把這筆資料的「名稱」更新為使用者新填寫的內容
            $row['href'] = $_POST['href'][$id];                         // 把這筆資料的「連結(href)」更新為對應 ID 的連結內容
            $Menu->save($row);                                          // 把修改好名稱與連結的資料，重新儲存回資料庫
        }
    }
}

// --- 第二部分：處理「全新」次選單的新增 ---

if (!empty($_POST['new_text'])) {                                       // 如果有接收到「新選單名稱(new_text)」的欄位
    foreach ($_POST['new_text'] as $key => $text) {                     // 同樣用迴圈處理，因為一次可能會新增多筆次選單
        if ($text !== "") {                                             // 只有當「名稱」欄位不是空白時，才執行新增動作
            $href = $_POST['new_href'][$key];                           // 根據目前的順序索引(key)，找到對應要新增的連結網址
            $Menu->save([                                               // 執行儲存：標記它是屬於哪一個主選單(main_id)、文字是什麼、連結是什麼
                'main_id' => $_GET['main_id'],
                'text' => $text,
                'href' => $href
            ]);
        }
    }
}

// 全部處理完後，利用自定義函式 to() 將畫面導回選單管理後台
to("../back.php?do=menu");
