<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">動畫圖片後台管理</p>
    <form method="post" target="" action="./api/edit.php?table=<?= $do; ?>">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="68%">動畫圖片</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $rows = $Mvim->all();
                foreach ($rows as $row):
                ?>
                    <tr>
                        <td width="68%">
                            <img src="./upload/<?= $row['img']; ?>" style="width: 180px; height: 120px;">
                            <!-- mvim的圖是多選的，所以要帶id到後台 -->
                            <!-- name的id要加陣列 -->
                            <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                        </td>
                        <td width="7%">
                            <!-- sh要用陣列 -->
                            <input type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? "checked" : ""; ?>>
                        </td>
                        <td width="7%">
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <input type="button" value="更換動畫" onclick="op('#cover','#cvr','./modal/update.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')">
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px">
                        <input type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增動畫圖片">
                    </td>
                    <td class="cent">
                        <input type="submit" value="修改確定">
                        <input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>