<form action="" method="post">
    <table class="ct" style="margin:auto;width:80%">
        <tr>
            <td style="width:10%;">編號</td>
            <td style="width:70%;">標題</td>
            <td>顯示</td>
            <td>刪除</td>
        </tr>
        <?php
        $rows=$Post->all();
        foreach($rows as $row):
        ?>
        <tr>
            <td class="clo"></td>
            <td><?= $row['title']; ?></td>
            <td>
                <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh']==1)?'checked':''; ?>>
            </td>
            <td>
                <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                <!-- 要放入隱藏的id以利將資料送到後端做處理 -->
                <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
            </td>
        </tr>
        <?php
        endforeach;
        ?>
    </table>
    <div class="ct">
        <!-- 用submit即可 -->
        <input type="submit" value="確定修改">
    </div>
</form>