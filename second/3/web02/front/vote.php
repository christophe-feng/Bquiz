<?php
$subject = $Que->find($_GET['id']);
$options = $Que->all(['main_id' => $_GET['id']]);
?>
<!-- fieldset>legend -->
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $subject['text']; ?></legend>
    <form action="./api/vote.php" method="post">
        <h3><?= $subject['text']; ?></h3>
        <?php
        foreach ($options as $option):
        ?>
            <p>
                <!-- 如果用form表單，就要將name設為id -->
                <input type="radio" name="id" value="<?= $option['id']; ?>"> <?= $option['text']; ?>
            </p>
        <?php
        endforeach;
        ?>
        <div class="ct">
            <input type="submit" value="我要投票">
            <!-- 要記得設hidden的main_id -->
            <input type="hidden" name="main_id" value="<?= $_GET['id']; ?>">
        </div>
    </form>
</fieldset>