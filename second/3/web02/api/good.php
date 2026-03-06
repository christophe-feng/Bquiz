<?php
include_once "db.php";

$post_id=$_POST['id'];
$post=$Post->find($post_id);
$member_id=$Mem->find(['acc'=>$_SESSION['login']])['id'];
$filter=['post_id'=>$post_id,'member_id'=>$member_id];

if($Log->count($filter)>0){
    $Log->del($filter);
    $post['good']--;
}else{
    $Log->save($filter);
    $post['good']++;
}

$Post->save($post);