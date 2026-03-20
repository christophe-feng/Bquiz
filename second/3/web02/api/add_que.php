<?php
include_once "db.php";

// 1. 存入問卷題目
if(!empty($_POST['subject'])){
    $Que->save(['text'=>$_POST['subject'],'main_id'=>0,'vote'=>0]);
}

// 2. 抓去剛剛存好的題目ID
$main_id=$Que->find(['text'=>$_POST['subject']])['id'];

// 3. 存入多個選項
if(!empty($_POST['opt'])){
    foreach($_POST['opt'] as $opt){
        $Que->save(['text'=>$opt,'main_id'=>$main_id,'vote'=>0]);
    }
}

// 4. 任務完成，跳轉頁面
to ("../back.php?do=que");