<?php
include_once "db.php";

// 還不熟悉
// 要記得資料表的分類欄位要有資料
$posts = $Post->all(['type' => $_GET['type']]);

foreach ($posts as $post):
?>
    <div>
        <a href="javascript:getPost(<?= $post['id']; ?>)">
            <?= $post['title']; ?>
        </a>
    </div>
<?php
endforeach;
?>