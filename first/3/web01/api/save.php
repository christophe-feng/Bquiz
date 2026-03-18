<?php
include_once "db.php";

$table=$_GET['table'];
$DB=${ucfirst($table)};

// 檔案上傳
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/" . $_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}

// 判斷是否為新增資料
if(!isset($_POST['id'])){
    switch($table){
        case "title":
            $_POST['sh']=($DB->count(['sh'=>1])==0)?1:0;
            break;
        case "admin":
            break;
        default:
            $_POST['sh']=1;
    }
}

// 執行儲存，並導回後台
$DB->save($_POST);
to("../back.php?do=$table");