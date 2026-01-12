<fieldset>
    <legend>目前位置 ： 首頁 > 最新文章區</legend>


    <table>
        <tr>
            <td style="width: 30%;">標題</td>
            <td style="width: 50%;">內容</td>
            <td></td>
        </tr>
        <?php
        $total = $Post->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;

        $posts = $Post->all(['sh' => 1], " limit $start,$div");
        foreach ($posts as $post):
        ?>
            <tr>
                <td><?= $post['title']; ?></td>
                <td><?= mb_substr($post['text'], 0, 25); ?>...</td>
                <td></td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
    <div>
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
    </div>


</fieldset>