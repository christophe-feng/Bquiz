<form action="./api/post.php" method="post">
    <table class="ct" style="margin:auto;width:80%">
        <tr>
            <td style="width:10%;">編號</td>
            <td style="width:70%;">標題</td>
            <td>顯示</td>
            <td>刪除</td>
        </tr>
        <?php
        // 分頁邏輯
        $total = $Post->count();
        $div = 3;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;

        $posts = $Post->all(" limit $start,$div");   //邏輯要理解
        foreach ($posts as $idx => $post):
        ?>
            <tr>
                <td class="clo"><?= $idx+1+$start ?></td>   <!-- 邏輯要理解 -->
                <td><?= $post['title']; ?></td>
                <td>
                    <input type="checkbox" name="sh[]" value="<?= $post['id']; ?>" <?= ($post['sh'] == 1) ? 'checked' : ''; ?>>
                </td>
                <td>
                    <input type="checkbox" name="del[]" value="<?= $post['id']; ?>">
                    <!-- 要放入隱藏的id以利將資料送到後端做處理 -->
                    <input type="hidden" name="id[]" value="<?= $post['id']; ?>">
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
    <div class="ct">
        <!-- 還很不熟悉 -->
        <?php
        if ($now - 1 > 0) {
            $prev = $now - 1;
            echo "<a href='?do=news&p=$prev'> < </a>";
        }

        for ($i = 1; $i <= $pages; $i++) {
            $font = ($i == $now) ? "24px" : "16px";
            echo "<a href='?do=news&p=$i' style='font-size:$font'> $i </a>";
        }

        if ($now + 1 <= $pages) {
            $next = $now + 1;
            echo "<a href='?do=news&p=$next'> > </a>";
        }
        ?>

        <!-- 用submit即可 -->
        <input type="submit" value="確定修改">
    </div>
</form>