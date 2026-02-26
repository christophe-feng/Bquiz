<!-- fieldset>legend+form:post -->
<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
        <!-- div>label+input:text -->
        <div>
            <label for="">問卷名稱</label>
            <input type="text" name="subject" id="">
        </div>
        <!-- #options>div>label+input:text+input:button -->
        <div id="options">
            <div>
                <label for="">選項</label>
                <input type="text" name="opt[]">
                <input type="button" value="更多" onclick="more()">
            </div>
        </div>
        <!-- input:submit+input:reset -->
        <input type="submit" value="新增">
        <input type="reset" value="清空">
    </form>
</fieldset>
<script>
    function more() {
        let opt = `<div>
        <label for="">選項</label>
        <input type="text" name="opt[]">
        </div>`
        $("#options").prepend(opt);
    }
</script>

<!-- fieldset>legend+form:post -->
<fieldset>
    <legend>新增問卷</legend>
    <form action="" method="post">
        <!-- div>label+input:text -->
        <div>
            <label for=""></label>
            <input type="text" name="" id="">
        </div>
        <!-- #options>div>label+input:text+input:button -->
        <div id="options">
            <div>
                <label for=""></label>
                <input type="text" name="" id="">
                <input type="button" value="">
            </div>
        </div>
        <!-- input:submit+input:reset -->
        <input type="submit" value="">
        <input type="reset" value="">
    </form>
</fieldset>