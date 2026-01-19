<?php include_once "db.php";

// 編輯次選單




// 新增次選單
if(!empty($_POST['new_text'])){

    foreach($_POST['new_text'] as $key => $text){
        if($text!==""){
            $href=$_POST['new_href'][$key];
            $_Menu->save(['main_id'=>$_GET['main_id'],
                             'text'=>$text,
                             'href'=>$href]);
        }
    }
}

to("../back.php?do=menu");

?>