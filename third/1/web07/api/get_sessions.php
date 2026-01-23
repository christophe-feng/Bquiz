<?php
include_once "db.php";

$movieId=$_GET['movieId'];
$date=strtotime($_GET['date']);

$duration=[
    1=>"14:00 ~ 16:00",
    2=>"16:00 ~ 18:00",
    3=>"18:00 ~ 20:00",
    4=>"20:00 ~ 22:00",
    5=>"22:00 ~ 24:00"
];

$today=strtotime(date("Y-m-d"));
$start=1;
if($date==$today){
    $H=date("G");
    if($H>=14){
        $start=ceil(($H-13)/2)+1;
    }
}

for($i=1;$i<=5;$i++){
    echo "<option value='$i'>{$duration[$i]} 剩餘座位 20</option>";
    }


?>