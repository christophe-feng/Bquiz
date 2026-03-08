<!-- fieldset>legend -->
<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <!-- table>tr*2>td*3 -->
    <table>
        <tr>
            <td style="width: 30%;">標題</td>
            <td style="width: 50%;">內容</td>
            <td></td>
        </tr>
        <?php
        // 分頁邏輯
        // 簡化建議：分頁參數可以建立一個 getPagination() 函式來計算
        // 簡化範例：list($posts, $links) = paginate($Post, ['sh'=>1], 5);
        $total = $Post->count(['sh'=>1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;

        $posts = $Post->all(['sh' => 1], " limit $start,$div");   //邏輯要理解
        foreach ($posts as $post):
        ?>
            <tr>
                <td class="clo title"><?= $post['title']; ?></td>
                <td class="post">
                    <span class="short">
                        <?= mb_substr($post['text'], 0, 25); ?>...
                    </span>
                    <span class="full" style="display: none;">
                        <?= nl2br($post['text']); ?>
                    </span>
                </td>
                <td>
                    <?php
                    // 簡化建議：可以使用 $isGood = $Log->count(...) > 0 ? "收回讚" : "讚";
                    // 簡化範例：$isGood = $Log->count(['post_id'=>$post['id'], 'member_id'=>$mid]) > 0;
                    if (isset($_SESSION['login'])) {
                        $post_id = $post['id'];
                        $member_id = $Mem->find(['acc' => $_SESSION['login']])['id'];
                        if ($Log->count(['post_id' => $post_id, 'member_id' => $member_id]) > 0):
                    ?>
                            <a href="#" class="great" data-id="<?= $post['id']; ?>">收回讚</a>
                        <?php else: ?>
                            <a href="#" class="great" data-id="<?= $post['id']; ?>">讚</a>
                    <?php
                        endif;
                    }
                    ?>
                </td>
            </tr>
        <?php
        endforeach;
        ?>
    </table>
    <div>
        <!-- 還很不熟悉 -->
        <?php
        // 簡化建議：分頁按鈕可以使用 for 迴圈搭配三元運算子，或封裝成組件
        // 簡化範例：for($i=1;$i<=$pages;$i++) echo sprintf("<a href='?p=%d' style='font-size:%s'>%d</a>", $i, $i==$now?'24px':'16px', $i);
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

<script>
    $(".title").on("click",function(){
        $(this).next().children('.short,.full').toggle();
    })

    $(".great").on("click",function(){
        let id=$(this).data('id');
        let str=$(this).text();
        $.post("./api/good.php",{id},()=>{
            switch(str){
                case "讚":
                    $(this).text("收回讚");
                break;
                case "收回讚":
                    $(this).text("讚");
                break;
                    
            }
        })
    })
</script>