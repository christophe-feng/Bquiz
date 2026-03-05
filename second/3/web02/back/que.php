<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
        <!-- 版面配置主要用div -->
        <!-- input裡面的id要拿掉 -->
        <div>
            <label for="">問卷名稱</label>
            <input type="text" name="subject">
        </div>
        <div id="options">
            <div>
                <label for="">選項</label>
                <input type="text" name="opt[]">
                <input type="button" value="更多" onclick="more()">
            </div>
        </div>
        <input type="submit" value="新增">|
        <input type="reset" value="清空">
    </form>
</fieldset>

<!-- function還不熟悉 -->
<script>
    function more() {
        let opt = `<div>
                <label for="">選項</label>
                <input type="text" name="opt[]">
                  </div>`
        $("#options").prepend(opt);
    }
</script>