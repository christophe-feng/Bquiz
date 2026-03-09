<!-- 用在total / bottom -->
<?php
// 1. 載入資料庫功能：引入 db.php，裡面通常定義了各種資料表物件（如 $Title, $Ad, $Total）。
include_once "db.php";

// 2. 接收目標名稱：從網址抓取 table 參數。
// 假設網址是：?table=total (代表要改「進站人數」)。
$table = $_GET['table'];

// 3. 動態指派物件：把字串轉成變數名稱。
// ucfirst('total') 變 'Total'，然後 ${'Total'} 就會變成原本在 db.php 裡面的 $Total 物件。
$DB = ${ucfirst($table)};

// 4. 取出舊資料：從該資料表中，抓出 ID 為 1 的那一筆資料（回傳成一個陣列 $row）。
$row = $DB->find(1);

// 5. 覆蓋新數值：這行是核心！
// 把表單傳來的 $_POST['total'] 內容，塞進 $row 陣列中 key 為 'total' 的位置。
$row[$table] = $_POST[$table];

// 6. 存回資料庫：呼叫該物件的 save 方法，把更新後的 $row 陣列寫回資料庫。
$DB->save($row);

// 7. 自動跳轉：任務完成，帶你回到該項目的後台管理頁面。
to("../back.php?do=$table");
