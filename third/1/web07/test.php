<?php include_once "api/db.php";

for($i=1;$i<=10;$i++){
    $data=[
        'name'=>"院線片測試資料".$i,
        'level'=>rand(1,4),
        'length'=>rand(90,150),
        'ondate'=>"2026-03-".sprintf("%02d",rand(10,14)),
        'publisher'=>"院線片{$i}發行商",
        'director'=>"院線片{$i}導演",
        'trailer'=>"03B".sprintf("%02d",$i)."v.mp4",
        'poster'=>"03B"

    ]
}