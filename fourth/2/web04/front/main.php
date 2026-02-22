<?php

$nav_str = '';

if (isset($_GET['type']) && $_GET['type'] != 0) {
    $type = $Type->find($_GET['type']);
    if ($type['big_id'] == 0) {
        $nav_str = $type['name'];
        $rows = $Item->all(['sh' => 1, 'big' => $type['id']]);
    } else {
        $big = $Type->find($type['big_id']);
        $nav_str = $big['name'] . " > " . $type['name'];
        $rows = $Item->all(['sh' => 1, 'big' => $type['id']]);
    }
} else {
    $nav_str = "全部商品";
    $rows = $Item->all(['sh' => 1]);
}

?>

<h2><?= $nav_str; ?></h2>
<?php
foreach ($rows as $row):
?>
    <!-- .pp(.pp.ct>img)+(div>.ct.tt+.pp*3) -->
    <div class="pp" style="display: flex;width:70%;margin:2px auto">
        <div class="pp ct" >
            <img src="upload/<?= $row['img']; ?>" style="width:150px;height:120px">
        </div>
        <div style="width: 60%">
            <div class="ct tt" style="border:1px solid white"><?= $row['name']; ?></div>
            <div class="pp">
                價錢：<?= $row['price']; ?>
                <img src="icon/0402.jpg" alt="">
            </div>
            <div class="pp">規格：<?= $row['spec']; ?></div>
            <div class="pp">簡介：<?= $row['intro']; ?></div>
        </div>
    </div>
<?php
endforeach;
?>